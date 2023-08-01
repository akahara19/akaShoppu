@extends('layouts.layout')

@section('container')
    @if (Session::has('status'))
        <div class="alert alert-success d-flex align-items-center w-50" role="alert">
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
            <div class="ms-2">{{ Session::get('status') }}</div>
        </div>
    @endif
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banner/2.jpg" class="d-block w-100 rounded shadow" alt="..."
                    style="max-height: 300px">
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
                    <div class="card shadow">
                        <img src="images/{{ $item->image }}" alt="" class="img-card-top" style="min-height: 200px; object-fit: cover
                        2">
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
