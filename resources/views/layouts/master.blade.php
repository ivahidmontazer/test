<!DOCTYPE html>
<html>
<head>
    <title>
        Products
    </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <br>
            <br>
            @yield('content')
        </div>
    </div>
</div>
</body>
<footer>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</footer>
</html>