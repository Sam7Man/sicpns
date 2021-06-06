<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
	return view('welcome');
});

// Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('soal/{id}','SoalController@show');

// reute group for crud
Route::group(['prefix' => 'crud'], function () {
	Route::post('simpan-soal', 'SoalController@simpanSoal');
	Route::post('update-profil', 'CrudController@updateProfil');
	Route::post('simpan-materi', 'CrudController@simpanMateri');
	Route::post('terbit-soal', 'CrudController@terbitSoal');
	Route::post('delete-soal', 'CrudController@deleteSoal');
	Route::post('simpan-detail-soal', 'SoalController@simpanDetailSoal');
	Route::post('simpan-detail-soal-via-excel', 'SoalController@simpanDetailSoalExcel');
	Route::post('simpan-gambar-materi', 'CrudController@simpanGambarMateri');
	Route::post('hapus-gambar-materi', 'CrudController@hapusGambarMateri');
	Route::post('simpan-gambar-user', 'CrudController@simpanGambarUser');
	Route::post('simpan-mentor', 'MentorController@simpanMentor');
	Route::post('simpan-peserta', 'CrudController@simpanPeserta');
	Route::post('update-peserta', 'CrudController@updatePeserta');
	Route::post('simpan-peserta-via-excel', 'CrudController@simpanPesertaViaExcel');
	Route::post('update-img-peserta', 'CrudController@updateImgPeserta');
	Route::post('delete-peserta', 'CrudController@deletePeserta');
	Route::post('update-mentor', 'CrudController@updateMentor');
	Route::post('delete-mentor', 'CrudController@deleteMentor');
	Route::post('simpan-kelas', 'CrudController@simpanKelas');
	Route::post('delete-kelas', 'CrudController@deleteKelas');
	Route::post('reset-ujian', 'CrudController@resetUjian');
});

Route::group(['prefix' => 'settings'], function () {
	Route::get('/', 'HomeController@settings')->name('settings');
});

Route::group(['prefix' => 'master'], function () {
	// route master mentor
	Route::group(['prefix' => 'mentor'], function () {
		Route::get('/', 'MentorController@index')->name('master.mentor');
		Route::get('data-mentor', 'MentorController@dataMentor')->name('master.data_mentor');
		Route::get('detail/{id}', 'MentorController@detailMentor');
		Route::get('ubah/{id}', 'MentorController@ubahMentor');
	});
	// route master kelas
	Route::get('kelas', 'KelasController@index')->name('master.kelas');
	Route::get('data-kelas', 'KelasController@dataKelas')->name('master.data_kelas');
	Route::get('kelas/detail/{id}', 'KelasController@detailKelas')->name('master.detail_kelas');
	Route::get('detail-kelas/', 'KelasController@detailKelasPeserta')->name('master.detail_kelas_peserta');
	Route::get('kelas/ubah/{id}', 'KelasController@ubahKelas')->name('master.ubah_kelas');
	// route master peserta
	Route::group(['prefix' => 'peserta'], function () {
		Route::get('/', 'PesertaController@index')->name('peserta');
		Route::get('data-peserta', 'PesertaController@dataPeserta')->name('master.data_peserta');
		Route::get('detail/{id}', 'PesertaController@detailPeserta');
		Route::get('edit/{id}', 'PesertaController@editPeserta');
		Route::get('delete', 'PesertaController@delete');
		Route::get('get-btn-delete/{password}', 'PesertaController@getBtnDelete');
		Route::get('delete-all', 'PesertaController@deleteAll');
	});
});

Route::group(['prefix' => 'tryout'], function () {
	Route::group(['prefix' => 'materi'], function () {
		Route::get('/', 'MateriController@index')->name('tryout.materi');
		Route::get('/get-materi-mentor', 'MateriController@dataMateriMentor')->name('tryout.dataMateriMentor');
		Route::get('/detail/{id}', 'MateriController@detail')->name('tryout.detailMateri');
		Route::get('/ubah/{id}', 'MateriController@ubah')->name('tryout.detailMateri');
	});
	Route::group(['prefix' => 'laporan'], function () {
		Route::get('/', 'LaporanController@index')->name('tryout.laporan');
		Route::get('/detail-kelas/{id}', 'LaporanController@detailKelas')->name('tryout.laporan');
		Route::get('data-paket-soal', 'LaporanController@data_paket_soal')->name('tryout.laporan.data_paket_soal');
		Route::get('detail-kelas/{id_kelas}/paket-soal/{id_soal}', 'LaporanController@detailPaketSoalPerKelas');
		Route::get('data-kelas-paket-soal', 'LaporanController@dataKelasPaketSoal')->name('tryout.laporan.data_kelas_paket_soal');
		Route::get('{id_soal}/{id_user}', 'LaporanController@detailLaporanPeserta')->name('tryout.detailLaporanPeserta');
		Route::get('hasil-peserta', 'LaporanController@hasilPeserta')->name('tryout.hasilPeserta');
	});
	Route::group(['prefix' => 'soal'], function () {
		Route::get('/', 'SoalController@index')->name('soal');
		Route::get('/ubah/{id}', 'SoalController@ubahSoal')->name('soal.ubah');
		Route::get('/detail/{id}', 'SoalController@detail')->name('tryout.detail-soal');
		Route::get('/get-soal', 'SoalController@dataSoal')->name('tryout.get-soal');
		Route::get('/get-soal-home', 'SoalController@dataSoalHome')->name('tryout.get-soal-home');
		Route::get('/get-detail-soal', 'SoalController@dataDetailSoal')->name('tryout.get-detail-soal');
		Route::get('/detail/ubah/{id}', 'SoalController@ubahDetailSoal')->name('tryout.ubah-detail-soal');
		Route::get('/detail/data-soal/{id}', 'SoalController@detailDataSoal')->name('tryout.detail-data-soal');
		Route::get('/essay/data', 'DetailSoalEssayController@data');
		Route::get('/essay/simpan-score', 'JawabController@simpanScore');
		Route::resource('/essay', 'DetailSoalEssayController');
	});
});
Route::get('/download-file-format/{filename}', 'DownloadController@download')->name('download');
Route::group(['prefix' => 'cetak'], function () {
	Route::get('/kartu-ujian', 'ErrorHandleController@e404')->name('soal');
	Route::get('/berita-acara', 'ErrorHandleController@e404')->name('soal');
	Route::get('/excel/hasil-ujian-perkelas/{soal}/{kelas}', 'LaporanController@excelHasilUjianPerkelas');
	Route::get('/pdf/hasil-ujian-perpeserta/{peserta}/{soal}', 'LaporanController@pdfHasilUjianPerpeserta');
});
Route::get('/activity', 'HomeController@activity');

Route::group(['prefix' => 'peserta'], function () {
	Route::get('data-materi', 'PesertaController@dataMateri')->name('peserta.materi');
	Route::get('materi/detail/{id}', 'PesertaController@detailMateri');
	Route::get('materi', 'PesertaController@materi');
	Route::get('ujian', 'PesertaController@ujian');
	Route::get('ujian/get-detail-essay', 'PesertaController@getDetailEssay');
	Route::get('ujian/simpan-jawaban-essay', 'PesertaController@simpanJawabanEssay');
	Route::get('ujian/detail/{id}', 'PesertaController@detailUjian');
	Route::get('ujian/finish/{id}', 'PesertaController@finishUjian');
	Route::get('ujian/get-soal/{id}', 'PesertaController@getSoal');
	Route::post('ujian/jawab', 'PesertaController@jawab');
	Route::post('ujian/kirim-jawaban', 'PesertaController@kirimJawaban');
});
