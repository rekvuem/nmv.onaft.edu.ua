@extends('panel.layout.index')
@section('title','Редагувати')
@section('page_styles')

@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/lang/summernote-uk-UA.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
  $('.summernote').summernote({
    height: 600
  });
  $('.select2').select2();
});
</script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="row">
  <div class="col-md-12">
    <div class="card rounded-0">
      <form method="POST" action="{{route('spanel.zvit.table4.update',$Table4_edit->id_tablica4)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <select name="zvit_allfk" class="select2" data-fouc>
                @foreach($ListFk as $list)
                <option value="{{$list->id}}" @if($list->id == $Table4_edit->zvit_allfk_id) selected @endif>{{$list->faculty}} / {{$list->kafedra}}</option>
                 @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input name="pib" 
                     class="form-control" 
                     placeholder="ПІБ наукового, науково-педагогічного працівника" 
                     type="text"  value='{{$Table4_edit->pib}}'>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input name="sum_pub_scopus" 
                     class="form-control" 
                     placeholder="Кількість публікацій Scopus" 
                     type="text"  value='{{$Table4_edit->stat_news}}'>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input name="sum_webofscience" 
                     class="form-control" 
                     placeholder="Кількість публікацій Web of Science" 
                     type="text"  value='{{$Table4_edit->sum_publish}}'>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <textarea 
                name="nazva_scopus" 
                placeholder="Назва та реквізити публикацій Scopus (прирівняні відзнаки)" 
                class="form-control summernote"  data-fouc>{!!$Table4_edit->title_rekviz!!}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea 
                name="title_webofscience" 
                placeholder="Назва та реквізити публікацій Web of Science (прирівняні відзнаки)" 
                class="form-control summernote" data-fouc>{!!$Table4_edit->title_nazv_rek!!}</textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <input type="submit" class="btn btn-sm btn-success float-right rounded-0" value="{{__('panel.submit')}}">
          </div>
        </div>
	 		  </form>
    </div>
  </div>
</div>
@endsection