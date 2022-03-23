<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Навчальний центр організації освітнього процесу | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <meta name="description" content="Конференції Навчальний центр організації освітнього процесу" />
    <meta name="keywords" content="Конференції Навчальний, центр, організації, освітнього процесу, ОНАХТ, onaft, onapt" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('framecss/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/layout.css') }}" rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/components.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('framecss/assets/css/colors.min.css') }}" rel="stylesheet" />
    @yield('page_styles')
    <style>
      .text-uppercase h2{
        font-weight: bold;
      }
      .title-wapka{
        color: #58a994;
        text-align: center;
        font-size: 3em;
        font-weight: bolder;
      }
      .title-nazvanie{
        font-size: 2em;
        color: #3a36ea;
        font-weight: bold;
        font-style: italic;
      }
      .title{
        font-size: 20px;
        font-weight: bold;
        color:#005299;
      }
      .discript{
        color:black;
        font-size: 18px;
      }
      .blocks{
        height: 70px;
        width: 100%;
        display: inline;
      }

      .block-img-left { display: inherit; float:left;}
      .block-title{ display: inherit; float:left; width: 80%;}
      .block-img-right{ display: inherit; float: right;}
    </style>
  </head>
  <body>
    <div class="container-fluid" style="background-color: rgb(251, 244, 225)">
      @include('conference.layout._head')
      <div class="row m-1"></div>
      @include('conference.layout._menu')
    </div>
    <div class="container" >
      @yield('content')
    </div>
    <script src="{{ asset('framecss/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/ui/slinky.min.js') }}"></script>
    <script src="{{ asset('framecss/assets/js/app.js') }}"></script>
    <script src="{{ asset('framecss/java/custom_confer.js') }}"></script>
  </body>
  <footer>
    @include('conference.layout.footer')
  </footer>
</html>