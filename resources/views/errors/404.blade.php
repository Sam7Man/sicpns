@extends('layouts.app')
@section('title', 'Error 404 - Halaman tidak ditemukan')
@section('breadcrumb')
  <h1>Error 404 - Halaman tidak ditemukan</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Error 404 - Halaman tidak ditemukan</li>
  </ol>
@endsection
@section('content')
	<div class="col-md-12">
	  <div class="box box-default">
	    <div class="box-body">
	    	<div class="error-page">
	        <h2 class="headline text-yellow"> 404</h2>
	        <div class="error-content">
	          <br><h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
	          <p>Kami tidak menemukan halaman yang kamu cari disini. <br><a href="{{ url('/home') }}">Kembali ke dashboard</a></p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
@endsection