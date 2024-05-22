@extends('admin.layouts.app')
@section('konten')

    <div class="container px-5 my-5">
        <h2 align="center">Input Produk</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="kode">Kode</label>
                <input class="form-control @error('kode') is-invalid @enderror" id="kode" type="text" name="kode"/>
                @error('kode')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="nama">nama</label>
                <input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text" name="nama"/>
                @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="hargaBeli">Harga beli</label>
                <input class="form-control @error('harga_beli') is-invalid @enderror" id="hargaBeli" type="text" name="harga_beli"  />
                @error('harga_beli')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="hargaJual">Harga Jual</label>
                <input class="form-control @error('harga_jual') is-invalid @enderror" id="hargaJual" type="text" name="harga_jual"  />
                @error('harga_jual')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="stok">stok</label>
                <input class="form-control @error('stok') is-invalid @enderror" id="stok" type="text" name="stok"  />
                @error('stok')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="minStok">Min stok</label>
                <input class="form-control @error('min_stok') is-invalid @enderror" id="minStok" type="text" name="min_stok"  />
                @error('min_stok')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="minStok">Foto</label>
                <input class="form-control @error('foto') is-invalid @enderror" id="foto" type="file" name="foto" />
                @error('foto')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="textarea" class="col-4 col-form-label">Deskripsi</label>
                <textarea id="textarea" name="deskripsi" cols="40" rows="5" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="newField8">Jenis Produk</label>
                <select class="form-select" id="newField8" name="jenis_produk_id" aria-label="New Field 8">
                    @foreach ($jenis_produk as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a
                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
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
