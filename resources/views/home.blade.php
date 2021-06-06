<?php use Carbon\Carbon; ?>
@extends('layouts.app')
@section('title', 'SIT CPNS')
@section('breadcrumb')
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
@endsection
@section('content')
  <?php include(app_path().'/functions/myconf.php'); ?>

  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  @if(Auth::user()->status == 'Admin' || Auth::user()->status == 'Mentor')
    <div class="callout callout-info">
      <h4>Hai, <b>{{ Auth::user()->nama }}</b>. &nbsp; Selamat datang di <b>SIT CPNS.</b></h4>
    </div>
  @endif
  @if(Auth::user()->status == 'Admin' || Auth::user()->status == 'Mentor')
    <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Admin</span>
          <span class="info-box-number"><?php echo e(number_format(Auth::check())); ?> <small>Admin</small></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-person-stalker"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Mentor</span>
          <span class="info-box-number">{{ number_format($mentors) }} <small>Mentor</small></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-person-stalker"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Peserta</span>
          <span class="info-box-number">{{ number_format($pesertas) }} <small>Peserta</small></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-list-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Paket Soal</span>
          <span class="info-box-number">{{ number_format($pakets) }} <small>Paket</small></span>
          <span><b>{{ number_format($soals) }}</b> <small>Soal</small></span>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Paket soal</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-striped" id="table_soal">
            @if (Auth::user()->status == 'Mentor')
              <caption>Data paket soal yang Anda buat</caption>
            @else
              <caption>Data paket soal</caption>
            @endif
            <thead>
              <tr>
                <th>Nama Paket</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th style="text-align: center;">Passing Grade</th>
                <th style="text-align: center; width: 70px">Waktu</th>
                <th style="text-align: center; width: 120px">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Aktifitas Terkini</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="products-list product-list-in-box">
            @if($aktifitas->count())
            @foreach($aktifitas as $data_aktifitas)
            <li class="item">
              <div class="product-img">
                @if($data_aktifitas->dataAktifitasUser->gambar != "")
                <img src="{{ url('/assets/img/user/'.$data_aktifitas->dataAktifitasUser->gambar) }}" alt="user img">
                @else
                <img src="{{ url('/assets/img/noimage.jpg') }}" alt="user img">
                @endif
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{ $data_aktifitas->dataAktifitasUser->nama }}
                  <span class="label label-warning pull-right">{{ $data_aktifitas->created_at->diffForHumans() }}</span>
                </a>
                <span class="product-description">
                  {{ $data_aktifitas->nama }}
                </span>
              </div>
            </li>
            @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
  @else
    <div class="callout callout-info">
      <p>Hai <b>{{ Auth::user()->nama }}</b>, Selamat datang di <b>SIT CPNS.</b>
    </div>
    <div class="alert" style="background: #fff; border: solid thin #d8d5d5;">
        <p>
          Sistem Informasi Try Out CPNS (SIT CPNS) adalah suatu sistem yang berguna untuk membantu persiapan dari masyarakat untuk menghadapi ujian seleksi CPNS terkhususnya pada tahapan Seleksi Kemampuan Dasar(SKD). Pada aplikasi ini tersedia beberapa paket Try Out SKD Yaitu paket TIU (Tes Intelegensi Umum),  TKP (Tes Karakteristik Pribadi), dan TWK (Tes Wawasan Kebangsaan).
          Dan juga, setelah selesai mengerjakan Try Out, peserta dapat melihat skor nya tersebut.
        </p>
        <ul>
          <li><i class="ri-check-double-line"></i> Aplikasi Sistem CAT (Computer Assisted Test)</li>
          <li><i class="ri-check-double-line"></i> Tipe Soal HOTS</li>
          <li><i class="ri-check-double-line"></i> Papan Pengumuman Hasil Nilai</li>
        </ul><br>
        <p>
          Akun akan diberikan oleh penyelenggara tryout. Jika kamu belum mendapatkan akun, segera minta kepada pihak penyelenggara agar kamu dapat memulai tryout.
        </p>
      </div>
    </div>
  @endif
@endsection
@push('css')
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
@endpush
@push('scripts')
  <script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
  <script>
  $(document).ready(function (){
    table_soal = $('#table_soal').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      lengthChange: true,
      ajax: {
        url: '{!! route('tryout.get-soal-home') !!}',
        
      },
      columns: [
        {data: 'paket', name: 'paket', orderable: true, searchable: true },
        {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true },
        {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
        {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
        {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
        {data: 'action', name: 'action', orderable: false, searchable: false, },
      ],
      "drawCallback": function (setting) {}
    });
    $("#btn-wrap-info").click(function() {
      $(this).hide();
      $("#wrap-info").show();
    });
  });
  </script>
@endpush