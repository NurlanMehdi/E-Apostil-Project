@extends('layouts.master')
@section('title','Apostil Reyestr')
@section('content')
    <div class="row search-bar">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6"><h6>{{__('language.tarix')}}</h6><input placeholder="Tarix" type="text"></div>
                <div class="col-md-6">
                    <h6>Apostilin nömrəsi</h6>
                    <input placeholder="00000" type="number">
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4"><h6>Status</h6>
                    <select name="cars" id="cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="col-md-4"><h6>Qısa məzmunu</h6> <input placeholder="Tarix" type="text"></div>
                <div class="col-md-4">
                    <div class="row btn-header-container">
                        <div class="col-md-3 btn-header">
                            <img src="{{asset('files/icons/search.png')}}">
                            </br>
                            <h6>Axtar</h6>
                        </div>
                        <div class="col-md-3 btn-header">
                            <img src="{{asset('files/icons/filtr.png')}}">
                            </br>
                            <h6>Filtr</h6>
                        </div>
                        <div class="col-md-3 btn-header">
                            <img src="{{asset('files/icons/delete.png')}}">
                            </br>
                            <h6>Sil</h6>
                        </div>
                        <div class="col-md-3 btn-header">
                            <a href="{{route('add.apostil')}}"><img src="{{asset('files/icons/plus.png')}}"></a>
                            </br>
                            <h6>Yeni</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection























