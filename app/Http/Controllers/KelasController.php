<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Datatables;

use App\User;
use App\Models\Kelas;

class KelasController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    if (Auth::user()->status == 'Mentor' or Auth::user()->status == 'Admin' or Auth::user()->status == 'Peserta') {
      $user = User::where('id', Auth::user()->id)->first();
      $mentors = User::whereIn('status', ['Mentor', 'Admin', 'Peserta'])->get();
      return view('kelas.index', compact('user', 'mentors'));
    } else {
      return redirect()->route('home.index');
    }
  }
  public function dataKelas()
  {
    $kelas = Kelas::with('peserta')->get();
    if (Auth::user()->status == 'Mentor' or Auth::user()->status == 'Peserta') {
      return Datatables::of($kelas)
        ->addColumn('empty_str', function ($kelas) {
          return '';
        })
        ->addColumn('action', function ($kelas) {
          return '<div style="text-align:center"><a href="kelas/detail/' . $kelas->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        })
        ->addColumn('peserta', function ($kelas) {
          if ($kelas) {
            $peserta = User::where('status', 'Peserta')->where('id_kelas', $kelas->id)->count();
            return '<center>' . $peserta . ' peserta</center>';
          } else {
            return '<center>kelas kosong</center>';
          }
        })
        ->addColumn('wali', function ($kelas) {
          if ($kelas->wali) {
            return '<center>' . $kelas->wali->nama . '</center>';
          } else {
            return '<center><label class="label label-danger">tidak ada</label></center>';
          }
        })
        ->rawColumns(['action', 'peserta', 'wali'])
        ->make(true);
    } else {
      return Datatables::of($kelas)
        ->addColumn('empty_str', function ($kelas) {
          return '';
        })
        ->addColumn('action', function ($kelas) {
          return '<div style="text-align:center">
                    <a href="kelas/ubah/' . $kelas->id . '" class="btn btn-xs btn-primary">Ubah</a>
                    <button type="button" class="btn btn-xs btn-danger del-kelas" id=' . $kelas->id . '>Hapus</button>
                    <a href="kelas/detail/' . $kelas->id . '" class="btn btn-xs btn-success">Detail</a>
                  </div>';
        })
        ->addColumn('peserta', function ($kelas) {
          if ($kelas) {
            $peserta = User::where('status', 'Peserta')->where('id_kelas', $kelas->id)->count();
            return '<center>' . $peserta . ' peserta</center>';
          } else {
            return '<center>kelas kosong</center>';
          }
        })
        ->addColumn('wali', function ($kelas) {
          if ($kelas->wali) {
            return '<center>' . $kelas->wali->nama . '</center>';
          } else {
            return '<center><label class="label label-danger">tidak ada</label></center>';
          }
        })
        ->rawColumns(['action', 'peserta', 'wali'])
        ->make(true);
    }
  }
  public function detailKelas(Request $request)
  {
    if (Auth::user()->status == 'Mentor' or Auth::user()->status == 'Admin' or Auth::user()->status == 'Peserta') {
      $user = User::where('id', Auth::user()->id)->first();
      $kelas = Kelas::where('id', $request->id)->first();
      $jumlah = User::select('id')->where('id_kelas', $request->id)->count();
      return view('kelas.detail', compact('user', 'kelas', 'jumlah'));
    } else {
      return redirect()->route('home.index');
    }
  }
  public function ubahKelas($id)
  {
    if (Auth::user()->status == 'Mentor' or Auth::user()->status == 'Admin' or Auth::user()->status == 'Peserta') {
      $user = User::where('id', Auth::user()->id)->first();
      $kelas = Kelas::where('id', $id)->first();
      $mentors = User::whereIn('status', ['Mentor', 'Admin', 'Peserta'])->get();
      return view('kelas.form.ubah', compact('user', 'kelas', 'mentors'));
    } else {
      return redirect()->route('home.index');
    }
  }
  public function detailKelasPeserta(Request $request)
  {
    $pesertas = User::where('status', 'Peserta')->where('id_kelas', $request->id_kelas)->get();
    return Datatables::of($pesertas)
      ->editColumn('jk', function ($pesertas) {
        if ($pesertas->jk == 'L') {
          return 'Laki-laki';
        } else {
          return 'Perempuan';
        }
      })
      ->addColumn('action', function ($pesertas) {
        return '<div style="text-align:center"><a href="../../peserta/detail/' . $pesertas->id . '" class="btn btn-xs btn-success">Detail</a></div>';
      })
      ->make(true);
  }
}
