<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Kartu;
use Illuminate\Http\Request;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pelanggan = Pelanggan::all();
        // $pelanggan = Pelanggan::with('kartu')->get();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kartu = Kartu::all();
        $gender = ['L', 'P'];
        return view('admin.pelanggan.create', compact('kartu', 'gender'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!empty($request->foto)) {
            // buat nama file baru
            $fileNama = 'foto' . uniqid() . '.' . $request->foto->extension();
            // simpan file ke folder public
            $request->foto->move(public_path('admin/images'), $fileNama);
        } else {
            $fileNama = '';
        }
        //
        $pelanggan = new Pelanggan;
        $pelanggan->kode = $request->kode;
        $pelanggan->nama = $request->nama;
        $pelanggan->jk = $request->jk;
        $pelanggan->tmp_lahir = $request->tmp_lahir;
        $pelanggan->tgl_lahir = $request->tgl_lahir;
        $pelanggan->email = $request->email;
        $pelanggan->foto = $fileNama;
        $pelanggan->kartu_id = $request->kartu_id;
        $pelanggan->save();
        return redirect('admin/pelanggan')->with('success', 'Data Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // shwo elequent
        $pelanggan = Pelanggan::findOrFail($id);
        // dd($pelanggan); data dummy
        return view('admin.pelanggan.detail', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pl = Pelanggan::find($id);
        $kartu = Kartu::all();
        $gender = ['L', 'P'];
        return view('admin.pelanggan.edit', compact('pl', 'kartu', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //     //foto lama 
        //    $fotoLama = Pelanggan::select('foto')->where('id', $id)->get();
        //    foreach($fotoLama as $f1){
        //        $fotoLama = $f1->foto;
        //    }
        //    //jika foto sudah ada yang terupload 
        //    if(!empty($request->foto)){
        //        //maka proses selanjutnya 
        //    if(!empty($fotoLama->foto)) unlink(public_path('admin/images'.$fotoLama->foto));
        //    //proses ganti foto
        //        $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
        //        //setelah tau fotonya sudah masuk maka tempatkan ke public
        //        $request->foto->move(public_path('admin/images'), $fileName);
        //    } else{
        //        $fileName = $fotoLama;
        //    }
        //     //tambah data menggunakan eloquent
        //     $pelanggan = Pelanggan::find($id);
        //     $pelanggan->kode = $request->kode;
        //     $pelanggan->nama = $request->nama;
        //     $pelanggan->jk = $request->jk;
        //     $pelanggan->tmp_lahir = $request->tmp_lahir;
        //     $pelanggan->tgl_lahir = $request->tgl_lahir;
        //     $pelanggan->email =$request->email;
        //     $pelanggan->foto = $fileName;
        //     $pelanggan->kartu_id = $request->kartu_id;
        //     $pelanggan->save();
        //     return redirect('admin/pelanggan');

        // Mengambil foto lama
        $pelanggan = Pelanggan::select('foto')->where('id', $id)->first();
        $fotoLama = $pelanggan ? $pelanggan->foto : null;

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($fotoLama && file_exists(public_path('admin/images/' . $fotoLama))) {
                unlink(public_path('admin/images/' . $fotoLama));
            }

            // Membuat nama file baru yang unik
            $fileName = 'foto-' . $id . '.' . $request->foto->extension();

            // Memindahkan file ke direktori yang ditentukan
            $request->foto->move(public_path('admin/images'), $fileName);
        } else {
            // Jika tidak ada file baru, tetap gunakan foto lama
            $fileName = $fotoLama;
        }

        // Menggunakan Eloquent untuk memperbarui data pelanggan
        $pelanggan = Pelanggan::find($id);
        $pelanggan->kode = $request->kode;
        $pelanggan->nama = $request->nama;
        $pelanggan->jk = $request->jk;
        $pelanggan->tmp_lahir = $request->tmp_lahir;
        $pelanggan->tgl_lahir = $request->tgl_lahir;
        $pelanggan->email = $request->email;
        $pelanggan->foto = $fileName;
        $pelanggan->kartu_id = $request->kartu_id;
        $pelanggan->save();

        return redirect('admin/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
