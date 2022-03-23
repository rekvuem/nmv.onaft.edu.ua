$(document).ready(function () {

  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });


  /*********************************/
  /***********   update   **********/
  $('.select_edit_opp_level1').on('click', function () {
    var oppd = $(this).data('oppd');
    var num_spec = $(this).data('oppnum');
    var spec = $(this).data('text');
    var opptype = $(this).data('typeopp');
    var type = $(this).data('type');
    var status = $(this).data('status');
    var CSRF = $('meta[name="csrf-token"]').attr('content');

    if (opptype === 'opp') {
      var selected_opp = 'selected';
    }
    if (opptype === 'onp') {
      var selected_onp = 'selected';
    }

    if (type === 'b') {
      var selected_b = 'selected';
    }
    if (type === 'm') {
      var selected_m = 'selected';
    }

    if (status === 'not') {
      var status_not = 'selected';
    }
    if (status === 'some') {
      var status_some = 'selected';
    }
    if (status === 'ok') {
      var status_ok = 'selected';
    }
    swalInit.fire({
      title: 'Редагувати',
      html: '\n\
        <form action="/spanel/ucheb/opp/' + oppd + '" method="POST"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="PUT">\n\
          <input type="hidden" name="update_special">\n\
            <div class="form-group">\n\
              <select name="type_opp" class="form-control select2">\n\
                <option value="opp" ' + selected_opp + ' >ОПП</option>\n\
                <option value="onp" ' + selected_onp + ' >ОНП</option>\n\
              </select>\n\
            </div>\n\
            <div class="form-group">\n\
              <select name="type" class="form-control select2">\n\
                <option value="b" ' + selected_b + ' >бакалавр</option>\n\
                <option value="m" ' + selected_m + ' >магістр</option>\n\
              </select>\n\
            </div>\n\
            <div class="form-group">\n\
              <select name="status_download" class="form-control select2">\n\
                <option value="not" ' + status_not + ' >не маэ файлу</option>\n\
                <option value="some" ' + status_some + ' >частково завантажено</option>\n\
                <option value="ok" ' + status_ok + ' >повне завантаження</option>\n\
              </select>\n\
            </div>\n\
            <div class="form-group">\n\
              <input type="text" name="num" class="form-control" value="' + num_spec + '">\n\
            </div>\n\
          <div class="form-group">\n\
            <input type="text" name="specialization" class="form-control" value="' + spec + '">\n\
          </div>\n\
          <div class="form-group">\n\
            <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="Зберегти">\n\
            <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">Закрити</button>\n\
          </div>\n\
        </from>',
      onOpen: () => {
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      },
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        new PNotify({
          title: 'Запис!',
          text: 'Запис відрадоговано!',
          icon: 'icon-thumbs-up2',
          addclass: 'bg-info-700 border-info-700'
        });
        setTimeout('location.reload(true)', 2000);
      } else {
        new PNotify({
          title: 'Відміна!',
          icon: 'icon-cancel-square2',
          addclass: 'bg-danger-500 border-danger-500'
        });
        setTimeout('location.reload(true)', 2000);
      }
    });
  });

  /********************************************************/
  /******************* add *******************************/
  $('.select_add_opp_level1').on('click', function (e) {
    var oppd = $(this).data('oppd');
    var CSRF = $('meta[name="csrf-token"]').attr('content');

    swalInit.fire({
      title: 'Додати',
      html: '\n\
        <form action="/spanel/ucheb/opp" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="addspecial">\n\
          <input type="hidden" name="opp_special" value="' + oppd + '">\n\
          <div class="form-group">\n\
            <div class="text-left">Рік</div>\n\
            <input class="form-control" name="year" type="text" value="">\n\
          </div>\n\
            <div class="form-group">\n\
<div class="text-left">Статут файлу</div>\n\
              <select name="status_download" class="form-control select2">\n\
                <option value="not">не маэ файлу</option>\n\
                <option value="some">частково завантажено</option>\n\
                <option value="ok">повне завантаження</option>\n\
              </select>\n\
            </div>\n\
          <div class="form-group">\n\
            <div class="text-left">ОПП / ОНП</div>\n\
            <input class="form-control" name="opp" type="text" value="">\n\
          </div>\n\
          <div class="form-group">\n\
            <div class="text-left">Завантажити файл</div>\n\
            <input class="form-control" name="FileUploadOPP" type="file">\n\
          </div>\n\
          <div class="form-group">\n\
            <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="Зберегти">\n\
            <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">Закрити</button>\n\
          </div>\n\
        </from>',
      onOpen: () => {
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      },
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        new PNotify({
          title: 'Додано!',
          text: 'Cпеціальність додано!',
          icon: 'icon-thumbs-up2',
          addclass: 'bg-info-700 border-info-700'
        });
        setTimeout('location.reload(true)', 2000);
      } else {
        new PNotify({
          title: 'Відміна!',
          icon: 'icon-cancel-square2',
          addclass: 'bg-danger-500 border-danger-500'
        });
        setTimeout('location.reload(true)', 2000);
      }
    });
  });
  /**************************************************************************/
  /**************************       delete      *****************************/
  $('.select_delete_opp_level2').on('click', function () {
    var uploadd = $(this).data('uploadid');
    var filenames = $(this).data('filename');
    var CSRF = $('meta[name="csrf-token"]').attr('content');

    swalInit.fire({
      title: 'Ви бажаэте видалити запис?',
      text: 'Відновлення запису неможливо',
      type: 'warning',
      position: 'top',
      html: '\n\
        <form action="/spanel/ucheb/opp/delete/' + uploadd + '" method="POST"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="DELETE">\n\
          <input type="hidden" name="delete_row_opp">\n\
          <input type="hidden" name="fname" value="' + filenames + '">\n\
          <div class="form-group">\n\
            <input type="submit" class="btn bg-success-600" onclick="swal.clickConfirm()" value="Так, видалити!">\n\
            <button type="button"  class="btn btn-link bg-danger-600" onclick="swal.clickCancel()">Ні!</button>\n\
          </div>\n\
        </from>',
      onOpen: () => {
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      },
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        new PNotify({
          title: 'Видалено!',
          text: 'Cпеціальність видалено!',
          icon: 'icon-thumbs-up2',
          addclass: 'bg-info-700 border-info-700'
        });
        setTimeout('location.reload(true)', 2000);
      } else {
        new PNotify({
          title: 'Відміна!',
          icon: 'icon-cancel-square2',
          addclass: 'bg-danger-600 border-danger-600'
        });
        setTimeout('location.reload(true)', 2000);
      }
    });
  });

  /**************************************************************************/
  /**************************       edit      *****************************/
  $('.select_edit_upload_level2').on('click', function () {
    var uploadid = $(this).data('uploadid');
    var upload_text = $(this).data('upload_text');
    var status = $(this).data('status');
    var years = $(this).data('year');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    if (status === 'not') {
      var statut_not = 'selected';
    }
    if (status === 'ok') {
      var statut_ok = 'selected';
    }
    swalInit.fire({
      title: 'Редагувати',
      html: '\n\
        <form action="/spanel/ucheb/opp/opp_upd" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="PATCH">\n\
          <input type="hidden" name="oppupdate" value="'+uploadid+'">\n\
          <input type="hidden" name="update_upload">\n\
          <div class="form-group ">\n\
            <input type="text" class="form-control" name="specialization" value="' + upload_text + '">\n\
          </div>\n\
          <div class="form-group ">\n\
              <select name="status_download" class="form-control select2">\n\
                <option value="not" ' + statut_not + '>не маэ файлу</option>\n\
                <option value="ok"  ' + statut_ok + '>завантажено</option>\n\
              </select>\n\
          </div>\n\
          <div class="form-group ">\n\
                    \n\
            <input type="text" class="form-control" name="year" value="' + years + '">\n\
          </div>\n\
          <div class="form-group ">\n\
              \n\
            <input type="file" class="form-control" name="FileUploadOPP" value="">\n\
          </div>\n\
          <div class="form-group ">\n\
            <input type="submit" class="btn bg-success-600" onclick="swal.clickConfirm()" value="Так, зберегти!">\n\
            <button type="button"  class="btn btn-link bg-danger-600" onclick="swal.clickCancel()">Відміна!</button>\n\
          </div>\n\
        </from>',
      onOpen: () => {
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      },
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        new PNotify({
          title: 'Відрадеговано!',
          icon: 'icon-thumbs-up2',
          addclass: 'bg-info-700 border-info-700'
        });
        setTimeout('location.reload(true)', 2000);
      } else {
        new PNotify({
          title: 'Відміна!',
          icon: 'icon-cancel-square2',
          addclass: 'bg-danger-600 border-danger-600'
        });
        setTimeout('location.reload(true)', 2000);
      }
    });
  });




});