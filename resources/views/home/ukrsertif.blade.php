@extends('home.layout.index')
@section('title','Рівень володіння державною мовою')
@section('page_styles')
<style>
  .text-font{
    font-size: 1.2em;
  }
  .indent{
    text-indent: 20px;
    text-align: justify;
  }

</style>
@endsection
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-9 col-md-9">
    <div class="card card-body rounded-0 border-0 text-font">

      <p class="indent">Відповідно до Статті 9 та 10 Закону України «Про забезпечення функціонування української мови як державної» науково-педагогічні працівники (завідувачі кафедр, професори, доценти, ст.викладачі, викладачі, асистенти, викладачі-стажисти тощо) МАЮТЬ володіти державною мовою. 
        Рівень володіння державною мовою засвідчується документом про повну загальну середню освіту за умови, що такий документ підтверджує вивчення особою української мови як навчального предмета (дисципліни), або державним сертифікатом про рівень володіння державною мовою, що видається Національною комісією зі стандартів державної мови відповідно до цього Закону (<a href="https://zakon.rada.gov.ua/laws/show/2704-19">https://zakon.rada.gov.ua/laws/show/2704-19</a>)</p>

      <p class="indent"><a href="https://mova.gov.ua/gromadskosti/zapitannya-vidpovidi/koli-de-ta-yak-mozhna-otrimati-sertifikat-na-riven-volodinnya-derzhavnoyu-movoyu">Де можна скласти іспит на рівень володіння державною мовою?</a> </p>

      <p class="indent"><a href="https://exam.mova.gov.ua/">Іспитова система для визначення рівня володіння державною мовою?</a> </p>   

      <p class="indent">Зразки завдань іспитової роботи на визначення рівня володіння державною мовою для осіб, які зобов’язані володіти державною мовою та застосовувати її під час виконання службових обов’язків (<a href="{{asset('download/other/zrazki-zavdannovitrenazher-2.pdf')}}">ТРЕНАЖЕР для претендентів</a>) із ключами відповідями </p>     
      
    </div>
  </div>
</div>
@endsection
@section('page_script')

@endsection