@extends('layouts.app')
@section('title', 'Laporan')
@section('breadcrumb')
<h1>Laporan</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Laporan</li>
</ol>
@endsection
@section('content')
<?php include(app_path() . '/functions/myconf.php'); ?>
<div class="col-md-8">
	@if($user->status == 'Admin' or $user->status == 'Mentor')
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Laporan per-Kelas</h3>
		</div>
		<div class="box-body">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th class="text-center" style="width: 25px">#</th>
						<th>Nama Kelas</th>
						<th class="text-center">Jumlah Peserta</th>
						<th class="text-center" style="width: 50px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@if($kelas->count())
					<?php $no = $kelas->firstItem(); ?>
					@foreach($kelas as $data_kelas)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td>{{ ucwords($data_kelas->nama) }}</td>
						<td class="text-center">{{ number_format($data_kelas->peserta->count(),0,'.','.').' peserta' }}</td>
						<td align="center"><a href="{{ url('/tryout/laporan/detail-kelas/'.$data_kelas->id) }}" class="btn btn-success btn-xs">Detail</a></td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="3" class="alert alert-danger">Data kelas kosong.</td>
					</tr>
					@endif
				</tbody>
			</table>
			{!! $kelas->render() !!}
		</div>
	</div>
	@endif

	@if($user->status == 'Peserta')
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Laporan Hasil Ujian per-Kelas</h3>
		</div>
		<div class="box-body">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th class="text-center" style="width: 25px">#</th>
						<th>Nama Kelas</th>
						<th class="text-center">Jumlah Peserta</th>
						<th class="text-center" style="width: 50px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@if($kelas->count())
					<?php $no = $kelas->firstItem(); ?>
					@foreach($kelas as $data_kelas)
					<tr>
						{{Auth::user()->peserta}}
						<td class="text-center">{{ $no++ }}</td>
						<td>{{ $data_kelas->nama }}</td>
						<td class="text-center">{{ number_format($data_kelas->peserta->count(),0,'.','.').' peserta' }}</td>
						<td align="center"><a href="{{ url('/tryout/laporan/detail-kelas/'.$data_kelas->id) }}" class="btn btn-success btn-xs">Detail</a></td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="3" class="alert alert-danger">Data kelas kosong.</td>
					</tr>
					@endif
				</tbody>
			</table>
			{!! $kelas->render() !!}
		</div>
	</div>
	@endif
</div>
<div class="col-md-4">
	@if($user->status == 'Mentor' or $user->status == 'Admin')
	<div class="box box-danger">
		<div class="box-body">
			<p><i class="fa fa-question-circle" style="color: indianred"></i> Daftar kelas berisi data paket soal yang dikerjakan oleh peserta. Klik tombol detail untuk memilih kelas.</p>
		</div>
	</div>
	@endif
</div>
@endsection