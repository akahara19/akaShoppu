@extends('layouts.layout')

@section('container')
    <form action="{{ route('customer.payprocess', $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <h5>Upload Bukti Pembayaran</h5>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/' . $produk->image) }}" alt="" class="card-img-top p-5">
                    </div>
                </div>

                <div class="col-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">{{ $produk->name }}</h3>
                            <hr>
                            <p class="card-text">Harga: Rp. {{ number_format($produk->price, 0, ',', '.') }}</p>
                            <p class="card-text">Total Harga: Rp.
                                <b>{{ number_format($detailtransaksi->totalharga, 0, ',', '.') }}</b></p>
                            <p class="card-text">Jumlah : {{ $detailtransaksi->qty }}</p>
                            <hr>
                            <div class="mb-3">
                                <label for="" class="form-control">Bukti Pembayaran
                                    <input type="file" name="bukti" accept="images/*" id="" required>
                                </label>

                                <hr>
                                <h5>Keterangan : </h5>
                                <p>Silahkan lakukan tranfer ke bank berikut dan tunggu konfirmasi dari kami</p>
                                <button type="submit" class="btn btn-primary shadow">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
