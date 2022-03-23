@extends('home.layout.index')
@section('title', $SelectPage->title_page)
@section('page_styles')
<style>
  .img-fluid{
    width: 46px;
  }  
  .font{
    font-size: 1.4em;
    font-weight: 600;
  }
</style>
@endsection
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
          <a href="https://www.youtube.com/watch?v=xYDvLIwlzDk" class="font text-primary-800">
            <i class="icon-pushpin"></i> Круглий стіл: "Академічна доброчесність в освітньому середовищі: виклики та практики"
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          @if(request()->get('dobro') == 'dobro')
          <div class="row">
            <div class="col-12">
              <a href="https://onaft.edu.ua/download/pubinfo/Regulat-Academic-Integrity.pdf" class="font text-primary-800">
                <img src="{{asset('images/pdf.png')}}" class="img-fluid"> 
                Положення про академічну доброчесність в одеській національній академії харчових технологій
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="https://onaft.edu.ua/download/pubinfo/Regulat-Academic-Integrity.pdf" class="font text-primary-800">
                <img src="{{asset('images/pdf.png')}}" class="img-fluid"> 
                Положення про навчально-методичний відділ навчального центру організації освітнього процесу
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="https://onaft.edu.ua/download/pubinfo/Regulations-Training-Center.pdf" class="font text-primary-800">
                <img src="{{asset('images/pdf.png')}}" class="img-fluid"> Положення про навчальний відділ організації освітнього процесу
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="https://onaft.edu.ua/download/pubinfo/Regulations-department-of-licensing.pdf" class="font text-primary-800">
                <img src="{{asset('images/pdf.png')}}" class="img-fluid"> 
                Положення про відділ ліцензування, акредитації та сертифікації навчального центру організації освітнього процесу
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="https://onaft.edu.ua/download/pubinfo/Regulat-Academic-Integrity.pdf" class="font text-primary-800">
                <img src="{{asset('images/pdf.png')}}" class="img-fluid"> Положення про академічну доброчесність
              </a>
            </div>
          </div>
          @endif   
          @forelse($UploadFile as $file)

          @if($file->type == 'application/pdf')
          <div class="row">
            <div class="col-12">
              <a href="{{asset('download/'.$file->side.'/'.$file->filename)}}" class="font text-primary-800">
                <img src="{{asset('images/pdf.png')}}" class="img-fluid"> {{$file->title}}
              </a>
            </div>
          </div>
          @endif

          @empty

          @endforelse      
        </div>
      </div>
    </div>
  </div>
</div>
@endsection