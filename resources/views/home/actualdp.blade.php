@extends('home.layout.index')
@section('title','Актуальні теми дипломних проектів та кваліфікаційних робіт')
@section('page_script')

@endsection
@section('page_style')
<style>
  
</style>
@endsection
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-9 col-md-9">
    <div class="card card-body rounded-0 border-0 mt-1">
      <div class="row">
        <div class="col-md-12 text-center text-uppercase">
          <h2>@yield('title')</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="sidebar sidebar-light sidebar-component shadow-0 w-100 d-block mb-md-4">
            <div class="sidebar-content">
              <ul class="nav nav-sidebar" data-nav-type="accordion">
                @foreach($active_diplomas as $topics)
                <li class="nav-item nav-item-submenu">
                  <a href="#" class="nav-link "> {{$topics->num}} {{$topics->specialization}}</a>
                  <ul class="nav nav-group-sub">
                    @foreach($topics->topicses as $topic)
                    <li class="nav-item"><a href="#" class="nav-link">{{$topic->title}}</a></li>
                    @endforeach
                  </ul>
                </li>
                @endforeach  
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection