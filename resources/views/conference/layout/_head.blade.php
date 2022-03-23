<div class="row">
  <div class="col-md-2 text-center hidden_logotip">
    <img src="{{ asset('images/emblem1.png') }}" height="180" alt=""/>
  </div>
  <div class="col-md-8 text-center">
    <div class="title-wapka">
      Всеукраїнська науково-методична конференція 
    </div>
    <div class="title-nazvanie">
      @if(session('title_head_conference'))
      <i>{{session('title_head_conference')}}</i>
      @else
      назва незабаром
      @endif
    </div>
  </div>
  <div class="col-md-2 text-center hidden_logotip">
    <img src="{{ asset('images/right_logo.png') }}" height="180" alt=""/>
  </div>
</div>