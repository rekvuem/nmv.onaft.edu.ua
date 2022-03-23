<div class="row bg-teal-600">
  <div class="col-12">
    <!-- Secondary navbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-teal-600 border-0 shadow-0 rounded-0">
      <div class="d-md-none w-100">
        <button type="button" class="navbar-toggler d-flex align-items-center w-100" data-toggle="collapse" data-target="#navbar-navigation">
          <i class="icon-menu-open mr-2"></i>
          Навігація
        </button>
      </div>

      <div class="navbar-collapse collapse" id="navbar-navigation">
        <ul class="navbar-nav navbar-nav-highlight">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="navbar-nav-link {{ (request()->is('/')) ? 'active' : '' }}">
              @lang('home.homepage')
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/aboutus') }}" class="navbar-nav-link {{ (request()->is('aboutus')) ? 'active' : '' }}">
              @lang('home.aboutus')
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('home.newslist')}}" class="navbar-nav-link {{ (request()->is('newslist')) ? 'active' : '' }}">
              @lang('home.news')
            </a>
          </li>  

          <li class="nav-item dropdown">
            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              @lang('home.conference')
            </a>
            <div class="dropdown-menu">
              <a href="{{ url('/conference/') }}" class="dropdown-item">@lang('home.confer_nmv')</a>
              <a href="{{ url('/college/') }}" class="dropdown-item">@lang('home.confer_college')</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="http://vshpm.onaft.edu.ua/" class="navbar-nav-link" target="_blank">
              ВШПМ
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ url('/metodrada') }}" class="navbar-nav-link {{ (request()->is('metodrada')) ? 'active' : '' }}">
              @lang('home.advice')
            </a>
          </li>        
          <li class="nav-item">
            <a href="{{ url('/publicinfo') }}" class="navbar-nav-link {{ (request()->is('publicinfo')) ? 'active' : '' }}">{{__('home.pubinfo')}}</a>
          </li> 

        </ul>  

        @if(Auth::check())
        <ul class="navbar-nav ml-xl-auto">
          <li class="nav-item dropdown">
            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
              @lang('home.language')
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{route('local.switch', ['local'=>'en'])}}" class="dropdown-item">@lang('home.en')</a>
              <a href="{{route('local.switch', ['local'=>'uk'])}}" class="dropdown-item">@lang('home.uk')</a>
              <a href="{{route('local.switch', ['local'=>'ru'])}}" class="dropdown-item">@lang('home.ru')</a>

            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
              Меню
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item " href="{{route('spanel.dashboard')}}">Панель користувача</a>
              <form id="frm-logout" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <input class="dropdown-item" type="submit" value="Вихід">
              </form>
            </div>
          </li>
        </ul>  
        @else
        <ul class="navbar-nav ml-xl-auto">
          <li class="nav-item dropdown">
            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
              @lang('home.language')
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{route('local.switch', ['local'=>'en'])}}" class="dropdown-item">@lang('home.en')</a>
              <a href="{{route('local.switch', ['local'=>'uk'])}}" class="dropdown-item">@lang('home.uk')</a>
              <a href="{{route('local.switch', ['local'=>'ru'])}}" class="dropdown-item">@lang('home.ru')</a>
            </div>
          </li>
          <!--          <li class="nav-item dropdown">
                      <a href="{{route('login')}}" class="navbar-nav-link">
                        <i class="icon-enter2 mr-2"></i>
                      </a>
                    </li>-->
        </ul>  
        @endif
      </div>
    </div>
    <!-- /secondary navbar -->
  </div>
</div>