@extends('home.layout.index')
@section('title','Програми проведення науково-методичних семінарів на кафедрах')
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-9 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-12 text-center text-uppercase">
          <h2> @yield('title') </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="btn-block btn-group">
            <a href="/seminar?site=ksa" class="btn bg-blue-700">АтаРТ</a>
            <a href="/seminar?site=ebk" class="btn bg-blue-700">ЕБіК</a>
            <a href="/seminar?site=itxrgb" class="btn bg-blue-700">ІТХіРГБ</a>
            <a href="/seminar?site=kipkb" class="btn bg-blue-700">КІПтаКБ</a>
            <a href="/seminar?site=mmil" class="btn bg-blue-700">ММіЛ</a>
            <a href="/seminar?site=nge" class="btn bg-blue-700">НГтаЕ</a>
            <a href="/seminar?site=nttim" class="btn bg-blue-700">НТТтаІМ</a>
            <a href="/seminar?site=tvtb" class="btn bg-blue-700">ТВтаТБ</a>
            <a href="/seminar?site=tzzb" class="btn bg-blue-700">ТЗіЗБ</a>
            <a href="/seminar?site=tthppb" class="btn bg-blue-700">ТтаТХПіПБ</a>
          </div>
        </div>
      </div>
      <div class="row text-center mt-3">
        <div class="col-12">
          @forelse($UploadFile as $file)
            <img src="{{asset('download/'.$file->side.'/'.$file->filename)}}" class="img-fluid img-responsive">
          @empty
            
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection