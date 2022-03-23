@extends('home.layout.index')
@section('title','Освітні програми та перелік освітніх компонентів')
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-12 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row text-center">
        <div class="col-12 col-md-12">
          <p class="text-uppercase" style="font-size: 22px; font-weight: bolder;">  @yield('title') </p>
          <p style="font-size: 1.8em">для ступеня вищої освіти "МАГІСТР"</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
          <p class="text-center" style="font-size: 22px; font-weight: bolder; text-transform: uppercase">ОСВІТНЬО-ПРОФЕСІЙНІ ПРОГРАМИ</p>
          <div class="sidebar sidebar-light sidebar-component shadow-0 position-static w-100 d-block mb-md-4">
            <div class="sidebar-content position-static">
              <ul class="nav nav-sidebar" data-nav-type="accordion">
                @foreach($specialListOpp as $opp)
                <li class="nav-item nav-item-submenu">
                  <a href="#" class="nav-link "> {{$opp->num}} {{$opp->specialization}}</a>
                  <ul class="nav nav-group-sub">
                    @foreach($opp->oppupl as $uploOpp)
                    <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                      <a href="{{asset('opp/'.$uploOpp->filename)}}" class="nav-link">{{$uploOpp->opp}} ({{$uploOpp->year}})</a></li>
                    @endforeach
                  </ul>
                </li>
                @endforeach   
              </ul>
            </div>
          </div>
        </div>
      </div> 

      <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
          <p class="text-center" style="font-size: 22px; font-weight: bolder; text-transform: uppercase">ОСВІТНЬО-НАУКОВІ ПРОГРАМИ</p>
          <div class="sidebar sidebar-light sidebar-component shadow-0 position-static w-100 d-block mb-md-4">
            <div class="sidebar-content position-static">
              <ul class="nav nav-sidebar" data-nav-type="accordion">
                @foreach($specialListOnp as $onp)
                <li class="nav-item nav-item-submenu">
                  <a href="#" class="nav-link "> {{$onp->num}} {{$onp->specialization}}</a>
                  <ul class="nav nav-group-sub">
                    @foreach($onp->oppupl as $uploOnp)
                    <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                      <a href="{{asset('opp/'.$uploOnp->filename)}}" class="nav-link">{{$uploOnp->opp}} ({{$uploOnp->year}})</a></li>
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