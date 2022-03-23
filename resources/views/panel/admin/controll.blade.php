@extends('panel.layout.index')
@section('title','Керування сайтом')
@section('page_styles')
@endsection
@section('page_script')
<script>
  $(document).ready(function () {

  });
</script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="col-md-12">
  <div class="row collapse" id="collapse-form">
    <a href="№" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal"><li class="icon-user-plus icon-1x"></li> Додати</a>
  </div>

  <div class="row mb-3">
    <div class="col-12">

    </div>
  </div>
  <div class="row mb-3">
    <div class="col-12">

    </div>
  </div>

</div>

@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/forms/inputs/inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>

<script>
  $(document).ready(function () {

  });
</script>
@endsection