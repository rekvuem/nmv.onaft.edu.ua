<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-bottom-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
  <li>
    <a class="fab-menu-btn btn bg-pink-300 btn-float rounded-round btn-icon">
      <i class="fab-icon-open icon-cog52"></i>
      <i class="fab-icon-close icon-cross2"></i>
    </a>

    <ul class="fab-menu-inner">
      @if(request()->routeIs('spanel.ucheb.news.index'))
      <li>
								<div data-fab-label="Показати форму заповнення">
          <a href="#" class="btn btn-light rounded-round btn-icon btn-float" data-toggle="collapse" data-target="#collapse-form">
            <i class="icon-file-eye"></i>
          </a>
								</div>
      </li>
      @endif
      @if(request()->routeIs('spanel.ucheb.olympic.index'))
      <li>
								<div data-fab-label="Показати текст">
          <a href="#" class="btn btn-light rounded-round btn-icon btn-float" data-toggle="collapse" data-target="#collapse-olymp-text">
            <i class="icon-file-eye"></i>
          </a>
								</div>
      </li>
      @endif
      @if(request()->routeIs('spanel.ucheb.confer.uplpage'))
      <li>
								<div data-fab-label="Показати форму заповнення">
          <a href="#" class="btn btn-light rounded-round btn-icon btn-float" data-toggle="collapse" data-target="#collapse-confer-from">
            <i class="icon-file-eye"></i>
          </a>
								</div>
      </li>
      @endif
    </ul>
  </li>
</ul>
<!-- /top right menu -->