@extends('layouts.layout')

@section('container')
    @if (Session::has('statusLogout'))
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
            <div class="ms-2">{{ Session::get('statusLogout') }}</div>
        </div>
    @endif

    <head>
        <style>
            body {
                background-color: #f9f9f9;
            }

            .login-container {
                max-width: 400px;
                margin: 0 auto;
                margin-top: 100px;
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .login-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
            }

            .form-control {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                margin-bottom: 15px;
                width: 100%;
                box-sizing: border-box;
            }

            .login-form button[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                width: 100%;
            }

            .login-form button[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="container login-container">
            <h2 class="login-title">Login</h2>
            <form class="login-form" action="{{ route('postLogin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                    @if (Session::has('status'))
                        <div><span class="text-danger">{{ Session::get('status') }}</span></div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </body>

    </html>
@endsection
