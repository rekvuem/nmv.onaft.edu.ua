@extends('panel.layout.index')
@section('title','Список користувачів')
@section('page_styles')
@endsection
@section('page_script')
<script>
  $(document).ready(function () {

  });
</script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="col-md-12">
  <div class="row collapse" id="collapse-form">
    <a href="№" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal"><li class="icon-user-plus icon-1x"></li> Додати</a>
  </div>

  <div class="row">
    <div class="col-12">

      <ul class="nav nav-tabs nav-tabs-solid nav-justified border-0">
        <li class="nav-item"><a href="#solid-justified-tab1" class="nav-link active" data-toggle="tab">Управління користувачами</a></li>
        <li class="nav-item"><a href="#solid-justified-tab3" class="nav-link" data-toggle="tab">Департамент</a></li>
        <li class="nav-item"><a href="#solid-justified-tab4" class="nav-link" data-toggle="tab">Посада</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="solid-justified-tab1">

          <div class="table-responsive">
            <table class="table table-bordered table-striped table-scrollable bg-light">
              <thead>
                <tr class="bg-indigo-400">
                  <th>{{__('panel.function')}}</th>
                  <th>{{__('panel.familia')}}</th>
                  <th>{{__('panel.imya')}}</th>
                  <th>{{__('panel.otchestvo')}}</th>
                  <th>{{__('panel.email')}}</th>
                  <th>{{__('panel.viddil')}}</th>
                  <th>{{__('panel.dostup')}}</th>
                  <th>{{__('panel.mob.phone')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($userslistInfo as $list) 
                <tr @if($list->deleted_at)
                      style="color:darkred; font-size: 14px; font-weight: bold"
                        @endif>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('spanel.admin.users.edit', $list->id)}}" class="list-icons-item btn btn-outline bg-blue-700 btn-icon btn-group">
                        <i class="icon-quill2 "></i>
                      </a>

                      @if($list->deleted_at)
                        <form action="{{ route('spanel.admin.reestablish', $list->id) }}" method="POST">
                          {{ csrf_field() }}
                          {{method_field('PUT')}}
                          <button type="submit" class="btn btn-outline bg-success-700 btn-icon btn-group"><i class="mi-check"></i></button>
                        </form>
                      @else
                        <form action="{{route('spanel.admin.users.destroy', $list->id)}}" method="POST">
                          {{ csrf_field() }}
                          {{method_field('DELETE')}}
                          <button type="submit" class="btn btn-outline bg-danger-600 btn-icon btn-group"><i class="icon-trash"></i></button>
                        </form>
                      @endif
                      <a href="#" class="list-icons-item btn btn-outline bg-slate-700 btn-icon btn-group" data-toggle="modal" data-target="#options_modal">
                        <i class="icon-cog6"></i>
                      </a>
                    </div>
                  </td>
                  <td>{{ $list->UserFirstInformation['familia'] }}</td>
                  <td>{{ $list->UserFirstInformation['imya'] }}</td>
                  <td>{{ $list->UserFirstInformation['otchestvo'] }}</td>
                  <td>{{ $list->email }}</td>
                  <td>{{ implode(', ', $list->SlugDepart()->get()->pluck('title_departament')->toArray()) }}</td>
                  <td>
                    <div class="badge badge-light badge-striped badge-striped-left border-left-info">
                      {{ implode(', ', $list->SlugPosition()->get()->pluck('title_position')->toArray()) }}
                    </div>
                    <div class="badge badge-light badge-striped badge-striped-right border-right-teal">
                      {{ implode(', ', $list->RoleSuccess()->get()->pluck('title_function')->toArray()) }}
                    </div>
                  </td>
                  <td>{{ $list->UserFirstInformation['number_mobile'] }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>

        <div class="tab-pane fade" id="solid-justified-tab3">
          <div class="row">

            <div class="col-5">
              <div class="table-responsive">
                <table class="table table-responsive-lg table-bordered table-striped table-scrollable bg-light">
                  <thead>
                    <tr class="bg-indigo-400">
                      <th>департамент</th>
                      <th>slug</th>
                      <th>функц.</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Departament as $depart)
                    <tr>
                      <td>{{$depart->title_departament}}</td> 
                      <td>{{$depart->slug}}</td>
                      <td>
                        <a href="" class="btn-link">ред.</a>
                        <a href="" class="btn-link">вид.</a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-1">
              <a href="" class="btn btn-sm bg-brown-800 " data-toggle="modal" data-target="#add_depart_modal">додати</a>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="solid-justified-tab4">
          <div class="row">
            <div class="col-5">
              <div class="table-responsive">
                <table class="table table-responsive-lg table-bordered table-striped table-scrollable bg-light">
                  <thead>
                    <tr class="bg-indigo-400">
                      <th>Позіція / Посада</th>
                      <th>slug</th>
                      <th>функц.</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Position as $pos)
                    <tr>
                      <td>{{$pos->title_position}}</td> 
                      <td>{{$pos->slug}}</td>
                      <td>
                        <a href="" class="btn-link">ред.</a>
                        <a href="" class="btn-link">вид.</a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-1">
              <a href="" class="btn btn-sm bg-brown-800" data-toggle="modal" data-target="#add_pos_modal">додати</a>
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>

