@extends('layouts.master')
@section('title','Yeni Apostil')
@section('content')


    <div class="row new-apostil">
        <div class="col-md-9 new-apostil-title">
            <label>
                @if($documentId !== "new")
                    {{__('language.apostilEdit')}}
                @else
                    {{__('language.yeniApostil')}}
                @endif
            </label>
        </div>
        <div class="col-md-3 save-button">
            <div class="row" style="max-width: 75%;">
                <div class="col-md-4">
                    <a class="accepted" href="{{route('dashboard')}}"><img src="{{asset('files/icons/tesdiqET.png')}}"></a>
                    </br>
                    <label class="accepted">{{__('language.tesdiqEt')}}</label>
                </div>
                <div class="col-md-4">
                    <a class="export" data-toggle="modal" data-target=".export-modal"><img src="{{asset('files/icons/export.png')}}"></a>
                    </br>
                    <label class="export">{{__('language.export')}}</label>
                </div>
                <div class="col-md-4">
                    <a class="save-apostil-document" href="{{route('dashboard')}}"><img src="{{asset('files/icons/save.png')}}"></a>
                    </br>
                    <label class="save">{{__('language.yaddaSaxla')}}</label>
                </div>
            </div>

        </div>
        <div class="apostil-form col-md-12">
            <form id="createApostil" method="post"
                  action="{{ ($documentId !== "new") ? route('apostil.edit',$documentId) : route('apostil.submit') }}">
                {{csrf_field()}}
                <input type="hidden" name="apply_user_id">
                <div class="new-apostil-create">
                    <div class="space">{{__('language.apostilHaqqindaMelumar')}}</div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.nomresi')}}</h6></div>
                                <div class="col-md-3"><input class="apostil-nomresi"
                                                             value="{{$apostilDocumentInfo->apostil_number ?? ''}}"
                                                             name="apostil_number" placeholder="{{__('language.nomresi')}}"
                                                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                             type="text" maxlength="8" minlength="3">
                                    @if($errors->has('apostil_number'))
                                        <h6 class="error">{{ $errors->first('apostil_number') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3 bashliq"><h6>{{__('language.tarixi')}}</h6></div>
                                <div class="col-md-3">
                                    <input readonly='true' type="text" name="apostil_date"
                                           class="form-control datepicker-apostil tarixi apostil-tarixi"
                                           value="{{$apostilDocumentInfo->apostil_date ?? date('Y-m-d') }}">
                                    @if($errors->has('apostil_date'))
                                        <h6 class="error">{{ $errors->first('apostil_date') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.imzalayanShexs')}}</h6></div>
                                <div class="col-md-3">
                                    <select class="apostil-imzalayan-shexs" name="apostil_signing_user_id">
                                        @if(isset($apostilDocumentInfo->apostil_signing_user_id))
                                            <option selected
                                                    value="{{ $apostilDocumentInfo->apostil_signing_user_id ?? '' }}">{{ $apostilDocumentInfo->apostil_signing_user_name->name ?? ''}}</option>
                                        @else
                                            <option selected hidden value="0">-</option>
                                        @endif
                                        @foreach($imzalayanShexs as $user)
                                            <option value="{{ $user->id ?? ''}}">{{ $user->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('apostil_signing_user_id'))
                                        <h6 class="error">{{ $errors->first('apostil_signing_user_id') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3"><input name="mail_status" class="pocht"
                                                             type="checkbox" {{ ($apostilDocumentInfo->mail_status ?? '') ? "checked" : "" }}>
                                </div>
                                <div class="col-md-3"><h6 class="pcht-label">{{__('language.pochtVasDaxilOlub')}}</h6></div>
                            </div>
                        </div>
                    </div>
                    <div class="space">{{__('language.resmiSenedHaqqindaMelumatlar')}}</div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.nomresi')}}</h6></div>
                                <div class="col-md-3">
                                    <input class="rs_nomresi" name="rs_number" placeholder="{{__('language.nomresi')}}"
                                           value="{{ $apostilDocumentInfo->rs_number ?? '' }}" type="number">
                                    @if($errors->has('rs_number'))
                                        <h6 class="error">{{ $errors->first('rs_number') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3 bashliq"><h6>{{__('language.tarixi')}}</h6></div>
                                <div class="col-md-3">
                                    <input readonly='true' type="text" name="rs_date"
                                           class="form-control datepicker-apostil rs_tarixi"
                                           value="{{$apostilDocumentInfo->rs_date ?? date('Y-m-d') }}">
                                    @if($errors->has('rs_date'))
                                        <h6 class="error">{{ $errors->first('rs_date') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.imzalayanShexs')}}</h6></div>
                                <div class="col-md-3">
                                    <input name="rs_signing_user" class="rs_imzalayan_shexs"
                                           value="{{$apostilDocumentInfo->rs_signing_user ?? '' }}" placeholder="Ad Soyad"
                                           type="text">
                                    @if($errors->has('rs_signing_user'))
                                        <h6 class="error">{{ $errors->first('rs_signing_user') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3 bashliq"><h6>{{__('language.imzalayanShexsEn')}}</h6></div>
                                <div class="col-md-3">
                                    <input name="rs_signing_user_en" class="rs_imzalayan_shexs_en"
                                           value="{{$apostilDocumentInfo->rs_signing_user_en ?? '' }}"
                                           placeholder="Name Surname" type="text">
                                    @if($errors->has('rs_signing_user_en'))
                                        <h6 class="error">{{ $errors->first('rs_signing_user_en') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.imzalayaninVezifesi')}}</h6></div>
                                <div class="col-md-3">
                                    <input autocomplete="off" name="rs_signing_position" class="rs_vezife"
                                           value="{{$apostilDocumentInfo->rs_signing_position ?? '' }}"
                                           placeholder="{{__('language.vezife')}}" type="text">
                                    @if($errors->has('rs_signing_position'))
                                        <h6 class="error">{{ $errors->first('rs_signing_position') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3 bashliq"><h6>{{__('language.imzalayaninVezifesiEn')}}</h6></div>
                                <div class="col-md-3">
                                    <input autocomplete="off" name="rs_signing_position_en" class="rs_vezife_en"
                                           value="{{$apostilDocumentInfo->rs_signing_position_en ?? '' }}"
                                           placeholder="{{__('language.position')}}" type="text">
                                    @if($errors->has('rs_signing_position_en'))
                                        <h6 class="error">{{ $errors->first('rs_signing_position_en') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqan')}}</h6></div>
                                <div class="col-md-3">
                                    <input name="rs_service" class="rs_veren_orqan"
                                           value="{{$apostilDocumentInfo->rs_service ?? '' }}"
                                           placeholder="{{__('language.verenOrqan')}}" type="text">
                                    @if($errors->has('rs_service'))
                                        <h6 class="error">{{ $errors->first('rs_service') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqanEn')}}</h6></div>
                                <div class="col-md-3">
                                    <input name="rs_service_en" class="rs_veren_orqan_en"
                                           value="{{$apostilDocumentInfo->rs_service_en ?? '' }}"
                                           placeholder="{{__('language.givingAuthority')}}" type="text">
                                    @if($errors->has('rs_service_en'))
                                        <h6 class="error">{{ $errors->first('rs_service_en') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.senedinAdi')}}</h6></div>
                                <div class="col-md-3">
                                    <input name="rs_document_name" class="rs_sened_ad"
                                           value="{{$apostilDocumentInfo->rs_document_name ?? '' }}"
                                           placeholder="{{__('language.senedinAdi')}}" type="text">
                                    @if($errors->has('rs_document_name'))
                                        <h6 class="error">{{ $errors->first('rs_document_name') }}</h6>
                                    @endif
                                </div>
                                <div class="col-md-3 bashliq"><h6>{{__('language.senedinAdiEn')}}</h6></div>
                                <div class="col-md-3">
                                    <input name="rs_document_name_en" class="rs_sened_ad_en"
                                           value="{{$apostilDocumentInfo->rs_document_name_en ?? '' }}"
                                           placeholder="{{__('language.documentName')}}" type="text">
                                    @if($errors->has('rs_document_name_en'))
                                        <h6 class="error">{{ $errors->first('rs_document_name_en') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-group">
                            <div class="row">
                                <div class="col-md-3 bashliq"><h6>{{__('language.qisaMezmun')}}</h6></div>
                                <div class="col-md-9 metnDaxilEdin">
                                    <input name="rs_short_note" class="rs_qisa_mezmun"
                                           value="{{$apostilDocumentInfo->rs_short_note ?? '' }}"
                                           placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                    @if($errors->has('rs_short_note'))
                                        <h6 class="error">{{ $errors->first('rs_short_note') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row muraciet-eden-shexs">
                        <div class="col-md-11"> {{__('language.muracietEdenShexs')}}</div>
                        <div class="col-md-1 add-muraciet-eden-shexs">
                            <a class="btn" data-toggle="modal" data-target=".bd-example-modal-xl"><img
                                        src="{{asset('files/icons/plus.png')}}"></a>
                            <h6>Yeni</h6>
                        </div>
                    </div>
                    <div style="display: {{($documentId != 'new') ? 'flex' : 'none'}}" class="row muraciet-eden-shexsler">
                        <div class="col-md-3">
                            <h5>{{__('language.nomre')}}</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>{{__('language.ishtirakchi')}}</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>{{__('language.FizikiVeyaHuquqiShexsinAdi')}}</h5>
                        </div>
                        <div class="col-md-2">
                            <h5></h5>
                        </div>
                    </div>
                    <div class="row mur-eden-shexs">
                        @if($apostilUser != null)
                            <div class='col-md-3'>
                                <h6>{{($apostilUser->shv_series == 1) ? 'AA-' : 'AZE-'}}{{$apostilUser->shv_number}}</h6>
                            </div>
                            <div class='col-md-3'>
                                <h6>{{($apostilUser->apply_user_type == 2) ? 'Hüquqi şəxs' : 'Fiziki şəxs'}}</h6>
                            </div>
                            <div class='col-md-3'>
                                <h6>{{($apostilUser->apply_user_type == 2) ? $apostilUser->legal_user_name : $apostilUser->doc_owner_name .' '. $apostilUser->doc_owner_lastname  .' '. $apostilUser->doc_owner_fathername }}</h6>
                            </div>
                            <div class='col-md-3' style='text-align: end;padding: 0px 20px;'>
                                <button type='button' class='btn' data-toggle='modal' data-target='.bd-example-modal-xl' style='border: 0;padding: 2px 15px 12px 10px;height: 71%;'>
                                    <img src='{{asset('files/icons/edit.png')}}'>
                                </button>
                                <button type='button' class='remove-user' style='background-color: #f3f3f3;border: 0;padding: 0px 15px 12px 10px;height: 71%;'>
                                    <img src='{{asset('files/icons/x.png')}}'>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="bottom-page"></div>
                </div>
            </form>
            <form id="createApostilUser" method="post" action="{{route('apostil.user.submit')}}">
                {{csrf_field()}}
                <div class="new-apostil-create">
                    <div id="muraciet-eden-shexs-modal" class="modal fade bd-example-modal-xl muraciet-eden-shexs-modal" tabindex="-1" role="dialog"
                         aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                                    <div class="col-md-10 new-apostil-title">
                                        <label>{{__('language.shexsHaqqindaMelumat')}}</label></div>
                                    <div class="col-md-2 save-apostil-user">
                                        <button style="float: initial;" type="button" class="save-apo">
                                            <img src="{{asset('files/icons/save.png')}}">
                                        </button>
                                        </br>
                                        <h6>{{__('language.yaddaSaxla')}}</h6>
                                    </div>
                                    <div class="space">{{__('language.ishtirakchi')}}</div>

                                    <div style="margin-top: 9px;" class="col-md-12 ishtirakchi-novu">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.ishtirakchininNovu')}}</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="apply_user_type" class="novu apostil-types"
                                                        placeholder="{{ __('language.ishtirakchininNovu') }}">
                                                    @if($apostilUser->apply_user_type ?? '')
                                                        @if($apostilUser->apply_user_type == 1)
                                                            <option  value="2">Hüquqi şəxs</option>
                                                            <option selected="selected" value="1">Fiziki şəxs</option>
                                                        @else
                                                            <option  selected="selected" value="2">Hüquqi şəxs</option>
                                                            <option  value="1">Fiziki şəxs</option>
                                                        @endif
                                                    @else
                                                        <option  selected="selected" value="0">-</option>
                                                        <option  value="2">Hüquqi şəxs</option>
                                                        <option  value="1">Fiziki şəxs</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-6 apostil-user-types">
                                            </div>
                                        </div>
                                    </div>
                                    <a style="display: none" class="line"></a>
                                    <div style="display: none" class="col-md-12 sened-sahibi-asa-container">
                                        <div class="row">
                                            <div class="col-md-3 bashliq asa"><h6>{{__('language.senedSahibiASA')}}</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="muraciet-eden-shexs-ishtirakchi-soyad"
                                                       name="doc_owner_lastname" type="text"
                                                       placeholder="{{__('language.soyad')}}">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="muraciet-eden-shexs-ishtirakchi-ad" type="text"
                                                       name="doc_owner_name" placeholder="{{__('language.ad')}}">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="muraciet-eden-shexs-ishtirakchi-atadi" type="text"
                                                       name="doc_owner_fathername" placeholder="{{__('language.ataAdi')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none" class="col-md-12 qohumluq-derecesi-container">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.qohumluqDerecesi')}}</h6></div>
                                            <div class="col-md-9">
                                                <select class="qohumluq-derecesi" name="relationship_id">
                                                    @foreach($qohumluqDerecesi as $doc)
                                                        <option string_id="{{ $doc->string_id }}"
                                                                value="{{ $doc->id ?? ''}}">{{ $doc->name ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none" class="col-md-12 etibanamenin-nomresi-container">
                                        <div class="row">
                                            <div class="col-md-3 bashliq poa-number-title">
                                                <h6>{{__('language.etibarnameninNomresi')}}</h6></div>
                                            <div class="col-md-3 etibarnamenin-nomresi-3">
                                                <input class="etibarnamenin-nomresi" name="power_of_attorney_number"
                                                       placeholder="{{__('language.metnDaxilEdin')}}" type="number">
                                            </div>
                                            <div style="display: none" class="col-md-3 mektubun-nomresi-3">
                                                <input class="mektubun-nomresi" name="letter_number"
                                                       placeholder="{{__('language.metnDaxilEdin')}}" type="number">
                                            </div>
                                            <div class="col-md-3 bashliq"><h6>{{__('language.verilmeTarixi')}}</h6></div>
                                            <div class="col-md-3">
                                                <input readonly='true' name="issue_date" type="text"
                                                       class="form-control datepicker-apostil muraciet-eden-shexs-verilme-tarixi"
                                                       value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none" class="col-md-12 voen-container">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.huquqiShexsinAdi')}}</h6></div>
                                            <div class="col-md-3">
                                                <input name="legal_user_name" class="legal_user_name"
                                                       placeholder="{{__('language.ad')}}" type="text">
                                            </div>
                                            <div class="col-md-3 bashliq"><h6>V.Ö.E.N</h6></div>
                                            <div class="col-md-3">
                                                <input name="voen" placeholder="{{__('language.metnDaxilEdin')}}"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none" class="col-md-12 vezifesi-container">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.vezifesi')}}</h6></div>
                                            <div class="col-md-9">
                                                <input name="position" class="vezifesi"
                                                       placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spaceUser">{{__('language.shexsiyyetVesiqesi')}}</div>
                                    <div style="margin-top: 9px;" class="col-md-12 senedin-tipi">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.senedinTipi')}}</h6></div>
                                            <div class="col-md-9">
                                                <select name="doc_type_id" class="senedin-tipi-select">
                                                    <option selected value="0">-</option>
                                                    @foreach($senedinTipi as $doc)
                                                        <option value="{{ $doc->id ?? ''}}">{{ $doc->name ?? ''}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.svSerVeNom')}}</h6></div>
                                            <div class="col-md-2">
                                                <select class="shv-seriyasi" name="shv_series">
                                                    @if($apostilUser->shv_series ?? '')
                                                        @if($apostilUser->shv_series == 1)
                                                            <option selected value="1">AA-</option>
                                                            <option value="2">AZE-</option>
                                                        @else
                                                            <option value="1">AA-</option>
                                                            <option selected value="2">AZE-</option>
                                                        @endif
                                                    @else
                                                        <option selected value="0">-</option>
                                                        <option value="1">AA-</option>
                                                        <option value="2">AZE-</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input class="shv-nomresi" name="shv_number"
                                                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                       type="text" value="{{$apostilUser->shv_number ?? ''}}" maxlength="8">
                                            </div>
                                            <div class="col-md-5">
                                                <button class="shv-axtar" type="button">{{__('language.axtar')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.verilmeTarixi')}}</h6></div>
                                            <div class="col-md-3">
                                                <input readonly='true' name="doc_presented_date" type="text"
                                                       class="form-control datepicker-apostil verilme-tarixi"
                                                       value="{{$apostilUser->doc_presented_date ?? date('Y-m-d') }}">
                                            </div>
                                            <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqan')}}</h6></div>
                                            <div class="col-md-3">
                                                <input name="letter_name" type="text" class="veren-orqan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.userNames')}}</h6></div>
                                            <div class="col-md-3">
                                                <input name="doc_presented_name" value="{{$apostilUser->doc_presented_name ?? ''}}" type="text"
                                                       placeholder="{{__('language.soyad')}}">
                                            </div>
                                            <div class="col-md-3">
                                                <input name="doc_presented_lastname" value="{{$apostilUser->doc_presented_lastname ?? ''}}" type="text"
                                                       placeholder="{{__('language.ad')}}">
                                            </div>
                                            <div class="col-md-3">
                                                <input name="doc_presented_fathername"  value="{{$apostilUser->doc_presented_fathername ?? ''}}" type="text"
                                                       placeholder="{{__('language.ataAdi')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.dogumTarixi')}}</h6></div>
                                            <div class="col-md-9">
                                                <input name="doc_presented_birtday_date" readonly='true' type="text"
                                                       class="form-control datepicker-apostil dogum-tarixi"
                                                       value="{{$apostilUser->doc_presented_birtday_date ?? date('Y-m-d')}} ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.QeydiyyatdaOlduguUnvan')}}</h6>
                                            </div>
                                            <div class="col-md-9">
                                                <input name="doc_presented_reg_address"
                                                       placeholder="{{__('language.metnDaxilEdin')}}" value="{{$apostilUser->doc_presented_reg_address ?? ''}}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.vetendashligi')}}</h6></div>
                                            <div class="col-md-9">
                                                <select name="doc_presented_native_id" class="vetendashligi">
                                                    @if($apostilUser->doc_presented_native_id ?? '')
                                                        @if($apostilUser->doc_presented_native_id == 1)
                                                            <option selected  value="1">Azərbaycan vətəndaşı</option>
                                                            <option value="2">Əcnəbi</option>
                                                        @else
                                                            <option  value="1">Azərbaycan vətəndaşı</option>
                                                            <option selected value="2">Əcnəbi</option>
                                                        @endif
                                                    @else
                                                        <option selected value="0">-</option>
                                                        <option value="1">Azərbaycan vətəndaşı</option>
                                                        <option value="2">Əcnəbi</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.elaqeTelefonu')}}</h6></div>
                                            <div class="col-md-9">
                                                <input name="doc_presented_tel" class="elaqeTelefonu"
                                                       placeholder="{{__('language.nomreDaxilEdin')}}" value="{{$apostilUser->doc_presented_tel ?? ''}}"  type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 bashliq"><h6>{{__('language.ePocht')}}</h6></div>
                                            <div class="col-md-9">
                                                <input value="{{$apostilUser->doc_presented_mail ?? ''}}"  name="doc_presented_mail" class="ePocht"
                                                       placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="modal fade export-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="row export-modal-background">
                            <div class="col-md-6 pdf-viewer">
                                <div style="display: none" class="row pdf-apostille" id="apostil">
                                    <div class="col-md-12 apostille-title"><h3>APOSTILLE</h3></div>
                                    <div class="col-md-12 apostill-convetion"><label>(Convention de La Haye du 5 octobre 1961)</br>(5 oktyabr 1961-ci il Haaqa Konvensiyası)</label></div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-1 sira">1</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="country">Azerbaycan Respublikası / Respublic of Azerbaijan</h6></div>
                                                    <div class="col-md-12"><label>Ölkə / Country</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 space-with-title"><h5>Hazırki rəsmi sənəd / This public document</h5></div>
                                            <div class="col-md-1 sira">2</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="signing-user"></h6></div>
                                                    <div class="col-md-12"><label>İmzalayan (soyadı) / Has been signed by (surname)</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">3</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="qohumluq-elaqesi"></h6></div>
                                                    <div class="col-md-12"><label>Hansı qismdə çıxış etmişdir / Acting in the capacity of</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">4</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="mohur"></h6></div>
                                                    <div class="col-md-12"><label>Möhürün, ştampın sahibi / Bears the seal, stamp of</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 space-with-title"><h5>Təsdiq edilmişdir / Certiﬁed</h5></div>
                                            <div class="col-md-1 sira">5</div>
                                            <div class="col-md-5 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="city"></h6></div>
                                                    <div class="col-md-12"><label>Şəhər / At</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">6</div>
                                            <div class="col-md-5 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="date"></h6></div>
                                                    <div class="col-md-12"><label>Tarixdə / The</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">7</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="terefinden"></h6></div>
                                                    <div class="col-md-12"><label>Tərəﬁndən / By</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">8</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="nomreli"></h6></div>
                                                    <div class="col-md-12"><label>Nömrəli / Reg. number</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">9</div>
                                            <div class="col-md-5 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="mohur-img"></h6></div>
                                                    <div class="col-md-12"><label>Möhür, ştamp / Seal, stamp</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">10</div>
                                            <div class="col-md-5 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="signature"></h6></div>
                                                    <div class="col-md-12"><label>İmza / Signature</label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal-line">
                                    <div class="col-md-12 apostill-convetion"><label>Apostil sənədin mətninə şamil edilmir</br>Apostille does not relate to the content of the document</label></div>
                                </div>
                                <div class="row pdf-chixarish" id="chixarish">
                                    <div class="col-md-12 apostille-title"><h6>Apostillərin Elektron Reyestri” İnformasiya Sistemləri</h6></div>
                                    <div class="col-md-12 apostille-title"><h4>ÇIXARIŞ</h4></div>
                                    <div class="col-md-12 country">
                                        <div class="accepted-apostil-doc row">
                                            <div class="space-pdf">Apostil barədə məlumat</div>
                                            <div class="space-white-pdf pdf-apostil-number">Apostilin nömrəsi : <a></a></div>
                                            <div class="space-white-pdf pdf-apostil-date">Apostilin tarixi :<a></a></div>
                                            <div class="space-white-pdf pdf-letten-name">Apostil verən orqanın adı :<a></a></div>
                                            <div class="space-white-pdf pdf-signing-user">Apostili imzalamış şəxs :<a></a></div>

                                            <div class="space-pdf">Rəsmi sənəd barədə məlumatlar</div>
                                            <div class="space-white-pdf pdf-doc-type">Sənədin tipi :<a></a></div>
                                            <div class="space-white-pdf pdf-doc-num-date">Sənədin nömrəsi və tarixi :<a></a></div>
                                            <div class="space-white-pdf pdf-senedi-veren-orqan">Sənədi verən orqan : <a></a></div>

                                            <div class="space-pdf pdf-document-info">Sənəd barədə məlumatlar</div>
                                            <div class="space-white-pdf pdf-doc-name">Sənədin adı (Document name) : <a></a></div>
                                            <div class="space-white-pdf pdf-short-text">Sənədin qısa məzmunu :<a></a></div>

                                            <div class="space-pdf">Müraciət edən şəxs</div>
                                            <table id="exportTable" class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="1"></td>
                                                    <td class="2"></td>
                                                    <td class="3"></td>
                                                    <td class="4"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="horizontal-line">
                                    <div class="col-md-12 apostill-convetion"><label>Azərbaycan Respublikası Xarici İşlər Nazirliyinin “Rəsmi Sənədlərə </br>Şəhədətnamənin (Apostil) Verilməsi Sistemi” informasiya sistemi </br>vasitəsi ilə XİN (apostil), USER1 tərəﬁndən çap edilmişdir. </label></div>
                                </div>
                            </div>
                            <div class="col-md-6 pdf-tools">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="selected-pdf-viewer">
                                            <option selected value="chixarish">Çıxarış</option>
                                            <option value="apostil">Apostil</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="text-align: center">
                                        <a class="export-pdf" id="exportPdf"><img src="{{asset('files/icons/export.png')}}"></a>
                                        </br>
                                        <h6>Çap et</h6>
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


@stop
@section('javascript')
    <script src="{{asset('js/printThis.js')}}"></script>
    <script type="text/javascript">

        $('.shv-axtar').on('click',function (){

            var serie = $('.shv-seriyasi option:selected').text();
            var seriesNumber = $('.shv-nomresi').val();
            var fullSerieNumber = serie+''+seriesNumber;

            var userInfoFinCode = {
                'AZE-25739312': {'name': "Murad", 'lastname': "Əliyev", 'fathername': 'Fərid','verenOrqan':'ASAN1','vesiqeninVerilmeTarixi':'2012-09-01','qeydiyyat':'Binəqədi ray.,E.Isayev, ev 24 m 5','dogumTarixi':'1976-02-21'},
                'AZE-14793132': {'name': "Nurlan", 'lastname': "Güləliyev", 'fathername': 'Mehdi','verenOrqan':'ASAN3','vesiqeninVerilmeTarixi':'2014-12-10','qeydiyyat':'Bakı şəh.,Yasamal ray.,Ə.Veliyev, ev 33 m 2','dogumTarixi':'1998-09-12'},
            };

            $.each(userInfoFinCode,function (seriesNumberIamas,value){
                if (seriesNumberIamas == fullSerieNumber){
                    $('input[name="doc_presented_date"]').val(value.vesiqeninVerilmeTarixi)
                    $('input[name="letter_name"]').val(value.verenOrqan)

                    $('input[name="doc_presented_name"]').val(value.name)
                    $('input[name="doc_presented_lastname"]').val(value.lastname)
                    $('input[name="doc_presented_fathername"]').val(value.fathername)


                    $('input[name="doc_presented_birtday_date"]').val(value.dogumTarixi)

                    $('input[name="doc_presented_reg_address"]').val(value.qeydiyyat)
                }
            });
        })

        loadUserTypes(2)

        $('.selected-pdf-viewer').on('change',function (){
            if ($(this).val() == 'chixarish'){
                $('#chixarish').show()
                $('#apostil').hide()
            }else{
                $('#chixarish').hide()
                $('#apostil').show()

                $('.vetendashligi').text()
            }
        })

        $('.export-pdf').on('click',function(){
            var id = 'chixarish';
            if($('.selected-pdf-viewer option:selected').val() == 'chixarish'){
                id = 'chixarish';
            }else {
                id = 'apostil'
            }

            $("#"+id).printThis({
                loadCSS: "{{asset('vendor/bootstrap/css/bootstrap-grid.css')}}"
            });
        })

        $('.export').on('click',function(){

            if($('.selected-pdf-viewer option:selected').val() == 'chixarish'){
                $('.pdf-apostil-number a').html($('.apostil-nomresi').val());
                $('.pdf-apostil-date a').html($('.apostil-tarixi').val());
                $('.pdf-doc-type a').html($('.apostil-types option:selected').text());
                $('.pdf-doc-num-date a').html($('.rs_nomresi').val() + ' /' + $('.rs_tarixi').val());
                $('.pdf-senedi-veren-orqan a').html($('.rs_veren_orqan').val());
                $('.pdf-doc-name a').html($('.rs_sened_ad').val());
                $('.pdf-short-text a').html($('.rs_qisa_mezmun').val());
                $('#exportTable .1').html($('.mur-eden-shexs div:eq(0)').text());
                $('#exportTable .2').html($('.mur-eden-shexs div:eq(1)').text());
                $('#exportTable .3').html($('.mur-eden-shexs div:eq(2)').text());
                $('#exportTable .4').html($('.mur-eden-shexs div:eq(3)').text());
            }else {

            }
        })

        $('.save-button .save-apostil-document').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#createApostil').append('<input type="hidden" name="status" value="0">');
            $('#createApostil').get(0).submit();
        });

        $('.save-button .accepted').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#createApostil').append('<input type="hidden" name="status" value="1">');
            $('#createApostil').get(0).submit();
        });

        $('.apostil-types').change(function () {
            loadUserTypes($(this).val())
        })

        function loadUserTypes(id) {
            let url = "{{route('data.user.types',':id')}}";

            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                // data: {},
                dataType: 'JSON',
                success: function (response) {
                    let userTypeSelect = '<option hidden disabled selected></option>';

                    response.data.map(item => (

                        userTypeSelect += "<option  name=" + item.string_id + " value=" + item.id + ">" + item.name + "</option>"

                    ))
                    $('.apostil-user-types').html("");
                    if ($('.apostil-types option:selected').val() == 2 || $('.apostil-types option:selected').val() == 1){
                        $('.apostil-user-types').html("<select class='ishtirakci' name='apply_participant'>" + userTypeSelect + "</select>");
                    }
                }
            })
            $(".ishtirakci option:first").trigger('change')
        }

        $(Document).change('.ishtirakci', function () {
            var ishtirakchiNovu = $(".ishtirakci option:selected").attr('name');
            $('.line').show();
            if (ishtirakchiNovu == 'yaxin_qohumu') {
                $('.sened-sahibi-asa-container .asa h6').text('Sənədin sahibinin A.S.A')
                designMuracietEdenShexs('sened-sahibi-asa-container', 'qohumluq-derecesi-container', 'etibanamenin-nomresi-container', 'vezifesi-container', 'voen-container');
            } else if (ishtirakchiNovu == 'numayende') {
                $('.sened-sahibi-asa-container .asa h6').text('Soyadı, adı, ata adı')
                designMuracietEdenShexs('sened-sahibi-asa-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'vezifesi-container', 'voen-container');
            } else if (ishtirakchiNovu == 'senedi_imz_shexs' || ishtirakchiNovu == 'senedin_mexsus_oldugu_shexs') {
                $('.sened-sahibi-asa-container .bashliq h6').text('Soyadı, adı, ata adı')
                designMuracietEdenShexs('sened-sahibi-asa-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'vezifesi-container', 'voen-container', false);
                $('.sened-sahibi-asa-container').show();
            } else if (ishtirakchiNovu == 'selahiyyetli_shexs') {
                designMuracietEdenShexs('voen-container', 'vezifesi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'etibanamenin-nomresi-container');
            } else if (ishtirakchiNovu == 'etibarname_esasinda') {
                $('.etibanamenin-nomresi-container .poa-number-title h6').text('Etibarnamənin nömrəsi')
                $('.mektubun-nomresi-3').hide();
                $('.etibarnamenin-nomresi-3').show();
                designMuracietEdenShexs('voen-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'vezifesi-container');
            } else if (ishtirakchiNovu == 'mektub_esasinda') {
                $('.etibanamenin-nomresi-container .poa-number-title h6').text('Məktubun nömrəsi')
                $('.mektubun-nomresi-3').show();
                $('.etibarnamenin-nomresi-3').hide();
                designMuracietEdenShexs('voen-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'vezifesi-container');
            } else {
                designMuracietEdenShexs('voen-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'vezifesi-container', false);
                $('.line').hide();
            }
        });

        function designMuracietEdenShexs(class1, class2, class3, class4, class5, other = true) {
            if (other == true) {
                $('.' + class1).show();
                $('.' + class2).show();
            } else {
                $('.' + class1).hide();
                $('.' + class2).hide();
            }
            $('.' + class3).hide();
            $('.' + class4).hide();
            $('.' + class5).hide();

        }

        if($('.row mur-eden-shexs div h6').val() != ''){
            $('.accepted').show();
            $('.export').show();
        }

        $('.save-apo').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            // $('#createApostilUser').get(0).submit();

            let form = $('#createApostilUser');
            let url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    if (data.status) {
                        $('.new-apostil-user .close').click();
                        $('input[name="apply_user_id"]').val('');
                        $('input[name="apply_user_id"]').val(data.id);
                        $('.muraciet-eden-shexsler').css('display', 'flex');
                        var series = $('.shv-seriyasi option:selected').text();
                        var number = $('.shv-nomresi').val();
                        var other_notes = $('.other_notes').val();
                        var apply_user_type = $('.apostil-types option:selected').text();
                        var name = '';
                        if ($('.apostil-types').val() == 1) {
                            var fizikiShexsSoyad = $('.muraciet-eden-shexs-ishtirakchi-soyad').val();
                            var fizikiShexsAd = $('.muraciet-eden-shexs-ishtirakchi-ad').val();
                            var fizikiShexsAtaAdi = $('.muraciet-eden-shexs-ishtirakchi-atadi').val();

                            name = fizikiShexsSoyad + ' ' + fizikiShexsAd + ' ' + fizikiShexsAtaAdi;
                        } else {
                            name = $('.legal_user_name').val()
                        }
                        $('.add-muraciet-eden-shexs').hide()
                        $('.accepted').show();
                        $('.export').show();
                        $('.mur-eden-shexs').html("<div class='col-md-3'><h6>" + series + "" + number + "</h6></div><div class='col-md-3'><h6>" + apply_user_type + "</h6></div><div class='col-md-4'><h6>" + name + "</h6></div><div class='col-md-2' style='text-align: end;padding: 0px 20px;'><button type='button' class='btn' data-toggle='modal' data-target='.bd-example-modal-xl' style='border: 0;padding: 2px 15px 12px 10px;height: 71%;'><img src='{{asset('files/icons/edit.png')}}'></button><button type='button' class='remove-user' style='\n" +
                            "    background-color: #f3f3f3;border: 0;padding: 0px 15px 12px 10px;height: 71%;'><img src='{{asset('files/icons/x.png')}}'></button></div>");


                    } else {
                        alert("validation xetasi");
                    }
                }
            });
        });

        $(document).on('click', '.remove-user', function () {
            $('.mur-eden-shexs').html('')
            $('.muraciet-eden-shexsler').hide();
            $('.accepted').hide();
            $('.export').hide();
            $('.add-muraciet-eden-shexs').show();
        })

        $('.dogum-tarixi').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            pickTime: false,
            minView: 2
        });

        $('.verilme-tarixi').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            pickTime: false,
            minView: 2
        });

        $('.tarixi').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            pickTime: false,
            minView: 2
        });

        $('.rs_tarixi').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            pickTime: false,
            minView: 2
        });

        $('.muraciet-eden-shexs-verilme-tarixi').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            pickTime: false,
            minView: 2
        });

    </script>
@endsection























