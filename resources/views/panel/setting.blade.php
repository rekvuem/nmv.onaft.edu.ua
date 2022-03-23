@extends('panel.layout.index')
@section('title','Головна')
@section('page_styles')
    <style>
        label.heade {
            font-weight: bold;
        }

        .card-header {
            font-size: larger;
            font-weight: bold;
        }

    </style>
@endsection
@section('page_script')
    <!-- Input mask -->
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/styling/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/inputs/inputmask.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(".phone").inputmask({"mask": "+38(099) 999-99-99"}); //specifying options
            $(".single").inputmask({"mask": "99.99.9999"}); //specifying options
        });
    </script>
@endsection
@section('content')
    @include('panel/component/allmessage')
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">Редагування даних</div>
                <div class="card-body">
                    <form action="{{route('spanel.setting.save')}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="user" value="{{Auth::id()}}">
                        <div class="form-group">
                            <label class="heade">Призвище</label>
                            <input type="text" name="changefam" class="form-control" value="{{$user->UserFirstInformation->familia}}">
                        </div>
                        <div class="form-group">
                            <label class="heade">І'мя</label>
                            <input type="text" name="changeim" class="form-control" value="{{$user->UserFirstInformation->imya}}">
                        </div>
                        <div class="form-group">
                            <label class="heade">Побатькові</label>
                            <input type="text" name="changeotch" class="form-control" value="{{$user->UserFirstInformation->otchestvo}}">
                        </div>
                        <div class="form-group">
                            <label class="heade">Відділ / Департамент / Факультет</label>
                            <input type="text" readonly class="form-control" value="{{ implode(', ', $user->SlugDepart()->get()->pluck('title_departament')->toArray()) }}">
                        </div>
                        <div class="form-group">
                            <label class="heade">Посада</label>
                            <input type="text" readonly class="form-control" value="{{ implode(', ', $user->SlugPosition()->get()->pluck('title_position')->toArray()) }}">
                        </div>
                        <div class="form-group">
                            <label class="heade">День народження</label>
                            <div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="mi-date-range"></i></span>
										</span>
                                <input type="text" class="form-control single" name="changebirth" value="{{ date('d.m.Y',strtotime($user->UserFirstInformation->happy_birth)) }}" autocomplete="off" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="heade">Моб. телефон</label>
                            <input type="text" name="changemob" class="form-control phone" value="{{$user->UserFirstInformation->number_mobile}}">
                        </div>
                        <input type="submit" class="form-control btn bg-green-700" value="зберегти">
                    </form>
                </div>
            </div>
        </div>
        <td></td>
        <td>

        </td>
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header">Зміна паролю</div>
                <div class="card-body">
                    <form action="{{route('spanel.setting.pass')}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <input type="password" class="form-control" name="truepass" value="" placeholder="Діючий парол">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpass" value="" placeholder="Новий парол">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="repeatpass" value="" placeholder="Повторити парол">
                        </div>
                        <input type="submit" class="form-control btn bg-indigo-700" value="Змінити">
                    </form>
                </div>
            </div>
            @can('posit-admin-role')
                <div class="card">
                    <div class="card-header">Запит до Адміністратора</div>
                </div>
            @endcan
        </div>

    </div>
@endsection