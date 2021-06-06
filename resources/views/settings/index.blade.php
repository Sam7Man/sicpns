@extends('layouts.app')
@section('title', 'Settings')
@section('breadcrumb')
  <h1>Settings</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Settings</li>
  </ol>
@endsection
@section('content')
<div class="col-md-8">
  <div class="box box-default">
    <div class="box-body">
      @if($user->status == 'Mentor' or $user->status == 'Admin')
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tabInfo" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Info profil</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabInfo">
              <caption>Silahkan ubah data dalam form dibawah.</caption>
              <form method="post" id="form_profil" class="form-horizontal">
              	{{ csrf_field() }}
                <div class="box-body" style="padding-bottom: 0;">
                  <div class="form-group"><br>
                    <label for="nama" class="col-md-3 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id" value="{{ $user->id }}">
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $user->nama }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_induk" class="col-md-3 control-label">NIP</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="NIP" value="{{ $user->no_induk }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_induk" class="col-md-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                      <div class="radio">
                        <label>
                          <input type="radio" name="jk" id="laki_laki" value="L" <?php if ($user->jk == 'L') { echo "checked"; } ?>> Laki-laki
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="jk" id="perempuan" value="P" <?php if ($user->jk == 'P') { echo "checked"; } ?>> Perempuan
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{  $user->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" data-toggle="tooltip" title="Kosongkan field ini jika tidak ingin merubah password Anda." name="password" id="password" placeholder="Password" value="">
                    </div>
                  </div>
                </div>
              </form>
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="judul" class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-6">
                      @if($user->gambar != "")
                      <img src="{{ url('/assets/img/user/'.$user->gambar) }}" alt="user img" width="250px" class="img img-thumbnail" style="margin-bottom: 10px">
                      @else
                      <img src="{{ url('/assets/img/noimage.jpg') }}" alt="user img" width="250px" class="img img-thumbnail" style="margin-bottom: 10px">
                      @endif
                      <form action="{{ url('/crud/simpan-gambar-user') }}" class="dropzone">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_user_gambar" value="{{ $user->id }}">
                        <div class="fallback">
                          <input name="file" type="file" multiple />
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button type="button" class="btn btn-primary btn-md" id="update_profil">Update</button>
                      <div id="notif" style="display: none; margin: 15px 0 0 0"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

      @if($user->status == 'Peserta')
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tabInfo" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Info profil</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tabInfo">
            <caption>Silahkan ubah data dalam kamu pada form dibawah.</caption>
            <form method="post" id="form_profil" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body" style="padding-bottom: 0;">
                <div class="form-group"><br>
                  <label for="nama" class="col-md-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $user->nama }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_induk" class="col-md-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-5">
                    <div class="radio">
                      <label>
                        <input type="radio" name="jk" id="laki_laki" value="L" <?php if ($user->jk == 'L') { echo "checked"; } ?>> Laki-laki
                      </label>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                        <input type="radio" name="jk" id="perempuan" value="P" <?php if ($user->jk == 'P') { echo "checked"; } ?>> Perempuan
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="judul" class="col-sm-3 control-label">Foto</label>
                  <div class="col-sm-6">
                    @if($user->gambar != "")
                    <img src="{{ url('/assets/img/user/'.$user->gambar) }}" alt="user img" width="250px" class="img img-thumbnail" style="margin-bottom: 10px">
                    @else
                    <img src="{{ url('/assets/img/noimage.jpg') }}" alt="user img" width="250px" class="img img-thumbnail" style="margin-bottom: 10px">
                    @endif
                    <form action="{{ url('/crud/simpan-gambar-user') }}" class="dropzone">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_user_gambar" value="{{ $user->id }}">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <a href="{{ url('/settings') }}" type="button" class="btn btn-primary btn-md" id="update_profil" >Update</a>
                    <div id="notif" style="display: none; margin: 15px 0 0 0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
    <div class="overlay" id="loading" style="display: none;">
      <i class="fa fa-refresh fa-spin"></i>
    </div>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/assets/plugins/dropzone/dropzone.css') }}">
<style type="text/css">
  .panel {
    margin-bottom: 5px !important;
  }
  .form-group {
    margin-bottom: 5px;
  }
  .wrap-is {
    cursor: pointer;
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('/assets/plugins/dropzone/dropzone.js') }}"></script>
<script>
@if($user->status == 'Mentor' or $user->status == 'Admin')
$(document).ready(function(){
  $("#update_profil").click(function(){
    $(this).hide();
    $("#notif").hide();
    $("#loading").show();
    var formData = $("#form_profil").serialize();
    $.ajax({
      type: "POST",
      url: "{{ url('/crud/update-profil') }}",
      data: formData,
      success: function(data){
        $("#loading").hide();
        if(data == 'ok'){
          $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Data berhasil diperbaharui.").fadeIn(10);
            setTimeout(function(){
              location.reload("{{ url('/settings') }}");
            }, 450);
        }else{
          $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).fadeIn(350);
          $("#update_profil").show();
        }
      }
    })
  });
});
@endif
</script>
@endpush