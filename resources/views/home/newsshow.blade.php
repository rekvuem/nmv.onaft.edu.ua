@extends('home.layout.index')
@section('title','Новина')

@section('content')
<div class="card rounded-0 mt-1">
  <div class="card-body">
    @foreach($show as $new)
    
    <div class="row" style="padding-top: 0.5em;">
      <div class="col-12 col-md-10 offset-md-1 text-center ">
        <h2 style="font-weight: 600">
          @if(session('locale')=='uk')
          {{$new->title_news_uk}}
          @else 
          {{$new->title_news_ru}} 
          @endif
        </h2>
      </div>
    </div>
    

    <div class="row">
      <div class="col-12 col-md-10 offset-md-1" >
        @if(session('locale')=='uk')
        {!! $new->discription_uk !!}
        @else 
        {!! $new->discription_ru !!}
        @endif
      </div>
    </div>
    <div class="row">  
      @foreach($new->newsimg as $img)
      @if($img->mime_type == 'image/jpeg')
      <div class="col-md-2">
        <div class="card-img-actions">
          <a href="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}" data-popup="lightbox">
            <img src="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}" class="img-fluid">
            <span class="card-img-actions-overlay card-img-top">
              <i class="icon-plus3 icon-2x"></i>
            </span>
          </a>
        </div>
      </div>
      @elseif($img->mime_type == 'image/png')
      <div class="col-md-2">
        <div class="card-img-actions">
          <a href="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}" data-popup="lightbox">
            <img src="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}" class="img-fluid">
            <span class="card-img-actions-overlay card-img-top">
              <i class="icon-plus3 icon-2x"></i>
            </span>
          </a>
        </div>
      </div>
      @elseif($img->mime_type == 'application/pdf')
      <div class="col-md-2">
        <a href="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}"> <i class="icon-file-pdf"></i></a>
      </div>
      @elseif($img->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
      <div class="col-md-2">
        <a href="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}"> <i class="icon-file-eye2"></i></a>
      </div>
      @endif


      @endforeach
    </div>
    @endforeach
  </div>
</div>
@endsection