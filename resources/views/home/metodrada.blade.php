@extends('home.layout.index')
@section('title','Методична рада')
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
      <div class="row">
        
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://www.onaft.edu.ua/download/pubinfo/Regulations_Methodological_Council.pdf">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/pdf.png')}}">
              </div>
              <div class="">
                <div class="title">Положення про методичну раду академії</div>
              </div>
            </div>
          </a>
        </div> 
        
        <div class="col-12">
          <a class="text-primary-800 text-font" href="{{asset('download/other/metod_rada_14201_18052021.pdf')}}">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/pdf.png')}}">
              </div>
              <div class="">
                <div class="title">Про затвердження складу методичної ради та рад спеціальностей академії
                </div>
              </div>
            </div>
          </a>
        </div>   
        
        <div class="col-12">
          <a class="text-primary-800 text-font" href="{{asset('download/other/medotrade_180521_14201.pdf')}}">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/pdf.png')}}">
              </div>
              <div class="">
                <div class="title">Зміни до наказу № 142-01 від 18.05.2021р. "Про затвердження складу методичної ради та рад спеціальностей"
                </div>
              </div>
            </div>
          </a>
        </div>
        
        <div class="col-12">
          <a class="text-primary-800 text-font" href="{{asset('download/other/medotrade_180621_18201.pdf')}}">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/pdf.png')}}">
              </div>
              <div class="">
                <div class="title">Зміни до наказу № 142-01 від 18.05.2021р. "Про затвердження складу методичної ради та рад спеціальностей"
                </div>
              </div>
            </div>
          </a>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection