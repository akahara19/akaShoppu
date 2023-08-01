@extends('layouts.layout')

@section('container')
    <div class="container mt-5">
        <a href="{{ route('showadd') }}" class="btn btn-primary">Add Product</a>
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
                            <img src="{{ if() }}" alt="" width="100">
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