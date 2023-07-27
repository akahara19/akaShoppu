<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rikudou Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        @yield('container')
    </div>
    @include('layouts.footer')
    <script src="js/bootstrap.min.js"></script>
</body>
</html>