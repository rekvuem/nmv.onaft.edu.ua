@extends('home.layout.index')
@section('title','Гаранту ОП')
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
          <div class="form-group">
            <a href="{{asset('download/other/accredit_procedure_in_action.pdf')}}" style="font-size: 1.2em;">Процедура акредитації в діях</a>
          </div>
          <div class="form-group">
            <a href="{{asset('download/other/opp_garant_2021.pdf')}}" style="font-size: 1.2em;">Освітні програми та їх гаранти 2021 рік прийому</a>
          </div>
          <div class="form-group">
            <a href="https://zakononline.com.ua/documents/show/124272___124272" style="font-size: 1.2em;">Щодо рекомендацій з академічної доброчесності для закладів вищої освіти</a>
          </div>
          <div class="form-group">
             <a href="https://naqa.gov.ua/2021/03/%D1%8F%D0%BA-%D0%BF%D0%B8%D1%81%D0%B0%D1%82%D0%B8-%D1%96-%D1%87%D0%B8%D1%82%D0%B0%D1%82%D0%B8-%D0%B7%D0%B2%D1%96%D1%82%D0%B8-%D0%B5%D0%BA%D1%81%D0%BF%D0%B5%D1%80%D1%82%D0%BD%D0%B8%D1%85-%D0%B3%D1%80/" style="font-size: 1.2em;">Як писати і читати звіти експертних груп?</a>
          </div>
          <div class="form-group">
             <a href="https://naqa.gov.ua/2021/03/%D0%BF%D1%80%D0%BE-%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D1%83-%D0%B2%D1%96%D0%B7%D0%B8%D1%82%D1%83/" style="font-size: 1.2em;">Про програму візиту</a>
          </div>
          <div class="form-group">
             <a href="https://naqa.gov.ua/2021/02/%D0%B7%D0%B2%D1%96%D1%82-%D0%B5%D0%BA%D1%81%D0%BF%D0%B5%D1%80%D1%82%D1%96%D0%B2-%D0%B2-%D1%81%D0%B2%D1%96%D1%82%D0%BB%D1%96-%D1%84%D0%B0%D0%BA%D1%82%D1%96%D0%B2-%D1%82%D0%B0-%D0%B4%D0%BE%D0%BA%D0%B0/" style="font-size: 1.2em;">Звіт експертів в світлі фактів та доказів</a>
          </div>
          <div class="form-group">
             <a href="https://naqa.gov.ua/2021/03/%d0%b7%d0%b0%d0%bb%d1%83%d1%87%d0%b5%d0%bd%d0%bd%d1%8f-%d0%b7%d0%b4%d0%be%d0%b1%d1%83%d0%b2%d0%b0%d1%87%d1%96%d0%b2-%d0%be%d1%81%d0%b2%d1%96%d1%82%d0%b8-%d0%b4%d0%be-%d0%bf%d1%80%d0%be%d1%86%d0%b5/" style="font-size: 1.2em;">Залучення здобувачів освіти до процесів забезпечення якості</a>
          </div>
          <div class="form-group">
             <a href="{{asset('download/other/pidgotovka_do_acreditacii_processov.pdf')}}" style="font-size: 1.2em;">Підготовка до акредитаційних процесів</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection