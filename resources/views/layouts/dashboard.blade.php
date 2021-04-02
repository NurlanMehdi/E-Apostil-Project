@extends('layouts.master')
@section('title','Apostil Reyestr')
@section('content')
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
                    <div class="user-info p-4 bd-highlight">
                        <a class="count info-text">0</a>
                        <div class="nav-bar"></div>
                        <label class="info-text">{{__('language.xinIstifadechi')}}</label>
                    </div>
                    <div style="display: none" class="section_header_navbar_item dropdown">
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
            <div class="dashboard-page-right col-md-11">
                <div class="container-fluid">
                    <div class="row header">
                        <div class="col-md-11">{{__('language.elektronApostilReyestri')}}</div>
                        <div class="col-md-1">{{__('language.chixish')}}&nbsp<img src="{{asset('files/icons/exit-icon.png')}}"></div>
                    </div>
                    <div class="row search-bar">
                        <div class="input-group ">
                            <div class="col-md-2" id="tarix">
                                <label>Tarix</label></br>
                                <input placeholder="Tarix" type="text">
                            </div>
                            <div class="col-md-2" id="apostil-nomresi">
                                <label>Apostilin nömrəsi</label></br>
                                <input placeholder="00000" type="number">
                            </div>
                            <div class="col-md-2" id="status">
                                <label>Status</label></br>
                                <select name="cars" id="cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="col-md-2" id="qisa-mezmunu">
                                <label>Qısa məzmunu</label></br>
                                <input placeholder="Tarix" type="text">
                            </div>
                            <div class="col-md-2" id="header-buttons">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-2 btn-header">
                                            <img src="{{asset('files/icons/search.png')}}">
                                            </br>
                                            <label>Axtar</label>
                                        </div>
                                        <div class="col-md-2 btn-header">
                                            <img src="{{asset('files/icons/filtr.png')}}">
                                            </br>
                                            <label>Filtr</label>
                                        </div>
                                        <div class="col-md-2 btn-header">
                                            <img src="{{asset('files/icons/delete.png')}}">
                                            </br>
                                            <label>Sil</label>
                                        </div>
                                        <div class="col-md-2 btn-header">
                                            <img src="{{asset('files/icons/plus.png')}}">
                                            </br>
                                            <label>Yeni</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
