@extends('layouts.app')
@section('title', 'Data mentor')
@section('breadcrumb')
  <h1>Master Data</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{ url('/home') }}">Mentor</a></li>
    <li class="active">Ubah data mentor</li>
  </ol>
@endsection
@section('content')
<?php include(app_path().'/functions/myconf.php'); ?>
<div class="col-md-8">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Ubah Data Mentor</h3>
    </div>
    <div class="box-body">
    	<form class="form-horizontal" id="form-mentor">
        <div class="box-body">
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="hidden" name="id" value="{{ $mentor->id }}">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $mentor->nama }}">
            </div>
          </div>
          <div class="form-group">
            <label for="no_induk" class="col-sm-2 control-label">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="NIP" value="{{ $mentor->no_induk }}">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $mentor->email }}">
            </div>
          </div>
          <div class="form-group">
            <label for="kota" class="col-sm-2 control-label">Asal Kota</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kota" name="kota" placeholder="Asal Kota" value="{{ $mentor->kota }}">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Jenis kelamin</label>
            <div class="col-sm-10">
              <div class="radio">
                <label>
                  <input type="radio" name="jk" id="l" value="L" @if($mentor->jk == 'L') checked @endif> Laki-laki
                </label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="jk" id="p" value="P" @if($mentor->jk == 'P') checked @endif> Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-top: 15px">
            <label for="kelas" class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
	            <div id="notif" style="display: none;"></div>
              <img src="{{ url('/assets/images/facebook.gif') }}" style="display: none;" id="loading">
              <div id="wrap-btn">
	              <button type="button" class="btn btn-success" id="simpan">Simpan</button>
                <button type="button" class="btn btn-danger" onclick="self.history.back()">Kembali</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function (){
	$("#simpan").click(function() {
    $("#wrap-btn").hide();
    $("#loading").show();
    var dataString = $("#form-mentor").serialize();
    $.ajax({
      type: "POST",
      url: "{{ url('/crud/update-mentor') }}",
      data: dataString,
      success: function(data){
        $("#loading").hide();
        $("#wrap-btn").show();
        if (data == 'ok') {
          $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Data mentor berhasil diupdate.").show();
          window.location.href = "{{ url('master/mentor/detail/'.$mentor->id) }}";
        }else{
          $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).show();
        }
      }
    })
  });
});
</script>
@endpush