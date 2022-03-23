@extends('home.layout.index')
@section('title','Співробітники')
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-12">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-12 text-center text-uppercase">
          <h2> @yield('title') </h2>
        </div>
      </div>
      @foreach($Workers_by_group as $workers)
      <div class="row ">
        
        <div class="col-xl-2 col-sm-4">
          <div class="card bg-slate-600" style="background-image: url(framecss/global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
            <div class="card-body text-center">
              <div class="card-img-actions d-inline-block mb-3">
                <img class="img-fluid rounded-circle" src="framecss/global_assets/images/placeholders/placeholder.jpg" width="130" height="130" alt="">
              </div>

              <h6 class="font-weight-semibold mb-0">{{ $workers->imya }} {{ $workers->familia }}</h6>
              <span class="d-block opacity-75">{{ $workers->dolzhnost }}</span>

            </div>
          </div>
        </div>
      </div>  
        @endforeach
      
        
        @foreach($Select_group_com as $worker)
        <div class="row">
        <div class="col-xl-2 col-sm-4">
          <div class="card bg-slate-600" style="background-image: url(framecss/global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
            <div class="card-body text-center">
              <div class="card-img-actions d-inline-block mb-3">
                <img class="img-fluid rounded-circle" src="framecss/global_assets/images/placeholders/placeholder.jpg" width="130" height="130" alt="">
              </div>

              <h6 class="font-weight-semibold mb-0">{{ $worker->imya }} {{ $worker->familia }}</h6>
              <span class="d-block opacity-75">{{ $worker->dolzhnost }}</span>

            </div>
          </div>
        </div>
         </div>   
        @endforeach
        
    
    </div>
  </div>
</div>
@endsection