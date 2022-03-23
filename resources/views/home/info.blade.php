@extends('home.layout.index')
      @if(request()->get('page') == 'plane_lats')
@section('title','План роботи відділу ЛАтаС')
@else
@section('title','Інформаційне забезпечення')
@endif
@section('page_styles')
<style>
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
      @if(request()->get('page') == 'plane_lats')
      <div class="row">
        <div class="col-12">
          <a class="text-primary-800 text-font" href="{{asset('download/other/plane_work_las_2021.pdf')}}">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/pdf.png')}}">
              </div>
              <div class="">
                <div class="title">План роботи відділу ЛАтаС НЦ ООП</div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-12">
          @forelse($FileShow as $file)
          <a class="text-primary-800 text-font" href="{{asset('download/'.$file->side.'/'.$file->filename)}}">
            <div class="d-flex flex-row">
              <div class="">
                @if($file->type=='application/pdf')
                <img src="{{asset('images/pdf.png')}}">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
                <img src="{{asset('images/pptx_icon.png')}}">
                @endif
              </div>
              <div class="">
                <div class="title">{{$file->title}}</div>
              </div>
            </div>
          </a>
          @empty
          Найближчим часом
          @endforelse
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection
@section('page_script')

@endsection