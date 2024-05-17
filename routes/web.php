<?php

use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\RemoveRegisterMockObjectsFromTestArgumentsRecursivelyAttribute;
use Psy\VersionUpdater\GitHubChecker;
// use App\Http\Controllers\JenisProduk;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('front.home');
});


Route::get('/pertama', function () {
    return view('hello');
});

Route::get('/salam', function () {
    return "<H1>Selamat Pagi Irsyad</H1>";
});

Route::get('/staff/{nama}/{divisi}',function($nama, $divisi){
    return 'Nama Pegawai '.$nama. ' <br> Departemen: ' .$divisi;
});

Route::get('/daftar_nilai', function(){
    // return view yg mengarahkan kedalam view yang didalamnya ada folder nilai dan daftar_nilai
    return view('nilai.daftar_nilai');
});

Route::get('/dashboard', function(){
    return view('admin.dashboard');
});
// prefix grouping adalah mengelompokkan routing ke satu jenis route
Route::prefix('admin')->group(function(){

// route memanggil controller setiap fungsi
// nanti linknya menggunakan url, ada didalam view
Route::get('/jenis_produk',[JenisProdukController::class,'index']);
Route::post('jenis_produk/store', [JenisProdukController::class, 'store']);

Route::get('/kartu',[KartuController::class,'index']);
Route::post('/kartu/store', [KartuController::class, 'store']);
// Route::get('/pelanggan',[PelangganController::class,'index']);

// route dengan pemanggilan class
Route::resource('produk', ProdukController::class);


Route::resource('pelanggan', PelangganController::class);

// jenis Produk eloquen
// Route::post('/jenis', [JenisProdukController::class, 'store'])->name('jenis.store');
// Route::get('/jenis_produk',[JenisProdukController::class,'index'])->name('jenis.index');



});























//Tugas kelompok
// 1. Buat Repository github untuk tugas Akhir akses private
// 2. Ketua Kelompok yang jadi branch master
// 3. laravel yang diinstal oleh ketua kelompok di push ke GitHub
// 4. anggota tidak perlu install laravel, melainkan git clone terhadap repo tersebut 
// 5. setelah cloning lakukan composer intall didalam comand prompt 
// 6. collaborate mentor 