@extends('layouts.master')
@section('title','Apostil Reyestr')
@section('content')

    <div class="row search-bar">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-6" id="tarix">
                    <label>Tarix</label></br>
                    <input placeholder="Tarix" type="text">
                </div>
                <div class="col-md-6" id="apostil-nomresi">
                    <label>Apostilin nömrəsi</label></br>
                    <input placeholder="00000" type="number">
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-4" id="status">
                    <label>Status</label></br>
                    <select name="cars" id="cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div class="col-md-4" id="qisa-mezmunu">
                    <label>Qısa məzmunu</label></br>
                    <input placeholder="Tarix" type="text">
                </div>
                <div class="col-md-4">
                    <div class="row btn-header-container">
                        <div class="col-md-3 btn-header">
                            <img src="{{asset('files/icons/search.png')}}">
                            </br>
                            <label>Axtar</label>
                        </div>
                        <div class="col-md-3 btn-header">
                            <img src="{{asset('files/icons/filtr.png')}}">
                            </br>
                            <label>Filtr</label>
                        </div>
                        <div class="col-md-3 btn-header">
                            <img src="{{asset('files/icons/delete.png')}}">
                            </br>
                            <label>Sil</label>
                        </div>
                        <div class="col-md-3 btn-header">
                            <a href="{{route('add.apostil')}}"><img src="{{asset('files/icons/plus.png')}}"></a>
                            </br>
                            <label>Yeni</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection























