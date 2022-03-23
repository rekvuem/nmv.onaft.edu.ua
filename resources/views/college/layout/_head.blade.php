<div class="row">
  <div class="col-md-2 text-center hidden_logotip">
    <img src="{{ asset('images/emblem1.png') }}" height="180" alt=""/>
  </div>
  <div class="col-md-8 text-center">
    <div class="title-wapka">
      Науково-методична конференція Одеської національної академії харчових технологій
    </div>
    <div class="title-nazvanie">
      @if(session('title_head_college'))
      <i>{{session('title_head_college')}}</i>
      @else
      назва незабаром
      @endif
    </div>
  </div>
  <div class="col-md-2 text-center hidden_logotip">
    <img src="{{ asset('images/right_logo.png') }}" height="180" alt=""/>
  </div>
</div>