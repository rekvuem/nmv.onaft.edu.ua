@extends('panel.layout.index')@section('title','Редагувати звітність')
@section('content')
@include('panel/component/allmessage')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Редагувати звітність</div>
                <div class="card-body">
                    
                        <form action="{{ route('spanel.report.update.report', $take_my_report->id) }}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="mi-perm-contact-calendar"></i></span>
										</span>
                                    <input class="form-control pickadate text-muted"
                                            type="text"
                                            name="time"
                                            placeholder="Дата отчета"
                                            value="{{ date('d.m.Y', strtotime($take_my_report->created_at))}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="editor" name="report_text">{{ $take_my_report->report }}</textarea>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success float-right">Зберегти</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>

    </div>

@endsection
@section('page_script')
    <script src="{{ asset('framecss/assets/ckeditor5/ckeditor.js') }}"></script>

    <script src="{{ asset('framecss/global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/pickers/pickadate/translations/uk_UA.js') }}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

        $('.pickadate').pickadate({
            format: 'dd.mm.yyyy',
            today: '',
            clear: '',
            close: '',
        });
    </script>
@endsection