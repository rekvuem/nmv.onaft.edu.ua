@extends('panel.layout.index')
@section('title','Завантажити файл')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <form action="{{route('spanel.admin.upload.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}   
        {{ method_field('POST') }}
        <div class="card-header"><h4>Завантаження файла по сторінкам</h4></div>
        <div class="card-body">
          <div class="row">
            <select class="form-control" name="selectPage">
              <option></option>
            </select>
          </div>
          <div class="row">
            <input type="file" class="form-control" name="InputFile[]" multiple />
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-success float-right p-1 mb-2" value="Завантажити">
        </div>


      </form>
    </div>
  </div> 
</div>
<div class="row">
  <div class="col-md-12">
    @foreach($files as $DirectoryFiles)
    <img src="http://mv.new.local/{{$DirectoryFiles}}" height="200px">
    @endforeach
  </div>
</div>
@endsection

@section('page_script')

@endsection