$(document).ready(function () {
  /*начальная инициализация настройки */
  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });
  /*********************************************************************************************/
  $('.edit_upload').on('click', function () {
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
          <input type="hidden" name="filename" value="'+filename+'">\n\
                <input type="text" name="titleFile" placeholder="Назва" class="form-control border-blue-800" value="'+edittitle+'" > \n\
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
                        <option value="monitoring">Результати моніторингу якості вищої освіти</option>\n\
                        <option value="publicinfo">Публічна інформація</option>\n\
                      </optgroup>\n\
                      <optgroup label="Документація">\n\
                        <option value="reldoc">супутні документи</option>\n\
                        <option value="staj">стажування</option>\n\
                        <option value="faculty">для факультету</option>\n\
                        <option value="kafedr">для кафедр</option>\n\
                        <option value="teacher">для викладачів</option>\n\
                        <option value="student">для студентів</option>\n\
                      </optgroup>\n\
                      <optgroup label="План">\n\
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
          url: 'siteupload/'+ deleteid,
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







           