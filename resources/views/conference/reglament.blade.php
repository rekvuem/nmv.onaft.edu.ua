@extends('conference.layout.index')
@section('title','Регламент роботи')
@section('content')
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card rounded-0" style='height: 600px; font-size: 1.25em'>
     <div class="row text-center mt-1">
        <div class="col-md-12 text-center text-uppercase">
          <h2> @yield('title') </h2> 
        </div>
      </div>
      <div class="row mt-3 ">
        <div class="col-md-10 offset-md-1"> 
          <div class="row">
            <div class="col-md-12">
              {!! $selDB->reglament !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection