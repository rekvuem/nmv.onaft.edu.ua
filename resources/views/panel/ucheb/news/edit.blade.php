@extends('panel.layout.index')
@section('title','Редагувати новину')
@section('page_styles')

@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/lang/summernote-uk-UA.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<script>
$(document).ready(function () {
  $('.summernote').summernote();

  $('.img-preview').click(function () {
    var img = $(this).data('delete');
    var swalInit = swal.mixin({
      buttonsStyling: false,
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-light'
    });
    swalInit.fire({
      title: 'Ви впевнені? ',
      text: 'Ви зараз видалити це зображення',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Так, видалити!',
      cancelButtonText: 'відміна',
      preConfirm: function(){
        alert('asdfasdf');
      }
    });
  });
 
});


</script>
@endsection
@section('content')
@include('panel/component/allmessage')
@include('panel/component/fab')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('spanel.ucheb.news.update', $NewsShow->id)}}" method="POST">
          {{ csrf_field() }}
          {{method_field('PATCH')}}
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Назва новини</label>
                <input class="form-control" type="text" name="title_news_uk" placeholder="uk" value="{{$NewsShow->title_news_uk}}">
                <input class="form-control" type="text" name="title_news_ru" placeholder="ru" value="{{$NewsShow->title_news_ru}}">
                <input class="form-control" type="text" name="title_slug" value="{{$NewsShow->title_slug}}">
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <label>укр</label>
            <textarea class="summernote" name="discription_uk" placeholder="uk" data-fouc>
              {!!$NewsShow->discription_uk!!}
            </textarea>
          </div>
          
          <div class="form-group">
            <label>рус</label>
            <textarea class="summernote" name="discription_ru" placeholder="ru" >
              {!!$NewsShow->discription_ru!!}
            </textarea>
          </div>
          
          <div class="form-group">
            @foreach($NewsShow->newsimg as $img)
            <img data-delete="{{$img->id}}" src="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}" class="img-preview">
            @endforeach
          </div>
          
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="{{__('panel.submit')}}">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection