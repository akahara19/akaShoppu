@extends('layouts.layout')

@section('container')
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
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
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
