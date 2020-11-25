$(function () {
  var date_start_content = '';


  $(document).on('click', '.click-delete-file', function(){
    var arrayfile = $(this).attr("data-filedelete");
    if ($('#list_array_delete').val() == ''){
      var item = [];
    }else {
      var item = JSON.parse("[" + $('#list_array_delete').val() + "]");
    }

    if ($('#list_array_delete_drag').val() == ''){
      var itemDrag = [];
    }else {
      var itemDrag = JSON.parse("[" + $('#list_array_delete_drag').val() + "]");
    }

    if ($('#list_id_file_drag').val() == ''){
      var itemDragDelete = [];
    }else {
      var itemDragDelete = JSON.parse("[" + $('#list_id_file_drag').val() + "]");
    }

    item.push(arrayfile);
    $('#list_array_delete').val(item);
    var nameclass = '.delete-view-'+arrayfile;
   // console.log(nameclass);
    $(nameclass).remove();
    var files = $('.hp_file_create_contest').get(0).files;
    if (item.length == files.length && itemDrag.length == itemDragDelete.length){
      $('.click-delete-file-all').trigger('click');
    }
    $(this).closest('.cart_item').remove();
  });

  $(document).on('click', '.click-delete-file-all', function(){
    $('.hienthi').html('');
    $('#messages').html('');
    $('#list_array_delete_drag').val($('#list_id_file_drag').val());
    var item = [];
    var files = $('.hp_file_create_contest').get(0).files;
    $.each(files,function(i,file){
      item.push(i);
    });
    $('.file-drag-preview').css("display", "block");
    $('.btn-display-none').css("display", "none");
    $('#list_array_delete').val(item);

  });

  $(document).on('click', '.click-delete-file-drag', function(){
    var arrayfile = $(this).attr("data-idfile");
    if ($('#list_array_delete_drag').val() == ''){
      var item = [];
    }else {
      var item = JSON.parse("[" + $('#list_array_delete_drag').val() + "]");
    }

    if ($('#list_array_delete').val() == ''){
      var itemDrag = [];
    }else {
      var itemDrag = JSON.parse("[" + $('#list_array_delete').val() + "]");
    }

    if ($('#list_id_file_drag').val() == ''){
      var itemDragDelete = [];
    }else {
      var itemDragDelete = JSON.parse("[" + $('#list_id_file_drag').val() + "]");
    }

    var files = $('.hp_file_create_contest').get(0).files;
    if (itemDrag.length == files.length && item.length == itemDragDelete.length){
      $('.click-delete-file-all').trigger('click');
    }
    item.push(arrayfile);
    $('#list_array_delete_drag').val(item);
    var nameclass = '.delete-view-'+arrayfile;
    //console.log(nameclass);
    $(nameclass).html('');
    $(this).closest('.file-upload-drag').remove();
  });

});

$("input, select").change(function(){
  hungcheck();
  nextstep();
  list_type_bid_content();
  cat_skill();
  totaldaycontest()
});






function totaldaycontest(){
  var deadtime = $('.deadline-time').find('input.contest-time-line').val();
  var datenow = $('#contest_time_end_value').find('input[name=time_end]').val();
  if(deadtime && datenow){
    var totalday = daydiff(parseDate(datenow),parseDate(deadtime));
    $('body').find('span.totalday').html(totalday);
    $('body').find('span.total-contest-day').html(totalday);
  }
  var time_start = $('#startbid').val();
  var time_end = $('#endbid').val();
  if(time_start && time_end){
    var totaltime = daydiff(parseDate(time_start),parseDate(time_end));
    $('body').find('span.totaltime').html(totaltime);
  }

}
function list_type_bid_content(){
  var total1 = 0;
  var total2 = 0;
  var total3 = 0;
  var total4 = 0;
  var listname= "";
  $('.list_type_bid_contest').each(function(){
    $(this).find('.list_type input[type=checkbox]').each(function(){
      $('.friend-header-thumb-none').css("display", "none");
      //console.log("không click nek");

    });
    $(this).find('.list_type input[type=checkbox]:checked').each(function(){
      listname = $(this).closest('.checkbox').find('.listname').html();
      var data1 = $(this).attr('data-week1');
      var data2 = $(this).attr('data-week2');
      var data3 = $(this).attr('data-week3');
      var data4 = $(this).attr('data-week4');
      //console.log(data1);
      var val = $(this).val();
      total1 += Number(data1);
      total2 += Number(data2);
      total3 += Number(data3);
      total4 += Number(data4);
      //console.log("click nek");
      if(listname == "Featured Contest"){
        $('.friend-header-thumb-none').css("display", "block");
      }else {
        $('.friend-header-thumb-none').css("display", "none");
      }
    });

    if(total1 > 0){
      $('span.oneweek').html(total1);
      $('input.oneweek').attr('value',total1);
      $('span.twoweek').html(total2);
      $('input.twoweek').attr('value',total2);
      $('span.threeweek').html(total3);
      $('input.threeweek').attr('value',total3);
      $('span.fourweek').html(total4);
      $('input.fourweek').attr('value',total4);
    }else{
      $('.oneweek').html('5');
      $('input.oneweek').attr('value','5');
      $('.twoweek').html('7.5');
      $('input.twoweek').attr('value','7.5');
      $('.threeweek').html('10');
      $('input.threeweek').attr('value','10');
      $('.fourweek').html('13.5');
      $('input.fourweek').attr('value','13.5');
    }
    function addDays(dateObj, numDays) {
      dateObj.setDate(dateObj.getDate() + numDays);
      return dateObj;
    }
    $('.hp_week').each(function(){
      $(this).find('input[type=radio]:checked').each(function(){

        var price_craftingcost = $(this).val();
        //alert(price_craftingcost);
        //console.log(price_craftingcost);
        var week = $(this).attr('data-week');
        $('.bid_week').html(7*week);
        $(this).closest('.hp_week').find('input[type=hidden]').attr('value',week);
        $('.craftingcost').html(price_craftingcost);
        var dateCreate = $('.deadline-time').find('input.contest-time-line').val();
        var date = new Date(dateCreate);
        var date_start = ( '0' + (date.getMonth()+1) ).slice( -2 )+'/'+('0' + date.getDate()).slice( -2 )+'/'+date.getFullYear();
        $('.bid_start_contest').html(date_start);
        var end_day = addDays(date , 7*week);
        var date_stop = ( '0' + (end_day.getMonth()+1) ).slice( -2 )+'/'+('0' + end_day.getDate()).slice( -2 )+'/'+end_day.getFullYear();
        //console.log(date_stop);
        $('.bid_end_contest').html(date_stop);
        date_stop = date_stop +' 12:30';
        const date1 = new Date(date_start);
        const date2 = new Date(date_stop);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
        var countdown = diffDays+' Days, ' + hours +' Hours, ' +minutes +' Mins';
        //console.log(countdown)
        $('.bid_end_contest_day').html(countdown);
        $('.contest_week').html(week);
        $('#contest_time_end_value').val(( '0' + (end_day.getMonth()+1) ).slice( -2 )+'/'+('0' + end_day.getDate()).slice( -2 )+'/'+end_day.getFullYear())
      });
    });
  });
}

function nextstep(){
  var checkclass = $('.countbox').length;
  var hungthoaman = $('.thoaman').length;
  if(checkclass === hungthoaman){
    return true;
  }else{
    return false;
  }
}

$('.hp_file_contest').change(function(){
  $('#list_array_delete').val('');
  $('.btn-clear-file').css("display", "inherit");
  var ui_block = $('.hp_previewfile').find('.hienthi');
  ui_block.html('');
  var $this = $('.hp_previewfile').find('.cart_item.d-none');
  var files = $(this).get(0).files;
  if(files.length ===0){
    $('.previewfile').addClass('hp_hidden');
  }else{
    $('.previewfile').removeClass('hp_hidden');
  }
  $('.file-drag-preview').css("display", "none");
  $('.btn-display-none').css("display", "block");
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
    var classnew = 'delete-view-'+i;
    clone.addClass(classnew);
    //console.log(fileName);
    if(fileName.length > 50)
    {
      fileName = fileName.substr(0,50) + "...";
    }
    clone.find('img').attr('src',newstring);
    clone.find('.delete-file img').attr('src','img/trash.svg');
    clone.find('.click-delete-file').attr('data-filedelete',i);
    clone.find('.content .title').append(fileName);
    clone.find('.content .post__date time').append(name_file);
    ui_block.append(clone);
  });
});

// buget price

// end bugget price
