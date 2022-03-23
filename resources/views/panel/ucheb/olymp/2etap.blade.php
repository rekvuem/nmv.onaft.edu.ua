@extends('panel.layout.index')
@section('title','Олімпіада')
@section('content')
@section('page_styles')
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/ckeditor/config_material.js') }}"></script>
<script>
$(document).ready(function () {
  CKEDITOR.replace('editor-full', {
    height: 400
  });
});
</script>
@endsection
@include('panel/component/allmessage')
@include('panel/component/fab')
<div class="row mb-2 " id="collapse-olymp-text">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card rounded-0">
      <div class="card-header">Редагувати текст на сторінкі</div>
      <div class="card-body">
        <form action="{{route('spanel.ucheb.olympic.etap.upd')}}" method="POST">
          {{ csrf_field() }}
          {{method_field('POST')}}
          <input type="hidden" name="page" value="2etap">
          @isset($SelectDB->text)
      
            <textarea id="editor-full" rows="4" cols="4" name="discription" data-fouc>{{$SelectDB->text}}</textarea>
     
          @endisset
          <input type="submit" class="btn btn-success rounded-0" value="зберегти">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-body">

      </div>
    </div>
  </div>
</div>
@endsection