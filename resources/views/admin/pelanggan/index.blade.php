@extends('admin.layouts.app')
@section('konten')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kartu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables Pelanggan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-md btn-primary">
                    <i class="fa-solid fa-square-plus">
                    </i></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Kode </th> --}}
                            <th>Nama </th>
                            <th>Jenis Klamin </th>
                            {{-- <th>Tempat Lahir </th>
                            <th>Tanggal Lahir </th> --}}
                            <th>Email </th>
                            <th>Kartu </th>
                            <th>actiom</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            {{-- <th>Kode </th> --}}
                            <th>Nama </th>
                            <th>Jenis Kelamin </th>
                            {{-- <th>Tempat Lahir </th>
                            <th>Tanggal Lahir </th> --}}
                            <th>Email </th>
                            <th>Kartu </th>
                            <th>Action</th>


                    </tfoot>
                    <tbody>
                        @foreach ($pelanggan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $p->kode }}</td> --}}
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jk }}</td>
                                {{-- <td>{{ $p->tmp_lahir }}</td>
                                <td>{{ $p->tgl_lahir }}</td> --}}
                                <td>{{ $p->email }}</td>
                                {{-- <td>{{$p->nama}}</td> --}}
                                <td>{{ $p->kartu->nama }}</td>
                                <td> <a href="{{ Route('pelanggan.show', $p->id) }}" class="btn btn-mdl btn-info"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="{{ Route('pelanggan.edit', $p->id) }}" class="btn btn-mdl btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    {{-- modal hapus --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-mdl btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#hapus{{ $p->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="hapus{{ $p->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Yakin Akan Menghapus data {{ $p->nama }}
                                            </div>
                                            {{-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ Route('produk.destroy', $p->id) }}" class="btn btn-primary">Delete</a>
                                                <button type="button" class="btn btn-primary">Delete</button>
                                            </div> --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
