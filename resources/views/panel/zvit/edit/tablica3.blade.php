<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script>
$('.select2').select2();

$('#piB').tooltip({
  title: 'ПІБ наукового, науково-педагогічного працівника',
  trigger: 'click'
});
$('#scoup_number').tooltip({
  title: 'ID Scopus (за наявності)',
  trigger: 'click'
});
$('#index_griw_scopus').tooltip({
  title: 'Індекс Гірша Scopus',
  trigger: 'click'
});
$('#web_number').tooltip({
  title: 'ID Web of Science',
  trigger: 'click'
});
$('#idex_gri_web_scop').tooltip({
  title: 'Індекс Гірша Web of Science',
  trigger: 'click'
});
</script>      
<div class="row">
          <div class="col-md-8">
            <div class="form-group">		 
              <select name="zvit_allfk" class="select2">
                @foreach($ListFk as $list)
                <option value="{{$list->id}}" @if($list->id == $Table3_edit->zvit_allfk_id) selected @endif>{{$list->faculty}} \ {{$list->kafedra}} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input class="form-control"
                     id="piB"
                     placeholder="ПІБ наукового, науково-педагогічного працівника"
                     autocomplete="off" 
                     type="text" 
                     name="pib" value="{{$Table3_edit->pib}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <input class="form-control" 
                     id="scoup_number"
                     autocomplete="off" 
                     type="text" 
                     name="scoup_number" value="{{$Table3_edit->scoup_number}}">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input class="form-control" 
                     id="index_griw_scopus" 
                     autocomplete="off"  
                     type="text" 
                     name="index_griw_scopus" value="{{$Table3_edit->index_griw_scopus}}">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input class="form-control" 
                     id="web_number"
                     title="ID Web of Science" 
                     autocomplete="off"  
                     type="text" name="web_number" value="{{$Table3_edit->web_number}}">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <input class="form-control" 
                     id="idex_gri_web_scop"  
                     title="Індекс Гірша Web of Science"
                     autocomplete="off"  
                     type="text" name="idex_gri_web_scop" value="{{$Table3_edit->idex_gri_web_scop}}">
            </div>   
          </div>
        </div>