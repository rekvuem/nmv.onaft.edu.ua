@extends('panel.layout.index')
@section('title','Стандарт вищої освіти')
@section('page_styles')
<style>

</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });

  $('.select2').select2({
    minimumResultsForSearch: Infinity
  });


  $(".modal_editokr").on("click", function () {
    var okrid = $(this).data('okrid');
    $(".form-update-okr").attr('action', '/spanel/zvit/listokr/' + okrid + '');

    $.ajax({
      type: 'GET',
      url: '/spanel/zvit/listokr/' + okrid + '/edit',
      data: {_method: 'PUT', okr: okrid},
      dataType: 'html',
      success: function (data) {
        $(".okr-body").html(data);
      },
      error: function () {
        alert('bad okr');
      }
    });
  });

  $(".modal_editfk").on("click", function () {
    var faculty = $(this).data('facultyid');
    $(".form-update-faculty").attr('action', '/spanel/zvit/list/' + faculty + '');

    $.ajax({
      type: 'GET',
      url: '/spanel/zvit/list/' + faculty + '/edit',
      data: {_method: 'PUT', facultyid: faculty},
      dataType: 'html',
      success: function (data) {

        $(".modal-body").html(data);
      },
      error: function () {
        alert('bad faculty');
      }
    });
  });

  $('.delete_special').on('click', function () {
    var okr = $(this).data('okrid');
    swalInit.fire({
      title: 'Ви бажаэте видалити запис?',
      text: 'Відновлення запису неможливо',
      type: 'warning',
      position: 'top',
      showCancelButton: true,
      cancelButtonClass: 'btn bg-grey',
      confirmButtonClass: 'btn bg-success',
      cancelButtonText: 'Закрити',
      confirmButtonText: 'Так, видалити!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          method: 'POST',
          url: '/spanel/zvit/listokr/' + okr,
          data: {
            _method: 'delete',
            okr: okr
          },
          success: function () {
            new PNotify({
              title: 'Запис видалено',
              text: 'Запис видалено успішно!',
              icon: 'icon-checkmark3',
              addclass: 'bg-success border-success'
            });
            setTimeout('location.reload(true)', 1000);
          },
          error: function () {
            alert('Помилка! Сторінка Таблиця 1');
          }
        });
      } else {
        location.reload();
      }
    });
  });

  $('.deleting_fk').on('click', function () {
    var faculty = $(this).data('faculty_id');
    swalInit.fire({
      title: 'Ви бажаэте видалити запис?',
      text: 'Відновлення запису неможливо',
      type: 'warning',
      position: 'top',
      showCancelButton: true,
      cancelButtonClass: 'btn bg-grey',
      confirmButtonClass: 'btn bg-success',
      cancelButtonText: 'Закрити',
      confirmButtonText: 'Так, видалити!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          method: 'POST',
          url: '/spanel/zvit/list/' + faculty,
          data: {
            _method: 'delete',
            facultyid: faculty
          },
          success: function () {
            new PNotify({
              title: 'Запис видалено',
              text: 'Запис видалено успішно!',
              icon: 'icon-checkmark3',
              addclass: 'bg-success border-success'
            });
            setTimeout('location.reload(true)', 1000);
          },
          error: function () {
            alert('Помилка! Сторінка Таблиця 1');
          }
        });
      } else {
        location.reload();
      }
    });
  });
});
</script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="row">
  <div class="col-md-6">
    <div class="card rounded-0">
      <form action="{{route('spanel.zvit.list.fk.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="text" name="faculty" class="form-control" autocomplete="on" placeholder="факультет" value="">
        </div>
        <div class="form-group">
          <input type="text" name="kafedra" class="form-control" autocomplete="on" placeholder="кафедра" value="">
        </div>
        <div class="form-group">
          <a href="{{route('spanel.zvit.list.copy.okr')}}" 
             class="btn btn-sm bg-green-700 rounded-0 float-left">{{__('Копіювати')}}</a>
          <input type="submit" class="btn btn-sm btn-primary float-right" value="{{__('panel.submit')}}">
        </div>
      </form>
    </div>

    <div class="card rounded-0 table-responsive-lg">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Факультет</th>
            <th>Кафедра</th>
            <th>Функц.</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ShowListFK as $FK)
          <tr>
            <td>{{$FK->faculty}}</td>
            <td>{{$FK->kafedra}}</td>
            <td>
              <a href="#" data-facultyid="{{$FK->id}}" class="modal_editfk" data-toggle="modal" data-target="#modal_edit_fk">ред.</a>
              <a href="#" data-faculty_id="{{$FK->id}}" class="deleting_fk">вид.</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card rounded-0">
      <form action="{{route('spanel.zvit.list.okr.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <select name="type_special" class="form-control select2" data-placeholder="Тип" data-fouc>
            <option value="магістр">магістр</option>
            <option value="бакалавр">бакалавр</option>           
            <option value="спеціаліст">спеціаліст</option>
            <option value="спеціаліст перепідготовка">спеціаліст перепідготовка</option>
          </select>
        </div>
        <div class="form-group">
          <input type="text" name="specialkod" class="form-control" autocomplete="on" placeholder="Код і спеціальність" value="">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-sm btn-primary float-right" value="{{__('panel.submit')}}">
        </div>
      </form>
    </div>
    <div class="card rounded-0 table-responsive-lg">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Ступень</th>
            <th>Код спеціальності</th>
            <th>Функц.</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ShowListOKR as $okr)
          <tr>
            <td>{{$okr->stupen}}</td>
            <td>{{$okr->kod_special}}</td>
            <td>
              <a href="#" data-okrid="{{$okr->id}}" class="modal_editokr" data-toggle="modal" data-target="#modal_edit_okr">ред.</a>
              <a href="#" data-okrid="{{$okr->id}}" class="delete_special">вид.</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>



<div id="modal_edit_fk" class="modal fade" data-backdrop="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-update-faculty" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="modal-header">
          <h5 class="modal-title"><i class="icon-menu7 mr-2"></i> &nbsp; Редагувати данні</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">

        </div>

        <div class="modal-footer">
          <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> {{__("Закрити")}}</button>
          <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> {{__("panel.submit")}}</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_edit_okr" class="modal fade" data-backdrop="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-update-okr" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="modal-header">
          <h5 class="modal-title"><i class="icon-menu7 mr-2"></i> &nbsp; Редагувати данні</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body okr-body">

        </div>

        <div class="modal-footer">
          <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> {{__("Закрити")}}</button>
          <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> {{__("panel.submit")}}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection