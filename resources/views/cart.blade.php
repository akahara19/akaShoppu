<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head> 

@extends('layouts.layout')

@section('container')
@if (Session::has('status'))
    <div class="alert alert-success d-flex align-items-center w-50" role="alert">
        <svg class="shadow-lg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>
        <div class="ms-2">{{ Session::get('status') }}</div>
    </div>
@endif
    <div class="container mt-5 px-5">
        <h4>Cart</h4>
        @foreach ($detailtransaksi as $item)
            <div class="card mt-3">
                <div class="row">
                    <div class="col p-2">
                        <img src="{{ asset('images/' . $item->produk->image) }}" class="card-img p-2 rounded-5 h-100" style="object-fit: cover">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->produk->name }}</h3>
                            <hr>
                            <p class="card-text">Harga Rp.{{ number_format($item->produk->price, 0, ',', '.') }}</p>
                            <input type="number" name="jumlah" class="form-control" value="{{ $item->qty }}" required>
                            <hr>
                            <p class="card-text">Total Harga Rp. {{ number_format($item->totalharga, 0, ',', '.') }} </p>
                        </div>
                    </div>

                    <div class="col-2 p-4">
                        <a href="{{ route('customer.pay', $item->id) }}" class="btn btn-primary text-white">Pay</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
