@extends('layouts.master')
@section('title','Apostil Reyestr')
@section('content')
    <div class="row search-bar">
        <div class="col-md-4 buttons">
            <div class="row">
                <div class="col-md-6">
                    <h6>{{__('language.tarix')}}</h6>
                    <input readonly='true' name="doc_presented_date" type="text" name="doc_presented_date" class="form-control datepicker-apostil apostil-date"
                           value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-6">
                    <h6>{{__('language.apostilin_nomresi')}}</h6>
                    <input class="apostil-number" placeholder="{{__('language.apostilin_nomresi')}}" name="apostil_number" type="number">
                </div>

            </div>
        </div>
        <div class="col-md-8 buttons-and-icons">
            <div class="row">
                <div class="col-md-4"><h6>{{__('language.status')}}</h6>
                    <select class="status" name="status">
                        <option hidden selected></option>
                        <option value="0">{{__('language.statusTesdiqOlunmayib')}}</option>
                        <option value="1">{{__('language.statusTesdiqOlunub')}}</option>
                    </select>
                </div>
                <div class="col-md-4"><h6>{{__('language.qisaMezmunu')}}</h6> <input class="short_note" name="qisa_mezmunu" placeholder="{{__('language.qisaMezmunu')}}" type="text"></div>
                <div class="col-md-4">
                    <div class="row btn-header-container">
                        <div class="col-md-3 btn-header">
                            <button class="search-document" type="button"><img src="{{asset('files/icons/search.png')}}"></button>
                            </br>
                            <h6>Axtar</h6>
                        </div>
                        <div class="col-md-3 btn-header">
                            <button class="filter" type="button"><img src="{{asset('files/icons/filtr.png')}}"></button>

                            </br>
                            <h6>Filtr</h6>
                        </div>
                        <div class="col-md-3 btn-header">
                            <button type="button" class="delete-all-document" data-target="#deleteModal">
                                <img src="{{asset('files/icons/delete.png')}}">
                            </button>
                            </br>
                            <h6>Sil</h6>
                        </div>
                        <div class="col-md-3 btn-header">
                            <a href="{{route('add.apostil',0)}}"><img src="{{asset('files/icons/plus.png')}}"></a>
                            </br>
                            <h6>Yeni</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog delete-all-selected-document" role="document">
                <div class="modal-content delete-modal-document">
                    <div class="modal-header">

                        <button type="button" class="close-delete-modal" data-dismiss="modal" aria-label="Close">
                            <img src="{{asset('files/icons/x.png')}}">
                        </button>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Seçili Apostilləri silmək istəyirsinizmi?</h5>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary accept">{{__('language.accepted')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 other-filter active">
            <div class="row">
                <div class="col-md-4">
                    <h6>{{__('language.imzalayanShexs')}}</h6>
                    <select class="apostil-imzalayan-shexs" name="apostil_signing_user_id">
                        <option selected hidden>-</option>
                        @foreach($imzalayanShexs as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <h6>{{__('language.vetendashligi')}}</h6>
                    <select name="doc_presented_native_id" class="vetendashligi" value="-">
                        <option selected hidden>-</option>
                        <option value="1">Azərbaycan vətəndaşı</option>
                        <option value="2">Əcnəbi</option>
                    </select>
                </div>
                <div class="col-md-4"></div>

            </div>
            <div class="row" style="margin-top: 2%;">
                <div class="col-md-3">
                    <h6>{{__('language.huquqiShexsinAdi')}}</h6>
                    <input name="legal_user_name"  class="legal_user_name" placeholder="{{__('language.huquqiShexsinAdi')}}" type="text">
                </div>
                <div class="col-md-3">
                    <h6>{{__('language.senedinMexsusOlduguShexs')}}</h6>
                    <input name="doc_owner_lastname" class="doc_owner_lastname" type="text" placeholder="{{__('language.soyad')}}">
                </div>
                <div class="col-md-3">
                    <h6>&nbsp</h6>
                    <input type="text" name="doc_owner_name" class="doc_owner_name" placeholder="{{__('language.ad')}}">
                </div>
                <div class="col-md-3">
                    <h6>&nbsp</h6>
                    <input type="text" name="doc_owner_fathername"  class="doc_owner_fathername" placeholder="{{__('language.ataAdi')}}">
                </div>

            </div>
            <div class="row" style="margin-top: 2%;    margin-bottom: 2%;">
                <div class="col-md-3">
                    <h6>V.Ö.E.N</h6>
                    <input name="voen" class="voen" placeholder="{{__('language.metnDaxilEdin')}}" type="text">
                </div>
                <div class="col-md-3">
                    <h6>{{__('language.senediTeqdimEdenShexs')}}</h6>
                    <input name="presented_by_owner_lastname" class="presented_by_owner_lastname" type="text" placeholder="{{__('language.soyad')}}">
                </div>
                <div class="col-md-3">
                    <h6>&nbsp</h6>
                    <input type="text" name="presented_by_owner_name" class="presented_by_owner_name" placeholder="{{__('language.ad')}}">
                </div>
                <div class="col-md-3">
                    <h6>&nbsp</h6>
                    <input type="text" name="presented_by_owner_fathername" class="presented_by_owner_fathername" placeholder="{{__('language.ataAdi')}}">
                </div>

            </div>
        </div>
    </div>

    <table class="table apostil-documents">
        <thead>
        <tr>
            <th></th>
            <th scope="col" class="selected-all-th"><input type="checkbox" class="slected-all" name="selected-all"></th>
            <th scope="col"><h5>{{__('language.tarix')}}</h5></th>
            <th scope="col"><h5>{{__('language.apostilin_nomresi')}}</h5></th>
            <th scope="col"><h5>{{__('language.status')}}</h5></th>
            <th scope="col"><h5>{{__('language.qisaMezmunu')}}</h5></th>
            <th scope="col">&nbsp</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@stop
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.apostil-date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                pickTime: false,
                minView: 2
            });

            $('.filter').on('click', function () {
                $('.other-filter').toggle()
            })


            $('.search-document').on('click', function () {
                var apostilNumber = $('.apostil-number').val();
                var status = $('.status').val();
                var apostilDate = $('.apostil-date').val();
                var shortNote = $('.short_note').val();
                var imzalayanShexs = $('.apostil-imzalayan-shexs').val();
                var vetendashligi = $('.vetendashligi').val();
                var legalUserName = $('.legal_user_name').val();
                var docOwnerName = $('.doc_owner_name').val();
                var docOwnerLastname = $('.doc_owner_lastname').val();
                var docOwnerFathername = $('.doc_owner_fathername').val();
                var voen = $('.voen').val();
                var presentedByOwnerName = $('.presented_by_owner_name').val();
                var presentedByOwnerLastname = $('.presented_by_owner_lastname').val();
                var presentedByOwnerFathername = $('.presented_by_owner_fathername').val();


                var data = {
                    'apostilNumber': apostilNumber,
                    'search': true,
                    'status': status,
                    'apostilDate': apostilDate,
                    'shortNote': shortNote,
                    'imzalayanShexs': imzalayanShexs,
                    'vetendashligi': vetendashligi,
                    'legalUserName': legalUserName,
                    'docOwnerName': docOwnerName,
                    'docOwnerFathername': docOwnerFathername,
                    'docOwnerLastname': docOwnerLastname,
                    'voen': voen,
                    'presentedByOwnerName': presentedByOwnerName,
                    'presentedByOwnerLastname': presentedByOwnerLastname,
                    'presentedByOwnerFathername': presentedByOwnerFathername
                };


                data = JSON.stringify(data);
                loadApostilDocuments(data)
            })

            $('.slected-all').click(function () {
                if (this.checked == true) {
                    $('.selected-doc').prop('checked', true)
                    $('.delete-all-document').attr('data-toggle', 'modal')
                    $('.apostil-documents tbody').css('background-color', '#ffffff')
                    $('.apostil-documents button').css('background-color', '#ffffff')
                } else {
                    $('.selected-doc').prop('checked', false)
                    $('.delete-all-document').attr('data-toggle', '')
                    $('.apostil-documents tbody').css('background-color', '#f3f3f3')
                    $('.apostil-documents button').css('background-color', '#f3f3f3')
                }
            });

            $(document).on('click', '.selected-doc', function () {
                $('.delete-all-document').attr('data-toggle', 'modal')
            });

            loadApostilDocuments()

            $('.delete-all-document').on('click', function () {
                var data = {};
                $('.selected-doc:checked').each(function () {
                    var id = $(this).parents('tr').attr('id');
                    data[id] = parseInt(id);
                });

                data = JSON.stringify(data);
                loadApostilDocuments(data, 'delete-modal')
            })

            function loadApostilDocuments(data, key) {
                let url = "{{route('data.apostil.documents',':data')}}";

                url = url.replace(':data', data);

                $.ajax({
                    url: url,
                    type: 'GET',
                    // data: {},
                    dataType: 'JSON',
                    success: function (response) {
                        var status = '';

                        let apostilDocuments = '';
                        jQuery.map(response.data, function (a) {
                            if (a.status == 1) {
                                status = '{{__('language.statusTesdiqOlunub')}}';
                            } else {
                                status = '{{__('language.statusTesdiqOlunmayib')}}';
                            }

                            if (key == 'delete-modal') {
                                apostilDocuments += "<tr id='" + a.id + "'><td><h6>" + a.apostil_date + "</h6></td><td><h6>" + a.apostil_number + "</h6></td><td><h6>" + status + "</h6></td><td><h6>" + a.rs_short_note + "</h6></td></tr>"
                            } else {
                                apostilDocuments += "<tr id='" + a.id + "'><td></td><td><input class='selected-doc' type='checkbox'></td><td><h6>" + a.apostil_date + "</h6></td><td><h6>" + a.apostil_number + "</h6></td><td><h6>" + status + "</h6></td><td><h6>" + a.rs_short_note + "</h6></td><td><button type='button' class='edit-doc'><img style='width: 14px;' src='{{asset('files/icons/edit.png')}}'></button><button type='button' class='remove-doc'><img style='width: 14px;' src='{{asset('files/icons/x.png')}}'></button></td></tr>"
                            }
                        })

                        if (key == 'delete-modal') {
                            $('.modal-body tbody').html(apostilDocuments);
                        } else {
                            $('.apostil-documents tbody').html(apostilDocuments);
                        }
                    }
                })
            }

            $(document).on('click', '.remove-doc', function () {
                var data = {};
                let docId = $(this).closest('tr').attr('id');
                data[docId] = parseInt(docId);
                let url = "{{route('apostil.remove.document',':id')}}";
                data = JSON.stringify(data);
                url = url.replace(':id', data);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        $('#' + docId).remove();
                    }
                })
            })

            $(document).on('click', '.edit-doc', function () {
                let id = $(this).closest('tr').attr('id');
                let url = "{{route('add.apostil',':id')}}";

                url = url.replace(':id', id);
                window.location.href=url;
            })

            $(document).on('click', '.accept', function () {
                var data = {};
                $('.delete-all-selected-document tr').each(function () {

                    data[$(this).attr('id')] = parseInt($(this).attr('id'));
                });

                let url = "{{route('apostil.remove.document',':id')}}";
                data = JSON.stringify(data);
                url = url.replace(':id', data);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        $('.close-delete-modal').trigger('click')
                        $('.slected-all').prop('checked', false)
                        $('.selected-doc:checked').parents('tr').remove();
                    }
                })
            })
        })


    </script>
@endsection






















