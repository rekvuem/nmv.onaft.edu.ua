@extends('home.layout.index')
@section('title','Про нас')
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-9 col-md-9">
    <div class="card card-body rounded-0 border-0 text-font">
      <p class="indent">Навчальний центр організації освітнього процесу є самостійним підрозділом ОНАХТ та безпосередньо підпорядковується проректору з науково-педагогічної та навчальної роботи. До складу Навчального центру організації освітнього процесу входять Навчальний відділ та Відділ ліцензування, акредитації та сертифікації. </p>

      <p class="indent"><a href="https://www.onaft.edu.ua/download/pubinfo/Regulations-on-the-Training-Department-of-the-Training-Center-for-the-organization-of-the-educational-process.pdf">ПОЛОЖЕННЯ ПРО НАВЧАЛЬНИЙ ВІДДІЛ НАВЧАЛЬНОГО ЦЕНТРУ ОРГАНІЗАЦІЇ ОСВІТНЬОГО ПРОЦЕСУ</a> </p>

      <p class="indent"><a href="https://www.onaft.edu.ua/download/pubinfo/Regulations-department-of-licensing.pdf">ПОЛОЖЕННЯ ПРО ВІДДІЛ ЛІЦЕНЗУВАННЯ, АКРЕДИТАЦІЇ ТА СЕРТИФІКАЦІЇ НАВЧАЛЬНОГО ЦЕНТРУ ОРГАНІЗАЦІЇ ОСВІТНЬОГО ПРОЦЕСУ</a> </p>   

      <p class="indent"><a href="http://nmv.onaft.edu.ua/download/other/plane_work_nv_2012.pdf">План роботи Навчально-методичного відділу НЦООП</a></p>     
      
      <p class="indent"><a href="http://nmv.onaft.edu.ua/download/other/plane_work_las_2021.pdf">План роботи відділу ЛАтаС НЦООП</a></p>
    </div>
  </div>
  </div>
@endsection
@section('page_styles')
<style>
  .text-font{
    font-size: 1.2em;
  }
  .indent{
    text-indent: 20px;
    text-align: justify;
  }

</style>
@endsection