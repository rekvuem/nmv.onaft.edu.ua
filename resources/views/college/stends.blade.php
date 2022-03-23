@extends('college.layout.index')
@section('title','Стендові доповіді')
@section('page_styles')
@endsection
@section('content')
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card rounded-0" style='height: auto; font-size: 1.25em'>
      <div class="row mt-1">
        <div class="col-md-12 text-center text-uppercase">
          <h2> @yield('title') </h2> 
        </div>
      </div>
      <div class="row mt-3 ">
        <div class="col-12">
          <div class="sidebar sidebar-light sidebar-component shadow-0 position-static w-100 d-block mb-md-4">
            <div class="sidebar-content position-static">
              <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item nav-item-submenu" style="">
                  <a href="#" class="nav-link "> Секція 1. ОРГАНІЗАЦІЯ ОСВІТНЬОГО ПРОЦЕСУ В УМОВАХ ДИСТАНЦІЙНОГО ТА ЗМІШАНОГО НАВЧАННЯ</a>
                  <ul class="nav nav-group-sub">
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_1_kvasnikova.pdf')}}" class="nav-link">1. Кваснікова</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_2_Borodylina.pdf')}}" class="nav-link">2. Бордуліна</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_3_voronkova.pdf')}}" class="nav-link">3. Воронкова</a></li> 
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_4_dilova.pdf')}}" class="nav-link">4. Ділова</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_5_ryaba.pdf')}}" class="nav-link">5. Ряба</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_6_poplinska.pdf')}}" class="nav-link">6. Поплінська</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec1_7_kichuk.pdf')}}" class="nav-link">7. Кічук</a></li>
                  </ul>
                </li>

                <li class="nav-item nav-item-submenu" style="">
                  <a href="#" class="nav-link "> Секція 2. СУЧАСНІ ВИМОГИ ДО ОЦІНЮВАННЯ ЯКОСТІ ОСВІТИ</a>
                  <ul class="nav nav-group-sub">
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec2_1_kabakov.pdf')}}" class="nav-link">1. Кабаков</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec2_2_kovalska.pdf')}}" class="nav-link">2. Ковальська</a></li>     
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec2_3_paniot.pdf')}}" class="nav-link">3. Паніот</a></li>             
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec2_4_pegusova.pdf')}}" class="nav-link">4. Пєгусова</a></li>                    

                  </ul>
                </li>

                <li class="nav-item nav-item-submenu" style="">
                  <a href="#" class="nav-link "> Секція 3. ІННОВАЦІЙНІ МЕТОДИКИ ВИКЛАДАННЯ В ОСВІТНЬОМУ ПРОЦЕСІ</a>
                  <ul class="nav nav-group-sub">
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_1_gavrilyk.pdf')}}" class="nav-link">1. Гаврилюк</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_2_gopalo.pdf')}}" class="nav-link">2. Гопало</a></li>      
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_3_krivchenko.pdf')}}" class="nav-link">3. Кривченко</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_4_boiko.pdf')}}" class="nav-link">4. Бойко</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_5_galinska.pdf')}}" class="nav-link">5. Галинська</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_6_spirjenko.pdf')}}" class="nav-link">6. Спірженко</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_7_kolesnichenko.pdf')}}" class="nav-link">7. Колесниченко</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_8_byrlaka.pdf')}}" class="nav-link">8. Бурлака</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_9_komkova.pdf')}}" class="nav-link">9. Комкова</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_10_devytrova.pdf')}}" class="nav-link">10. Девятьярова</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_11_hil.pdf')}}" class="nav-link">11. Хіль</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_12_myradska.pdf')}}" class="nav-link">12. Муравський</a></li>                    
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec3_13_tkach.pdf')}}" class="nav-link">13. Ткач</a></li>                    
                  </ul>
                </li>

                <li class="nav-item nav-item-submenu" style="">
                  <a href="#" class="nav-link "> Секція 4. КАДРОВА ПОЛІТИКА ФАХОВИХ КОЛЕДЖІВ ШЛЯХИ УДОСКОНАЛЕННЯ ЯКОСТІ ОСВІТИ</a>
                  <ul class="nav nav-group-sub">
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec4_1_trishin.pdf')}}" class="nav-link">1. Трішин</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec4_2_volonska.pdf')}}" class="nav-link">2. Волянська</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec4_3_nichik.pdf')}}" class="nav-link">3. Нічик</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec4_4_ovsova.pdf')}}" class="nav-link">4. Овсова</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec4_5_olhovska.pdf')}}" class="nav-link">5. Ольховська</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec4_6_chornovol.pdf')}}" class="nav-link">6. Чорновол</a></li>
                  </ul>
                </li>

                <li class="nav-item nav-item-submenu" style="">
                  <a href="#" class="nav-link "> Секція 5. СУЧАСНА ПРОФОРІЄНТАЦІЙНА РОБОТА РЕАЛІЇ ТА ШЛЯХИ ПОКРАЩЕННЯ</a>
                  <ul class="nav nav-group-sub">
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec5_1_trubnikova.pdf')}}" class="nav-link">1. Трубнікова</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec5_2_bocylyak.pdf')}}" class="nav-link">2. Боцуляк</a></li>
                    <li class="nav-item" >
                      <a href="{{asset('download/confer/college/sec5_3_kuznecova.pdf')}}" class="nav-link">3. Кузнецова</a></li>
                  </ul>
                </li>
              </ul>      
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection