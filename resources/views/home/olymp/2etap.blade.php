@extends('home.layout.index')
@section('title','ІІ ЕТАП ВСО НА БАЗІ ОНАХТ')
@section('content')
<div class="card card-body rounded-0 border-0 mt-1">
  <div class='row'>
    <div class="col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>
  
  <div class="row">
    <div class="col-10 offset-1">
      @isset($SelectDB->text)
      {!! $SelectDB->text !!}
      @endisset
    </div>
  </div>
</div>
@endsection