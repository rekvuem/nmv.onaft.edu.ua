@extends('panel.layout.index')
@section('title','Назва проекту')
@section('content')


<div class="row">
  <div class="col-12">
    <div class="card rounded-0">
      @foreach($projects as $ShowProject)
      <div class="card-header">
        <span style="font-weight: bolder; font-size: 1.4em">Назва проекту:</span> 
        <span style="font-size: 1.2em">{{$ShowProject->title}}</span>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>файли:</label>
          @foreach($ShowProject->SumFileProj as $filos)
     
            <div class="row">
              <div class="">{{$filos->title}}
              <form action="{{route('spanel.ucheb.project.deletedFile', $filos->id_upload_file)}}" class="float-right" method="POST">
                {{ csrf_field() }}   
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-xs btn-link" value="видалити">
              </form>
              </div>

            </div>
     
          @endforeach         

          @endforeach
        </div>

        <div class="form-group">

          <div class="list-feed">
            @foreach($ProjectChooseComment as $comment)
            @if($comment->trashed())
            <div class="list-feed-item border-warning-400">
              <div class="text-muted font-size-sm mb-1">{{$comment->created_at->format('d.m.y H:m')}} {{$comment->username}}
                </span>
              </div>
              коментар видалено
            </div>
            @else      
            <div class="list-feed-item border-warning-400">
              <div class="text-muted font-size-sm mb-1">{{$comment->created_at->format('d.m.y H:m')}} {{$comment->username}}
                <form action="{{route('spanel.ucheb.project.deletedComment', $comment->id_comment)}}" class="float-right" method="POST">
                    {{ csrf_field() }}   
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-xs btn-link" value="видалити">
                  </form>
              </div>
              {!!$comment->comment_text!!}
            </div>
            @endif
            @endforeach
          </div>

        </div>
      </div>

    </div>  
  </div>

  @foreach($projects as $ShowProject)
  <form action="{{route('spanel.ucheb.project.store')}}" method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}   
    {{ method_field('POST') }}
    <input type="hidden" name="UpdateProjectFile" value="yes">
    <input type="hidden" name="foldering" value="{{$ShowProject->datecreate}}">
    <input type="hidden" name="IdProject" value="{{$ShowProject->id_category}}">
    <input type="file" name="InputFile[]" class="form-control" multiple> 
    <input type="submit" class="btn" value="upload">

  </form>
  @endforeach
</div>

@endsection
@section('page_styles')
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {

});
</script>
@endsection