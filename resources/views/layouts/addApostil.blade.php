@extends('layouts.master')
@section('title','Yeni Apostil')
@section('content')

    <div class="row new-apostil">
        <div class="col-md-12 new-apostil-title">
            <label>
                @if($documentId !== "new")
                    {{__('language.apostilEdit')}}
                @else
                    {{__('language.yeniApostil')}}
                @endif
            </label>
        </div>
        <div class="col-md-6 apostil-pages">
            <div class="row">
                <div class="col">
                    <div class="item">
                        <div class="round">
                            <input checked class="page-checkbox apo-info" type="checkbox" id="checkbox" />
                            <label for="checkbox" class="round-apo-info"></label>
                            <label style="color: var(--color-15306b);" class="page-title" for="a">Apostil haqqında
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="round2">
                            <input type="checkbox" class="page-checkbox legal-doc-info" id="checkbox" />
                            <label for="checkbox" class="round-apo-info"></label>
                            <label class="page-title" for="a">Rəsmi sənəd haqqında
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="round3">
                            <input class="page-checkbox user-info-page" type="checkbox" id="checkbox" />
                            <label for="checkbox" class="round-apo-info"></label>
                            <label class="page-title" for="a">Müraciət edən şəxs</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="apostil-form col-md-12" style=" height: 80vh;">
            <form autocomplete="off" id="createApostil" method="post"
                  action="{{ ($documentId !== "new") ? route('apostil.edit',$documentId) : route('apostil.submit') }}">
                {{csrf_field()}}
                <input type="hidden" name="apostil_user_id">
                <div class="new-apostil-create">
                    <div class="error-toastr" style="display: none">
                        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
                            <div class="toast-header">
                                <strong class="mr-auto"></strong>
                                <small></small>
                            </div>
                        </div>
                    </div>
                    <div class="apostil-haqqinda-melumat">
                        <div class="space">{{__('language.apostilHaqqindaMelumar')}}</div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>{{__('language.nomresi')}}</h6>
                                        <input disabled style="{{($errors->has('apostil_number')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} class="apostil-nomresi"
                                               value="{{$apostilDocumentInfo->apostil_number ?? request()->input('apostil_number', old('apostil_number'))}}"
                                               name="apostil_number" placeholder="{{__('language.nomresi')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <h6>{{__('language.tarixi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('apostil_date')) == true ? 'border: 1px solid red' : ''}}"  placeholder="DD.MM.YYYY" type="text" name="apostil_date"
                                               class="form-control {{($apostilDocumentInfo->status ?? '') != 0 ? '' : 'tarixi apostil-tarixi'}}"
                                               value="{{($apostilDocumentInfo->apostil_date ?? '') == '' ?  date('d.m.Y')  : date('d.m.Y',strtotime($apostilDocumentInfo->apostil_date))}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.imzalayanShexs')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <select style="height: 54%;{{($errors->has('apostil_signing_user_id')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}}  class="apostil-imzalayan-shexs" name="apostil_signing_user_id">
                                            @if(isset($apostilDocumentInfo->apostil_signing_user_id))
                                                <option selected
                                                        value="{{ $apostilDocumentInfo->apostil_signing_user_id ?? '' }}">{{ $apostilDocumentInfo->apostil_signing_user_name->name ?? ''}}</option>
                                            @else
                                                <option selected value="{{request()->input('apostil_signing_user_id', old('apostil_signing_user_id')) ?? ''}}">
                                                @foreach ($imzalayanShexs as $user)
                                                    @if($user->id == request()->input('apostil_signing_user_id', old('apostil_signing_user_id')))
                                                        {{ $user->name ?? '-'}}
                                                        @else
                                                        -
                                                        @break
                                                    @endif
                                                    @endforeach
                                                </option>
                                            @endif
                                            @foreach($imzalayanShexs as $user)
                                                @if(($apostilDocumentInfo->apostil_signing_user_id ?? '') != $user->id)
                                                        <option value="{{ $user->id ?? ''}}">{{ $user->name ?? ''}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($documentId != "new")
                                        <div class="col-md-6">
                                            <h6 class="bashliq">{{__('language.verenOrqan')}}</h6>
                                            <select class="veren-orqan-xin"  {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}}>
                                                <option selected value="Xarici İşlər Nazirliyi">Xarici İşlər Nazirliyi</option>
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-md-6" style="margin-top: 30px;">
                                        <input name="mail_status" {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} class="pocht"
                                               type="checkbox" {{ ($apostilDocumentInfo->mail_status ?? '') ? "checked" : "" }}>
                                        <h6 style="    margin-top: -2px;">&nbsp&nbsp&nbsp{{__('language.pochtVasDaxilOlub')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>{{__('language.apostil_created')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input type="text" readonly class="apostil_created" name="apostil_created" value="{{($apostilDocumentInfo->apostil_created ?? '') != '' ? $apostilDocumentInfo->apostil_created : Auth::user()->username}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="height:50px;margin-top: 30px;">
                                <button type="button" class="next-page">{{strtoupper(__('language.novbeti'))}}</button>
                            </div>
                        </div>
                    </div>
                    <div style="display:none;" class="resmi-sened-haqqinda-melumat">
                        <div class="space">{{__('language.resmiSenedHaqqindaMelumatlar')}}</div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.nomresi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_number')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} class="rs_nomresi" name="rs_number" placeholder="{{__('language.nomresi')}}"
                                               value="{{ $apostilDocumentInfo->rs_number ?? request()->input('rs_number', old('rs_number')) }}" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               type="text" maxlength="8" minlength="3" pattern="\d*"/>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.tarixi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input  style="{{($errors->has('rs_date')) == true ? 'border: 1px solid red' : ''}}"  placeholder="DD.MM.YYYY" type="text" name="rs_date"
                                               class="{{($apostilDocumentInfo->status ?? '') != 0 ? '' : 'form-control rs_tarixi'}}"
                                               value="{{($apostilDocumentInfo->rs_date ?? '') == '' ?  ''  : date('d.m.Y',strtotime($apostilDocumentInfo->rs_date))}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.imzalayanShexs')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_signing_user')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_signing_user" class="rs_imzalayan_shexs"
                                               value="{{$apostilDocumentInfo->rs_signing_user ?? request()->input('rs_signing_user', old('rs_signing_user')) }}" placeholder="Ad Soyad"
                                               type="text" >
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.imzalayanShexsEn')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_signing_user_en')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_signing_user_en" class="rs_imzalayan_shexs_en"
                                               value="{{$apostilDocumentInfo->rs_signing_user_en ?? request()->input('rs_signing_user_en', old('rs_signing_user_en')) }}"
                                               placeholder="Name Surname" type="text">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>{{__('language.imzalayaninVezifesi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_signing_position')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} autocomplete="off" name="rs_signing_position" class="rs_vezife"
                                               value="{{$apostilDocumentInfo->rs_signing_position ?? request()->input('rs_signing_position', old('rs_signing_position')) }}"
                                               placeholder="{{__('language.vezife')}}" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.imzalayaninVezifesiEn')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_signing_position_en')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} autocomplete="off" name="rs_signing_position_en" class="rs_vezife_en"
                                               value="{{$apostilDocumentInfo->rs_signing_position_en ?? request()->input('rs_signing_position_en', old('rs_signing_position_en')) }}"
                                               placeholder="{{__('language.position')}}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.verenOrqan')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_service')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_service" class="rs_veren_orqan"
                                               value="{{$apostilDocumentInfo->rs_service ?? request()->input('rs_service', old('rs_service')) }}"
                                               placeholder="{{__('language.verenOrqan')}}" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.verenOrqanEn')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_service_en')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_service_en" class="rs_veren_orqan_en"
                                               value="{{$apostilDocumentInfo->rs_service_en ?? request()->input('rs_service_en', old('rs_service_en')) }}"
                                               placeholder="{{__('language.givingAuthority')}}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.senedinAdi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_document_name')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_document_name" class="rs_sened_ad"
                                               value="{{$apostilDocumentInfo->rs_document_name ?? request()->input('rs_document_name', old('rs_document_name')) }}"
                                               placeholder="{{__('language.senedinAdi')}}" type="text">

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.senedinAdiEn')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input style="{{($errors->has('rs_document_name_en')) == true ? 'border: 1px solid red' : ''}}" {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_document_name_en" class="rs_sened_ad_en"
                                               value="{{$apostilDocumentInfo->rs_document_name_en ?? request()->input('rs_document_name_en', old('rs_document_name_en')) }}"
                                               placeholder="{{__('language.documentName')}}" type="text">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 button-group">
                                <div class="row">
                                    <div class="col-md-3 bashliq"></div>
                                    <div class="col-md-12 metnDaxilEdin">
                                        <h6 class="bashliq">{{__('language.qisaMezmun')}}</h6>
                                        <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="rs_short_note" class="rs_qisa_mezmun"
                                               value="{{$apostilDocumentInfo->rs_short_note ?? request()->input('rs_short_note', old('rs_short_note')) }}"
                                               placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="height:50px;margin-top: 30px;">
                                <button type="button" style="float: left;" class="prev-page">GERİYƏ</button>
                                <button type="button" class="next-page">{{strtoupper(__('language.novbeti'))}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form autocomplete="off" id="createApostilUser" method="post" action="{{route('apostil.user.submit')}}">
                {{csrf_field()}}
                <div class="new-apostil-create">
                    <div style="display:none;" class="row muraciet-eden-shexs">
                        <div class="space">{{__('language.muracietEdenShexs')}}</div>
                        <div style="margin-top: 9px;" class="col-md-12 ishtirakchi-novu">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="bashliq">{{__('language.ishtirakchininNovu')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} name="apply_user_type" class="novu apostil-types"
                                            placeholder="{{ __('language.ishtirakchininNovu') }}">
                                        @if($apostilUser->apply_user_type ?? '')
                                            @if($apostilUser->apply_user_type == 1)
                                                <option  value="0">-</option>
                                                <option selected="selected" value="1">Fiziki şəxs</option>
                                                <option  value="2">Hüquqi şəxs</option>
                                                <option  value="3">Dövlət qurumu
                                                </option>

                                            @elseif($apostilUser->apply_user_type == 2)
                                                <option  value="0">-</option>
                                                <option  value="1">Fiziki şəxs</option>
                                                <option  selected="selected" value="2">Hüquqi şəxs</option>
                                                <option  value="3">Dövlət qurumu</option>


                                            @else
                                                <option  value="0">-</option>
                                                <option  value="1">Fiziki şəxs</option>
                                                <option  value="2">Hüquqi şəxs</option>
                                                <option selected="selected" value="3">Dövlət qurumu</option>
                                            @endif
                                        @else
                                            <option  selected="selected" value="0">-</option>
                                            <option  value="1">Fiziki şəxs</option>
                                            <option  value="2">Hüquqi şəxs</option>
                                            <option  value="3">Dövlət qurumu</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-9 apostil-user-types">
                                    <h6 class="bashliq">&nbsp</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} class='ishtirakci' name='apply_participant'></select>
                                </div>
                            </div>
                        </div>
                        <a style="display: none" class="line"></a>
                        <div style="display: none" class="col-md-12 sened-sahibi-asa-container">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="bashliq asa">{{__('language.senedSahibiASA')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->doc_owner_name ?? ''}}" class="muraciet-eden-shexs-ishtirakchi-ad" type="text"
                                           name="doc_owner_name" placeholder="{{__('language.ad')}}">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="bashliq asa">&nbsp</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->doc_owner_lastname ?? ''}}" class="muraciet-eden-shexs-ishtirakchi-soyad"
                                           name="doc_owner_lastname" type="text"
                                           placeholder="{{__('language.soyad')}}">
                                </div>
                                <div class="col-md-3">
                                    <h6 class="bashliq asa">&nbsp</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->doc_owner_fathername ?? ''}}" class="muraciet-eden-shexs-ishtirakchi-atadi" type="text"
                                           name="doc_owner_fathername" placeholder="{{__('language.ataAdi')}}">
                                </div>
                            </div>
                        </div>
                        <div style="display: none;margin-top: 14px;padding: 0px 15px;" class="col-md-12 qohumluq-derecesi-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="bashliq">{{__('language.qohumluqDerecesi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} class="qohumluq-derecesi" name="relationship_id">
                                        <option selected value="">-</option>
                                        @foreach($qohumluqDerecesi as $doc)
                                            <option {{($apostilUser->relationship_id ?? '') == $doc->id ? 'selected' : ''}} string_id="{{ $doc->string_id }}"
                                                    value="{{ $doc->id ?? ''}}">{{ $doc->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;margin-top: 14px;" class="col-md-12 etibanamenin-nomresi-container">
                            <div class="row">
                                <div class="col-md-6 etibarnamenin-nomresi-3">
                                    <h6 class="bashliq ">{{__('language.etibarnameninNomresi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}}  value="{{$apostilUser->power_of_attorney_number ?? ''}}" class="etibarnamenin-nomresi" name="power_of_attorney_number"
                                           placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                </div>
                                <div style="display: none" class="col-md-6 mektubun-nomresi-3">
                                    <h6 class="bashliq">Məktubun nömrəsi</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->letter_number ?? ''}}" class="mektubun-nomresi" name="letter_number"
                                           placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.verilmeTarixi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input placeholder="DD.MM.YYYY" name="issue_date" type="text"
                                           class="form-control {{($apostilDocumentInfo->status ?? '') != 0 ? '' : 'muraciet-eden-shexs-verilme-tarixi'}}"
                                           value="{{($apostilUser->issue_date ?? '') == '' ? ''  : date('d.m.Y',strtotime($apostilUser->issue_date))}}">
                                </div>
                            </div>
                        </div>
                        <div style="display: none;margin-top: 14px;" class="col-md-12 voen-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.huquqiShexsinAdi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->legal_user_name ?? ''}}" name="legal_user_name" class="legal_user_name"
                                           placeholder="{{__('language.ad')}}" type="text">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="bashliq">V.Ö.E.N</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->voen ?? ''}}" name="voen" placeholder="{{__('language.metnDaxilEdin')}}"
                                           type="text" pattern="\d*"/>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;margin-top: 14px;" class="col-md-12 dovlet-qurumunun-adi">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="bashliq">Dövlət qurumunun adı</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->name_of_state_body ?? ''}}" name="name_of_state_body" class="name_of_state_body"
                                           placeholder="{{__('language.ad')}}" type="text">
                                </div>
                            </div>
                        </div>
                        <div style="display: none;margin-top: 14px;padding: 0px 15px;" class="col-md-12 vezifesi-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="bashliq">{{__('language.vezifesi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>    <h6 style="position: absolute;color: red;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}}  value="{{$apostilUser->position ?? ''}}" name="position" class="vezifesi"
                                           placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="space">{{__('language.shexsiyyetVesiqesi')}}</div>
                        <div class="col-md-12" style="margin-top: 8px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.vetendashligi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} name="doc_presented_native" class="vetendashligi">
                                        @if($apostilUser->doc_presented_native ?? '')
                                            @if($apostilUser->doc_presented_native != '')
                                                <option selected  value="{{$apostilUser->doc_presented_native}}">{{$apostilUser->doc_presented_native}}</option>
                                            @endif
                                        @else
                                            <option selected value="">-</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 14px;padding: 0px 15px;" class="col-md-12 senedin-tipi">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="bashliq">{{__('language.senedinTipi')}}</h6>
                                    <h6 style="position: absolute;color: red;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} name="doc_type_id" class="senedin-tipi-select">
                                        @if(isset($apostilUser->doc_type_id))
                                            <option key="{{ $apostilUser->apostil_doc_type_key->string_id ?? ''}}" selected hidden
                                                    value="{{ $apostilUser->doc_type_id ?? '' }}">{{ $apostilUser->apostil_doc_type_name->name ?? ''}}</option>
                                        @else
                                            <option selected value="0">-</option>
                                        @endif
                                        @foreach($senedinTipi as $doc)
                                                <option key="{{ $doc->string_id ?? ''}}" value="{{ $doc->id ?? ''}}">{{ $doc->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 8px;">
                            <h6 class="bashliq" style="margin-top: 9px;">{{__('language.svSerVeNom')}}</h6>

                            <div class="row" style="height: 45px;">
                                <div class="col-md-2" style="height: 43px;display:none">
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} class="shv-seriyasi" name="shv_series">
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
                                <div class="col-md-5">
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} class="shv-nomresi" name="shv_number"
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
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.verilmeTarixi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input placeholder="DD.MM.YYYY" name="doc_presented_date" type="text"
                                           class="form-control {{($apostilDocumentInfo->status ?? '') != 0 ? '' : 'verilme-tarixi'}} "
                                           value="{{($apostilUser->doc_presented_date ?? '') == '' ?  ''  : date('d.m.Y',strtotime($apostilUser->doc_presented_date))}}">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.verenOrqan')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->letter_name ?? ''}}" name="letter_name" type="text" class="veren-orqan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 15px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="bashliq">{{__('language.adi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="doc_presented_name" value="{{$apostilUser->doc_presented_name ?? ''}}" type="text"
                                           placeholder="{{__('language.soyad')}}">
                                </div>
                                <div class="col-md-3">
                                    <h6 class="bashliq">{{__('language.soyadi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="doc_presented_lastname" value="{{$apostilUser->doc_presented_lastname ?? ''}}" type="text"
                                           placeholder="{{__('language.ad')}}">
                                </div>
                                <div class="col-md-3">
                                    <h6 class="bashliq">{{__('language.ataAdi')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="doc_presented_fathername"  value="{{$apostilUser->doc_presented_fathername ?? ''}}" type="text"
                                           placeholder="{{__('language.ataAdi')}}">
                                </div>
                                <div class="col-md-3">
                                    <h6 class="bashliq">{{__('language.gender')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <select {{($apostilDocumentInfo->status ?? '') != 0 ? 'disabled' : ''}} class="gender" name="gender">
                                        @if($apostilUser->gender ?? '')
                                            @if($apostilUser->gender == 1)
                                                <option selected value="1">Kişi</option>
                                                <option value="2">Qadın</option>
                                            @else
                                                <option value="1">Kişi</option>
                                                <option selected value="2">Qadın</option>
                                            @endif
                                        @else
                                            <option selected value="0">-</option>
                                            <option value="1">Kişi</option>
                                            <option value="2">Qadın</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 16px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.dogumTarixi')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input name="doc_presented_birtday_date" placeholder="DD.MM.YYYY"  type="text"
                                           class="form-control {{($apostilDocumentInfo->status ?? '') != 0 ? '' : 'verilme-tarixi'}}"
                                           value="{{($apostilUser->doc_presented_birtday_date ?? '') == '' ? ''  : date('d.m.Y',strtotime($apostilUser->doc_presented_birtday_date))}}">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.QeydiyyatdaOlduguUnvan')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} name="doc_presented_reg_address"
                                           placeholder="{{__('language.metnDaxilEdin')}}" value="{{$apostilUser->doc_presented_reg_address ?? ''}}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 16px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.elaqeTelefonu')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} maxlength="9" name="doc_presented_tel" class="elaqeTelefonu"
                                           placeholder="50XXXXXXX" value="{{$apostilUser->doc_presented_tel ?? ''}}"  type="number">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="bashliq">{{__('language.ePocht')}}</h6>
                                    <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                    <input {{($apostilDocumentInfo->status ?? '') != 0 ? 'readonly' : ''}} value="{{$apostilUser->doc_presented_mail ?? ''}}"  name="doc_presented_mail" class="ePocht"
                                           placeholder="example@apostil.az" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col" style="height:50px;margin-top: 30px;">

                            <button type="button" style="float: left;margin-left: -14px;" class="prev-page">GERİYƏ</button>
                            @if(($apostilDocumentInfo->status ?? '') != 0 && Auth::user()->key == 'superadmin')
                            <button type="button" style="margin-right: 10px;" class="cancel">{{strtoupper(__('language.legvet'))}}</button>
                            @endif
                            <button type="button" style="margin-right: 10px;" class="accepted">{{strtoupper(__('language.tesdiqEt'))}}</button>
                            <button type="button" style="margin-right: 10px;" class="{{($apostilDocumentInfo->status ?? '') != 0 ? '' : 'save-apostil-document'}} sav-apo-doc">{{strtoupper(__('language.yaddaSaxla'))}}</button>
                            <button type="button" style="margin-right: 10px;" data-toggle="modal" data-target=".export-modal" class="export">{{strtoupper(__('language.export'))}}</button>
                        </div>
                    </div>
                </div>

            </form>
            <div class="modal fade export-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="row close-modal" style="background-color: var(--color-f3f3f3);">
                            <div class="col-md-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <img src="{{asset('files/icons/close.png')}}">
                                </button>

                            </div>
                        </div>
                        <div class="row export-modal-background">
                            <div class="col-md-6 pdf-viewer">
                                <div class="row pdf-apostille" id="apostil">
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
                                                    <div class="col-md-12"><h6 class="signing-user-position"></h6></div>
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
                                                    <div class="col-md-12"><h6 class="city">Bakı / Baku</h6></div>
                                                    <div class="col-md-12"><label>Şəhər / At</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">6</div>
                                            <div class="col-md-5 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="export-date"></h6></div>
                                                    <div class="col-md-12"><label>Tarixdə / The</label></div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 sira">7</div>
                                            <div class="col-md-11 info">
                                                <div class="row">
                                                    <div class="col-md-12"><h6 class="terefinden">{{__('language.xin') .'/ Ministry of Foreign Affairs'}}</h6></div>
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
                                <div  style="display: none"  class="row pdf-chixarish" id="chixarish">
                                    <div class="col-md-12 apostille-title"><h6>”Apostillərin Elektron Reyestri” İnformasiya Sistemləri</h6></div>
                                    <div class="col-md-12 apostille-title"><h4>ÇIXARIŞ</h4></div>
                                    <div class="col-md-12 country">
                                        <div class="accepted-apostil-doc row">
                                            <div class="space-pdf">Apostil barədə məlumat</div>
                                            <div class="space-white-pdf pdf-apostil-number">Apostilin nömrəsi : <a></a></div>
                                            <div class="space-white-pdf pdf-apostil-date">Apostilin tarixi : <a></a></div>
                                            <div class="space-white-pdf pdf-letten-name">Apostil verən orqanın adı : <a></a></div>
                                            <div class="space-white-pdf pdf-signing-user">Apostili imzalamış şəxs : <a></a></div>

                                            <div class="space-pdf">Rəsmi sənəd barədə məlumatlar</div>
                                            <div class="space-white-pdf pdf-doc-type">Sənədin tipi : <a></a></div>
                                            <div class="space-white-pdf pdf-doc-num-date">Sənədin nömrəsi və tarixi : <a></a></div>
                                            <div class="space-white-pdf pdf-senedi-veren-orqan">Sənədi verən orqan : <a></a></div>

                                            <div class="space-pdf pdf-document-info">Sənəd barədə məlumatlar</div>
                                            <div class="space-white-pdf pdf-doc-name">Sənədin adı : <a></a></div>
                                            <div class="space-white-pdf pdf-short-text">Sənədin qısa məzmunu : <a></a></div>

                                            <div class="space-pdf">Müraciət edən şəxs</div>
                                            <table id="exportTable" class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td style="padding: 4px 14px;" class="1"></td>
                                                    <td style="padding: 4px 14px;" class="2"></td>
                                                    <td style="padding: 4px 14px;" class="3"></td>
                                                    <td style="padding: 4px 14px;" class="4"></td>
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
                                            <option value="chixarish">Çıxarış</option>
                                            <option selected value="apostil">Apostil</option>
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
        if($('.mur-eden-shexs .col-md-3:eq(1) h6').text() != ''){
            $('.add-muraciet-eden-shexs').hide()
        }

        $('.shv-axtar').on('click',function (){

            var serie = $('.shv-seriyasi option:selected').text();
            var seriesNumber = $('.shv-nomresi').val();
            var fullSerieNumber = serie+''+seriesNumber;

            var userInfoFinCode = {
                'AZE-25739312': {'name': "Murad", 'lastname': "Əliyev", 'fathername': 'Fərid','verenOrqan':'ASAN1','vesiqeninVerilmeTarixi':'01.09.2012','qeydiyyat':'Binəqədi ray.,E.Isayev, ev 24 m 5','dogumTarixi':'21.02.1976'},
                'AZE-14793132': {'name': "Nurlan", 'lastname': "Güləliyev", 'fathername': 'Mehdi','verenOrqan':'ASAN3','vesiqeninVerilmeTarixi':'10.12.2014','qeydiyyat':'Bakı şəh.,Yasamal ray.,Ə.Veliyev, ev 33 m 2','dogumTarixi':'12.09.1998'},
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

        loadUserTypes($('.apostil-types option:selected').val())

        $('.selected-pdf-viewer').on('change',function (){
            if ($(this).val() == 'chixarish'){
                $('#chixarish').show()
                $('#apostil').hide()
            }else{
                $('#chixarish').hide()
                $('#apostil').show()

                $('.vetendashligi').text()
            }
            exportPdf()
        })

        function ValidationPages(key){
            if (key == 'next'){
                if($('.apostil-haqqinda-melumat:visible').length != 0){
                    if ($('.apostil-imzalayan-shexs').val() != '' && $('.apostil-tarixi').val() != ''){
                        $('.round #checkbox').prop('checked',false);
                        $('.round3 #checkbox').prop('checked',false);
                        $('.round2 #checkbox').prop('checked',true);
                        $('.round label').css('color', 'var(--color-6d81ac)');
                        $('.round3 label').css('color', 'var(--color-6d81ac)');
                        $('.round2 label').css('color', 'var(--color-15306b)');
                        $('.apostil-haqqinda-melumat').hide()
                        $('.muraciet-eden-shexs').hide()
                        $('.resmi-sened-haqqinda-melumat').show()
                    }else{
                        errorToastr()
                    }
                }else if($('.resmi-sened-haqqinda-melumat:visible').length != 0){
                    if ($('.resmi-sened-haqqinda-melumat input[value=""]').length <= 1){
                        $('.round #checkbox').prop('checked',false);
                        $('.round3 #checkbox').prop('checked',true);
                        $('.round2 #checkbox').prop('checked',false);
                        $('.round label').css('color', 'var(--color-6d81ac)');
                        $('.round3 label').css('color', 'var(--color-15306b)');
                        $('.round2 label').css('color', 'var(--color-6d81ac)');
                        $('.apostil-haqqinda-melumat').hide()
                        $('.resmi-sened-haqqinda-melumat').hide()
                        $('.muraciet-eden-shexs').show()
                    }else{
                        errorToastr()
                    }
                }
            }else{
                if($('.muraciet-eden-shexs:visible').length != 0){
                    $('.round #checkbox').prop('checked',false);
                    $('.round3 #checkbox').prop('checked',false);
                    $('.round2 #checkbox').prop('checked',true);
                    $('.round label').css('color', 'var(--color-6d81ac)');
                    $('.round3 label').css('color', 'var(--color-6d81ac)');
                    $('.round2 label').css('color', 'var(--color-15306b)');
                    $('.apostil-haqqinda-melumat').hide()
                    $('.muraciet-eden-shexs').hide()
                    $('.resmi-sened-haqqinda-melumat').show()
                }else if($('.resmi-sened-haqqinda-melumat:visible').length != 0){
                    $('.round #checkbox').prop('checked',true);
                    $('.round3 #checkbox').prop('checked',false);
                    $('.round2 #checkbox').prop('checked',false);
                    $('.round label').css('color', 'var(--color-15306b)');
                    $('.round3 label').css('color', 'var(--color-6d81ac)');
                    $('.round2 label').css('color', 'var(--color-6d81ac)');
                    $('.apostil-haqqinda-melumat').show()
                    $('.muraciet-eden-shexs').hide()
                    $('.resmi-sened-haqqinda-melumat').hide()
                }if($('.muraciet-eden-shexs:visible').length != 0){
                    $('.round #checkbox').prop('checked',false);
                    $('.round3 #checkbox').prop('checked',false);
                    $('.round2 #checkbox').prop('checked',true);
                    $('.round label').css('color', 'var(--color-6d81ac)');
                    $('.round3 label').css('color', 'var(--color-6d81ac)');
                    $('.round2 label').css('color', 'var(--color-15306b)');
                    $('.apostil-haqqinda-melumat').hide()
                    $('.muraciet-eden-shexs').hide()
                    $('.resmi-sened-haqqinda-melumat').show()
                }else if($('.resmi-sened-haqqinda-melumat:visible').length != 0){
                    $('.round #checkbox').prop('checked',true);
                    $('.round3 #checkbox').prop('checked',false);
                    $('.round2 #checkbox').prop('checked',false);
                    $('.round label').css('color', 'var(--color-15306b)');
                    $('.round3 label').css('color', 'var(--color-6d81ac)');
                    $('.round2 label').css('color', 'var(--color-6d81ac)');
                    $('.apostil-haqqinda-melumat').show()
                    $('.muraciet-eden-shexs').hide()
                    $('.resmi-sened-haqqinda-melumat').hide()
                }
            }

        }
        $('.next-page').on('click',function (){
            ValidationPages('next')
        });

        $('.apostil-pages #checkbox').on('click',function (){
            alert($(this).parents('div').attr('class'))
        })
        function errorToastr(){
            $('.mr-auto').html('<div style="font-size: 12px;"><img src="{{asset('files/icons/i.png')}}">&nbsp&nbsp&nbsp&nbsp&nbspMəlumatlar tam daxil edilməyib!</div>');
            $('.error-toastr').show();
            $('.toast').toast('show');
            setTimeout(function () {
                $('.error-toastr .toast').removeClass('show');
                $('.error-toastr .toast').addClass('hide');
                $('.error-toastr').hide();
            }, 5000);
        }

        $('.prev-page').on('click',function (){
            ValidationPages('prev')
        });

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

        if($('.senedin-tipi-select option:selected').attr('key') == 'shexsiyyet_vesiqesi'){
            $('.shv-seriyasi').parents('.col-md-2').show()
        }

        $('.senedin-tipi-select').on('change',function (){
            if($(this).find('option:selected').attr('key') == 'shexsiyyet_vesiqesi'){
                $('.shv-seriyasi').parents('.col-md-2').show()
            }else{
                $('.shv-seriyasi').parents('.col-md-2').hide()
            }
        })

        $('.export').on('click',function(){
            exportPdf()
        })

        function exportPdf(){
            if($('.selected-pdf-viewer option:selected').val() == 'chixarish'){
                $('.pdf-apostil-number a').html($('.apostil-nomresi').val());
                $('.pdf-apostil-date a').html($('input[name="apostil_date"]').val());
                $('.pdf-doc-type a').html($('.senedin-tipi-select option:selected').text());
                $('.pdf-doc-num-date a').html($('.rs_nomresi').val() + ' / ' + $('.rs_tarixi').val());
                $('.pdf-senedi-veren-orqan a').html($('.rs_veren_orqan').val());
                $('.pdf-letten-name a').html($('.veren-orqan-xin option:selected').text());
                $('.pdf-signing-user a').html($('.apostil-imzalayan-shexs option:selected').text());
                $('.pdf-doc-name a').html($('.rs_sened_ad').val());
                $('.pdf-short-text a').html($('.rs_qisa_mezmun').val());
                $('#exportTable .1').html($('.elaqeTelefonu').val());
                $('#exportTable .2').html($('.apostil-types option:selected').text());
                if ($('.apostil-types option:selected').val() == 2){
                    $('#exportTable .3').html($('.legal_user_name').val());
                }else if($('.apostil-types option:selected').val() == 3){
                    $('#exportTable .3').html($('.name_of_state_body').val());
                }else{
                    $('#exportTable .3').html($('.muraciet-eden-shexs-ishtirakchi-soyad').val() +' '+ $('.muraciet-eden-shexs-ishtirakchi-ad').val() +' '+ $('.muraciet-eden-shexs-ishtirakchi-atadi').val());
                }
                $('#exportTable .4').html($('.rs_qisa_mezmun').val());
            }else{
                $('.signing-user').html($('.rs_imzalayan_shexs').val());
                $('.signing-user-position').html($('.rs_vezife').val());
                $('.mohur').html($('.rs_veren_orqan').val());
                $('.export-date').html($('.apostil-tarixi').val());
                $('.nomreli').html($('.apostil-nomresi').val());
            }
        }

        $('.save-apostil-document').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            let form = $('#createApostilUser');
            let url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (data) {
                    if (data.status) {
                        $('#createApostilUser').append('<input type="hidden" name="status" value="0">');
                        $('input[name="apostil_user_id"]').val('');
                        $('input[name="apostil_user_id"]').val(data.id);
                        $('#createApostil').append('<input type="hidden" name="status" value="0">');
                        $('#createApostil').get(0).submit();
                    }else{
                        errorToastr()
                    }
                }
            });
        });

        $('.vetendashligi').on('click',function (){
            if ($('.vetendashligi option').length == 1){

                let url = "{{route('excel.reader',['name' => ':name', 'folder' => ':folder'])}}";
                url = url.replace(':name', 'vetendashlig.xls').replace(':folder', 'files');

                var selectedCountry = $('.vetendashligi option:selected').val()
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        var country = '';
                        if(selectedCountry != 0){
                            country += "<option selected hidden value="+selectedCountry+">"+selectedCountry+"</option>";
                        }

                        $.each(response.data, function(k, v) {
                            country += "<option value="+v+">"+v+"</option>";


                        })

                        $('.vetendashligi').html(country)
                    }
                })
            }
        })

        $('input').change(function (){
            $(this).attr('value',$(this).val())
        })

        $('.accepted').on('click', function (e) {
            $('input').css('border','1px solid #e5e5e5')
            $('select').css('border','1px solid #e5e5e5')
            $('#createApostilUser').append('<input type="hidden" name="status" value="1">');
            e.preventDefault();
            e.stopPropagation();
            let form = $('#createApostilUser');
            let url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    $.each(data.errors, function(k, v) {
                        $('[name="'+k+'"]').css('border','1px solid red')
                    })
                    if (data.status) {
                        $('input[name="apostil_user_id"]').val('');
                        $('input[name="apostil_user_id"]').val(data.id);

                        $('#createApostil').append('<input type="hidden" name="status" value="1">');
                        $('#createApostil').get(0).submit();
                        $(location).attr('{{route('dashboard')}}');

                    } else if (data.errors != undefined) {
                        errorToastr()
                    }
                }
            });
        });

        $('.cancel').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#createApostil').append('<input type="hidden" name="status" value="2">');
            $('#createApostil').get(0).submit();
        });

        $('.apostil-types').change(function () {
            $('.apostil-user-types .ishtirakci').html("");
            $('.sened-sahibi-asa-container').hide()
            $('.qohumluq-derecesi-container').hide()
            $('.etibanamenin-nomresi-container').hide()
            $('.vezifesi-container').hide()
            $('.voen-container').hide()
            $('.ishtirakci').prop('disabled',false)
            loadUserTypes($(this).val(),'change')
        })

        function loadUserTypes(id,key) {
            let url = "{{route('data.user.types',':id')}}";

            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    let userTypeSelect = '<option selected>-</option>';

                    if('{{$documentId}}' !== 'new' && key == undefined){
                        userTypeSelect += '<option selected hidden name="{{$apostilUser->string_id ?? ''}}" value="{{$apostilUser->apply_participant ?? ''}}">{{$apostilUser->name ?? ''}}</option>';
                    }

                    response.data.map(item => (

                        userTypeSelect += "<option  name=" + item.string_id + " value=" + item.id + ">" + item.name + "</option>"

                    ))

                    $('.apostil-user-types .ishtirakci').html("");
                    if ($('.apostil-types option:selected').val() == "2" || $('.apostil-types option:selected').val() == "1" || $('.apostil-types option:selected').val() == "3"){
                        $('.apostil-user-types .ishtirakci').html(userTypeSelect);
                        $('.ishtirakci option[name="{{$apostilUser->string_id ?? ''}}"]').trigger('change')
                    }else if($('.apostil-types option:selected').val() == "0"){
                        $('.apostil-user-types .ishtirakci').html("");
                        $('.sened-sahibi-asa-container').hide()
                        $('.qohumluq-derecesi-container').hide()
                        $('.etibanamenin-nomresi-container').hide()
                        $('.vezifesi-container').hide()
                        $('.voen-container').hide()
                    }
                }
            })
            $(".ishtirakci option:first").trigger('change')
        }

        $('.ishtirakci').on('change', function () {
            if('{{$documentId}}' == 'new'){
                $('.vezifesi-container input').val('')
                $('.dovlet-qurumunun-adi input').val('')
                $('.voen-container input').val('')
                $('.etibanamenin-nomresi-container input').val('')
                $('.qohumluq-derecesi-container input').val('')
                $('.sened-sahibi-asa-container input').val('')
            }
            var ishtirakchiNovu = $(".ishtirakci option:selected").attr('name');
            var ishtirakchi = $('.apostil-types option:selected').val();
            $('.line').show();
            $('.dovlet-qurumunun-adi').hide();
            if (ishtirakchiNovu == 'yaxin_qohumu') {
                $('.sened-sahibi-asa-container .asa h6').text('Sənədin sahibinin A.S.A')
                designMuracietEdenShexs('sened-sahibi-asa-container', 'qohumluq-derecesi-container', 'etibanamenin-nomresi-container', 'vezifesi-container', 'voen-container');
            } else if (ishtirakchiNovu == 'numayende') {
                $('.sened-sahibi-asa-container .asa h6').text('Soyadı, adı, ata adı')
                designMuracietEdenShexs('sened-sahibi-asa-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'vezifesi-container', 'voen-container');
            } else if (ishtirakchiNovu == 'senedi_imz_shexs' ) {
                $('.sened-sahibi-asa-container .bashliq h6').text('Soyadı, adı, ata adı')
                designMuracietEdenShexs('sened-sahibi-asa-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'vezifesi-container', 'voen-container', false);
                $('.sened-sahibi-asa-container').show();
            } else if (ishtirakchiNovu == 'senedin_mexsus_oldugu_shexs') {
                designMuracietEdenShexs('sened-sahibi-asa-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'vezifesi-container', 'voen-container', false);
            } else if (ishtirakchiNovu == 'selahiyyetli_shexs' && ishtirakchi==2) {
                designMuracietEdenShexs('voen-container', 'vezifesi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'etibanamenin-nomresi-container');
            }  else if (ishtirakchiNovu == 'selahiyyetli_shexs' && ishtirakchi==3) {

                $('.dovlet-qurumunun-adi').show();
                $('.etibarnamenin-nomresi-3').hide();
                designMuracietEdenShexs('vezifesi-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'voen-container',false);
                $('.vezifesi-container').show();
            } else if (ishtirakchiNovu == 'etibarname_esasinda') {
                $('.etibanamenin-nomresi-container .poa-number-title').text('Etibarnamənin nömrəsi')
                $('.mektubun-nomresi-3').hide();
                $('.etibarnamenin-nomresi-3').show();
                designMuracietEdenShexs('voen-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'vezifesi-container');
            } else if (ishtirakchiNovu == 'mektub_esasinda'  && ishtirakchi==2) {
                $('.mektubun-nomresi-3').show();
                $('.etibarnamenin-nomresi-3').hide();
                designMuracietEdenShexs('voen-container', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'vezifesi-container');
            }else if (ishtirakchiNovu == 'mektub_esasinda'  && ishtirakchi==3) {
                $('.mektubun-nomresi-3').show();
                $('.etibarnamenin-nomresi-3').hide();
                designMuracietEdenShexs('dovlet-qurumunun-adi', 'etibanamenin-nomresi-container', 'qohumluq-derecesi-container', 'sened-sahibi-asa-container', 'vezifesi-container');
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

        if ('{{$documentId}}' != 'new'){
            if ({{($apostilDocumentInfo->status ?? '5')}} != 0){
                $('.remove-user').hide()
            }
        }
    </script>
@endsection

