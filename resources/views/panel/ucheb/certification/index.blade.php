@extends('panel.layout.index')
@section('title','Список серфікатів')
@section('content')
@section('page_styles')
<style>
  #tree-default{
    font-size: 14px;
  }
</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/assets/js/madals/certification.js') }}" type="text/javascript"></script>
@endsection
@include('panel/component/allmessage')   
<div class="row">
  <div class="col-10">
    <div class="card rounded-0 table-responsive">
      <table class="table  table-bordered">
        @foreach($certification_select as $certif_level_1)
        <tr>
          <td colspan="3" class="font-weight-black" style="padding-left: 0px;">{{$certif_level_1->title_main}}</td>
        </tr>
        @foreach($certif_level_1->certif2 as $certif_level_2)
        <tr>
          <td class="text-blue-800 text-bold">  {{$certif_level_2->title_second}}</td> 
          <td></td>
          <td width="140">
            <button 
              type="button" 
              class="btn badge badge-icon text-indigo-700 select_second"
              data-secondid="{{$certif_level_2->id}}"
              ><i class="icon-pen-plus"></i>
            </button>   
        </tr>
        @foreach($certif_level_2->certif3 as $certif_level_3)
        <tr>
          <td class="text-indigo-800" style="margin-right: 35px;"><?= $certif_level_3->title_third ?></td> 
          <td></td>
          <td>
            <button 
              type="button" 
              class="btn badge badge-icon text-violet-800 select_third"
              data-thirdid="{{$certif_level_3->id}}"
              ><i class="icon-pen-plus"></i>
            </button>
            <button 
              type="button" 
              class="btn badge badge-icon text-purple-700 select_edit_3"
              data-edit3id="{{$certif_level_3->id}}"
              data-text="{{$certif_level_3->title_third}}"
              ><i class="icon-pencil"></i>
            </button>
          </td>
        </tr>
        @foreach($certif_level_3->certif4 as $certif_level_4)
        <tr>
          <td class="text-teal-800 select-date">
         @switch($certif_level_4->nzavo)
              @case(0) (стар)  @break
              @case(1) (НАЗЯВО) @break
            @endswitch
            {{$certif_level_4->title_four}}
          </td> 
          <td><?= $certif_level_4->filename ?></td>
          <td>
            <button 
              type="button" 
              class="btn badge badge-icon text-purple-700 select_four"
              data-fourid="{{$certif_level_4->id}}" 
              data-text="{{$certif_level_4->title_four}}"
              data-filenames="{{$certif_level_4->filename}}">
              <i class="icon-pencil"></i>
            </button>  

            <button 
              type="button" 
              class="btn badge badge-icon text-danger-600 deleting"
              data-fourid="{{$certif_level_4->id}}"
              ><i class="icon-cross2"></i>
            </button>     
          </td>
        </tr>
        @endforeach
        @endforeach
        @endforeach
        @endforeach
      </table>
    </div>
  </div>

</div>
@endsection