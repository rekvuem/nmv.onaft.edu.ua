@extends('home.layout.index_full')
@section('title', 'Теми дипломів')
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
<div class="row">
  <div class="col-md-12 ">
    <div class="btn-group btn-group-justified rounded-0">
      <button 
        type="button" 
        class="btn bg-brown dropdown-toggle" 
        data-toggle="dropdown" aria-expanded="false">Бакалаври
      </button>
      <div class="dropdown-menu dropdown-menu-right" 
           x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(152px, 38px, 0px);">
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2013]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2013</a>
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2014]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2014</a>
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2015]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2015</a>
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2016]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2016</a>
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2017]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2017</a>
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2018]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2018</a>
        <a href="{{ route('home.diplom', ['spec'=>'bak', 'year'=>2019]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2019</a>
      </div>

      <button 
        type="button" 
        class="btn bg-brown dropdown-toggle" 
        data-toggle="dropdown" aria-expanded="false">Спеціалісти
      </button>
      <div class="dropdown-menu dropdown-menu-right" 
           x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(152px, 38px, 0px);">
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2013]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2013</a>
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2014]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2014</a>
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2015]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2015</a>
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2016]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2016</a>
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2017]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2017</a>
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2018]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2018</a>
        <a href="{{ route('home.diplom', ['spec'=>'spec', 'year'=>2019]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2019</a>
      </div>

      <button 
        type="button" 
        class="btn bg-brown dropdown-toggle" 
        data-toggle="dropdown" aria-expanded="false">Магістри
      </button>
      <div class="dropdown-menu dropdown-menu-right" 
           x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(152px, 38px, 0px);">
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2013]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2013</a>
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2014]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2014</a>
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2015]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2015</a>
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2016]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2016</a>
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2017]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2017</a>
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2018]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2018</a>
        <a href="{{ route('home.diplom', ['spec'=>'mag', 'year'=>2019]) }}" class="dropdown-item"><i class="icon-menu7"></i> 2019</a>
      </div>
    </div>
  </div>

</div>
<div class="row mt-1">
  <div class="col-12 col-md-12">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-12 text-center text-uppercase">
          <h2> @yield('title') </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <table class="table datatable-basic">
            <thead>
              <tr>
                <th>ПІБ</th>
                <th>Спеціальність</th>
                <th>Рік</th>
                <th>Кафедра</th>
                <th>Тема диплома</th>
                <th>Руководитель</th>
                <th>Номер наказа</th>
              </tr>
            </thead>
            <tbody>
            @if(!request()->query('spec') == '')       
              @foreach($diplomas_bak as $diplomas)
                @IF(!$diplomas->specialnist6 == null)
              <tr>
                <td> {{$diplomas->FIO}}</td>
                <td> {{$diplomas->specialnist6}}</td>
                <td> {{$diplomas->year}}</td>
                <td> {{$diplomas->exit_kafedra}}</td>
                <td> {{$diplomas->them_diplom_project}}</td>
                <td> {{$diplomas->teacher_project}}</td>
                <td> {{$diplomas->number_nakaz}}</td>
              </tr>
                @else

                @endif
              @endforeach
            @endif
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script>
$('.datatable-basic').DataTable({
  autoWidth: true,
  stateSave: true,
  dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
  language: {
    responsive: true,
    search: '<span>Фільтр:</span> _INPUT_',
    lengthMenu: '<span>Показати:</span> _MENU_',
    paginate: {'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←'}
  }
});
</script>
@endsection