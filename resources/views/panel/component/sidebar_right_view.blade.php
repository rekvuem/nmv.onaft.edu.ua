<!-- Right sidebar component -->
<div class="sidebar sidebar-dark sidebar-right sidebar-expand-md">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Block buttons -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Блок управління</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <a href="{{ route('spanel.report.myreports') }}" class="btn bg-teal-400 btn-block btn-float">
                            <i class="icon-backspace2 icon-2x"></i>
                            <span>назад</span>
                        </a>
                        @if(Gate::check('posit-chief'))
                            <a href="{{ route('spanel.report.allreports') }}" class="btn bg-teal-800 btn-block btn-float">
                                <i class="icon-backspace2 icon-2x"></i>
                                <span>назад Начальник</span>
                            </a>
                        @endif
                    </div>

                        <div class="col">
                            <button type="button" class="btn bg-blue-400 btn-block btn-float disabled">
                                <img src="{{ asset('images/word-icon.png') }}" height="32px">
                                <span>export</span>
                            </button>
                        </div>
                </div>
            </div>
            <!-- /block buttons -->

            <!-- File inputs
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">завантаження</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="form-group ">
                            <input type="file" class="form-input-styled text-white" data-fouc>
                        </div>
                    </form>
                </div>
            </div>
            -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->