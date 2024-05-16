@extends('admin.layouts.app')
@section('konten')

<div class="container px-5 my-5">
    <h2 align="center">Input Produk</h2>
    <form method="POST" action="{{route('produk.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="kode">Kode</label>
            <input class="form-control" id="kode" type="text" name="kode" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="nama">nama</label>
            <input class="form-control" id="nama" type="text" name="nama" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="hargaBeli">Harga beli</label>
            <input class="form-control" id="hargaBeli" type="text" name="harga_beli" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="hargaJual">Harga Jual</label>
            <input class="form-control" id="hargaJual" type="text" name="harga_jual" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="stok">stok</label>
            <input class="form-control" id="stok" type="text" name="stok" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="minStok">Min stok</label>
            <input class="form-control" id="minStok" type="text" name="min_stok" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="newField8">Jenis Produk</label>
            <select class="form-select" id="newField8" name="jenis_produk_id" aria-label="New Field 8">
                @foreach ($jenis_produk as $jenis )
                <option value="{{$jenis->id}}">{{$jenis->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="submitButton" name="submit" type="submit">Submit</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

@endsection