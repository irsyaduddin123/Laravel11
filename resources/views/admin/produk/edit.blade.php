@extends('admin.layouts.app')
@section('konten')

<div class="container px-5 my-5">
    <h2 align="center">Input Produk</h2>
    @foreach ($produk as $p)
        
    <form method="POST" action="{{route('produk.update' ,$p->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="kode">Kode</label>
            <input class="form-control" id="kode" type="text" name="kode" value="{{$p->kode}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="nama">nama</label>
            <input class="form-control" id="nama" type="text" name="nama" value="{{$p->nama}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="hargaBeli">Harga beli</label>
            <input class="form-control" id="hargaBeli" type="text" name="harga_beli"  value="{{$p->harga_beli}}"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="hargaJual">Harga Jual</label>
            <input class="form-control" id="hargaJual" type="text" name="harga_jual" value="{{$p->harga_jual}}"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="stok">stok</label>
            <input class="form-control" id="stok" type="text" name="stok" value="{{$p->stok}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="minStok">Min stok</label>
            <input class="form-control" id="minStok" type="text" name="min_stok"value="{{$p->min_stok}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="minStok">Foto</label>
            <input class="form-control" id="foto" type="file" name="foto" />
            @if (!@empty($p->foto))
            <img src="{{url('admin/images')}}/{{$p->foto}}" alt="">                
            @endif
        </div>
        <div class="mb-3">
            <label for="textarea" class="col-4 col-form-label">Deskripsi</label> 
            <textarea id="textarea" name="deskripsi" cols="40" rows="5" class="form-control" >{{$p->deskripsi}}</textarea>
        </div> 
        <div class="mb-3">
            <label class="form-label" for="newField8">Jenis Produk</label>
            <select class="form-select" id="newField8" name="jenis_produk_id" aria-label="New Field 8">
                @foreach ($jenis_produk as $jenis )
                @php
                    $selected = ($jenis->id==$p->jenis_produk_id)?'selected':'';
                @endphp
                <option value="{{$jenis->id}}"{{$selected}}>{{$jenis->nama}}</option>
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
    @endforeach
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

@endsection