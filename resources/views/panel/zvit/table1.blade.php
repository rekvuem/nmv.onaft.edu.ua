@extends('panel.layout.index')
@section('title','Таблиця 1. Здобувачі вищої освіти')
@section('page_styles')
<style>
  .card{font-size: 1em;}
</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>

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

  $(".datatable-basic tbody").on("click", ".edit_table1", function () {
    var id = $(this).data('gettable');
    $(".form-update-tablica1").attr('action', '/spanel/zvit/table1/' + id + '');

    $.ajax({
      type: 'GET',
      url: '/spanel/zvit/table1/' + id + '/edit',
      data: {tablica1: id},
      dataType: 'html',
      success: function (data) {
        $(".modal-body").html(data);
      },
      error: function (data) {
       console.log(data);
      }
    });
  });

  $('.select2').select2();

  $('.datatable-basic').DataTable({
    autoWidth: false,
    stateSave: true,
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      responsive: true,
      buttons: [
        'copy', 'excel', 'pdf'
      ],
      search: '<span>Фільтр:</span> _INPUT_',
      lengthMenu: '<span>Показати:</span> _MENU_',
      paginate: {'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←'}
    }
  });
  
  $('.datatable-basic tbody').on('click', '.delete_table' ,function () {
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
          url: '/spanel/zvit/table1/' + table,
          data: {
            _method: 'delete',
            tablica1: table
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
  <div class="col-md-8">
    <div class="card card-body">
      <form method="POST" action="{{route('spanel.zvit.table1.insert')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <select name="allokr" class="form-control select2" data-placeholder="Ступінь (ОКР) \ Код та спеціальність" data-fouc>
                @foreach($ListOkr as $okr)
                <option value="{{$okr->id}}">{{$okr->stupen}} - {{$okr->kod_special}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input class="form-control" placeholder="Кількість" type="text" name="kilkist" value="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" placeholder="Проходили стажування в іноземних ЗВО" type="text" name="staj" value="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-2" >
                <input class="form-control" placeholder="Укр. олімп" type="text" name="winner" value="">
              </div>
              <div class="col-md-2" > 
                <input class="form-control " placeholder="Міжнарод" type="text" name="winner1" value="">
              </div>
              <div class="col-md-2" > 
                <input class="form-control " placeholder="Культ. спорт" type="text" name="winner2" value="">
              </div>
              <div class="col-md-2" > 
                <input class="form-control " placeholder="Укр. наук" type="text" name="winner3" value="">
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input class="form-control" placeholder="Іноземних громадян" type="text" name="inozemec" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" placeholder="Громадян з країн членів ОЕСР" type="text" name="gromodyan" value="">
            </div>   
          </div>
        </div>
        <input type="submit" class="btn btn-sm btn-success" value="Додати"> 
        <a href="" data-toggle="modal" data-target="#help_Modal" class="btn btn-sm btn-default" style="border: 1px solid red;"> Швидка допомога</a>
	 		  </form>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <table class="table table-bordered table-hover datatable-basic">
        <thead class="bg-teal-700">
          <tr>
            <th>Ред.\Видл.</th>
            <th width="10%">Ступінь (ОКР)</th>
            <th>Код та спеціальність</th>
            <th>Кількість <span class="badge bg-danger"> 1</span></th>
            <th>Проходили стажування в іноземних ЗВО <span class="badge bg-danger"> 2</span></th>
            <th>Здобули призові місця <span class="badge bg-danger"> 3</span></th>
            <th>Іноземних громадян <span class="badge bg-danger"> 4</span></th>
            <th>Громадян з країн членів ОЕСР <span class="badge bg-danger"> 5</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach($Table1 as $table)
          <tr>
            <td>
              @can('edit')
              <a href="#" class="btn-link edit_table1" data-gettable="{{$table->id_tablica1}}" data-toggle="modal" data-target="#modal_edit_tablica1">ред.</a>
              @endcan
              @can('delete')
              <a href="#" class="btn-link delete_table" data-gettable="{{$table->id_tablica1}}">вид.</a>
              @endcan
            </td>
            <td>{{$table->stupen}}</td>
            <td>{{$table->kod_special}}</td>
            <td>{{$table->kilkist}}</td> 
            <td>{{$table->proxodj}}</td>
            <td>{{$table->zdobul_winner + $table->zdobul_winner1 + $table->zdobul_winner2 + $table->zdobul_winner3}}</td> 
            <td>{{$table->inozemec}}</td>
            <td>{{$table->grom}}</td> 
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" style="text-align: right; font-weight: bold;">Разом:</td>
            <td>{{$Table1->sum('kilkist')}}</td>
            <td>{{$Table1->sum('proxodj')}}</td>
            <td>{{$Sum}}</td>
            <td>{{$Table1->sum('inozemec')}}</td>
            <td>{{$Table1->sum('grom')}}</td>
          </tr> 
  		    </tfoot>
       
      </table>
    </div>
  </div>
</div>



<div class="modal" id="help_Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> <span class="text-danger-800 font-weight-black">1</span> Кількість здобувачів вищої освіти денної форми навчання станом на 31 грудня останнього року звітного періоду </p>

        <p> <span class="text-danger-800 font-weight-black">2</span> Кількість здобувачів вищої освіти денної форми навчання, які не менше трьох місяців протягом звітного періоду або із завершенням у звітному періоді навчалися (стажувалися) в іноземних закладах вищої освіти (наукових установах) за межами України </p>

        <p> <span class="text-danger-800 font-weight-black">3</span> Кількість здобувачів вищої освіти, які здобули у звітному періоді призові місця на Міжнародних студентських олімпіадах, II етапі Всеукраїнської студентської олімпіади, II етапі Всеукраїнського конкурсу студентських наукових робіт, інших освітньо-наукових конкурсах, які проводяться або визнані МОН, міжнародних та всеукраїнських культурно-мистецьких проектах, які проводяться або визнані Мінкультури, на Олімпійських, Паралімпійських, Дефлімпійських іграх, Всесвітній та Всеукраїнській універсіадах, чемпіонатах світу, Європи, Європейських іграх, етапах Кубків світу та Європи, чемпіонату України з видів спорту, які проводяться або визнані центральним органом виконавчої влади, що забезпечує формування державної політики у сфері фізичної культури та спорту </p>

        <p> <span class="text-danger-800 font-weight-black">4</span> Середньорічна кількість іноземних громадян серед здобувачів вищої освіти у закладі вищої освіти, які навчаються за кошти фізичних або юридичних осіб, заденною формою навчання за останні три роки (крім вищих військових навчальних закладів (закладів вищої освіти із специфічними умовами навчання), військових навчальних підрозділів закладів вищої освіти) </p>

        <p> <span class="text-danger-800 font-weight-black">5</span> Середньорічна кількість громадян країн - членів Організації економічного співробітництва та розвитку - серед здобувачів вищої освіти у закладі вищої освіти, які навчаються за кошти фізичних або юридичних осіб, за денною формою навчання за останні три роки (крім вищих військових навчальних закладів (закладів вищої освіти із специфічними умовами навчання), військових навчальних підрозділів закладів вищої освіти) </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>


<div id="modal_edit_tablica1" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-update-tablica1" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="modal-header">
          <h5 class="modal-title"><i class="icon-menu7 mr-2"></i> &nbsp; Редагувати данні</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">

        </div>

        <div class="modal-footer">
          <button class="btn btn-sm bg-danger-700" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> {{__("panel.closed")}}</button>
          <button type="submit" class="btn btn-sm bg-success-700"><i class="icon-checkmark3 font-size-base mr-1"></i> {{__("panel.submit")}}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection