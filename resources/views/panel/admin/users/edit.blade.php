@extends('panel.layout.index')
@section('title','Редагувати користувача')
@section('page_styles')
    <style>
        label.head {
            font-weight: bold;
        }
    </style>
@endsection
@section('page_script')
    <!-- Input mask -->
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/styling/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/inputs/inputmask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('framecss/assets/js/page_switchery.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(".phone").inputmask({"mask": "+38(099) 999-99-99"}); //specifying options
            $(".single").inputmask({"mask": "99.99.9999"}); //specifying options
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <form action="{{route('spanel.admin.users.update', $userInfoEdit->UserFirstInformation->user_id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-header">
                        <h4>Редагування данних користувача</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="head">{{__('panel.familia')}}</label>
                                    <input class="form-control" type="text" name="familia"
                                            value="{{ $userInfoEdit->UserFirstInformation->familia }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="head">{{__('panel.imya')}}</label>
                                    <input class="form-control" type="text" name="imya"
                                            value="{{ $userInfoEdit->UserFirstInformation->imya }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="head">{{__('panel.otchestvo')}}</label>
                                    <input class="form-control" type="text" name="otchestvo"
                                            value="{{ $userInfoEdit->UserFirstInformation->otchestvo }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="head">IP-adress реєстрації</label>
                                    <input class="form-control" type="text" name="registration_ip"
                                            value="{{ $userInfoEdit->UserFirstInformation->registration_ip }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="head">{{__('panel.birth')}}</label>
                                    <div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="mi-date-range"></i></span>
										</span>
                                        <input type="text" class="form-control single" name="happy_birth"
                                                value="{{ date('d.m.Y',strtotime($userInfoEdit->UserFirstInformation->happy_birth)) }}"
                                                autocomplete="off" placeholder="00.00.0000">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="head">{{__('panel.mob.phone')}}</label>
                                    <input class="form-control phone" type="text" name="number_mobile"
                                            value="{{ $userInfoEdit->UserFirstInformation->number_mobile }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="head">{{__('panel.email')}}</label>
                                    <input class="form-control" type="email" name="email" value="{{ $userInfoEdit->email }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="head">{{__('panel.pass')}}</label>
                                    <input class="form-control" type="text" name="password" value="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div>
                                            <h6>{{__('panel.viddil')}}</h6>
                                        </div>
                                        @foreach($departament_role as $role)
                                            <div class="form-check form-check-switchery">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="roles_departament[]" value="{{$role->id}}" class="form-check-input-switchery" @if($userInfoEdit->SlugDepart->pluck('id')->contains($role->id)) checked @endif data-fouc>
                                                    {{$role->title_departament}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <h6>{{__('panel.posada')}}</h6>
                                        </div>
                                        @foreach($position_role as $role)
                                            <div class="form-check form-check-switchery">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="roles_position[]" value="{{$role->id}}" class="form-check-input-switchery" @if($userInfoEdit->SlugPosition->pluck('id')->contains($role->id)) checked @endif data-fouc>
                                                    {{$role->title_position}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <h6>{{__('panel.function')}}</h6>
                                        </div>
                                        @foreach($function_role as $role)
                                            <div class="form-check form-check-switchery">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="roles_function[]" value="{{$role->id}}" class="form-check-input-switchery" @if($userInfoEdit->RoleSuccess->pluck('id')->contains($role->id)) checked @endif data-fouc>
                                                    {{$role->title_function}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('spanel.admin.users.index')}}" class="btn btn-sm btn-primary">назад</a>
                        <input type="submit" class="btn btn-sm btn-success float-right" value="{{__('panel.submit')}}">
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection