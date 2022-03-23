@extends('home.layout.index')
@section('title','Проект '.$project_show->title)
@section('content')
<div class="row mt-1 no-gutters">
  <div class="col-12 col-md-3">
    @include('home.layout.sidemenu')
  </div>
  <div class="col-12 col-md-9">
    <div class="card card-body rounded-0 border-0">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <p class="text-center text-uppercase" style="font-size: 22px; font-weight: bolder;">  @yield('title') </p>
        </div>
      </div>
      <div class="row">

        {{$project_show->title}}

      </div>
      <div class="row">
        @foreach($project_file as $file)
        @if($file->mime_type == 'application/pdf')
        <div class="col-2 text-center">
          <a href="{{asset($file->folder.'/'.$file->filename)}}"> 
            <img src="{{asset('images/pdf.png')}}"></a>
          <div class="text-orange-800 click_filename" data-filename="{{$file->title}}">{{$file->title}}</div>
        </div>
        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
        <div class="col-2">
          <a href="{{asset($file->folder.'/'.$file->filename)}}"> <i class="icon-file-eye2"></i></a>
        </div>
        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
        <div class="col-2">
          <a href="{{asset($file->folder.'/'.$file->filename)}}"> <i class="icon-file-eye2"></i></a>
        </div>
        @endif
        @endforeach
      </div>
    </div>

    <div class="card card-body rounded-0 border-0">
      <div class="row"><h4>Коментарії</h4></div>
      <div class="row">
        <div class="col-12">
          <form action="{{route('home.addcomment')}}" method="POST">
            {{ csrf_field() }}
            <input name="projectid" type="hidden" class="form-control" value="{{$project_show->id_category}}">
            <div class="form-group">
              @if(session()->has('username'))
              <input name="name" type="text" class="form-control" value="{{session()->get('username')}}">
              @else
              <input name="name" type="text" class="form-control" value="" placeholder="Ім`я">
              @endif
              @if ($errors->has('name'))
              @foreach ($errors->get('name') as $error)
              <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              <textarea id="trumbowyg_default" name="comment" class="form-control" rows="3" placeholder="Коментар"></textarea>
              @if ($errors->has('comment'))
              @foreach ($errors->get('comment') as $error)
              <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              <input type="submit" class="btn bg-green-700 rounded-2" value="Додати">
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-12">

          <div class="list-feed">
            @foreach($project_comment as $comment)
              @if($comment->trashed())
            <div class="list-feed-item border-warning-400">
              <div class="text-muted font-size-sm mb-1"><i>комент видалено</i></div>
            </div>
              @else
            <div class="list-feed-item border-warning-400">
              <div class="text-muted font-size-sm mb-1">{{$comment->created_at->format('d.m.y H:m')}} {{$comment->username}}</div>
              {!!$comment->comment_text!!}
            </div>
              @endif

            @endforeach
          </div>
          <div class="">{{$project_comment->links()}}</div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
@section('page_styles')
<style>
  .trumbowyg-editor, .trumbowyg-textarea{
    min-height: 150px !important;
  }
</style>
@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/media/fancybox.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/trumbowyg/trumbowyg.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/trumbowyg/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/trumbowyg/plugins/colors/trumbowyg.colors.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/trumbowyg/plugins/noembed/trumbowyg.noembed.min.js') }}"></script>
<script>
$(document).ready(function () {
  $('#trumbowyg_default').trumbowyg({
    btns: [
      ['foreColor', 'backColor'],
      ['unorderedList', 'orderedList'],
      ['strong', 'em'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull']
    ]
  });
//  $('.click_filename').on('click', function () {
//    var title_filename = $(this).data('filename');   
//    alert(title_filename);
//  });

});

</script>  



@endsection