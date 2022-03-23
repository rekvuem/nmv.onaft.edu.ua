@extends('panel.layout.index')
@section('title','ОПП')
@section('page_styles')
<style>
  .specialname{
    font-size: 1.2em;
  }
</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/assets/js/madals/opp16012021.js') }}" type="text/javascript"></script>
@endsection
@section('content')
@include('panel/component/allmessage')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class='card-header'>
        <spn style="font-size: 20px;">ОПП</spn> 
      </div>
      <div class="card-body">
        <table class="table table-bordered table-responsive">
          @foreach($specialListOpp as $opp)
          <tr>
            <td colspan="3" 
                class="specialname">
              {{$opp->num}} {{$opp->specialization}} 
              @switch($opp->type)   
              @case('b') (<i> бакалавр </i>)  @break  
              @case('m') (<i> магістр </i>)   @break
              @endswitch
            </td>
            <td width="150">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn badge badge-icon bg-green-700 select_add_opp_level1"
                  data-oppd="{{$opp->id}}"
                  ><i class="icon-plus3"></i></button>

                <button
                  type="button"
                  class="btn badge badge-icon bg-blue-700 select_edit_opp_level1"
                  data-oppd="{{$opp->id}}"
                  data-typeopp="{{$opp->type_opp}}"
                  data-type="{{$opp->type}}"
                  data-oppnum="{{$opp->num}}"
                  data-status="{{$opp->status_download}}"
                  data-text="{{$opp->specialization}}"
                  ><i class="icon-pencil6"></i></button>
                  
              <form action="{{route('spanel.ucheb.opp.destroy', $opp->id)}}" class="float-right" method="POST">
                {{ csrf_field() }}   
                {{ method_field('DELETE') }}
                <input type="hidden" name="delete_opp">
                <button
                  type="submit"
                  class="btn badge badge-icon bg-orange-700 "
                  ><i class="icon-cross3"></i></button>
              </form>
              </div>
            </td>
          </tr>
          @foreach($opp->oppupl as $upload)
          <tr>
            <td>
              <div>{{ $upload->opp }}</div>
              <div>{{ $upload->updated_at->format('d.m.Y') }} / {{ $upload->status_download }}</div>
            </td> 
            <td>{{$upload->year}}</td> 
            <td >            
              <a href="{{asset('opp/'.$upload->filename)}}"
                 class="">{{str_limit($upload->filename, 25)}} </a>
            </td>  
            <td > 
              <div class="btn-group">
                <button
                  type="button"
                  class="btn badge badge-icon bg-blue-700 select_edit_upload_level2"
                  data-upload_text="{{$upload->opp}}"
                  data-status="{{$upload->status_download}}"
                  data-year="{{$upload->year}}"
                  data-uploadid="{{$upload->id}}"
                  ><i class="icon-pencil6"></i></button>

                <button
                  type="button"
                  class="btn badge badge-icon bg-warning-700 select_delete_opp_level2"
                  data-uploadid="{{$upload->id}}"
                  data-filename="{{$upload->filename}}"
                  ><i class="icon-eraser2"></i></button>
              </div>
            </td>
          </tr>
          @endforeach
          @endforeach
        </table>

      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
      <div class='card-header'><spn style="font-size: 20px;">ОНП</spn> </div>
      <div class="card-body">

        <table class="table table-bordered">
          @foreach($specialListOnp as $onp)
          <tr>
            <td colspan="3" class="specialname">
              {{$onp->num}} {{$onp->specialization}} 
              @switch($onp->type)   
              @case('b') (<i> бакалавр </i>)  @break  
              @case('m') (<i> магістр </i>)   @break
              @endswitch
            </td>
            <td width="150">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn badge badge-icon bg-green-600 select_add_opp_level1"
                  data-oppd="{{$onp->id}}"
                  ><i class="icon-plus3"></i></button>

                <button
                  type="button"
                  class="btn badge badge-icon bg-blue-700 select_edit_opp_level1"
                  data-oppd="{{$onp->id}}"
                  data-typeopp="{{$onp->type_opp}}"
                  data-type="{{$onp->type}}"
                  data-oppnum="{{$onp->num}}"
                  data-status="{{$onp->status_download}}"
                  data-text="{{$onp->specialization}}"
                  ><i class="icon-pencil6"></i></button>

                <button
                  type="button"
                  class="btn badge badge-icon bg-warning-800 select_delete_opp_level1"
                  data-oppd="{{$onp->id}}"
                  ><i class="icon-eraser2"></i></button>
              </div>
            </td>
          </tr>
          @foreach($onp->oppupl as $upload)
          <tr>
            <td>
              <div>{{ $upload->onp }}</div>
              <div>{{$upload->updated_at->format('d.m.Y')}}</div>
            </td> 
            <td>{{$upload->year}}</td> 
            <td>            
              <a href=" {{asset('opp/'.$upload->filename)}}"
                 class="text-green-800">{{$upload->filename}}</a>
            </td>  
            <td >
              

              <div class="btn-group">
                <button
                  type="button"
                  class="btn badge badge-icon bg-blue-700 select_edit_upload_level2"
                  data-upload_text="{{$upload->opp}}"
                  data-status="{{$upload->status_download}}"
                  data-year="{{$upload->year}}"
                  data-uploadid="{{$upload->id}}"
                  ><i class="icon-pencil6"></i></button>

                <button
                  type="button"
                  class="btn badge badge-icon bg-warning-800 select_delete_opp_level2"
                  data-uploadid="{{$upload->id}}"
                  data-filename="{{$upload->filename}}"
                  ><i class="icon-cross2"></i></button>
              </div>
            </td>
          </tr>
          @endforeach
          @endforeach
        </table>

      </div>
    </div>
  </div>

</div>
@endsection