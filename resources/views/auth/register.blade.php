@extends('layouts.layout')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto" style="margin-top: 7%">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('customer.register') }}" method="POST">
                            @csrf
                            <h3 class="text-center">Silahkan isi Data Anda</h3>
                            <hr>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                
                            <div class="d-flex justify-content-end pt-4">
                                <button type="submit" class="btn btn-primary w-25 shadow">Register</button>
                            </div>
                            <p class="card-text text-center pt-2">Already have an account? <a href="{{ route('showLogin') }}" class="text-decoration-none">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection