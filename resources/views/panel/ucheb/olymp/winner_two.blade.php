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
<div class="row mb-2 ">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card rounded-0">
      <div class="card-header">Переможці ІІ Всеукраїнських олімпіад</div>
      <div class="card-body">

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