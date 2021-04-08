@extends('layouts.master')
@section('title','Login')
@section('content')
<div class="container-fluid">
    <div  class="row">
        <div class="login-page col-md-12">
            <div class="emblem">
                <img src="{{asset('files/Emblem.png')}}">
            </div>
            <div class="emblem-text">
                <h6>{{__('language.az_resp')}}<br/>{{__('language.xin')}}</h6>
            </div>
            <form class="login_form" method="post" action="{{route('login.handle')}}">
                {{ csrf_field() }}
                <h2 class="login_form--header">
                    Rəsmi Sənədlərə Şəhadətnamənin <br/> (Apostilin) Verilməsi Sistemi
                </h2>
                @if($errors->any())
                <h5>{{$errors->first('message')}}</h5>
                @endif
                <div class="login-center">
                    <div class="form-group">
                        <h6 class="username-title">{{ __('language.username') }}</h6>
                        <input style="background-image: url({{asset('files/icons/user.png')}})" class="username" name="username" type="text" placeholder="{{__('language.username')}}" autofocus>
                    </div>
                    <div class="form-group">
                        <h6 class="password-title">{{ __('language.password') }}</h6>
                        <input style="background-image: url({{asset('files/icons/password.png')}})" name="password" class="password" type="password" placeholder="{{__('language.password')}}">
                    </div>
                    <button class="login" type="submit">{{ __('language.login') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
