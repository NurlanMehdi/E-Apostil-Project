@extends('layouts.master')
@section('title','Yeni Apostil')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row setting-page-buttons">
                <button class="users-page active">İstifadəçilər</button>
                @if(Auth::user()->key == 'superadmin')
                    <button class="imzalayan-shexsler">İmzalayan şəxslər</button>
                @endif
            </div>
        </div>
    </div>
    <div  class="row setting-add-user">
        <div class="col-md-12">
            @if(Auth::user()->key == 'superadmin')
                <button type="button" class="add-new-user-button"><a style="color: white;" href="{{route('add.new.apo.user.page','new')}}"><img src="{{asset('files/icons/whitePlus.png')}}">&nbsp&nbsp{{strtoupper(__('language.addNewUser'))}}</a></button>
            @endif
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table created-users">
                    <thead>
                    <tr>
                        <th scope="col" class="selected-th"><p>A.S.A</p></th>
                        <th scope="col" class="selected-th"><p>{{__('language.login')}}</p></th>
                        <th scope="col" class="selected-th"><p>{{__('language.vezife')}}</p></th>
                        <th scope="col" class="selected-th"><p></p>&nbsp</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if(Auth::user()->key != 'superadmin')
                            @if(Auth::user()->id == $user->id)
                                <tr id="{{$user->id}}">
                                    <td scope="col" class="selected-th"><p>{{$user->name .' '. $user->lastname  .' '. $user->fathername }}</p></td>
                                    <td scope="col" class="selected-th"><p>{{$user->username}}</p></td>
                                    <td scope="col" class="selected-th"><p>{{$user->position}}</p></td>
                                    <td >
                                        <button type='button' style="background-color: var(--color-f3f3f3);" class='edit-user'><img style='width: 10px;' src='{{asset('files/icons/edit.png')}}'></button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr id="{{$user->id}}">
                                <td scope="col" class="selected-th"><p>{{$user->name .' '. $user->lastname  .' '. $user->fathername }}</p></td>
                                <td scope="col" class="selected-th"><p>{{$user->username}}</p></td>
                                <td scope="col" class="selected-th"><p>{{$user->position}}</p></td>
                                <td >
                                    <button type='button' style="background-color: var(--color-f3f3f3);" class='edit-user'><img style='width: 10px;' src='{{asset('files/icons/edit.png')}}'></button>
                                    <button type='button' style="background-color: var(--color-f3f3f3);" class='remove-user' data-target='#thisDocumentDeleteUserModal'>
                                        <img style='width: 10px;' src='{{asset('files/icons/x.png')}}'></button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="thisDocumentDeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="thisDocumentDeleteUserModalLabel" aria-hidden="true">
            <div class="modal-dialog delete-all-selected-document" role="document">
                <div class="modal-content delete-modal-user">
                    <div class="modal-header">

                        <button type="button" class="close-delete-modal" data-dismiss="modal" aria-label="Close">
                            <img src="{{asset('files/icons/x.png')}}">
                        </button>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Seçili User-i silmək istəyirsinizmi?</h5>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary delete-one-user">{{__('language.accepted')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none" class="row setting-add-imzalayan-shexs">
        <div class="modal fade" id="thisDocumentDeleteSigningUserModal" tabindex="-1" role="dialog" aria-labelledby="thisDocumentDeleteSigningUserModalLabel" aria-hidden="true">
            <div class="modal-dialog delete-all-selected-document" role="document">
                <div class="modal-content delete-modal-user">
                    <div class="modal-header">

                        <button type="button" class="close-delete-modal" data-dismiss="modal" aria-label="Close">
                            <img src="{{asset('files/icons/x.png')}}">
                        </button>
                    </div>
                    <h5 style="    text-align: center;" class="modal-title" id="exampleModalLabel">İmzalayan şəxsi silmək istəyirsinizmi?</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary remove-signing-user">{{__('language.accepted')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="apostil-form col-md-12" style=" height: 80vh;">
            <form autocomplete="off" id="createSigningUser" method="post" action="{{route('signing.user.submit')}}">
                {{csrf_field()}}
                <input type="hidden" name="apostil_user_id">
                <div class="new-apostil-create">
                    <div class="apostil-haqqinda-melumat">
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 16px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">İmzalayan şəxslər</h6>
                                        <select name="signing-user" id="signingUser">
                                            @foreach($signingUsers as $signingUser)
                                                <option id="{{$signingUser['id']}}" value="">{{$signingUser['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">Ad Soyad</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="name" placeholder="Ad Soyad" type="text" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="col" style="height:50px;margin-top: 30px;">
                                <button type="button" class="delete-signing-user">Sil</button>
                            </div>
                            <div class="col" style="height:50px;margin-top: 30px;">
                                <button type="button" class="save-new-signing-user">{{strtoupper(__('language.add'))}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('javascript')
<script>
    $(document).on('click', '.remove-user', function () {
        let userId = $(this).closest('tr').attr('id');
        var name = $(this).closest('tr').find('td:eq(0)').text()
        var login = $(this).closest('tr').find('td:eq(1)').text()
        var password = $(this).closest('tr').find('td:eq(2)').text()
        var apostilUser = "<tr class="+userId+"><td><h6>" + name + "</h6></td><td><h6>" + login + "</h6></td><td><h6>" + password + "</h6></td></tr>";
        $('#thisDocumentDeleteUserModal .modal-body tbody').html(apostilUser);
        $('#thisDocumentDeleteUserModal').modal('show');
    })

    $(document).on('click', '.delete-signing-user', function () {
        $('#thisDocumentDeleteSigningUserModal').modal('show');
    })

    $('.remove-signing-user').on('click', function () {
        let docId = $('#signingUser option:selected').attr('id');
        let url = "{{route('remove.signing.user',':id')}}";
        url = url.replace(':id', docId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                $('#thisDocumentDeleteSigningUserModal').modal('hide');
                $('#signingUser #'+docId).remove();
            }
        })
    })

    $(document).on('click', '.edit-user', function () {
        let id = $(this).closest('tr').attr('id');
        let url = "{{route('add.new.apo.user.page',':id')}}";

        url = url.replace(':id', id);
        window.open(url, '_blank');
    })

    $(document).on('click', '.delete-one-user', function () {
        var data = {};
        let docId = $('.delete-modal-user').find('tr').attr('class');
        data[docId] = parseInt(docId);
        let url = "{{route('remove.user',':id')}}";
        data = JSON.stringify(data);
        url = url.replace(':id', data);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                $('#thisDocumentDeleteUserModal').modal('hide');
                $('tr#'+docId).remove();
            }
        })
    })

    $('.save-new-signing-user').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#createSigningUser').get(0).submit();
        let form = $('#createSigningUser');
        let url = form.attr('action');
    });

    $('.setting-page-buttons button').on('click',function (){
       $('.setting-page-buttons button').removeClass('active')
       $(this).addClass('active')
        if ($(this).hasClass('users-page')){
            $('.setting-add-imzalayan-shexs').hide()
            $('.setting-add-user').show()
        }else{
            $('.setting-add-imzalayan-shexs').show()
            $('.setting-add-user').hide()
        }
    });
</script>
@endsection