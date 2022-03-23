@extends('home.layout.index')
@section('title', $TitlePage->title_page)
@section('page_styles')
<style>
    .img-fluid{
    width: 46px;
  }  
  .text-font{
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
  <div class="col-12 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-12 text-center text-uppercase text-bold">
          <h2> {{$TitlePage->title_page}}</h2>
        </div>
      </div>
      <div class="row">
        @if(request()->get('page') == 'teacher')
        <div class="col-12">
          <a href="https://youtu.be/Ms22Nn7-BWk" class="text-primary-800 text-font">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/book_handbook1.png')}}" height="72px">
              </div>
              <div class="">
                <div class="title">Інструкція щодо заповнення форми силабуса навчальної дисципліни</div>
              </div>
            </div>
          </a>
        </div>
        @endif
        
  @if(request()->get('page') == 'kafedr')
         <div class="col-12">
          <a href="https://drive.google.com/file/d/1dCNsPXIK-JtRjBsXD_SBAig_yZGGe1tA/view?usp=sharing" class="text-primary-800 text-font">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/free-icon-mp4-2611432.png')}}" height="72px">
              </div>
              <div class="">
                <div class="title">Налаштування безпеки в Zoom</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12">
          <a href="{{asset('download/other/recomindation_for_safe_zoom.pdf')}}" class="text-primary-800 text-font">
            <div class="d-flex flex-row">
              <div class="">
                <img src="{{asset('images/pdf.png')}}" height="72px">
              </div>
              <div class="">
                <div class="title">Налаштування безпеки у конференціях Zoom</div>
              </div>
            </div>
          </a>
        </div>
  @endif
        
        
@if(request()->get('page') == 'student')
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://www.onaft.edu.ua/download/pubinfo/Regulation-rating-appraisal-achievements-competitors.pdf" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src=""></div>
              <div class=""><div class="title">Положення про рейтингове оцінювання досягнень здобувачів в ОНАХТ</div></div>
            </div>
          </a>
        </div>
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://docs.google.com/forms/d/e/1FAIpQLSeRHonaEZweKUBoSQpQWp8ozIIndJ6JaM1Hj9tCf-Y6EfkRJg/viewform?vc=0&c=0&w=1&flr=0" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src=""></div>
              <div class=""><div class="title">Анкета для опитування здобувачів вищої освіти щодо якості викладання дисциплін в ОНАХТ</div></div>
            </div>
          </a>
        </div>
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://docs.google.com/forms/d/e/1FAIpQLSdvNRwEYcSZpkBLAtbU3YgBjGdKV9RN0x6vJPfCXZfnzrFsIA/viewform?vc=0&c=0&w=1&flr=0" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src=""></div>
              <div class=""><div class="title">Анкета для опитування здобувачів вищої освіти ОНАХТ щодо якості освітньої програми</div></div>
            </div>
          </a>
        </div> 




@elseif(request()->get('page') == 'staj')
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://onaft.edu.ua/download/pubinfo/Regulations_on_training_of_pedagogical.pdf" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src="{{asset('images/pdf.png')}}"></div>
              <div class=""><div class="title">Положення про підвищення кваліфікації педагогічних та науково-педагогічних працівників</div></div>
            </div>
          </a>
        </div>
@endif       
        @if(request()->get('page') == 'rkk')
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://onaft.edu.ua/download/pubinfo/Regulations_on_the_competitive_selection.pdf" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src="{{asset('images/pdf.png')}}"></div>
              <div class=""><div class="title">Положення про проведення конкурсного відбору</div></div>
            </div>
          </a>
        </div>
        
        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://onaft.edu.ua/download/pubinfo/Regulations-on-the-tender-commission.pdf" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src="{{asset('images/pdf.png')}}"></div>
              <div class=""><div class="title">Положення про конкурсну комісію</div></div>
            </div>
          </a>
        </div> 

        <div class="col-12">
          <a class="text-primary-800 text-font" href="https://onaft.edu.ua/download/pubinfo/orders/orders_main/2020/order-198-01-10-06-20.pdf" target="_blank">
            <div class="d-flex flex-row">
              <div class=""><img src="{{asset('images/pdf.png')}}"></div>
              <div class=""><div class="title">Наказ</div></div>  
            </div>
          </a>
        </div>    
        @else
        @forelse($DownloadFile as $file)
        <div class="col-12">
          <a class="text-primary-800 text-font" href="{{asset('download/'.$file->side.'/'.$file->filename)}}">
            <div class="d-flex flex-row">
              <div class="">
                @if($file->type=='application/pdf')
                <img src="{{asset('images/pdf.png')}}">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
                <img src="{{asset('images/pptx_icon.png')}}">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' or $file->type =='application/msword')
                <img src="{{asset('images/word-icon.png')}}">
                @elseif($file->type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                <img src="{{asset('images/xls.png')}}">
                @endif
              </div>
              <div class="">
                <div class="title">{{$file->title}}</div>
              </div>
            </div>
          </a>
        </div>
        @empty
          
        @endforelse
        @endif

      </div>
      @if(request()->get('page') == 'rkk')
      <div class="sidebar sidebar-light sidebar-component shadow-0 position-static w-100 d-block mb-md-4">
        <div class="sidebar-content position-static">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item nav-item-submenu" style="font-size:1.4em;">
              <a href="#" class="nav-link "> Рішення конкурсної комісії</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                  <a href="https://www.onaft.edu.ua/download/pubinfo/dcc/Decision-Tender-Commission-4-24-05-2021-1.pdf" class="nav-link">
                    Рішення від 24.05.2021 (частина 1)</a></li>
                <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                  <a href="https://www.onaft.edu.ua/download/pubinfo/dcc/Decision-Tender-Commission-4-24-05-2021-2.pdf" class="nav-link">
                    Рішення від 24.05.2021 (частина 2)</a></li>
                <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                  <a href="https://www.onaft.edu.ua/download/pubinfo/dcc/Decision-Tender-Commission-3-22-03-2021.pdf" class="nav-link">
                    Рішення від 23.03.2021</a></li>
                <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                  <a href="https://www.onaft.edu.ua/download/pubinfo/dcc/Decision-Tender-Commission-2-15-02-2021.pdf" class="nav-link">
                    Рішення від 15.02.2021</a></li>    
                <li class="nav-item" style="margin-left: 15px;padding-top: 0.1rem;">
                  <a href="https://www.onaft.edu.ua/download/pubinfo/dcc/Decision-Tender-Commission%20-1-01-02-2021.pdf" class="nav-link">
                    Рішення від 01.02.2021</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      @endif


    </div>
  </div>
</div>
@endsection