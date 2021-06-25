@extends('layouts.master')
@section('title','Yeni Apostil')
@section('content')

    <div class="row new-apostil">
        <div class="col-md-12 new-apostil-title">
            <label>
                @if($userId !== "new")
                    {{__('language.userEdit')}}
                @else
                    {{__('language.newUser')}}
                @endif
            </label>
        </div>
        <div class="apostil-form col-md-12" style=" height: 80vh;">
            <form autocomplete="off" id="createUser" method="post"
                  action="{{ ($userId !== "new") ? route('user.edit',$userId) : route('user.submit') }}">
                {{csrf_field()}}
                <input type="hidden" name="apostil_user_id">
                <div class="new-apostil-create">
                    <div class="apostil-haqqinda-melumat">
                        <div class="space">Yeni istifadəçi məlumatları</div>
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 16px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.ad')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="name"  value="{{$userInfo->name ?? request()->input('name', old('name')) }}" placeholder="{{__('language.ad')}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.soyad')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="lastname" class="form-control" value="{{$userInfo->lastname ?? request()->input('lastname', old('lastname')) }}"
                                               placeholder="{{__('language.soyad')}}"  type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 16px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.ataAdi')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="fathername" value="{{$userInfo->fathername ?? request()->input('fathername', old('fathername')) }}" placeholder="{{__('language.ad')}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.phoneNumber')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" name="phoneNumber"  value="{{$userInfo->phoneNumber ?? request()->input('phoneNumber', old('phoneNumber')) }}" class="form-control tel-number"
                                               placeholder="50XXXXXXX" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 16px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.vezife')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="position" placeholder="{{__('language.vezife')}}" value="{{$userInfo->position ?? request()->input('position', old('position')) }}" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.login')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="username" class="form-control"
                                               placeholder="{{__('language.login')}}" value="{{$userInfo->username ?? request()->input('username', old('username'))}}"  type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 16px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="bashliq">{{__('language.password')}}</h6>
                                        <h6 style="position: absolute;color: red;padding: 3px;">*</h6>
                                        <input name="password" placeholder="{{__('language.password')}}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="height:50px;margin-top: 30px;">
                                <button type="button" class="save-new-user">{{strtoupper(__('language.yaddaSaxla'))}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>


@stop
@section('javascript')
<script type="text/javascript">
    $('.save-new-user').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#createUser').get(0).submit();
        let form = $('#createUser');
        let url = form.attr('action');
    });
</script>
@endsection

