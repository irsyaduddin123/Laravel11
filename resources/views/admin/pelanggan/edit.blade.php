@extends('admin.layouts.app')
@section('konten')
{{-- {{route('produk.store')}} --}}
<div class="container px-5 my-5">
    <h2 align="center">Input Pelanggan</h2>
    <form method="POST" action="{{Route('pelanggan.update' ,$pl->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="kode">Kode</label>
            <input class="form-control" id="kode" type="text" name="kode" value="{{$pl->kode}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="nama">nama</label>
            <input class="form-control" id="nama" type="text" name="nama" value="{{$pl->nama}}"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jk">Jenis Klamin</label>
            <div class="custom-control custom-radio custom-control-inline">
                @foreach ($gender as $g)
                @php
                    $checked = ($g == $pl->jk) ? 'checked' : '';
    
                @endphp
                    <input name="jk" id="radio_0{{$g}}" type="radio" class="custom-control-input" value="{{$g}}" {{$checked}}> 
                    <label for="radio_0{{$g}}" class="custom-control-label">{{$g}}</label>
                    
                @endforeach
      </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="hargaJual">Tempat Lahir</label>
            <input class="form-control" id="tmp_lahir" type="text" name="tmp_lahir" value="{{$pl->tmp_lahir}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
            <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" value="{{$pl->tgl_lahir}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" id="email" type="text" name="email" value="{{$pl->email}}" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="minStok">Foto</label>
            <input class="form-control" id="foto" type="file" name="foto" />
            @if(!empty($pl->foto))
            <img src="{{url('admin/images')}}/{{$pl->foto}}" alt="">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label" for="newField8">Pilihan Kartu</label>
            <select class="form-select" id="newField8" name="kartu_id" aria-label="New Field 8" required>
                @foreach ($kartu as $k)
                @php
                    $sel = ($k->id == $pl->kartu_id) ? 'selected' : '';
                @endphp
                <option value="{{ $k->id }}" {{$sel}}>{{ $k->nama }}</option>
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