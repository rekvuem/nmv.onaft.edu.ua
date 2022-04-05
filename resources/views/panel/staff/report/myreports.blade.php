@extends('panel.layout.index')@section('title','s')
@section('content')
    @include('panel/component/allmessage')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Подати звітність</div>
                <div class="card-body">

                    <form action="{{ route('spanel.report.create.report') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="mi-perm-contact-calendar"></i></span>
										</span>
                                <input class="form-control pickadate" type="text" name="time" placeholder="Дата отчета" value="{{ date('d.m.Y') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="editor" name="report_text"></textarea>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success float-right">Подати</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Звітність</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата отчета</th>
                            <th>Короткий зміст</th>
                            <th>Додатково</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($take_my_report as $report)
                            <tr>
                                <td>
                                    <a href="{{ route('spanel.report.showreport', $report->created_at) }}" target="_blank">
                                        {{date('d.m.Y', strtotime($report->created_at))}}
                                    </a>
                                </td>
                                <td>
                                    {{ strip_tags(str_limit($report->report, 30,'...')) }}
                                </td>
                                <td>
                                    @if($report->timeplus <= now('Europe/Kiev'))
                                        <a title="час на редагування вичерпано" class="badge badge-flat border-danger text-danger-800 badge-icon">
                                            <i class="mi-mode-edit mi-1x text-danger-800"></i></a>
                                    @else
                                        <a href="{{ route('spanel.report.editor.report',['id'=> $report->id] )}}" class="badge badge-flat border-green text-green-600 badge-icon" title="редагувати">
                                            <i class="mi-mode-edit mi-1x text-green-800"></i>
                                        </a>
                                    @endif

                                    <a href="" title="комент" class="badge badge-flat border-primary text-primary-800 badge-icon">
                                        <i class="mi-insert-comment mi-1x"></i>
                                    </a>

                                        <a href="{{ route('spanel.report.delete.report', $report->id) }}" title="видалити" class="badge badge-flat border-warning text-warning-800 badge-icon">
                                            <i class="icon-trash-alt mi-1x"></i>
                                        </a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
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
        $(document).ready(function () {
            $('.take_timer').on('click', function () {
                $date = $(this).data('timer');
                $reportid = $(this).data('reportid');

                $("input[type=hidden][name=time]").val($date);
                $("input[type=hidden][name=reportid]").val($reportid);

            })
            //        $('.btn-danger').on('click', function (){
            //            setTimeout('location.reload(true)', 1000);
            //        });

        });
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
        $('.pickadate').pickadate({
            format: 'dd.mm.yyyy',
            today: '',
            clear: '',
            close: '',
        });
    </script>
@endsection