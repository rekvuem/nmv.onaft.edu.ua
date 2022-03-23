<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script> $('.select2').select2();</script>      
<div class="row">
  <div class="col-md-6">
    <label>Ступінь (ОКР) \ Код та спеціальність</label>
    <div class="form-group">
      <select name="allokr" class="select2" > 
        @foreach($ListOkr as $okr)
        <option value="{{$okr->id}}" @if($okr->id == $Table1_edit->zvit_allokr_id) selected @endif >{{$okr->stupen}} - {{$okr->kod_special}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <label>Кількість</label>
    <div class="form-group">
      <input class="form-control" type="text" name="kilkist" value="{{$Table1_edit->kilkist}}">
    </div>
  </div>
  <div class="col-md-4">
    <label>Проходили стажування в іноземних ЗВО</label>
    <div class="form-group">
      <input class="form-control" type="text" name="staj" value="{{$Table1_edit->proxodj}}">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-2" >
        <label>Укр. олімп</label>
        <input class="form-control" type="text" name="winner" value="{{$Table1_edit->zdobul_winner}}">
      </div>
      <div class="col-md-2" >
        <label>Міжнарод</label>
        <input class="form-control " type="text" name="winner1" value="{{$Table1_edit->zdobul_winner1}}">
      </div>
      <div class="col-md-2" > 
        <label>Культ. спорт</label>
        <input class="form-control " type="text" name="winner2" value="{{$Table1_edit->zdobul_winner2}}">
      </div>
      <div class="col-md-2" > 
        <label>Укр. наук</label>
        <input class="form-control " type="text" name="winner3" value="{{$Table1_edit->zdobul_winner3}}">
      </div>
      <div class="col-md-4">
        <label>Іноземних громадян</label>
        <div class="form-group">
          <input class="form-control" type="text" name="inozemec" value="{{$Table1_edit->inozemec}}">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <label>Громадян з країн членів ОЕСР</label>
    <div class="form-group">
      <input class="form-control" type="text" name="gromodyan" value="{{$Table1_edit->grom}}">
    </div>   
  </div>
</div>