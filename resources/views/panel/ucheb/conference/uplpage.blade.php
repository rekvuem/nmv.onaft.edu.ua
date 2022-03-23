@extends('panel.layout.index')
@section('title','Керування файлами конференції')
@section('content')
@section('page_styles')
@endsection
@section('page_script')
<script defer src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
  $('.select2').select2({
    minimumResultsForSearch: Infinity,
    placeholder: 'Виберить сторінку для завантаження файлу'
  });
});
</script>
@endsection
@include('panel/component/allmessage')
<div class="row">
  <div class="col-12 col-md-3">
    <div class="card card-body rounded-0">
      <form action="{{route('spanel.ucheb.confer.filosupload')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <select name="forpage" class="select2">
            <optgroup label="конференція академії">
              <option value="prog_academy">Програма конференції на стадії формування</option>
              <option value="zbirnik_academy">Збірник матеріалів конференції</option>
              <option value="certificat">Сертифікати учасників</option>
              <option value="archiv">Архів</option>
            </optgroup>
            <optgroup label="конференція коледжей">
              <option value="prog_koledj">Програма конференції на стадії формування</option>
              <option value="zbirnik_koledj">Збірник матеріалів конференції</option>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <input type="text" name="first_name_file" class="form-control" autocomplete="off" placeholder="Назва файлу" value="">
        </div>
        <div class="form-group">
          <input type="text" name="second_name_file" class="form-control" autocomplete="off" placeholder="Описання файлу" value="">
        </div>
        <div class="form-group">
          <input type="file" name="InputFile" class="form-control" value="">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success rounded-0" value="{{__('panel.upload')}}">
        </div>
      </form>
    </div>
  </div>
  
<div class="col-12 col-md-9">
    <div class="card card-body rounded-0">
      <table class="table table-responsive-lg table-bordered table-border-solid">
        <thead>
          <tr>
            <th>функ.</th>
            <th>Сторінка конференції</th>
            <th>Назва</th>
            <th>Описання файлу</th>
            <th>Назва</th>
            <th>Статус відображення</th>
          </tr>
        </thead>
        <tbody>
          @foreach($uploadFile as $File)
          <tr>
            <td>
              <div class="btn-group">
                <a href="{{route('spanel.ucheb.confer.edit', $File->id)}}" class="btn btn-sm bg-blue-700">{{__('panel.abb.edit')}}</a>
                <form action="{{route('spanel.ucheb.confer.files.destroy', $File->id)}}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="page" value="{{$File->page}}">
                  <input type="submit" class="btn btn-sm bg-warning-700" value="{{__('panel.abb.delete')}}">
                </form>
              </div>
            </td> 
            <td>
              @switch($File->page) 
                @case('prog_academy') 
                  Програма конференції на стадії формування
                @break 
                @case('zbirnik_academy') 
                  Збірник матеріалів конференції
                @break 
                @case('archiv') 
                  Архів
                @break 
                @case('prog_koledj') 
                  Програма конференції (коледж)  
                @break 
                @case('zbirnik_koledj') 
                  Збірник матеріалів конференції (коледж)
                @break 
                @case('certificat') 
                  Сертифікати учасників
                @break 
              @endswitch
            </td> 
            <td> {{$File->name}} </td> 
            <td> {{$File->discribtion}} </td> 
            <td> {{$File->file}} </td> 
            <td> @switch($File->active) @case(0) не показувати @break @case(1) показати @break @endswitch</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $uploadFile->links() }}
  </div>
</div>
@endsection