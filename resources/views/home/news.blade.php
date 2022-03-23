@extends('home.layout.index')
@section('title','Новини')
@section('page_styles')
<style>
  .card-img-actions-overlay{
    z-index: 10;
  }
  .news_title{
    font-size: 1.5em;
    font-weight: 600;
    text-align: justify;
    padding-right: 2em;
    padding-top: 1em;
  }
</style>
@endsection
@section('content')
<div class="col-12">
  <div class="row mt-1">
    @forelse($ListNews as $List)
    <div class="col-12 col-md-12">
      <div class="card card-img-actions">
        <div class="row">
          <div class="card-img-actions-overlay card-img-top">
            <a href="{{route('home.newslist.show', $List->title_slug)}}" 
               class="btn btn-outline bg-white text-white border-white border-2" data-popup="lightbox">
              {{__('home.detail')}}
            </a>
          </div>

          <div class="col-3">
            <img class="card-img-top img-fluid" height="100px"
                 src="{{asset('news/'.$List->newsimg->first()->datefolder.'/'.$List->newsimg->first()->filename)}}" alt="">
          </div>
          <div class="col-9">
            <div class="news_title">
              @if(session('locale')=='ru')
              {{$List->title_news_ru}}
              @else 
              {{$List->title_news_uk}} 
              @endif
            </div> 
          </div>
        </div>
      </div>
    </div>
    @empty
    <p style="font-size: 1.8em; font-weight: bolder">{{__('home.wait.news')}}</p>
    @endforelse

  </div>
  <div class="text-center">{{$ListNews->links()}}</div>
</div>
@endsection