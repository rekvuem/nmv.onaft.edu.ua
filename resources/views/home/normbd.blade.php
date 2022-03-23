@extends('home.layout.index')
@section('title','Нормативна база')
@section('page_styles')
<style>
  .text-font{
    font-size: 1.4em;
    font-weight: 600;
  }
</style>
@endsection
@section('content')
<div class="card card-body rounded-0 border-0 mt-1">
  <div class="row">
    <div class="col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>

  <div class="row">
    @foreach($FileShow as $file)
    <div class="col-10 offset-md-1">
      @if($file->type == 'application/pdf')
      <a class="text-primary-800 text-font" href="{{asset('download/'.$file->side.'/'.$file->filename)}}"><img src="{{asset('images/pdf.png')}}" class="img-fluid" width="46px">{{$file->title}}</a>
      @endif
    </div>
    @endforeach
  </div>
</div>
@endsection