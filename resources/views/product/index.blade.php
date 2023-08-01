@extends('layouts.layout')

@section('container')
    <div class="container mt-5">
        <a href="{{ route('showadd') }}" class="btn btn-primary">Add Product</a>
        <table class="table table-striped table-hover table-responsive-sm mt-3">
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
                            <img src="{{ url('images/' . $produk->image) }}" alt="Gambar" width="100">
                        </td>
                        <td>{{ $produk->name }}</td>
                        <td>{{ number_format($produk->price, 0 , ',' , '.') }}</td>
                        <td class="">
                            <a href="{{ route('showEdit', $produk->id) }}" class="btn btn-warning shadow">Edit</a>
                            <form action="{{ route('delete', $produk->id) }}" method="POST" class="" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger shadow" onclick="return confirm('Are you sure to delete product?')">Delete</button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $produks->render() }}
    </div>
@endsection