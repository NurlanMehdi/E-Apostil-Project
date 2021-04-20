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
                    <a class="export" onclick="printJS('createApostil', 'html')"><img
                            src="{{asset('files/icons/export.png')}}"></a>
                    </br>
                    <label class="export">{{__('language.export')}}</label>
                </div>
                <div class="col-md-4">
                    <a class="save" href="{{route('dashboard')}}"><img src="{{asset('files/icons/save.png')}}"></a>
                    </br>
                    <label class="save">{{__('language.yaddaSaxla')}}</label>
                </div>
            </div>

        </div>
    </div>
    <div class="apostil-form">
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
                                                value="{{ $apostilDocumentInfo->apostil_signing_user_id }}">{{ $apostilDocumentInfo->apostil_signing_user_name->name }}</option>
                                    @else
                                        <option selected hidden>-</option>
                                    @endif
                                    @foreach($imzalayanShexs as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                <div class="row">
                    <div class="col-md-12 button-group">
                        <div class="row">
                            <div class="col-md-3 bashliq"><h6>{{__('language.qeydler')}}</h6></div>
                            <div class="col-md-9 metnDaxilEdin">
                                <input class="apostil-qeyd" value="{{ $apostilDocumentInfo->apo_note ?? '' }}"
                                       name="apo_note" placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                @if($errors->has('apo_note'))
                                    <h6 class="error">{{ $errors->first('apo_note') }}</h6>
                                @endif
                            </div>
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
                                <input name="rs_signing_position" class="rs_vezife"
                                       value="{{$apostilDocumentInfo->rs_signing_position ?? '' }}"
                                       placeholder="{{__('language.vezife')}}" type="text">
                                @if($errors->has('rs_signing_position'))
                                    <h6 class="error">{{ $errors->first('rs_signing_position') }}</h6>
                                @endif
                            </div>
                            <div class="col-md-3 bashliq"><h6>{{__('language.imzalayaninVezifesiEn')}}</h6></div>
                            <div class="col-md-3">
                                <input name="rs_signing_position_en" class="rs_vezife_en"
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
                <div class="row muraciet-eden-shexsler">
                    <div class="col-md-3">
                        <h5>{{__('language.nomre')}}</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>{{__('language.ishtirakchi')}}</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>{{__('language.FizikiVeyaHuquqiShexsinAdi')}}</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>{{__('language.qeydler')}}</h5>
                    </div>
                </div>
                <div class="row mur-eden-shexs">

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
                                    <button style="float: initial;" type="button" class="close save-apo">
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
                                                <option value="2">Hüquqi şəxs</option>
                                                <option value="1">Fiziki şəxs</option>
                                            </select>
                                            @if($errors->has('apply_user_type'))
                                                <h6 class="error">{{ $errors->first('apply_user_type') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-6 apostil-user-types">
                                            @if($errors->has('apply_participant'))
                                                <h6 class="error">{{ $errors->first('apply_participant') }}</h6>
                                            @endif
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
                                            @if($errors->has('doc_owner_lastname'))
                                                <h6 class="error">{{ $errors->first('doc_owner_lastname') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <input class="muraciet-eden-shexs-ishtirakchi-ad" type="text"
                                                   name="doc_owner_name" placeholder="{{__('language.ad')}}">
                                            @if($errors->has('doc_owner_name'))
                                                <h6 class="error">{{ $errors->first('doc_owner_name') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <input class="muraciet-eden-shexs-ishtirakchi-atadi" type="text"
                                                   name="doc_owner_fathername" placeholder="{{__('language.ataAdi')}}">
                                            @if($errors->has('doc_owner_fathername'))
                                                <h6 class="error">{{ $errors->first('doc_owner_fathername') }}</h6>
                                            @endif
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
                                                            value="{{ $doc->id }}">{{ $doc->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('relationship_id'))
                                                <h6 class="error">{{ $errors->first('relationship_id') }}</h6>
                                            @endif
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
                                            @if($errors->has('power_of_attorney_number'))
                                                <h6 class="error">{{ $errors->first('power_of_attorney_number') }}</h6>
                                            @endif
                                        </div>
                                        <div style="display: none" class="col-md-3 mektubun-nomresi-3">
                                            <input class="mektubun-nomresi" name="letter_number"
                                                   placeholder="{{__('language.metnDaxilEdin')}}" type="number">
                                            @if($errors->has('letter_number'))
                                                <h6 class="error">{{ $errors->first('letter_number') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3 bashliq"><h6>{{__('language.verilmeTarixi')}}</h6></div>
                                        <div class="col-md-3">
                                            <input readonly='true' name="issue_date" type="text"
                                                   class="form-control datepicker-apostil muraciet-eden-shexs-verilme-tarixi"
                                                   value="<?= date('Y-m-d') ?>">
                                            @if($errors->has('issue_date'))
                                                <h6 class="error">{{ $errors->first('issue_date') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="col-md-12 voen-container">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.huquqiShexsinAdi')}}</h6></div>
                                        <div class="col-md-3">
                                            <input name="legal_user_name" class="legal_user_name"
                                                   placeholder="{{__('language.ad')}}" type="text">
                                            @if($errors->has('legal_user_name'))
                                                <h6 class="error">{{ $errors->first('legal_user_name') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3 bashliq"><h6>V.Ö.E.N</h6></div>
                                        <div class="col-md-3">
                                            <input name="voen" placeholder="{{__('language.metnDaxilEdin')}}"
                                                   type="text">
                                            @if($errors->has('voen'))
                                                <h6 class="error">{{ $errors->first('voen') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="col-md-12 vezifesi-container">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.vezifesi')}}</h6></div>
                                        <div class="col-md-9">
                                            <input name="position" class="vezifesi"
                                                   placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                            @if($errors->has('position'))
                                                <h6 class="error">{{ $errors->first('position') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="spaceUser">{{__('language.shexsiyyetVesiqesi')}}</div>
                                <div style="margin-top: 9px;" class="col-md-12 senedin-tipi">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.senedinTipi')}}</h6></div>
                                        <div class="col-md-9">
                                            <select name="doc_type_id" class="senedin-tipi-select">
                                                @foreach($senedinTipi as $doc)
                                                    <option value="{{ $doc->id }}">{{ $doc->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('doc_type_id'))
                                                <h6 class="error">{{ $errors->first('doc_type_id') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.svSerVeNom')}}</h6></div>
                                        <div class="col-md-2">
                                            <select class="shv-seriyasi" name="shv_series">
                                                <option value="1">AA-</option>
                                                <option value="2">AZE-</option>
                                            </select>
                                            @if($errors->has('shv_series'))
                                                <h6 class="error">{{ $errors->first('shv_series') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <input class="shv-nomresi" name="shv_number"
                                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                   type="number" maxlength="8">
                                            @if($errors->has('shv_number'))
                                                <h6 class="error">{{ $errors->first('shv_number') }}</h6>
                                            @endif
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
                                            <input readonly='true' name="doc_presented_date" type="text"
                                                   name="doc_presented_date"
                                                   class="form-control datepicker-apostil verilme-tarixi"
                                                   value="<?= date('Y-m-d') ?>">
                                            @if($errors->has('doc_presented_date'))
                                                <h6 class="error">{{ $errors->first('doc_presented_date') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3 bashliq"><h6>{{__('language.verenOrqan')}}</h6></div>
                                        <div class="col-md-3">
                                            <select name="letter_name" class="veren-orqan">
                                                <option value="volvo">İmzalayan şəxs 1</option>
                                                <option value="saab">İmzalayan şəxs 1</option>
                                                <option value="mercedes">İmzalayan şəxs 1</option>
                                                <option value="audi">İmzalayan şəxs 1</option>
                                            </select>
                                            @if($errors->has('letter_name'))
                                                <h6 class="error">{{ $errors->first('letter_name') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.userNames')}}</h6></div>
                                        <div class="col-md-3">
                                            <input name="doc_presented_name" type="text"
                                                   placeholder="{{__('language.soyad')}}">
                                            @if($errors->has('doc_presented_name'))
                                                <h6 class="error">{{ $errors->first('doc_presented_name') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <input name="doc_presented_lastname" type="text"
                                                   placeholder="{{__('language.ad')}}">
                                            @if($errors->has('doc_presented_lastname'))
                                                <h6 class="error">{{ $errors->first('doc_presented_lastname') }}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <input name="doc_presented_fathername" type="text"
                                                   placeholder="{{__('language.ataAdi')}}">
                                            @if($errors->has('doc_presented_fathername'))
                                                <h6 class="error">{{ $errors->first('doc_presented_fathername') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.dogumTarixi')}}</h6></div>
                                        <div class="col-md-9">
                                            <input name="doc_presented_birtday_date" readonly='true' type="text"
                                                   class="form-control datepicker-apostil dogum-tarixi"
                                                   value="<?= date('Y-m-d') ?>">
                                            @if($errors->has('doc_presented_birtday_date'))
                                                <h6 class="error">{{ $errors->first('doc_presented_birtday_date') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.QeydiyyatdaOlduguUnvan')}}</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="doc_presented_reg_address"
                                                   placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                            @if($errors->has('doc_presented_reg_address'))
                                                <h6 class="error">{{ $errors->first('doc_presented_reg_address') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.vetendashligi')}}</h6></div>
                                        <div class="col-md-9">
                                            <select name="doc_presented_native_id" class="vetendashligi" value="-">
                                                <option value="1">Azərbaycan vətəndaşı</option>
                                                <option value="2">Əcnəbi</option>
                                            </select>
                                            @if($errors->has('doc_presented_native_id'))
                                                <h6 class="error">{{ $errors->first('doc_presented_native_id') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.elaqeTelefonu')}}</h6></div>
                                        <div class="col-md-9">
                                            <input name="doc_presented_tel" class="elaqeTelefonu"
                                                   placeholder="{{__('language.nomreDaxilEdin')}}" type="number">
                                            @if($errors->has('doc_presented_tel'))
                                                <h6 class="error">{{ $errors->first('doc_presented_tel') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.ePocht')}}</h6></div>
                                        <div class="col-md-9">
                                            <input name="doc_presented_mail" class="ePocht"
                                                   placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                            @if($errors->has('doc_presented_mail'))
                                                <h6 class="error">{{ $errors->first('doc_presented_mail') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="spaceUser">{{__('language.elaveQeydler')}}</div>
                                <div class="col-md-12" style="margin-top: 1%;">
                                    <div class="row">
                                        <div class="col-md-3 bashliq"><h6>{{__('language.qeydler')}}</h6></div>
                                        <div class="col-md-9">
                                            <input class="other_notes" name="other_notes"
                                                   placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                            @if($errors->has('other_notes'))
                                                <h6 class="error">{{ $errors->first('other_notes') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>


@stop
@section('javascript')
    <script type="text/javascript">

        loadUserTypes(2)
        //
        // @media print {
        // .myDivToPrint {
        //         background-color: white;
        //         height: 100%;
        //         width: 100%;
        //         position: fixed;
        //         top: 0;
        //         left: 0;
        //         margin: 0;
        //         padding: 15px;
        //         font-size: 14px;
        //         line-height: 18px;
        //     }
        // }
        //

        function printdiv(printdivname) {
            var headstr = "<html><head><title>Booking Details</title></head><body>";
            var footstr = "</body>";
            var newstr = document.getElementById(printdivname).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }


        $('.save-button .save').on('click', function (e) {
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
                        userTypeSelect += "<option name=" + item.string_id + " value=" + item.id + ">" + item.name + "</option>"
                    ))

                    $('.apostil-user-types').html("");
                    $('.apostil-user-types').html("<select class='ishtirakci' name='apply_participant'>" + userTypeSelect + "</select>");
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
                        {{--$('.mur-eden-shexs').html("<div class='col-md-3'><h6>" + series +""+ number +"</h6></div><div class='col-md-3'><h6>"+apply_user_type+"</h6></div><div class='col-md-3'><h6>"+name+"</h6></div><div class='col-md-2'> <h6>"+other_notes+"</h6></div><div class='col-md-1'><button type='button' class='btn' data-toggle='modal' data-target='.bd-example-modal-xl' style='border: 0;padding: 0px 15px 12px 10px;height: 71%;'><img src='{{asset('files/icons/edit.png')}}'></button><button type='button' class='remove-user' style='border: 0;padding: 0px 15px 12px 10px;height: 71%;'><img src='{{asset('files/icons/x.png')}}'></button></div>");--}}

                    } else {
                        alert("validation xetasi");
                    }
            }
        });
        {{--$('.muraciet-eden-shexsler').css('display','flex');--}}
        {{--var series = $('.shv-seriyasi option:selected').text();--}}
        {{--var number = $('.shv-nomresi').val();--}}
        {{--var other_notes = $('.other_notes').val();--}}
        {{--var apply_user_type = $('.apostil-types option:selected').text();--}}
        {{--var name = '';--}}
        {{--if ($('.apostil-types').val() == 1){--}}
        {{--    var fizikiShexsSoyad = $('.muraciet-eden-shexs-ishtirakchi-soyad').val();--}}
        {{--    var fizikiShexsAd = $('.muraciet-eden-shexs-ishtirakchi-ad').val();--}}
        {{--    var fizikiShexsAtaAdi = $('.muraciet-eden-shexs-ishtirakchi-atadi').val();--}}

        {{--    name = fizikiShexsSoyad +' '+ fizikiShexsAd +' '+ fizikiShexsAtaAdi;--}}
        {{--}else{--}}
        {{--    name = $('.legal_user_name').val()--}}
        {{--}--}}
        {{--$('.add-muraciet-eden-shexs').hide()--}}
        {{--$('.accepted').show();--}}
        {{--$('.export').show();--}}
        {{--$('.mur-eden-shexs').html("<div class='col-md-3'><h6>" + series +""+ number +"</h6></div><div class='col-md-3'><h6>"+apply_user_type+"</h6></div><div class='col-md-3'><h6>"+name+"</h6></div><div class='col-md-2'> <h6>"+other_notes+"</h6></div><div class='col-md-1'><button type='button' class='btn' data-toggle='modal' data-target='.bd-example-modal-xl' style='border: 0;padding: 0px 15px 12px 10px;height: 71%;'><img src='{{asset('files/icons/edit.png')}}'></button><button type='button' class='remove-user' style='border: 0;padding: 0px 15px 12px 10px;height: 71%;'><img src='{{asset('files/icons/x.png')}}'></button></div>");--}}



        })
        ;

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























