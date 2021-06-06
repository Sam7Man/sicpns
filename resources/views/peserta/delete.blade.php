@extends('layouts.app')
@section('title', 'Hapus semua peserta')
@section('breadcrumb')
  <h1>Hapus Semua Peserta</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{ url('/master/peserta') }}">Peserta</a></li>
    <li class="active">Hapus Semua Peserta</li>
  </ol>
@endsection
@section('content')
	<div class="col-md-12">
	  <div class="box box-success">
	    <div class="box-header with-border">
	      <h3 class="box-title">Hapus Semua Peserta</h3>
	    </div>
	    <div class="box-body">
	    	<p class="alert alert-danger"><i class="fa fa-info-circle"></i> Yakin seluruh data peserta akan dihapus? Dengan menghapus data peserta, semua data yang berhubungan dengan peserta akan ikut terhapus. Data yang akan terhapus meliputi data nilai (hasil tryout/latihan), data kelas (isi kelas akan hilang). Data yang telah dihapus juga tidak bisa dikembalikan (undo).</p>
	    	<div class="col-md-offset-3 col-md-6 col-xs-12">
		    	<center>
		    		<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Tuliskan Password Anda Untuk Membuka Tombol Hapus!">
		    		<div class="notif" style="display: none;"></div>
		    	</center>
	    	</div>
	    </div>
	  </div>
	</div>
@endsection
@push('scripts')
	<script type="text/javascript">
		function delay(callback, ms) {
		  var timer = 0;
		  return function() {
		    var context = this, args = arguments;
		    clearTimeout(timer);
		    timer = setTimeout(function () {
		      callback.apply(context, args);
		    }, ms || 0);
		  };
		}

		$(document).ready(function() {
			$('#password').keyup(delay(function (e) {
			  var password = $(this).val();
			  $.ajax({
			  	type: "GET",
			  	url: "{{ url('master/peserta/get-btn-delete') }}/"+password,
			  	success: function(data) {
		  			$('.notif').html(data).show();
			  	}
			  })
			}, 700));

			$(document).on('click', '#delete-all', function() {
				$.ajax({
			  	type: "GET",
			  	url: "{{ url('master/peserta/delete-all') }}",
			  	success: function(data) {
		  			window.location.href = "{{ url('master/peserta') }}";
			  	}
			  })
			});
		});
	</script>
@endpush