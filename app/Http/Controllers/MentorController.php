<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Datatables;
use DB;

use App\User;
use App\Models\Aktifitas;

class MentorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    if (auth()->user()->status == 'Mentor' or auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta') {
      $user = User::where('id', auth()->user()->id)->first();
      return view('mentor.index', compact('user'));
    } else {
      return redirect()->route('home.index');
    }
  }

  public function dataMentor()
  {
    $mentors = User::where('status', 'Mentor');
    return Datatables::of($mentors)
      ->addColumn('empty_str', function () {
        return '';
      })
      ->editColumn('jk', function ($mentors) {
        if ($mentors->jk == 'L') {
          return "Laki-laki";
        } else {
          return "Perempuan";
        }
      })
      ->addColumn('action', function ($mentors) {
        if (auth()->user()->status == 'Mentor') {
          return '<div style="text-align:center"><a href="mentor/detail/' . $mentors->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        } else {
          return '<div style="text-align:center">
                              <a href="mentor/ubah/' . $mentors->id . '" class="btn btn-xs btn-primary">Ubah</a>
                              <button type="button" class="btn btn-xs btn-danger del-mentor" id=' . $mentors->id . '>Hapus</button>
                              <a href="mentor/detail/' . $mentors->id . '" class="btn btn-xs btn-success">Detail</a></div>';
        }
      })
      ->make(true);
  }

  public function detailMentor(Request $request)
  {
    $tanggal = date('d-m-Y');
    if (auth()->user()->status == 'Mentor' or auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta') {
      $user = User::where('id', auth()->user()->id)->first();
      $mentor = User::where('id', $request->id)->first();
      $grup_aktifitas = Aktifitas::where('id_user', $request->id)->whereDate('created_at', DB::raw('CURDATE()'))->paginate(5);
      return view('mentor.detail', compact('user', 'mentor', 'grup_aktifitas', 'tanggal'));
    } else {
      return redirect()->route('home.index');
    }
  }

  public function simpanMentor(Request $request)
  {
    $save = new User;
    return $save->simpanMentor($request);
  }

  public function ubahMentor(Request $request)
  {
    if (auth()->user()->status == 'Mentor' or auth()->user()->status == 'Admin' or auth()->user()->status == 'Peserta') {
      $user = User::where('id', auth()->user()->id)->first();
      $mentor = User::where('id', $request->id)->first();
      return view('mentor.form.ubah', compact('user', 'mentor'));
    } else {
      return redirect()->route('home.index');
    }
  }
}
