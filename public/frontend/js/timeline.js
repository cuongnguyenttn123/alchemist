jQuery(document).ready(function($) {
  var post_id = 0;
  var checkComment = 0;
  var post_form = '#post-comment-'+post_id;
  var popup = 0;
  var edit_file = 0;
  var edit_video = 0;
  var edit_link = 0;
  var edit_image = 0;
  var check_right = 0;
  $(document).on('click', '.clear_all', function(){
    $('.add-options-message').prev('.ui-block-content.video-prevs').remove();
    $('.add-options-message').prev('.ui-block-content.video-status').remove();
    $('.add-options-message').prev('.ui-block').prev('.photo-preview').addClass('d-hidden');
    $('.add-options-message').prev('.ui-block').prev('.previewaction').addClass('d-hidden');
    $('.add-options-message').prev('.ui-block').find('.hienthi').html('');
    $('.add-options-message').prev('.ui-block-content.photo-preview').find('.post-block-photo').html('');
    $('.add-options-message').prev('.hienthi').html('');
    $('.add-options-message').find('input[name=list_media]').val('');
    $('.add-options-message').find('input[name=list_video]').val('');
    $('.add-options-message').find('input[name=list_file]').val('');

    $(this).closest('form.files-group').find('.post-block-photo').html('');
    $(this).closest('form.files-group').find('.photo-preview').addClass('d-hidden');
    $(this).closest('form.files-group').find('.previewaction').addClass('d-hidden');
    $(this).closest('form.files-group').find('.ui-block-content.video-prevs').remove();
    $(this).closest('form.files-group').find('.hienthi').html('');
    $(this).closest('form.files-group').find('.add-options-message').find('input[name=list_media]').val(',');
    $(this).closest('form.files-group').find('.add-options-message').find('input[name=list_video]').val(',');
    $(this).closest('form.files-group').find('.add-options-message').find('input[name=list_file]').val(',');
    $('#add-image').removeClass('isdisable');
    $('#addlink').removeClass('isdisable');
  });
  $('.mCustomScrollbar').perfectScrollbar();

  //post like
  $(document).on('click', '.popup-comment', function(){
    $(".open-photo-content-fist").remove();
    $(".open-photo-content-2").remove();
    check_right = 0;
    id = $(this).data('id');
    _this = $(this);
    var link = $(this).closest('.ui-block');
    var form_data = 'id='+id+'&type=user';
    url = $('input[name=popup_comment]').val();
    $('#bothArrow').addClass("hideArrow");
    callAjax(url,form_data, function(res){
        if(res.error == false){
          $("#f").html(res.data);
          $("#bothArrow").addClass("hideArrow");
          $('.reply-comment-left').removeAttr('data-target');
          $('.mCustomScrollbar').perfectScrollbar();
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
        }else{
          swal(res.message);
        }
    });
  });




  $(document).on('click', '.popup-comment-cmt', function(){
    $(".open-photo-content-fist").remove();
    $(".open-photo-content-2").remove();
    check_right = 0;
    id = $(this).data('id');
    _this = $(this);
    var link = $(this).closest('.ui-block');
    var form_data = 'id='+id+'&type=user';
    url = $('input[name=popup_comment_cmt]').val();
    callAjax(url,form_data, function(res){
      if(res.error == false){
        $('#chatbox').find("#f").html(res.data);
        $('.reply-comment-left').removeAttr('data-target');
        $('.mCustomScrollbar').perfectScrollbar();
        $('#bothArrow').hide();
      }else{
        swal(res.message);
      }
    });
  });

  $(document).on('click', '#leftArrow', function(){
    $('#bothArrow').hide();
  });

  $(document).on('submit', '#post_status,#edit_status', function(e){
      e.preventDefault();
       $('.previewaction').addClass('d-hidden');
      _this = $(this);
      var caption = _this.find('textarea[name=caption]').val();
      var id = $(this).find('input[name=id]').val();
      var popup = parseInt($(this).data("popup"));
      var tg = $('.newsfeed-items').find('.ui-block').first();
      if(popup == 2){
        tg = $('.newsfeed-items').find('.ui-block-'+id);
      }

      if ($.trim(caption) !== '') {
        var form_data = _this.serialize();
        url = $('input[name=poststatus]').val();
        //console.log(form_data);
        callAjax(url,form_data, function(res){
          if(res.error == false){
            _this.find("textarea").val("");
            tg.before(res.data);
            if(popup == 2)tg.remove();

            $('#edit-post-popup').modal('hide');
            $('.add-options-message').prev('.ui-block-content.video-prevs').remove();
            $('.add-options-message').prev('.ui-block-content.video-status').remove();
            $('.add-options-message').prev('.ui-block').prev('.photo-preview').addClass('d-hidden');
            $('.add-options-message').prev('.ui-block').find('.hienthi').html('');
            $('.add-options-message').prev('.ui-block-content.photo-preview').find('.post-block-photo').html('');
            $('.add-options-message').prev('.hienthi').html('');
            $('.add-options-message').find('input[name=list_media]').val('');
            $('.add-options-message').find('input[name=list_video]').val('');
            $('.add-options-message').find('input[name=list_file]').val('');
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

            if (typeof $.fn.magnificPopup !== 'undefined'){
              CRUMINA.mediaPopups();
            }
            callJs();
            $('#add-image').removeClass('isdisable');
            $('#addlink').removeClass('isdisable');
            resData = [];
          }else{
            if(!$.isPlainObject(res.message)){
                swal(res.message);
            }else{
              $.each(res.message, function(key,value){
                swal(value[0]);
              });
            }
          }
        });
      }
  });




  $(document).on('submit', '#edit_comment', function(e){
    e.preventDefault();
    $('.previewaction').addClass('d-hidden');
    _this = $(this);
    var caption = _this.find('textarea[name=caption]').val();
    console.log(caption);
    var id = $(this).find('input[name=id]').val();
    var popup = parseInt($(this).data("popup"));
    // console.log(id+"ddd");

      tg = $('#ui-block-comment-'+id);


    if ($.trim(caption) !== '') {
      var form_data = _this.serialize();
      url = $('input[name=editcomment]').val();
      //console.log(form_data);
      callAjax(url,form_data, function(res){
        // console.log(res);
        if(res.error == false){
          _this.find("textarea").val("");
          tg.before(res.data);
          if(popup == 5)tg.remove();

          $('#edit-cmt-popup').modal('hide');
          $('.add-options-message').prev('.ui-block-content.video-prevs').remove();
          $('.add-options-message').prev('.ui-block-content.video-status').remove();
          $('.add-options-message').prev('.ui-block').prev('.photo-preview').addClass('d-hidden');
          $('.add-options-message').prev('.ui-block').find('.hienthi').html('');
          $('.add-options-message').prev('.ui-block-content.photo-preview').find('.post-block-photo').html('');
          $('.add-options-message').prev('.hienthi').html('');
          $('.add-options-message').find('input[name=list_media]').val('');
          $('.add-options-message').find('input[name=list_video]').val('');
          $('.add-options-message').find('input[name=list_file]').val('');
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

          if (typeof $.fn.magnificPopup !== 'undefined'){
            CRUMINA.mediaPopups();
          }
          callJs();
          $('#add-image').removeClass('isdisable');
          $('#addlink').removeClass('isdisable');
        }else{
          if(!$.isPlainObject(res.message)){
            swal(res.message);
          }else{
            $.each(res.message, function(key,value){
              swal(value[0]);
            });
          }
        }
      });
    }
  });
  $(document).on('click', '#post-myvideo',function (e) {
    e.preventDefault();
    _this = $(this);
    var video = $(this).find('input[name=video]').val();
    var content = $(this).closest('.ui-block').find('.status-video');
    content.find('.videovideo').css('display', 'block');
    content.find('.video-thumb').css('padding', '20px');
    var checkC = parseInt(checkComment);
    if (post_id != 0){
      if(popup==0){
        var form = $('#post-comment-'+post_id);
        var target = $('#post-comment-'+post_id).find('.post-comment-cn');
        if(checkC==1){
          form = $('#ui-block-comment-'+post_id);
          target = $("#ui-block-comment-"+post_id).find('.post-comment-cn');
        }
      }else if(popup==1){
        var form = $('#post-comment-popup-'+post_id);
        var target = $('#post-comment-popup-'+post_id).find('.post-comment-cn');
      }else {
        form = $('#edit_status');
        target = $("#edit_status").find('.post-comment-cn');
      }
    }else {
      form = $('#post_status');
      target = $("#post_status").find('.add-options-message');
    }
    var list_media = form.find("input[name=list_video]");
    if(popup==2){
      if(edit_video==0){
        list_media.val('');
        target.prev('.video-list').remove();
        edit_video = 1;
      }
    }
    target.before(content);
    list_media.val(video);
    $(document).ready(function () {
      // $('.removevideo').removeClass('d-hidden');
      $('.news-feed-form').find('.videovideo').removeClass('d-hidden');

      $('#post_status').find('.removevideo').on("click", function (e) {
        // form.find('.clone.d-hidden').clone().removeClass('d-hidden');
        e.preventDefault();
        countstt();
        // $('.status-video').remove();
        $(this).closest('.clone').remove();
        $('.add-options-message').find('input[name=list_video]').val('');
        $('.add-options-message').prev('.ui-block-content.video-status').remove();
        // $('.add-options-message').prev('.comment-form').find('.ui-block-content.video-prevs').remove();
        $(this).closest('.test-comment-1').find('.ui-block-content.video-prevs').remove();

        if (countstt() == 1) {
          $('.previewaction').addClass('d-hidden');
        }
      });
    })
    $("#choose-from-my-photo").modal('hide');
    $("#add-video").modal('hide');
  });
  $(document).on('click', '.upload-video-album-status', function(){
    var list = $('#choose-from-my-photo').find('.open-photo-content');
    url = $('input[name=postalbumvideo]').val();
    data = '';
    callAjax(url,data,function (res) {
      if(res.error == false){
        list.html(res.data);
        $('.mCustomScrollbar').perfectScrollbar();
        jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
      }else{
        swal(res.message);
      }
    })
  });


  $(document).on('submit', '.post-comment', function(e){
      e.preventDefault();
      _this = $(this);
      popup = $(this).data('popup');
      console.log($(this).data('id'))
      var id = $(this).data('id');
      // console.log(id)
      var checkC = parseInt($(this).data('check'));
      var comments_list_popup = _this.closest('.open-photo-content').find('.children');
      var comments_list = $('.newsfeed-items').find('.ui-block-'+id).find('.children');
      var total_comment = $('.newsfeed-items').find('.ui-block-'+id).find('.popup-comment span');
      var total_comment_popup = $('.count-comment-post-popup span');
      if (checkC == 1){
        comments_list = $(this).closest('.comment-item').find('.content-rep');
        total_comment = $('#ui-block-comment-'+id).find('.count-comment span');
        var total_comment_popup = $('.count-comment-popup-'+id+' span');
      }

      if(check_right==1){
        var id_com = $('.open-photo-content').find('.post-comment').find('input[name=comment_id]').val()
        comments_list_popup = _this.closest('.open-photo-content').find('.list-comment-right');
        total_comment_popup = $('.content-comment-popup-'+id_com).find('.count-comment span');
      }
      var caption = _this.find('textarea[name=content]').val();
      if ($.trim(caption) !== '') {

        var form_data = _this.serialize();
        url = $('input[name=postcomment]').val();
        callAjax(url,form_data, function(res){
          if(res.error == false){
            _this.find("textarea").val("");
            comments_list_popup.append(res.dataPopup);
            comments_list.append(res.data);
            $('.reply-comment-left').removeAttr('data-target');
            $('.mCustomScrollbar').perfectScrollbar();
            clearpoststatus();
            total_comment_popup.html(res.countComment);
            total_comment.html(res.countComment);
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

            $('.post-comment').find('input[name=list_media]').val('');
            $('.post-comment').find('input[name=list_video]').val('');
            $('.post-comment').find('input[name=list_file]').val('');

            if (typeof $.fn.magnificPopup !== 'undefined'){
              CRUMINA.mediaPopups();
            }
            callJs();
            $('#add-image').removeClass('isdisable');
            $('#addlink').removeClass('isdisable');
          }else{
            if(!$.isPlainObject(res.message)){
                swal(res.message);
            }else{
              $.each(res.message, function(key,value){
                swal(value[0]);
              });
            }
          }
        });
      }
  });

  $(document).on('input, change', '.add-photo', function(e){
    e.preventDefault();
    // console.log(popup+"g");
    if(popup==2){
      form = $('#edit_status');
    }
    if(popup==5){
      form = $('#edit_comment');
    }
    else {
      form = $('#post_status');
    }
    var list_media = form.find("input[name=list_media]");
    listing_table = form.find('.post-block-photo');
    if(popup==2){
      if(edit_image==0){
        list_media.val('');
        listing_table.find('.clone-img').remove();
        edit_image = 1;
      }
    }
    var files = $(this).get(0).files;
    var form_data = new FormData();
    $.each(files,function(i,file){
      form_data.append('files[]', file);
    });
    // console.log(form_data);
    url = $('input[name=previewimage]').val();
    callAjax(url,form_data, function(res){
      // console.log(res.data);
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
          //console.log(def);
          // console.log(res.data);
          var clone = form.find('.clone.d-hidden').clone().removeClass('d-hidden');
          if(name == 'jpg' || name == "png" || name == "gif"){
            clone.find('img').attr('src', link);
            clone.find('.removeimg').attr('data-id',res.data[i] );
          }else{
            clone.find('img').attr('src', 'img/'+name+'.svg');
            clone.attr('title',def);
            clone.find('.removeimg').attr('data-id',res.data[i] );
          }
          listing_table.append(clone);
        });
        form.find('.photo-preview').removeClass('d-hidden');
        form.find('.previewaction').removeClass('d-hidden');
        form.find('.previewaction').addClass('ui-block-contentcount');
        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }

        $('#post_status').find('.removeimg').on("click", function (e) {
          e.preventDefault();
          countstt();


          var deleteid = $(this).data('id');
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
            $('#add-photo').val('');
            $('.photo-preview').addClass('d-hidden');
            $('#addlink').removeClass('isdisable');
          }
          if (countstt()==1){
            $('.previewaction').addClass('d-hidden');
          }
        });
        $('#edit_comment').find('.removeimg').on("click", function (e) {
          e.preventDefault();
          countstt();


          var deleteid = $(this).data('id');
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
            $('#add-photo').val('');
            $('.photo-preview').addClass('d-hidden');
            $('#addlink').removeClass('isdisable');
          }
          if (countstt()==1){
            $('.previewaction').addClass('d-hidden');
          }
        });
        $('#edit_status').find('.removeimg').on("click", function (e) {
          e.preventDefault();
          countstt();


          var deleteid = $(this).data('id');
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
            $('#add-photo').val('');
            $('.photo-preview').addClass('d-hidden');
            $('#addlink').removeClass('isdisable');
          }
          if (countsttedit()==1){
            $('.previewaction').addClass('d-hidden');
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
  $(document).on('click', '.edit_post', function(e){
    edit_file = 0;
    edit_video = 0;
    edit_link  = 0;
    edit_image = 0;
  });
  $(document).on('click', '.edit_cmt', function(e){
    edit_file = 0;
    edit_video = 0;
    edit_link  = 0;
    edit_image = 0;
  });
  $(document).on('input, change', '.add-photo-comment', function(e){
    e.preventDefault();
    // console.log(popup+"s");
    var checkC = parseInt(checkComment);
    if(popup==0){
      var form = $('#post-comment-'+post_id);
      if (checkC == 1){
        form = $('#ui-block-comment-'+post_id);
      }
      //console.log(form);
      var list_media = form.find("input[name=list_media]");
    }else if(popup==1) {
      var form = $('#post-comment-popup-'+post_id);
      if (checkComment == 1){
        form = $('#post-reply-comment-'+post_id);
      }
      //console.log(form);
      var list_media = form.find("input[name=list_media]");
    }else if(popup==4) {
      var form = $('#post-comment-popup-'+post_id);
      if (checkComment == 1){
        form = $('#post-reply-comment-'+post_id);
      }
      //console.log(form);
      var list_media = form.find("input[name=list_media]");
    }
    else if(popup==5){
      // console.log(post_id+"photoooo")
      form = $('#edit_comment');
      target = $('.post-comment-cnsss');
    }


    listing_table = form.find('.post-block-photo');

    var files = $(this).get(0).files;
    var form_data = new FormData();
    $.each(files,function(i,file){
      form_data.append('files[]', file);
    });
    console.log(form_data);
    url = $('input[name=previewimage]').val();
    callAjax(url,form_data, function(res){
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.data );
         //console.log(arr3);
        list_media.val(arr3);
         //console.log(list_media);
        var links = res.urls;
        $.each(links, function(i, link){
          var abc = link.lastIndexOf('/');
          var def = link.substring(abc + 1);
          var strings = link.lastIndexOf('.');
          var name = link.substring(strings + 1);
          //console.log(def);
          // console.log(res.data);
          var clone = form.find('.clone.d-hidden').clone().removeClass('d-hidden');
          if(name == 'jpg' || name == "png" || name == "gif"){
            clone.find('img').attr('src', link);
            clone.find('.removeimg').attr('data-id',res.data[i] );
          }else{
            clone.find('img').attr('src', 'img/'+name+'.svg');
            clone.attr('title',def);
            clone.find('.removeimg').attr('data-id',res.data[i] );
          }

          listing_table.append(clone);
        });
        form.find('.photo-preview').removeClass('d-hidden');
        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }

        $('.removeimg').on("click", function (e) {
          e.preventDefault();

          var deleteid = $(this).data('id');
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
            $('#add-photo').val('');
            $('.photo-preview').addClass('d-hidden');
            $('#addlink').removeClass('isdisable');
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

  // $(document).on('click', '.submit-comment', function(){
  //   $('#bothArrow').show();
  //   $('#rightArrow').hide();
  // });

  $(document).on('click', '.add-link', function(e){
    e.preventDefault();
    // console.log(popup)
    var checkC = parseInt(checkComment);
    if (post_id != 0){
      if(popup==0){
        if(checkC == 1){
          var form = $('#ui-block-comment-'+post_id);
          var target = $("#ui-block-comment-"+post_id).find('.post-comment-cn');
        }else{
          var form = $('#post-comment-'+post_id);
          var target = $('#post-comment-'+post_id).find('.post-comment-cn');
        }
      }else if(popup==1){
        var form = $('#post-comment-popup-'+post_id);
        var target = $('#post-comment-popup-'+post_id).find('.post-comment-cn');
      }
      else if(popup==4){
        var form = $('#ui-block-comment-popup'+post_id);
        var target = $('.post-comment-cn-'+post_id);
      }
      else if(popup==5){
        // console.log(post_id+"link")
        var form = form = $('#edit_comment');
        var target = $('.post-comment-cnsss');
      }else{
        form = $('#edit_status');
        target = $("#edit_status").find('.post-comment-cn');
      }
    }else {
      form = $('#post_status');
      var target = $("#post_status").find('.add-options-message');
    }
    $(this).closest('body').find('.video-link.d-none').removeClass('d-none');
    if(popup==2){
      if(edit_link==0){
        form.find('.link-list').remove();
        edit_link = 1;
      }
    }
    id = $('input[name=url-video]').val();
    url = $('input[name=previewlink]').val();
    data = 'url='+id;

    callAjax(url,data, function(res){

      if(res.error == false){
        // console.log(res.data)
        target.prev(".ui-block-content.video-prevs").remove();
        target.before(res.data);
        $("#add-link").modal('hide');
        form.find('.previewaction').removeClass('d-hidden');
        form.find('.linklink').removeClass('d-hidden');
        jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }
        $(document).ready(function () {
          // $('.removelink').removeClass('d-hidden');
          $('.news-feed-form').find('.linklink').removeClass('d-hidden');

          $('#post_status').find('.removelink').on("click", function (e) {
            e.preventDefault();
            countstt();
            // $('.video-post').remove();
            $('.add-options-message').prev('.ui-block-content.video-prevs').remove();
            $('.add-options-message').prev('.comment-form').find('.ui-block-content.video-prevs').remove();
            $(this).closest('.test-comment-1').find('.ui-block-content.video-prevs').remove();

            if (countstt() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });
          $('#edit_status').find('.removelink').on("click", function (e) {
            e.preventDefault();
            countsttedit();
            // $('.video-post').remove();
            form.prev('.ui-block-content.video-prevs').remove();
            form.prev('.comment-form').find('.ui-block-content.video-prevs').remove();
            form.find('.ui-block-content.video-prevs').remove();

            if (countsttedit() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });
        })
        callJs();

      }else{
        if(!$.isPlainObject(res.message)){
            swal(res.message);
        }else{
          $.each(res.message, function(key,value){
            swal(value[0]);
          });
        }
      }
    });
  });

  $(document).on('click', '.upload-video-status', function(){
    $('#upload_video_status').trigger('click');
  });

  $(document).on('click', '.upload-file-status', function(){
    $('#upload_file_status').trigger('click');

  });
  $(document).on('click', '.options-message', function(){
    post_id = $(this).data('id');
    checkComment = $(this).data('check');
    popup = $(this).data('popup');
  });


  $(document).on('click','.reply-comment-left',function () {
    if(check_right==0){
      $('.comment-right').trigger('click');
      var id = $(this).data('id');
      var id_post = $(this).data('id_post');

      $('.open-photo-content').find('.post-comment').find('input[name=id]').val(id_post);
      if ($('.open-photo-content').find('.post-comment').find('input[name=comment_id]').val() == undefined){
        var inp = '<input type="hidden" name="comment_id" value="'+id+'">';
        $('.open-photo-content').find('.post-comment').append(inp);
      }else {
        $('.open-photo-content').find('.post-comment').find('input[name=comment_id]').val(id);
      }
      _this = $(this);
      var link = $(this).closest('.ui-block');
      var form_data = 'id='+id+'&type=user';
      url = $('input[name=popup_comment_right]').val();
      callAjax(url,form_data, function(res){
        if(res.error == false){
          $("#reply-3").html(res.data);
          $('.reply-comment-left').removeAttr('data-target');
          $('.mCustomScrollbar').perfectScrollbar();
          $("#bothArrow").show();
          $('#rightArrow').hide();
        }else{
          swal(res.message);
        }
      });
    }else {
      $('.comment-left').trigger('click');
      id = $(this).data('id');
      _this = $(this);
      var link = $(this).closest('.ui-block');
      var form_data = 'id='+id+'&type=user';
      url = $('input[name=popup_comment_cmt]').val();
      callAjax(url,form_data, function(res){
        if(res.error == false){
          if($(".open-photo-content-fist").html() == undefined){
            $(".open-photo-content-2").before(res.data).remove();
          }else {
            $(".open-photo-content-fist").before(res.data).remove();
          }
          $('.reply-comment-left').removeAttr('data-target');
          $('.mCustomScrollbar').perfectScrollbar();
        }else{
          swal(res.message);
        }
      });
    }
  });
  $(document).on('click','.comment-left',function () {
    check_right = 0;
  });
  $(document).on('click','.comment-right',function () {
    check_right = 1;
  });
  $(document).on('change', "#upload_file_status", function(e){
    e.preventDefault();
    //console.log("vò", post_id);
    var checkC = parseInt(checkComment);
    if (post_id != 0){
      if(popup==0){
        var form = $('#post-comment-'+post_id);
        if (checkC == 1){
          form = $("#ui-block-comment-"+post_id);
        }
      }else if(popup==1){
        var form = $('#post-comment-popup-'+post_id);
        if (checkComment == 1){
          form = $('#post-reply-comment-'+post_id);
        }
      }
      else if(popup==4) {
        var form = $('#post-reply-comment-' + post_id);
        var target = $('.post-comment-cn-' + post_id);
      }
      else if(popup==5){
        // console.log(post_id+"video")
        form = $('#edit_comment');
        target = $('.post-comment-cnsss');
      }
      else{
        form = $('#edit_status');
      }

    }else {

      form = $('#post_status');
    }

    var list_media = form.find("input[name=list_file]");
    listing_table = form.find('.hienthi');
    if(popup==2){
      if(edit_file==0){
        list_media.val('');
        listing_table.find('.file-list').remove();
        edit_file = 1;
      }
    }

    var ui_block = $('.hp_previewfile').find('.hienthi');
    ui_block.html('');
    var $this = $('.hp_previewfile').find('.cart_item.d-none');
    var files = $(this).get(0).files;
    var form_data = new FormData();
    $.each(files,function(i,file){
      form_data.append('files[]', file);
    });
    url = $('input[name=previewfile]').val();
    callAjax(url,form_data, function(res){
      // console.log(res.data);
      // console.log(list_media.val());
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.data );

        // console.log(arr3);
        list_media.val(arr3);
        // console.log(list_media);
        var links = res.urls;
        $("#add-file").modal('hide');
        form.find('.file-preview').removeClass('d-hidden');
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
          var classnew = 'delete-view-'+res.data[i];
          clone.addClass(classnew);
          //console.log(fileName);
          if(fileName.length > 50)
          {
            fileName = fileName.substr(0,50) + "...";
          }
          clone.find('img').attr('src',newstring);
          clone.find('.delete-file img').attr('src','img/trash.svg');
          clone.find('.click-delete-file').attr('data-filedelete',res.data[i]);
          clone.find('.content .title').append(fileName);
          clone.find('.content .post__date time').append(name_file);

          listing_table.append(clone);
        });

        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }

        $('.click-delete-file').on("click", function (e) {
          e.preventDefault();
          var deleteid = $(this).attr("data-filedelete");
          // console.log(res.data[i]);
          var a = resData;
          a.forEach(function(item, index, array){
            // console.log(item, index);
            if(item == deleteid){
              a.splice(index, 1);
              console.log(a);
            }
          });
          // console.log(a)
          // console.log(deleteid)
          list_media.val(a);
          $(this).closest('.cart_item').remove();
          // if(a.length == 0){
          //   $('#add-photo').val('');
          //   $('.photo-preview').addClass('d-hidden');
          //   $('#addlink').removeClass('isdisable');
          // }
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
  $(document).on('change', "#upload_video_status", function(e){
    e.preventDefault();
    // console.log(popup);
    _this = $(this);
    var checkC = parseInt(checkComment);
    if (post_id != 0){
      if(popup==0){
        var form = $('#post-comment-'+post_id);
        var target = $('#post-comment-'+post_id).find('.post-comment-cn');
        if(checkC==1){
          form = $('#ui-block-comment-'+post_id);
          target = $("#ui-block-comment-"+post_id).find('.post-comment-cn');
        }
      }else if(popup==1){
        var form = $('#post-comment-popup-'+post_id);
        var target = $('#post-comment-popup-'+post_id).find('.post-comment-cn');
      }
      else if(popup==4){
        var form = $('#post-reply-comment-'+post_id);
        var target = $('.post-comment-cn-'+post_id);
      }
      else if(popup==5){
        // console.log(post_id+"video")
        form = $('#edit_comment');
        target = $('.post-comment-cnsss');
      }
      else {
        form = $('#edit_status');
        target = $("#edit_status").find('.post-comment-cn');
      }
    }else {
      form = $('#post_status');
      target = $("#post_status").find('.add-options-message');
    }
    var list_media = form.find("input[name=list_video]");
    if(popup==2){
      if(edit_video==0){
        list_media.val('');
        target.prev('.video-list').remove();
        edit_video = 1;
      }
    }
    var files = $(this).get(0).files;
    var formData = new FormData();
    $.each(files,function(i,file){
      formData.append('files[]', file);
    });
    url = $('input[name=newvideo-status]').val();

    callAjax(url,formData, function(res){
      // console.log (list_media.html());
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.listid);
        //console.log(arr3);
        list_media.val(arr3);
        //console.log(list_media);
        target.before(res.data);
        $("#add-video").modal('hide');
        form.find('.previewaction').removeClass('d-hidden');
        form.find('.videovideo').removeClass('d-hidden');
        jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

        $(document).ready(function () {
          // $('.removevideo').removeClass('d-hidden');
          $('.news-feed-form').find('.videovideo').removeClass('d-hidden');

          $('#post_status').find('.removevideo').on("click", function (e) {
            // form.find('.clone.d-hidden').clone().removeClass('d-hidden');
            e.preventDefault();
            countstt();
            // $('.status-video').remove();
            $(this).closest('.clone').remove();
            $('.add-options-message').find('input[name=list_video]').val('');
            $('.add-options-message').prev('.ui-block-content.video-status').remove();
            // $('.add-options-message').prev('.comment-form').find('.ui-block-content.video-prevs').remove();
            $(this).closest('.test-comment-1').find('.ui-block-content.video-prevs').remove();

            if (countstt() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });
          $('#edit_status').find('.removevideo').on("click", function (e) {
            countsttedit();
            $(this).closest('form.files-group').find('.ui-block-content.video-status').remove();
            $(this).closest('form.files-group').find('.add-options-message').find('input[name=list_video]').val(',');
            $(this).closest('form.files-group').find('.post-video').remove();
            if (countsttedit() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });
        })
      }else{
        if(!$.isPlainObject(res.message)){
          swal(res.message);
        }else{
          $.each(res.message, function(key,value){
            swal(value[0]);
          });
        }
      }
    }, true);

    _this.val('');

  });

  $(document).on('click','.comment-left',function () {
    if (check_right==0&&(parseInt($(this).data('check_post')))!=1){
      _this = $(this);
      var link = $(this).closest('.ui-block');
      var id = $(this).data('id');
      var form_data = 'id='+id+'&type=user';
      url = $('input[name=popup_comment_back]').val();
      callAjax(url,form_data, function(res){
        if(res.checkfirst == true){
          return false;
        }else {
          if(res.error == false){
            if($(".open-photo-content-fist").html() == undefined){
              $(".open-photo-content-2").before(res.data).remove();
            }else {
              $(".open-photo-content-fist").before(res.data).remove();
            }
            $('.reply-comment-left').removeAttr('data-target');
            $('.mCustomScrollbar').perfectScrollbar();
          }
          else {
            swal(res.message);
          }
        }
      });
    }
  });

  var resData = new Array();
  (function(){

    var dropzone = document.getElementById("dropzone");
    var fileData1 = new Array();
    // catch event drop image
    dropzone.ondrop = function(e){
      e.preventDefault();
      this.className = 'tab-content';
      var fileData = e.dataTransfer.files;
      fileData1.push(e.dataTransfer.files);
      var form = $('#post_status');
      var list_file = form.find("input[name=list_file]");
      // console.log(list_file);
      var listing_table = form.find('.hienthi');
      var ui_block = $('.hp_previewfile').find('.hienthi');
      ui_block.html('');
      var $this = $('.hp_previewfile').find('.cart_item.d-none');
      var files = fileData;
      var form_data = new FormData();
      $.each(files,function(i,file){
        form_data.append('files[]', file);
      });
      // $.each(files,function(i,file){
      //   form_data.append('files[]', file);
      //  // console.log(form_data);
      // });

      // console.log('fileData1 value');
      // $.each(fileData1,function(index){
      //   var indexOfSon = fileData1[index];
      //   $.each(indexOfSon,function(i,value){
      //     console.log(value);
      //    });
      // });


      var url = $('input[name=previewfile]').val();
      // console.log(url);
      callAjax(url,form_data, function(res){
        if(res.error == false){
          resData.push(res.data);
          console.log(resData);
          // console.log(resData);
          var arr3 = list_file.val().concat(','+resData);
          list_file.val(arr3);
          var links = res.urls;
          $("#add-file").modal('hide');
          form.find('.previewaction').removeClass('d-hidden');

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
            var classnew = 'delete-view-'+res.data[i];
            clone.addClass(classnew);
            //console.log(fileName);
            if(fileName.length > 50)
            {
              fileName = fileName.substr(0,50) + "...";
            }
            clone.find('img').attr('src',newstring);
            clone.find('.delete-file img').attr('src','img/trash.svg');
            clone.find('.click-delete-file').attr('data-filedelete',res.data[i]);
            clone.find('.content .title').append(fileName);
            clone.find('.content .post__date time').append(name_file);
            listing_table.append(clone);
          });

          if (typeof $.fn.magnificPopup !== 'undefined'){
            CRUMINA.mediaPopups();
          }


          // show delete all
          $('#clear-all-file').show();
          // handle delete all file
          $('#clear-all-file').on('click', function(e){
            e.preventDefault();
            var a = resData;
            a.splice(0,a.length);
            list_file.val(a);
            var text = $(this).closest('.shop_table').find('.hienthi').find('.cart_item').remove();
            $('#clear-all-file').hide();
            form.find('.previewaction').addClass('d-hidden');
          });

          // delete single file
          $('.click-delete-file').on("click", function (e) {
            e.preventDefault();
            var deleteid = $(this).attr("data-filedelete");
            var a = resData;
            a.forEach(function(item, index, array){
              if(item == deleteid){
                a.splice(index, 1);
              }
            });
            list_file.val(a);
            $(this).closest('.cart_item').remove();
            // if(a.length == 0){
            //   $('#add-photo').val('');
            //   $('.photo-preview').addClass('d-hidden');
            //   $('#addlink').removeClass('isdisable');
            // }
            countstt();
            if (countstt()==1){
              $('.previewaction').addClass('d-hidden');
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
    }


    $(document).on('click', '.sorting-menu', countstt);

    function countstt(){
      lengtht =$('#post_status').find('.ui-block-content').length;
      lengtht1 =$('.countui').find('.cart_item').length;
      // lengtht2 =$('#post_status').find('.ui-block-contentcount').length;
      lengtht2 =$('.post-block-photocount').find('.clone').length;
      totallength = lengtht + lengtht1+lengtht2;

      return totallength;
    }




    dropzone.ondragover = function(){
      this.className = 'tab-content dragover';
      return false;
    }

    dropzone.ondragleave = function(){
      this.className = 'tab-content';
      return false;
    }
  }())


function clearpoststatus() {
    $('.add-options-message').prev('.ui-block-content.video-prevs').remove();
    $('.add-options-message').prev('.ui-block-content.video-status').remove();
    $('.add-options-message').prev('.ui-block-content.photo-preview').addClass('d-hidden').find('.post-block-photo').html('');
    $('.add-options-message').prev('.file-preview').addClass('d-hidden').find('.hienthi').html('');
    $('.add-options-message').find('input[name=list_media]').val('');
    $('.add-options-message').find('input[name=list_video]').val('');
    $('.add-options-message').find('input[name=list_file]').val('');

    $('.add-options-message').prev('.comment-form').find('.ui-block-content.video-prevs').remove();
    $('.add-options-message').prev('.comment-form').find('.ui-block-content.video-status').remove();
    $('.add-options-message').prev('.comment-form').find('.photo-preview').addClass('d-hidden').find('.post-block-photo').html('');
    $('.add-options-message').prev('.comment-form').find('.file-preview').addClass('d-hidden').find('.hienthi').html('');
    $('.add-options-message').find('.comment-form').find('input[name=list_media]').val('');
    $('.add-options-message').find('.comment-form').find('input[name=list_video]').val('');
    $('.add-options-message').find('.comment-form').find('input[name=list_file]').val('');

    $(this).closest('.test-comment-1').find('.ui-block-content.video-prevs').remove();
    $(this).closest('.test-comment-1').find('.ui-block-content.video-status').remove();
    $(this).closest('.test-comment-1').find('.photo-preview').addClass('d-hidden').find('.post-block-photo').html('');
    $(this).closest('.test-comment-1').find('.file-preview').addClass('d-hidden').find('.hienthi').html('');
    $(this).closest('.test-comment-1').find('.comment-form').find('input[name=list_media]').val('');
    $(this).closest('.test-comment-1').find('.comment-form').find('input[name=list_video]').val('');
    $(this).closest('.test-comment-1').find('.comment-form').find('input[name=list_file]').val('');

}
  $(function() {
    $(document).on('click', '.sorting-menu', countstt);
  });

  function countstt(){
    lengtht =$('#post_status').find('.ui-block-content').length;
    lengtht1 =$('.countui').find('.cart_item').length;
    // lengtht2 =$('#post_status').find('.ui-block-contentcount').length;
    lengtht2 =$('.post-block-photocount').find('.clone').length;
    totallength = lengtht + lengtht1+lengtht2;

    return totallength;
  }
  function countsttedit(){
    lengtht =$('#edit-post-status-by-modal').find('.ui-block-content').length;
    // lengtht2 =$('#post_status').find('.ui-block-contentcount').length;
    lengtht2 =$('.post-block-photocount').find('.clone').length;
    totallength = lengtht +lengtht2;

    return totallength;
  }
function callJs(){
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
        var width = $(this).width();
        // console.log(width);
        $(this).find('img').attr('style','height:'+width+'px;');

      });
    });
  }
  callJs();

});
