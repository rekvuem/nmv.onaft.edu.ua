@extends('home.layout.index')
@section('title','Всеукраїнські студентські олімпіади')
@section('page_styles')
<style>
  .font_folder{font-size: 1.5em;}
  .font_word{font-size: 1.2em;}
</style>
@endsection
@section('content')
<div class="card card-body rounded-0 border-0 mt-1">
  <div class='row'>
    <div class="col-12 col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-10 offset-md-1">
      @isset($SelectDB->text)
      {!! $SelectDB->text !!}
      @endisset
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-10 offset-md-1">

      <div class="sidebar sidebar-light sidebar-component shadow-0 position-static w-100 d-block mb-md-4">
        <div class="sidebar-content position-static">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link font_folder"><i class="icon-folder5 text-teal-600 icon-2x"></i> Додаток</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item font_word">
                  <a href="{{asset("download/other/dodatok1.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> Додаток №1</a>
                  <a href="{{asset("download/other/dodatok2.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> Додаток №2</a>
                  <a href="{{asset("download/other/dodatok3.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> Додаток №3</a>
                  <a href="{{asset("download/other/dodatok4.doc")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> Додаток №4</a>
                  <a href="{{asset("download/other/dodatok5.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> Додаток №5</a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link font_folder"><i class="icon-folder5 text-teal-600 icon-2x"></i> Накази журі</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item font_word">
                  <a href="{{asset("download/other/nakaz328.01_09.11.2017.doc")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i>
                    Наказ від 09.11.2017р. № 328-01 про затвердження журі та апел. комісії І етапу ВСО 2017-2018 н.р.</a>
                  <a href="{{asset("download/other/nakaz394.01_02.11.2018.doc")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 02.11.2018р. № 394-01 про затвердження журі та апел. комісії І етапу ВСО 2018-2019 н.р.</a>
                  <a href="{{asset("download/other/nakaz379.01_04.11.2019.doc")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 04.11.2019р. № 379-01 Про затвердження журі та апел. комісії І етапу ВСО у 2010-2010 н.р.</a>
                  <a href="{{asset("download/other/nakaz405.01_09.11.2020.doc")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 09.11.2020р. № 405-01 Про затвердження журі та апел. комісії І етапу ВСО у 2020-2021 н.р.</a>
                  <a href="{{asset("download/other/nakaz364.01_08.11.2021.pdf")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 08.11.2021р. № 364-01 про затвердження журі та апел. комісії І етапу ВСО у 2021-2022 н.р.</a> 
                </li> 
              </ul>
            </li>

            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link font_folder"><i class="icon-folder5 text-teal-600 icon-2x"></i> Підсумкові накази</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item font_word">
                  <a href="{{asset("download/other/nakaz71.01_05.03.2018.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 05.03.2018р №71-01 Про підсумки І етапу ВСО у 2017-2018 н.р.</a>        
                  <a href="{{asset("download/other/dodatokdonakaz71.01_05.03.2018.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    додаток до наказу №71-01 Про підсумки І етапу ВСО у 2017-2018 н.р.</a>   

                  <a href="{{asset("download/other/nakaz55.01_04.03.2019.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 04.03.2019р. №55-01 Про підсумки І етапу ВСО у 2018-2019 н.р.</a>
                  <a href="{{asset("download/other/dodatokdonakaz55.01_04.03.2019.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Додаток до Наказу від 04.03.2019р. № 55-01 Про підсумки І етапу ВСО у 2018-2019 н.р.</a>

                  <a href="{{asset("download/other/nakaz450.01_23.12.2019.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 23.12.2019р. №450-01 Про підсумки І етапу ВСО у 2019-2020 н.р.</a>
                  <a href="{{asset("download/other/dod1donakaz450.01_23.12.2019.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Додаток №1 до Наказу від 23.12.2019р. №450-01 Про підсумки І етапу ВСО у 2019-2020 н.р.</a>
                  <a href="{{asset("download/other/dod2donakaz450.01_23.12.2019.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Додаток №2 до Наказу від 23.12.2019р. №450-01 Про підсумки І етапу ВСО у 2019-2020 н.р.</a>

                  <a href="{{asset("download/other/nakaz448.01.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Наказ від 28.12.2020р. №448-01 Про підсумки І етапу ВСО у 2020-2021 н.р.</a>
                  <a href="{{asset("download/other/dod1nakaz448.01.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Додаток №1 до Наказу від 28.12.2020р. №448-01 Про підсумки І етапу ВСО у 2020-2021 н.р.</a>
                  <a href="{{asset("download/other/dod2nakaz448.01.docx")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i> 
                    Додаток №2 до Наказу від 28.12.2020р. №448-01 Про підсумки І етапу ВСО у 2020-2021 н.р.</a>

                  <a href="{{asset("download/other/nakaz032.01_150222.pdf")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i>
                    Наказ від 15.02.2022р. №032-01 Про підсумки І етапу ВСО у 2021-2022 н.р.</a>
                  <a href="{{asset("download/other/dod1donakaz032.01_15.02.22v1.pdf")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i>
                    Додаток №1 до Наказу від 15.02.2022р. №032-01 Про підсумки І етапу ВСО у 2021-2022 н.р.</a>
                  <a href="{{asset("download/other/dod2donakaz032.01_15.02.22.pdf")}}" class="nav-link">
                    <i class="icon-file-text2 text-teal-600 icon-2x"></i>
                    Додаток №2 до Наказу від 15.02.2022р. №032-01 Про підсумки І етапу ВСО у 2021-2022 н.р.</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection