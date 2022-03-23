@extends('panel.layout.index')@section('title','Завантажити файл')
@section('content')
@section('page_styles')
    <style>
        .specialname {
            font-size: 1.2em;
        }
    </style>
@endsection
@section('page_script')
    <script defer src="{{ asset('framecss/global_assets/js/plugins/forms/selects/select2.min.js') }}" type="text/javascript"></script>
    <script defer src="{{ asset('framecss/global_assets/js/plugins/notifications/pnotify.min.js') }}" type="text/javascript"></script>
    <script defer src="{{ asset('framecss/global_assets/js/plugins/notifications/sweet_alert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('framecss/global_assets/js/plugins/tables/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('.datatable-basic').DataTable({
                autoWidth: false,
                stateSave: true,
                pageLength: 25,
                lengthMenu: [25, 75, 100],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    responsive: true,
                    search: '<span>Фільтр:</span> _INPUT_',
                    lengthMenu: '<span>Показати:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': '→',
                        'previous': '←'
                    }
                }
            });
            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
            var swalInit = swal.mixin({
                allowOutsideClick: false,
                allowEscapeKey: true,
                allowEnterKey: true
            });

            /*********************************************************************************************/
            $('.datatable-basic tbody').on('click', '.edit_upload', function () {
                var editid = $(this).data('edit');
                var edittitle = $(this).data('title');
                var filename = $(this).data('filename');
                var CSRF = $('meta[name="csrf-token"]').attr('content');
                swalInit.fire({
                    title: 'Відрадугувати данні',
                    html: '\n\
        <form action="/spanel/ucheb/siteupload_ajax_upl" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="siteupload" value="' + editid + '">\n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="PATCH">\n\
          <input type="hidden" name="filename" value="' + filename + '">\n\
                <input type="text" name="titleFile" placeholder="Назва" class="form-control border-blue-800" value="' + edittitle + '" > \n\
                  <div class="form-group">\n\
                    <select class="select2" name="selectPage" data-fouc>\n\
                      <optgroup label="Головний сайт">  \n\
                        <option value="normbd">Нормативна база</option>\n\
                        <option value="info_support">Інформаційне забезпечення</option>\n\
                        <option value="rek">Робота екзаменаційних комісій</option>\n\
                        <option value="bestdp">Кращі ДП</option> \n\
                        <option value="complexplane">Комплексний план ОНАХТ</option>\n\
                        <option value="inviteolymp">Запрошення на фінал олімпіади</option>\n\
                        <option value="actualdp">Актуальні теми дипломних проектів та кваліфікаційних робіт</option>  \n\
                        <option value="gnp">Графік навчального процесу</option>\n\
                        <option value="dobro">Актуально про доброчесність</option>\n\
                        <option value="olymp">Олімпіади на базі коледжів ОНАХТ</option>\n\
                      </optgroup>\n\
                      <optgroup label="Документація">\n\
                        <option value="vidsamop">відомості про самооцінювання освітньої програми</option>\n\
                        <option value="pae">програми акредитаційної експертизи</option>\n\
                        <option value="rkk">рішення конкурсної комісії</option>\n\
                        <option value="coopagree">договір про співробітництво</option>\n\
                        <option value="reldoc">супутні документи</option>\n\
                        <option value="staj">стажування</option>\n\
                        <option value="faculty">для факультету</option>\n\
                        <option value="kafedr">для кафедр</option>\n\
                        <option value="teacher">для викладачів</option>\n\
                        <option value="student">для студентів</option>\n\
                      </optgroup>\n\
                      <optgroup label="Публіна інформація">\n\
                        <option value="monitoring">Результати моніторингу якості вищої освіти</option>\n\
                        <option value="top100">Щорічне оцінювання здобувачів ОНАХТ (ТОП-100)</option>\n\
                        <option value="cooldp">Відзначення кращих дипломних проєктів бакалаврів/кваліфікаційних робіт магістрів</option>\n\
                      </optgroup>\n\
                      <optgroup label="План">\n\
                        <option value="lecture">План проведення відкритих лекцій</option>\n\
                        <option value="seminar">Програми проведення науково-методичних семінарів на кафедрах</option>  \n\
                        <option value="pv">План видання навчально-методичної літератури (методичні вказівки)</option>    \n\
                        <option value="ps">План створення лекцій на електронних і паперових носіях</option> \n\
                        <option value="ppiv">План підготовки і видання підручників і навчальних посібників з грифом ОНАХТ</option>\n\
                        <option value="ppmp">План видання мультимедійних підручників</option>    \n\
                        <option value="publisheng">План видання англомовної навчально-методичної літератури</option>\n\
                        <option value="publishdp">План створення методичних матеріалів до виконання дипломних проектів і магістерських робіт</option>\n\
                        <option value="publishkr">План видання методичних матеріалів до курсового проектування</option> \n\
                      </optgroup>\n\
                      <optgroup label="Проведення науково-методичних семінарів на кафедрах"> \n\
                        <option value="ksa">КСтаА</option>\n\
                        <option value="ebk">ЕБіК</option>\n\
                        <option value="itxrgb">ІТХіРГБ</option>\n\
                        <option value="kipkb">КІПтаКБ</option>\n\
                        <option value="mmil">ММіЛ</option>\n\
                        <option value="nge">НГтаЕ</option>\n\
                        <option value="nttim">НТТтаІМ</option>\n\
                        <option value="tvtb">ТВтаТБ</option>\n\
                        <option value="tzzb">ТЗіЗБ</option>\n\
                        <option value="tthppb">ТтаТХПіПБ</option>\n\
                      </optgroup>\n\
                    </select>\n\
                </div>\n\
                <div class="form-group">\n\
                  <input type="file" name="InputFile" class="form-control" > \n\
                </div>\n\
                <div class="form-group">\n\
                  <input type="submit" class="btn bg-success-600" onclick="swal.clickConfirm()" value="Зберегти" > \n\
                  <input type="button" class="btn border-1 btn-outline bg-danger-700 text-danger-700 border-danger-700" onclick="swal.clickCancel()" value="Закрити">\n\
                </div>\n\
        </from>',
                    showConfirmButton: false,
                    showCancelButton: false,
                    onOpen: () => {
                        $('.select2').select2({
                            minimumResultsForSearch: Infinity
                        });
                    }
                }).then((result) => {
                    if (result.value) {
                        console.log("відрадоговано");
                    } else {
                        location.reload();
                    }
                });
            });
            /*************************************************************************************************/

            $('.delete_uload').on('click', function () {
                var deleteid = $(this).data('delete');
                var filename = $(this).data('filename');
                swalInit.fire({
                    title: 'Ви бажаэте видалити запис?',
                    text: 'Відновлення запису неможливо',
                    type: 'warning',
                    position: 'top',
                    showCancelButton: true,
                    cancelButtonClass: 'btn bg-grey',
                    confirmButtonClass: 'btn bg-success',
                    cancelButtonText: 'Закрити',
                    confirmButtonText: 'Так, видалити!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            method: 'POST',
                            url: 'siteupload/' + deleteid,
                            data: {
                                _method: 'delete',
                                id: deleteid,
                                filename: filename
                            },
                            success: function () {
                                new PNotify({
                                    title: 'Запис видалено',
                                    text: 'Запис видалено успішно!',
                                    icon: 'icon-checkmark3',
                                    addclass: 'bg-success border-success'
                                });
                                setTimeout('location.reload(true)', 3000);
                            },
                            error: function () {
                                new PNotify({
                                    title: 'Помилка!',
                                    text: 'Запис не можливо видалити!',
                                    icon: 'icon-blocked',
                                    addclass: 'bg-danger border-danger'
                                });
                            }
                        });
                    } else {
                        location.reload();
                    }
                });
            });

        });
    </script>
@endsection
@include('panel/component/allmessage')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{route('spanel.ucheb.siteupload.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="card-header">
                    <h4>Завантаження файла по сторінкам</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <select class="select2" name="selectPage" data-fouc>
                                <optgroup label="Головний сайт">
                                    <option value="normbd">Нормативна база</option>
                                    <option value="info_support">Інформаційне забезпечення</option>
                                    <option value="rek">Робота екзаменаційних комісій</option>
                                    <option value="bestdp">Кращі ДП</option>
                                    <option value="complexplane">Комплексний план ОНАХТ</option>
                                    <option value="inviteolymp">Запрошення на фінал олімпіади</option>
                                    <option value="actualdp">Актуальні теми дипломних проектів та кваліфікаційних робіт</option>
                                    <option value="gnp">Графік навчального процесу</option>
                                    <option value="publicinfo">Публічна інформація</option>
                                    <option value="dobro">Актуально про доброчесність</option>
                                    <option value="olymp">Олімпіади на базі коледжів ОНАХТ</option>
                                </optgroup>
                                <optgroup label="Документація">
                                    <option value="vidsamop">відомості про самооцінювання освітньої програми</option>
                                    <option value="pae">програми акредитаційної експертизи</option>
                                    <option value="rkk">рішення конкурсної комісії</option>
                                    <option value="coopagree">договір про співробітництво</option>
                                    <option value="reldoc">супутні документи</option>
                                    <option value="staj">стажування</option>
                                    <option value="faculty">для факультету</option>
                                    <option value="kafedr">для кафедр</option>
                                    <option value="teacher">для викладачів</option>
                                    <option value="student">для студентів</option>
                                </optgroup>
                                <optgroup label="План">
                                    <option value="lecture">План проведення відкритих лекцій</option>
                                    <option value="pl">План роботи навчально-методичного центру ЗЯВО</option>
                                    <option value="pv">План видання навчально-методичної літератури (методичні вказівки)</option>
                                    <option value="ps">План створення лекцій на електронних і паперових носіях</option>
                                    <option value="ppiv">План підготовки і видання підручників і навчальних посібників з грифом ОНАХТ</option>
                                    <option value="ppmp">План видання мультимедійних підручників</option>
                                    <option value="publisheng">План видання англомовної навчально-методичної літератури</option>
                                    <option value="publishdp">План створення методичних матеріалів до виконання дипломних проектів і магістерських робіт</option>
                                    <option value="publishkr">План видання методичних матеріалів до курсового проектування</option>
                                </optgroup>
                                <optgroup label="Публіна інформація">
                                    <option value="monitoring">Результати моніторингу якості вищої освіти</option>
                                    <option value="top100">Щорічне оцінювання здобувачів ОНАХТ (ТОП-100)</option>
                                    <option value="cooldp">Відзначення кращих дипломних проєктів бакалаврів/кваліфікаційних робіт магістрів</option>
                                </optgroup>
                                <optgroup label="Проведення науково-методичних семінарів на кафедрах">
                                    <option value="ksa">КСтаА</option>
                                    <option value="ebk">ЕБіК</option>
                                    <option value="itxrgb">ІТХіРГБ</option>
                                    <option value="kipkb">КІПтаКБ</option>
                                    <option value="mmil">ММіЛ</option>
                                    <option value="nge">НГтаЕ</option>
                                    <option value="nttim">НТТтаІМ</option>
                                    <option value="tvtb">ТВтаТБ</option>
                                    <option value="tzzb">ТЗіЗБ</option>
                                    <option value="tthppb">ТтаТХПіПБ</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="InputTitle">
                        </div>
                        <div class="col-4">
                            <div class="">
                                <input type="file" class="" name="InputFile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success float-right p-1 mb-2" value="Завантажити">
                </div>
            </form>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">

            <div class="table-responsive">
                <table class="table table-responsive-lg table-bordered table-striped table-hover datatable-basic">
                    <thead>
                    <tr>
                        <th>Сторінка</th>
                        <th>Тітул</th>
                        <th>коли був завантажен</th>
                        <th>файл оновлення</th>
                        <th>назва файлу</th>
                        <th>функ.</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($uplFile as $listFile)
                        <tr>
                            <td>{{ $listFile->title_page }}</td>
                            <td>{{ $listFile->title }}</td>
                            <td>{{ $listFile->created_at }}</td>
                            <td>{{ $listFile->updated_at }}</td>
                            <td>{{ $listFile->filename }}</td>
                            <td>
                                <div class="btn-group">
                                    <button title="редагувати"
                                            data-edit="{{$listFile->id}}"
                                            data-title="{{$listFile->title}}"
                                            data-filename="{{$listFile->filename}}"
                                            class="btn btn-sm btn-icon border-1 btn-outline bg-blue-400 text-blue-400 border-blue-400 edit_upload">
                                        <i class="icon-pencil3"></i>
                                    </button>
                                    <button title="видалити"
                                            data-delete="{{$listFile->id}}"
                                            data-filename="{{$listFile->filename}}"
                                            class="btn btn-sm btn-icon border-1 btn-outline bg-danger-400 text-danger-400 border-danger-400 delete_uload">
                                        <i class="icon-eraser2"></i>
                                    </button>
                                </div>
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