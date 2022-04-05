@extends('panel.layout.index')
@section('title','Звітність всіх співробітників')
@section('content')
    @include('panel/component/allmessage')

<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <table class="table table-striped datatable-basic">
                <thead>
                <tr>
                    <th>І'мя Призвіще</th>
                    <th>Дата звіту</th>
                    <th>Кратка назва</th>
                    <th>функц.</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allReport as $report)
                    @foreach($report->InformationUser as $userInformation)
                    <tr>
                        <td>{{ $userInformation->imya }} {{ $userInformation->familia }} </td>
                        <td>{{ date('d/m/Y', strtotime($report->created_at))}}</td>
                        <td>{{ strip_tags(str_limit($report->report, 45,'...')) }}</td>
                        <td>
                            <a href="{{ route('spanel.report.showreport', $report->created_at) }}" target="_blank">
                                дивитися
                            </a>
                        </td>
                    </tr>
                @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('page_script')
    <script src="{{ asset('framecss/assets/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {

            $('.datatable-basic').DataTable({
                autoWidth: true,
                responsive: true,
                stateSave: true,
                searching: true,
                lengthChange: true,
                info: false,
                ordering:false,
                displayLength: 10,
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: 'Пошук:',
                    paginate: {'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←'}
                }
            });

        });
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection