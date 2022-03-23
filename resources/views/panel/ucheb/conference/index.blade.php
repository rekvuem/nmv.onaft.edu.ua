@extends('panel.layout.index')
@section('title','Конференція')
@section('page_styles')
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/summernote.min.js') }}" defer></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/lang/summernote-uk-UA.js') }}"></script>
<script>
$(document).ready(function () {
  $('.summernote').summernote({
    height: 268
  });
    $('.summernote_right').summernote({
    height: 362
  });
});
</script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="row">
  <div class="col-md-12">
    <div class="card rounded-0">
      <form action="{{route('spanel.ucheb.confer.update')}}" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <input type="hidden" name="textid" value="{{$selDB->id}}">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" autocomplete="off" name="conf_title" class="form-control" value="{{$selDB->title}}">
            </div>
            <div class="form-group">
              <input type="text" autocomplete="off" name="conf_title_short" class="form-control" value="{{$selDB->title_short}}">
            </div>
            <div class="form-group">
              <input type="text" autocomplete="off" name="conf_title_long" class="form-control" value="{{$selDB->title_conference}}">
            </div>
            <div class="form-group">
              <input type="text" autocomplete="off" name="conf_date" class="form-control" value="{{$selDB->date_conference}}">
            </div>
            <div class="form-group">
              <textarea class="summernote_right" name="priority_work_conference" data-fouc>{{$selDB->priority_work_conference}}</textarea>
            </div>
            <div class="form-group">
              <textarea class="summernote_right" name="work_conference">{{$selDB->work_conference}}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea class="summernote" name="requirements">{{$selDB->requirements}}</textarea>
            </div>
            <div class="form-group">
              <textarea class="summernote" name="comitet">{{$selDB->comitet}}</textarea>
            </div>
            <div class="form-group">
              <textarea class="summernote" name="reglament">{{$selDB->reglament}}</textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-sm bg-success-800 float-right" value="{{__('panel.submit')}}">
            </div>
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>
@endsection