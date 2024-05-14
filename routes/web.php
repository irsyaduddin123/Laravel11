<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\RemoveRegisterMockObjectsFromTestArgumentsRecursivelyAttribute;
use Psy\VersionUpdater\GitHubChecker;


Route::get('/', function () {
    return view('welcome');
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























//Tugas kelompok
// 1. Buat Repository github untuk tugas Akhir akses private
// 2. Ketua Kelompok yang jadi branch master
// 3. laravel yang diinstal oleh ketua kelompok di push ke GitHub
// 4. anggota tidak perlu install laravel, melainkan git clone terhadap repo tersebut 
// 5. setelah cloning lakukan composer intall didalam comand prompt 
// 6. collaborate mentor 