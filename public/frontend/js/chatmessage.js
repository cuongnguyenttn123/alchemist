jQuery(document).ready(function($) {



  $('.stop-show').click(function(e){
    e.stopPropagation();
  });

  $('.mCustomScrollbar').perfectScrollbar();

  //post message
  $(document).on('submit', '.message-reply', function(e) {
    e.preventDefault();
    var message_list = $('.wrapmessage .chat-message-field');
    var message_list_popup = $('.popup-chat .chat-message-field');
    form = $(this);
    var form_data = new FormData(form[0]);
    form_data.append('files', form.find('input[name=files]').val());

     // form_data = form.serialize();
     url = $('input[name=poststatus]').val();
     callAjax(url,form_data, function(res){
        if(res.error == false){
           form.find("input[type=text], textarea").val("");
           form.find("input[type=file], textarea").val("");
           form.find(".material-input").html("");
           form.find(".post-block-photo").html("");
           form.find(".post-block-files").html("");

           message_list_popup.append(res.data);
           message_list.append(res.data);
           if (typeof $.fn.magnificPopup !== 'undefined'){
              CRUMINA.mediaPopups();
            }
           window.callJs();
           window.chat_time();
           window.scrollToBottom();

           $('.mCustomScrollbar').perfectScrollbar();
           $('#add-files').removeClass('isdisable');
           $('.file-preview').addClass('d-hidden');

           $('.photo-preview').addClass('d-hidden');
           $('#add-image').removeClass('isdisable');

        }else{
           swal(res.message);
        }

     },true);

  });

  $(document).on('input, change', '.add-photo', function(e){
    e.preventDefault();
    form = $('#post_status');
    var list_media = form.find("input[name=list_media]");
    listing_table_img = form.find('.post-block-photo');

    var files = $(this).get(0).files;
    var form_data = new FormData();
    $.each(files,function(i,file){
      form_data.append('files[]', file);
    });
    url = $('input[name=previewimage]').val();
    callAjax(url,form_data, function(res){
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.data );
        // console.log(arr3);
        list_media.val(arr3);
        // console.log(list_media);
        var links = res.urls;
        $.each(links, function(i, link){
          var abc = link.lastIndexOf('/');
          var def = link.substring(abc + 1);
          var strings = link.lastIndexOf('.');
          var name = link.substring(strings + 1);

          var clone = form.find('.clone_img.clone.d-hidden').clone().removeClass('d-hidden');
          clone.find('img').attr('src', link);
          clone.find('.removeimg').attr('data-id',res.data[i] );
          listing_table_img.append(clone);

        });
        form.find('.photo-preview').removeClass('d-hidden');
        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }

        $('#add-files').addClass('isdisable');

        $('.removeimg').on("click", function (e) {
          e.preventDefault();

          var deleteid = $(this).attr('data-id');
          // console.log(res.data[i]);
          var a = res.data;
          a.forEach(function(item, index, array){
            // console.log(item, index);
            if(item == deleteid){
              a.splice(index, 1);
            }
          });
          list_media.val(a);
          $(this).closest('.clone').remove();
          console.log(a.length);
          if(a.length == 0){
            $('#add-photo').val('');
          }
          if(listing_table_img.html() == ''){
            $('.photo-preview').addClass('d-hidden');
            $('#add-files').removeClass('isdisable');
          }
        });
      }else{
        if(!$.isPlainObject(res.message)){
            swal(res.message);
        }else{
          $.each(res.message, function(key,value){
            swal(value[0]);
          });
        }
      }
    },true);

  });

  $(document).on('input, change', '.add-files', function(e){
    e.preventDefault();
    form = $('#post_status');
    var list_media = form.find("input[name=list_media]");
    listing_table_file = form.find('.post-block-files');

    var files = $(this).get(0).files;
    var form_data = new FormData();
    $.each(files,function(i,file){
      form_data.append('files[]', file);
    });
    form_data.append('type', 'project');
    url = $('input[name=previewimage]').val();
    callAjax(url,form_data, function(res){
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.data );
        // console.log(arr3);
        list_media.val(arr3);
        // console.log(list_media);
        var links = res.urls;
        $.each(links, function(i, link){
          var abc = link.lastIndexOf('/');
          var def = link.substring(abc + 1);
          var strings = link.lastIndexOf('.');
          var name = link.substring(strings + 1);
          var dcm = def.lastIndexOf('-');
          var dcmn = def.substring(0, dcm);
          var vcl = def.lastIndexOf('.');
          var dcmm = def.substring(vcl);
          var newname = dcmn+dcmm;

          var clone_file = form.find('.clone_file.clone.d-hidden').clone().removeClass('d-hidden');
          clone_file.find('button').html(newname);
          clone_file.find('.removeimg').attr('data-id',res.data[i] );
          listing_table_file.append(clone_file);

        });
        form.find('.file-preview').removeClass('d-hidden');
        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }

        $('#add-image').addClass('isdisable');

        $('.removeimg').on("click", function (e) {
          e.preventDefault();

          var deleteid = $(this).attr('data-id');
          // console.log(res.data[i]);
          var a = res.data;
          a.forEach(function(item, index, array){
            // console.log(item, index);
            if(item == deleteid){
              a.splice(index, 1);
            }
          });
          list_media.val(a);
          $(this).closest('.clone').remove();
          if(a.length == 0){
            $('#hp_file').val('');
          }
          if(listing_table_file.html() == ''){
            $('.file-preview').addClass('d-hidden');
            $('#add-image').removeClass('isdisable');
          }
        });
      }else{
        if(!$.isPlainObject(res.message)){
            swal(res.message);
        }else{
          $.each(res.message, function(key,value){
            swal(value[0]);
          });
        }
      }
    },true);

  });
    window.callJs = function(){
      $('.hp_showimg').each(function(){
        var tong = $(this).find('a').length;
        tong = tong-5;
        $(this).find('a').each(function(index){
          var width = $(this).width();
          $(this).find('img').attr('style','height:'+width+'px;');
          if(index == 4  && tong > 0){
            $(this).addClass('more-photos');
            $(this).append('<span class="h2">+'+tong+'</span>');
          }
        });
      });


      $(window).resize( function(){
        $('.hp_showimg').find('a').each(function(){
          var width = $(this).find('img').width();
          $(this).find('img').attr('style','height:'+width+'px;');

        });
      });
    }

  window.callJs();
  window.scrollToBottom = function(){
    var messages = document.getElementById('messages');
    messages.scrollTop = messages.scrollHeight;
  }
  window.chat_time = function(){
    $('.chat-message').each(function(){
      var a = $(this).find('.seeker-mess').length;
      var al = $(this).find('.alchemist-mess').length;
      var seeker = $(this).find('.seeker-mess');
      var alchemist = $(this).find('.alchemist-mess');
      // console.log(a);
      if(a == 1){
        seeker.find('.notification-date.d-none').removeClass('d-none');
      }else if(a > 1){
        seeker.find('.notification-date').addClass('d-none');
        var b = seeker.first();
        b.find('.notification-date.d-none').removeClass('d-none');
      }

      if(al == 1){
        alchemist.find('.notification-date.d-none').removeClass('d-none');
      }else if(al > 1){
        alchemist.find('.notification-date').addClass('d-none');
        var bl = alchemist.first();
        bl.find('.notification-date.d-none').removeClass('d-none');
      }
    });

  }

});
