<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script>
$('.select2').select2();

$('#how_much').tooltip({
  title: 'Кількість',
  trigger: 'click'
});
$('#staj').tooltip({
  title: 'Проходили стажування в іноземних ЗВО',
  trigger: 'click'
});
$('#nayk_shef').tooltip({
  title: 'Здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні',
  trigger: 'click'
});
$('#stupeni').tooltip({
  title: 'Науково-педагогічні працівники, науковий ступінь та/або вчене звання',
  trigger: 'click'
});
$('#doctor').tooltip({
  title: 'Науково-педагогічні працівники, доктори наук та/або професори',
  trigger: 'click'
});
</script>      
<div class="row">
  <div class="col-md-7">
    <div class="form-group">
      <select name="zvit_allfk" 
              class="form-control select2" data-fouc>
        @foreach($ListFk as $fk)
        <option value="{{$fk->id}}" @if($fk->id == $Table2_edit->zvit_allfk_id) selected @endif>{{$fk->faculty}} - {{$fk->kafedra}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <input class="form-control" 
             name="how_much"
             id="how_much"
             placeholder="Кількість" 
             autocomplete="off"
             type="text" 
             value="{{$Table2_edit->how_much}}">
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <input class="form-control" 
             id="staj"
             placeholder="Проходили стажування в іноземних ЗВО"
             autocomplete="off"
             type="text" 
             name="stajuvannya" value="{{$Table2_edit->staj}}">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <input class="form-control"
             id="nayk_shef"
             placeholder="Здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні"
             autocomplete="off"
             type="text" 
             name="nayk_shef" value="{{$Table2_edit->nayk_shef}}">
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <input class="form-control" 
             id="stupeni" 
             placeholder="Науково-педагогічні працівники, науковий ступінь та/або вчене звання" 
             autocomplete="off"
             type="text" 
             name="stupen" value="{{$Table2_edit->stupeni}}">
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <input class="form-control" 
             id="doctor"
             placeholder="Науково-педагогічні працівники, доктори наук та/або професори" 
             autocomplete="off"
             type="text" 
             name="doctor" value="{{$Table2_edit->doctor}}">
    </div>  
  </div>
</div>