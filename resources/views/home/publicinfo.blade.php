@extends('home.layout.index')
@section('title','Публічна Інформація')
@section('content')
<div class="card card-body rounded-0 border-0 mt-1">
  <div class='row'>
    <div class="col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-10 offset-md-1">
      <div class="btn-group btn-group-justified">
        <a href="https://registry.edbo.gov.ua/university/51/specialities/?q=1" class="btn bg-blue-700">Ліцензований обсяг</a>
        <a href="https://registry.edbo.gov.ua/university/51/educators" class="btn bg-blue-700">Фактична кількість осіб, що навчаються</a>
        <a href="{{route('home.monitoring', ['site'=>'monitoring'])}}" class="btn bg-blue-700">Результати моніторингу якості вищої освіти</a>        
      </div>
    </div>
  </div>

  <div class="row" style="font-size: 1.4em">
    <div class="col-md-10 offset-md-1">
      <div class="sidebar sidebar-light sidebar-component shadow-0 position-static w-100 d-block mb-md-4">
        <div class="sidebar-content position-static">
          <ul class="nav nav-sidebar" data-nav-type="accordion">

            {{-- Ліцензія download/other/reister_edbo.pdf--}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link ">Ліцензія</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{asset('download/other/licence_27052021.pdf')}}" class="nav-link">Відомості щодо права провадження освітньої діяльності у сфері вищої освіти</a></li>
                <li class="nav-item"><a href="https://mon.gov.ua/storage/app/media/05.%2001.%202021/fahova%202021/06/14/Odes.nats.akad.kharch.tekh.02.14.06-04.06.pdf" class="nav-link">Відомості щодо права здійснення освітньої діяльності у сфері фахової передвищої освіти</a></li>
              </ul>
            </li>
            {{-- /Ліцензія --}}

            {{-- Сертифікати --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link ">Сертифікати про акредитацію</a>
              <ul class="nav nav-group-sub">
                <li>
                  <a href="https://onaft.edu.ua/download/pubinfo/certificate/onaft.pdf" 
                     target="_blank" class="nav-link" style="">
                    <i class="icon-certificate icon-2x text-orange-800"></i> Сертифікат ОНАХТ</a>
                </li>

                @foreach($certification_select as $certif)
                <li class="nav-item nav-item-submenu">
                  <a href="#" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$certif->title_main}}</a>
                  <ul class="nav nav-group-sub">
                    @foreach($certif->certif2 as $certif_level_2)
                    <li class="nav-item nav-item-submenu">
                      <a href="#" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$certif_level_2->title_second}}</a>
                      <ul class="nav nav-group-sub">
                        @foreach($certif_level_2->certif3 as $certif_level_3)
                        <li class="nav-item nav-item-submenu">
                          <a href="#" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$certif_level_3->title_third}}</a>
                          <ul class="nav nav-group-sub">
                            @foreach($certif_level_3->certif4 as $certif_level_4)
                            <li class="nav-item ">
                              <a href="{{asset($certif_level_4->filename)}}" class="nav-link">
                               @switch($certif_level_4->nzavo) 
                                  @case(0)
                                    <img src="{{asset('images/pdf.png')}}" class="mr-2" style="height: 24px;">
                                  @break  
                                @case(1)
                                    <img src="{{asset('images/pdf_blue.png')}}" class="mr-2" style="height: 24px;">
                                @break
                                @endswitch
                                
                                {{$certif_level_4->title_four}} 
                                
                               @switch($certif_level_4->nzavo) 
                                  @case(0)
                                    
                                  @break  
                                @case(1)
                                     (акредитовано НАЗЯВО)
                                @break
                                @endswitch
                              
                              </a>
                              @endforeach      
                          </ul>
                        </li>
                        @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </li>
                @endforeach

              </ul>
            </li>
            {{-- /Сертифікати --}}

            {{-- забезпечення 
            <li class="nav-item nav-item-submenu">
              <a href="" class="nav-link ">Навчально-методичне забезпечення</a>
              <ul class="nav nav-group-sub">

                @foreach($PlaneIndex as $plane)
                <li class="nav-item nav-item-submenu">
                  <a href="" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$plane->title}}  </a>
                  <ul class="nav nav-group-sub">
                    @foreach($plane->plane_2 as $plane_level_2)
                    <li class="nav-item nav-item-submenu">
                      <a href="" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$plane_level_2->title_navchane}}</a>
                      <ul class="nav nav-group-sub">
                        @foreach($plane_level_2->plane_3 as $plane_level_3)
                        <li class="nav-item nav-item-submenu">
                          <a href="" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$plane_level_3->title_predmet}}</a>
                          <ul class="nav nav-group-sub">
                            @foreach($plane_level_3->plane_4 as $plane_level_4)
                            <li class="nav-item ">
                              <a href="{{asset('download/plane/'.$plane_level_4->filename)}}" class="nav-link"> 
                                <img src="{{asset('images/pdf.png')}}" class="mr-2" style="height: 24px;">{{$plane_level_4->title_file}}</a>
                              @endforeach      
                          </ul>
                        </li>
                        @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </li>
                @endforeach
              </ul>
            </li>--}}
            {{-- /забезпечення --}}

            {{-- Стандарти --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link ">Стандарти вищої освіти</a>
              <ul class="nav nav-group-sub">
                @foreach($SelectStandart as $standart)
                <li class="nav-item nav-item-submenu">
                  <a href="" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$standart->title}}</a>
                  <ul class="nav nav-group-sub">
                    @foreach($standart->standart_2 as $standart_2)
                    <li class="nav-item nav-item-submenu">
                      <a href="" class="nav-link"><i class="icon-folder5 text-teal-600 icon-2x"></i> {{$standart_2->title_second}}</a>
                      <ul class="nav nav-group-sub">
                        @foreach($standart_2->standart_3 as $standart_3)
                        <li class="nav-item nav-item-submenu">
                          <a href="{{asset($standart_3->filename)}}" class="nav-link"><img src="{{asset('images/pdf.png')}}" class="mr-2" style="height: 24px;"> {{$standart_3->title}}</a>                        </li>
                        @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </li>
                @endforeach
              </ul>
            </li>
            {{-- /Стандарти --}}

            {{-- Результати щорічного оцінювання --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link ">Рейтингування діяльності ОНАХТ</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item">
                  <a href="{{route('home.docum',['page'=>'top100'])}}" class="nav-link">Щорічне оцінювання здобувачів ОНАХТ (ТОП-100)</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('home.docum',['page'=>'cooldp'])}}" class="nav-link">Відзначення кращих дипломних проєктів бакалаврів/кваліфікаційних робіт магістрів</a>
                </li>

                <li class="nav-item">
                  <a href="{{route('home.bestteachears')}}" class="nav-link">Результати конкурсу у номінаціях на звання «Кращий професор академії», «Кращий доцент академії», «Кращий старший викладач, викладач академії», «Кращий асистент академії»</a>
                </li>

                <li class="nav-item">
                  <a href="{{route('home.bestlaboratory')}}" class="nav-link">Результати огляд-конкурс на кращу навчальну лабораторію</a>
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


