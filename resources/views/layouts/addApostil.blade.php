@extends('layouts.master')
@section('title','Yeni Apostil')
@section('content')
        <div class="row new-apostil">
            <div class="col-md-11 new-apostil-title"><label>{{__('language.yeniApostil')}}</label></div>
            <div class="col-md-1 save-button">
                <a><img src="{{asset('files/icons/save.png')}}"></a>
                </br>
                <label>{{__('language.yaddaSaxla')}}</label>
            </div>
        </div>
        <form>
            <div class="new-apostil-create">
                <div class="space">{{__('language.apostilHaqqindaMelumar')}}</div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.nomresi')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.nomresi')}}" type="number"></div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.tarixi')}}</h6></div>
                            <div class="col-md-3">
                                    <input readonly='true' type="text" class="form-control datepicker-apostil tarixi"
                                           value="<?= date('m-d-Y') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.imzalayanShexs')}}</h6></div>
                            <div class="col-md-3">
                                <select value="İmzalayan şəxs 1" name="cars" id="cars">
                                    <option value="volvo">İmzalayan şəxs 1</option>
                                    <option value="saab">İmzalayan şəxs 1</option>
                                    <option value="mercedes">İmzalayan şəxs 1</option>
                                    <option value="audi">İmzalayan şəxs 1</option>
                                </select>
                            </div>
                            <div class="col-md-3"><input class="pocht" type="checkbox"></div>
                            <div class="col-md-3"><h6 class="pcht-label">{{__('language.pochtVasDaxilOlub')}}</h6></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.qeydler')}}</h6></div>
                            <div class="col-md-9 metnDaxilEdin"><input placeholder="{{__('language.metnDaxilEdin')}}" type="text"></div>
                        </div>
                    </div>
                </div>
                <div class="space">{{__('language.resmiSenedHaqqindaMelumatlar')}}</div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.nomresi')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.nomresi')}}" type="number"></div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.tarixi')}}</h6></div>
                            <div class="col-md-3">
                                <input readonly='true' type="text" class="form-control datepicker-apostil tarixi"
                                       value="<?= date('m-d-Y') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.imzalayanShexs')}}</h6></div>
                            <div class="col-md-3"><input placeholder="Ad Soyad" type="text"></div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.imzalayanShexsEn')}}</h6></div>
                            <div class="col-md-3"><input placeholder="Name Surname" type="text"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.imzalayaninVezifesi')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.vezife')}}" type="text"></div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.imzalayaninVezifesiEn')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.position')}}" type="text"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqan')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.verenOrqan')}}" type="text"></div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqanEn')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.givingAuthority')}}" type="text"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.senedinAdi')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.senedinAdi')}}" type="text"></div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.senedinAdiEn')}}</h6></div>
                            <div class="col-md-3"><input placeholder="{{__('language.documentName')}}" type="text"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.qisaMezmun')}}</h6></div>
                            <div class="col-md-9 metnDaxilEdin"><input placeholder="{{__('language.metnDaxilEdin')}}" type="text"></div>
                        </div>
                    </div>
                </div>
                <div class="row muraciet-eden-shexs">
                    <div class="col-md-11">
                        <h6>{{__('language.muracietEdenShexs')}}</h6>
                    </div>
                    <div class="col-md-1 add-muraciet-eden-shexs">
                        <a class="btn" data-toggle="modal" data-target=".bd-example-modal-xl"><img src="{{asset('files/icons/plus.png')}}"></a>
                        <h6>Yeni</h6>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content new-apostil-user">
                            <div class="row close-modal">
                                <div class="col-md-12">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="{{asset('files/icons/close.png')}}">
                                    </button>

                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-md-11 new-apostil-title"><label>{{__('language.shexsHaqqindaMelumat')}}</label></div>
                                <div class="col-md-1 save-button">
                                    <a><img src="{{asset('files/icons/save.png')}}"></a>
                                    </br>
                                    <label>{{__('language.yaddaSaxla')}}</label>
                                </div>
                                <div class="space">{{__('language.muracietEdenShexs')}}</div>
                                <div style="margin-top: 9px;" class="col-md-12 ishtirakchi-novu">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.ishtirakchininNovu')}}</h6></div>
                                        <div class="col-md-3">
                                            <select class="ishtirakci-novu-select-1" value="-" name="cars" id="cars">
                                                <option value="volvo">Hüquqi şəxs</option>
                                                <option value="saab">Fiziki şəxs</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="ishtirakci-novu-select-2" value="-" name="cars" id="cars">
                                                <option value="volvo">İmzalayan şəxs 1</option>
                                                <option value="saab">İmzalayan şəxs 1</option>
                                                <option value="mercedes">İmzalayan şəxs 1</option>
                                                <option value="audi">İmzalayan şəxs 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="spaceUser">{{__('language.senediTeqdimEdenInfo')}}</div>
                                <div style="margin-top: 9px;" class="col-md-12 senedin-tipi">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.senedinTipi')}}</h6></div>
                                        <div class="col-md-9">
                                            <select value="-" class="senedin-tipi-select">
                                                <option value="volvo">İmzalayan şəxs 1</option>
                                                <option value="saab">İmzalayan şəxs 1</option>
                                                <option value="mercedes">İmzalayan şəxs 1</option>
                                                <option value="audi">İmzalayan şəxs 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.svSerVeNom')}}</h6></div>
                                        <div class="col-md-2">
                                            <select class="ishtirakci-novu-select-1" value="-" name="cars" id="cars">
                                                <option value="volvo">Hüquqi şəxs</option>
                                                <option value="saab">Fiziki şəxs</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="ishtirakci-novu-select-2" value="-" name="cars" id="cars">
                                                <option value="volvo">İmzalayan şəxs 1</option>
                                                <option value="saab">İmzalayan şəxs 1</option>
                                                <option value="mercedes">İmzalayan şəxs 1</option>
                                                <option value="audi">İmzalayan şəxs 1</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <button class="shv-axtar" type="submit">{{__('language.axtar')}}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.verilmeTarixi')}}</h6></div>
                                        <div class="col-md-3">
                                            <input readonly='true' type="text" class="form-control datepicker-apostil verilme-tarixi"
                                                   value="<?= date('m-d-Y') ?>">
                                        </div>
                                        <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqan')}}</h6></div>
                                        <div class="col-md-3">
                                            <select class="veren-orqan" value="-" name="cars" id="cars">
                                                <option value="volvo">İmzalayan şəxs 1</option>
                                                <option value="saab">İmzalayan şəxs 1</option>
                                                <option value="mercedes">İmzalayan şəxs 1</option>
                                                <option value="audi">İmzalayan şəxs 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.userNames')}}</h6></div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="{{__('language.soyad')}}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="{{__('language.ad')}}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="{{__('language.ataAdi')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.dogumTarixi')}}</h6></div>
                                        <div class="col-md-9">
                                            <input readonly='true' type="text" class="form-control datepicker-apostil dogum-tarixi"
                                                   value="<?= date('m-d-Y') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.QeydiyyatdaOlduguUnvan')}}</h6></div>
                                        <div class="col-md-9">
                                            <input placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.vetendashligi')}}</h6></div>
                                        <div class="col-md-9">
                                            <select class="vetendashligi" value="-" name="cars" id="cars">
                                                <option value="volvo">İmzalayan şəxs 1</option>
                                                <option value="saab">İmzalayan şəxs 1</option>
                                                <option value="mercedes">İmzalayan şəxs 1</option>
                                                <option value="audi">İmzalayan şəxs 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.elaqeTelefonu')}}</h6></div>
                                        <div class="col-md-9">
                                            <input class="elaqeTelefonu" placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.ePocht')}}</h6></div>
                                        <div class="col-md-9">
                                            <input class="ePocht" placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="spaceUser">{{__('language.elaveQeydler')}}</div>
                                <div class="col-md-12" style="margin-top: 1%;">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.qeydler')}}</h6></div>
                                        <div class="col-md-9">
                                            <input placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

@stop
@section('javascript')
    <script type="text/javascript">
        $('.dogum-tarixi').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true,
            pickTime: false,
            minView: 2
        });

        $('.verilme-tarixi').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true,
            pickTime: false,
            minView: 2
        });
    </script>
@endsection























