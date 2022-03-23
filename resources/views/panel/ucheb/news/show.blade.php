@extends('panel.layout.index')
@section('title','Новина')
@section('content')
@include('panel/component/allmessage')
<div class="row">
  <div class="col-10 offset-1">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          {{$NewsShow->created_at->format('d.m.Y')}}
        </div>
                <div class="form-group">
          {{$NewsShow->title_slug}}
        </div>
        <div class="form-group">=========================== Украинский ============================</div>
        <div class="form-group">
          <h2> {{$NewsShow->title_news_uk}}</h2>
        </div>
         <div class="form-group ">
           <?= $NewsShow->discription_uk ?>
        </div>
        <div class="form-group">=========================== Русский ============================</div>
        <div class="form-group">
         <h2> {{$NewsShow->title_news_ru}}</h2>
        </div>
        <div class="form-group ">
           <?= $NewsShow->discription_ru ?>
        </div>
        <div class="form-group">
          {{$NewsShow->url_img}}
        </div>
        <div class="form-group">
          @foreach($NewsShow->newsimg as $img)
          <img src="{{asset('news/'.$img->datefolder.'/'.$img->filename)}}" class="img-preview">
          @endforeach
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@section('page_styles')

@endsection

@section('page_script')

@endsection