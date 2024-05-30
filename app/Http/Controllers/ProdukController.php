<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\JenisProduk;
use DB;
use RealRashid\SweetAlert\Facades\Alert;



class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
            ->select('produk.*', 'jenis_produk.nama as jenis')
            ->get();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        return view('admin.produk.create', compact('jenis_produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi data input
        
        $request->validate([
            'kode' => 'required|string|max:10|unique:produk,kode',
            'nama' => 'required|string|max:45',
            'harga_jual' => 'required|numeric|min:0',
            'harga_beli' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'min_stok' => 'required|integer|min:0',
            // 'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'jenis_produk_id' => 'required|exists:jenis_produk,id',
        ], [
            'kode.max' => 'Kode maksimal 10 karakter',
            'kode.required' => 'Kode produk wajib diisi.',
            'kode.unique' => 'Kode produk sudah ada.',
            'nama.required' => 'Nama produk wajib diisi.',
            'nama.max' => 'Nama produk maksimal 45 karakter.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.min' => 'Harga jual minimal 0.',
            'harga_beli.required' => 'Harga beli wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
            'min_stok.required' => 'Minimal stok wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'File foto harus berupa extensi jpeg,png,jpg,gif,svg.',
            'foto.max' => 'File foto maksimal 2 MB.',
            // 'jenis_produk_id.required' => 'Jenis produk wajib diisi.',
            // 'jenis_produk_id.exists' => 'Jenis produk tidak valid.'
        ]);
        // Proses upload foto
        // jika foto ada yang terupload
        if (!empty($request->foto)) {
            // buat nama file baru
            $fileNama = 'foto' . uniqid() . '.' . $request->foto->extension();
            // simpan file ke folder public
            $request->foto->move(public_path('admin/images'), $fileNama);
        } else {
            $fileNama = '';
        }
        // tambah data produk dari create
        DB::table('produk')->insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'min_stok' => $request->min_stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileNama,
            'jenis_produk_id' => $request->jenis_produk_id,
        ]);
        // Alert::success('Tambah Produk', 'berhasil menambahkan produk');
        // return redirect()->route('produk.index')->with('success', 'berhasil menambahkan produk');
        return redirect('admin/produk')->with('success', 'berhasil menambahkan produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
            ->select('produk.*', 'jenis_produk.nama as jenis')
            ->where('produk.id', $id)
            ->get();
        return view('admin.produk.detail', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //jenis_produk 
        $jenis_produk = DB::table('jenis_produk')->get();
        //produk
        $produk = DB::table('produk')->where('id', $id)->get();
        return view('admin.produk.edit', compact('jenis_produk', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // //Foto lama
        // $fotoLama = DB::table('produk')->select('foto')->where('id',$id)->get();
        // foreach($fotoLama as $f1){
        //     $fotoLama = $f1->foto;
        // }
        // // jika foto sudah terupload maka tergantikan
        // if (!empty($request->foto)) {
        //     if (!empty($fotoLama->foto)) unlink(public_path('admin/images/'.$fotoLama->foto));
        //     $fileNama = 'foto'.$request->$id.'.'.$request->foto->extension();

        //     $request->foto->move(public_path('admin/images'), $fileNama);
        // }else{
        //     $fileNama = $fotoLama;
        // }

        // DB::table('produk')->where('id',$id)->update([
        //     'kode' =>$request->kode,
        //     'nama' => $request->nama,
        //     'harga_jual' => $request->harga_jual,
        //     'harga_beli' => $request->harga_beli,
        //     'stok' => $request->stok,
        //     'min_stok' => $request->min_stok,
        //     'deskripsi' => $request->deskripsi,
        //     'foto' => $fileNama,
        //     'jenis_produk_id' => $request->jenis_produk_id,
        // ]);
        // return redirect('admin/produk');

        // Code ubahan
        // Mengambil foto lama
        $produk = DB::table('produk')->select('foto')->where('id', $id)->first();
        $fotoLama = $produk ? $produk->foto : null;

        // Mengunggah dan mengganti foto jika ada file baru yang diunggah
        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($fotoLama && file_exists(public_path('admin/images/' . $fotoLama))) {
                unlink(public_path('admin/images/' . $fotoLama));
            }

            // Membuat nama file baru yang unik
            $fileNama = 'foto' . uniqid() . '.' . $request->foto->extension();

            // Memindahkan file ke direktori yang ditentukan
            $request->foto->move(public_path('admin/images'), $fileNama);
        } else {
            // Jika tidak ada file baru, tetap gunakan foto lama
            $fileNama = $fotoLama;
        }

        // Memperbarui data produk
        DB::table('produk')->where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'min_stok' => $request->min_stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileNama,
            'jenis_produk_id' => $request->jenis_produk_id,
        ]);

        return redirect('admin/produk');
        // ->with('success', 'Produk berhasil diperbarui.')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('produk')->where('id', $id)->delete();
        return redirect('admin/produk');
    }
}
