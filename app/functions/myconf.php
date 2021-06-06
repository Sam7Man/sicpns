<?php
	function getStatus($status){
		if ($status != "") {
			if ($status == 'Admin') {
				$status_user = 'Admin';
			}elseif($status == 'Mentor'){
				$status_user = 'Mentor';
			}elseif ($status == 'Peserta') {
				$status_user = 'Peserta';
			}else{
				$status_user = 'Peserta';
			}
		}else{
			$status_user = 'Invalid';
		}
		return $status_user;
	}
	function getJenisSoal($j){
		if ($j != "") {
			if ($j == '1') {
				$jenis = 'Soal Ujian';
			}elseif($j == '2'){
				$jenis = 'Soal Latihan';
			}
		}else{
			$jenis = 'Invalid';
		}
		return $jenis;
	}
	function timeStampIndo($tgl) {
		if ($tgl != "") {
			$exp_tgl = explode(" ", $tgl);
			$tgl_exp = explode("-", $exp_tgl[0]);
			$waktu_exp = explode(":", $exp_tgl[1]);
			$tanggal = $tgl_exp[2].'-'.$tgl_exp[1].'-'.$tgl_exp[0].' '.$waktu_exp[0].':'.$waktu_exp[1].':'.$waktu_exp[2];

		}else{
			$tanggal = 'error';
		}
		return $tanggal;
	}
	function timeStampIndoOnly($tgl) {
		if ($tgl != "") {
			$exp_tgl = explode(" ", $tgl);
			$tgl_exp = explode("-", $exp_tgl[0]);
			$waktu_exp = explode(":", $exp_tgl[1]);
			$tanggal = $tgl_exp[2].'-'.$tgl_exp[1].'-'.$tgl_exp[0];

		}else{
			$tanggal = 'error';
		}
		return $tanggal;
	}
	function jenisSoal($jenis) {
		if ($jenis != "") {
			if ($jenis == 1) {
				$jenis_soal = "Ujian";
			}else{
				$jenis_soal = "Latihan";
			}
		}else{
			$jenis_soal = 'Undefined';
		}
		return $jenis_soal;
	}
?>