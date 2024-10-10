@extends('layouts.dashboard')

@section('title')
    <title>Halaman Barang</title>
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
    <p class="mb-4">Ini adalah halaman untuk menampilkan data barang</p>
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#tambahBarang">Tambah Barang</button>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            @can('manage-data')
                                <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img width="300" src="{{ asset("storage/images/$product->image") }}" alt="{{ $product->image }}">
                                </td>
                                @can('manage-data')
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBarang{{ $product->id }}">Edit</button>
                                        <div class="modal fade" id="editBarang{{ $product->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Barang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ url("/products/$product->id") }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="form-label" for="name">Nama</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $product->name ?? null }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="category_id">Kategori</label>
                                                                <select class="form-select" name="category_id" id="category">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="description">Deskripsi</label>
                                                                <input type="text" name="description" class="form-control" value="{{ $product->description ?? null }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="price">Harga</label>
                                                                <input type="number" name="price" class="form-control" value="{{ $product->price ?? null }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="image">Gambar</label>
                                                                <input type="file" name="image" class="form-control-file" value="{{ $product->image ?? null }}">
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
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBarang{{ $product->id }}">Delete</button>
                                        <div class="modal fade" id="deleteBarang{{ $product->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Barang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ url("/products/$product->id") }}">
                                                            @csrf
                                                            @method("DELETE")
                                                            <p>Apakah kamu yakin mau hapus data {{ $product->name }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Ya</button>
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
            {{ $products->links() }}
        </div>
    </div>

    <div class="modal fade" id="tambahBarang">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Tambah Barang</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/products') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="category_id">Kategori</label>
                            <select class="form-select" name="category_id" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="description">Deskripsi</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="price">Harga</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="image">Gambar</label>
                            <input class="form-control" type="file" name="image">
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