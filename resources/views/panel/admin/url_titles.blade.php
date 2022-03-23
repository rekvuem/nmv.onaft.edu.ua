@extends('panel.layout.index')
@section('title','Керування сторінками')
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
  <div class="row mb-3">
    <div class="col-12">
      форма для импорта темы дипломных работ
      <form action="{{ route('spanel.admin.inport_data.xls') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <select name="special" >
          @foreach($select_special as $special)
          <option value="{{$special->id_special}}">{{$special->num}} - {{$special->specialization}} ({{$special->show}})</option>
          @endforeach
        </select>

        <input type="text" name="year" value="" placeholder="рік">
        <input type="file" name="uploaded_file" >
        <input type="submit" value="import">
      </form>
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