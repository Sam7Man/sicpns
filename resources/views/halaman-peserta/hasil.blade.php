@extends('layouts.app')
@section('title', 'Hasil -' . $peserta->nama)
@section('breadcrumb')
<h1>Laporan</h1>
<ol class="breadcrumb">
	<li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Hasil</li>
</ol>
@endsection
@section('content')
<?php include(app_path() . '/functions/myconf.php'); ?>
<div class="col-md-8">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Detail Jawaban Peserta</h3>
		</div>
		<div class="box-body">
			<div class="row">
				
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
							<td>Nilai</td>
							<td><b>{{ ($hasil_ujian->jumlah_nilai + $nilai_essay) }}</b></td>
						</tr>
					</table>
				</div>
			</div>
        </div>
	</div>
</div>

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

		$(document).on('keyup', '.nilai-essay', delay(function() {
			const essay_id = $(this).data('id');
			const id_user = $(this).data('user');
			const score = $(this).val();
			$.ajax({
				type: "GET",
				url: "{{ url('tryout/soal/essay/simpan-score') }}",
				data: {
					essay_id: essay_id,
					id_user: id_user,
					score: score
				},
				success: function(data) {
					console.log(data);

				}
			})
		}, 500));
	});
</script>
@endpush