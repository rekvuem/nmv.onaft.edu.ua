@extends('panel.layout.index')
@section('title','Табліця 5. Наукові журнали та об`єкти інтелектуальної власності')
@section('page_styles')
<style>
  .heade_title{font-size: 1.2em;}
  .level2{font-size: 1.1em; font-style: italic;}
</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
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

  $(".edit_table5").on("click", function () {
    var id = $(this).data('gettable');
    var row = $(this).data('row');
    $(".form-update-tablica5").attr('action', '/spanel/zvit/table5/' + id + '');

    $.ajax({
      type: 'GET',
      url: '/spanel/zvit/table5/' + id + '/' + row + '/edit',
      data: {selectrow: row, tablica5: id},
      dataType: 'html',
      success: function (data) {
        $(".modal-body").html(data);
      },
      error: function () {
        alert('bad tablica 5');
      }
    });
  });


  $('.delete_table').on('click', function () {
    var table = $(this).data('gettable');
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
          url: '/spanel/zvit/table5/' + table,
          data: {
            _method: 'delete',
            tablica5: table
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
            alert('Помилка! Сторінка Таблиця 3');
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
  <div class="col-md-10">
    <div class="card rounded-0">
      <table class="table table-bordered table-hover datatable-basic" style="font-size: 1em" data-fouc>
        <tr><td width="40%" data-toggle="modal" data-target="#help_Modal" colspan="2"></td><td>Назви, реквізити (коди)</td></tr>
  		    <tr >
          <td>
            Кількість наукових журналів, які входять з ненульовим коефіцієнтом впливовості до наукометричних баз<span class="badge bg-danger">17</span>
            <form action="{{route('spanel.zvit.table5.insert')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="row" value="17">
              <div class="input-group">
                <input type="text" name="tab17" autocomplete="off" class="form-control" value="">
                <span class="input-group-append">
                  <input type="submit" class="btn btn-sm btn-success rounded-0" value="{{__('panel.submit')}}">
                </span>
              </div>
            </form>
          </td>
          <td>{{$Table_5_17}}</td>
          <td>
            @foreach($Table5 as $tabl5)
            @if($tabl5->row17 ?? '')
            <div class="">{{$tabl5->row17}}
              <a href="#" class="btn-link edit_table5" 
                 data-gettable="{{$tabl5->id_tablica5}}" 
                 data-row="row17" 
                 data-toggle="modal" 
                 data-target="#modal_edit_tablica5">ред.</a>
              <a href="#" data-gettable="{{$tabl5->id_tablica5}}" class="btn-link delete_table">вид.</a>
            </div>
            @endif 
            @endforeach
          </td>
  		    </tr>
  		    <tr>
          <td>Кількість спеціальностей<span class="badge bg-danger">18</span>
            <form action="{{route('spanel.zvit.table5.insert')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="row" value="18">
              <div class="input-group">
                <input type="text" name="tab18" autocomplete="off" class="form-control" value="">
                <span class="input-group-append">
                  <input type="submit" class="btn btn-sm btn-success rounded-0" value="{{__('panel.submit')}}">
                </span>
              </div>
            </form>
          </td>
          <td>{{$Table_5_18}}</td>
          <td>
            @foreach($Table5 as $tabl5)
            @if($tabl5->row18 ?? '')
            <div class="">{{$tabl5->row18}} 
              <a href="#" class="btn-link edit_table5" 
                 data-gettable="{{$tabl5->id_tablica5}}" 
                 data-row="row18" 
                 data-toggle="modal" 
                 data-target="#modal_edit_tablica5">ред.</a>
              <a href="#" data-gettable="{{$tabl5->id_tablica5}}" class="btn-link delete_table">вид.</a>
            </div>
            @endif
            @endforeach
          </td>
  		    </tr>
  		    <tr>
          <td>Кількість об'єктів права інтелектуальної власності, що зареєстровані закладом вищої освіти та/або зареєстровані (створені) його науково-педагогічними та науковими працівниками<span class="badge bg-danger">19</span>
            <form action="{{route('spanel.zvit.table5.insert')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="row" value="19">
              <div class="input-group">
                <input type="text" name="tab19" autocomplete="off" class="form-control" value="">
                <span class="input-group-append">
                  <input type="submit" class="btn btn-sm btn-success rounded-0" value="{{__('panel.submit')}}">
                </span>
              </div>
            </form>
          </td>
          <td>{{$Table_5_19}}</td>
          <td>
            @foreach($Table5 as $tabl5)
            @if($tabl5->row19 ?? '')
            <div class="">{{$tabl5->row19}}
              <a href="#" class="btn-link edit_table5" 
                 data-gettable="{{$tabl5->id_tablica5}}" 
                 data-row="row19" 
                 data-toggle="modal" 
                 data-target="#modal_edit_tablica5">ред.</a>
              <a href="#" data-gettable="{{$tabl5->id_tablica5}}" class="btn-link delete_table">вид.</a>
            </div>
            @endif 
            @endforeach
          </td>
  		    </tr>
  		    <tr>
          <td>Кількість об'єктів права інтелектуальної власності, які комерціалізовано закладом вищої освіти та/або його науково-педагогічними та науковими працівниками<span class="badge bg-danger">20</span>
            <form action="{{route('spanel.zvit.table5.insert')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="row" autocomplete="off" value="20">
              <div class="input-group">
                <input type="text" name="tab20" class="form-control" value="">
                <span class="input-group-append">
                  <input type="submit" class="btn btn-sm btn-success rounded-0" value="{{__('panel.submit')}}">
                </span>
              </div>
            </form>
          </td>
          <td>{{$Table_5_20}}</td>
          <td>
            @foreach($Table5 as $tabl5)
            @if($tabl5->row20 ?? '')
            <div class="">{{$tabl5->row20}}
              <a href="#" class="btn-link edit_table5" 
                 data-gettable="{{$tabl5->id_tablica5}}" 
                 data-row="row20" 
                 data-toggle="modal" 
                 data-target="#modal_edit_tablica5">ред.</a>
              <a href="#" data-gettable="{{$tabl5->id_tablica5}}" class="btn-link delete_table">вид.</a>
            </div>
            @endif  
            @endforeach
          </td>
  		    </tr>
      </table>
    </div>
  </div>
</div>


<div class="modal" id="help_Modal" tabindex="-1" role="dialog" aria-labelledby="help_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><span class="text-danger-800 font-weight-blac">17</span>	Кількість наукових журналів, які входять з ненульовим коефіцієнтом впливовості до наукометричних баз Scopus, Web of Science, що видаються закладом вищої освіти</p>
        <p><span class="text-danger-800 font-weight-blac">18</span>	Кількість спеціальностей, з яких здійснюється підготовка здобувачів вищої освіти у закладі вищої освіти станом на 31 грудня останнього року звітного періоду</p>

        <p><span class="text-danger-800 font-weight-blac">19</span> Кількість об'єктів права інтелектуальної власності, що зареєстровані закладом вищої освіти та/або зареєстровані (створені) його науково-педагогічними та науковими працівниками, що працюють у ньому на постійній основі за звітний період:
          для усіх закладів вищої освіти - винаходів, корисних моделей, промислових зразків, компонувань (топографій) інтегральних мікросхем, раціоналізаторських пропозицій, сортів рослин, порід тварин, наукових відкриттів, комп'ютерних програм, компіляцій даних (баз даних);
          для закладів вищої освіти, в яких здійснюється підготовка фахівців за відповідними спеціальностями, - літературних творів, перекладів літературних творів, творів живопису, декоративного мистецтва, архітектури, архітектурних проектів, скульптурних, графічних, фотографічних творів, творів дизайну,музичних творів, аудіо-, відеотворів, передач (програм) організацій мовлення, медіатворів, сценічних постановок, концертних програм (сольних та ансамблевих), кінотворів, анімаційних творів, аранжувань, рекламних творів; </p>
        <p><span class="text-danger-800 font-weight-blac">20</span>  Кількість об'єктів права інтелектуальної власності, які комерціалізовано закладом вищої освіти та/або його науково-педагогічними та науковими працівниками, які працюють у ньому на постійній основі у звітному періоді</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>


<div id="modal_edit_tablica5" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" class="form-update-tablica5" >
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="modal-header">
          <h5 class="modal-title"><i class="icon-menu7 mr-2"></i> &nbsp; Редагувати данні</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button class="btn btn-sm bg-danger-700" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> {{__("panel.closed")}}</button>
          <button type="submit" class="btn btn-sm bg-success-700"><i class="icon-checkmark3 font-size-base mr-1"></i> {{__("panel.submit")}}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection