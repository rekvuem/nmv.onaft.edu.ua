@extends('home.layout.index')
@section('title','Проекти')
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-12 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <p class="text-center text-uppercase" style="font-size: 22px; font-weight: bolder;">  @yield('title') </p>
        </div>
      </div>
      <div class="row">
          @foreach($projects as $project)
          <div> <a href="{{route('home.showproject', $project->slug)}}" class="nav-item nav-link">{{$project->title}}</a></div>
          @endforeach
      </div>
    </div>
  </div>
</div>

@endsection