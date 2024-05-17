@extends('admin.layouts.app')
@section('konten')

@foreach ($produk as $p)
<h1>Hallo {{$p->nama}}</h1>
<h1>Harga Jual {{$p->harga_jual}}</h1>
<h1>Jenis Produk {{$p->jenis}}</h1>
{{-- <h1>Hallo {{$p->nama}}</h1> --}}
    
@endforeach

@endsection