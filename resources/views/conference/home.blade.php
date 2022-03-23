@extends('conference.layout.index')
@section('title','Головна')
@section('page_styles')
<style>
  .zaprow {
    border: 1px solid blue;
    background: #E0E0E0;
    text-align: center;
    font-size: 18px;
  }
  .title_short{
    font-size: 2.2em;
    color: #9f1129;
    font-weight: bold;
    padding-top: 15px;
  }
  .title_conference{
    font-size: 2em;
    color: #3a36ea;
    font-weight: bold;
    font-style: italic;
  }
  .date_confer{
    font-size: 2em;
    color: green;
    font-weight: bold;
    padding-top: 25px;
  }
  .upper_title{
    font-family: 'Times New Roman', Times, serif;
    text-align: center; 
    font-size: 1.8em;
    text-transform: uppercase;
    color: blue;
    font-weight: bold;
  }
</style>
@endsection
@section('content')
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card rounded-0">
      <div class="row mt-3 ">
        <div class="col-md-10 offset-md-1"> 
          <div class="row">
            <div class="col-6 text-center">
              <img class="img-fluid" width="75%" alt="рисунок для страницы" src="{{asset('images/emblem1.png')}}">
            </div>
            <div class="col-6">
              <p class="text-center title_short">{{$selDB->title_short}}</p>
              <p class="text-center title_conference">{{$selDB->title_conference}}</p>
              <p class="text-center date_confer">{{$selDB->date_conference}}</p>
            </div> 
          </div>

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="zaprow">
                <div style="color: #be1044; padding: 15px 0px 10px; font-size:24px;">Запрошення</div>
                <p class="text-justify" style="margin:5px; text-indent: 1.5em;"><b>Шановні колеги!</b> {{$selDB->date_conference}} в Одеській національній академії харчових технологій пройде {{$selDB->title_short}} <b>{{$selDB->title_conference}}</b>. </p>
                <p class="text-justify" style="margin:5px; text-indent: 1.5em;"><b>Метою проведення заходу</b> є обмін між провідними фахівцями прогресивними та новими підходами в освітньому процесі закладів вищої освіти, вибору орієнтирів для подальшого розвитку освітнього простору України, здійснення модернізації освітньої системи, прогнозування процесу трансформації національної системи освіти. У рамках конференції учасники мають змогу обговорити шляхи покращення якості освітнього процесу, у тому числі з ефективним використанням дистанційних технологій, у напрямі підготовки компетентісно-орієнтованих та конкуренто-спроможних фахівців; проблеми посилення фундаментальних складників навчання, розвитку освітньої інфраструктури тощо.</p>
                <p class="text-justify" style="text-indent: 1.5em;">Запрошуємо Вас взяти участь у роботі конференції.</p>
                <b>З повагою і найкращими побажаннями <i>Організаційний комітет</i></b>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="upper_title">ПРОБЛЕМАТИКА КОНФЕРЕНЦІЇ</div>
              <div style='font-size: 20px !important; font-family: "Times New Roman", Times, serif; padding-left: 25px'>{!! $selDB->priority_work_conference !!}</div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="upper_title">ДЛЯ УЧАСТІ В РОБОТІ КОНФЕРЕНЦІЇ</div>
              <div style='font-size: 20px; font-family: "Times New Roman", Times, serif;'>{!! $selDB->work_conference !!}</div>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="upper_title">ВИМОГИ ДО ОФОРМЛЕННЯ ТЕЗ</div>
              <div style='font-size: 20px; font-family: "Times New Roman", Times, serif;'><ol>{!! $selDB->requirements !!}</ol></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection