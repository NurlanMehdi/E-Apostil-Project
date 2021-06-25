@extends('layouts.master')
@section('title','Apostil Reyestr')
@section('content')
    <div class="row search-bar">
        <div class="col-md-12 buttons">
            <div class="row input-group mb-3">
                <div class="col">
                    <h6>{{__('language.ilkTarix')}}</h6>
                    <input style="height: 50%;"  placeholder="DD.MM.YYYY" name="doc_first_presented_date" type="text" name="doc_first_presented_date" class="form-control first-apostil-date">
                </div>
                <div class="col">
                    <h6>{{__('language.sonTarix')}}<button style="margin-top: -1px;display:none;float: right;" type="button" class="remove-date-filter"><img src="{{asset('files/icons/x.png')}}"></button></h6>
                    <input style="height: 50%;" placeholder="DD.MM.YYYY" name="doc_last_presented_date" type="text" name="doc_last_presented_date" class="form-control last-apostil-date">
                </div>
                <div class="col">
                    <h6>{{__('language.apostilin_nomresi')}}</h6>
                    <input class="form-control apostil-number" placeholder="{{__('language.apostilin_nomresi')}}" name="apostil_number" type="text">
                </div>
                <div class="col"><h6>{{__('language.status')}}</h6>
                    <select class="form-control status" name="status">
                        <option selected>-</option>
                        <option value="0">{{__('language.statusTesdiqOlunmayib')}}</option>
                        <option value="1">{{__('language.statusTesdiqOlunub')}}</option>
                        <option value="2">{{__('language.statusLegvOlunub')}}</option>
                    </select>
                </div>
                <div class="col"><h6>{{__('language.qisaMezmun')}}</h6> <input class="short_note form-control" name="qisa_mezmunu" placeholder="{{__('language.qisaMezmun')}}" type="text"></div>
                <div class="col">
                    <div class="row btn-header-container">
                        <div class="col-md-6 btn-header">
                            <button class="search-document" type="button">Axtar</button>
                        </div>
                        <div class="col-md-6 btn-header">
                            <button style="padding: 2px 2px;" class="filter" type="button">Filtr</button>
                        </div>
                        <div class="col-md-6 btn-header">
                            <button style="padding: 2px 2px;" type="button" class="delete-all-document" data-target="#deleteModal">Sil</button>
                        </div>
                        <div class="col-md-6 btn-header">
                            <button style="padding: 2px 2px;" type="button" class="dashboard-new">Yeni</button>
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
        <div class="modal fade" id="thisDocumentDeleteModal" tabindex="-1" role="dialog" aria-labelledby="thisDocumentDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog delete-all-selected-document" role="document">
                <div class="modal-content delete-modal-document">
                    <div class="modal-header">

                        <button type="button" class="close-delete-modal" data-dismiss="modal" aria-label="Close">
                            <img src="{{asset('files/icons/x.png')}}">
                        </button>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Seçili Apostili silmək istəyirsinizmi?</h5>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary delete-one-document">{{__('language.accepted')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 other-filter active">
            <div class="row">
                <div class="col-md-3">
                    <h6>{{__('language.imzalayanShexs')}}</h6>
                    <select class="apostil-imzalayan-shexs" name="apostil_signing_user_id">
                        <option selected>-</option>
                        @foreach($imzalayanShexs as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <h6>{{__('language.cinsi')}}</h6>
                    <select name="gender" class="gender" value="-">
                        <option selected>-</option>
                        <option value="1">Kişi</option>
                        <option value="2">Qadın</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <h6>{{__('language.vetendashligi')}}</h6>
                    <select name="doc_presented_native_id" class="vetendashligi" value="-">
                        <option selected>-</option>
                        <option value="1">Azərbaycan vətəndaşı</option>
                        <option value="2">Əcnəbi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <h6>{{__('language.apostil_created')}}</h6>
                    <input name="apostil_created"  class="apostil_created" placeholder="{{__('language.apostil_created')}}" type="text">
                </div>

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
                    <input name="voen" class="voen" placeholder="{{__('language.metnDaxilEdin')}}" type="number">
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
            <div class="row refresh-filter-container">
                <button class="refresh-filter" type="button">Yenilə</button>
            </div>
        </div>
    </div>
    <div class="row sort">
        <label>Səhifədə</label>
        <select class="form-control sort-apostil" name="sort-apostil">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
        </select>
        <label>yazı</label>
    </div>
    <div class="table-responsive" style="height: 61vh">
        <table class="table apostil-documents">
            <thead>
            <tr>
                <th scope="col" class="selected-all-th"><input type="checkbox" class="slected-all" name="selected-all"></th>
                <th scope="col" class="selected-th">
                    <p style="cursor: pointer;" class="order-date"><img style="margin-top: -2px;" src="{{asset('files/icons/filterOrder.png')}}">&nbsp{{__('language.tarix')}}</p>
                </th>
                <th scope="col" class="selected-th"><p>{{__('language.apostilin_nomresi')}}</p></th>
                <th scope="col" class="selected-th">
                    <p style="cursor: pointer;" class="order-status"><img style="margin-top: -2px;" src="{{asset('files/icons/filterOrder.png')}}">&nbsp{{__('language.status')}}</p>
                </th>
                <th scope="col" class="selected-th"><p>{{__('language.qisaMezmun')}}</p></th>
                <th scope="col" class="selected-th"><p>{{__('language.FizikiVeyaHuquqiShexsinAdi')}}</p></th>
                <th scope="col" class="selected-th"><p>{{__('language.senediTeqdimEdenShexs')}}</p></th>
                <th scope="col" class="selected-th"><p>{{__('language.apostil_created')}}</p></th>
                <th scope="col" class="selected-th"><p>{{__('language.emeliyyat')}}</p></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="row pages">
        <div class="col-md-6">
            <div class="page-bottom document-count">

            </div>
        </div>
        <div class="col-md-6" style="margin-left: 75%;">
            <div class="page-bottom">
                <div class="page-button-item"><button style="margin-right: 13px;" class="prev-page page-buttons">GERIYƏ</button></div>
                <div class="page-button-item"><button class="page-row apostil-current-page" data-total-page="1" data-current-page="1">1</button></div>
                <div class="page-button-item"><button class="next-page page-buttons">NÖVBƏTİ</button></div>
            </div>

        </div>

    </div>
    </div>
@stop
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.first-apostil-date').on('change',function (){
                if($(this).val() != ''){
                    $('.remove-date-filter').show()
                }
            })

            $('.last-apostil-date').on('change',function (){
                if($(this).val() != ''){
                    $('.remove-date-filter').show()
                }
            })

            $('.remove-date-filter').on('click',function (){
                $(this).hide()
            })

            $('.refresh-filter').on('click',function (){
                $('.search-bar input').val('');
                $('select').val("-").change();
                $('.search-document').trigger('click');
                $('.document-count').hide();
            })

            $('.remove-date-filter').on('click',function (){
                $('.first-apostil-date').val('')
                $('.last-apostil-date').val('')
            })
            var orderBy = '';

            $('.order-date').on('click',function(){
                if(orderBy == 'DESC'){
                    orderBy = 'ASC';
                }else{
                    orderBy = 'DESC';
                }

                var data = {
                    'key':'order-date',
                    'orderBy':orderBy,
                };

                data = JSON.stringify(data);
                loadApostilDocuments(data);
            })

            $('.order-status').on('click',function(){
                if(orderBy == 'DESC'){
                    orderBy = 'ASC';
                }else{
                    orderBy = 'DESC';
                }

                var data = {
                    'key':'status',
                    'orderBy':orderBy,
                };

                data = JSON.stringify(data);
                loadApostilDocuments(data);
            })

            $('.filter').on('click', function () {
                $('.other-filter').toggle()

                if($('.filter').hasClass('active')){
                    $('.table-responsive').css('height','61vh')
                    $('.filter').removeClass('active');
                }else{
                    $('.table-responsive').css('height','32vh')
                    $('.filter').addClass('active');
                }
            })

            $('.dashboard-new').on('click', function () {
                window.location.href  = '{{route('add.apostil',"new")}}';
            })

            $('.search-document').on('click', function () {
                var sortDocument = $('.sort-apostil').val();
                sortApostilDocuments(1,sortDocument)
            })

            $('.sort-apostil').change(function (){
                var sortDocument = $(this).val();
                sortApostilDocuments(1,sortDocument)
            })

            function sortApostilDocuments(page=1,sort=10){
                $('.document-count').show()
                var apostilNumber = $('.apostil-number').val();
                var status = $('.status').val();
                var firstApostilDate = $('.first-apostil-date').val();
                var lastApostilDate = $('.last-apostil-date').val();
                var shortNote = $('.short_note').val();
                var imzalayanShexs = $('.apostil-imzalayan-shexs').val();
                var vetendashligi = $('.vetendashligi').val();
                var legalUserName = $('.legal_user_name').val();
                var apostilCreated = $('.apostil_created').val();
                var docOwnerName = $('.doc_owner_name').val();
                var docOwnerLastname = $('.doc_owner_lastname').val();
                var docOwnerFathername = $('.doc_owner_fathername').val();
                var voen = $('.voen').val();
                var presentedByOwnerName = $('.presented_by_owner_name').val();
                var presentedByOwnerLastname = $('.presented_by_owner_lastname').val();
                var presentedByOwnerFathername = $('.presented_by_owner_fathername').val();
                var gender = $('.gender').val();

                var data = {
                    'apostilNumber': apostilNumber,
                    'search': true,
                    'status': status,
                    'firstApostilDate': firstApostilDate,
                    'lastApostilDate': lastApostilDate,
                    'shortNote': shortNote,
                    'imzalayanShexs': imzalayanShexs,
                    'vetendashligi': vetendashligi,
                    'legalUserName': legalUserName,
                    'apostilCreated': apostilCreated,
                    'docOwnerName': docOwnerName,
                    'docOwnerFathername': docOwnerFathername,
                    'docOwnerLastname': docOwnerLastname,
                    'voen': voen,
                    'presentedByOwnerName': presentedByOwnerName,
                    'presentedByOwnerLastname': presentedByOwnerLastname,
                    'gender': gender,
                    'presentedByOwnerFathername': presentedByOwnerFathername,
                    'page': page,
                    'sort': sort,
                };

                data = JSON.stringify(data);
                loadApostilDocuments(data)
            }
            $('.slected-all').click(function () {
                if (this.checked == true) {
                    $('.selected-doc:enabled').prop('checked', true)
                    $('.delete-all-document').attr('data-toggle', 'modal')
                    $('.apostil-documents tbody').css('background-color', '#ffffff')
                    $('.apostil-documents button').css('background-color', '#ffffff')
                } else {
                    $('.selected-doc:enabled').prop('checked', false)
                    $('.delete-all-document').attr('data-toggle', '')
                    $('.apostil-documents tbody').css('background-color', '#f3f3f3')
                    $('.apostil-documents button').css('background-color', '#f3f3f3')
                }
            });

            $('.next-page').on('click',function (){
                let total_page = $('.apostil-current-page').attr('data-total-page');
                let current_page = $('.apostil-current-page').attr('data-current-page');
                let sortDocument = $('.sort-apostil').val();

                if(parseInt(current_page)+1 <= total_page){
                    sortApostilDocuments(parseInt(current_page)+1,sortDocument)
                }
            })

            $('.prev-page').on('click',function (){
                let total_page = $('.apostil-current-page').attr('data-total-page');
                let current_page = $('.apostil-current-page').attr('data-current-page');
                let sortDocument = $('.sort-apostil').val();

                if(parseInt(current_page) - 1 > 0){
                    sortApostilDocuments(parseInt(current_page)-1,sortDocument)
                }
            })

            $(document).on('click', '.selected-doc', function () {
                $('.delete-all-document').attr('data-toggle', 'modal')
            });

            var sortDocument = $('.sort-apostil').val();
            sortApostilDocuments(1,sortDocument)
            $('.document-count').hide()

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

                var countDoc = 0;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        var status = '';
                        $('.apostil-current-page').text(response.data.current_page);
                        $('.apostil-current-page').attr('data-total-page',response.data.last_page)
                        $('.apostil-current-page').attr('data-current-page',response.data.current_page)
                        let apostilDocuments = '';
                        jQuery.map(response.data.data, function (a) {
                            countDoc = countDoc + 1;

                            if (a.status == 1) {
                                status = '{{__('language.statusTesdiqOlunub')}}';
                            } else if (a.status == 0) {
                                status = '{{__('language.statusTesdiqOlunmayib')}}';
                            } else {
                                status = '{{__('language.statusLegvOlunub')}}';
                            }
                            var dateAr = a.apostil_date.split('-');
                            var newDate = dateAr[2] + '.' + dateAr[1] + '.' + dateAr[0];

                            if (a.rs_short_note == null){
                                a.rs_short_note = '';

                            }if (a.apostil_created == null){
                                a.apostil_created = '';
                            }
                            var shexsinAdi = '';
                            var senediTeqdimEdenShexs = '';
                            if (a.legal_user_name != null){
                                shexsinAdi = a.legal_user_name
                            }else if(a.doc_owner_name != null){
                                shexsinAdi = a.doc_owner_name + ' ' + a.doc_owner_lastname +' '+ a.doc_owner_fathername;
                            }else if(a.name_of_state_body != null){
                                shexsinAdi = a.name_of_state_body;
                            }else if(a.doc_presented_name != null){
                                shexsinAdi = a.doc_presented_name + ' ' + a.doc_presented_lastname +' '+ a.doc_presented_fathername;
                            }else{
                                shexsinAdi = ''
                            }

                            if(a.doc_presented_name != null){
                                senediTeqdimEdenShexs = a.doc_presented_name + ' ' + a.doc_presented_lastname +' '+ a.doc_presented_fathername;
                            }

                            if (key == 'delete-modal') {
                                apostilDocuments += "<tr id='" + a.id + "'><td><h6>" + newDate + "</h6></td><td><h6>" + a.apostil_number + "</h6></td><td><h6>" + status + "</h6></td><td><h6 style='max-width: 130px;word-wrap: break-word;'>" + a.rs_short_note + "</h6></td>><td><h6>" + shexsinAdi + "</h6></td><td><h6>" + senediTeqdimEdenShexs + "</h6></td></tr>";
                            } else {
                                apostilDocuments += "<tr id='" + a.id + "'><td style='padding: 5px 0px 0px 11px;'><input " + (a.status == 0 ? '' : 'disabled')  + " class='selected-doc' type='checkbox'></td><td style='padding: 9px 0px 0px 21px;'><h6>" + newDate + "</h6></td><td style='padding: 9px 0px 0px 21px;'><h6>" + a.apostil_number + "</h6></td><td style='padding: 9px 0px 0px 21px;'><h6>" + status + "</h6></td><td style='padding: 9px 0px 0px 21px;'><h6 style='max-width: 250px;word-wrap: break-word;'>" + a.rs_short_note + "</h6></td><td style='padding: 9px 0px 0px 21px;'><h6>" + shexsinAdi + "</h6></td><td style='padding: 9px 0px 0px 21px;'><h6>" +  senediTeqdimEdenShexs+ "</h6></td><td style='padding: 9px 0px 0px 21px;'><h6>" + a.apostil_created + "</h6></td><td style='padding: 3px 0px 0px 21px;'><button type='button' class='edit-doc'><img style='width: 14px;' src='{{asset('files/icons/edit.png')}}'></button><button type='button' " + ((a.status == 0) ? '' : 'disabled')  + " class='remove-doc' data-target='#thisDocumentDeleteModal'><img style='width: 14px;' src='{{asset('files/icons/x.png')}}'></button></td></tr>";
                            }
                        })
                        if (key == 'delete-modal') {

                            $('#deleteModal .modal-body tbody').html(apostilDocuments);
                        } else {
                            $('.apostil-documents tbody').html(apostilDocuments);
                        }

                        if (countDoc  > 0){
                            $('.document-count').html("<h5 style='font-weight: bold;'>" + countDoc + " Nəticə Tapıldı</h5>")
                        }else{
                            $('.document-count').html("<h5 style='font-weight: bold;'> Nəticə Tapılmadı</h5>")
                        }


                        var showDocumentCount = $('.sort-apostil').val()
                        $(".apostil-documents tbody tr:gt(" + (showDocumentCount - 1) + ")").hide()
                    }
                })
            }

            $(document).on('click', '.remove-doc', function () {
                let docId = $(this).closest('tr').attr('id');
                var tarix = $(this).closest('tr').find('td:eq(1)').text()
                var nomre = $(this).closest('tr').find('td:eq(2)').text()
                var status = $(this).closest('tr').find('td:eq(3)').text()
                var qisaezmun = $(this).closest('tr').find('td:eq(4)').text()
                var apostilDocument = "<tr class="+docId+"><td><h6>" + tarix + "</h6></td><td><h6>" + nomre + "</h6></td><td><h6>" + status + "</h6></td><td><h6>" + qisaezmun + "</h6></td></tr>";
                $('#thisDocumentDeleteModal .modal-body tbody').html(apostilDocument);
                $('#thisDocumentDeleteModal').modal('show');
            })

            $(document).on('click', '.delete-one-document', function () {
                var data = {};
                let docId = $('.delete-modal-document').find('tr').attr('class');
                data[docId] = parseInt(docId);
                let url = "{{route('apostil.remove.document',':id')}}";
                data = JSON.stringify(data);
                url = url.replace(':id', data);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        $('#thisDocumentDeleteModal').modal('hide');
                        $('tr#'+docId).remove();
                    }
                })
            })

            $(document).on('dblclick','.apostil-documents tbody tr',function(){

                let id = $(this).attr('id');
                let url = "{{route('add.apostil',':id')}}";

                url = url.replace(':id', id);
                window.open(url, '_blank');
            });

            $(document).on('click', '.edit-doc', function () {
                let id = $(this).closest('tr').attr('id');
                let url = "{{route('add.apostil',':id')}}";

                url = url.replace(':id', id);
                window.open(url, '_blank');
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
