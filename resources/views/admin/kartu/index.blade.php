@extends('admin.layouts.app')
@section('konten')

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kartu</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- {{ route('lowongan.store') }} --}}
        {{-- <form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required placeholder="Tambah Kartu">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form> --}}
        <form action="{{url('admin/kartu/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Tambah Kode">
                </div>
                <div class="form-group mb-3" >
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Tambah Nama">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Tambah Diskon">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="iuran" name="iuran" placeholder="Tambah Iuran">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
{{-- Batas Modal --}}

<div class="container-fluid px-4">
    <h1 class="mt-4">Kartu</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <a href="#" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="fa-regular fa-square-plus "></i>
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode </th>
                        <th>Nama </th>
                        <th>Diskon </th>
                        <th>Iuran </th>
                        
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode </th>
                        <th>Nama </th>
                        <th>Diskon </th>
                        <th>Iuran </th>
                        
                </tfoot>
                <tbody>
                    @foreach ($kartu as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->kode}}</td>
                        <td>{{$k->nama}}</td>
                        <td>{{$k->diskon}}</td>
                        <td>{{$k->iuran}}</td>
                        
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection