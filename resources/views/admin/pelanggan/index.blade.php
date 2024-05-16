@extends('admin.layouts.app')
@section('konten')

<div class="container-fluid px-4">
    <h1 class="mt-4">Kartu</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode </th>
                        <th>Nama </th>
                        <th>Jenis Klamin </th>
                        <th>Tempat Lahir </th>
                        <th>Tanggal Lahir </th>
                        <th>Email </th>
                        <th>Kartu </th>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode </th>
                        <th>Nama </th>
                        <th>Jenis Kelamin </th>
                        <th>Tempat Lahir </th>
                        <th>Tanggal Lahir </th>
                        <th>Email </th>
                        <th>Kartu </th>
                        
                </tfoot>
                <tbody>
                    @foreach ($pelanggan as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->kode}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->jk}}</td>
                        <td>{{$p->tmp_lahir}}</td>
                        <td>{{$p->tgl_lahir}}</td>
                        <td>{{$p->email}}</td>
                        {{-- <td>{{$p->nama}}</td> --}}
                        <td>{{ $p->kartu->nama}}</td> 

                        
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection