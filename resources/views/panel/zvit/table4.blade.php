@extends('panel.layout.index')
@section('title','Таблиця 4. ')
@section('page_styles')
<style>

</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<!--<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/lang/summernote-uk-UA.js') }}"></script>-->
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function () {
  $('.select2').select2();

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
          url: '/spanel/zvit/table4/' + table,
          data: {
            _method: 'delete',
            tablica4: table
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
            alert('Помилка! Сторінка Таблиця 4');
          }
        });
      } else {
        location.reload();
      }
    });
  });

  $('.datatable-basic').DataTable({
    autoWidth: false,
    stateSave: true,
    dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
    language: {
      responsive: true,
      search: '<span>Фільтр:</span> _INPUT_',
      lengthMenu: '<span>Показати:</span> _MENU_',
      paginate: {'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'}
    },
    buttons: {
      dom: {
        button: {
          className: 'btn btn-light'
        }
      },
      buttons: [
        {extend: 'copy'},
        {extend: 'excel'},
        {extend: 'print'}
      ]
    }
  });
});
</script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form method="POST" action="{{route('spanel.zvit.table4.insert')}}">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <select name="zvit_allfk" class="select2" data-placeholder="Факультет (Інститут) \ Кафедра відділ тощо" data-fouc>
                @foreach($ListFk as $list)
                <option value="{{$list->id}}">{{$list->faculty}} \ {{$list->kafedra}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input name="pib" 
                     class="form-control" 
                     title="ПІБ наукового, науково-педагогічного працівника" 
                     placeholder="ПІБ наукового, науково-педагогічного працівника" 
                     type="text"  value="{{old('pib')}}">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input name="sum_pub_scopus" 
                     class="form-control" 
                     title="Кількість публікацій Scopus"
                     placeholder="Кількість публікацій Scopus" 
                     type="text"  value="{{old('sum_pub_scopus')}}">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input name="sum_webofscience" 
                     class="form-control" 
                     title="Кількість публікацій Web of Science"
                     placeholder="Кількість публікацій Web of Science" 
                     type="text"  value="{{old('sum_webofscience')}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Назва та реквізити публикацій Scopus (прирівняні відзнаки)</label>
              <textarea 
                name="nazva_scopus" 
                placeholder="Назва та реквізити публикацій Scopus (прирівняні відзнаки)" 
                class="form-control "  data-fouc></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Назва та реквізити публікацій Web of Science (прирівняні відзнаки)</label>
              <textarea 
                name="title_webofscience" 
                placeholder="Назва та реквізити публікацій Web of Science (прирівняні відзнаки)" 
                class="form-control " data-fouc></textarea>
            </div>
          </div>
        </div>
	 		    <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="submit" class="btn btn-sm btn-success" value="Додати">
              <a href="" data-toggle="modal" data-target="#help_Modal" class="btn btn-sm btn-default" style="border: 1px solid red;">Швидка допомога</a>
            </div>
          </div>
        </div>
	 		  </form>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card rounded-0">
      <table class="table table-bordered table-hover datatable-basic">
        <thead class="bg-teal-700">
          <tr>
            <th>ред./вид.</th>
            <th>Факультет (Інститут)</th>
            <th>Кафедра, відділ тощо</th>
            <th>Прізвище, ім`я, по батькові наукового, науково-педагогічного працівника<span class="badge bg-danger">14</span></th>
            <th>Кількість публікацій Scopus <span class="badge bg-danger">15</span></th>
            <th width="30%">Назва та реквізити публикацій Scopus (прирівняні відзнаки)</th>
            <th data-toggle="modal" data-target="#help_Modal">Кількість публікацій Web of Science <span class="badge bg-danger">16</span></th>
            <th width="30%">Назва та реквізити публікацій Web of Science (прирівняні відзнаки)</th>
          </tr>
        </thead>
        <tbody>  
          @foreach($Table4 as $table)
          <tr>
            <td>
              <a href="{{route('spanel.zvit.table4.edit', $table->id_tablica4)}}" class="btn-link">ред.</a> 
              <a href="#" class="btn-link delete_table" data-gettable="{{$table->id_tablica4}}">вид.</a>
            </td>
            <td>{{ $table->faculty }}</td>
            <td>{{ $table->kafedra }}</td>
            <td>{{ $table->pib }}</td>
            <td>{{ $table->stat_news }}</td>
            <td>{!! $table->title_rekviz !!}</td>
            <td>{{ $table->sum_publish }}</td>
            <td>{!! $table->title_nazv_rek !!}</td>
          </tr>
          @endforeach
        </tbody>
  		    <tfoot>
          <tr>
            <td colspan="3" style="text-align: right; font-weight: bold">Разом:</td>
            <td>{{$Table4->count('pib')}}</td>
            <td>{{$Table4->sum('stat_news')}}</td>
            <td></td>
            <td>{{$Table4->sum('sum_publish')}}</td>
            <td></td>
          </tr> 
  		    </tfoot>
      </table>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal" id="help_Modal" tabindex="-1" role="dialog" aria-labelledby="help_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><span class="text-danger-800 font-weight-blac">14</span> Прізвище, ім'я, по батькові наукового, науково-педагогічного працівника (який працює у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду), який має не менше п'яти наукових публікацій у періодичних виданнях, які на час публікації було включено до наукометричної бази Scopus або Web of Science</p>

        <p><span class="text-danger-800 font-weight-blac">15</span>	Кількість публікацій у періодичних виданнях, які на час публікації було включено до наукометричної бази Scopus</p>

        <p><span class="text-danger-800 font-weight-blac">16</span>	Кількість публікацій у періодичних виданнях, які на час публікації було включено до наукометричної бази Web of Science
        <div>
          До числа таких публікацій прирівнюються:
        </div>
        дипломи (документи) здобувачів вищої освіти - переможців та призерів (лауреатів) міжнародних культурно-мистецьких проектів, внесених до відповідних міжнародних реєстрів, визнаних Мінкультури (для діячів культури і мистецтв, які працюють у закладі вищої освіти за основним місцем роботи, педагогічна діяльність яких відповідно до навчального плану передбачає індивідуальну роботу з опанування мистецьких вмінь і навичок та безпосередньо впливає на формування професійної майстерності майбутнього митця); призові місця на Олімпійських, Паралімпійських, Дефлімпійських іграх, Всесвітній та Всеукраїнській універсіадах, чемпіонатах світу, Європи, Європейських іграх, етапах Кубків світу та Європи з видів спорту, які визнані центральним органом виконавчої влади, що забезпечує формування державної політики у сфері фізичної культури та спорту (для осіб, які працюють у закладі вищої освіти за основним місцем роботи, педагогічна діяльність яких відповідно до навчального плану передбачає індивідуальну роботу з опанування спортивної майстерності та безпосередньо впливає на формування професійної майстерності спортсмена). Один диплом (документ, призове місце) може бути зарахований одному науково-педагогічному (науковому) працівнику або в рівних частках двом чи трьом працівникам</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>
@endsection