@extends('layouts.layout')
@if (Session::has('status'))
    <div class="mt-5"><span class="text-success">{{ Session::get('status') }}</span></div>
@endif
@section('container')
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banner/2.jpg" class="d-block w-100 rounded shadow" alt="..." style="max-height: 300px">
            </div>
            <div class="carousel-item">
                <img src="images/banner/1.jpg" class="d-block w-100 rounded shadow" alt="..."
                    style="max-height: 300px">
            </div>
            <div class="carousel-item">
                <img src="images/banner/3.jpg" class="d-block w-100 rounded shadow" alt="..."
                    style="max-height: 300px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-2 mt-5">
                    <div class="card shadow ">
                        <img src="images/{{ $item->image }}" alt="" class="img-card-top">
                        <div class="card-body">
                            <h6 class="card-title">{{ $item->name }}</h6>
                            <p class="card-text fw-bold">Rp{{ $item->price }}
                            </p>
                            <a href="{{ route('show', $item->id) }}"
                                class="btn btn-primary text-white shadow w-100">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
