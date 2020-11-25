jQuery(document).ready(function($) {
    var myVideos1 = [];

    window.URL = window.URL || window.webkitURL;


    var create_photo_album = $('#create-photo-album');
    var edit_photo_album = $('#edit-photo-album');
    var update_header_photo = $('#update-header-photo');

    $(document).on('click', '.create_album', function (e) {
      create_photo_album.modal('toggle');
    });
    $(document).on('click', '.delete_video', function (e) {
      e.preventDefault();
      _ele = $(this).closest('.model_video');
      var id = _ele.attr('id').replace(/video-/, '');
      url = $('input[name=delvideo]').val();
      data = 'id='+id;
      swal("Are you sure?")
      .then((value) => {
        if(value) {
          callAjax(url,data, function(res){
            console.log(res);
            if(res.error == false){
              _ele.remove();
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
              if(!$.isPlainObject(res.message)){
                jQuery.sticky(res.message, {classList: 'important', speed: 200, autoclose: 5000});
              }else {
                swal(res.message);
              }
            }
          });
        }
      });
    });
    $(document).on('click', '.del_album', function (e) {
      e.preventDefault();
      _ele = $(this).closest('.model_album');
      var id = _ele.attr('id').replace(/album-/, '');
      url = $('input[name=delalbum]').val();
      data = 'id='+id;
      swal("Are you sure?")
      .then((value) => {
        if(value) {
          callAjax(url,data, function(res){
            console.log(res);
            if(res.error == false){
              _ele.remove();
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
              if(!$.isPlainObject(res.message)){
                jQuery.sticky(res.message, {classList: 'important', speed: 200, autoclose: 5000});
              }else {
                swal(res.message);
              }
            }
          });
        }
      });
    });
    $(document).on('click', '.edit_album', function (e) {
      e.preventDefault();
      _ele = $(this).closest('.model_album');
      var id = _ele.attr('id').replace(/album-/, '');
      url = $('input[name=editalbum]').val();
      data = 'id='+id;

      callAjax(url,data, function(res){
        if(res.error == false){
          edit_photo_album.find('.content').html(res.data);
          edit_photo_album.modal('show');
          // jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
        }else{
          if(!$.isPlainObject(res.message)){
            jQuery.sticky(res.message, {classList: 'important', speed: 200, autoclose: 5000});
          }else {
            swal(res.message);
          }
        }
      });
    });

    //prop checkbox
    $(document).on('change', '.photo-album-item-wrap input[type=checkbox]', function (e) {
      _this = $(this);
      span = $('.photo-album-item-wrap').find('.current_fi');
      if(!this.checked) {
        span.html(parseInt(span.html(), 10)-1);
      }else {
        var current_fi = parseInt(_this.closest('.photo-album-item-wrap').find('.current_fi').text());
        var max_fi = parseInt($('div.max_fi').text());
        console.log(current_fi,max_fi);
        if(current_fi>=max_fi){
          $(this).prop( "checked", false );
        }else {
          span.html(parseInt(span.html(), 10)+1);
        }
      }
    });

    $(document).on('click', '.discard', function (e) {
      $('.new_album .photo-album-wrapper').find('.photo-album-item-wrap').siblings().not(':first').remove();
    });

    $(document).on('click', '.post_album', function (e) {
        e.preventDefault();
        var _div = $('div.max_fi');
        edit = false;
        form = $(this).closest('form.new_album');
        form_data = form.serialize();
        url = form.find('input[name=action]').val();
        console.log(form_data);
        var tg = $('#album-page').find('.photo-album-item-wrap').first();
        if(id_album = $('input[name=id_album').val()){
          _ele = $('#album-'+id_album);
          edit = true;
          tg = _ele.prev();
        }

        callAjax(url,form_data, function(res){
          if(res.error == false){
            if (edit) {
              _ele.remove();
            }
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            $(res.data).insertAfter(tg);
            _div.html(res.curent_fi);
            create_photo_album.modal('hide');
            edit_photo_album.modal('hide');
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

    $(document).on('click', '.album_to_feed', function (e) {
      e.preventDefault();

      var _this = $(this);
      var type = $(this).data('type');
      if(type == 'remove'){
        btn_clone = $('.add_feed.d-none').clone().removeClass('d-none');
      }else {
        btn_clone = $('.remove_feed.d-none').clone().removeClass('d-none');
      }

      _ele = $(this).closest('.model_album');
      var id = _ele.attr('id').replace(/album-/, '');
      url = $('input[name=albumtofeed]').val();
      data = 'id='+id+'&type='+type;

        callAjax(url,data, function(res){
          if(res.error == false){
            _this.after(btn_clone);
            _this.remove();
            $('.album_feed').html(res.album_feed);
            $('.album_left').html(res.album_left);
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          }else{
            swal(res.message);
          }
        });
    });

    var update_header_photo = $('#update-header-photo');
    $(document).on('click', '.add_to_album', function (e) {
      var checked = [];
      var target = $('.new_album .photo-album-wrapper');
      var pattern = $('.photo_pattern');
      $('input[name=checkbox]:checked').each(function(i){
        url = $(this).val();
        id = $(this).data('id');
        checked[i] = [url,id];
        var photo_pattern = pattern.clone().removeClass('d-none photo_pattern');
        photo_pattern.find('.form-group .img_photo').attr('src', $(this).val());
        photo_pattern.find('.form-group .id_media').val(id);
        target.append(photo_pattern);
      });
      // console.log(checked);
      $(this).closest('.modal').modal('hide');
      update_header_photo.modal('hide');
    });

    $('.modal').on('shown.bs.modal', function (e) {
     $(this).find('.swiper-container').addClass('swiper-container1');
      var mySwiper = new Swiper ('.swiper-container', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      //mySwiper.update();
      // mySwiper.reInit()
    });

    $(document).on('click', '.upload_link', function(e){
        e.preventDefault();
        $("#upload").trigger('click');
    });

    $(document).on('click', '.upload_video', function(e){
        e.preventDefault();
        $("#upload_video").trigger('click');
    });

    $(document).on('click', '.replace_video', function(e){
        e.preventDefault();
        $(this).closest('div').find("input[name=replace_video]").trigger('click');
    });

    $(document).on('change', "input[name=replace_video]", function(e){
        e.preventDefault();
        _this = $(this);
        _ele = $(this).closest('.model_video');
        image_url = _ele.find(".image_url")
        var id = _ele.attr('id').replace(/video-/, '');
        url = $('input[name=imagevideo]').val();

        var file = $(this).get(0).files[0];
        var formData = new FormData();
        formData.append('id', id);
        formData.append('file', file);

        callAjax(url,formData, function(res){
          if(res.error == false){
            image_url.attr("src", res.url);
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
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

    $(document).on('change', "#upload", function(e){
        e.preventDefault();
        _this = $(this);
        var target = $('.new_album .photo-album-wrapper');
        var pattern = $('.photo_pattern');


        var files = $(this).get(0).files;
        // console.log(files);
        url = $('input[name=uploadfile]').val();
        $.each(files,function(i,file){
          var photo_pattern = pattern.clone().removeClass('d-none photo_pattern');
          var formData = new FormData();
          formData.append('file', file);
          $.ajax({
              headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'POST',
              url: url,
              contentType: false,
              processData: false,
              data: formData,
              success: function (res) {
                  var img = res.info;
                  photo_pattern.find('.form-group .img_photo').attr('src', img.url);
                  photo_pattern.find('.form-group .id_media').val(img.id);
                  console.log( photo_pattern.html())
                  target.append(photo_pattern);
              }
          });
        });

        _this.val('');
        // $(this).closest('.modal').modal('hide');
        update_header_photo.modal('hide');
    });
    var countvideo = 0;
    $(document).on('change', "#upload_video", function(e){
        e.preventDefault();
        var duration ='';
        _this = $(this);
        var target = $('.my_videos > .row');
        var pattern = $('.video_parttern');
        var video_pattern = pattern.clone().removeClass('d-none video_parttern');

        var files = $(this).get(0).files;
        var formData = new FormData();
        $.each(files,function(i,file){
          formData.append('files[]', file);
        });
        var files1 = files;
        myVideos1.push(files1[0]);
        var video1 = document.createElement('video');
        video1.preload = 'metadata';
        video1.onloadedmetadata = function() {
          window.URL.revokeObjectURL(video1.src);
          var duration = video1.duration;
          myVideos1[myVideos1.length - 1].duration = duration;

          formData.append('duration',myVideos1[countvideo].duration);
          url = $('input[name=newvideo]').val();
          callAjax(url,formData, function(res){
            if(res.error == false){
              target.prepend(res.data);
              countvideo = countvideo +1;
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
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

        }
        video1.src = URL.createObjectURL(files1[0]);

        _this.val('');

    });

    $(document).on('click', ".save_video", function(e){
        e.preventDefault();
        _this = $(this);
        _ele = $(this).closest('.model_video');
        var id = _ele.attr('id').replace(/video-/, '');
        url = $('input[name=updatevideo]').val();
        form = $(this).closest('form');
        form_data = form.serialize();
        form_data += '&id='+id;

        callAjax(url,form_data, function(res){
          if(res.error == false){
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
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

    //prop checkbox
    $(document).on('change', '.my_videos .model_video input[type=checkbox]', function (e) {
      _this = $(this);
      span = $('.model_video').find('.current_fv');
      if(!this.checked) {
        span.html(parseInt(span.html(), 10)-1);
      }else {
        var current_fv = parseInt(_this.closest('.model_video').find('.current_fv').text());
        var max_fv = parseInt($('div.max_fv').text());
        console.log(current_fv,max_fv);
        if(current_fv>=max_fv){
          $(this).prop( "checked", false );
        }else {
          span.html(parseInt(span.html(), 10)+1);
        }
      }
    });

    slide_pattern = $('.d-none.slide-pattern');
    popup = $('#open-photo-popup-v1');
    swiper_wrapper = popup.find('.swiper-wrapper');
    photo_content = popup.find('.open-photo-content');
    $(document).on('click', '.open_photo_popup', function(e){
        e.preventDefault();
        swiper_wrapper.html('');
        var id_album = $(this).data('id');
        url = $('input[name=getpostalbum]').val();
        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: 'id='+id_album,
            success: function (res) {
              photo_content.html(res.data);
            }
        });

        var images = $(this).data('images');
        images.forEach(function(item) {
          cloner = slide_pattern.clone().removeClass('d-none');
          cloner.find('img').attr('src', item);
          swiper_wrapper.append(cloner);
          // console.log(item);
        });
        // console.log(images);
        popup.find('.mCustomScrollbar').perfectScrollbar({wheelPropagation:false});
        popup.modal('toggle');
    });



  var post_id = 0;
  var checkComment = 0;
  var post_form = '#post-comment-'+post_id;
  var popup = 0;
  var edit_file = 0;
  var edit_video = 0;
  var edit_link = 0;
  var edit_image = 0;
  $(document).on('click', '.clear_all', function(){
    $(this).closest('form.files-group').find('.post-block-photo').html('');
    $(this).closest('form.files-group').find('.photo-preview').addClass('d-hidden');
    $(this).closest('form.files-group').find('.ui-block-content.video-prevs').remove();
    $('.add-options-message').find('input[name=list_media]').val('');
    $('#add-image').removeClass('isdisable');
    $('#addlink').removeClass('isdisable');
  });
  $('.mCustomScrollbar').perfectScrollbar();
  var id_album = -1;
  $(document).on('click', '.popup-comment', function(){
    id = $(this).data('id');
    _this = $(this);
    id_album = $(this).data('id_album');
    var link = $(this).closest('.ui-block');
    var form_data = 'id='+id+'&type=user';
    url = $('input[name=popup_comment]').val();
    callAjax(url,form_data, function(res){
      if(res.error == false){
        $("#f").html(res.data);
        $('.mCustomScrollbar').perfectScrollbar();
        jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
      }else{
        swal(res.message);
      }
    });
  });
  $(document).on('click', '.popup-album', function(e){
    id_album  = $(this).data('id');
  });
  $(document).on('click', '.close-popup-album', function(e){
    $('#open-photo-popup-v2-'+id_album).modal('hide');
  });
  $(document).on('submit', '.post-comment', function(e){
    e.preventDefault();
    _this = $(this);
    popup = $(this).data('popup');
    var checkComment = _this.attr('data-check');
    var comments_list_popup = _this.closest('.open-photo-content').find('.children');
    var comments_list = $('.newsfeed-items').find('.ui-block').first().find('.children');
    if (checkComment == 1){
      comments_list = $(this).closest('.comment-item').find('.content-rep');
    }
    var total_comment = $('.count-comment-'+id_album+' span');
    var total_comment_popup = $(this).closest('.open-photo-content').find('.comment-count span');
    var caption = _this.find('textarea[name=content]').val();

    var countComment = $('#album-'+id_album).find('.friend-count-item.comment .h6');
    var countCommentPopup =$('#count-comment-popup-'+id_album).find('span');
    if ($.trim(caption) !== '') {
      var form_data = _this.serialize();
      url = $('input[name=postcomment]').val();
      callAjax(url,form_data, function(res){
        if(res.error == false){
          _this.find("textarea").val("");
          comments_list_popup.append(res.dataPopup);
          comments_list.append(res.data);
          $('.content-comment-album-popup').append(res.dataPopup);
          var count = parseInt(countComment.html())+1;
          countComment.html(count);
          var countPopup = parseInt(countCommentPopup.html())+1;
          countCommentPopup.html(countPopup);
          $('.mCustomScrollbar').perfectScrollbar();
          clearpoststatus();
          total_comment_popup.html(res.countComment);
          total_comment.html(res.countComment);
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

  $(document).on('input, change', '.add-photo', function(e){
    e.preventDefault();
    if(popup==2){
      form = $('#edit_status');
    }else {
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
  $(document).on('input, change', '.add-photo-comment', function(e){
    e.preventDefault();
    if(popup==0){
      var form = $('#post-comment-'+post_id);
      if (checkComment == 1){
        form = $('#post-reply-comment-'+post_id);
      }
      //console.log(form);
      var list_media = form.find("input[name=list_media]");
    }else {
      var form = $('#post-comment-popup-'+post_id);
      if (checkComment == 1){
        form = $('#post-reply-comment-'+post_id);
      }
      //console.log(form);
      var list_media = form.find("input[name=list_media]");
    }


    listing_table = form.find('.post-block-photo');

    var files = $(this).get(0).files;
    var form_data = new FormData();
    $.each(files,function(i,file){
      form_data.append('files[]', file);
    });
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

  $(document).on('click', '.add-link', function(e){
    e.preventDefault();
    if(popup==0){
      _this = $(this);
      var list_video= $("#list-video-page").find('.model_video').first();
      urldata = $('input[name=url-video]').val();
      data = 'url='+urldata;
      url = $('input[name=postvideolink]').val();
      callAjax(url,data, function(res){
        if(res.error == false){
          console.log(res.data)
          list_video.before(res.data);
          $("#add-link").modal('hide');
          $('.add-options-message').prev('.ui-block-content.video-prevs').remove();
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          if (typeof $.fn.magnificPopup !== 'undefined'){
            CRUMINA.mediaPopups();
          }
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
  $(document).on('click', '.add-link-album-comment', function(e){
    e.preventDefault();

    if (post_id != 0){
      if(popup==0){
        var form = $('#post-comment-'+post_id);
        var target = $('#post-comment-'+post_id).find('.post-comment-cn');
      }else if(popup==1){
        var form = $('#post-comment-popup-'+post_id);
        var target = $('#post-comment-popup-'+post_id).find('.post-comment-cn');
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
        target.prev(".ui-block-content.video-prevs").remove();
        target.before(res.data);
        $("#add-link").modal('hide');
        jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

        if (typeof $.fn.magnificPopup !== 'undefined'){
          CRUMINA.mediaPopups();
        }
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
    post_id = $(this).attr('data-id');
    checkComment = $(this).attr('data-check');
    popup = $(this).data('popup');

  });

  $(document).on('change', "#upload_file_status", function(e){
    e.preventDefault();
    if (post_id != 0){
      if(popup==0){
        var form = $('#post-comment-'+post_id);
        if (checkComment == 1){
          form = $('#post-reply-comment-'+post_id);
        }
      }else if(popup==1){
        var form = $('#post-comment-popup-'+post_id);
        if (checkComment == 1){
          form = $('#post-reply-comment-'+post_id);
        }
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
          var a = res.data;
          a.forEach(function(item, index, array){
            // console.log(item, index);
            if(item == deleteid){
              a.splice(index, 1);
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
    _this = $(this);
    if (post_id != 0){
      if(popup==0){
        var form = $('#post-comment-'+post_id);
        var target = $('#post-comment-'+post_id).find('.post-comment-cn');
        if (checkComment == 1){
          form = $('#post-reply-comment-'+post_id);
          target = $('#post-reply-comment-'+post_id).find('.post-comment-cn');
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
    var files = $(this).get(0).files;
    var formData = new FormData();
    $.each(files,function(i,file){
      formData.append('files[]', file);
    });
    url = $('input[name=newvideo-status]').val();

    callAjax(url,formData, function(res){
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.listid);
        //console.log(arr3);
        list_media.val(arr3);
        //console.log(list_media);
        target.before(res.data);
        $("#add-video").modal('hide');
        jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});

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

  }

  // $(document).on('click', '.slides-item', function(){
  //     var src = $(this).find("img").attr("src");
  //     console.log(src);
  //     var className = $(this).closest(".open-photo-thumb").find("div").find("div").find("div").find("div").find("img").attr("src", src);
  //     // console.log(className);
  //     var index = $(this).closest("div").find("a").find("img").length;
  //     console.log(index);
  //     });


  // });

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


