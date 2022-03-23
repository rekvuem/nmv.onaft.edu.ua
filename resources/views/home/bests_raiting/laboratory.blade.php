@extends('home.layout.index')
@section('title','Результати огляд-конкурс на кращу навчальну лабораторію')
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-12 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <p class="text-center text-uppercase" style="font-size: 22px; font-weight: bolder;">  @yield('title') </p>
        </div>
      </div>
      <div class="row">
        <div class="btn-block btn-group">
          <a href="{{route('home.bestlaboratory', ['year'=>'2018'])}}" class="btn bg-blue-700">2018</a>
          <a href="{{route('home.bestlaboratory', ['year'=>'2019'])}}" class="btn bg-blue-700">2019</a>
          <a href="{{route('home.bestlaboratory', ['year'=>'2020'])}}" class="btn bg-blue-700">2020</a>
          <a href="{{route('home.bestlaboratory', ['year'=>'2021'])}}" class="btn bg-blue-700">2021</a>
        </div>
      </div>

      @IF(request()->query('year') == '2018')
      <div class="row">
        <div class="col-12">
          <p class="font-weight-blac font-weight-bold text-center" style="font-size: 1.2em;">2018</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="nav-link result_2018_gzik">За групою загально-інженерних кафедр</a>
          <a href="#" class="nav-link result_2018_gvk">За групою випускових кафедр</a>
          <a href="#" class="nav-link result_2018_kl">Комп'ютерні лабораторії</a>
        </div>
      </div>
      @endif


      @IF(request()->query('year') == '2019')
      <div class="row">
        <div class="col-12">
          <p class="font-weight-blac font-weight-bold text-center" style="font-size: 1.2em;">2019</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="nav-link result_2019_gzik">За групою загально-інженерних кафедр</a>
          <a href="#" class="nav-link result_2019_gvk">За групою випускових кафедр</a>
          <a href="#" class="nav-link result_2019_kl">Комп'ютерні лабораторії</a>
          <div class="col-12">
          </div>
          @endif

          @IF(request()->query('year') == '2020')
          <div class="row">
            <div class="col-12">
              <p class="font-weight-blac font-weight-bold text-center" style="font-size: 1.2em;">2020</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="#" class="nav-link result_2020_gzik">За групою загально-інженерних кафедр</a>
              <a href="#" class="nav-link result_2020_gvk">За групою випускових кафедр</a>
              <a href="#" class="nav-link result_2020_kl">Комп'ютерні лабораторії</a>
              <div class="col-12">
              </div>
              @endif
              
          @IF(request()->query('year') == '2021')
          <div class="row">
            <div class="col-12">
              <p class="font-weight-blac font-weight-bold text-center" style="font-size: 1.2em;">2021</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="#" class="nav-link result_2021_gzik">За групою загально-інженерних кафедр</a>
              <a href="#" class="nav-link result_2021_gvk">За групою випускових кафедр</a>
              <a href="#" class="nav-link result_2021_kl">Комп'ютерні лабораторії</a>
              <div class="col-12">
              </div>
              @endif
            </div>
          </div>
        </div>

        @endsection
        @section('page_script')
        <script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
        <script>
$(document).ready(function () {

  var swalInit = swal.mixin({
    allowOutsideClick: true,
    allowEscapeKey: true,
    allowEnterKey: true
  });

  $('.result_2018_gzik').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Біохімії, мікробіології та фізіології харчування</p>\n\
        <p>Безпеки життєдіяльності</p>\n\
        <p>Фізики і матеріалознавства</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2018_gvk').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Електромеханіки та мехатроніки</p>\n\
        <p>Готельно-ресторанного бізнесу</p>\n\
        <p>Холодильних установок і кондиціювання повітря</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2018_kl').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Автоматизації технологічних процесів і робототехнічних систем</p>\n\
        <p>Процесів, обладнання та енергетичного менеджменту</p>\n\
        <p>Менеджменту і логістики</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2019_gzik').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Безпеки життєдіяльності</p>\n\
        <p>Інженерної графіки та технічного дизайну</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2019_gvk').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Технології мяса, риби і морепродуктів</p>\n\
        <p>Технології ресторанного та оздоровчого харчування</p>\n\
        <p>Біоінженерії і води</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2019_kl').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Менеджменту і логістики</p>\n\
        <p>Обліку і аудиту</p>\n\
        <p>Маркетингу, підприємства і торгівлі</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });


  $('.result_2020_gzik').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Фізико-математичних наук</p>\n\
        <p>Безпеки життєдіяльності</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2020_gvk').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Технології хліба, кондитерських, макаронних виробів і харчоконцентратів</p>\n\
        <p>Технології вина та сенсорного аналізу</p>\n\
        <p>Холодильних установок і кондиціювання повітря</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2020_kl').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Автоматизації технологічних процесів і робототехнічних систем</p>\n\
        <p>Обліку і аудиту</p>\n\
        <p>Інформаційних технологій та кібербезпеки</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });



  $('.result_2021_gzik').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>за блок лабораторії за напрямком Мікробіологія - кафедра Біохімії, мікробіології та фізіології харчування</p>\n\
        <p><hr></p>\n\
        <p>за блок лабораторії за напрямком Бехпека життєдіяльності - кафедра Безпеки життєдіяльності та дизайну</p>\n\
        <p><hr></p>\n\
        <p>за блок лабораторії за напрямком Фізика - кафедра Фізико-матиматичних наук</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.result_2021_gvk').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Технології зерна і комбікормів</p>\n\
<p><hr></p>\n\
        <p>Технології хліба, кондитерських, макаронних виробів і харчоконцентратів</p>\n\
<p><hr></p>\n\
        <p>Технологічного обладнання зернових виробництв</p>\n\
<p><hr></p>\n\
        <p>Кріогенної техніки</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });


  $('.result_2021_kl').on('click', function () {
    swalInit.fire({
      html: '<div style="font-size:18px">\n\
        <p>Автоматизації технологічних процесів і робототехнічних систем</p>\n\
<p><hr></p>\n\
        <p>Комп`ютерної інженерії</p>\n\
<p><hr></p>\n\
        <p>Менеджменту і логістики</p>\n\
        </div>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });










});
        </script>
        @endsection