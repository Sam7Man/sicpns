<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Datatables;
use DB;
use Hash;

use App\User;
use App\Models\Soal;
use App\Models\Aktifitas;
use App\Models\Jawab;
use App\Models\Kelas;
use App\Models\Distribusisoal;
use App\Models\Detailsoal;

class PesertaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    if (auth()->user()->status == 'Mentor' or auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta') {
      $user = User::where('id', auth()->user()->id)->first();
      $kelas = Kelas::get();
      return view('peserta.index', compact('user', 'kelas'));
    } else {
      return redirect()->route('home.index');
    }
  }

  public function editPeserta(Request $request)
  {
    if (auth()->user()->status == 'Mentor' or auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta') {
      $user = User::where('id', auth()->user()->id)->first();
      $peserta = User::where('id', $request->id)->first();
      $kelas = Kelas::select('id', 'nama')->get();
      return view('peserta.form.ubah', compact('user', 'peserta', 'kelas'));
    } else {
      return redirect()->route('home.index');
    }
  }

  public function dataPeserta()
  {
    $pesertas = User::where('status', 'Peserta');
    if (auth()->user()->status == 'Mentor') {
      return Datatables::of($pesertas)
        ->addColumn('kelas', function ($pesertas) {
          return 'ini kelas';
        })
        ->editColumn('jk', function ($pesertas) {
          if ($pesertas->jk == 'L') {
            return 'Laki-laki';
          } else {
            return 'Perempuan';
          }
        })
        ->addColumn('kelas', function ($pesertas) {
          if ($pesertas->getKelas) {
            return $pesertas->getKelas->nama;
          } else {
            return "-";
          }
        })
        ->addColumn('action', function ($pesertas) {
          return '<div style="text-align:center"><a href="peserta/detail/' . $pesertas->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        })
        ->make(true);
    } elseif (auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta') {
      return Datatables::of($pesertas)
        ->addColumn('kelas', function ($pesertas) {
          return 'ini kelas';
        })
        ->editColumn('jk', function ($pesertas) {
          if ($pesertas->jk == 'L') {
            return 'Laki-laki';
          } else {
            return 'Perempuan';
          }
        })
        ->addColumn('kelas', function ($pesertas) {
          if ($pesertas->getKelas) {
            return $pesertas->getKelas->nama;
          } else {
            return "-";
          }
        })
        ->addColumn('action', function ($pesertas) {
          return '<div style="text-align:center">
                              <a href="peserta/edit/' . $pesertas->id . '" class="btn btn-xs btn-primary">Ubah</a>
                              <button type="button" class="btn btn-xs btn-danger del-peserta" id="' . $pesertas->id . '">Hapus</button>
                              <a href="peserta/detail/' . $pesertas->id . '" class="btn btn-xs btn-success">Detail</a>
                            </div>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
  }

  public function detailPeserta(Request $request)
  {
    if (auth()->user()->status == 'Mentor' or auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta' ) {
      $user = User::where('id', auth()->user()->id)->first();
      $peserta = User::where('id', $request->id)->first();
      $hasil_ujians = Jawab::join('soals', 'jawabs.id_soal', '=', 'soals.id')
        ->select('soals.paket', 'jawabs.*', DB::raw('SUM(jawabs.score) as jumlah_nilai'))
        ->where('jawabs.id_user', $peserta->id)->where('soals.id_user', auth()->user()->id)
        ->orderBy('jawabs.id', 'DESC')->groupBy('jawabs.id_soal')->paginate(15);
      return view('peserta.detail', compact('user', 'peserta', 'hasil_ujians'));
    } else {
      return redirect()->route('home.index');
    }
  }

  public function ujian()
  {
    $user = User::where('id', auth()->user()->id)->first();
    $pakets = Distribusisoal::where('id_kelas', auth()->user()->id_kelas)->get();
    return view('halaman-peserta.ujian', compact('user', 'pakets'));
  }

  public function detailUjian($id)
  {
    $check_soal = Distribusisoal::where('id_soal', $id)->where('id_kelas', auth()->user()->id_kelas)->first();
    if ($check_soal) {
      $soal = Soal::with('detail_soal_essays')->where('id', $id)->first();
      $soals = Detailsoal::where('id_soal', $id)->where('status', 'Y')->get();
      return view('halaman-peserta.detail_ujian', compact('soal', 'soals'));
    } else {
      return redirect()->route('home.index');
    }
  }

  public function getSoal($id)
  {
    $soal = Detailsoal::find($id);
    return view('halaman-peserta.get_soal', compact('soal'));
  }

  public function jawab(Request $request)
  {
    $get_jawab = explode('/', $request->get_jawab);
    $pilihan = $get_jawab[0];
    $id_detail_soal = $get_jawab[1];
    $id_peserta = $get_jawab[2];
    $detail_soal = Detailsoal::find($id_detail_soal);

    $jawab = Jawab::where('no_soal_id', $id_detail_soal)->where('id_user', auth()->user()->id)->first();
    if (!$jawab) {
      $jawab = new Jawab;
      $jawab->revisi = 0;
    } else {
      $jawab->revisi = $jawab->revisi + 1;
    }

    $jawab->no_soal_id = $id_detail_soal;
    $jawab->id_soal = $detail_soal->id_soal;
    $jawab->id_user = auth()->user()->id;
    $jawab->id_kelas = auth()->user()->id_kelas;
    $jawab->nama = auth()->user()->nama;
    $jawab->pilihan = $pilihan;

    $check_jawaban = Detailsoal::where('id', $id_detail_soal)->where('kunci', $pilihan)->first();
    if ($check_jawaban) {
      $jawab->score = $detail_soal->score;
    } else {
      $jawab->score = 0;
    }
    $jawab->status = 0;
    $jawab->save();
    return 1;
  }

  public function kirimJawaban(Request $request)
  {
    Jawab::where('id_soal', $request->id_soal)->where('id_user', auth()->user()->id)->update(['status' => 1]);
  }

  public function finishUjian($id)
  {
    $soal = Soal::find($id);
    $nilai = Jawab::where('id_soal', $id)->where('id_user', auth()->user()->id)->sum('score');
    return view('halaman-peserta.finish', compact('soal', 'nilai'));
  }

  public function delete()
  {
    return view('peserta.delete');
  }

  public function getBtnDelete($password)
  {
    $validate_admin = User::where('email', auth()->user()->email)->first();
    if ($validate_admin && Hash::check($password, $validate_admin->password)) {
      $cocok = 'Y';
    } else {
      $cocok = 'N';
    }
    return view('peserta.tombol_hapus', compact('cocok'));
  }

  public function deleteAll()
  {
    $users = User::where('status', 'Peserta')->get();
    foreach ($users as $key => $value) {
      $jawab = Jawab::where('id_user', $value->id)->first();
      if ($jawab) {
        $jawab->delete();
      }
    }
    User::where('status', 'Peserta')->delete();
  }

}
