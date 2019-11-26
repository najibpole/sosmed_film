<?php

Route::get('/', 'WelcomeController');
Route::get('/masuk', 'WelcomeController@masukForm')->name('masuk');
Route::post('/masuk', 'WelcomeController@masuk');
Route::get('/daftar', 'WelcomeController@daftarForm')->name('daftar');
Route::post('/daftar', 'WelcomeController@daftar');
Route::get('/film', 'FilmController@list')->name('list-film');
Route::get('/film/detail/{film}', 'FilmController@detail')->name('film-detail');
Route::get('/film/pencarian', 'FilmController@pencarian')->name('cari-film');
Route::get('/film/kategori/{kategori}', 'FilmController@kategori')->name('film-kategori');

Route::middleware(\App\Http\Middleware\MemberMasuk::class)->group(function(){
	Route::get('/pertemanan/tambah-teman/{member}', 'PertemananController@tambah')->name('tambah-teman');
	Route::get('/pertemanan/meminta-pertemanan', 'PertemananController@memintaPertemanan')->name('meminta-pertemanan');
	Route::get('/pertemanan/meminta-pertemanan/batalkan/{teman}', 'PertemananController@batalPertemanan')->name('batal-pertemanan');
	Route::get('/pertemanan/permintaan-pertemanan', 'PertemananController@permintaanPertemanan')->name('permintaan-pertemanan');
	Route::get('/pertemanan/permintaan-pertemanan/tolak/{teman}', 'PertemananController@tolakPertemanan')->name('tolak-pertemanan');
	Route::get('/pertemanan/permintaan-pertemanan/terima/{teman}', 'PertemananController@terimaPertemanan')->name('terima-pertemanan');
	Route::get('/pertemanan/daftar-teman', 'PertemananController@daftarTeman')->name('pertemanan');
	// film
	Route::get('/film/sukai-film/{film}', 'FilmController@sukai')->name('sukai-film');
	Route::get('/film/tidaksukai-film/{film}', 'FilmController@tidaksukai')->name('tidaksukai-film');
	Route::post('/film/kirim-komentar/{film}', 'FilmController@kirimKomentar')->name('kirim-komentar');
	Route::get('/keluar', 'WelcomeController@keluar')->name('keluar');
});

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function(){
	Route::get('/', 'DashboardController')->name('dashboard');
	Route::get('/profil', 'DashboardController@profil')->name('profil');
	Route::put('/profil', 'DashboardController@updateProfil')->name('profil.update');
	Route::resource('kategori-film', 'KategoriFilmController');
	Route::resource('film', 'FilmController');
	Route::resource('member', 'MemberController');
	Route::resource('komentar', 'KomentarController');
});

Auth::routes();