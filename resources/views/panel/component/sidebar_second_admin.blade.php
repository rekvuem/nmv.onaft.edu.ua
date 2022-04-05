<!-- Secondary sidebar -->
<div class="sidebar sidebar-dark sidebar-secondary sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-secondary-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <span class="font-weight-semibold">Друге меню</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar search -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Видалити файл</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('spanel.admin.getDelete')}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('GET')}}
                    <div class="input-group">
                        <input type="text" name="fileDeleteName" class="form-control text-white" value="" autocomplete="off">
                        <span class="input-group-append">
              <input type="submit" class="btn btn-sm bg-brown-600" value="ok"> 
            </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- /sidebar search -->

        <!-- Sub navigation -->
        <div class="card mb-2">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Навігація</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header">Управління</li>
                    <li class="nav-item">
                        <a href="{{ route('spanel.admin.page_index')  }}" class="nav-link"><i class="mi-important-devices"></i> Сторінкі</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('spanel.admin.users.index') }}" class="nav-link"><i class="mi-account-box"></i> Користувачі</a>
                    </li>

                    <li class="nav-item-header">виконання</li>
                    <li class="nav-item">
                        <a href="{{route('spanel.admin.StartSeed')}}" class="nav-link"><i class="mi-build"></i> DB seed</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('spanel.admin.getMigrate')}}" class="nav-link"><i class="mi-build"></i> Migrate</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('spanel.admin.getMigrateRefresh')}}" class="nav-link"><i class="mi-build"></i> Migrate Refresh</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('spanel.admin.getMigrateRollback')}}" class="nav-link"><i class="mi-build"></i> Migrate Rollback</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('spanel.admin.getClear')}}" class="nav-link"><i class="mi-cached"></i> Очистити view|cache|route</a>
                    </li>
                    <li class="nav-item-header">завантаження файлів (експорт)</li>
                    <li class="nav-item">
                        <a href="{{route('spanel.admin.import.xls')}}" class="nav-link"><i class="mi-publish"></i> Import XLS</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /sub navigation -->

        <!-- Latest updates -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Останні оновлення</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="media-list">
                    <li class="media">
                        <div class="mr-3">
                            <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                                <i class="icon-git-pull-request"></i>
                            </a>
                        </div>

                        <div class="media-body">
                            Drop the IE
                            <a href="#">specific hacks</a> for temporal inputs
                            <div class="text-muted font-size-sm">4 minutes ago</div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /latest updates -->


        <!-- Filter -->
        <div class="card card-collapsed">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Filter</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /filter -->

    </div>
    <!-- /sidebar content -->

</div><!-- /secondary sidebar -->