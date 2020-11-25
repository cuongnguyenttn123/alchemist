$(document).ready(function () {
  $('.btn-toastr').each(function() {
      $context = $(this).data('context');
      $message = $(this).data('message');
      $position = $(this).data('position');

      if ($context === '') {
          $context = 'info';
      }

      if ($position === '') {
          $positionClass = 'toast-bottom-right';
      } else {
          $positionClass = 'toast-' + $position;
      }

      toastr.remove();
      toastr[$context]($message, '', {
          positionClass: $positionClass
      });
  });

})

/**
*
* @param data
* @param link
* @param method
* @param ele row of the table
* @param cb function call after done
*/
function showConfirmMessage(data, link, method = 'GET', ele = null,cb=null,object=null) {
  swal({
      title: "Are you sure?",
      text: "You will not be able to recover this category!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#dc3545",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
  }, function () {
      if(link){
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax(link,{
              'type':method,
              'data':data,
              'success':function (data) {
                  if(data.status){
                      swal("Deleted!", "The category has been deleted.", "success");
                      cb(ele,object);
                  }else{
                      swal("Error!", "An error was occurred, please make sure your select is correctly", "warning");
                      return false;
                  }
              }
          });
      }
  });
}

/**
*
* @param data
* @param link
* @param method
* @param ele row of the table
* @param object html object for save row
* @param cb function call after done
*/
function update_data(data, link, method = 'GET', ele = null,object=null,cb=null){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax(link,{
      'type': method,
      'data':data,
    'success': function (data) {
        if(cb)
          cb(ele,object,data)
      }
  });
}

//#region get data
/**
*
* @param data
* @param link
* @param method
* @param ele row of the table
* @param object html object for save row
* @param cb function call after done
*/
function get_data(data, link, method = 'GET', object = null, cb = null) {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax(link,{
    'type': method,
    'data':data,
    'success':function (data) {
        cb(object,data)
    }
});
}

//#endregion get addresses

//#region time index
/**
* @author khaih
* @desc get id with current time in integer convert
* @return int
*/
let gen_id = function () {
var id = new Date().getTime();
return id;
}
//#endregion time index

//#region string to html
/**
* @author khaih
* @desc get html element from string
* @param {stirng} s 
* @return html element
*/
let html_parser = function (s) {
return new DOMParser().parseFromString(s, "text/html");
}
// #endregion text to html
// #region file upload
/**
* @author khaih
* @email khaihoangdev@gmail.com
* @desc Upload file to server
* @return 
* @time 08h:10/01/2019
* @status Finish
* @requires 
  [@size int number of file,
  [@accept {} list type of file,
  [@cb func(data) callback function]]]
*/
let drop_sync_file = function (size = 1, accept = ".jpeg,.jpg,.png,.pdf,.doc,.docx,.xls,.xlsx,.csv", url = null,cb) {
      Dropzone.options.myDropzone ={
      paramName: 'file',
      maxFilesize: 2, // MB
      maxFiles: size,
      acceptedFiles: accept,
      url: url,
      init: function () {
          that = this;
          this.on("success", function (file, response) {
            if (response.status == "success") {
              var data = response.info;
              cb(data)
            }
          });
      }
    }
  }
// #endregion file upload
//#region query selector  
/**
* @desc query quickly
* @return none|object
* @status Finish
* @requires 
* @created 09h:29/01/2019
* @updated 
*/
let _ = function(selector, key) {
  var query = document.querySelector(selector);
  if (key) {
    document[key] = query;
  } else {
    return query;
  }
}
let __ = function (selector, key) {
  var query = document.querySelectorAll(selector);
  if (key) {
    document[key] = query;
  } else {
    return query;
  }
}
let _parents = function (element, selector) {
  cur = element.parentElement;
  while (cur && !cur.classList.contains(selector)) {
    cur = cur.parentElement;
  }
  return cur;
}
//#endregion query selector 