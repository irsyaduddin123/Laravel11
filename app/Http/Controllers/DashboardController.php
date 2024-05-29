<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Kartu;
use App\Models\JenisProduk;
use DB;



class DashboardController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::count();
        $pelanggan = Pelanggan::count();
        $kartu = Kartu::count();
        $jenis_produk = JenisProduk::count();
        $produkData = Produk::select('kode', 'harga_jual')->get();
        // $produkData=json()['data'];
        // pengubahan data ke json
        $jkl = DB::table('pelanggan') 
        -> selectRaw('jk, count(jk)as jumlah')
        ->groupBy('jk')
        ->get();
        return view('admin.dashboard', compact('produk', 'pelanggan', 'kartu', 'jenis_produk','produkData',"jkl"));
    }
}
