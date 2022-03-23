@extends('panel.layout.index')
@section('title','Проекти')
@section('content')
<div class="col-md-12">
  <div class="row mb-3">
    <div class="col-12">
      <div class="card rounded-0">
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>название</th>
              <th>кол-во файлов</th>
              <th>кол-во коментариев</th>
              <th>функц</th>
            </tr>
          </thead>
          <tbody>
          @foreach($projects as $project)   
            <tr>
              <td> {{$project->title}} </td>
              <td> {{$project->SumProjCountFile}}</td>
              <td>{{$project->SumProjCountComment}}</td>
              <td>
                <div class="form-group">
                  <a href="{{route('spanel.ucheb.project.show', $project->id_category)}}" class="btn btn-sm bg-primary">Подробно</a>
                  <a href="{{route('spanel.ucheb.project.deletedProject', $project->id_category)}}" class="btn btn-sm bg-danger">Видалити</a>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>
@endsection
@section('page_styles')
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script>
  $(document).ready(function () {    
  /*начальная инициализация настройки */
  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });
/****************************************************************************************/
  $('.addproject').on('click', function () {
    var editid = $(this).data('edit');
    var edittitle = $(this).data('title');
    var filename = $(this).data('filename');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Додати проект',
      html: '\n\
        <form action="/spanel/ucheb/projectopp/add" method="POST" enctype="multipart/form-data" > \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="POST">\n\
          <input type="hidden" name="filename" value="'+filename+'">\n\
                <div class="form-group">\n\
                  <input type="text" name="projectname" class="form-control" > \n\
                </div>\n\
                <div class="form-group">\n\
                  <input type="file" name="InputFile[]" class="form-control" multiple> \n\
                </div>\n\
                <div class="form-group">\n\
                  <input type="submit" class="btn bg-success-600" onclick="swal.clickConfirm()" value="Додати" > \n\
                  <input type="button" class="btn border-1 btn-outline bg-danger-700 text-danger-700 border-danger-700" onclick="swal.clickCancel()" value="Закрити">\n\
                </div>\n\
        </form>',
      showConfirmButton: false,
      showCancelButton: false,
    }).then((result) => {
      if (result.value) {
        console.log("відрадоговано");
      } else {
        //location.reload();
      }
    });
  });
  });
</script>
@endsection