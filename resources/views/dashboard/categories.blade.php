@extends('layouts.dashboard')

@section('title')
    <title>Halaman Category</title>
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>
    <p class="mb-4">Ini adalah data semua kategori dari barang-barang yang ada.</p>
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#tambahBarang">Tambah Kategori</button>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            @can('manage-data')
                                <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                @can('manage-data')
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBarang{{ $category->id }}">Edit</button>
                                        <div class="modal fade" id="editBarang{{ $category->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ url("/categories/$category->id") }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name">Nama</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $category->name ?? null }}">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBarang{{ $category->id }}">Delete</button>
                                        <div class="modal fade" id="deleteBarang{{ $category->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ url("/categories/$category->id") }}">
                                                            @method("DELETE")
                                                            @csrf
                                                            <p>Apakah kamu yakin mau hapus data {{ $category->name }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
    </div>

    <div class="modal fade" id="tambahBarang">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Tambah Kategori</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/categories') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection