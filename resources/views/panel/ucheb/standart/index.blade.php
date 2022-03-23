@extends('panel.layout.index')
@section('title','Стандарт вищої освіти')
@section('content')
@section('page_styles')
<style>
.heade_title{font-size: 1.2em;}
.level2{font-size: 1.1em; font-style: italic;}
</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/assets/js/madals/standart.js') }}" type="text/javascript"></script>
@endsection
@include('panel/component/allmessage')
<div class="row">
  <div class="col-12 col-md-10 col-lg-10">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-responsive table-striped">
          <thead>
            @foreach($SelectStandart as $leve1)
            <tr>
              <th colspan="2" class="heade_title">{{$leve1->title}}</th>
              <th >функц</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leve1->standart_2 as $lev2)
            <tr>
              <td colspan="2" class="level2">{{$lev2->title_second}}</td>
              <td>
                <div class="btn-group">
                  <a href="#" class="btn btn-sm btn-icon bg-green-600 add_standart"
                     data-lev2id="{{$lev2->id}}"><i class="icon-pen-plus"></i></a>
                  <a href="#" class="btn btn-sm btn-icon bg-blue-700 edit_specialize"
                     data-lev2id="{{$lev2->id}}"
                     data-tittext="{{$lev2->title_second}}"><i class="icon-pencil3"></i></a>
                  <a href="#" class="btn btn-sm btn-icon bg-warning-800 delete_specializ"
                     data-lev2id="{{$lev2->id}}"><i class="icon-eraser2"></i></a>
                </div>
              </td>
            </tr>
            @foreach($lev2->standart_3 as $lev3)
            <tr> 
              <td>{{$lev3->title}}</td>
              <td><a href="{{$lev3->filename}}" target="_blank">{{$lev3->filename}}</a></td>
              <td>
                <div class="btn-group">
                  <a href="#" class="btn btn-sm btn-icon bg-blue-700 edit_standart"
                     data-lev3id="{{$lev3->id}}"
                     data-lev3title="{{$lev3->title}}"
                     data-filetitle="{{$lev3->filename}}"><i class="icon-pencil3"></i></a>
                  <a href="#" class="btn btn-sm btn-icon bg-warning-800 delete_standart"
                     data-lev3id="{{$lev3->id}}"
                     data-filetitle="{{$lev3->filename}}"><i class="icon-eraser2"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
          </tbody>
        </table>




      </div>
    </div>
  </div>
</div>


@endsection
