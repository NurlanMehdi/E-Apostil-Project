@extends('layouts.master')
@section('title','Yeni Apostil')
@section('content')
    <div class="row new-apostil">
        <div class="col-md-11 new-apostil-title"><label>{{__('language.yeniApostil')}}</label></div>
        <div class="col-md-1 save-button">
            <img src="{{asset('files/icons/save.png')}}"></br>
            <label>{{__('language.yaddaSaxla')}}</label>
        </div>
    </div>
    <form>
        <div class="new-apostil-create">
            <div class="space">{{__('language.apostilHaqqindaMelumar')}}</div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.nomresi')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.nomresi')}}" type="number"></div>
                        <div class="col-md-2 bashliq"><label>{{__('language.tarixi')}}</label></div>
                        <div class="col-md-4">  <input placeholder="{{__('language.tarixi')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.imzalayanShexs')}}</label></div>
                        <div class="col-md-4">            <select value="İmzalayan şəxs 1" name="cars" id="cars">
                                <option value="volvo">İmzalayan şəxs 1</option>
                                <option value="saab">İmzalayan şəxs 1</option>
                                <option value="mercedes">İmzalayan şəxs 1</option>
                                <option value="audi">İmzalayan şəxs 1</option>
                            </select></div>
                        <div class="col-md-2"><input class="pocht" type="checkbox"></div>
                        <div class="col-md-4"><label class="pcht-label">{{__('language.pochtVasDaxilOlub')}}</label></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.qeydler')}}</label></div>
                        <div class="col-md-10"><input style="width: 92.45%;" placeholder="{{__('language.metnDaxilEdin')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="space">{{__('language.resmiSenedHaqqindaMelumatlar')}}</div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.nomresi')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.nomresi')}}" type="number"></div>
                        <div class="col-md-2 bashliq"><label>{{__('language.tarixi')}}</label></div>
                        <div class="col-md-4">  <input placeholder="{{__('language.tarixi')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.imzalayanShexs')}}</label></div>
                        <div class="col-md-4"><input placeholder="Ad Soyad" type="text"></div>
                        <div class="col-md-2 bashliq"><label>{{__('language.imzalayanShexsEn')}}</label></div>
                        <div class="col-md-4"><input placeholder="Name Surname" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.imzalayaninVezifesi')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.vezife')}}" type="text"></div>
                        <div class="col-md-2 bashliq"><label>{{__('language.imzalayaninVezifesiEn')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.position')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.verenOrqan')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.verenOrqan')}}" type="text"></div>
                        <div class="col-md-2 bashliq"><label>{{__('language.verenOrqanEn')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.givingAuthority')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.senedinAdi')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.senedinAdi')}}" type="text"></div>
                        <div class="col-md-2 bashliq"><label>{{__('language.senedinAdiEn')}}</label></div>
                        <div class="col-md-4"><input placeholder="{{__('language.documentName')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 button-group">
                    <div class="row">
                        <div class="col-md-2 bashliq"><label>{{__('language.qisaMezmun')}}</label></div>
                        <div class="col-md-10 metnDaxilEdin"><input placeholder="{{__('language.metnDaxilEdin')}}" type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row muraciet-eden-shexs">
                <div class="col-md-11">
                    <label>{{__('language.muracietEdenShexs')}}</label>
                </div>
                <div class="col-md-1 add-muraciet-eden-shexs">
                    <a href="{{route('add.apostil')}}"><img src="{{asset('files/icons/plus.png')}}"></a>
                    </br>
                    <label>Yeni</label>
                </div>
            </div>
        </div>
    </form>
@endsection























