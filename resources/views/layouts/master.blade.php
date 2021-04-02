<!DOCTYPE html>
<html lang="az">
<head>
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#082145">

    <title>Apostil</title>
    <meta name="author" content="Nurlan Mehdi - Web Developer - Edumedia Azerbaijan">
    <meta name="copyright" content="Nurlan Mehdi - Web Developer - Edumedia Azerbaijan">
    <meta name="Description" content="Apostil">
    <meta name="keywords" content="Apostil">
    <meta property="image" content="" />
    <meta property="og:title" name="og:title" content="Apostil">
    <meta property="og:type" content="Apostil" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Apostil" />


    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
     @yield('content')
     <script src="{{asset('vendor/jQuery/jquery-3.5.1.js')}}"></script>
     <script src="{{asset('vendor/popper/popper.min.js')}}"></script>
     <script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
     <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
