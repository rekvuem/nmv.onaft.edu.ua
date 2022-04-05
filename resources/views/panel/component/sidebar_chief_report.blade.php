<!-- Secondary sidebar -->
<div class="sidebar sidebar-dark sidebar-secondary sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-secondary-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <span class="font-weight-semibold">Список співробітників</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sub navigation -->
        <div class="card mb-2">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Список співробітників</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="{{ route('spanel.report.allreports') }}" class="nav-link bg-primary-800"> Сбросити</a>
                    </li>
                    @foreach($listUserDepart as $listUser)
                        <li class="nav-item">
                            <a href="{{ route('spanel.report.allreports', ['user'=>$listUser->user_id]) }}" class="nav-link">{{ $listUser->imya }} {{ $listUser->familia }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /sub navigation -->


    </div>
    <!-- /sidebar content -->

</div><!-- /secondary sidebar -->