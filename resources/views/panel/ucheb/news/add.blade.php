@extends('panel.layout.index')
@section('title','Новина')
@section('content')
@section('page_styles')

@endsection
@section('page_script')
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/editors/summernote/lang/summernote-uk-UA.js') }}"></script>
<script src="{{ asset('framecss/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
<script>
$(document).ready(function () {

  $('.summernote').summernote({
    height: 200,
    lang: 'uk-UA'
  });
// Modal template
  var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
          '  <div class="modal-content">\n' +
          '    <div class="modal-header align-items-center">\n' +
          '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
          '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
          '    </div>\n' +
          '    <div class="modal-body">\n' +
          '      <div class="floating-buttons btn-group"></div>\n' +
          '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
          '    </div>\n' +
          '  </div>\n' +
          '</div>\n';

  // Buttons inside zoom modal
  var previewZoomButtonClasses = {
    toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
    fullscreen: 'btn btn-light btn-icon btn-sm',
    borderless: 'btn btn-light btn-icon btn-sm',
    close: 'btn btn-light btn-icon btn-sm'
  };

  // Icons inside zoom modal classes
  var previewZoomButtonIcons = {
    prev: '<i class="icon-arrow-left32"></i>',
    next: '<i class="icon-arrow-right32"></i>',
    toggleheader: '<i class="icon-menu-open"></i>',
    fullscreen: '<i class="icon-screen-full"></i>',
    borderless: '<i class="icon-alignment-unalign"></i>',
    close: '<i class="icon-cross2 font-size-base"></i>'
  };

  // File actions
  var fileActionSettings = {
    zoomClass: '',
    zoomIcon: '<i class="icon-zoomin3"></i>',
    dragClass: 'p-2',
    dragIcon: '<i class="icon-three-bars"></i>',
    removeClass: '',
    removeErrorClass: 'text-danger',
    removeIcon: '<i class="icon-bin"></i>',
    indicatorNew: '<i class="icon-file-plus text-success"></i>',
    indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
    indicatorError: '<i class="icon-cross2 text-danger"></i>',
    indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
  };

  $('.file-input-extensions').fileinput({
    browseLabel: 'Вибрати',
    browseIcon: '<i class="icon-file-plus mr-2"></i>',
    uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
    removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
    layoutTemplates: {
      icon: '<i class="icon-file-check"></i>',
      modal: modalTemplate
    },
    maxFilesNum: 12,
    maxFileSize: 25000,
    allowedFileExtensions: ["jpg", "png", "txt", "pdf", "doc", "docx", "rtf"],
    initialCaption: "Немає жодного файлу!",
    previewZoomButtonClasses: previewZoomButtonClasses,
    previewZoomButtonIcons: previewZoomButtonIcons,
    fileActionSettings: fileActionSettings
  });

});


</script>
@endsection
@include('panel/component/allmessage')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('spanel.ucheb.news.store')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label>Назва новини</label>
                <input class="form-control" type="text" name="title_news_uk" placeholder="uk" value="">
                <input class="form-control" type="text" name="title_news_ru" placeholder="ru" value="">
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <label>укр</label>
            <textarea class="summernote" name="discription_uk" placeholder="uk" data-fouc></textarea>
          </div>
          <div class="form-group">
            <label>рус</label>
            <textarea class="summernote" name="discription_ru" placeholder="ru" ></textarea>
          </div>
          <div class="form-group">
            <input class="file-input-extensions" type="file" name="imagesadd[]" multiple="">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="{{__('panel.add')}}">
          </div>
        </form>


      </div>
    </div>
  </div>

</div>
@endsection