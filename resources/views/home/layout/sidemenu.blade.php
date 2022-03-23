<div class="sidebar-content sidebar-dark">
  <div class="card rounded-0 bg-teal-600">
    <ul class="nav nav-sidebar" data-nav-type="collapsible">
      <li class="nav-item nav-item-submenu">
        <a href="#" class="nav-link">@lang('home.menu.document')</a>
        <ul class="nav nav-group-sub">
          <li class="nav-item"><a href="{{route('home.docum',['page'=>'faculty'])}}" class="nav-link">- @lang('home.menu.forfacul')</a></li>
          <li class="nav-item"><a href="{{route('home.docum',['page'=>'kafedr'])}}" class="nav-link">- @lang('home.menu.fordepart')</a></li>
          <li class="nav-item"><a href="{{route('home.docum',['page'=>'teacher'])}}" class="nav-link">- @lang('home.menu.forteach')</a></li>
          <li class="nav-item"><a href="{{route('home.docum',['page'=>'student'])}}" class="nav-link">- @lang('home.menu.forstud')</a></li>
        </ul>
      </li>


      <li class="nav-item nav-item-submenu">
        <a href="#" class="nav-link">@lang('home.menu.lisacc')</a>
        <ul class="nav nav-group-sub">
          <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link legitRipple">@lang('home.menu.educprog')</a>
            <ul class="nav nav-group-sub">
              <li class="nav-item"><a href="{{ url('/osvitab') }}" class="nav-link {{ (request()->is('osvitab')) ? 'active' : '' }}">@lang('home.menu.bakalarv')</a></li>
              <li class="nav-item"><a href="{{ url('/osvitam') }}" class="nav-link {{ (request()->is('osvitam')) ? 'active' : '' }}">@lang('home.menu.masters')</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('home.docum',['page'=>'coopagree'])}}"
               class="nav-link {{ (request()->is('coopagree')) ? 'active' : '' }}">@lang('home.menu.coopagree')</a>
          </li>
          <li class="nav-item">
            <a href="{{route('home.docum',['page'=>'vidsamop'])}}"
               class="nav-link {{ (request()->is('vidsamop')) ? 'active' : '' }}">@lang('home.menu.vidom')</a>
          </li>
          <li class="nav-item">
            <a href="{{route('home.docum',['page'=>'pae'])}}"
               class="nav-link {{ (request()->is('pae')) ? 'active' : '' }}">@lang('home.menu.acredit')</a>
          </li>
          <li class="nav-item">
            <a href="{{route('home.docum',['page'=>'reldoc'])}}" 
               class="nav-link {{ (request()->is('reldoc')) ? 'active' : '' }}">@lang('home.menu.suputdoc')</a>
          </li>
          <li class="nav-item">
            <a href="{{route('home.garantop')}}" 
               class="nav-link">@lang('home.menu.garantop')</a>
          </li>
        </ul>
      </li>

      <li class="nav-item nav-item-submenu">
        <a href="#" class="nav-link">Науково-методичне забезпечення</a>
        <ul class="nav nav-group-sub">
          <li class="nav-item"><a class="nav-link" href="{{route('home.open.lecture', ['page'=>'lecture'])}}">проведення відкритих лекцій</a></li>
          <li class="nav-item"><a class="nav-link" href="seminar">програми проведення науково-методичних семінарів на кафедрах</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'pv'])}}">видання навчально-методичної літератури (методичні вказівки)</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'ps'])}}">створення лекцій на електронних і паперових носіях</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'ppiv'])}}">видання підручників і навчальних посібників з грифом академії</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'ppmp'])}}">видання мультимедійних підручників</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'publisheng'])}}">видання англомовної навчально-методичної літератури</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'publishdp'])}}">видання методичних матеріалів до виконання дипломних проектів і магістерських робіт</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('home.plane',['page'=>'publishkr'])}}">видання методичних матеріалів до курсового проектування</a></li>
        </ul>
      </li>

      <li class="nav-item nav-item-submenu">
        <a href="{{ route('home.zop', ['site'=>'complexplane']) }}" class="nav-link">Планування і забезпечення освітнього процесу</a>
        <ul class="nav nav-group-sub">
          <li class="nav-item"><a href="{{ route('home.zop', ['site'=>'rek']) }}" class="nav-link">робота екзаменаційних комісій</a></li>
          <li class="nav-item"><a href="{{ route('home.zop', ['site'=>'bestdp']) }}" class="nav-link">кращі ДП</a></li>
          <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link legitRipple">актуальні теми дипломних проектів та кваліфікаційних робіт</a>
            <ul class="nav nav-group-sub">
              <li class="nav-item"><a href="{{ route('home.actualdp', ['year'=>2019]) }}" class="nav-link">2019 рік</a></li>
              <li class="nav-item"><a href="{{ route('home.actualdp', ['year'=>2020]) }}" class="nav-link">2020 рік</a></li>
              <li class="nav-item"><a href="{{ route('home.actualdp', ['year'=>2021]) }}" class="nav-link">2021 рік</a></li>
            </ul>
          </li>            
          <li class="nav-item"><a href="{{ route('home.zop', ['site'=>'gnp']) }}" class="nav-link">графік навчального процесу</a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="{{route('home.docum',['page'=>'staj'])}}" class="nav-link">
          Підвищення кваліфікації (стажування)
        </a>
      </li>

      <li class="nav-item nav-item-submenu">
        <a href="#" class="nav-link">@lang('home.olimpys')</a>
        <ul class="nav nav-group-sub">
          <li class="nav-item"><a href="{{ route('home.olymp.1etap') }}" class="nav-link">І ЕТАП ВСО НА БАЗІ ОНАХТ</a></li>
          <li class="nav-item"><a href="{{ route('home.olymp.2etap') }}" class="nav-link">ІІ ЕТАП ВСО НА БАЗІ ОНАХТ</a></li>
          <li class="nav-item"><a href="{{ route('home.olymp.invite') }}" class="nav-link">Запрошення на фінал олімпіади</a></li>
          <li class="nav-item"><a href="{{ route('home.olymp.win1') }}" class="nav-link">Переможці Всеукраїнських олімпіад</a></li>
          <li class="nav-item"><a href="{{ route('home.olymp.win2') }}" class="nav-link">Переможці ІІ етапу Всеукраїнських студентських олімпіад</a></li>
          <li class="nav-item"><a href="{{ route('home.olymp.basecollage') }}" class="nav-link">Олімпіади на базі коледжів ОНАХТ</a></li>

        </ul>
      </li>

      <li class="nav-item">
        <a href="{{ route('home.zop', ['site'=>'complexplane']) }}" class="nav-link">
          Комплексний план ОНАХТ
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('home.docum', ['page'=>'rkk']) }}" class="nav-link">Конкурсна комісія</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('home.ukrsert') }}" class="nav-link bg-purple-600">Рівень володіння державною мовою</a>
      </li> 

      <li class="nav-item">
        <a href="{{ route('home.dobro', ['dobro'=>'dobro']) }}" class="nav-link">
          Актуально про доброчесність
        </a>
      </li>
<!--      <li class="nav-item">{{ asset('download/other/olimp_academy.pdf') }}
        <a href="{{ route('home.workers') }}" class="nav-link">
          Співробітники НЦООП
        </a>
      </li>-->
    </ul>
  </div>
</div>