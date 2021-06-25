@extends('layouts.user.master')
@section('title','Apostil Reyestr')
@section('content')

    <div class="container-fluid">
        <div  class="row">
            <div class="col-md-12 user-apostil-search">
                <div class="header row">
                    <div style="    max-width: 44.5%;" class="emblem col">
                        <img src="{{asset('files/Emblem.png')}}">
                    </div>
                    <div style="max-width: 51.5%;" class="emblem-text col">
                        <h6>{{__('language.azResp')}}<br/>{{__('language.MinistryOfJustice')}}</h6>
                    </div>
                </div>
                <div class="body row">
                    <div class="col-md-12">
                        {{--                        (e-Registry of apostilles)--}}
                        <h2>{{__('language.e-apostil-reyestr')}}</h2>
                    </div>

                    <div style="display: none" class="col-md-12 error-modal">
                        <h5>{{__('language.no-info')}}</h5>
                    </div>
                </div>

                <div class="search-apostil-number row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12"><h5>{{__('language.apostil_number')}}</h5></div>
                            <div class="col-md-12"><input value="{{$apostil->apostil_number ?? ''}}" name="apostil_number" placeholder="{{__('language.apostil_number')}}" type="text"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12"><h5>{{__('language.date')}}</h5></div>
                            <div class="col-md-12"><input name="apostil_date" readonly='true'  class="datepicker-apostil tarixi apostil_date" value="{{date('d-m-Y')}}" type="text"></div>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-1 search-document-status">
                        <button class="search" type="button"><img src="{{asset('files/search.png')}}"></button>
                        </br>
                        <label>{{__('language.search')}}</label>
                    </div>

                    <div style="    padding: 12px 0px 0px 12px;" class="col-md-1 search-document-status">
                        <div class="row">
                            <div class="section_header_navbar_item dropdown">
                                <a href="{{route('changeLang','az')}}" style="{{(app()->getLocale() === 'az') ? 'color:var(--color-15306b);' : ''}}"  class="dropdown-item-lang dropdown-menu-lan">
                                    AZ&nbsp
                                </a>

                                <a href="{{route('changeLang','en')}}" style="{{(app()->getLocale() === 'en') ? 'color:var(--color-15306b);' : ''}}" class="dropdown-item-lang dropdown-menu-lan">
                                    ENG&nbsp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style='display:none' class="accepted-apostil-doc row">
                    <div class="space">{{__('language.apostille')}}</div>
                    <div class="space-white signedBy">{{__('language.signedBy')}} : <label></label></div>
                    <div class="space-white">{{__('language.issued')}} : {{__('language.MinistryOfJustice')}}</div>
                    <div class="space">{{__('language.officialDoc')}}</div>
                    <div class="space-white">{{__('language.docType')}} :  {{__('language.theOriginalDoc')}}</div>
                    <div class="space-white signing-user">{{__('language.hasBeenSignedBy')}} : <label></label></div>
                    <div class="space-white mohur">{{__('language.stamp')}} : <label></label></div>
                    <div class="space">{{__('language.docInfo')}}</div>
                    <div class="space-white document-name">{{__('language.docName')}} :  <label></label></div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')

    <script>


        $('.apostil_date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            pickTime: false,
            minView: 2,
            language:"az",
            weekStart: 1
        });


        $('.search').on('click',function() {
            var apostilNumber = $('input[name="apostil_number"]').val();
            var apostilDate = $('input[name="apostil_date"]').val();

            var data = {
                'apostilNumber': apostilNumber,
                'apostilDate': apostilDate,
            };

            data = JSON.stringify(data);
            getStatus(data)

        })


        function getStatus(data){

            let url = "{{route('user.data.apostil.documents',':data')}}";

            url = url.replace(':data', data);




            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'GET',
                // data: {},
                dataType: "JSON",
                success: function (response) {
                    if(response.apostil != null){

                        $('.accepted-apostil-doc').show()
                        $('.error-modal').hide()
                        $('.signedBy label').html(response.apostil.imzalayan_shexs)
                        if ('<?= app()->getLocale() ?>' == 'az'){
                            $('.document-name label').html(response.apostil.rs_document_name);
                            $('.mohur label').html(response.apostil.rs_service);
                            $('.signing-user label').html(response.apostil.rs_signing_user)
                        }else{
                            $('.document-name label').html(response.apostil.rs_document_name_en);
                            $('.mohur label').html(response.apostil.rs_service_en);
                            $('.signing-user label').html(response.apostil.rs_signing_user_en)
                        }
                    }else{
                        $('.error-modal').show()
                        $('.accepted-apostil-doc').hide()
                    }
                }
            })

        }
    </script>

@endsection






















