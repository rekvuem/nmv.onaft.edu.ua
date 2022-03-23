@extends('home.layout.index')
@section('title','Переможці Всеукраїнських олімпіад')
@section('content')
@section('page_styles')
<style>
  .img-fluid{
    padding-bottom: 2px;
  }  
</style>
@endsection
@php
  $olymp_winners_2019 = asset('/photos/olymp_winner/2019');
  $olymp_winners_2018 = asset('/photos/olymp_winner/2018');
@endphp
<div class="card card-body rounded-0 border-0 mt-1">
  <div class='row'>
    <div class="col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>

  <div class="row">
    <div class="offset-1 col-md-10">
      <div class="row text-center" style="font-size: 24px; font-weight: bolder;">Переможці ІІ етапу Всеукраїнських студентських олімпіад в 2019 році</div>
      <!--  2019  --> 
      <div class="row">
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/1.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/1.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/2.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/2.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/3.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/3.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/4.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/4.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/5.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/5.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/6.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/6.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/7.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/7.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/8.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/8.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/9.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/9.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/10.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/10.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/11.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/11.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/12.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/12.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/13.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/13.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/14.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/14.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/18.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/18.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/15.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/15.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/16.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/16.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2019}}/17.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2019}}/17.jpg" alt=""/>
          </a>
        </div>
      </div>

      <div class="row text-center" style="font-size: 24px; font-weight: bolder;">Переможці ІІ етапу Всеукраїнських студентських олімпіад в 2018 році</div>
      <!--  2018  --> 
      <div class="row">
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/1.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/1.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/2.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/2.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/3.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/3.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/4.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/4.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/5.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/5.jpg" alt=""/>
          </a>
        </div> 
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/6.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/6.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/7.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/7.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/8.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/8.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/9.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/9.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/10.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/10.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/11.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/11.jpg" alt=""/>
          </a>
        </div>
        <div class="col-sm-3">
          <a href="{{$olymp_winners_2018}}/12.jpg" target="_blank" > 
            <img class="img-fluid" src="{{$olymp_winners_2018}}/12.jpg" alt=""/>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endsection