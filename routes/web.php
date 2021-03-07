<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

//APLIKASI SURAT
//HOME
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/error', 'HomeController@error')->name('error');
Route::get('/persuratan', 'HomeController@aplikasi1')->name('aplikasi1');
Route::get('/ptsp', 'HomeController@aplikasi2')->name('aplikasi2');
Route::get('/contoh', 'DashboardController@contoh')->name('contoh');

Route::get('/ptsp/{id}/toblangko', 'ptspController@toblangko');
Route::get('/blangko/{id}/downloadblangko', 'ptspController@downloadblangko');

Route::group(['middleware'=>['auth','admin:admin,user']],function(){
    //AGENDA SURAT
    Route::get('/agendasurat', 'AgendaSuratController@agendasurat')->name('as');
    Route::get('/agendasurat/suratmasuk', 'AgendaSuratController@agendasuratmasuk')->name('ag_sm');
    Route::get('/agendasurat/suratkeluar', 'AgendaSuratController@agendasuratkeluar')->name('ag_sk');
    Route::get('/agendasurat/suratpengantar', 'AgendaSuratController@agendasuratpengantar')->name('ag_sp');
    Route::get('/agendasurat/suratperintah', 'AgendaSuratController@agendasuratperintah')->name('ag_sr');
    //EXCEL
    Route::get('/agendasurat/suratmasuk/export', 'AgendaSuratController@export_sm')->name('export_sm');  
    Route::get('/agendasurat/suratmasuk/to_excel','AgendaSuratController@to_export_sm')->name('to_export_sm');
    Route::get('/agendasurat/suratmasuk/exportDokumen', 'AgendaSuratController@exportDokumen')->name('exportDokumen');
    Route::get('/agendasurat/suratmasuk/to_excel_ag_sm','AgendaSuratController@to_excel_ag_sm')->name('to_excel_ag_sm');      
    Route::get('/agendasurat/suratkeluar/exportDokumen_sk', 'AgendaSuratController@exportDokumen_sk')->name('exportDokumen_sk');
    Route::get('/agendasurat/suratkeluar/to_excel_ag_sk','AgendaSuratController@to_excel_ag_sk')->name('to_excel_ag_sk');      
    Route::get('/agendasurat/suratperintah/exportDokumen_sr', 'AgendaSuratController@exportDokumen_sr')->name('exportDokumen_sr');
    Route::get('/agendasurat/suratperintah/to_excel_ag_sr','AgendaSuratController@to_excel_ag_sr')->name('to_excel_ag_sr');    
    Route::get('/agendasurat/suratpengantar/exportDokumen_sp', 'AgendaSuratController@exportDokumen_sp')->name('exportDokumen_sp');
    Route::get('/agendasurat/suratpengantar/to_excel_ag_sp','AgendaSuratController@to_excel_ag_sp')->name('to_excel_ag_sp');    
});
Route::group(['middleware'=>['auth','admin:admin,pegawai']],function(){
    Route::post('/suratmasuk/{id}/verifikasi', 'SuratMasukController@verifikasi');
    Route::post('/suratkeluar/{id}/verifikasi', 'SuratKeluarController@verifikasi');
    Route::post('/suratperintah/{id}/verifikasi', 'SuratPerintahController@verifikasi');
    Route::post('/suratpengantar/{id}/verifikasi', 'SuratPengantarController@verifikasi');
});

Route::group(['middleware'=>['auth','admin:kajari,admin']],function(){
    Route::post('/suratmasuk/{id}/store', 'SuratMasukController@store_dpsm')->name('store_dpsm');
    Route::get('/disposisi_surat_masuk/{id}/hapus', 'SuratMasukController@hapus_dsm');
    Route::post('/disposisi_surat_masuk/{id}/update', 'SuratMasukController@update_dsm');
    Route::get('/disposisi_surat_masuk/{id}/edit', 'SuratMasukController@editdisposisisuratmasuk');
    Route::post('/suratmasuk/{id}/disposisi/konfirmasi', 'SuratMasukController@konfirmasi');
});
Route::group(['middleware'=>['auth','admin:user,admin,kajari,kaurtu,pegawai']],function(){
    Route::get('/suratmasuk', 'SuratMasukController@suratmasuk')->name('sm');
    Route::get('/suratmasuk/{id}/lihat', 'SuratMasukController@lihatsuratmasuk');
    
    Route::get('/suratmasuk/{id}/disposisi', 'SuratMasukController@disposisi');
    Route::get('/disposisi_surat_masuk/{id}/lihat', 'SuratMasukController@lihat_dsm');
    Route::get('/disposisi_surat_masuk/{id}/lihat/exportDisposisi', 'SuratMasukController@exportDisposisi');
    Route::get('/{id}/lihat/', 'SuratMasukController@lihat_disposisi');

    Route::get('/suratkeluar', 'SuratKeluarController@suratkeluar')->name('sk');
    Route::get('/suratkeluar/{id}/lihat', 'SuratKeluarController@lihatsuratkeluar');

    Route::post('/suratkeluar/{id}/lampiran', 'SuratKeluarController@store_lsk')->name('store_lsk');
    Route::get('/lampiran_surat_keluar/{id}/hapus', 'SuratKeluarController@hapus_lsk');

    Route::get('/suratperintah', 'SuratPerintahController@suratperintah')->name('sr');
    Route::get('/suratperintah/{id}/lihat', 'SuratPerintahController@lihatsuratperintah');

    Route::post('/suratperintah/{id}/lampiran', 'SuratPerintahController@store_lspr')->name('store_lspr');
    Route::get('/lampiran_surat_perintah/{id}/hapus', 'SuratPerintahController@hapus_lspr');

    Route::get('/suratpengantar', 'SuratPengantarController@suratpengantar')->name('sp');
    Route::get('/suratpengantar/{id}/lihat', 'SuratPengantarController@lihatsuratpengantar');

    Route::post('/suratpengantar/{id}/lampiran', 'SuratPengantarController@store_lsp')->name('store_lsp');
    Route::get('/lampiran_surat_pengantar/{id}/hapus', 'SuratPengantarController@hapus_lsp');
});

Route::group(['middleware'=>['auth','admin:user,admin']],function(){
    //DASHBOARD
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //MASTERSURAT
    Route::get('/mastersurat', 'MasterSuratController@mastersurat')->name('ms');
    Route::get('/klasifikasisurat', 'MasterSuratController@klasifikasisurat')->name('ks');
    Route::get('/klasifikasisurat/tambah', 'MasterSuratController@tambahklasifikasisurat')->name('ks_tambah');
    Route::post('/klasifikasisurat/store', 'MasterSuratController@store_klasifikasisurat')->name('store_ks');
    Route::get('/klasifikasisurat/{id}/hapus_ks', 'MasterSuratController@hapus_ks');
    Route::get('/klasifikasisurat/{id}/edit', 'MasterSuratController@editklasifikasisurat');
    Route::post('/klasifikasisurat/{id}/update', 'MasterSuratController@update_ks');

    Route::get('/sifatsurat', 'MasterSuratController@sifatsurat')->name('ss');
    Route::get('/sifatsurat/tambah', 'MasterSuratController@tambahsifatsurat')->name('ss_tambah');
    Route::post('/sifatsurat/store', 'MasterSuratController@store_sifatsurat')->name('store_ss');
    Route::get('/sifatsurat/{id}/hapus_ss', 'MasterSuratController@hapus_ss');
    Route::get('/sifatsurat/{id}/edit', 'MasterSuratController@editsifatsurat');
    Route::post('/sifatsurat/{id}/update', 'MasterSuratController@update_ss');

    Route::get('/masterharap', 'MasterSuratController@masterharap')->name('mh');
    Route::get('/masterharap/tambah', 'MasterSuratController@tambahmasterharap')->name('mh_tambah');
    Route::post('/masterharap/store', 'MasterSuratController@store_masterharap')->name('store_mh');
    Route::get('/masterharap/{id}/hapus_mh', 'MasterSuratController@hapus_mh');
    Route::get('/masterharap/{id}/edit', 'MasterSuratController@editmasterharap');
    Route::post('/masterharap/{id}/update', 'MasterSuratController@update_mh');
    //SURAT MASUK
    Route::get('/buatsuratmasuk', 'SuratMasukController@buatsuratmasuk')->name('bsm');
    Route::post('/suratmasuk/store', 'SuratMasukController@store_sm')->name('store_sm');
    Route::get('/suratmasuk/{id}/hapus_sm', 'SuratMasukController@hapus_sm');
    Route::get('/suratmasuk/{id}/edit', 'SuratMasukController@editsuratmasuk');
    Route::post('/suratmasuk/{id}/update', 'SuratMasukController@update_sm');
    
    Route::post('/suratmasuk/{id}/lampiran', 'SuratMasukController@store_lsm')->name('store_lsm');
    Route::get('/lampiran_surat_masuk/{id}/hapus', 'SuratMasukController@hapus_lsm');

    //SURAT KELUAR
    
    Route::get('/buatsuratkeluar', 'SuratKeluarController@buatsuratkeluar')->name('bsk');
    Route::post('/suratkeluar/store', 'SuratKeluarController@store_sk')->name('store_sk');
    Route::get('/suratkeluar/{id}/hapus_sk', 'SuratKeluarController@hapus_sk');
    Route::get('/suratkeluar/{id}/edit', 'SuratKeluarController@editsuratkeluar');
    Route::post('/suratkeluar/{id}/update', 'SuratKeluarController@update_sk');
    
    //SURAT PERINTAH
    
    Route::get('/buatsuratperintah', 'SuratPerintahController@buatsuratperintah')->name('bsr');
    Route::post('/suratperintah/store', 'SuratPerintahController@store_sr')->name('store_sr');
    Route::get('/suratperintah/{id}/hapus_sr', 'SuratPerintahController@hapus_sr');
    Route::get('/suratperintah/{id}/edit', 'SuratPerintahController@editsuratperintah');
    Route::post('/suratperintah/{id}/update', 'SuratPerintahController@update_sr');
    
    //SURAT PENGANTAR
    
    Route::get('/buatsuratpengantar', 'SuratPengantarController@buatsuratpengantar')->name('bsp');
    Route::post('/suratpengantar/store', 'SuratPengantarController@store_sp')->name('store_sp');
    Route::get('/suratpengantar/{id}/hapus_sp', 'SuratPengantarController@hapus_sp');
    Route::get('/suratpengantar/{id}/edit', 'SuratPengantarController@editsuratpengantar');
    Route::post('/suratpengantar/{id}/update', 'SuratPengantarController@update_sp');
    
    

   
});

//MASTER PEGAWAI
Route::group(['middleware'=>['auth','admin:admin']],function(){
    Route::get('/masterpegawai', 'MasterPegawaiController@masterpegawai')->name('mp');
    Route::get('/masterpegawai/{id}/hapus','MasterPegawaiController@hapus');
    Route::post('/masterpegawai/store_pegawai', 'MasterPegawaiController@store_pegawai')->name('store_pegawai');
});

//PTSP
Route::post('/ptsp/store_ptsp', 'ptspController@store_ptsp')->name('store_ptsp');
Route::get('/ptsp/ajukan_ptsp', 'ptspController@ajukan_ptsp')->name('ajukan_ptsp');
Route::get('/ptsp/{id}/edit', 'ptspController@editptsp');
Route::get('/ptsp/{id}/hapus', 'ptspController@hapus_ptsp');
Route::post('/ptsp/{id}/update', 'ptspController@update_ptsp');