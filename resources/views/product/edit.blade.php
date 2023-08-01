

@extends('layouts.layout')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 col-6-sm mx-auto mt-5">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h3 class="text-center">Edit Product Data</h3>
                            <hr>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $produk->name }}" >
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $produk->price }}">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="image" value=""  accept="images/*">
                            </div>
                            <div class="mb-3">
                                <label for="kategori"  class="form-label">Kategori</label>
                                <select class="form-control" name="kategori_id" value="" >
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end px-3 pt-2">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection