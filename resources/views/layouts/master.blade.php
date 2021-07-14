<!DOCTYPE html>
<html lang="az">
<head>
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
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap-grid.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap-reboot.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
@if(auth()->check())
    <div class="dashboard-page">
        @yield('modal')
        <div class="dashboard-page-left">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-user-info">
                        <div class="emblem">
                            <img src="{{asset('files/Emblem.png')}}">

                        </div>
                        <div class="emblem-text">
                            <h6>{{__('language.az_resp')}}<br/>{{__('language.xin')}}</h6>
                        </div>
                        <div class="profile-photo">
                            <img src="{{asset('files/icons/user-icon.png')}}">
                        </div>


                        <div class="user-info p-4 bd-highlight">
                            <div class="username">{{Auth::user()->username}}</div>
                            <div class="nav-bar"></div>
                            <label class="info-text">{{__('language.xinIstifadechi')}}</label>
                        </div>
                        <div class="reload"><a href="{{route('dashboard')}}">Əsas Səhifə</a></div>
                        <div style="margin-top: 30px;" class="section_header_navbar_item dropdown">
                            <a href="#" class="info-text section_header_navbar_item--link dropdown-toggle" id="langDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('language.qanunvericilik')}}&nbsp
                            </a>
                            <div class="dropdown-menu" aria-labelledby="langDropdown">
                                <a target="_blank" href="http://www.e-qanun.az/framework/5827  " class="dropdown-item">Xarici rəsmi sənədlərin leqallaşdırılması tələbini ləğv edən Konvensiya</a>
                                <a target="_blank" href="https://mfa.gov.az/files/shares/Consulate/Apostille.pdf  " class="dropdown-item">Azәrbaycan Respublikasının Xarici İşlәr Nazirliyi tәrәfindәn rәsmi sәnәdlәrә şәhadәtnamәnin (apostilin) verilmәsi Qaydaları</a>
                                <a target="_blank" href="https://www.hcch.net/en/instruments/conventions/specialised-sections/apostille" class="dropdown-item">Beynəlxalq Xüsusi Hüquq üzrə Haaqa Konfransının internet səhifəsi </a>
                            </div>
                        </div>
                        <div style="margin-top: 30px" class="new-user-for-superadmin"><a href="{{route('new.user.page')}}">Tənzimləmələr</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-page-right">
            <div class="row header">
                <div class="col-md-11"><h5>{{__('language.elektronApostilReyestri')}}</h5></div>

                <div class="col-md-1">
                    <div class="row logout">
                        <div class="col-md-5"><h6>{{__('language.chixish')}}</h6></div>
                        <div class="col-md-7"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><img src="{{asset('files/icons/exit-icon.png')}}"></a>
                            <form id="logout-form" action="{{route('logout.handle')}}" method="post">{{csrf_field()}}</form></div>
                    </div>


                </div>
            </div>
            @yield('content')
        </div>
    </div>
@else
    @yield('content')
@endif

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
@yield('javascript')
</body>
</html>
