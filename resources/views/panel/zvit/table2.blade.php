@extends('panel.layout.index')
@section('title','Таблиця 2. Наукові, науково-педагогічні працівники')
@section('page_styles')
<style>

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

  $(".datatable-basic tbody").on("click", ".edit_table2", function () {
    var id = $(this).data('gettable');
    $(".form-update-tablica2").attr('action', '/spanel/zvit/table2/' + id + '');

    $.ajax({
      type: 'GET',
      url: '/spanel/zvit/table2/' + id + '/edit',
      data: {tablica2: id},
      dataType: 'html',
      success: function (data) {
        $(".modal-body").html(data);
      },
      error: function () {
        alert('bad tablica');
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

  $('.datatable-basic tbody').on('click', '.delete_table', function () {
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
          url: '/spanel/zvit/table2/' + table,
          data: {
            _method: 'delete',
            tablica2: table
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
            alert('Помилка! Сторінка Таблиця 2');
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
      <form method="POST" action="{{route('spanel.zvit.table2.insert')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <select name="zvit_allfk" class="form-control select2" data-placeholder="Факультет (Інститут) \ Кафедра відділ тощо" data-fouc>
                @foreach($ListFk as $list)
                <option value="{{$list->id}}">{{$list->faculty}} \ {{$list->kafedra}} </option>
                @endforeach
              </select>
            </div>
          </div>
	   		    <div class="col-md-2">
            <div class="form-group">
              <input class="form-control" 
                     data-popup="tooltip" 
                     data-trigger="focus" 
                     title="Кількість" 
                     placeholder="Кількість" 
                     autocomplete="off"
                     type="text" 
                     name="how_much" value="">
            </div>
	   		    </div>
          <div class="col-md-3">
            <div class="form-group">
              <input class="form-control" 
                     data-popup="tooltip" 
                     data-trigger="focus" 
                     title="Проходили стажування в іноземних ЗВО" 
                     placeholder="Проходили стажування в іноземних ЗВО"
                     autocomplete="off"
                     type="text" 
                     name="stajuvannya" value="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control"
                     data-popup="tooltip" 
                     data-trigger="focus" 
                     title="Здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні" 
                     placeholder="Здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні"
                     autocomplete="off"
                     type="text" 
                     name="nayk_shef" value="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" 
                     data-popup="tooltip" 
                     data-trigger="focus" 
                     title="Науково-педагогічні працівники, науковий ступінь та/або вчене звання" 
                     placeholder="Науково-педагогічні працівники, науковий ступінь та/або вчене звання" 
                     autocomplete="off"
                     type="text" 
                     name="stupen" value="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" 
                     data-popup="tooltip" 
                     data-trigger="focus" 
                     title="Науково-педагогічні працівники, доктори наук та/або професори" 
                     placeholder="Науково-педагогічні працівники, доктори наук та/або професори" 
                     autocomplete="off"
                     type="text" 
                     name="doctor" value="">
            </div>  
          </div>
        </div>
        <div class="row">
          <input type="submit" class="btn btn-sm btn-success" value="Зберегти">
          <a href="" data-toggle="modal" data-target="#help_Modal" class="btn btn-sm btn-default" style="border: 1px solid red;"> Швидка допомога</a>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card table-responsive">
      <table class="table table-bordered table-hover datatable-basic">
        <thead class="bg-teal-700">
          <tr>
            <th>Ред.\Видл.</th>
            <th width="15%">Факультет (Інститут)</th>
            <th width="15%">Кафедра відділ тощо</th>
            <th>Кількість <span class="badge bg-danger"> 6</span></th>
            <th>Проходили стажування в іноземних ЗВО<span class="badge bg-danger"> 7</span></th>
            <th>Здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні <span class="badge bg-danger"> 8</span></th>
            <th>Науково-педагогічні працівники, науковий ступінь та/або вчене звання <span class="badge bg-danger"> 9</span></th>
            <th>Науково-педагогічні працівники, доктори наук та/або професори <span class="badge bg-danger"> 10</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach($Table2 as $table)
          <tr>
            <td>
              <a href="#" class="btn-link edit_table2" data-gettable="{{$table->id_tablica2}}" data-toggle="modal" data-target="#modal_edit_tablica2">ред.</a>
              <a href="#" class="btn-link delete_table" data-gettable="{{$table->id_tablica2}}">вид.</a>
            </td>
            <td>{{$table->faculty}}</td>
            <td>{{$table->kafedra}}</td>
            <td>{{$table->how_much}}</td> 
            <td>{{$table->staj}}</td>
            <td>{{$table->nayk_shef}}</td> 
            <td>{{$table->stupeni}}</td>
            <td>{{$table->doctor}}</td> 
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" style="text-align: right; font-weight: bold;">Разом:</td>
            <td>{{$Table2->sum('how_much')}}</td>
            <td>{{$Table2->sum('staj')}}</td>
            <td>{{$Table2->sum('nayk_shef')}}</td>
            <td>{{$Table2->sum('stupeni')}}</td>
            <td>{{$Table2->sum('doctor')}}</td>
          </tr> 
  		    </tfoot>
      </table>
    </div>
  </div>
</div>



<div id="modal_edit_tablica2" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-update-tablica2" method="POST">
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

<!-- Modal -->
<div class="modal" id="help_Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><span class="text-danger-800 font-weight-blac">6</span> Кількість науково-педагогічних і наукових працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду</p>
        <p><span class="text-danger-800 font-weight-blac">7</span> Кількість науково-педагогічних і наукових працівників, які не менше трьох місяців протягом звітного періоду або із завершенням у звітному періоді стажувалися, проводили навчальні заняття в іноземних закладах вищої освіти (наукових установах) (для закладів вищої освіти та наукових установ культурологічного та мистецького спрямування - проводили навчальні заняття або брали участь (у тому числі як члени журі) у культурно-мистецьких проектах) за межами України</p>
        <p><span class="text-danger-800 font-weight-blac">8</span> Кількість науково-педагогічних та наукових працівників, які здійснювали наукове керівництво (консультування) не менше п'ятьох здобувачів наукових ступенів, які захистилися в Україні</p>
        <p><span class="text-danger-800 font-weight-blac">9</span>	Кількість науково-педагогічних працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду і мають науковий ступінь та/або вчене звання</p>

        <p><span class="text-danger-800 font-weight-blac">10</span>	Кількість науково-педагогічних працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду і мають науковий ступінь доктора наук та/або вчене звання професора. До числа науково-педагогічних працівників з науковим ступенем враховуються діячі культури і мистецтв, які працюють у закладі вищої освіти за основним місцем роботи, педагогічна діяльність яких відповідно до навчальних планів передбачає індивідуальну роботу з опанування мистецьких вмінь і навичок та безпосередньо впливає на формування професійної майстерності майбутнього митця, які удостоєні почесних звань: "Народний артист України", "Народний художник України", "Народний архітектор України", "Заслужений діяч мистецтв України", "Заслужений артист України", "Заслужений художник України", "Заслужений архітектор України", "Заслужений майстер народної творчості України.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>
@endsection