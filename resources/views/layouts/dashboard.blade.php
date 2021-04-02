@extends('layouts.master')
@section('title','Apostil Reyestr')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<div class="container-fluid">
    <div  class="row">
        <div class="dashboard-page-left col-md-2">
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

                <div class="username">Lorem Ipsum</div>
                <div class="user-info">
                    <a class="count info-text">0</a>
                    <div class="nav-bar"></div>
                    <label class="info-text">{{__('language.xinIstifadechi')}}</label>
                </div>
                <div class="section_header_navbar_item dropdown">
                    <a href="#" class="info-text section_header_navbar_item--link dropdown-toggle" id="langDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('language.qanunvericilik')}}&nbsp&nbsp&nbsp&nbsp
                    </a>
                    <div class="dropdown-menu" aria-labelledby="langDropdown">
                        <a class="dropdown-item">Bölüm 1</a>
                        <a class="dropdown-item">Bölüm 2</a>
                        <a class="dropdown-item">Bölüm 3</a>
                        <a class="dropdown-item">Bölüm 4</a>
                        <a class="dropdown-item">Bölüm 5</a>
                        <a class="dropdown-item">Bölüm 6</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-page-right col-md-10">
            <div class="container-apostil-create">
                <div class="apostil-title col-md-12">
                    <div class="row">
                        <div class="col-md-11">{{__('language.elektronApostilReyestri')}}</div>
                        <div class="col-md-1">{{__('language.chixish')}}&nbsp<img src="{{asset('files/icons/exit-icon.png')}}"></div>
                    </div>

                </div>
                <div class="col-md-12">
                    div.
                </div>
                <div class="col-md-12">Elektron apostil reyestri</div>
            </div>

        </div>
    </div>
</div>



@endsection
