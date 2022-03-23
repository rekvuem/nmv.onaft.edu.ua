@extends('home.layout.index')
@section('title','Запрошення на фінал олімпіади')
@section('content')
<div class="card card-body rounded-0 border-0 mt-1">
  <div class='row'>
    <div class="col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>
  
  <div class="row">
    <div class="col-10 offset-md-1">
      @forelse($InviteOlymp as $InviteFile)
      <a href="{{asset('download/olymp/'.$InviteFile->filename)}}" class="btn-link">{{$InviteFile->title}}</a>
      @empty
      <h3>Немає файлів</h3>
      @endforelse
    </div>
  </div>
</div>
@endsection