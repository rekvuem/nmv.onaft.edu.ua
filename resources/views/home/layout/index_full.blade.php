<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <title>Навчальний центр організації освітнього процесу | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Навчальний центр ОНАХТ, НЦООП" />
    <meta name="keywords" content="Навчальний центр, НЦООП, ОНАХТ, Одеська Національна академія харчових технологій, технології, академія" />
    <meta name="author" content="Viktor Kyrychenko">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('framecss/global_assets/css/icons/material/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('framecss/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('framecss/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('framecss/assets/css/bootstrap_limitless.min.css') }} " rel="stylesheet">
    <link href="{{ asset('framecss/assets/css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('framecss/assets/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('framecss/assets/css/colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('framecss/styles/homestyle1.css') }}" rel="stylesheet" type="text/css">
    @yield('page_styles')
  </head>
  <body>
    <div class="container-fluid" style="background-color: rgb(251, 244, 225)">   
      @include('home.layout._head')
      <div class="row m-1"></div>
      @include('home.layout._menu')
    </div>
    <div class="container-fluid">
      @yield('content')
    </div>
    <script src="{{ asset('framecss/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/ui/slinky.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/ui/ripple.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!-- кастом -->
    <script src="{{ asset('framecss/assets/js/app.js') }}"></script>
    <script src="{{ asset('framecss/assets/js/custom.js') }}"></script>
    @yield('page_script')
  </body>
  <footer>

  </footer>
</html>