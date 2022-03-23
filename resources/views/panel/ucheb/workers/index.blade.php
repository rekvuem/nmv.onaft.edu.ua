@extends('panel.layout.index')
@section('title','Управління співробітниками відділу')
@section('content')
@section('page_styles')
<style>

</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/bootbox.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
  $('.confirm').on('click', function () {
    var getId= $(this).data('getrowsb');
    
    bootbox.confirm({
      title: 'Вікно для видалення запису!',
      message: 'Ви дійсно хочете видалити запис ?!',
      buttons: {
        confirm: {
          label: 'Так',
          className: 'btn-sm btn-success'
        },
        cancel: {
          label: 'Ні',
          className: 'btn-sm btn-danger'
        }
      },
      callback: function (result) {
        if (result === true)
        {
                $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  method: 'POST',
                  url: "{{ route('spanel.ucheb.workers.delete') }}",
                  data: {
                    _method: "DELETE",
                    id: getId
                  },
                  success: function () {
                    bootbox.alert({
                      title: 'Видалено!',
                      message: 'Цей запис було видалено, відновленню не підлягає.',
                      callback: function () {
                        
                        setTimeout("location.reload(true);", 100);
                      }
                    }).init(function () {
                      $(".bootbox.modal").find(".modal-header").addClass('bg-teal-800');
                      $(".bootbox.modal").find(".modal-body").addClass('bg-teal-700');
                      $(".bootbox.modal").find(".modal-footer").addClass('bg-teal-700');
                      $(".bootbox.modal").find(".btn-primary").removeClass().addClass('btn bg-teal-800');
                    });

                  }
                });
        } else
        {
          setTimeout("location.reload(true);", 100);
        }

      }
    });
  });
});
</script>
@endsection
@include('panel/component/allmessage')

<div class="row"> 

  <div class="col-12 col-md-3">
      <div class="show_ajax_error"></div>
    <div class="card">
      <form action="{{route('spanel.ucheb.workers.add')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }} 

        <input class="form-control" placeholder="почта" type="text" name="email" value="">

        <input class="form-control" placeholder="Прізвище" type="text" name="familia" value="">

        <input class="form-control" placeholder="Ім'я" type="text" name="imya" value="">

        <input class="form-control" placeholder="Побаткові" type="text" name="otchestvo" value="">

        <input class="form-control" placeholder="Відділ" type="text" name="depart" value="">

        <input class="form-control" placeholder="Підрозділ" type="text" name="section" value="">

        <input class="form-control" placeholder="Должність" type="text" name="doljnost" value="">

        <input class="form-control" placeholder="Телефон" type="text" name="telephon" value="">

        <input class="form-control" placeholder="Фото співробітника" type="file" name="foto" value="">

        <div class="form-group">
          <input type="submit" class="btn btn-success rounded-0 float-right" value="Додати">
        </div>
      </form>
    </div>

  </div>

  <div class="col-12 col-md-8">
    <div class="card">
      <table class="table table-columned">
        <thead>
          <tr>
            <th>функ</th>
            <th>ПІБ</th>
            <th>відділ</th>
            <th>підрозділ</th>
            <th>должність</th>
            <th>раб. телефон</th>
          </tr>
        </thead>
        <tbody>
          @foreach($select_workers_information as $worker)
          <tr>
            <td><a href="#" class="confirm" data-getrowsb="{{$worker->id}}">вид.</a> </td>
            <td> {{$worker->familia}}</td>
            <td> {{$worker->department}}</td>
            <td> {{$worker->section}}</td> 
            <td> {{$worker->dolzhnost}}</td> 
            <td> {{$worker->telefon}}</td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> 
</div>
@endsection