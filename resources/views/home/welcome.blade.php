@extends('home.layout.index')
@section('title','Головна')
@section('page_styles')
<style>
  .card-img-actions-overlay{
    z-index: 10;
  }
  .news_title{
    font-size: 1.5em;
    font-weight: 600;
    text-align: justify;
    padding-right: 1em;
    padding-top: 0.8em;
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
        <div class="col-12">
          <div class="row ">
            <div class="col-12 col-md-3 text-center">
              <div class=""><img src="{{asset('images/nachalnik.PNG')}}" class="img-fluid" ></div>
              <div style="font-weight: bolder; font-size: 1.2em">Директор НЦООП</div>
              <div style="font-weight: bolder; font-size: 1.2em; font-style: italic;">Дец Надія Олександрівна</div>
              <div><b>тел. роб.:</b> (048) 712-41-94</div>
              <div><b>e-mail:</b> <a href="mailto:dets.nadin@gmail.com">dets.nadin@gmail.com</a></div>
            </div>
            <div class="col-10 col-md-9">
              @if(session('locale')=='uk')
              <p style="font-size: 1.2em; text-align: justify;">
                <b>Навчальний центр організації освітнього процесу</b> – це структурний підрозділ Одеської національної академії харчових технологій, через який здійснюється організація та планування навчального процесу на всіх формах навчання, керівництво і контроль за навчальною і науково-методичною роботою, забезпечення підвищення якості освіти, підготовка, організація, супровід та проведення ліцензування й акредитації спеціальностей, освітніх програм, за якими в ОНАХТ здійснюється підготовка фахівців.
              </p>
              <p style="font-size: 1.2em;">
                НЦООП працює за такими напрямами діяльності: 
              <ul style="font-size: 1.2em;">
                <li> планування, організація та контроль освітнього процесу; </li>
                <li>  організація атестації та випуску здобувачів освіти; </li>
                <li>  диспетчеризація освітнього процесу; </li>
                <li>  програмно-технічна підтримка освітнього процесу; </li>
                <li>  науково-методичне та організаційне забезпечення якості освіти в ОНАХТ; </li>
                <li>  планування, організація та контроль навчально-методичної роботи; </li>
                <li>  планування, організація та контроль за підвищенням кваліфікації професорсько-викладацького складу ОНАХТ; </li>
                <li>  забезпечення виконання вимог щодо ліцензування та акредитації; </li>
                <li>  організація та супровід ліцензування та акредитації в ОНАХТ.</li>
              </ul>
              </p>
              <p>
                Робота здійснюється відповідно до <a href="https://www.onaft.edu.ua/download/pubinfo/Regulations-Training-Center.pdf">Положення</a>, затвердженого Вченою Радою ОНАХТ.
              </p>
              @else
              <p style="font-size: 1.2em; text-align: justify">
                <b>Учебный центр организации образовательного процесса</b> – это структурное подразделение Одесской национальной академии пищевых технологий, которое осуществляет организацию и планирование учебного процесса на всех формах обучения, руководство и контроль за учебной и учебно-методической работой, обеспечение повышения качества образования, подготовку, организацию, сопровождение и проведение лицензирования и аккредитации специальностей, образовательных программ, по которым в ОНАПТ осуществляется подготовка специалистов.
              </p>
              <p style="font-size: 1.2em; text-align: justify;">
                УЦ ООП работает по следующим направлениям деятельности:  
              <ul style="font-size: 1.2em;">
                <li> планирование, организация и контроль образовательного процесса; </li>
                <li>  организация аттестации и выпуска соискателей образования; </li>
                <li>  диспетчеризация образовательного процесса; </li>
                <li>  программно-техническая поддержка образовательного процесса; </li>
                <li>  научно-методическое и организационное обеспечение качества образования в ОНАПТ; </li>
                <li>  планирование, организация и контроль учебно-методической работы; </li>
                <li>  планирование, организация и контроль над повышением квалификации профессорско-преподавательского состава ОНАПТ; </li>
                <li>  обеспечение выполнения требований по лицензированию и аккредитации; </li>
                <li>  организация и сопровождение лицензирования и аккредитации в ОНАПТ.</li>
              </ul>
              </p>
              <p>
                <a href="https://www.onaft.edu.ua/download/pubinfo/Regulations-Training-Center.pdf">Положению</a>, утвержденному Ученым Советом ОНАПТ.
              </p>   
              @endif
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-md-12" style="font-size: 1.8em; font-weight: bolder">@lang('home.news')</div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row">

                @forelse($ListNews as $List)
                <div class="col-12 col-md-12">
                  <div class="card card-img-actions rounded-0">
                    <div class="row">

                      <div class="card-img-actions-overlay card-img-top">
                        <a href="{{route('home.newslist.show', $List->title_slug)}}" 
                           class="btn btn-outline bg-white text-white border-white border-2" data-popup="lightbox">
                          @lang('home.detail')
                        </a>
                      </div>
                      <div class="col-4">
                        <img class="card-img-top img-fluid" 
                             src="{{asset('news/'.$List->newsimg->first()->datefolder.'/'.$List->newsimg->first()->filename)}}" alt="">
                      </div>
                      <div class="col-8">
                        <div class="news_title">
                          @if(session('locale')=='ru')
                          {{$List->title_news_ru}}
                          @else 
                          {{$List->title_news_uk}} 
                          @endif
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
                @empty
                <p style="font-size: 1.8em; font-weight: bolder">@lang('home.wait.news')</p>
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection