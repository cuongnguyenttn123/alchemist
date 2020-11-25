$(document).ready(function() {
  $('.hp_file_upload_bid').change(function(){
    var item = [];
    $('#list_array_delete_bid').val(item);
    var ui_block = $('.hp_previewfile_bid').find('.show-file-update-bid');

    ui_block.html('');
    var $this = $('.hp_previewfile_bid').find('.cart_item_bid.d-none');
    var files = $(this).get(0).files;
    if(files.length ===0){
      $('.previewfile').addClass('hp_hidden');
    }else{
      $('.previewfile').removeClass('hp_hidden');
    }
    $('.no-file-upload').css("display", "none");
    $('.show-display-btn-clear').css("display", "block");
    $.each(files,function(i,file){
      console.log(i)
      var clone = $this.clone().removeClass('d-none');
      var string = clone.find('.forum-item img').attr('src');
      var name = file.name;
      var lastDot = name.lastIndexOf('.');
      var fileName = name.substring(0, lastDot);
      var ext = name.substring(lastDot + 1);
      var name_file = '';
      if(ext == 'zip' || ext == "rar"){
        ext = 'zip';
        name_file = 'Zip File';
      }
      if(ext == 'jpg' || ext == "png" || ext == "gif"){
        ext = 'jpg';
        name_file = 'Image File';
      }
      if(ext == 'txt' || ext == 'docx'){
        ext = 'wordFile';
        name_file = 'Word Doc';
      }
      if(ext == 'pptx'){
        ext = "powerpointFile";
        name_file = 'PowerPoint';
      }
      if(ext == 'avi' || ext == 'flv' || ext == 'wmv' || ext == 'mov' || ext == 'mp3' || ext == 'mp4'){
        ext = 'video-player';
        name_file = 'Video File';
      }
      if(ext == 'pdf'){
        ext = 'pdfFILE';
        name_file = 'PDF File';
      }
      var laststring = string.lastIndexOf('.');
      var lastname = string.substring(laststring);
      var firststring = string.lastIndexOf('/');
      var firstname = string.substring(0,firststring+1);
      var newstring = firstname + ext + lastname;
      clone.find('img').attr('src',newstring);
      clone.find('.delete-file img').attr('src','img/trash.svg');
      clone.find('.click-delete-file').attr('data-filedelete',i);
      clone.find('.content .title').append(fileName);
      clone.find('.content .post__date time').append(name_file);
      ui_block.append(clone);
    });
  });
});

$(document).on('click', '.click-delete-file', function(){
  var arrayfile = $(this).attr("data-filedelete");
  $('#hp_file_delete').val(arrayfile);
  if ($('#list_array_delete_bid').val() == ''){
    var item = [];
  }else {
    var item = JSON.parse("[" + $('#list_array_delete_bid').val() + "]");
  }
  item.push(arrayfile);
  $('#list_array_delete_bid').val(item);
  $(this).closest('.cart_item_bid').remove();
});

$(document).on('click', '.click-delete-file-all', function(){
  var arrayfile = $(this).attr("data-filedelete");
  var item = [];
  $('#hp_file_delete').val(arrayfile);
  var item_show = '.show-file-update-bid';
  var files = $('.hp_file_upload_bid').get(0).files;
  $.each(files,function(i,file){
    item.push(i);
  });
  $('.no-file-upload').css("display", "block");
  $('.show-display-btn-clear').css("display", "none");
  $('#list_array_delete_bid').val(item);
  $(item_show).html('');
});
