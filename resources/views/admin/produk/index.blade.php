@extends('admin.layouts.app')
@section('konten')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">

        </div>
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('produk.create') }}" class="btn btn-md btn-primary">
                    <i class="fa-solid fa-square-plus">
                    </i></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Kode</th> --}}
                            <th>Nama</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Minimal Stok</th>
                            <th>Jenis Produk</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <th>No</th>
                        {{-- <th>Kode</th> --}}
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Jenis Produk</th>
                        <th>Action</th>
                    </tfoot>
                    <tbody>

                        @foreach ($produk as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $p->kode }}</td> --}}
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->harga_beli }}</td>
                                <td>{{ $p->harga_jual }}</td>
                                <td>{{ $p->stok }}</td>
                                <td>{{ $p->min_stok }}</td>
                                <td>{{ $p->jenis }}</td>
                                <td> <a href="{{ Route('produk.show', $p->id) }}" class="btn btn-mdl btn-info"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="{{ Route('produk.edit', $p->id) }}" class="btn btn-mdl btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    {{-- modal hapus --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-mdl btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $p->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1"
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
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline;">
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
