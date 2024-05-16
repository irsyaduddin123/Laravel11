<?php
// jenis produk dan produk akan dibuat menggunakan
// type penulisan query builder

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisProduk;
// use DB
// library DB digunakan ketika menggunakan penulisan query builder
use Illuminate\Support\Facades\DB;

class JenisProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fungsi ini biasanya digunakan untuk mengarahkan ke file index
        // Variable jenis ini mendeklarasikan table yang di ambil dari model 
        // Kemudian Variable tersebut dikirimkan ke vie
        $jenis = DB::table('jenis_produk')->get();
        // return view mengarahkan ke view dan compact mengirim variableke view
        return view('admin.jenis.index',compact('jenis'));
        // return view('admin.jenis.index',['jenis'=>$jenis]); <= Menggunakan ARRAY
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //menambahkan data menggunakan query builder
        DB::table('jenis_produk')->insert([
            'nama' => $request->nama,
        ]);
        // return redirect mengarahkan ke file setelah proses
        // return redirect('admin/jenis_produk');
        return redirect()->back();


        // $validatedData = $request->validate([
        //     'nama' => 'required|string|max:255',
        // ], [
        //     'nama.required' => 'Nama',

        // ]);
        // $jenis = new JenisProduk();

        // $jenis->nama = $validatedData['nama'];


        // $jenis->save();

        // return redirect()->route('jenis.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
