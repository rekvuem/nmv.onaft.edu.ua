@extends('college.layout.index')
@section('title','Програма конференції')

@section('content')
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card rounded-0" style='height: 600px;'>
      <div class="row mt-1">
        <div class="col-md-12 text-center text-uppercase">
          <h2> @yield('title') </h2>
        </div>
      </div>
      <div class="row mt-3 ">
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-md-12">
              @forelse($selectBaseConference as $files)
              <a href="{{asset('download/confer/'.$files->file)}}">
                <div class="blocks">
                  <div class="block-img-left">
                    @if($files->type=='application/pdf')
                      <img src="{{asset('images/pdf.png')}}">
                      @endif
                  </div>
                  <div class="block-title">
                    <div class="title">{{$files->name}}</div>
                    <div class="discript">{{$files->discribtion}}</div>
                  </div>

                  <div class="block-img-right">
                    <img src="{{asset('images/download-icon.png')}}" >
                  </div>
                </div>
              </a>
              @empty
                Найближчим часом
              @endforelse
            </div>
          </div>
          
          
          <div class="row mt-3">
            <div class="col-10 offset-1">
              <div class="text-uppercase text-center"><h2>регламент роботи</h2></div>
            </div>
          </div>       
          <div class="row">
            <div class="col-10 offset-1">
              <div class="">{!! $selDB->reglament !!}</div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection