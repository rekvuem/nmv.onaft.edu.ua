$(document).ready(function () {
  /*e e.preventDefault();*/
  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });


  $('.deleting').on('click', function () {
    var title = $(this).data('fourid');
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
          url: '/spanel/ucheb/certification/' + title,
          data: {
            _method: 'delete',
            id: title
          },
          success: function () {
            new PNotify({
              title: 'Запис видалено',
              text: 'Запис видалено успішно!',
              icon: 'icon-checkmark3',
              addclass: 'bg-danger border-danger'
            });
            setTimeout('location.reload(true)', 5000);
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
  /*******************************************************************************************/
  $('.select_second').on('click', function () {
    var level_2 = $(this).data('secondid');

    swalInit.fire({
      title: 'Додати напрям підготовки',
      html: '\n\
          <input type="hidden" name="form-second" class="form-control">\n\
          <input type="hidden" name="second_level" class="form-control" value="' + level_2 + '">\n\
          <input type="text" id="predmet" name="forwardpredmet" class="form-control border-blue-800" value="" required>',
      showCancelButton: true,
      cancelButtonClass: 'btn bg-grey',
      confirmButtonClass: 'btn bg-success',
      cancelButtonText: 'Закрити',
      confirmButtonText: 'Додати!'
    }).then((result) => {
      if (result.value) {
        var text = $('input[name=forwardpredmet]').val();
        var datarows = 'form-second=true&second_level=' + level_2 + '&forwardpredmet=' + text;
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: '/spanel/ucheb/cert_post_ajax',
          data: datarows,
          success: function () {
            console.log(datarows);
          },
          error: function (data) {
            console.log(data);
          }
        });
      } else {
        location.reload();
      }
    });
  });
  /*********************************************************************************************/
  $('.select_third').on('click', function () {
    var level_3 = $(this).data('thirdid');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Додати сертифікат',
      html: '\n\
        <form action="/spanel/ucheb/cert_post_ajax" method="POST" enctype="multipart/form-data" id="form_add_sert"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="form-third" class="form-control">\n\
          <input type="hidden" name="third_level" class="form-control" value="' + level_3 + '">\n\
          <input type="text" name="add_certificat" placeholder="Назва" class="form-control border-blue-800" value="" required>\n\
          <input type="text" name="have_url" placeholder="Посилання" class="form-control border-blue-800 m-1" value="" >\n\
          <input type="file" name="CertifFile" class="form-control-uniform-custom m-1" >\n\
          <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="Додати">\n\
          <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">Закрити</button>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        new PNotify({
          title: 'Запис',
          text: 'Данні успішно додані!',
          icon: 'icon-checkmark3',
          addclass: 'bg-success border-success'
        });
        setTimeout('location.reload(true)', 5000);
      } else {
        location.reload();
      }
    });
  });
  /*************************************************************************************************/
  $('.select_four').on('click', function () {
    var level_4 = $(this).data('fourid');
    var text = $(this).data('text');
    var filenames = $(this).data('filenames');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Відрадегувати сертифікат',
      html: '\n\
        <form action="/spanel/ucheb/cert_update_ajax" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="form-four" class="form-control">\n\
          <input type="hidden" name="title_id" class="form-control" value="' + level_4 + '">\n\
            <div class="form-group">\n\
              <input type="text" name="add_certificat" placeholder="Назва" class="form-control border-blue-800" value="' + text + '">\n\
            </div>\n\
            <div class="form-group">\n\
              <input type="text" name="have_url" placeholder="Посилання" class="form-control border-blue-800 m-1" value="' + filenames + '" >\n\
            </div>\n\
            <div class="form-group">\n\
              <select name="chose_nzavo">\n\
                <option value="0">Простій</option>\n\
                <option value="1">НЗЯВО</option>\n\
              </select>\n\
            </div>\n\
            <div class="form-group">\n\
              <input type="file" name="CertifFile" class="form-control-uniform-custom m-1" >\n\
            </div>\n\
            <div class="form-group">\n\
              <input type="submit" class="btn btn-sm bg-blue-800" onclick="swal.clickConfirm()" value="Зберегти">\n\
              <button type="button"  class="btn btn-sm btn-danger" onclick="swal.clickCancel()">Закрити</button>\n\
            </div>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        new PNotify({
          title: 'Запис',
          text: 'Данні успішно відрадоговані!',
          icon: 'icon-checkmark3',
          addclass: 'bg-success border-success'
        });
        setTimeout(function () {
          location.reload();
        }, 15000);
      } else {
        location.reload();
      }
    });
  });
  /**********************************************************************************/
  $('.select_edit_3').on('click', function (e) {
    e.preventDefault();
    var edit_level_3 = $(this).data('edit3id');
    var text = $(this).data('text');
    var CSRF = $('meta[name="csrf-token"]').attr('content');

    swalInit.fire({
      title: 'Відрадегувати напрям',
      html: '\n\
        <form action="/spanel/ucheb/cert_update_ajax" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="form-edit-level3">\n\
          <input type="hidden" name="title_edit_id" class="form-control" value="' + edit_level_3 + '">\n\
          <div class="form-group">\n\
              <input type="text" name="edit_napryam" placeholder="Назва" class="form-control border-blue-800" value="' + text + '">\n\
          </div>\n\
          <div class="form-group">\n\
             <input type="submit" class="btn btn-sm bg-blue-800" onclick="swal.clickConfirm()" value="Зберегти1">\n\
             <button type="button"  class="btn btn-sm btn-danger" onclick="swal.clickCancel()">Закрити</button>\n\
          <div>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {      
      if (result.value) {  
//        new PNotify({
//          text: 'Данні успішно відрадоговані!',
//          icon: 'icon-checkmark3',
//          addclass: 'bg-success border-success'
//        });
      } else {
        location.reload();
      }
    });
  });

});