@extends('college.layout.index')
@section('title','Збірник матеріалів конференції')
@section('page_styles')
@endsection
@section('content')
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card rounded-0" style='height: 600px; font-size: 1.25em'>
     <div class="row mt-1">
        <div class="col-md-12 text-center text-uppercase">
          <h2> @yield('title') </h2> 
        </div>
      </div>
      <div class="row mt-3 ">
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-md-12">
              @forelse($selectTezicConference as $files)
              <a href="{{asset('download/confer/'.$files->file)}}">
                <div class="d-flex flex-row">
                  <div class="">
                    @if($files->type=='application/pdf')
                      <img src="{{asset('images/pdf.png')}}">
                      @endif
                  </div>
                  <div class="">
                    <div class="title">{{$files->name}}</div>
                    <div class="discript">{{$files->discribtion}}</div>
                  </div>

                  <div class="ml-auto">
                    <img src="{{asset('images/download-icon.png')}}" >
                  </div>
                </div>
              </a>        
              @empty
                Найближчим часом
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection