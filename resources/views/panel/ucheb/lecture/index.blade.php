@extends('panel.layout.index')
@section('title','План проведення лекцій')
@section('content')
@section('page_styles')
@endsection
@section('page_script')

@endsection
@include('panel/component/allmessage')
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-body">
        {{session()->get('gggg')}}
        <table class="table table-bordered table-striped">
          <thead >
          <th>as</th>
          <th style="text-align: center;">Прізвище, ім`я, по батькові</th>
          <th style="text-align: center;">Кафедра</th>
          <th style="text-align: center;">Дисципліна, тема лекції</th>
          <th style="text-align: center;">Дата</th>
          <th style="text-align: center;">Час</th>
          <th style="text-align: center;">Аудиторія</th>
          <th style="text-align: center;">Напрям підготовки, Спеціальність</th>
          <th style="text-align: center; width: 180px">функції</th>
          </thead>
          <tbody>
            @foreach($lecture as $lecture_select)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$lecture_select->fio}}</td>
              <td>{{$lecture_select->kafedra}}</td>
              <td>{{$lecture_select->tema}}</td>
              <td>{{$lecture_select->plane_start->format('d.m.Y')}}</td>
              <td>{{$lecture_select->hours}}</td>
              <td>{{$lecture_select->room}}</td>
              <td>{{$lecture_select->pidgotodka}}</td>
              <td>
                <div class="btn-group">
                <a href="#" class="btn badge badge-icon bg-brown-600" title="завантажити фото-отчет"><i class="mi-camera"></i></a>
                <a href="#" class="btn badge badge-icon bg-green" title="лекцію проведено"><i class="mi-thumb-up"></i></a>
                <a href="#" class="btn badge badge-icon bg-warning-600" title="лекцію відменено"><i class="mi-thumb-down"></i></a>
                <a href="#" class="btn badge badge-icon bg-teal-700" title="редагувати запис"><i class="mi-mode-edit"></i></a>
                <a href="#" class="btn badge badge-icon bg-danger-700" title="видалити запис"><i class="mi-close"></i></a>
                </div>
              </td>
            </tr> 
            @endforeach

          </tbody>
        </table>
        <div class="card-footer">
          {{$lecture->links("pagination::bootstrap-4")}}
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
