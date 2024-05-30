<?php

use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/staff/{nama}/{divisi}', function ($nama, $divisi) {
    return 'Nama Pegawai ' . $nama . ' <br> Departemen: ' . $divisi;
});

Route::get('/daftar_nilai', function () {
    // return view yg mengarahkan kedalam view yang didalamnya ada folder nilai dan daftar_nilai
    return view('nilai.daftar_nilai');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
// prefix grouping adalah mengelompokkan routing ke satu jenis route

// pembatas middleware pembatas atau validasi antara visitor
Route::group(['middleware' => ['auth','checkActive', 'role:admin|manager|staff']], function () {

    Route::prefix('admin')->group(function () {
        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/{user}/activate', [UserController::class, 'activate'])->name('admin.user.activate');
        Route::get('/profile', [UserController::class, 'showProfile']);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');  //menggunakan nama
        // route memanggil controller setiap fungsi
        // nanti linknya menggunakan url, ada didalam view
        Route::get('/jenis_produk', [JenisProdukController::class, 'index']);
        Route::post('jenis_produk/store', [JenisProdukController::class, 'store']);

        Route::get('/kartu', [KartuController::class, 'index']);
        Route::post('/kartu/store', [KartuController::class, 'store']);
        // Route::get('/pelanggan',[PelangganController::class,'index']);

        // route dengan pemanggilan class
        Route::resource('produk', ProdukController::class);


        Route::resource('pelanggan', PelangganController::class);

        // jenis Produk eloquen
// Route::post('/jenis', [JenisProdukController::class, 'store'])->name('jenis.store');
// Route::get('/jenis_produk',[JenisProdukController::class,'index'])->name('jenis.index');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
