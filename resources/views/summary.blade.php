@extends('layouts.layout')

@section('container')
    <div class="container mt-5">
        <h5>Summary</h5>
        <hr>
        @foreach ($detailtransaksi as $detail)
        <div class="card mt-3">
            <div class="row">
                <div class="col-2 p-2">
                    <img src="{{ asset('images/' .$detail->produk->image) }}" class="img-thumbnail">
                </div>

                <div class="col-10">
                    <div class="card-body">
                        <h3 class="card-title">{{ $detail->produk->name }}</h3>
                        <h5 class="card-title">Invoice : {{ $detail->transaksi->kode }}</h5>
                        <hr>
                        <p class="card-text">Harga : {{ number_format($detail->produk->price, 0 , ',' , '.') }}</p>
                        <p class="card-text">Jumlah : {{ $detail->qty }}</p>
                        <hr>
                        <p class="card-text">Total Rp. {{ number_format($detail->totalharga, 0 , ',' , '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection