<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head> 

@extends('layouts.layout')

@section('container')
    <div class="container mt-5">
        <a href="{{ route('admin.showadd') }}" class="btn btn-primary">Add Product</a>
        <table class="table table-responsive-sm mt-3">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>
                            <img src="{{ asset('images/' .$produk->image) }}" alt="" width="100">
                        </td>
                        <td>{{ $produk->name }}</td>
                        <td>{{ number_format($produk->price, 0 , ',' , '.') }}</td>
                        <td>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $produks->render() }}
    </div>
@endsection