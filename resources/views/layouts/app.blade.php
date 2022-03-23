<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Авторизація НЦООП') }}</title>
    <meta name="author" content="Viktor Kyrychenko">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('framecss/global_assets/css/icons/material/styles.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/global_assets/css/icons/icomoon/styles.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/bootstrap_limitless.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/layout.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/components.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/colors.min.css') }} " rel="stylesheet" />
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
  </head>
  <body class="bg-slate-700">
    <div id="app">
      <div class="page-content">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
    <script src="{{ asset('framecss/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/forms/inputs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('framecss/assets/js/custom_login.js') }}"></script>
  </body>
</html>