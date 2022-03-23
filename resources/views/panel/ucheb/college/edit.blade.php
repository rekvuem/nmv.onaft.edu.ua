@extends('panel.layout.index')
@section('title','редагувати файлами конференції')
@section('content')
@section('page_styles')
<style>
  label{
    font-size: 1em;
    font-weight: bold;
  }
</style>
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
  <div class="col-12 col-md-3">
    <div class="card card-body rounded-0">
      <form action="{{route('spanel.ucheb.confer.files.update')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="idfile" value="{{$SelectRowFile->id}}">
        <div class="form-group">
          <label>Вибрати сторінку</label>
          <select name="forpage" class="select2">
            <optgroup label="конференція академії">
              <option value="prog_academy"
                      @if($SelectRowFile->page == "prog_academy") selected @endif>Програма конференції на стадії формування</option>
              <option value="zbirnik_academy"
                      @if($SelectRowFile->page == "zbirnik_academy") selected @endif>Збірник матеріалів конференції</option>
              <option value="archiv"
                      @if($SelectRowFile->page == "archiv") selected @endif>Архів</option>
            </optgroup>
            <optgroup label="конференція коледжей">
              <option value="prog_koledj" @if($SelectRowFile->page == "prog_koledj") selected @endif>Програма конференції на стадії формування</option>
              <option value="zbirnik_koledj" @if($SelectRowFile->page == "zbirnik_koledj") selected @endif>Збірник матеріалів конференції</option>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <label>Назва файлу</label>
          <input type="text" name="first_name_file" class="form-control" autocomplete="off" value="{{$SelectRowFile->name}}">
        </div>
        <div class="form-group">
          <label>Описання файлу</label>
          <input type="text" name="second_name_file" class="form-control" autocomplete="off" value="{{$SelectRowFile->discribtion}}">
        </div>
        <div class="form-group">
          <label>Активування файлу</label>
          <select name="activefile" class="select2">
            <option value="0" @if($SelectRowFile->active == 0) selected @endif>не показувати</option>
            <option value="1" @if($SelectRowFile->active == 1) selected @endif>показати</option>
          </select>
        </div>
        <div class="form-group">
          <label>завантаження нового файлу</label>
          <input type="file" name="InputFile" class="form-control" value="">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success rounded-0" value="{{__('panel.submit')}}">
        </div>
      </form>
    </div>
  </div>
@endsection