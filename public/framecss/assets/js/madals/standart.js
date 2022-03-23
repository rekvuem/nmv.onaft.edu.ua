$(document).ready(function(){
  
  var swalInit = swal.mixin({
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: true
  });

  /*********************************************************************************************/
  $('.add_standart').on('click', function () {
    var level2 = $(this).data('lev2id');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Додати стандарт',
      html: '\n\
        <form action="/spanel/ucheb/standart_store_ajax" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="form-add-standart" class="form-control">\n\
          <input type="hidden" name="rowidlevel2" class="form-control" value="' + level2 + '">\n\
          <input type="text" name="addstandart" placeholder="Назва" class="form-control border-blue-800" value="" required>\n\
          <input type="text" name="urlstandart" placeholder="url" class="form-control border-blue-800" value="">\n\
          <input type="file" name="StandartFile" class="form-control" >\n\
          <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="Додати">\n\
          <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">Закрити</button>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        setTimeout('location.reload(true)', 1000);
      } else {
        location.reload();
      }
    });
  });
  /*************************************************************************************************/
  $('.edit_specialize').on('click', function () {
    var level2 = $(this).data('lev2id');
    var levtitle= $(this).data('tittext');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Редагувати',
      html: '\n\
        <form action="/spanel/ucheb/standart/'+level2+'" method="POST"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="PUT">\n\
          <input type="hidden" name="form-edit-special" class="form-control">\n\
          <input type="text" name="specialtitle" class="form-control border-blue-800" value="'+levtitle+'">\n\
          <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="зберегти">\n\
          <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">відміна</button>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
        setTimeout('location.reload(true)', 1000);
      } else {
        location.reload();
      }
    });
  });
  /*********************************************************************************************/
  $('.edit_standart').on('click', function () {
    var level3id = $(this).data('lev3id');
    var levtitle= $(this).data('lev3title');
    var filename = $(this).data('filetitle');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Редагувати',
      html: '\n\
        <form action="/spanel/ucheb/standart_ajax_upd" method="POST" enctype="multipart/form-data"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="standart" value="' + level3id + '">\n\
          <input type="hidden" name="_method" value="PATCH">\n\
          <input type="hidden" name="form-edit-standart" class="form-control">\n\
          <input type="text" name="standarttitle" placeholder="Назва" class="form-control border-blue-800" value="'+levtitle+'">\n\
          <input type="text" name="urlstandart" placeholder="url" class="form-control border-blue-800" value="'+filename+'">\n\
          <input type="file" name="StandartFile" class="form-control" >\n\
          <input type="submit" class="btn bg-blue-800" onclick="swal.clickConfirm()" value="зберегти">\n\
          <button type="button"  class="btn btn-link" onclick="swal.clickCancel()">відміна</button>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if(result.value){
       
        setTimeout('location.reload()', 4000);
      }
    });
  
  });
  /*************************************************************************************************/
    $('.delete_standart').on('click', function () {
    var level3id = $(this).data('lev3id');
    var filename = $(this).data('filetitle');
    var CSRF = $('meta[name="csrf-token"]').attr('content');
    swalInit.fire({
      title: 'Ви бажаэте видалити запис?',
      text: 'Відновлення запису неможливо',
      type: 'warning',
      position: 'top',
      html: '\n\
        <form action="/spanel/ucheb/standart/' + level3id + '" method="POST"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="DELETE">\n\
          <input type="hidden" name="delete_lev3">\n\
          <input type="hidden" name="fname" value="' + filename + '">\n\
          <div class="form-group">\n\
            <input type="submit" class="btn bg-success-600" onclick="swal.clickConfirm()" value="Так, видалити!">\n\
            <button type="button"  class="btn btn-link bg-danger-600" onclick="swal.clickCancel()">Ні!</button>\n\
          </div>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
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
  /*************************************************************************************************/  
    $('.delete_specializ').on('click', function () {
    var level2id = $(this).data('lev2id');
    var CSRF = $('meta[name="csrf-token"]').attr('content');

    swalInit.fire({
      title: 'Ви бажаэте видалити запис?',
      text: 'Відновлення запису неможливо',
      type: 'warning',
      position: 'top',
      html: '\n\
        <form action="/spanel/ucheb/standart/' + level2id + '" method="POST"> \n\
          <input type="hidden" name="_token" value="' + CSRF + '">\n\
          <input type="hidden" name="_method" value="DELETE">\n\
          <input type="hidden" name="delete_lev2">\n\
          <div class="form-group">\n\
            <input type="submit" class="btn bg-success-600" onclick="swal.clickConfirm()" value="Так, видалити!">\n\
            <button type="button"  class="btn btn-link bg-danger-600" onclick="swal.clickCancel()">Ні!</button>\n\
          </div>\n\
        </from>',
      showConfirmButton: false,
      showCancelButton: false
    }).then((result) => {
      if (result.value) {
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