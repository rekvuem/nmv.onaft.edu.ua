<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">
  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
				</a>
  </div>
  {{-- /sidebar mobile toggler --}}
  <div class="sidebar-content">
				{{-- пользовательское меню --}}
				<div class="sidebar-user-material">
      <div class="sidebar-user-material-body">
        <div class="card-body text-center">

          <h6 class="mb-0 text-white text-shadow-dark">{{Cookie::get('userShortPIB')}}</h6>
          <span class="font-size-sm text-white text-shadow-dark"></span>
        </div>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>

        <div class="sidebar-user-material-footer">
          <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Мій кабінет</span></a>
        </div>
      </div>
      <div class="collapse" id="user-nav">
        <ul class="nav nav-sidebar">
          <li class="nav-item">
            <a href="{{route('spanel.setting')}}" class="nav-link">
              <i class="icon-user-plus"></i>
              <span>Налаштування</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="icon-exit3"></i>
              <span> 
                {{ __('Вихід') }}
              </span>
            </a>
          </li>
        </ul>
      </div>
				</div>
				{{-- /пользовательское меню --}}
				{{-- главная навигация --}}
				<div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar" data-nav-type="accordion">
        {{-- Загальна меню для всіх користувачів --}}
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Загальне меню</div> 
          <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('home.index')}}" class="nav-link ">
            <i class="mi-backspace"></i>
            <span>
              Головна
              <span class="d-block font-weight-normal opacity-50"><small>сторінка сайту</small></span>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.dashboard')}}" class="nav-link {{ (request()->is('spanel')) ? 'active' : '' }}">
            <i class="icon-home4"></i>
            <span>
              Головна
              <span class="d-block font-weight-normal opacity-50"><small>швидка інформація</small></span>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('https://www.rozklad.onaft.edu.ua/spr/')}}" target="_blank" class="nav-link">
            <i class="icon-address-book3"></i><span>Телефонний довідник</span>
          </a>
        </li>

        @if(Gate::check('depart-ucheb'))
          <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs">співробітники</div>
            <i class="icon-menu" title="Layout options"></i>
          </li>
          <li class="nav-item">
            <a href="{{ route('spanel.report.dashboard') }}" class="nav-link">
              <i class="mi-assignment-turned-in"></i><span>Подати звітность</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('spanel.report.myreports') }}" class="nav-link">
              <i class="mi-aspect-ratio"></i><span>Переглянути звітність</span>
            </a>
          </li>
          @can('posit-chief')
            <li class="nav-item">
              <a href="{{ route('spanel.report.allreports') }}" class="nav-link">
                <i class="mi-event-note"></i><span>Всі звітності (для начальника)</span>
              </a>
            </li>
          @endcan
        @endif

        {{-- /кінець --}}
        @if(Gate::check('posit-admin-role'))
        {{-- Панель управління навчальним розділом --}}
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Навчальний центр</div> 
          <i class="icon-menu" title="Layout options"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.news.index')}}" class="nav-link">
            <i class="icon-stack-plus"></i><span>Новини</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.workers.index')}}" class="nav-link">
            <i class="icon-stack-plus"></i><span>Співробітники</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.siteupload.index')}}" class="nav-link">
            <i class="icon-upload"></i><span>Завантаження файлів для сторінок</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.certification.index')}}" class="nav-link">
            <i class="icon-certificate"></i><span>Сертифікати про акредитацію</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.plane.index')}}" class="nav-link "><i class="icon-copy"></i> <span>Навчально-методичне забезпечення</span></a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.opp.index')}}" class="nav-link "><i class="icon-copy"></i> <span>ОПП / ОНП</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('spanel.ucheb.project.list') }}" class="nav-link ">
            <i class="icon-design"></i>
            <span>Проекти ОПП / ОНП (отложен)</span></a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.ucheb.standart.index')}}" class="nav-link">
            <i class="icon-puzzle2"></i><span>Стандарти вищої освіти</span>
          </a>
        </li>
        <li class="nav-item nav-item-submenu ">
          <a href="{{route('spanel.ucheb.lecture.index')}}" class="nav-link {{ (request()->is('spanel/ucheb/lecture')) ? 'active' : '' }}"><i class="icon-clipboard2"></i> <span>План відкритих лекцій</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item"><a href="{{route('spanel.ucheb.lecture.index')}}" class="nav-link {{ (request()->is('spanel/ucheb/lecture')) ? 'active' : '' }}">викладачі ОНАХТ</a></li>
            <li class="nav-item"><a href="№" class="nav-link">фахівцями промислових підприємств</a></li>
          </ul>
        </li>
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-briefcase"></i> <span>Конференції</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Конференції">
            <li class="nav-item"><a href="{{route('spanel.ucheb.confer.index')}}" class="nav-link">Сторінка інститута</a></li>
            <li class="nav-item"><a href="{{route('spanel.ucheb.college.index')}}" class="nav-link">Сторінка колледжу</a></li>
            <li class="nav-item"><a href="{{route('spanel.ucheb.confer.uplpage')}}" class="nav-link">Завантажити</a></li>
          </ul>
        </li>
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-yin-yang"></i> <span>Олімпіада</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Олімпіада">
            <li class="nav-item"><a href="{{route('spanel.ucheb.olympic.1etap')}}" class="nav-link">Перший етап</a></li>
            <li class="nav-item"><a href="{{route('spanel.ucheb.olympic.2etap')}}" class="nav-link">Другий етап</a></li>
            <li class="nav-item"><a href="{{route('spanel.ucheb.olympic.win1')}}" class="nav-link">Переможці Всеукраїнських олімпіад</a></li>
            <li class="nav-item"><a href="{{route('spanel.ucheb.olympic.win2')}}" class="nav-link">Переможці ІІ етапу Всеукраїнських студентських олімпіад</a></li> 
          </ul>
        </li>
        @endif
        {{-- /кінець --}}
        @can('depart-zvit-role')
        {{-- Панель управління розділом Звітом --}}
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Звіт меню</div> <i class="icon-menu" title="Layout options"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.zvit.index')}}" class="nav-link {{ (request()->is('spanel/zvit/zvit')) ? 'active' : '' }}">
            <i class="icon-flag4"></i><span>Рік налуштування</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('spanel.zvit.list.fslist')}}" class="nav-link {{ (request()->is('spanel/zvit/fslist')) ? 'active' : '' }}">
            <i class="icon-price-tag2"></i><span>Спец. / Факультет(каф)</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/spanel/zvit/table1')}}" 
             class="nav-link {{ (request()->is('spanel/zvit/table1')) ? 'active' : '' }}">
            <i class="icon-grid7"></i><span>Таблиця 1</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/spanel/zvit/table2')}}" 
             class="nav-link {{ (request()->is('spanel/zvit/table2')) ? 'active' : '' }}">
            <i class="icon-grid7"></i><span>Таблиця 2</span></a>
        </li>
        <li class="nav-item">
          <a href="{{url('/spanel/zvit/table3')}}" 
             class="nav-link {{ (request()->is('spanel/zvit/table3')) ? 'active' : '' }}">
            <i class="icon-grid7"></i><span>Таблиця 3</span></a>
        </li>
        <li class="nav-item">
          <a href="{{url('/spanel/zvit/table4')}}" 
             class="nav-link {{ (request()->is('spanel/zvit/table4')) ? 'active' : '' }}">
            <i class="icon-grid7"></i><span>Таблиця 4</span></a>
        </li>
        <li class="nav-item">
          <a href="{{url('/spanel/zvit/table5')}}" 
             class="nav-link {{ (request()->is('spanel/zvit/table5')) ? 'active' : '' }}">
            <i class="icon-grid7"></i><span>Таблиця 5</span></a>
        </li>
        {{-- /кінець --}}
        @endcan

        @can('posit-admin-role')
        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Адмін меню</div> 
          <i class="icon-menu" title="Layout options"></i></li>
        {{-- /Настройки --}}
        <li class="nav-item">
          <a href="{{ route('spanel.admin.welcome') }}" class="nav-link ">
            <i class="mi-backspace"></i>
            <span>
              Головна адмінка
              <span class="d-block font-weight-normal opacity-50"><small>головна сторінка адміна</small></span>
            </span>
          </a>
        </li>
        @endcan
      </ul>
				</div>
				<!-- /главная навигация -->
  </div>
</div>