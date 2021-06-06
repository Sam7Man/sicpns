@extends('layouts.app')
@section('title', 'Data Mentor')
@section('breadcrumb')
<h1>Master Data</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Mentor</li>
</ol>
@endsection
@section('content')
<?php include(app_path() . '/functions/myconf.php'); ?>
<div class="col-md-8">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Data Mentor</h3>
      @if(auth()->user()->status == "Admin")
      <div class="pull-right">
        <button type="button" class="btn btn-primary" id="btn-mentor"><i class="fa fa-edit"></i> Tambah Mentor</button>
      </div>
      @endif
    </div>
    <div class="box-body">
      @if(auth()->user()->status == "Admin")
      <div class="well" style="margin-top: 15px; display: none;" id="wrap-mentor">
        <form class="form-horizontal" id="form-mentor">
          <div class="box-body">
            <div class="form-group">
              <label for="nama" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input type="hidden" name="id" value="N">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
              </div>
            </div>
            <div class="form-group">
              <label for="no_induk" class="col-sm-3 control-label">NIP</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="no_induk" name="no_induk" placeholder="NIP" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "9">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="kota" class="col-sm-3 control-label">Asal Kota</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="kota" name="kota" placeholder="Asal Kota">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Konfirmasi Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="confirm_password" name="password" placeholder="Konfirmasi Password" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Jenis kelamin</label>
              <div class="col-sm-9">
                <div class="radio">
                  <label><input type="radio" name="jk" id="l" value="L"> Laki-laki</label> &nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="jk" id="p" value="P"> Perempuan</label>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-top: 20px">
              <div class="col-sm-offset-3 col-sm-9">
                <div id="notif" style="display: none;"></div>
                <img src="{{ url('/assets/images/facebook.gif') }}" style="display: none;" id="loading">
                <div id="wrap-btn">
                  <button type="submit" class="btn btn-success" id="simpan-mentor">Simpan</button>
                  <button type="button" class="btn btn-danger" id="batal">Batal</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <hr>
      @endif
      <table id="tabel_mentor" class="table table-hover table-condensed">
        <thead>
          <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Asal Kota</th>
            <th>Jenis kelamin</th>
            <th style="width: 120px; text-align: center;">Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: darkorange"><i class="fa fa-info-circle"></i> Informasi</h3>
    </div>
    <div class="box-body">
      <p>Daftarkan seluruh mentor malalui halaman ini. Mentor memiliki akses untuk membuat dan menerbitkan soal.</p>
    </div>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
@endpush
@push('scripts')
<script src="{{ url('assets/dist/js/sweetalert2.all.min.js') }}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
<script>
  $(document).ready(function() {
    tabel_mentor = $('#tabel_mentor').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      lengthChange: true,
      ajax: '{{ route("master.data_mentor") }}',
      columns: [{
          data: 'nama',
          name: 'nama',
          orderable: true,
          searchable: true
        },
        {
          data: 'no_induk',
          name: 'no_induk',
          orderable: true,
          searchable: true
        },
        {
          data: 'email',
          name: 'email',
          orderable: true,
          searchable: true
        },
        {
          data: 'kota',
          name: 'kota',
          orderable: true,
          searchable: true
        },
        {
          data: 'jk',
          name: 'jk',
          orderable: false,
          searchable: false
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],
      "drawCallback": function(setting) {
        $('.del-mentor').on('click', function() {
          var id_mentor = $(this).attr('id');
          var $this = $(this);
          swal({
            title: 'Yakin akan dihapus?',
            text: "Data yang telah dihapus tidak bisa dikembalikan.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                type: 'POST',
                url: "{{ url('crud/delete-mentor') }}",
                data: {
                  id_mentor: id_mentor
                },
                success: function(data) {
                  swal(
                    'Berhasil!',
                    'Data mentor berhasil dihapus.',
                    'success'
                  )
                  $this.closest('tr').hide();
                }
              })
            }
          })
        });
      }
    });

    $("#btn-mentor").click(function() {
      $("#wrap-mentor").slideToggle();
    });

    $("#batal").click(function() {
      $("#wrap-mentor").slideToggle();
    });

    $("#simpan-mentor").click(function() {
      var dataString = $("#form-mentor").serialize();
      $.ajax({
        type: "POST",
        url: "{{ url('/crud/simpan-mentor') }}",
        data: dataString,
        beforeSend: function() {
          $("#wrap-btn").hide();
          $("#loading").show();
        },
        complete: function() {
          $("#loading").hide();
          $("#wrap-btn").show();
        },
        success: function(data) {
          if (data == 'ok') {
            $("#notif").removeClass('alert alert-danger').addClass('alert alert-info').html("Mentor berhasil ditambahkan.").show();
            window.location.href = "{{ url('master/mentor') }}";
          } else {
            $("#notif").removeClass('alert alert-info').addClass('alert alert-danger').html(data).show();
          }
        }
      })
    });
  });

  var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

</script>
@endpush