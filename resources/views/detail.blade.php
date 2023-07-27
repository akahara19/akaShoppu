@extends('layouts.layout')

@section('container')
    <form action="{{ route('customer.cart', $data->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="images/{{ $data->image }}" alt="" class="card-img-top">
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $data->name }}</h4>
                        <p class="card-text">Rp</p>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                        <hr>
                        <h4>Keterangan</h4>
                        <p>Ini merupakan detail dari barang yang akan di beli, silahkan pelajari dengan seksama. Barang yang sudah dibeli tidak dapat dikembalikan</p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Kategori : {{ $data->kategori->name }}</h5>
                        <img src="" alt="" class="img-card-top">
                    </div>
                </div>
                <button class="btn btn-success mt-3 form-control">Beli</button>
            </div>
        </div>
    </form>
@endsection