@extends('layouts.app')
@section('title', 'Data peserta')
@section('breadcrumb')
  <h1>Master Data</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{ url('/home') }}">Peserta</a></li>
    <li class="active">Ubah data peserta</li>
  </ol>
@endsection
@section('content')
  <?php include(app_path().'/functions/myconf.php'); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Data Peserta</h3>
      </div>
      <div class="box-body">
      	<form class="form-horizontal" id="form-peserta">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">&nbsp;</label>
              <div class="col-sm-10">
                <img src="{{ $peserta->gambar ? url('assets/img/user/'.$peserta->gambar) : url('assets/img/peserta.png') }}" id="wrap-img" class="img img-thumbnail" style="width: 30%"><br>
                <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
                <label for="upload_url_img">
                  <i class="fas fa-cloud-upload-alt"></i>
                  Pilih Foto
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="hidden" name="id" value="{{ $peserta->id }}">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $peserta->nama }}">
              </div>
            </div>
            <div class="form-group">
              <label for="no_induk" class="col-sm-2 control-label">ID Peserta</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="ID Peserta" value="{{ $peserta->no_induk }}">
              </div>
            </div>
            <div class="form-group">
              <label for="kota" class="col-sm-2 control-label">Asal Kota</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kota" name="kota" placeholder="Asal Kota" value="{{ $peserta->kota }}">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $peserta->email }}">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="kelas" class="col-sm-2 control-label">Kelas</label>
              <div class="col-sm-10">
                <select class="form-control select2Class" id="kelas" name="kelas">
                	<option value="@if($peserta->getKelas) {{ $peserta->getKelas->id }} @else Pilih kelas @endif">@if($peserta->getKelas) {{ $peserta->getKelas->nama }} @else Pilih kelas @endif</option>
                	@if($kelas->count())
                	@foreach($kelas as $data_kelas)
                		<option value="{{ $data_kelas->id }}">{{ $data_kelas->nama }}</option>
                	@endforeach
                	@endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis kelamin</label>
              <div class="col-sm-10">
                <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="l" value="L" @if($peserta->jk == 'L') checked @endif> Laki-laki
                  </label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <input type="radio" name="jk" id="p" value="P" @if($peserta->jk == 'P') checked @endif> Perempuan
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
  <div class="col-md-4">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title" style="color: darkorange"><i class="fa fa-info-circle"></i> Informasi</h3>
      </div>
      <div class="box-body">
        <p>Silahkan validasi data peserta dengan melakukan perubahan data pada form.</p>
        <p>Perubahan data akan berdampak pada data yang berkaitan dengan data peserta ini. Harap berhati-hati dalam merubah data peserta.</p>
      </div>
    </div>
  </div>
@endsection
@push('css')
  <style type="text/css">
    .upload_url_img, .upload_url_bg {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }

    .upload_url_img + label, .upload_url_bg + label {
      margin-top: 5px;
      font-size: 11pt;
      font-weight: 700;
      color: white;
      background-color: #178bcc;
      display: inline-block;
      padding: 5px 10px;
      text-align: center;
      border-radius: 5px;
      cursor: pointer;
      width: 30%;
    }

    .upload_url_img:focus + label,
    .upload_url_img + label:hover,
    .upload_url_bg:focus + label,
    .upload_url_bg + label:hover {
      outline: 1px dotted #000;
      outline: -webkit-focus-ring-color auto 5px;
    }
  </style>
@endpush
@push('scripts')
  <script>
    $(document).ready(function (){
      $('#upload_url_img').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#wrap-img').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
          $('#form-peserta').trigger('submit');
        }
      });

      $('#form-peserta').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{ url('crud/update-img-peserta') }}",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data)
          {
            $('#loading').hide();
            $("#message").html(data);
          }
        });
      });

    	$("#simpan").click(function() {
        $("#wrap-btn").hide();
        $("#loading").show();
        var dataString = $("#form-peserta").serialize();
        $.ajax({
          type: "POST",
          url: "{{ url('/crud/update-peserta') }}",
          data: dataString,
          success: function(data){
            $("#loading").hide();
            $("#wrap-btn").show();
            if (data == 'ok') {
              $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Data peserta berhasil diupdate.").show();
              window.location.href = "{{ url('master/peserta/detail/'.$peserta->id) }}";
            }else{
              $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).show();
            }
          }
        })
      });
    });
  </script>
@endpush