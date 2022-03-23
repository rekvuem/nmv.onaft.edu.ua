@extends('home.layout.index')
@section('title', $SelectPage->title_page)
@section('page_styles')
<style>
  .img-fluid{
    width: 46px;
  }  
  .font{
    font-size: 1.4em;
    font-weight: 600;
  }
</style>
@endsection
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-9 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-12 text-center text-uppercase">
          <h2> @yield('title') </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
      @foreach($UploadFile as $file)

      @if($file->type == 'application/pdf')
      <div class="row">
        <div class="col-12">
          <a href="{{asset('download/'.$file->side.'/'.$file->filename)}}" class="font text-primary-800">
            <img src="{{asset('images/pdf.png')}}" class="img-fluid"> {{$file->title}}
          </a>
        </div>
      </div>

      @endif

      @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection