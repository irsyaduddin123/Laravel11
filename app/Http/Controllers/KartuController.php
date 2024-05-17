<?php

namespace App\Http\Controllers;

use App\Models\Kartu;
use Illuminate\Http\Request;

class KartuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ini adalah controller kartu yang menggunakan penulisan eloquent ORM
    public function index()
    {
        //
        $kartu = Kartu::all();
        return view('admin.kartu.index',compact('kartu'));
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
        // Validasi
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'diskon' => 'required|numeric',
            'iuran' => 'required|numeric',
        ]);
        // Menuliskan code dengan karakterisitik eloquent
        // $kartu -> variable, new deklarasi kelas models, kartu adalah kelas model
        $kartu = new Kartu;
        $kartu ->kode = $request->kode;
        $kartu ->nama = $request->nama;
        $kartu ->diskon = $request->diskon;
        $kartu ->iuran = $request->iuran;
        $kartu ->save();
        return redirect('admin/kartu');
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
