@extends('home.layout.index')
@section('title','Переможці ІІ етапу Всеукраїнських студентських олімпіад')
@section('content')
@php
  $olymp_winners_big_images = asset('/photos/olymp_winner/together/olymp_big_images');
  $olymp_winners_stage = asset('/photos/olymp_winner/together/olymp_stage');
@endphp
<div class="card card-body rounded-0 border-0 mt-1">
  <div class='row'>
    <div class="col-md-12 text-center text-uppercase">
      <h2>@yield('title')</h2>
    </div>
  </div>

  <div class="row ">
    <div class="col-md-12">
      <p class="text-center" style="font-size: 24px; font-weight: bolder;">Переможці ІІ етапу Всеукраїнських студентських олімпіад в 2019 році</p>
    </div> 
  </div>

  <div class="row ">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Безпека життєдіяльності»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img  src="{{$olymp_winners_stage}}/olimp_bj1_19.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Ковальчук Анастасія Євгенівна</i> – Диплом І ступеня</b> (гр. ФЕБ-201)<br>
            <b><i>Купріна Наталія Михайлівна</i></b> - декан факультету Економіки, бізнесу і контролю <br>
            <b><i>Фесенко Олена Олександрівна</i></b> - завідувач кафедри Безпеки життєдіяльності<br>
            <b><i>Булюк Володимир Іванович</i></b> - керівник, старший викладач кафедри Безпеки життєдіяльності<br>
            <b><i>Сахарова Зінаїда Миколаївна</i></b> - керівник, старший викладач кафедри Безпеки  життєдіяльності
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Цивільний захист»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/olimp_cz_19.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Кругляк Юлія Олександрівна</i> - Диплом І ступеня</b> (гр. ТТП-57)<br>
            <b><i>Шарахматова Тетяна Євгенівна</i></b> - декан факультету Технології та товарознавства харчових продуктів і продовольчого бізнесу <br>
            <b><i>Фесенко Олена Олександрівна </i></b>- завідувач кафедри Безпеки життєдіяльності<br>
            <b><i>Булюк Володимир Іванович</i></b> - керівник, старший викладач кафедри Безпеки життєдіяльності<br>
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Екологічна безпека»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/loo_eb2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Лось Ольга Олегівна</i> - Диплом ІІ ступеня</b> (гр. Е-435)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Крусір Галина Всеволодівна</i></b> - керівник - завідувач  кафедри Екології та природоохоронних технологій, професор<br>
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Автоматизація і комп’ютерно-інтегровані технології»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/dav_akit2019.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Драндар Андрій Валерійович</i> Диплом І ступеня - <i>СВО магістр</i></b> (гр. Ам-11)<br>
            <b><i>Світий Іван Миколайович</i></b> - декан факультету Комп’ютерних систем та автоматизації<br>
            <b><i>Хобін Віктор Андрійович</i></b> – керівник - завідувач кафедри Автоматизації технологічних процесів і робототехнічних систем, професор, доктор технічних наук <br>
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Основи охорони праці»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img  src="{{$olymp_winners_stage}}/dsv_oog2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Даниленко Сергій Володимирович</i> Диплом ІІ ступеня </b>(гр. А-41) <br>
            <b><i>Світий Іван Миколайович</i></b> - декан факультету Комп’ютерних систем та автоматизації <br>
            <b><i>Фесенко Олена Олександрівна</i></b> - завідувач кафедри Безпеки життєдіяльності <br>
            <b><i>Неменуща Світлана Миколаївна</i></b> - керівник, старший викладач кафедри Безпеки життєдіяльності <br>
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада  зі спеціальності «Автоматизація і комп’ютерно-інтегровані технології»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/gvv_akit2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Гуцан Владислав Володимирович</i>  Диплом ІІІ ступеня – <i>СВО бакалавр</i></b>  (гр. А-40)<br>
            <b><i>Світий Іван Миколайович</i></b> - декан факультету Комп’ютерних систем та автоматизації<br>
            <b><i>Хобін Віктор Андрійович</i></b> – керівник - завідувач  кафедри Автоматизації технологічних процесів і робототехнічних систем, професор <br>
            <b><i>Мазур Олександр Васильович</i></b> – керівник, доцент кафедри Автоматизації технологічних процесів і робототехнічних систем, кандидат технічних наук 
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Технологія питної води та водопідготовки харчових виробництв»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/sir_tpvvhv2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Селіванов Ілля Романович</i> Диплом І - ступеня – <i>СВО магістр</i></b> (гр. ТВКП-52б)<br>
            <b><i>Саркисян Ганна Овсепівна</i></b> - факультету Технології вина та туристичного бізнесу<br>
            <b><i>Коваленко Олена Олександрівна</i></b> – керівник, завідувач кафедри Біоінженерії і води, старший науковий співробітник
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Технологія питної води та водопідготовки харчових виробництв»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/weo_tpvvhv2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Шаповал Євгеній Олександрович</i> Диплом ІІ ступеня -<i>СВО бакалавр</i></b> ( гр. ТВКП-42б)<br>
            <b><i>Саркисян Ганна Овсепівна</i></b> - факультету Технології вина та туристичного бізнесу<br>
            <b><i>Коваленко Олена Олександрівна</i></b> – керівник, завідувач кафедри Біоінженерії і води, старший науковий співробітник
            <b><i>Ємонакова Оксана Олександрівна</i></b> – керівник, доцент кафедри Біоінженерії і води, кандидат технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Холодильні машини та установки»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/krv_hmu2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Клімашенко Роман Вікторович</i> Диплом І ступеня -<i>СВО магістр</i></b> (гр.151м)<br>
            <b><i>Жихарєва Наталія Василівна</i></b> - декан факультету Низькотемпературної техніки та інженерної механіки<br>
            <b><i>Хмельнюк Михайло Георгійович</i></b> – завідувач кафедри Холодильних установок і кондиціювання повітря<br>
            <b><i>Желіба Юрій Олександрович </i></b> – керівник доцент кафедри Холодильних установок і кондиціювання повітря, кандидат технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Холодильні машини та установки»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/wmo_hmu2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Шараєв Максим Олександрович</i> Диплом ІІ ступеня -<i>СВО бакалавр</i></b> (гр.130)<br>
            <b><i>Жихарєва Наталія Василівна</i></b> - декан факультету Низькотемпературної техніки та інженерної механіки<br>
            <b><i>Соколовська-Єфіменко Вікторія Вікторівна</i></b> – керівник, доцент кафедри Кріогенної техніки, кандидат технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності – «Харчові технології»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/goo_ht2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Голіков Олександр Олегович</i> Диплом ІІІ ступеня -<i>ОСВ магістр</i></b> (гр. ТЛМ-507)<br>
            <b><i>Тележенко Любов Миколаївна</i></b> – керівник завідувач кафедри Технології ресторанного і оздоровчого харчування, професор, доктор технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Пожежна безпека»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/yayo_pb2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Ярмолович Юлія Олексіївна</i> Диплом ІІІ ступеня</b>(гр. ТЗС -437)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Крусір Галина Всеволодівна </i></b> – керівник - завідувач кафедри Екології та природоохоронних технологій, профессор, доктор технічних наук, доктор технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Загальна Екологія»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/oav_ze2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Отян Аліна Володимирівна</i> Диплом ІІІ ступеня </b>(гр. Е-435)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Крусір Галина Всеволодівна </i></b> – керівник - завідувач кафедри Екології та природоохоронних технологій, профессор, доктор технічних наук, доктор технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Технології захисту навколишнього середовища»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/emi_tzns2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Єненко Марина Ігорівна</i> Диплом ІІ ступеня -<i>ОСВ бакалавр</i></b>(гр. ТЗС-437)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Крусір Галина Всеволодівна </i></b> – керівник - завідувач кафедри Екології та природоохоронних технологій, профессор, доктор технічних наук, доктор технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Технології захисту навколишнього середовища»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/chaia_tzns2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Чайковська Ірина Анатоліївна</i> Диплом ІІІ ступеня -<i>ОСВ магістр</i></b>(гр. ТЗС-437)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Крусір Галина Всеволодівна </i></b> – керівник - завідувач кафедри Екології та природоохоронних технологій, профессор, доктор технічних наук, доктор технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Рекреалогія»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/zuv_r2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Златова Юлія Василівна</i> Диплом ІІ ступеня</b>(гр.ТМ-311)<br>
            <b><i>Саркисян Ганна Овсепівна</i></b> - декан факультету Технології вина та туристичного бізнесу<br>
            <b><i>Меліх Олена Олександрівна</i></b> – завідувач кафедри Туристичного бізнесу та рекреалогії<br>
            <b><i>Орлова Марія Леонідівна</i></b> – керівник, доцент кафедри Туристичного бізнесу та рекреалогії, кандидат географічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Робототехніка»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/zey_rob2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Заславский Євген Юрійович</i> Диплом ІІ ступеня</b>(гр.А-30б)<br>
            <b><i>Світий Іван Миколайович</i></b> - декан факультету Комп’ютерних систем та автоматизації<br>
            <b><i>Єгоров Віктор Богданович</i></b> –  керівник, старший викладач кафедри Автоматизації технологічних процесів і робототехнічних систем, кандидат технічних наук
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Психологія»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/kvp_ps2019.jpg" alt="" height="250px" ></a></td>
          <td width="50%">
            <b><i>Кирилова Валентина Петрівна</i> Диплом ІІ ступеня</b>(гр. ЕМ-261)<br>
            <b><i>Агеєва Ірина Миколаївна</i></b> - декан факультету Менеджменту маркетингу і логістики<br>
            <b><i>Соловей Анатолій Олександрович</i></b> –  завідувач кафедри Соціології, філософії і права, доцент. Кандидат історичних наук<br>
            <b><i>Черкаський Андрій Олександрович</i></b> - керівник, доцент  кафедри Соціології, філософії і права, кандидат історичних наук<br>
          </td>
        </tr>
      </table>
    </div>
  </div>




  <div class="row ">
    <div class="col-md-12">
      <p class="text-center" style="font-size: 24px; font-weight: bolder;">Переможці ІІ етапу Всеукраїнських студентських олімпіад в 2018 році</p>
    </div> 
  </div>
  <div class="row ">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Безпека життєдіяльності»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img  src="{{$olymp_winners_stage}}/bj.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Курдоглова Марія Петрівна</i> –Диплом І ступеня</b> (гр.ФЕБ-231)<br>
            <b><i>Купріна Наталія Михайлівна</i></b> - декан факультету Економіки, бізнесу і контролю <br>
            <b><i>Фесенко Олена Олександрівна</i></b> -завідувач кафедри Безпеки життєдіяльності<br>
            <b><i>Булюк Володимир Іванович</i></b> -керівник, старший викладач кафедри Безпеки життєдіяльності
          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Цивільний захист»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/cz.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Павлів Любомир Володимирович</i> Диплом І ступеня</b> (гр. ГН-459)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Фесенко Олена Олександрівна </i></b>- завідувач кафедри Безпеки життєдіяльності<br>
            <b><i>Булюк Володимир Іванович</i></b> - керівник, старший викладач кафедри Безпеки життєдіяльності<br>
            <b><i>Швець Віктор Григорович</i></b> - керівник, старший викладач кафедри Безпеки життєдіяльності

          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Екологічна безпека»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/eb.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Кифоренко Валерія Євгенівна</i> Диплом ІІ ступеня</b> (гр. Е-445)<br>
            <b><i>Шпирко Тетяна Василівна</i></b> - декан факультету Нафти, газу та екології <br>
            <b><i>Крусір Галина Всеволодівна</i></b> - керівник - завідувач  кафедри Екології та природоохоронних технологій, професор<br>
          </td>
        </tr>
      </table>

      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Автоматизація і комп’ютерно-інтегровані технології»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/akit.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Драндар Андрій Валерійович</i> Диплом І ступеня – <i>ступінь бакалавр</i></b> (гр. А-41) <br>
            <b><i>Світий Іван Миколайович</i></b> - декан факультету Комп’ютерних систем та автоматизації<br>
            <b><i>Хобін Віктор Андрійович</i></b> – керівник - завідувач  кафедри Автоматизації технологічних процесів і робототехнічних систем, професор <br>

          </td>
        </tr>
      </table>

      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада з дисципліни «Основи охорони праці»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img  src="{{$olymp_winners_stage}}/oop.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Драндар Андрій Валерійович</i> Диплом ІІ ступеня </b>(гр. А-41) <br>
            <b><i>Світий Іван Миколайович</i></b> - декан ф-ту Комп’ютерних систем та автоматизації <br>
            <b><i>Фесенко Олена Олександрівна</i></b> -завідувач кафедри Безпеки життєдіяльності <br>
            <b><i>Неменуща Світлана Миколаївна</i></b> - керівник, старший викладач кафедри Безпеки життєдіяльності <br>

          </td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада  зі спеціальності «Автоматизація і комп’ютерно-інтегровані технології»</td></tr>
        <tr>
          <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/akit2.jpg" alt="" height="250px" ></a></td>

          <td width="50%">
            <b><i>Ємельянов Олег Андрійович</i>  Диплом ІІІ ступеня – <i>ступінь магістр</i> </b> (гр. Ам-10)<br>
            <b><i>Світий Іван Миколайович - декан факультету Комп’ютерних систем та автоматизації<br>
                <b><i>Хобін Віктор Андрійович</i></b> – керівник - завідувач  кафедри Автоматизації технологічних процесів і робототехнічних систем, професор 

                </td>
                </tr>
                </table>
                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Готельно-ресторанна справа»</td></tr>
                  <tr>
                    <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/grs1.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i> Коваленко Анастасія Юріївна</i> Диплом І-ступеня, <i>ступінь магістр</i></b><br>
                      <b><i> Д’яконова Анджела Костянтинівна</i></b> – завідувач кафедри Готельно-ресторанного бізнесу<br>
                      <b><i>Трішин Федір Анатолійович</i></b> - проректор з науково-педагогічної та навчальної роботи<br>
                      <b><i> Дишкантюк Оксана Володимирівна</i></b> - декан факультету Інноваційних технологій харчування і ресторанно-готельного бізнесу<br>
                      <b><i>Новічкова Тамара Петрівна</i></b> – керівник доцент кафедри Готельно-ресторанного бізнесу 
                    </td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Готельно-ресторанна справа»</td></tr>
                  <tr>
                    <td width="50%" ><a class="popuplink" href="#"><img src="{{$olymp_winners_stage}}/grs2.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i>Осипова Олександра Олександрівна</i> Диплом ІІ- ступеня, <i>ступінь бакалавр</i></b><br>
                      <b><i>Д’яконова Анджела Костянтинівна</i></b> – завідувач кафедри Готельно-ресторанного бізнесу<br>
                      <b><i>Дишкантюк Оксана Володимирівна</i></b> - декан факультету Інноваційних технологій харчування і ресторанно-готельного бізнесу<br>
                      <b><i>рішин Федір Анатолійович</i></b> - проректор з науково-педагогічної та навчальної роботи<br>
                      <b><i>Коваленко  Наталія Олександрівна</i></b> – керівник доцент кафедри Готельно-ресторанного бізнесу <br>
                    </td>
                  </tr>
                </table>

                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Технологія питної води та водопідготовки харчових виробництв»
                    </td></tr>
                  <tr>
                    <td width="50%" ><a class="popuplink" href="images/bigimage_etap/P5290838.jpg"><img src="{{$olymp_winners_stage}}/tpvvhv1.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i>Коханська Ангеліна Василівна</i> Диплом І - ступеня – <i>ступінь магістр</i></b><br>
                      <b><i>Саркисян Ганна Овсепівна</i></b> - факультету Технології вина та туристичного бізнесу<br>
                      <b><i>Коваленко Олена Олександрівна</i></b> – керівник, завідувач  кафедри Біоінженерії і води 

                    </td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада зі спеціальності «Технологія питної води та водопідготовки харчових виробництв»
                    </td></tr>
                  <tr>
                    <td width="50%" ><a class="popuplink" href="images/bigimage_etap/P5290841.jpg">
                        <img src="{{$olymp_winners_stage}}/tpvvhv2.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i>Лисенко Юлія Олександрівна</i> Диплом І-ступеня - <i>ступінь бакалавр</i></b><br>
                      <b><i>Саркисян Ганна Овсепівна</i></b> - декан факультету Технології вина та туристичного бізнесу<br>
                      <b><i>Коваленко Олена Олександрівна</i></b> – завідувач  кафедри Біоінженерії і води <br>
                      <b><i>Ємонакова Оксана Олександрівна</i></b> - керівник, доцент  кафедри Біоінженерії і води

                    </td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Міжнародний мовно-літературний конкурс ім. Т.Г. Шевченка</td></tr>
                  <tr>
                    <td width="50%" >
                      <a class="popuplink" href="images/bigimage_etap/P4110409.jpg">
                        <img src="{{$olymp_winners_stage}}/mml1.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i>Маркевич  Лариса Сергіївна</i> Диплом І-ступеня </b><br>
                      <b><i>Саркисян Ганна Овсепівна</i></b> - декан факультету Технології вина та туристичного бізнесу<br>
                      <b><i>Віват Ганна Іванівна</i></b> – завідувач кафедри Українознавства і лінгводидактики <br>
                      <b><i>Філіпенко Ольга Іванівна</i></b> – керівник старший викладач кафедри Українознавства і лінгводидактики<br>

                    </td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Міжнародний мовно-літературний конкурс ім. Т.Г. Шевченка</td></tr>
                  <tr>
                    <td width="50%" >
                      <a class="popuplink" href="images/bigimage_etap/P4110413.jpg">
                        <img src="{{$olymp_winners_stage}}/mml2.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i>Сухецька Єлизавета Вікторівна</i> Диплом І-ступеня </b><br>
                      <b><i>Дишкантюк Оксана Володимирівна</i></b> - декан факультету Інноваційних технологій харчування і ресторанно-готельного бізнесу<br>
                      <b><i>Віват Ганна Іванівна</i></b> – завідувач кафедри Українознавства і лінгводидактики <br>
                      <b><i>Южакова Олена Іванівна</i></b> - керівник – доцент кафедри Українознавства і лінгводидактики<br>
                    </td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <tr><td colspan="2" class="text-center" style="font-size:18px;">Олімпіада  зі спеціальності – «Харчові технології»</td></tr>
                  <tr>
                    <td width="50%" >
                      <a class="popuplink" href="images/bigimage_etap/P5030585.jpg">
                        <img src="{{$olymp_winners_stage}}/ht.jpg" alt="" height="250px" ></a></td>

                    <td width="50%">
                      <b><i>Хрупчик Андрій Віталійович</i> Диплом ІІ ступеня </b><br>
                      <b><i>Шарахматова Тетяна Євгенівна</i></b> - декан факультету Технології та товарознавства харчових продуктів і продовольчого бізнесу<br>
                      <b><i>Ткаченко Наталія Андріївна</i></b> –завідувач кафедри  Технології молочних, олійно-жирових продуктів ікосметики<br>
                      <b><i>Чебанова Олена Борисівна</i></b> – керівник, доцент кафедри  Технології молочних, олійно-жирових продуктів ікосметики<br>
                      <b><i>Салавеліс Алла Дмитрівна</i></b>- керівник, доцент кафедри оздоровчого та ресторанного харчування<br>
                    </td>
                  </tr>
                </table>
                </div> 
                </div>


                </div>
                @endsection