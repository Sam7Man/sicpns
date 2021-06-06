@extends('layouts.app')
@section('title', $peserta->nama)
@section('breadcrumb')
<h1>Laporan</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="{{ url('/tryout/laporan') }}">Laporan</a></li>
	<li class="active">Detail</li>
</ol>
@endsection
@section('content')
<?php include(app_path() . '/functions/myconf.php'); ?>
<div class="col-md-8">
	
	@if($user->status == 'Admin' or $user->status == 'Mentor')
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Detail Jawaban Peserta</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-2 col-sm-4">
					@if($peserta->gambar != '')
					<img class="profile-user-img img-responsive img-rounded" src="{{ url('/assets/img/user/'.$peserta->gambar) }}" alt="User profile picture" style="width: 100%">
					@else
					<img class="profile-user-img img-responsive img-rounded" src="{{ url('/assets/img/noimage.jpg') }}" alt="User profile picture">
					@endif
				</div>
				<div class="col-md-10 col-sm-8">
					<table style="background: #e6ebf2" class="table table-condensed table-bordered table-striped">
						<tr>
							<td>Nama peserta</td>
							<td>{{ $peserta->nama }}</td>
						</tr>
						<tr>
							<td>ID Peserta</td>
							<td>{{ $peserta->no_induk }}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{ $peserta->email }}</td>
						</tr>
						<tr>
							<td>Asal Kota</td>
							<td>{{ $peserta->kota }}</td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>{{ $peserta->getKelas->nama }}</td>
						</tr>
						<tr>
							<td>Paket soal</td>
							<td>{{ $soal->paket }}</td>
						</tr>
						<tr>
							<td>Waktu ujian</td>
							<td>{{ timeStampIndo($hasil_ujian->created_at) }}</td>
						</tr>
						<tr>
							<td>Status ujian</td>
							<td>
								@if($hasil_ujian->status == 1)
								<label class="label label-info">Selesai</label>
								@else
								<label class="label label-warning">Sedang berlangsung</label>
								@endif
							</td>
						</tr>
						<tr>
							<td>Nilai</td>
							<td><b>{{ ($hasil_ujian->jumlah_nilai) }}</b></td>
						</tr>
					</table>
					
					@if($hasil_ujian->status == 1)
					<a target="_blank" href="{{ url('/cetak/pdf/hasil-ujian-perpeserta/'.$peserta->id.'/'.$soal->id) }}" class="btn btn-warning btn-md" data-toggle='tooltip' title="Cetak laporan hasil ujian paket soal {{ $soal->paket }} untuk peserta an. {{ $peserta->nama }}"><i class="fa fa-file-pdf-o"></i> Cetak Laporan</a>
					@endif
				</div>
			</div>
			<hr>
			<h4>Soal Pilihan Ganda</h4>
			<hr style="margin: 4px 0 5px">
			<table id="table_hasil_ujian" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width: 10px"></th>
						<th>Soal</th>
						<th>Kunci</th>
						<th>Jawaban</th>
						<th>Nilai</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@endif

	@if($user->status == 'Peserta')
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Detail Jawaban Peserta</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-2 col-sm-4">
					@if($peserta->gambar != '')
					<img class="profile-user-img img-responsive img-rounded" src="{{ url('/assets/img/user/'.$peserta->gambar) }}" alt="User profile picture" style="width: 100%">
					@else
					<img class="profile-user-img img-responsive img-rounded" src="{{ url('/assets/img/noimage.jpg') }}" alt="User profile picture">
					@endif
				</div>
				<div class="col-md-10 col-sm-8">
					<table style="background: #e6ebf2" class="table table-condensed table-bordered table-striped">
						<tr>
							<td>Nama peserta</td>
							<td>{{ $peserta->nama }}</td>
						</tr>
						<tr>
							<td>ID Peserta</td>
							<td>{{ $peserta->no_induk }}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{ $peserta->email }}</td>
						</tr>
						<tr>
							<td>Asal Kota</td>
							<td>{{ $peserta->kota }}</td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>{{ $peserta->getKelas->nama }}</td>
						</tr>
						<tr>
							<td>Paket soal</td>
							<td>{{ $soal->paket }}</td>
						</tr>
						<tr>
							<td>Waktu ujian</td>
							<td>{{ timeStampIndo($hasil_ujian->created_at) }}</td>
						</tr>
						<tr>
							<td>Status ujian</td>
							<td>
								@if($hasil_ujian->status == 1)
								<label class="label label-info">Selesai</label>
								@else
								<label class="label label-warning">Sedang berlangsung</label>
								@endif
							</td>
						</tr>
						<tr>
							<td>Nilai</td>
							<td>
								@if($hasil_ujian->status == 1)
								<b>{{ ($hasil_ujian->jumlah_nilai) }}</b>
								@else
								
								@endif
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
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
	function delay(callback, ms) {
		var timer = 0;
		return function() {
			var context = this,
				args = arguments;
			clearTimeout(timer);
			timer = setTimeout(function() {
				callback.apply(context, args);
			}, ms || 0);
		};
	}


	$(document).ready(function() {
		table_hasil_ujian = $('#table_hasil_ujian').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,

			ajax: {
				url: "{!! route('tryout.hasilPeserta') !!}",
				data: {
					"id_user": '{{ $peserta->id }}'
				},
			},
			columns: [{
					data: 'empty_space',
					name: 'empty_space',
					orderable: false,
					searchable: false
				},
				{
					data: 'dataSoal',
					name: 'dataSoal',
					orderable: true,
					searchable: true
				},
				{
					data: 'kunci',
					name: 'kunci',
					orderable: true,
					searchable: true,
				},
				{
					data: 'pilihan',
					name: 'pilihan',
					orderable: true,
					searchable: true,
				},
				{
					data: 'score',
					name: 'score',
					orderable: true,
					searchable: true,
				},
			],
			"drawCallback": function(setting) {}
		});

	});
</script>
@endpush