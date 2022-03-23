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

				<!-- Sub navigation -->
				<div class="card mb-2">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="text-uppercase font-size-sm font-weight-semibold">Проект</span>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <div class="card-body p-0">
        <ul class="nav nav-sidebar" data-nav-type="accordion">
          <li class="nav-item-header">Лист проектів</li>
          <li class="nav-item">
            <a href="{{route('spanel.ucheb.project.list')}}" class="nav-link"><i class="icon-compose"></i> Список</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link addproject"><i class="icon-collaboration"></i> Додати</a>
          </li>
          <li class="nav-item">
            <a href="{{route('spanel.ucheb.project.store')}}" class="nav-link">
              <i class="icon-user-plus"></i> коментарі<span class="badge bg-primary badge-pill ml-auto">-</span>
            </a>
          </li>
        </ul>
      </div>
				</div>
				<!-- /sub navigation -->

    <!-- Latest updates -->
				<div class="card">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="text-uppercase font-size-sm font-weight-semibold">Останні коментарі</span>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <ul class="media-list">

          @foreach($showLastCommentProject as $LastComment)
          <li class="media">
            <div class="mr-3">
              <a href="#" class="btn bg-transparent {{$array_text}} {{$array_border}} rounded-round border-2 btn-icon">
                <i class="icon-git-pull-request"></i>
              </a>
            </div>
            <div class="media-body">
              {{$LastComment->comment_text}}
              <div class="text-muted font-size-sm">{{$LastComment->created_at->format('d.m.y H:s')}}</div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
				</div>
				<!-- /latest updates -->
  </div>
  <!-- /sidebar content -->
</div>
<!-- /secondary sidebar -->