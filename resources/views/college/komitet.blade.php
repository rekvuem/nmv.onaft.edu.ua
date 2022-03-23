@extends('college.layout.index')
@section('title','Склад Оргкомітету конференції')
@section('page_styles')
<style>
  .headtitle{
    font-size: 1.8em;
    font-weight: bold;
    text-transform: uppercase;
  }
  .orgkom{background:#F1F1F1; }
  .orgkom1{background:#E5E5E3;}
  .title_wapka{font-size: 16px; font-weight: bold; text-align: center; background-color: #00897b; color: white}
</style>
@endsection
@section('content')
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card rounded-0">
      <div class="row mt-1">
        <div class="col-md-12 text-center text-uppercase">
          <h2> @yield('title') </h2> 
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-10 offset-md-1"> 
          <div class="row">
            <div class="col-md-12">
              {!! $selDB->comitet !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection