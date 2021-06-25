<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#082145">

    <title>Apostillərin elektron reyestri</title>
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
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap-grid.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap-reboot.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/style.user.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body class="user-page-body">
@yield('content')

<script src="{{asset('vendor/jQuery/jquery-3.5.1.js')}}"></script>
<script src="{{asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@yield('javascript')
</body>
</html>
