@extends('conference.layout.index')
@section('title','Схема проїзду')
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
            <div class="col-6">
              <img src="{{asset('images/sxemaproizd.jpg')}}">
            </div>
            <div class="col-6">
                  <div class="text-center">
                    <br>
                    <h3>Транспортне сполучення:</h3>
                    від  залізничного вокзала тролейбус <b>10</b>, <br>
                    маршрутне таксі <b>210</b>, <b>175</b> до зупинки  <br>
                    <b>І станція Великого фонтана</b><br>
                    <br>
                    <h3>Адреса оргкомітету:</h3>
                    Навчальний центр організації<br>
                    освітнього процесу ОНАХТ,<br>
                    каб. А-143, А-145, А-340<br>
                    вул. Канатна, 112 <br>
                    м. Одеса, 65039<br>
                    т. 048-712-40-63<br>
                    т. 048-712-41-94<br>
                    т. 048-712-42-31<br>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection