@extends('layouts.layout')

@section('container')
@if (Session::has('message'))
        <div class="alert alert-info d-flex align-items-center w-50" role="alert">
            <svg class="shadow-lg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <style>
                    svg {
                        fill: #ffffff
                    }
                </style>
                <path
                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
            </svg>
            <div class="ms-2">{{ Session::get('message') }}</div>
        </div>
    @endif
    <form action="{{ route('customer.postcart', $data->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="row mt-5">
            <div class="col-4">
                <div class="card shadow-sm">
                    <img src="images/{{ $data->image }}" alt="" class="card-img-top p-5">
                </div>
            </div>

            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">{{ $data->name }}</h4>
                        <p class="card-text">Rp</p>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                        <hr>
                        <h4>Information</h4>
                        <p>Ini merupakan detail dari barang yang akan di beli, silahkan pelajari dengan seksama. Barang yang
                            sudah dibeli tidak dapat dikembalikan</p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Category : {{ $data->kategori->name }}</h5>
                        <img src="" alt="" class="img-card-top">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 form-control shadow">Add to Cart</button>
            </div>
        </div>
    </form>
@endsection
