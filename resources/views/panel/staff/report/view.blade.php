@extends('panel.layout.index')
@section('title','Звіт')
@section('content')
@include('panel/component/allmessage')
    <div class="row">
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-body">
                    @foreach($TakeShowReport as $showreport)

                        <textarea id="report"> {{ $showreport->report  }} </textarea>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <form action="{{ route('spanel.report.comment.add') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="iduser" value="{{ Auth::id() }}">
                    <input type="hidden" name="idreport" value="{{ $id->id }}">
                    <textarea name="textcomment" id="comment"></textarea>
                    <button type="submit" class="btn btn-sm bg-warning-800 float-right mt-2">додати</button>
                </form>

                <div class="card-body">
                    @foreach($TakeShowReport as $takecomment)
                        @foreach($takecomment->comment_paginated as $comment)

                            <div class="d-flex flex-row">
                                <div class="flex-column pl-2">
                                    <div class="flex-row "
                                            style="font-size: 0.8em; font-style: italic; font-weight: bold;">

                                        <span style="font-style: normal;">{{ date('d.m.Y H:i', strtotime($comment->created_at)) }}</span>
                                    </div>
                                    <div class="flex-row"
                                            style="font-size: 1.15em;">{!! $comment->comment !!}
                                    </div>
                                    <div class="flex-row" style="font-size: 1em;" >

                                    </div>
                                </div>
                                <div class="flex-column pl-2" style="font-size: 0.8em;">
                                    <a href="{{ route('spanel.report.comment.delete', $comment->id_comment) }}" class="text-danger-800">видалить</a>
                                </div>
                            </div>

                            <div class="text-center text-muted content-divider">
                                <span class="px-1"></span>
                            </div>

                        @endforeach
                    @endforeach
                </div>
                <div class="text-center">{{ $takecomment->comment_paginated->links() }}</div>
            </div>
        </div>
    </div>

@endsection
@section('page_script')
    <script src="{{ asset('framecss/assets/ckeditor5/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#report'))
            .then(editor => {
                editor.isReadOnly = true; // make the editor read-only
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#comment'))
            .then(editor => {
                editor.isReadOnly = false; // make the editor read-only
            })
            .catch(error => {
                console.error(error);
            });
        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn btn-icon bg-warning',
            fileButtonHtml: '<i class="icon-plus2"></i>'
        });
    </script>
@endsection