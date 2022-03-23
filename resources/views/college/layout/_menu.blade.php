
  <div class="row bg-teal-600 ">
    <div class="container-fluid">
      <div class="navbar navbar-expand-md navbar-dark bg-teal-600 border-0 shadow-0">
        <div class="d-md-none w-100">
          <button type="button" class="navbar-toggler d-flex align-items-center w-100" data-toggle="collapse" data-target="#navbar-navigation">
            <i class="icon-menu-open mr-2"></i>
            Main navigation
          </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-navigation">
          <ul class="navbar-nav navbar-nav-highlight">
            <li class="nav-item">
              <a href="{{ url('/') }}" class="navbar-nav-link {{ (request()->is('/')) ? 'active' : '' }}">НЦООП</a>
            </li>
            {{----}}
            <li class="nav-item">
              <a href="{{ url('/college') }}" 
                 class="navbar-nav-link {{ (request()->is('college')) ? 'active' : '' }}">Головна</a>
            </li> 
            <li class="nav-item">
              <a href="{{ url('/college/komitet') }}" 
                 class="navbar-nav-link {{ (request()->is('college/komitet')) ? 'active' : '' }}">Склад оргкомітету конференції</a>
            </li>    
            <li class="nav-item">
              <a href="{{ url('/college/programm') }}" 
                 class="navbar-nav-link {{ (request()->is('college/programm')) ? 'active' : '' }}">Програма конференції</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/college/tezici') }}"
                 class="navbar-nav-link {{ (request()->is('college/tezici')) ? 'active' : '' }}">Збірники матеріалів конференції</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/college/stends') }}"
                 class="navbar-nav-link {{ (request()->is('college/stends')) ? 'active' : '' }}">Стендові доповіді</a>
            </li>
        
          </ul>
        </div>
      </div>
    </div>
  </div>