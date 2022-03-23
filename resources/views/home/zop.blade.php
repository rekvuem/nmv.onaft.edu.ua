@extends('home.layout.index')
@section('title', $SelectPage->title_page)
@section('page_styles')
<style>
  .img-fluid{
    width: 46px;
  }  
  .text-font{
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

        <div class="col-12">
          <a class="text-primary-800 text-font" href="{{asset('download/'.$file->side.'/'.$file->filename)}}">
            <div class="d-flex flex-row">
              <div class="">
                @if($file->type=='application/pdf')
                <img src="{{asset('images/pdf.png')}}">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
                <img src="{{asset('images/pptx_icon.png')}}" class="img-fluid">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' or $file->type =='application/msword')
                <img src="{{asset('images/word-icon.png')}}" class="img-fluid">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                <img src="{{asset('images/xls.png')}}" class="img-fluid">
                @endif
              </div>
              <div class="">
                <div class="title">{{$file->title}}</div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection