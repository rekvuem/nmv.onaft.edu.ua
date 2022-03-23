<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script>$('.select2').select2({minimumResultsForSearch: Infinity});</script>
<div class="form-group">
  <select name="stupen_select" class="form-control select2">
    <option value="магістр" @if($okr_select->stupen == "магістр") selected @endif>магістр</option>
    <option value="бакалавр" @if($okr_select->stupen == "бакалавр") selected @endif>бакалавр</option>           
    <option value="спеціаліст" @if($okr_select->stupen == "спеціаліст") selected @endif>спеціаліст</option>
    <option value="спеціаліст перепідготовка" @if($okr_select->stupen == "спеціаліст перепідготовка") selected @endif>спеціаліст перепідготовка</option>
  </select>
</div>
<div class="form-group">
  <input type="text" name="kodspecial" class="form-control" value="{{$okr_select->kod_special}}">
</div>