<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Models\Soal;
use App\Models\Aktifitas;
use App\Models\Detailsoal;
use Carbon\Carbon;

Carbon::setLocale('id');

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $pesertas = User::where('status', 'Peserta')->count();
    $mentors = User::where('status', 'Mentor')->count();
    $pakets = Soal::where('jenis', 1)->count();
    $soals = Detailsoal::count();
    $aktifitas = Aktifitas::orderBy('id', 'DESC')->paginate(5);
    return view('home', compact('pesertas', 'mentors', 'pakets', 'aktifitas', 'soals'));
    // if (Auth::user()->status == 'Admin' || Auth::user()->status == 'Peserta') {
    // }else{
    //   return view('home', compact('pesertas', 'mentors', 'pakets', 'aktifitas'));
    // }
  }

  public function settings()
  {
    $user = User::findorfail(Auth::user()->id);
    return view('settings.index', compact('user'));
  }

  public function activity()
  {
    return view('errors.404');
  }
}
