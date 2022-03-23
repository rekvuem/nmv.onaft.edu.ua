@extends('home.layout.index')
@section('title','Результати конкурсу у номінаціях на звання')
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
          <a href="{{route('home.bestteachears', ['year'=>'2018'])}}" class="btn bg-blue-700">2018</a>
          <a href="{{route('home.bestteachears', ['year'=>'2019'])}}" class="btn bg-blue-700">2019</a>
          <a href="{{route('home.bestteachears', ['year'=>'2020'])}}" class="btn bg-blue-700">2019/2020н.р.</a>
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
          <div><a href="#" class="nav-link navlink_result_2018_kpa">Кращий професор академії</a></div>
          <div><a href="#" class="nav-link navlink_result_2018_kda">Кращий доцент академії</a></div>
          <div><a href="#" class="nav-link navlink_result_2018_ksvaa">Кращий старший викладач, викладач академії</a></div>
          <div><a href="#" class="nav-link navlink_result_2018_kaa">Кращий асистент академії</a></div>
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
          <a href="#" class="nav-link navlink_result_2019_kpa">Кращий професор академії</a>
          <a href="#" class="nav-link navlink_result_2019_kda">Кращий доцент академії</a>
          <a href="#" class="nav-link navlink_result_2019_ksvaa">Кращий старший викладач, викладач академії</a>
          <a href="#" class="nav-link navlink_result_2019_kaa">Кращий асистент академії</a>
          <div class="col-12">
          </div>
          @endif

          @IF(request()->query('year') == '2020')
          <div class="row">
            <div class="col-12">
              <p class="font-weight-blac font-weight-bold text-center" style="font-size: 1.2em;">2019/2020н.р.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="#" data-toggle="modal" data-target="#navlink_result_2020_kzka" class="nav-link">Рейтингування завідувачів кафедрами</a>
              <a href="#" data-toggle="modal" data-target="#navlink_result_2020_kpa" class="nav-link">Рейтингування професорів</a>
              <a href="#" data-toggle="modal" data-target="#navlink_result_2020_kda" class="nav-link">Рейтингування доцентів</a>
              <a href="#" data-toggle="modal" data-target="#navlink_result_2020_ksvaa" class="nav-link">Рейтингування старших викладачів</a>
              <a href="#" data-toggle="modal" data-target="#navlink_result_2020_kaa" class="nav-link">Рейтингування асистентів</a>
              <div class="col-12">
              </div>
              @endif
            </div>
          </div>
        </div>

        <div id="navlink_result_2020_kzka" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Рейтингування завідувачів кафедрами</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">		
                <table class="table table-bordered">
                  <thead><tr><th>№ з/п</th><th>Кафедра</th><th>ПІБ</th><th>Рейтинговий бал</th></tr></thead>
                  <tbody>            
                    <tr><td>1</td><td>КТ</td><td>Симоненко Юрій Михайлович</td><td>3895</td></tr>
                    <tr><td>2</td><td>ТРіОХ</td><td>Тележенко Любов Миколаївна</td><td>2839</td></tr>
                    <tr><td>3</td><td>ПОтаЕМ</td><td>Бурдо Олег Григорович</td><td>2474</td></tr>
                    <tr><td>4</td><td>УБ</td><td>Басюркіна Наталя Йосипівна</td><td>2451</td></tr>
                    <tr><td>5</td><td>ЕтаПТ</td><td>Крусір Галина Всеволодівна</td><td>2440</td></tr>
                    <tr><td>6</td><td>ТБтаР</td><td>Меліх Олена Олександрівна</td><td>2310</td></tr><tr><td>7</td><td>БМтаФХ</td><td>Капрельянц Леонід Вікторович</td><td>1985</td></tr><tr><td>8</td><td>КІ</td><td>Артеменко Сергій Вікторович</td><td>1767</td></tr><tr><td>9</td><td>ТтаМС</td><td>Верхівкер Яков Григорович</td><td>1755</td></tr><tr><td>10</td><td>УтаЛ</td><td>Віват Ганна Іванівна</td><td>1678</td></tr><tr><td>11</td><td>ТМОЖПтаІК</td><td>Ткаченко Наталія Андріївна</td><td>1587</td></tr><tr><td>12</td><td>ТОЗВ</td><td>Гапонюк Олег Іванович	</td><td>1444</td></tr><tr><td>13</td><td>ТХКМВтаХ</td><td>Іоргачева Катерина Георгіївна	</td><td>1281</td></tr><tr><td>14</td><td>НТІтаТ</td><td>Тітлов Олександр Сергійович	</td><td>1280,8</td></tr> <tr><td>15</td><td>ТКіБ</td><td>Макаринська Алла Василівна	</td><td>1260</td></tr><tr><td>16</td><td>МПіТ</td><td>Лагодієнко Володимир Вікторович	</td><td>1178</td></tr><tr><td>17</td><td>ТВтаСА</td><td>Ткаченко Оксана Борисівна	</td><td>1168</td></tr><tr><td>18</td><td>ТФтаПЕ</td><td>Семенюк Юрій Володимирович</td><td>1149</td></tr><tr><td>19</td><td>ТДтаВЕ</td><td>Дорошенко Олександр Вікторович	</td><td>1140</td></tr><tr><td>20</td><td>ОтаА</td><td>Немченко Валерій Вікторович	</td><td>1136,75</td></tr><tr><td>21</td><td>БіВ</td><td>Коваленко Олена Олександрівна</td><td>1127</td></tr>  <tr><td>22</td><td>АТПіРС</td><td>Хобін Віктор Андрійович	</td><td>1100</td></tr> <tr><td>23</td><td>КтаПА</td><td>Мілованов Валерій Іванович	</td><td>1021</td></tr> <tr><td>24</td><td>ТМРіМ</td><td>Віннікова Людмила Григорівна</td><td>978</td></tr>  <tr><td>25</td><td>ЕП</td><td>Павлов Олександр Іванович	</td><td>934</td></tr>  <tr><td>26</td><td>БЖД</td><td>Фесенко Олена Олександрівна	</td><td>916,5</td></tr> <tr><td>27</td><td>ТЗЗ</td><td>Станкевич Георгій Миколайович	</td><td>911</td></tr> <tr><td>28</td><td>ФМН</td><td>Сергєєва Олександра Євгенівна	</td><td>911</td></tr>  <tr><td>29</td><td>ТПЗ</td><td>Жигунов Дмитро Олександрович	</td><td>855</td></tr> <tr><td>30</td><td>ГРБ</td><td>Лебеденко Тетяна Євгенівна	</td><td>773</td></tr> <tr><td>31</td><td>ХУіКП</td><td>Хмельнюк Михайло Георгійович</td><td>750</td></tr> <tr><td>32</td><td>СФіП</td><td>Соловей Анатолій Олександрович	</td><td>719</td></tr> <tr><td>33</td><td>ЕМтаІГ</td><td>Галіулін Анатолій Агзамович	</td><td>681</td></tr>   <tr><td>34</td><td>ХХтаЕ</td><td>Капустян Антоніна Іванівна	</td><td>647</td></tr> <tr><td>35</td><td>ІТтаКБ</td><td>Плотніков Валерій Михайлович	</td><td>598</td></tr>  <tr><td>36</td><td>ІМ</td><td>Зінченко Олена Сергіївна</td><td>482</td></tr>       <tr><td>37</td><td>ФКтаС</td><td>Струк Богдан Іванович</td><td>430</td></tr> </tbody> 
                </table>
              </div>
              <div class="modal-footer btn-group">          
                <button type="button" class="btn bg-danger-800" data-dismiss="modal">Закрити</button>
              </div>
            </div>
          </div>
        </div>

        <div id="navlink_result_2020_kpa" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Рейтингування професорів</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">		
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>№ з/п</th>
                      <th>Кафедра</th>
                      <th>ПІБ</th>
                      <th>Рейтинговий бал</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>ТтаПЕ</td>
                      <td>Цикало Альфред Леонідович</td>
                      <td >6473</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>КТ</td>
                      <td>Бондаренко Віталій Леонідович</td>
                      <td >5200</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>ТДтаВЕ</td>
                      <td>Хлієва Ольга Яківна</td>
                      <td >3832</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>ТтаПЕ</td>
                      <td>Желєзний Віталій Петрович</td>
                      <td>3379</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>МіЛ</td>
                      <td>Ніколюк Олена Володимирівна</td>
                      <td >2975</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>ТтаПЕ</td>
                      <td>Якуб Лідія Миколаївна</td>
                      <td >2553</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>ТКіБ</td>
                      <td>Єгоров Богдан Вікторович</td>
                      <td>2488</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>МіЛ</td>
                      <td>Седікова Ірина
                        Олександрівна</td>
                      <td>2486</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>ПОтаЕМ</td>
                      <td>Ватренко Олександр Віталійович</td>
                      <td>1650</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>ЕМтаІГ</td>
                      <td>Амбарцумянц Робер Вачаганович</td>
                      <td >1588</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>КІ</td>
                      <td>Князева Ніна Олексіївна</td>
                      <td >1515</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>КТ</td>
                      <td>Морозюк Лариса Іванівна</td>
                      <td >1510</td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>БМтаФХ</td>
                      <td>Пилипенко Людмила Миколаївна</td>
                      <td >1193</td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>ФМН</td>
                      <td>Ліщенко Наталя Володимірівна</td>
                      <td>1135</td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>ПОтаЕМ</td>
                      <td >Гладушняк Олександр Карпович</td>
                      <td >1120</td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>ТтаВЕ</td>
                      <td>Косой Борис Володимирович</td>
                      <td>1098</td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td>ФМН</td>
                      <td>Федосов Сергій Никифорович</td>
                      <td>1071</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>ЕтаПТ</td>
                      <td>Цикало Альфред  Леонідович</td>
                      <td>986</td>
                    </tr>
                    <tr>
                      <td>19</td>
                      <td>КТ</td>
                      <td>Кравченко Михайло Борисович</td>
                      <td>983</td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td>НТІтаТ</td>
                      <td>Бошкова Ірина Леонідівна</td>
                      <td>860</td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>ТтаВЕ</td>
                      <td>Байдак Юрій Вікторович</td>
                      <td>813</td>
                    </tr>
                    <tr>
                      <td>22</td>
                      <td>ЕП</td>
                      <td>Самофатова Вікторія Анатоліївна</td>
                      <td>807</td>
                    </tr>
                    <tr>
                      <td>23</td>
                      <td>БіВ</td>
                      <td>Стрікаленко Тетяна Василівна</td>
                      <td>794</td>
                    </tr>
                    <tr>
                      <td>24</td>
                      <td>ТКіБ</td>
                      <td>Левицький Анатолій Павлович</td>
                      <td>715</td>
                    </tr>
                    <tr>
                      <td>25</td>
                      <td>ХХтаЕ</td>
                      <td>Черно Наталія Кирилівна</td>
                      <td>679</td>
                    </tr>
                    <tr>
                      <td>26</td>
                      <td>КТ</td>
                      <td>Троценко Олександр Володимирович</td>
                      <td>639</td>
                    </tr>
                    <tr>
                      <td>27</td>
                      <td>СФіП</td>
                      <td>Кирилюк Олександр Сергійович</td>
                      <td>598</td>
                    </tr>
                    <tr>
                      <td>28</td>
                      <td>ЕМтаІГ</td>
                      <td>Іванова Ліна Олександрівга</td>
                      <td>575</td>
                    </tr>
                    <tr>
                      <td>29</td>
                      <td>ГРБ</td>
                      <td>Д'яконова Анжела Костянтинівна</td>
                      <td>539</td>
                    </tr>
                    <tr>
                      <td>30</td>
                      <td>БіВ</td>
                      <td>Безусов Анатолій Тимофійович</td>
                      <td>498</td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>ФМН</td>
                      <td>Задорожний Василь Георгійович</td>
                      <td>494</td>
                    </tr>
                    <tr>
                      <td>32</td>
                      <td>МПіТ</td>
                      <td>Мардар Марина Ромиківна</td>
                      <td>445</td>
                    </tr>
                    <tr>
                      <td>33</td>
                      <td>НТІтаТ</td>
                      <td>Світлицький Віктор Михайлович</td>
                      <td>440</td>
                    </tr>
                    <tr>
                      <td>34</td>
                      <td>ФМН</td>
                      <td>Швець Валерій Тимофійович</td>
                      <td>410</td>
                    </tr>
                    <tr>
                      <td>35</td>
                      <td>ТМОЖПіК</td>
                      <td>Чагаровський Олександр Петрович</td>
                      <td>406</td>
                    </tr>
                    <tr>
                      <td>36</td>
                      <td>ТтаВЕ</td>
                      <td>Мазур Віктор Олександрович</td>
                      <td >340</td>
                    </tr>
                    <tr>
                      <td>37</td>
                      <td>НТІтаТ</td>
                      <td>Дорошенко Володимир Михайлович</td>
                      <td >320</td>
                    </tr>
                    <tr>
                      <td>38</td>
                      <td>ТВтаСА</td>
                      <td>Осипова Лариса Анатоліївна</td>
                      <td >315</td>
                    </tr>
                    <tr>
                      <td>39</td>
                      <td>ТКіБ</td>
                      <td>Карунський Олексій Йосипович</td>
                      <td >298</td>
                    </tr>
                    <tr>
                      <td>40</td>
                      <td>ХХтаЕ</td>
                      <td>Бельтюкова Світлана Вадимівна</td>
                      <td >270</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer btn-group">          
                <button type="button" class="btn bg-danger-800" data-dismiss="modal">Закрити</button>
              </div>
            </div>
          </div>
        </div>

        <div id="navlink_result_2020_kda" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Рейтингування доцентів</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">		
                <table class="table table-bordered">
                  <tr>
                    <th>№ з/п</th>
                    <th>Кафедра</th>
                    <th>ПІБ</th>
                    <th>Рейтинговий бал</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>МіЛ</td>
                    <td>Каламан Ольга
                      Борисівна</td>
                    <td>2628</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>ТБтаР</td>
                    <td>Трішин Федір Анатолійович</td>
                    <td>2266</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>ІТтаКБ</td>
                    <td>Ломовцев&nbsp;Павло Борисович</td>
                    <td>2250</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>ОіА</td>
                    <td>Купріна Наталя Михайлівна</td>
                    <td>1925</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td >ЕП</td>
                    <td>Дідух Сергій Мирославович</td>
                    <td>1752</td>
                  </tr>
                  <tr>
                    <td >6</td>
                    <td >ІТтаКБ</td>
                    <td >Антонова Альфія Раісівна</td>
                    <td>1683</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>СФіП</td>
                    <td>Тодорова Світлана Миколаївна</td>
                    <td>1597</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>ТРіОХ</td>
                    <td>Біленька Ірина Ремівна</td>
                    <td>1595</td>
                  </tr>
                  <tr >
                    <td>9</td>
                    <td>ПОтаЕМ</td>
                    <td>Всеволодов Олександр Миколайович</td>
                    <td>1590</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>МіЛ</td>
                    <td>Мужайло Василь Дмитрович</td>
                    <td>1570</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>ОіА</td>
                    <td>Іванченкова Лариса Володимирівна</td>
                    <td>1528</td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>ТтаПЕ</td>
                    <td>Зацерклянний Мелентій Мелентійович</td>
                    <td>1460</td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>УБ</td>
                    <td>Савченко Тетяна Вікторівна</td>
                    <td>1449</td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>ЕП</td>
                    <td>Фрум Ольга Леонідівна</td>
                    <td>1443</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>МіЛ</td>
                    <td>Козак Катерина Богданівна</td>
                    <td>1393</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>ПОтаЕМ</td>
                    <td>Безбах Ігор Віталійович</td>
                    <td>1350</td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td>СФіП</td>
                    <td>Дружкова Ірина Сергіївна</td>
                    <td>1347</td>
                  </tr>
                  <tr>
                    <td>18</td>
                    <td>ТМРіМ</td>
                    <td>Манолі Тетяна Анатоліївна</td>
                    <td>1330</td>
                  </tr>
                  <tr>
                    <td>19</td>
                    <td>ХУіКП</td>
                    <td>Яковлева Ольга Юріївна</td>
                    <td>1302</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>ФМН</td>
                    <td>Мураховський Валерій Генріхович</td>
                    <td>1285</td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td>БіВ</td>
                    <td>Афанасьєва Тетяна Миколаївна</td>
                    <td>1273</td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td>ТМОЖПіК</td>
                    <td>Шарахматова Тетяна Євгенівна</td>
                    <td>1255</td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td>ЕтаПТ</td>
                    <td>Мадані Марія Михайлівна</td>
                    <td>1246</td>
                  </tr>
                  <tr>
                    <td>24</td>
                    <td>ТОЗВ</td>
                    <td>Гончарук Ганна Анатоліївна</td>
                    <td>1242</td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td>ОіА</td>
                    <td>Ткачук Галина Олександрівна</td>
                    <td>1232</td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td>ЕтаПТ</td>
                    <td>Шевченко Роман Іванович</td>
                    <td>1212</td>
                  </tr>
                  <tr>
                    <td >27</td>
                    <td >ТтаВЕ</td>
                    <td >Бошков Леонід Зиновійович</td>
                    <td>1195</td>
                  </tr>
                  <tr>
                    <td>28</td>
                    <td>МіЛ</td>
                    <td>Корсікова Наталя Миколаївна</td>
                    <td>1192</td>
                  </tr>
                  <tr>
                    <td >29</td>
                    <td >ТЗЗ</td>
                    <td >Кац Анфіса Карпівна</td>
                    <td>1177</td>
                  </tr>
                  <tr>
                    <td>30</td>
                    <td>ТРіОХ</td>
                    <td>Салавеліс Алла Дмитрівна</td>
                    <td>1160</td>
                  </tr>
                  <tr>
                    <td>31</td>
                    <td>ТМРіМ</td>
                    <td>Паламарчук Ана Станіславівна</td>
                    <td>1144</td>
                  </tr>
                  <tr>
                    <td >32</td>
                    <td >КТ</td>
                    <td>Брюханова Зінаїда Антонівна</td>
                    <td>1140</td>
                  </tr>
                  <tr>
                    <td>33</td>
                    <td >ТЗЗ</td>
                    <td >Овсянникова Людмила Костянтинівна</td>
                    <td>1137</td>
                  </tr>
                  <tr>
                    <td >34</td>
                    <td >ТЗЗ</td>
                    <td >Дмитренко Лариса Дмитрівна</td>
                    <td>1137</td>
                  </tr>
                  <tr>
                    <td >35</td>
                    <td >ТЗЗ</td>
                    <td >Борта Алла Василівна</td>
                    <td>1137</td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td >ТЗЗ</td>
                    <td >Валевська Людмила
                      Олександрівна</td>
                    <td>1137</td>
                  </tr>
                  <tr>
                    <td >37</td>
                    <td >ТРіОХ</td>
                    <td >Колесніченко Світлана Леонтіївна</td>
                    <td>1109</td>
                  </tr>
                  <tr>
                    <td >38</td>
                    <td >ТМРіМ</td>
                    <td >Поварова Наталя Миколаївна</td>
                    <td  >1108</td>
                  </tr>
                  <tr>
                    <td >39</td>
                    <td >ЕтаПТ</td>
                    <td >Гаркович Олексій Леонтійович</td>
                    <td>1108</td>
                  </tr>
                  <tr>
                    <td >40</td>
                    <td >ТВтаСА</td>
                    <td >Радіонова Ольга Вікторівна</td>
                    <td >1076</td>
                  </tr>
                  <tr>
                    <td >41</td>
                    <td >ТХКМВіХ</td>
                    <td >Хвостенко Катерина Володимирівна</td>
                    <td>1049</td>
                  </tr>
                  <tr>
                    <td >42</td>
                    <td >ТВтаСА</td>
                    <td>Тітлова Ольга Олександрівна</td>
                    <td>1048</td>
                  </tr>
                  <tr>
                    <td >43</td>
                    <td >ТРіОХ</td>
                    <td >Козонова Юлія Олександрівна</td>
                    <td>1046</td>
                  </tr>
                  <tr>
                    <td >44</td>
                    <td >ПОтаЕМ</td>
                    <td >Зиков Олександр Вікторович</td>
                    <td>1040</td>
                  </tr>
                  <tr>
                    <td>45</td>
                    <td >ТРіОХ</td>
                    <td >Калугіна Ірина Михайлівна</td>
                    <td>1032</td>
                  </tr>
                  <tr>
                    <td>46</td>
                    <td >ТМОЖПіК</td>
                    <td >Дец Надія Олександрівна</td>
                    <td >1029</td>
                  </tr>
                  <tr>
                    <td >47</td>
                    <td >ТРіОХ</td>
                    <td >Дзюба Надія Анатоліївна</td>
                    <td>1005</td>
                  </tr>
                  <tr>
                    <td >48</td>
                    <td >ПОтаЕМ</td>
                    <td >Терзієв Сергій Георгійович</td>
                    <td>1000</td>
                  </tr>
                  <tr>
                    <td >49</td>
                    <td >ЕМтаІГ</td>
                    <td >Ломовцев Борис Андрійович</td>
                    <td>956</td>
                  </tr>
                  <tr>
                    <td >50</td>
                    <td >ТМОЖПіК</td>
                    <td >Ланженко Любов Олександрівна</td>
                    <td>956</td>
                  </tr>
                  <tr>
                    <td >51</td>
                    <td >МПіТ</td>
                    <td >Кордзая Натела Ревазівна</td>
                    <td >952</td>
                  </tr>
                  <tr>
                    <td>52</td>
                    <td>ТЗЗ</td>
                    <td>Страхова Тетяна Василівна</td>
                    <td>945</td>
                  </tr>
                  <tr>
                    <td >53</td>
                    <td >КІ</td>
                    <td >Жуковецька Світлана Леонідівна</td>
                    <td>935</td>
                  </tr>
                  <tr>
                    <td >54</td>
                    <td >БіВ</td>
                    <td >Ільєва Олена Сергіївна</td>
                    <td>932</td>
                  </tr>
                  <tr>
                    <td>55</td>
                    <td >ІТтаКБ</td>
                    <td >Котлик Сергій Валентинович</td>
                    <td>932</td>
                  </tr>
                  <tr>
                    <td>56</td>
                    <td>ЕтаПТ</td>
                    <td>Кузнецова Ірина Олександрівна</td>
                    <td>928</td>
                  </tr>
                  <tr>
                    <td >57</td>
                    <td >ТРіОХ</td>
                    <td >Дідух Генадій Васильович</td>
                    <td>910</td>
                  </tr>
                  <tr>
                    <td >58</td>
                    <td >ТБтаР</td>
                    <td>Крупіца Ірина Вікторівна</td>
                    <td>886</td>
                  </tr>
                  <tr>
                    <td>59</td>
                    <td >ІТтаКБ</td>
                    <td>Селіванова Алла Віталіївна</td>
                    <td>884</td>
                  </tr>
                  <tr>
                    <td>60</td>
                    <td>ХУіКП</td>
                    <td>Жихарєва Наталя Віталіївна</td>
                    <td>880</td>
                  </tr>
                  <tr>
                    <td>61</td>
                    <td>ПОтаЕМ</td>
                    <td>Резнік Костянтин Вікторович</td>
                    <td>880</td>
                  </tr>
                  <tr>
                    <td>62</td>
                    <td>ОіА</td>
                    <td>Скляр Лариса Борисівна</td>
                    <td>867</td>
                  </tr>
                  <tr>
                    <td>63</td>
                    <td>ТМОЖПіК</td>
                    <td>Скрипніченко Дмитро Михайлович</td>
                    <td>864</td>
                  </tr>
                  <tr>
                    <td>64</td>
                    <td>БМтаФХ</td>
                    <td>Єгорова Антоніна Віткорівна</td>
                    <td>845</td>
                  </tr>
                  <tr>
                    <td>65</td>
                    <td>МіЛ</td>
                    <td>Колеснікова  Катерина Семенівна</td>
                    <td>845</td>
                  </tr>
                  <tr>
                    <td>66</td>
                    <td>ХУіКП</td>
                    <td>Когут Володимир Омельянович</td>
                    <td>840</td>
                  </tr>
                  <tr>
                    <td >67</td>
                    <td >ТХКМВіХ</td>
                    <td >Соколова Наталя Юріївна</td>
                    <td>824</td>
                  </tr>
                  <tr>
                    <td >68</td>
                    <td >БМтаФХ</td>
                    <td>Труфкаті Людмила Вікторівна</td>
                    <td>824</td>
                  </tr>
                  <tr>
                    <td >69</td>
                    <td >МПіТ</td>
                    <td >Лозовська Ганна Миколаївна</td>
                    <td >821</td>
                  </tr>
                  <tr>
                    <td >70</td>
                    <td >ТПЗ</td>
                    <td >Соц Сергій Михайлович</td>
                    <td>815</td>
                  </tr>
                  <tr>
                    <td >71</td>
                    <td >ТМОЖПіК</td>
                    <td >Чабанова Оксана Борисівна</td>
                    <td  >814</td>
                  </tr>
                  <tr>
                    <td >72</td>
                    <td >МПіТ</td>
                    <td >Донець Леся Яківна</td>
                    <td >808</td>
                  </tr>
                  <tr>
                    <td >73</td>
                    <td >ТБтаР</td>
                    <td >Калмикова Ірина Семенівна</td>
                    <td>798</td>
                  </tr>
                  <tr>
                    <td >74</td>
                    <td >ЕМтаІГ</td>
                    <td >Орлова Світлана Сергіївна</td>
                    <td>790</td>
                  </tr>
                  <tr>
                    <td >75</td>
                    <td >ЕМтаІГ</td>
                    <td >Шофул Ігор Іванович</td>
                    <td>775</td>
                  </tr>
                  <tr>
                    <td >76</td>
                    <td >ІТтаКБ</td>
                    <td >Ольшевська Ольга Володимирівна</td>
                    <td>775</td>
                  </tr>
                  <tr>
                    <td >77</td>
                    <td >НТІтаТ</td>
                    <td >Дьяченко Тетяна Вікторівна</td>
                    <td>771</td>
                  </tr>
                  <tr>
                    <td >78</td>
                    <td >ОіА</td>
                    <td>Мельник Юрій Миколайович</td>
                    <td>768</td>
                  </tr>
                  <tr>
                    <td >79</td>
                    <td >БіВ</td>
                    <td >Палвашова Ганна Ігорівна</td>
                    <td>761</td>
                  </tr>
                  <tr>
                    <td >80</td>
                    <td >ТБтаР</td>
                    <td >Ліганенко Маргарита Геннадіївна</td>
                    <td>761</td>
                  </tr>
                  <tr>
                    <td >81</td>
                    <td >ТМРіМ</td>
                    <td >Шлапак Галина Всеволодівна</td>
                    <td>755</td>
                  </tr>
                  <tr>
                    <td >82</td>
                    <td >ТХКМВіХ</td>
                    <td >Макарова Ольга Василівна</td>
                    <td>741</td>
                  </tr>
                  <tr>
                    <td >83</td>
                    <td >ОіА</td>
                    <td>Тарасова Олена Валентинівна</td>
                    <td>736</td>
                  </tr>
                  <tr>
                    <td >84</td>
                    <td >ТМРіМ</td>
                    <td >Азарова Надія Григорівна</td>
                    <td>731</td>
                  </tr>
                  <tr>
                    <td>85</td>
                    <td >ХУіКП</td>
                    <td>Піщанська Нонна Олександрівна</td>
                    <td>729</td>
                  </tr>
                  <tr>
                    <td>86</td>
                    <td >БЖД</td>
                    <td >Лисюк Вікторія Миколаївна</td>
                    <td>726</td>
                  </tr>
                  <tr>
                    <td>87</td>
                    <td >ТРіОХ</td>
                    <td >Бурдо Алла Костянтинівна</td>
                    <td>707</td>
                  </tr>
                  <tr>
                    <td >88</td>
                    <td >КІ</td>
                    <td >Шестопалов Сергій Вікторович</td>
                    <td>703</td>
                  </tr>
                  <tr>
                    <td >89</td>
                    <td >БіВ</td>
                    <td>Доценко Наталя Вікторівна</td>
                    <td>702</td>
                  </tr>
                  <tr>
                    <td>90</td>
                    <td >ТРіОХ</td>
                    <td >Кашкано Мар'яна Анатоліївна</td>
                    <td>695</td>
                  </tr>
                  <tr>
                    <td >91</td>
                    <td >ТМРіМ</td>
                    <td >Савінок Оксана Миколаївна</td>
                    <td >694</td>
                  </tr>
                  <tr>
                    <td >92</td>
                    <td >ОіА</td>
                    <td>Євтушевська Ольга Олександрівна</td>
                    <td>690</td>
                  </tr>
                  <tr>
                    <td >93</td>
                    <td >УБ</td>
                    <td >Свистун Тетяна  Володимирівна</td>
                    <td>670</td>
                  </tr>
                  <tr>
                    <td >94</td>
                    <td >ТтаМС</td>
                    <td >Гарбажій Катерина Станіславівна</td>
                    <td  >670</td>
                  </tr>
                  <tr>
                    <td>95</td>
                    <td >ТОЗВ</td>
                    <td >Алексашин Олександр Васильович</td>
                    <td>668</td>
                  </tr>
                  <tr>
                    <td>96</td>
                    <td >МіЛ</td>
                    <td >Дроздова Валерія Анатоліївна</td>
                    <td>663</td>
                  </tr>
                  <tr>
                    <td >97</td>
                    <td >БМтаФХ</td>
                    <td>Шпирко Тетяна Василівна</td>
                    <td>655</td>
                  </tr>
                  <tr>
                    <td >98</td>
                    <td >ТМОЖПіК</td>
                    <td >Кручек Оксана Анатоліївна</td>
                    <td>650</td>
                  </tr>
                  <tr>
                    <td>99</td>
                    <td >ТБтаР</td>
                    <td>Саркісян Ганна Овсепівна</td>
                    <td>650</td>
                  </tr>
                  <tr>
                    <td>100</td>
                    <td >ХХтаЕ</td>
                    <td>Капустян Антоніна Іванівна</td>
                    <td>647</td>
                  </tr>
                  <tr>
                    <td>101</td>
                    <td >ХХтаЕ</td>
                    <td>Вікуль Світлана Іванівна</td>
                    <td>646</td>
                  </tr>
                  <tr>
                    <td>102</td>
                    <td >ТБтаР</td>
                    <td>Орлова Марія Леонідівна</td>
                    <td>640</td>
                  </tr>
                  <tr>
                    <td>103</td>
                    <td>КТ</td>
                    <td>Соколовська-Єфименко Вікторія Вікторівна</td>
                    <td>630</td>
                  </tr>
                  <tr>
                    <td>104</td>
                    <td>УБ</td>
                    <td>Вігуржинська Світлана Юріївна</td>
                    <td>629</td>
                  </tr>
                  <tr>
                    <td>105</td>
                    <td >КІ</td>
                    <td>Бондаренко Валерій Григорович</td>
                    <td>628</td>
                  </tr>
                  <tr>
                    <td>106</td>
                    <td >ХХтаЕ</td>
                    <td>Малинка Олена Валентинівна</td>
                    <td style='
                        '>622</td>
                  </tr>
                  <tr>
                    <td>107</td>
                    <td >ОіА</td>
                    <td>Маркова Тетяна Дмитрівна</td>
                    <td>617</td>
                  </tr>
                  <tr>
                    <td>108</td>
                    <td >МіЛ</td>
                    <td >Пурцхванідзе Ольга Вахтангівна</td>
                    <td>617</td>
                  </tr>
                  <tr>
                    <td>109</td>
                    <td>ТХКМВіХ</td>
                    <td>Солоницька Ірина Валеріївна</td>
                    <td>614</td>
                  </tr>
                  <tr>
                    <td >110</td>
                    <td >БЖД</td>
                    <td >Мирошніченко Олена Михайлівна</td>
                    <td>612</td>
                  </tr>
                  <tr>
                    <td>111</td>
                    <td >БіВ</td>
                    <td >Мирошніченко Олена Михайлівна</td>
                    <td>612</td>
                  </tr>
                  <tr>
                    <td>112</td>
                    <td >ІМ</td>
                    <td>Вереітіна Ірина Анатоліївна</td>
                    <td>605</td>
                  </tr>
                  <tr>
                    <td>113</td>
                    <td >ІМ</td>
                    <td>Попель Оксана Василівна</td>
                    <td>605</td>
                  </tr>
                  <tr>
                    <td>114</td>
                    <td >ГРБ</td>
                    <td >Харенко Дмитро Олександрович</td>
                    <td>603</td>
                  </tr>
                  <tr>
                    <td>115</td>
                    <td>ТКіБ</td>
                    <td>Турпурова Тетяна Михайлівна</td>
                    <td>598</td>
                  </tr>
                  <tr>
                    <td>116</td>
                    <td >ПОтаЕМ</td>
                    <td>Яровий Ігор Іванович</td>
                    <td>596</td>
                  </tr>
                  <tr>
                    <td>117</td>
                    <td >ТКіБ</td>
                    <td >Бордун Тетяна Василівна</td>
                    <td>596</td>
                  </tr>
                  <tr>
                    <td>118</td>
                    <td >СФіП</td>
                    <td>Шевченко Ганна Анатоліївна</td>
                    <td>592</td>
                  </tr>
                  <tr>
                    <td>119</td>
                    <td >БіВ</td>
                    <td>Берегова Ольга Михайлівна</td>
                    <td>583</td>
                  </tr>
                  <tr>
                    <td>120</td>
                    <td >ТтаПЕ</td>
                    <td>Хлієва Ольга Яківна</td>
                    <td>579</td>
                  </tr>
                  <tr>
                    <td >121</td>
                    <td >СФіП</td>
                    <td>Мельник Юрій Миколайович</td>
                    <td>579</td>
                  </tr>
                  <tr>
                    <td>122</td>
                    <td>ТКіБ</td>
                    <td>Воєцька Олена Євгенівна</td>
                    <td>577</td>
                  </tr>
                  <tr>
                    <td>123</td>
                    <td >БМтаФХ</td>
                    <td>Кананихіна Олена Миколаївна</td>
                    <td>575</td>
                  </tr>
                  <tr>
                    <td >124</td>
                    <td >ТМОЖПіК</td>
                    <td >Котляр Євген Олександрович</td>
                    <td  >573</td>
                  </tr>
                  <tr>
                    <td>125</td>
                    <td >ХУіКП</td>
                    <td>Желіба Юрій Олександрович</td>
                    <td>573</td>
                  </tr>
                  <tr>
                    <td >126</td>
                    <td >КТ</td>
                    <td>Цветковська Лариса Никифорівна</td>
                    <td>573</td>
                  </tr>
                  <tr>
                    <td >127</td>
                    <td >УіЛ</td>
                    <td >Южакова Олена Іванівна</td>
                    <td>571</td>
                  </tr>
                  <tr>
                    <td >128</td>
                    <td >ТКіБ</td>
                    <td >Лапінська Алла Петрівна</td>
                    <td>570</td>
                  </tr>
                  <tr>
                    <td>129</td>
                    <td >ТМРіМ</td>
                    <td>Кушніренко Надія Михайлівна</td>
                    <td>570</td>
                  </tr>
                  <tr>
                    <td>130</td>
                    <td >МіЛ</td>
                    <td >Відоменко Ірина Олександрівна</td>
                    <td>567</td>
                  </tr>
                  <tr>
                    <td>131</td>
                    <td>ТМРіМ</td>
                    <td>Агунова Лариса Володимирівна</td>
                    <td>561</td>
                  </tr>
                  <tr>
                    <td>132</td>
                    <td>ЕМтаІГ</td>
                    <td>Субботіна Марина Іванівна</td>
                    <td>560</td>
                  </tr>
                  <tr>
                    <td>133</td>
                    <td>МПіТ</td>
                    <td>Черевата Тетяна Михайлівна</td>
                    <td>557</td>
                  </tr>
                  <tr>
                    <td>134</td>
                    <td>МПіТ</td>
                    <td>Голубьонкова Олена Олексіївна</td>
                    <td>555</td>
                  </tr>
                  <tr>
                    <td>135</td>
                    <td>ІТтаКБ</td>
                    <td>Корнієнко Юрій Костянтинович</td>
                    <td>554</td>
                  </tr>
                  <tr>
                    <td>136</td>
                    <td>ТХКМВіХ</td>
                    <td>Аветісян Каріне Валерівна</td>
                    <td>550</td>
                  </tr>
                  <tr>
                    <td>137</td>
                    <td>БіВ</td>
                    <td>Ляпіна Олена Василівна</td>
                    <td>545</td>
                  </tr>
                  <tr>
                    <td>138</td>
                    <td>ТВтаСА</td>
                    <td>Каменева Наталя Валеріївна</td>
                    <td>541</td>
                  </tr>
                  <tr>
                    <td>139</td>
                    <td>ГРБ</td>
                    <td>Федосова Катерина Сергіївна</td>
                    <td>533</td>
                  </tr>
                  <tr>
                    <td>140</td>
                    <td >ТПЗ</td>
                    <td>Кустов Ігор Олександрович</td>
                    <td>526</td>
                  </tr>
                  <tr>
                    <td>141</td>
                    <td >БМтаФХ</td>
                    <td>Килименчук Олена Олександрівна</td>
                    <td>526</td>
                  </tr>
                  <tr>
                    <td>142</td>
                    <td >ОіА</td>
                    <td>Васьковська Катерина Олександрівна</td>
                    <td>519</td>
                  </tr>
                  <tr>
                    <td>143</td>
                    <td >КІ</td>
                    <td>Жирнова Тетяна Миколаївна</td>
                    <td>518</td>
                  </tr>
                  <tr>
                    <td>144</td>
                    <td>ТПЗ</td>
                    <td>Волошенко Ольга
                      Сергіївна</td>
                    <td>516</td>
                  </tr>
                  <tr>
                    <td>145</td>
                    <td >ТВтаСА</td>
                    <td>Мельник Ірина Василівна</td>
                    <td>514</td>
                  </tr>
                  <tr>
                    <td>146</td>
                    <td >ЕП</td>
                    <td>Лобоцька Людмила Леонідівна</td>
                    <td>510</td>
                  </tr>
                  <tr>
                    <td>147</td>
                    <td >КтаПА</td>
                    <td >Ярошенко Валерій Михайлович</td>
                    <td>507</td>
                  </tr>
                  <tr>
                    <td>148</td>
                    <td >ХУіКП</td>
                    <td>Зімін Олексій В'ячеславівна</td>
                    <td>500</td>
                  </tr>
                  <tr>
                    <td>149</td>
                    <td >НТІтаТ</td>
                    <td>Василів Олег Богданович</td>
                    <td>497</td>
                  </tr>
                  <tr>
                    <td>150</td>
                    <td >ТКіБ</td>
                    <td >Фігурська Людмила Володимирівна</td>
                    <td>495</td>
                  </tr>
                  <tr>
                    <td>151</td>
                    <td >ЕП</td>
                    <td>Кулаковська Тетяна Анатоліївна</td>
                    <td>495</td>
                  </tr>
                  <tr>
                    <td>152</td>
                    <td >АТПіРС</td>
                    <td>Скаковський Юрій Михайлович</td>
                    <td>490</td>
                  </tr>
                  <tr>
                    <td>153</td>
                    <td >ТХКМВіХ</td>
                    <td >Павловський Сергій Миколайович</td>
                    <td>489</td>
                  </tr>
                  <tr>
                    <td>154</td>
                    <td>ТПЗ</td>
                    <td>Хоренжий Наталія Василівна</td>
                    <td>488</td>
                  </tr>
                  <tr>
                    <td>155</td>
                    <td>ТМРіМ</td>
                    <td>Патюков Сергій Дмитрович</td>
                    <td>487</td>
                  </tr>
                  <tr>
                    <td>156</td>
                    <td>ТКіБ</td>
                    <td>Ворона Ніна В'ячеславівна</td>
                    <td>485</td>
                  </tr>
                  <tr>
                    <td>157</td>
                    <td>ТОЗВ</td>
                    <td>Ліпін Андрій Павлович</td>
                    <td>475</td>
                  </tr>
                  <tr>
                    <td>158</td>
                    <td >ОіА</td>
                    <td>Ступницька Тетяна Михайлівна</td>
                    <td>475</td>
                  </tr>
                  <tr>
                    <td >159</td>
                    <td >ТМОЖПіК</td>
                    <td >Севастьянова Олена Володимирівна</td>
                    <td  >472</td>
                  </tr>
                  <tr>
                    <td>160</td>
                    <td >ГРБ</td>
                    <td >Солоницька Ірина
                      Валеріївна</td>
                    <td>469</td>
                  </tr>
                  <tr>
                    <td >161</td>
                    <td >ЕМтаІГ</td>
                    <td >Аванесьянц Азат
                      Георгійович</td>
                    <td>465</td>
                  </tr>
                  <tr>
                    <td >162</td>
                    <td >ТХКМВіХ</td>
                    <td >Гордієнко Людмила
                      Василівна</td>
                    <td>456</td>
                  </tr>
                  <tr>
                    <td>163</td>
                    <td >БМтаФХ</td>
                    <td>Охотська Марія Ігорівна</td>
                    <td>455</td>
                  </tr>
                  <tr>
                    <td >164</td>
                    <td >ЕМтаІГ</td>
                    <td >Штепа Євген
                      Павлович</td>
                    <td>448</td>
                  </tr>
                  <tr>
                    <td >165</td>
                    <td >КІ</td>
                    <td>Сахарова Світлана Валеріївна</td>
                    <td>444</td>
                  </tr>
                  <tr>
                    <td>166</td>
                    <td >ФКтаС</td>
                    <td >Халайджі Світлана
                      Владиславівна</td>
                    <td>442</td>
                  </tr>
                  <tr>
                    <td>167</td>
                    <td >ЕтаПТ</td>
                    <td>Бондар Сергій Миколайович</td>
                    <td>440</td>
                  </tr>
                  <tr>
                    <td>168</td>
                    <td >ТМРіМ</td>
                    <td>Солецька Анна Данилівна</td>
                    <td>437</td>
                  </tr>
                  <tr>
                    <td>169</td>
                    <td >БіВ</td>
                    <td>Нікітчіна&nbsp;Тетяна Іванівна</td>
                    <td>434</td>
                  </tr>
                  <tr>
                    <td>170</td>
                    <td >ТРіОХ</td>
                    <td >Атанасова Віта
                      Вікторівна</td>
                    <td>434</td>
                  </tr>
                  <tr>
                    <td>171</td>
                    <td >ТХКМВіХ</td>
                    <td >Котузаки Олена
                      Миколаївна</td>
                    <td>428</td>
                  </tr>
                  <tr>
                    <td>172</td>
                    <td >АТПіРС</td>
                    <td>Муратов Віктор Георгійович</td>
                    <td>420</td>
                  </tr>
                  <tr>
                    <td>173</td>
                    <td >КІ</td>
                    <td>Лисенко Наталя Олексіївна</td>
                    <td>420</td>
                  </tr>
                  <tr>
                    <td>174</td>
                    <td >ФМН</td>
                    <td >Коновенко Надія
                      Георгіївна</td>
                    <td>416</td>
                  </tr>
                  <tr>
                    <td>175</td>
                    <td >УБ</td>
                    <td >Бровкина Юлія
                      Олексіївна</td>
                    <td>415</td>
                  </tr>
                  <tr>
                    <td >176</td>
                    <td >БМтаФХ</td>
                    <td>Велічко Тетяна Олексіївна</td>
                    <td>415</td>
                  </tr>
                  <tr>
                    <td>177</td>
                    <td >ГРБ</td>
                    <td >Кравчук Тетяна
                      Вікторівна</td>
                    <td>414</td>
                  </tr>
                  <tr>
                    <td>178</td>
                    <td >ІМ</td>
                    <td>Огреніч Марія Анатоліївна</td>
                    <td>410</td>
                  </tr>
                  <tr>
                    <td >179</td>
                    <td >ТВтаСА</td>
                    <td>Ходаков Олексій Леонідович</td>
                    <td >409</td>
                  </tr>
                  <tr>
                    <td>180</td>
                    <td >ІМ</td>
                    <td>Яковлєва Марина Леонідівна</td>
                    <td>408</td>
                  </tr>
                  <tr>
                    <td>181</td>
                    <td >ХХтаЕ</td>
                    <td>Науменко Кристина Ігорівна</td>
                    <td >404</td>
                  </tr>
                  <tr>
                    <td >182</td>
                    <td >ХУіКП</td>
                    <td >Подмазко Олександр Степанович</td>
                    <td>404</td>
                  </tr>
                  <tr>
                    <td >183</td>
                    <td >ЕМтаІГ</td>
                    <td >Розіна Олена
                      Юріївна</td>
                    <td>403</td>
                  </tr>
                  <tr>
                    <td >184</td>
                    <td >МПіТ</td>
                    <td >Бахчиванжи Людмила Анатоліївна</td>
                    <td>403</td>
                  </tr>
                  <tr>
                    <td >185</td>
                    <td >КтаП</td>
                    <td >Подмазко Ігор Олександрович</td>
                    <td>402</td>
                  </tr>
                  <tr>
                    <td >186</td>
                    <td >КтаП</td>
                    <td >Буданов Василь Олексійович</td>
                    <td>401</td>
                  </tr>
                  <tr>
                    <td  >187</td>
                    <td >ПОтаЕМ</td>
                    <td>Войтенко Олександр Кирилович</td>
                    <td>396</td>
                  </tr>
                  <tr>
                    <td >188</td>
                    <td >СФіП</td>
                    <td >Шишко Олександр Григорович</td>
                    <td>395</td>
                  </tr>
                  <tr>
                    <td>189</td>
                    <td>ЕМтаІГ</td>
                    <td>Бабіч Владислав Федорович</td>
                    <td>394</td>
                  </tr>
                  <tr>
                    <td>190</td>
                    <td>СФіП</td>
                    <td>Черкаський Андрій Володимирович</td>
                    <td>390</td>
                  </tr>
                  <tr>
                    <td>191</td>
                    <td>ЕП</td>
                    <td>Крупіна Світлана Валеріївна</td>
                    <td>388</td>
                  </tr>
                  <tr>
                    <td>192</td>
                    <td>ФМН</td>
                    <td>Федченко Юлія Степанівна</td>
                    <td>387</td>
                  </tr>
                  <tr>
                    <td>193</td>
                    <td>КтаП</td>
                    <td>Яковлев Юрій Олександрович</td>
                    <td>383</td>
                  </tr>
                  <tr>
                    <td>194</td>
                    <td>ТХКМВіХ</td>
                    <td>Толстих Вікторія Юріївна</td>
                    <td>381</td>
                  </tr>
                  <tr>
                    <td>195</td>
                    <td>НТІтаТ</td>
                    <td>Кологривов Михайло Михайлович</td>
                    <td>380</td>
                  </tr>
                  <tr>
                    <td>196</td>
                    <td >АТПіРС</td>
                    <td>Воінова Світлана Олександрівна</td>
                    <td>376</td>
                  </tr>
                  <tr>
                    <td >197</td>
                    <td >УіЛ</td>
                    <td >Машарова Ярослава Василівна</td>
                    <td>375</td>
                  </tr>
                  <tr>
                    <td  
                      >198</td>
                    <td >ПОтаЕМ</td>
                    <td
                      >Мординський Всеволод Петрович</td>
                    <td>374</td>
                  </tr>
                  <tr>
                    <td  
                      >199</td>
                    <td >АТПіРС</td>
                    <td
                      >Гончаренко Олександр Євгенович</td>
                    <td>372</td>
                  </tr>
                  <tr>
                    <td  
                      >200</td>
                    <td >ГРБ</td>
                    <td >Новічкова Тамара
                      Петрівна</td>
                    <td>365</td>
                  </tr>
                  <tr>
                    <td  
                      >201</td>
                    <td >КІ</td>
                    <td
                      >Бобрікова Ірина Сергіївна</td>
                    <td>358</td>
                  </tr>
                  <tr>
                    <td  
                      >202</td>
                    <td >ТПЗ</td>
                    <td >Чумаченко Юрій
                      Дмитрович</td>
                    <td>357</td>
                  </tr>
                  <tr>
                    <td  
                      >203</td>
                    <td >УБ</td>
                    <td >Колесник Володимир
                      Іванович</td>
                    <td>353</td>
                  </tr>
                  <tr>
                    <td  
                      >204</td>
                    <td >ЕП</td>
                    <td
                      >Яблонська Наталя Валентинівна</td>
                    <td>350</td>
                  </tr>
                  <tr>
                    <td  
                      >205</td>
                    <td >ТтаПЕ</td>
                    <td
                      >Чухрій Юрій Пантелійович</td>
                    <td>350</td>
                  </tr>
                  <tr>
                    <td  
                      >206</td>
                    <td >ТОЗВ</td>
                    <td 
                      >Солдатенко Леонід Семенович</td>
                    <td>345</td>
                  </tr>
                  <tr>
                    <td  
                      >207</td>
                    <td >НТІтаТ</td>
                    <td
                      >Волгушева Наталя Вікторівна</td>
                    <td>343</td>
                  </tr>
                  <tr>
                    <td  
                      >208</td>
                    <td >НТІтаТ</td>
                    <td
                      >Сагала Тетяна Анатоліївна</td>
                    <td>334</td>
                  </tr>
                  <tr>
                    <td  
                      >209</td>
                    <td >ГРБ</td>
                    <td >Саламатіна
                      Світлана Єгорівна</td>
                    <td>331</td>
                  </tr>
                  <tr>
                    <td  
                      >210</td>
                    <td >ХХтаЕ</td>
                    <td
                      >Озоліна Софія Олександрівна</td>
                    <td 
                      >330</td>
                  </tr>
                  <tr>
                    <td  
                      >211</td>
                    <td >АТПіРС</td>
                    <td
                      >Гурський Олександр Олександрович</td>
                    <td>330</td>
                  </tr>
                  <tr>
                    <td  
                      >212</td>
                    <td >КТ</td>
                    <td 
                      >Гайдук Сергій Васильович</td>
                    <td>330</td>
                  </tr>
                  <tr>
                    <td  
                      >213</td>
                    <td >КІ</td>
                    <td
                      >Нєнов Олексій Леонідович</td>
                    <td>330</td>
                  </tr>
                  <tr>
                    <td  
                      >214</td>
                    <td >ФМН</td>
                    <td >Вітюк Антоніна
                      Віткорівна</td>
                    <td 
                      >327</td>
                  </tr>
                  <tr>
                    <td  
                      >215</td>
                    <td >ГРБ</td>
                    <td >Тітомир Людмила
                      Анатоліївна</td>
                    <td>324</td>
                  </tr>
                  <tr>
                    <td>216</td>
                    <td>ФМН</td>
                    <td>Черевко Євген
                      Володимирович</td>
                    <td>319</td>
                  </tr>
                  <tr>
                    <td>217</td>
                    <td>КІ</td>
                    <td>Зіменко Лілія Миколаївна</td>
                    <td>317</td>
                  </tr>
                  <tr>
                    <td>218</td>
                    <td>ГРБ</td>
                    <td>Халілова-Чуваєва Юлія Олександрівна</td>
                    <td>316</td>
                  </tr>
                  <tr>
                    <td>219</td>
                    <td >ХХтаЕ</td>
                    <td>Гураль Лариса Сергіївна</td>
                    <td>311</td>
                  </tr>
                  <tr>
                    <td>220</td>
                    <td>ГРБ</td>
                    <td>Коваленко Наталя Олександрівна</td>
                    <td>310</td>
                  </tr>
                  <tr>
                    <td>221</td>
                    <td >ХХтаЕ</td>
                    <td>Антіпіна Олена Олексіївна</td>
                    <td>307</td>
                  </tr>
                  <tr>
                    <td>222</td>
                    <td >НТІтаТ</td>
                    <td>Альтман Елла Іллівна</td>
                    <td>305</td>
                  </tr>
                  <tr>
                    <td>223</td>
                    <td>УБ</td>
                    <td>Шалений Володимир Анатолійович</td>
                    <td>287</td>
                  </tr>
                  <tr>
                    <td>224</td>
                    <td>КІ</td>
                    <td>Кальченко Анастасія Сергіївна</td>
                    <td>285</td>
                  </tr>
                  <tr>
                    <td>225</td>
                    <td>ТтаВЕ</td>
                    <td>Подмазко Олександр Степанович</td>
                    <td>283</td>
                  </tr>
                  <tr>
                    <td>226</td>
                    <td>АТПіРС</td>
                    <td>Левінський Валерій Михайлович</td>
                    <td>278</td>
                  </tr>
                  <tr>
                    <td>227</td>
                    <td >КІ</td>
                    <td>Рибалов Борис Олександрович</td>
                    <td>277</td>
                  </tr>
                  <tr>
                    <td>228</td>
                    <td>КІ</td>
                    <td>Барабаш Тетяна Миколаївна</td>
                    <td>271</td>
                  </tr>
                  <tr>
                    <td>229</td>
                    <td>ХХтаЕ</td>
                    <td>Лівенцова Олена Олегівна</td>
                    <td>260</td>
                  </tr>
                  <tr>
                    <td>230</td>
                    <td>АТПіРС</td>
                    <td>Світий Іван Миколайович</td>
                    <td>260</td>
                  </tr>
                  <tr>
                    <td>231</td>
                    <td>КІ</td>
                    <td>Слушна Наталія Василівна</td>
                    <td>253</td>
                  </tr>
                  <tr>
                    <td>232</td>
                    <td>ТХКМВіХ</td>
                    <td>Коркач Ганна Володимирівна</td>
                    <td>251</td>
                  </tr>
                  <tr>
                    <td>233</td>
                    <td>ОіА</td>
                    <td>Іванченков В'ячеслав Сергійович</td>
                    <td>251</td>
                  </tr>
                  <tr>
                    <td>234</td>
                    <td>ІТтаКБ</td>
                    <td>Макоєд Наталя Олексіївна</td>
                    <td>248</td>
                  </tr>
                  <tr>
                    <td>235</td>
                    <td>ТОЗВ</td>
                    <td>Шипко Ігор Михайлович</td>
                    <td>237</td>
                  </tr>
                  <tr>
                    <td>236</td>
                    <td>ОіА</td>
                    <td>Ощепков Олександр Петрович</td>
                    <td>228</td>
                  </tr>
                  <tr>
                    <td>237</td>
                    <td>ОіА</td>
                    <td>Антонюк Олег Петрович</td>
                    <td>219</td>
                  </tr>
                  <tr>
                    <td>238</td>
                    <td>ТРіОХ</td>
                    <td>Кісельов Сергій Вікторович</td>
                    <td>195</td>
                  </tr>
                  <tr>
                    <td>239</td>
                    <td>СФіП</td>
                    <td>Мордовець Марія Василівна</td>
                    <td>195</td>
                  </tr>
                  <tr>
                    <td>240</td>
                    <td>НТІтаТ</td>
                    <td>Лапардін Микола Інокентійович</td>
                    <td>194</td>
                  </tr>
                  <tr>
                    <td>241</td>
                    <td>ТтаВЕ</td>
                    <td>Дем’яненко Юрій Іванович</td>
                    <td>190</td>
                  </tr>
                  <tr>
                    <td>242</td>
                    <td>ТтаВЕ</td>
                    <td>Винаков Олександр Федорович</td>
                    <td>190</td>
                  </tr>
                  <tr>
                    <td>243</td>
                    <td>НТІтаТ</td>
                    <td>Потапов Михайло Дмитрович</td>
                    <td>180</td>
                  </tr>
                  <tr>
                    <td>244</td>
                    <td>ГРБ</td>
                    <td>Новічков Віктор Кузміч</td>
                    <td>163</td>
                  </tr>
                  <tr>
                    <td>245</td>
                    <td>ЕМтаІГ</td>
                    <td>Карпович Олег
                      Яковлевич</td>
                    <td>150</td>
                  </tr>
                  <tr>
                    <td>246</td>
                    <td>КІ</td>
                    <td>Колумба Ірина Вікторівна</td>
                    <td>144</td>
                  </tr>
                  <tr>
                    <td>247</td>
                    <td>ТКіБ</td>
                    <td>Федоряка Василь Петрович</td>
                    <td>120</td>
                  </tr>
                  <tr>
                    <td>248</td>
                    <td>ГРБ</td>
                    <td>Ряшко Галина Михайлійна</td>
                    <td>117</td>
                  </tr>
                  <tr>
                    <td>249</td>
                    <td>СФіП</td>
                    <td>Петракова Євгенія Робертівна</td>
                    <td>115</td>
                  </tr>
                  <tr>
                    <td>250</td>
                    <td>КІ</td>
                    <td>Сіренко Олександр Іванович</td>
                    <td>76</td>
                  </tr>
                  <tr>
                    <td>251</td>
                    <td>ПОтаЕМ</td>
                    <td>Кепін Микорла Іванович</td>
                    <td>60</td>
                  </tr>
                  <tr>
                    <td>252</td>
                    <td>ПОтаЕМ</td>
                    <td>Хомічук Віктор Андрійович</td>
                    <td>60</td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer btn-group">          
                <button type="button" class="btn bg-danger-800" data-dismiss="modal">Закрити</button>
              </div>
            </div>
          </div>
        </div>

        <div id="navlink_result_2020_ksvaa" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Рейтингування старших викладачів</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">		
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>№з/п</th>
                    <th>Кафедра</th>
                    <th>ПІБ</th>
                    <th>Рейтинговий бал</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td class=xl6316030  
                        none'>1</td>
                    <td class=xl6316030 >ІТтаКБ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Попков Денис Миколайович</td>
                    <td class=xl7116030>2356</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>2</td>
                    <td class=xl6316030 >ТЗЗ</td>
                    <td class=xl6316030 >Соколовська
                      Олена Григоріївна</td>
                    <td class=xl7116030>1137</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>3</td>
                    <td class=xl6316030 >ТтаМС</td>
                    <td class=xl6316030 >Мартиросян Ірина
                      Ашотівна</td>
                    <td class=xl7116030>919</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>4</td>
                    <td class=xl6316030 >КТ</td>
                    <td class=xl6716030 width=340 style='
                        width:255pt'>Бодюл Олена Станіславівна</td>
                    <td class=xl7116030>892</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>5</td>
                    <td class=xl6316030 >МПіТ</td>
                    <td class=xl6316030 >Соколюк Катерина
                      Юріївна</td>
                    <td class=xl7216030 >881</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>6</td>
                    <td class=xl6316030 >ТРіОХ</td>
                    <td class=xl6316030 >Жмудь Альона
                      Вікторівна</td>
                    <td class=xl7116030>866</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>7</td>
                    <td class=xl6316030 >МПіТ</td>
                    <td class=xl6316030 >Памбук Світлана
                      Андріївна</td>
                    <td class=xl7216030 >812</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>8</td>
                    <td class=xl6316030 >УБ</td>
                    <td class=xl6316030 >Константинова
                      Тетяна Віталіївна</td>
                    <td class=xl7116030>798</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>9</td>
                    <td class=xl6316030 >КТ</td>
                    <td class=xl6716030 width=340 style='
                        width:255pt'>Грудка Богдан Геннадійович</td>
                    <td class=xl7116030>768</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>10</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6316030 >Яготін Родіон
                      Сергійович</td>
                    <td class=xl7116030>724</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>11</td>
                    <td class=xl6316030 >МПіТ</td>
                    <td class=xl6316030 >Значек Рафаела
                      Рафаелівна</td>
                    <td class=xl7216030 >712</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>12</td>
                    <td class=xl6316030 >МПіТ</td>
                    <td class=xl6316030 >Брайко Марина
                      Герольдівна</td>
                    <td class=xl7216030 >695</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>13</td>
                    <td class=xl6316030 >СФіП</td>
                    <td class=xl6916030 width=340 style='
                        width:255pt'>Орлова Вікторія Олександрівна</td>
                    <td class=xl7116030>679</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>14</td>
                    <td class=xl6316030 >БЖД</td>
                    <td class=xl6316030 >Булюк Володимир
                      Іванович</td>
                    <td class=xl7116030>669</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>15</td>
                    <td class=xl6316030 >МіЛ</td>
                    <td class=xl6316030 >Дьяченко Юлія
                      Володимирівна</td>
                    <td class=xl7116030>662</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>16</td>
                    <td class=xl6316030 >ТБтаР</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Воскресенська Олена Володимирівна</td>
                    <td class=xl7116030>645</td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td class=xl6316030 >ХУіКП</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Трандафілов Володимир Володимирович</td>
                    <td class=xl7116030>630</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>18</td>
                    <td class=xl6316030 >ОіА</td>
                    <td class=xl6316030 >Стасюкова
                      Катерина Вікторівна</td>
                    <td class=xl7116030>624</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>19</td>
                    <td class=xl6316030 >СФіП</td>
                    <td class=xl6916030 width=340 style='
                        width:255pt'>Ботіка Тетяна Степанівна</td>
                    <td class=xl7116030>610</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>20</td>
                    <td class=xl6316030 >ЕтаПТ</td>
                    <td class=xl6316030 >Сагдєєва Ольга
                      Анісівна</td>
                    <td class=xl7116030>600</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>21</td>
                    <td class=xl6316030 >УіЛ</td>
                    <td class=xl6816030 width=340 style='
                        width:255pt'>Лупол Алла Вікторівна</td>
                    <td class=xl7116030>591</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>22</td>
                    <td class=xl6316030 >ІТтаКБ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Швець Наталія Василівна</td>
                    <td class=xl7116030>575</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>23</td>
                    <td class=xl6316030 >УіЛ</td>
                    <td class=xl6816030 width=340 style='
                        width:255pt'>Філіпенко Ольга Іванівна</td>
                    <td class=xl7116030>553</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>24</td>
                    <td class=xl6316030 >МіЛ</td>
                    <td class=xl6316030 >Бондар Вікторія
                      Анатоліївна</td>
                    <td class=xl7116030>551</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>25</td>
                    <td class=xl6316030 >СФіП</td>
                    <td class=xl6916030 width=340 style='
                        width:255pt'>Мамроцька Оксана Аркадіївна</td>
                    <td class=xl7116030>541</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>26</td>
                    <td class=xl6316030 >ІТтаКБ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Владімірова Валентина Борисівна</td>
                    <td class=xl7116030>533</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>27</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Сергєєва Тетяна Петрівна</td>
                    <td class=xl7116030>532</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>28</td>
                    <td class=xl6316030 >НТІтаТ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Георгієш Катерина Вікторівна</td>
                    <td class=xl7116030>527</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>29</td>
                    <td class=xl6316030 >БіВ</td>
                    <td class=xl6316030 >Новосельцева
                      Вікторія Вікторівна</td>
                    <td class=xl7116030>510</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>30</td>
                    <td class=xl6316030 >НТІтаТ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Солодка Антоніна Василівна</td>
                    <td class=xl7116030>501</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>31</td>
                    <td class=xl6316030 >БЖД</td>
                    <td class=xl6316030 >Неменуща
                      Світлана Миколаївна</td>
                    <td class=xl7116030>500</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>32</td>
                    <td class=xl6316030 >МПіТ</td>
                    <td class=xl6316030 >Євтушок Ольга
                      Василівна</td>
                    <td class=xl7216030 >490</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>33</td>
                    <td class=xl6316030 >ІТтаКБ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Бодюл Олена Станіславівна</td>
                    <td class=xl7116030>490</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>34</td>
                    <td class=xl6316030 >СФіП</td>
                    <td class=xl6916030 width=340 style='
                        width:255pt'>Осадча Ірина Анатоліївна</td>
                    <td class=xl7116030>486</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>35</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Павлюк Оксана Василівна</td>
                    <td class=xl7116030>455</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>36</td>
                    <td class=xl6316030 >ІМ</td>
                    <td class=xl6316030 >Шепель Марина
                      Євгенівна</td>
                    <td class=xl7116030>447</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>37</td>
                    <td class=xl6316030 >ІТтаКБ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Соколова Оксана Петрівна</td>
                    <td class=xl7116030>441</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>38</td>
                    <td class=xl6316030 >МіЛ</td>
                    <td class=xl6316030 >Бренер Олександр
                      Дмитрович</td>
                    <td class=xl7116030>440</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>39</td>
                    <td class=xl6316030 >МіЛ</td>
                    <td class=xl6316030 >Коренман Євгенія
                      Марківна</td>
                    <td class=xl7116030>426</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>40</td>
                    <td class=xl6316030 >ТБтаР</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Павлова Ірина Олександрівна</td>
                    <td class=xl7116030>405</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>41</td>
                    <td class=xl6316030 >ХУіКП</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Остапенко Олексій Володимирович</td>
                    <td class=xl7116030>395</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>42</td>
                    <td class=xl6316030 >НТІтаТ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Волчок Віктор олександрович</td>
                    <td class=xl7116030>389</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>43</td>
                    <td class=xl6316030 >ТМОЖПіК</td>
                    <td class=xl6316030 >Маковська Тетяна
                      Валентинівна</td>
                    <td class=xl7116030>386</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>44</td>
                    <td class=xl6316030 >ТтаПЕ</td>
                    <td class=xl6316030 >Івченко Дмитро
                      Олексанлрович</td>
                    <td class=xl7116030>327</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>45</td>
                    <td class=xl6316030 >УБ</td>
                    <td class=xl6316030 >Кривоногова
                      Ірина Геннадіївна</td>
                    <td class=xl7116030>318</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>46</td>
                    <td class=xl6316030 >ІТтаКБ</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Сіромля Сергій Григорович</td>
                    <td class=xl7116030>315</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>47</td>
                    <td class=xl6316030 >ОіА</td>
                    <td class=xl6316030 >Пчелянська Гаїна
                      Борисівна</td>
                    <td class=xl7116030>309</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>48</td>
                    <td class=xl6316030 >БЖД</td>
                    <td class=xl6316030 >Сахарова Зінаїда
                      Миколаївна</td>
                    <td class=xl7116030>300</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>49</td>
                    <td class=xl6316030 >МПіТ</td>
                    <td class=xl6316030 >Мунтян Ірина
                      Володимирівна</td>
                    <td class=xl7216030 >300</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>50</td>
                    <td class=xl6316030 >ТРіОХ</td>
                    <td class=xl6316030 >Голінська Яна
                      Андріївна</td>
                    <td class=xl7116030>296</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>51</td>
                    <td class=xl6316030 >ТтаВЕ</td>
                    <td class=xl6316030 >Грудка Богдан
                      Геннадійович</td>
                    <td class=xl7116030>291</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>52</td>
                    <td class=xl6316030 >ТБтаР</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Шекера Світлана Сергіївна</td>
                    <td class=xl7116030>285</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>53</td>
                    <td class=xl6316030 >ТВтаСА</td>
                    <td class=xl6316030 >Сугаченко Тетяна
                      Сергіївна</td>
                    <td class=xl7116030>283</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>54</td>
                    <td class=xl6316030 >ГРБ</td>
                    <td class=xl6316030 >Кожевнікова
                      Вікторія Олегівна</td>
                    <td class=xl7116030>282</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>55</td>
                    <td class=xl6316030 >ТКіБ</td>
                    <td class=xl6316030 >Цюндик Олексанлр
                      Григорович</td>
                    <td class=xl7116030>272</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>56</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6616030 width=340 style='
                        width:255pt'>Захлевська Тетяна Вікторівна</td>
                    <td class=xl7116030>271</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>57</td>
                    <td class=xl6316030 >ТРіОХ</td>
                    <td class=xl6316030 >Лазаренко
                      Наталія Анатоліївна</td>
                    <td class=xl7116030>270</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>58</td>
                    <td class=xl6316030 >ТПЗ</td>
                    <td class=xl6316030 >Кузьменко Юлія
                      Яковлівна</td>
                    <td class=xl7116030>269</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>59</td>
                    <td class=xl6316030 >ТМОЖПіК</td>
                    <td class=xl6316030 >Климентьєва
                      Ірина Олександрівна</td>
                    <td class=xl7116030>269</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>60</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Волкова Тетяна Володимирівна</td>
                    <td class=xl7116030>252</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>61</td>
                    <td class=xl6316030 >ГРБ</td>
                    <td class=xl6316030 >Асауленко
                      Наталія Валеріянівна<span style='mso-spacerun:yes'> </span></td>
                    <td class=xl7116030>250</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>62</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Лаговська Надія Георгіївна</td>
                    <td class=xl7116030>246</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>63</td>
                    <td class=xl6416030 >ЕП</td>
                    <td class=xl6316030 >Магденко
                      Світлана Олександрівна</td>
                    <td class=xl7116030>240</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>64</td>
                    <td class=xl6316030 >ТтаМС</td>
                    <td class=xl6316030 >Смокова Тетяна
                      Миколаївна</td>
                    <td class=xl7116030>230</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>65</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Гончарук Валерій Володимирович</td>
                    <td class=xl7116030>214</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>66</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Цапенко Людмила Миколаївна</td>
                    <td class=xl7116030>207</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>67</td>
                    <td class=xl6316030 >ТБтаР</td>
                    <td class=xl6516030 width=340 style='
                        width:255pt'>Шейда Голбат Камбіз Ахмадович</td>
                    <td class=xl7116030>197</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>68</td>
                    <td class=xl6316030 >ЕМтаІГ</td>
                    <td class=xl6316030 >Іваненко Євген
                      Вікторович</td>
                    <td class=xl7116030>175</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>69</td>
                    <td class=xl6316030 >ЕМтаІГ</td>
                    <td class=xl6316030 >Сагач Людмила
                      Миколаївна</td>
                    <td class=xl7116030>168</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>70</td>
                    <td class=xl6316030 >ФКтаС</td>
                    <td class=xl6616030 width=340 style='
                        width:255pt'>Болтоматіс Денис Васильович</td>
                    <td class=xl7116030>162</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>71</td>
                    <td class=xl6316030 >ЕМтаІГ</td>
                    <td class=xl6316030 >Польова Світлана
                      Євгенівна</td>
                    <td class=xl7116030>154</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>72</td>
                    <td class=xl6316030 >МіЛ</td>
                    <td class=xl6316030 >Левчук Юлія
                      Сергіївна</td>
                    <td class=xl7116030>145</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>73</td>
                    <td class=xl6316030 >ТВтаСА</td>
                    <td class=xl6416030 >Абрамова Тетяна
                      Борисівна</td>
                    <td class=xl7116030>131</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>74</td>
                    <td class=xl6316030 >ТВтаСА</td>
                    <td class=xl6316030 >Ткаченко Людмила
                      Олексіївна</td>
                    <td class=xl7116030>131</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>75</td>
                    <td class=xl6316030 >АТПіРС</td>
                    <td class=xl6316030 >Дубна Сергій
                      Михайлович</td>
                    <td class=xl7116030>123</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>76</td>
                    <td class=xl6316030 >СФіП</td>
                    <td class=xl6316030 >Самокиш Василь
                      Петрович</td>
                    <td class=xl7116030>110</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>77</td>
                    <td class=xl6316030 >ТПЗ</td>
                    <td class=xl6316030 >Донець Андрій
                      Олександрович</td>
                    <td class=xl7116030>103</td>
                  </tr>
                  <tr>
                    <td class=xl6316030  
                        none'>78</td>
                    <td class=xl6316030 >ФМН</td>
                    <td class=xl6316030 >Осадчук Євген
                      Олександрович</td>
                    <td class=xl7116030>15</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer btn-group">          
                <button type="button" class="btn bg-danger-800" data-dismiss="modal">Закрити</button>
              </div>
            </div>
          </div>
        </div>

        <div id="navlink_result_2020_kaa" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Рейтингування асистентів</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">		
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>№ з/п</th>
                    <th>Кафедра</th>
                    <th>Прізвище та ініціали</th>
                    <th>Рейтинговий бал</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td class=xl6325504  
                        none'>1</td>
                    <td class=xl6325504 >ТБтаР</td>
                    <td class=xl6325504 >Байрачна Оксана
                      Костянтинівна</td>
                    <td class=xl6825504>1249</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>2</td>
                    <td class=xl6425504 >ЕП</td>
                    <td class=xl6325504 >Татарик Ельвіра
                      Петрівна</td>
                    <td class=xl6825504>625</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>3</td>
                    <td class=xl6425504 >ПОтаЕМ</td>
                    <td class=xl6325504 >Левтринська Юлія
                      Олегівна</td>
                    <td class=xl6825504>570</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>4</td>
                    <td class=xl6325504 >МПіТ</td>
                    <td class=xl6325504 >Ковалів Інна
                      Олександрівна</td>
                    <td class=xl6825504>506</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>5</td>
                    <td class=xl6325504 >УБ</td>
                    <td class=xl6325504 >Немченко Ганна
                      Вікторівна</td>
                    <td class=xl6825504>503</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td class=xl6325504 >ІТтаКБ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Кононович Ірина Володимирівна</td>
                    <td class=xl6825504>489</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>7</td>
                    <td class=xl6325504 >УіЛ</td>
                    <td class=xl6325504 >Гриньків Ольга
                      Володимирівна</td>
                    <td class=xl6825504>424</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>8</td>
                    <td class=xl6325504 >ОіА</td>
                    <td class=xl6325504 >Баранюк Христина
                      Олександрівна</td>
                    <td class=xl6825504>376</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>9</td>
                    <td class=xl6325504 >ТтаМС</td>
                    <td class=xl6325504 >Луцькова
                      Вікторія Анатоліївна</td>
                    <td class=xl6825504>369</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>10</td>
                    <td class=xl6325504 >БМтаФХ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Швець Наталя Олександрівна</td>
                    <td class=xl6825504>353</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>11</td>
                    <td class=xl6325504 >ІТтаКБ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Болтач Світлана Вікторівна</td>
                    <td class=xl6825504>343</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>12</td>
                    <td class=xl6325504 >МПіТ</td>
                    <td class=xl6325504 >Долинська Олена
                      Олександрівна</td>
                    <td class=xl6825504>289</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>13</td>
                    <td class=xl6325504 >БМтаФХ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Пожіткова Лілія Георгіївна</td>
                    <td class=xl6825504>274</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>14</td>
                    <td class=xl6325504 >ТПЗ</td>
                    <td class=xl6325504 >Ковальова
                      Василина Петрівна</td>
                    <td class=xl6825504>273</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Добровольська Наталя Леонідівна</td>
                    <td class=xl6825504>256</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>16</td>
                    <td class=xl6325504 >КТ</td>
                    <td class=xl6325504 >Тишко Дмитро
                      Павлович</td>
                    <td class=xl6825504>250</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>17</td>
                    <td class=xl6325504 >МПіТ</td>
                    <td class=xl6325504 >Мільчева
                      Вікторія Василівна</td>
                    <td class=xl6825504>219</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>18</td>
                    <td class=xl6325504 >ІТтаКБ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Снігур Тетяна Сергіївна</td>
                    <td class=xl6825504>218</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>19</td>
                    <td class=xl6325504 >ЕМтаІГ</td>
                    <td class=xl6325504 >Ревенюк Тетяна
                      Анатоліївна</td>
                    <td class=xl6825504>213</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>20</td>
                    <td class=xl6325504 >ІТтаКБ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Бойцова Ольга Сергіївна</td>
                    <td class=xl6825504>179</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>21</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Кучер Олена Павлівна</td>
                    <td class=xl6825504>170</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>22</td>
                    <td class=xl6325504 >ОіА</td>
                    <td class=xl6325504 >Головаченко
                      Людмила Михайлівн<span style='display:none'>а</span></td>
                    <td class=xl6825504>161</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>23</td>
                    <td class=xl6325504 >ЕМтаІГ</td>
                    <td class=xl6325504 >Тутаєв Сергій
                      Валерійович</td>
                    <td class=xl6825504>152</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>24</td>
                    <td class=xl6325504 >ІТтаКБ</td>
                    <td class=xl6625504 width=276 style='
                        width:207pt'>Асланов Олексій Михайлович</td>
                    <td class=xl6825504>136</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>25</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Карпінська Лариса Людвигівна</td>
                    <td class=xl6825504>120</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>26</td>
                    <td class=xl6325504 >ГРБ</td>
                    <td class=xl6325504 >Жовтяк Карина
                      Олександрівна</td>
                    <td class=xl6825504>119</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>27</td>
                    <td class=xl6425504 >ПОтаЕМ</td>
                    <td class=xl6325504 >Ружицька Наталія
                      Володимирівна</td>
                    <td class=xl6825504>116</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>28</td>
                    <td class=xl6325504 >ГРБ</td>
                    <td class=xl6325504 >Кравченко Яна
                      Вікторівна</td>
                    <td class=xl6825504>97</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>29</td>
                    <td class=xl6325504 >ГРБ</td>
                    <td class=xl6325504 >Ткачук Оксана
                      Вікторівна</td>
                    <td class=xl6825504>93</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>30</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Безніс Поліна Миколаївна</td>
                    <td class=xl6825504>88</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>31</td>
                    <td class=xl6325504 >НТІтаТ</td>
                    <td class=xl6325504 >Бузовський
                      Віталій Петрович</td>
                    <td class=xl6825504>78</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>32</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Романюк Зофія Іванівна</td>
                    <td class=xl6825504>75</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>33</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Володіна Олена Петрівна</td>
                    <td class=xl6825504>60</td>
                  </tr>
                  <tr>
                    <td >34</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Турецький Віктор Олександрович</td>
                    <td class=xl6825504>50</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>35</td>
                    <td class=xl6325504 >БМтаФХ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Воловик Тетяна Миколаївна</td>
                    <td class=xl6825504>45</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>36</td>
                    <td class=xl6325504 >ІМ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Мартіросян Ганна Юріївна</td>
                    <td class=xl6825504>30</td>
                  </tr>
                  <tr>
                    <td class=xl6325504  
                        none'>37</td>
                    <td class=xl6325504 >ІТтаКБ</td>
                    <td class=xl6525504 width=276 style='
                        width:207pt'>Трач Олександр Романович</td>
                    <td class=xl6825504>25</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer btn-group">          
                <button type="button" class="btn bg-danger-800" data-dismiss="modal">Закрити</button>
              </div>
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

  $('.navlink_result_2018_kpa').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Крусір Галина Всеволодівна</td><td>15.946</td><td>зав. кафедри екології та природоохоронних технологій</td></tr><tr><td>Іоргачова Катерина Георгіївна</td><td>15.023</td><td>професор кафедри зав. кафедри технології хліба, кондитерських, макаронних виробів і харчоконцентратів</td></tr><tr><td>Віннікова Людмила Григорівна</td><td>14.988</td><td>зав. кафедри технології м’яса, риби і морепродуктів</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.navlink_result_2018_kda').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Жихарєва Наталія Віталіївна</td><td>14.652</td><td>доцент кафедри холодильних установок і кондиціювання повітря</td></tr><tr><td>Єгорова Антоніна Вікторівна</td><td>14.652</td><td>ддоцент кафедри біохімії, мікробіології та фізіології харчування</td></tr><tr><td>Голубьонкова Олена Олексіївна</td><td>10.26</td><td>доцент кафедра маркетингу, підприємництва і торгівлі</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.navlink_result_2018_ksvaa').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Скрипніченко Дмитро Михайлович</td><td>12.912</td><td>ст.викладач кафедри технології молока, жирів і парфумерно-косметичних засобів</td></tr><tr><td>Грищенко Інна Володимирівна</td><td>12.128</td><td>ст.викладача кафедри комп’ютерної інженерії</td></tr><tr><td>Кондратенко Ірина Петрівна</td><td>10.456</td><td>ст.викладач кафедри екології та природоохоронних технологій</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.navlink_result_2018_kaa').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Аветісян Карина Валеріївна</td><td>9.532</td><td>асистент кафедри технології хліба, кондитерських, макаронних виробів і харчоконцентратів</td></tr><tr><td>Кишеню Андрій В`ячеславович </td><td>8.892</td><td>асистент кафедри технології м’яса, риби і морепродуктів</td></tr><tr><td>Швець Наталія Олександрівна</td><td>8.057</td><td>асистент кафедри біохімії, мікробіології та фізіології харчування</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });


  $('.navlink_result_2019_kpa').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Желєзний Віталій Петрович</td><td>147.05</td><td>професор кафедри теплофізики та прикладної екології</td></tr><tr><td>Немченко Валерій Вікторович</td><td>145.79</td><td>професор кафедри обліку і аудиту</td></tr><tr><td>Безусов Анатолій Тимофійович</td><td>143.88</td><td>професор кафедри біоінженерії і води</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.navlink_result_2019_kda').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Єгорова Антоніна Вікторівна</td><td>148.8</td><td>доцент кафедри біохімії, мікробіології та фізіології харчування</td></tr><tr><td>Доценко Наталя Вікторівна</td><td>108.9</td><td>доцент кафедри біоінженерії і води</td></tr><tr><td>Толстих Вікторія Юріївна</td><td>102.6</td><td>доцентк афедри технології хліба, кондитерських, макаронних виробів і харчоконцентратів</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.navlink_result_2019_ksvaa').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Швець Наталя Василівна</td><td>129.0</td><td>ст. викладач кафедри інформаційних технологій та кібербезпеки</td></tr><tr><td>Остапенко Олексій Володимирович</td><td>121.3</td><td>ст. викладач кафедри холодильних установок і кондиціювання повітря</td></tr><tr><td>Неменуща Світлана Миколаївна</td><td>104.5</td><td>ст.викладач кафедри безпеки життєдіяльності</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

  $('.navlink_result_2019_kaa').on('click', function () {
    swalInit.fire({
      html: '<table class="table table-bordered"><tbody><tr><td>Лазука Катерина Дмитріївна</td><td>55.3</td><td>асистент кафедри туристичного бізнесу тарекреації</td></tr><tr><td>Швець Наталя Олександрівна</td><td>55.1</td><td>асистент кафедри біохімії, мікробіології та фізіології харчування</td></tr><tr><td>Гриньків Ольга Володимирівна</td><td>54.2</td><td>асистент кафедри українознавства та лінгводидактики</td></tr></tbody></table>',
      showConfirmButton: false,
      showCancelButton: false
    });
  });

});
        </script>
        @endsection

