@extends('panel.layout.index')
@section('title','Навчально-методичне забезпечення')
@section('content')
@section('page_styles')
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>

<script>
$(document).ready(function () {
  /*инициализация запуска плагина sweet alert*/
  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });
  
    $('.select_silus_update').on('click', function () {
    var fourid = $(this).data('four_id');
    var levtitle= $(this).data('title_text');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Редагувати',
      html: '\n\
        <form action="/spanel/ucheb/plane/plane_upd" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="PATCH">\n\
          <input type="hidden" name="planeid" value="' + fourid + '">\n\
          <input type="hidden" name="form-edit-special" class="form-control">\n\
            <div class="from-group">\n\
              <label>Силабус/Робоча </label>\n\
                <input type="text" name="silabuswork" class="form-control border-blue-800" value="'+levtitle+'">\n\
            </div>\n\
            <div class="from-group">\n\
               <label>Файл </label>\n\
                 <input type="file" name="fileSilabus" class="form-control" value="">\n\
            </div>\n\
            <div class="from-group">\n\
              <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="зберегти">\n\
              <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">відміна</button>\n\
            </div>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        setTimeout('location.reload(true)', 1000);
      } else {
        location.reload();
      }
    });
  });
  $('.add-discipl').click(function () {
    var discipl = $(this).data('dis');
    $('.modal-body').append("<input type='hidden' name='form-disp' class='form-control'>");
    $('.modal-body').append("<input type='hidden' name='rowid' class='form-control' value='" + discipl + "'>");
  });
  $('.add-silus').click(function () {
    var siluswork = $(this).data('sil');
    $('.modal-body').append("<input type='hidden' name='form-silus' class='form-control'>");
    $('.modal-body').append("<input type='hidden' name='silusid' class='form-control' value='" + siluswork + "'>");
  });
  $('.select_silus_update').click(function () {
    var title = $(this).data('title_text');
    var four_id = $(this).data('four_id');
    $('.modal-body').append("<input type='hidden' name='title_id' class='form-control' value='" + four_id + "'>");
    $('.from-group.update_silabus').append("\
    <label>Силабус/Робоча </label>\n\
    <input type='text' name='silabuswork' class='form-control border-teal-800' value='" + title + "'>");
  });


});
</script>
@endsection
@include('panel/component/allmessage')
<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-body">
        <table class="table table-responsive-lg table-bordered">
          @foreach($StandartIndex as $start)
          <tr>
            <td colspan="3" class="font-weight-black" style="padding-left: 0px;">{{$start->title}}</td>
          </tr>
          @foreach($start->plane_2 as $levelsecond)
          <tr>
            <td class="text-blue-800 text-bold">  {{$levelsecond->title_navchane}}</td> 
            <td></td>
            <td>
              <button
                class="btn btn-icon btn-sm bg-blue-700 add-discipl"
                data-toggle="modal" 
                data-dis="{{$levelsecond->id}}"
                data-target="#modal_primary_discipline">
                <i class="icon-pen-plus"></i>
              </button>
            </td>
          </tr>
          @foreach($levelsecond->plane_3 as $levelthird)
          <tr>
            <td class="text-indigo-800" style="margin-right: 35px;">{{$levelthird->title_predmet}}</td> 
            <td></td>
            <td>
              <div class="btn-group">
                <a href="#" class="btn btn-sm btn-icon bg-blue-700 add-silus" 
                   data-toggle="modal" 
                   data-sil="{{$levelthird->id}}"  
                   data-target="#modal_primary_sela"><i class="icon-pen-plus"></i>
                </a>
              </div>
            </td>
          </tr>

          @foreach($levelthird->plane_4 as $levelfour)
          <tr>
            <td class="text-teal-800" id="title_text">{{$levelfour->title_file}} </td> 
            <td 
              class="">{{$levelfour->filename}}</td>
            <td>
              <div class="btn-group">
                <a href="#" class="btn btn-sm btn-icon bg-blue-700 select_silus_update" 
                   data-four_id="{{$levelfour->id}}"
                   data-title_text="{{$levelfour->title_file}}"><i class="icon-pencil6"></i>
                </a>

              </div>
            </td>
          </tr>
          @endforeach
          @endforeach
          @endforeach
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>




<div id="modal_primary_discipline" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{action('UserPanel\Ucheb\PlaneController@store')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-header bg-primary">
          <h6 class="modal-title">Додати навчальну дисципліну</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="from-group">
            <input type="text" name="discipl" class="form-control border-blue-800" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Закрити</button>
          <input type="submit" class="btn bg-primary" value="Додати">
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_primary_sela" class="modal fade" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{action('UserPanel\Ucheb\PlaneController@store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary">
          <h6 class="modal-title">Додати Силабус / Робоча програма</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="from-group">
            <input type="text" name="silabus" class="form-control border-teal-800" value="" required>
          </div>
          <div class="from-group">
            <label>Файл </label>
            <input type="file" name="fileSilabus1" class="form-control" value="" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Закрити</button>
          <input type="submit" class="btn bg-primary" value="Додати">
        </div>
      </form>
    </div>
  </div>
</div>

@endsection