</div>
<!-- Option modal -->
<div id="options_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
								<h5 class="modal-title">Налаштування</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
      </div>
      <div class="modal-footer bg-transparent">
								<button type="button" class="btn btn-link text-warning-700" data-dismiss="modal">Закрити</button>
								<button type="button" class="btn btn-success" data-dismiss="modal">Зберегти</button>
      </div>

    </div>
  </div>
</div>
<!-- /Option modal -->

<!-- add modal -->
<div id="add_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header bg-transparent">
								<h5 class="modal-title">Додати</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="table-responsive p-1 col-md-10 offset-md-1">
        <form method="POST" action="{{ action('UserPanel\Admin\UserController@store') }}">
          {{ csrf_field() }}
          <div class="form-group ">
            <div class="col-md-12">
              <input type="text" class="form-control" 
                     name="familia" value="{{ old('familia') }}" placeholder="{{__('panel.familia')}}" required autofocus>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <input type="text" class="form-control" 
                     name="imya" value="{{ old('imya') }}" placeholder="{{__('panel.imya')}}">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-md-12">
              <input type="text" class="form-control" 
                     name="otchestvo" value="{{ old('otchestvo') }}" placeholder="Побатькові" autofocus>
            </div>
          </div>

          <div class="form-group ">
            <div class="col-md-12">
              <input id="number_mobile" type="text" class="form-control" 
                     name="num_mobile" value="{{ old('num_mobile') }}" placeholder="+38 0__ ___ __ __">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-md-12">
              <input id="birth_day" type="text" class="form-control"
                     name="date_happy" value="{{ old('date_happy') }}" placeholder="____-__-__" data-mask="9999-99-99">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-md-12">
              <input type="email" class="form-control" 
                     name="email" value="{{ old('email') }}" required placeholder="E-Mail" autocomplete="email">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <input type="password" class="form-control" 
                     name="password" required autocomplete="off" placeholder="Пароль">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-md-12">
              <input type="password" class="form-control" 
                     name="password_confirmation" required autocomplete="off" placeholder="Підвердження паролю">
            </div>
          </div>
          <div class="modal-footer">

            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">
                {{ __('Зареїструвати') }}
              </button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /add modal -->

<!-- add modal -->
<div id="add_depart_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header bg-transparent">
								<h5 class="modal-title">Додати</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="table-responsive p-1 col-md-10 offset-md-1">
        <form method="POST" action="">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-md-12">
              <input type="text" class="form-control" 
                     name="imya" value="{{ old('imya') }}" placeholder="{{__('panel.imya')}}">
            </div>
          </div>

          <div class="form-group ">
            <div class="col-md-12">
              <input type="text" class="form-control" 
                     name="otchestvo" value="{{ old('otchestvo') }}" placeholder="Побатькові" autofocus>
            </div>
          </div>

          <div class="modal-footer">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">{{ __('Додати') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /add modal -->

<!-- add modal -->
<div id="add_pos_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header bg-transparent">
								<h5 class="modal-title">Додати</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="table-responsive p-1 col-md-10 offset-md-1">
        <form method="POST" action="">
          {{ csrf_field() }}
          <div class="form-group ">
            <div class="col-md-12">
              <input type="text" class="form-control" 
                     name="titlePos" value="{{ old('titlePos') }}" placeholder="{{__('назва посади')}}" required autofocus>
            </div>
          </div>


          <div class="form-group ">
            <div class="col-md-12">
              <input type="text" class="form-control"
                     name="posSlug" value="{{ old('posSlug') }}" placeholder="{{__('slug')}}">
            </div>
          </div>

          <div class="modal-footer">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">{{ __('Додати') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /add modal -->
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/forms/inputs/inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>

<script>
  $(document).ready(function () {
    $('#number_mobile').inputmask("+38 099 999 99 99");
    $('#birth_day').inputmask("9999-99-99");
  });
</script>
@endsection