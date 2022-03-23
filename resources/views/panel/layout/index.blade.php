<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель користувача | @yield('title')</title>  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <meta name="author" content="Viktor Kyrychenko">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('framecss/global_assets/css/icons/material/styles.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/global_assets/css/icons/icomoon/styles.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/bootstrap_limitless.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/layout.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/components.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/colors.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/styles/style_panel.css') }} " rel="stylesheet" type="text/css">
    @yield('page_styles')
  </head>
  <body class="navbar-top">
    @include('panel/layout/navbar')
    <div class="page-content">
      @include('panel/layout/menubar')
        @if(request()->routeIs('spanel.admin.*')) 
          @include('panel/component/sidebar_second_admin') 
        @elseif(request()->routeIs('spanel.ucheb.project.*'))  
          @include('panel/component/sidebar_second_project')
        @endif
      <div class="content-wrapper">
        @include('panel/component/breadcrumb')
        <div class="content">
          @yield('content')
        </div>
        @include('panel/layout/footer')
      </div>
    </div>  
    <script src="{{ asset('framecss/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}" async ></script>
    <script src="{{ asset('framecss/assets/js/app_panel.js') }}"></script>
    @yield('page_script')
    <script src="{{ asset('framecss/java/custom_panel.js') }}"></script>
  </body>
</html>
