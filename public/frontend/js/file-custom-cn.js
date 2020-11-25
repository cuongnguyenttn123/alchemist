
$(document).ready(function() {
  $('.hp_file_upload').change(function(){
    var key_show =  $(this).attr('data-show_key');
    var show_check =  $(this).attr('data-show_check');
    if (show_check==1){
      var item_show = '.show-file-update-0-'+key_show;
      var id_list = '#list_array_delete_bid_0_'+key_show;
    }else {
      var item_show = '.show-file-update-'+key_show;
      var id_list = '#list_array_delete_bid_'+key_show;
    }
    var item = [];
    $(id_list).val(item);
    var ui_block = $('.hp_previewfile').find(item_show);
    ui_block.html('');
    var $this = $('.hp_previewfile').find('.cart_item_1.d-none');
    var files = $(this).get(0).files;
    if(files.length ===0){
      $('.previewfile').addClass('hp_hidden');
    }else{
      $('.previewfile').removeClass('hp_hidden');
    }

    $.each(files,function(i,file){
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
      clone.find('.click-delete-file').addClass('add-view-check');
      clone.find('.click-delete-file').attr('data-key_show',key_show);
      clone.find('.click-delete-file').attr('data-show_check',show_check);
      clone.find('.content .title').append(fileName);
      clone.find('.content .post__date time').append(name_file);
      ui_block.append(clone);
    });
  });
});
$(document).on('click', '.click-delete-file', function(){
  var arrayfile = $(this).attr("data-filedelete");
  var key_show = $(this).attr("data-key_show");
  var show_check =  $(this).attr('data-show_check');
  var id_list = '#list_array_delete_bid_'+show_check+'_'+key_show;
  console.log(id_list)
  $('#hp_file_delete').val(arrayfile);
  if ($(id_list).val() == ''){
    var item = [];
  }else {
    var item = JSON.parse("[" + $(id_list).val() + "]");
  }
  item.push(arrayfile);
  $(id_list).val(item);
  $(this).closest('.cart_item_1').remove();
});

$(document).on('click', '.click-delete-file-cosan', function(){
  var key_show = $(this).attr("data-key_show");
  var arrayfile = $(this).attr("data-delete_file_cosan");
  var show_check =  $(this).attr('data-show_check');
  var id_list = '#list_array_delete_bid_cosan_'+show_check+'_'+key_show;
  console.log(id_list)
  $('#hp_file_delete').val(arrayfile);
  if ($(id_list).val() == ''){
    var item = [];
  }else {
    var item = JSON.parse("[" + $(id_list).val() + "]");
  }
  item.push(arrayfile);
  $(id_list).val(item);
  $(this).closest('.cart_item').remove();
});


$(document).on('click', '.click-delete-file-all', function(){
  var data_show_all= $(this).attr('data-show-all');
  var id_list = '#list_array_delete_bid_'+data_show_all;
  var list_file_upload = '.get_list_file_'+data_show_all;
  var item = [];
  var files = $(list_file_upload).get(0).files;
  $.each(files,function(i,file){
    item.push(i);
  });
  $(id_list).val(item);
  var item_show = '.show-file-update-'+data_show_all;
  $(item_show).html('');
});

