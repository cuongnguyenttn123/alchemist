jQuery(document).ready(function($) {
    var post_id = 0;
    var post_form = '#post-comment-'+post_id;
    String.prototype.filename=function(extension){
        var s= this.replace(/\\/g, '/');
        s= s.substring(s.lastIndexOf('/')+ 1);
        return extension? s.replace(/[?#].+$/, ''): s.split('.')[0];
    }
    changeUrl = function(src){
      filename = src.filename();
      var new_name = filename.split('_', 1)[0];
      var path = src.substring(0,src.lastIndexOf('/'));
      var new_source = path+'/'+new_name+'.svg';
      return new_source;
    }

    $('.mCustomScrollbar').perfectScrollbar();
    //post like
    $(document).on('click', '.likepost_btn, .dislikepost_btn', function(e){
        e.preventDefault();
        _this = $(this);
        span = _this.find('span');
        //check if liked or disliked
        if(_this.hasClass('targeted')) return false;
        var sibling = _this.siblings('.likepost_btn, .dislikepost_btn');
        var src1 = _this.find('.votes').attr("src");
        var new_source = changeUrl(src1);

        var form = $(this).closest('.open-photo-content').find('form');
        var id = _this.data('id');
        var check_like = _this.data('check_like');
        var form_data = {id:id ,checkLike:check_like};
        console.log(form_data);
        url = $('input[name=likepost]').val();
        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: form_data,
            success: function (res) {
              _this.find('img').attr("src",new_source);
              _this.addClass('targeted');
              sibling.addClass('targeted');
              span.html(parseInt(span.html(), 10)+1);
              /*if (res.action == "add") {
                _this.addClass('targeted');
                span.html(parseInt(span.html(), 10)+1)
              }else {
                _this.removeClass('active');
                span.html(parseInt(span.html(), 10)-1)
              }*/

            }
        });
        // console.log(form_data);
    });
//like cmt
  $(document).on('click', '.likecmt_btn', function(e){
    var like = 1;
    var post = $(this).data('id');
    var user = $(this).data('user');
    var stcmt = $(this).data('stcmt');
    url = $('input[name=ajax-likecmt]').val();
    _this = $(this);
    if(_this.hasClass('targeted')) return false;
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: url,
      data: {
        like:like,
        post:post,
        user:user,
        stcmt:stcmt
      },
      success: function (data) {
        var pending = parseInt(_this.find('.pending').html());
        var src1 = _this.find('.upvotes').attr("src");
        var new_source = changeUrl(src1);
        if (data.data=='ok'){
          _this.find('.pending').html(pending+1);
          _this.addClass('targeted');
          _this.find('.mains').attr("src",new_source);
          $('.dislikecmt-'+stcmt).addClass('targeted');
        }
      }
    });
  })
  //dislikecmt
  $(document).on('click', '.dislikecmt_btn', function(e){
    var dislike = 1;
    var post = $(this).data('id');
    var user = $(this).data('user');
    var stcmt = $(this).data('stcmt');
    url = $('input[name=ajax-disLikeCmt]').val();
    _this = $(this);
    if(_this.hasClass('targeted')) return false;
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: url,
      data: {
        dislike:dislike,
        post:post,
        user:user,
        stcmt:stcmt
      },
      success: function (data) {
        var pending = parseInt(_this.find('.pending').html());
        var src1 = _this.find('.downvotes').attr("src");
        var new_source = changeUrl(src1);
        if (data.data=='ok'){
          _this.find('.pending').html(pending+1);
          _this.addClass('targeted');
          _this.find('.mains').attr("src",new_source);
          $('.likecmt-'+stcmt).addClass('targeted');
        }
      }
    });
  })
  //heart
  $(document).on('click', '.heart_btn', function(e){
    var heart = 1;
    var post = $(this).data('id');
    var user = $(this).data('user');
    var stcmt = $(this).data('stcmt');
    url = $('input[name=ajax-heart]').val();
    _this = $(this);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: url,
      data: {
        heart:heart,
        post:post,
        user:user,
        stcmt:stcmt
      },
      success: function (data) {
        var pending = parseInt(_this.find('.pending').html());
        if (data.data=='ok'){
          _this.find('.pending').html(pending+1);
          _this.addClass('targeted_like');
          _this.removeClass('post-add-icon');
        }else{
          _this.find('.pending').html(pending-1);
          _this.removeClass('targeted_like');
          _this.addClass('post-add-icon');
        }
      }
    });
  })

    $(document).on('click', '.like_status_btn', function(e){
        e.preventDefault();
        _this = $(this);
        span = _this.find('span');
        //check if liked or disliked
        if(_this.hasClass('targeted')) return false;
        var id = _this.data('id');
        var check_like = _this.data('check_like_status');
        var form_data = {id:id ,checkLike:check_like};
        console.log(form_data);
        url = $('input[name=likestatus]').val();
        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: form_data,
            success: function (res) {
              _this.addClass('targeted_like');
              if (check_like){
                _this.addClass('targeted_like');
                _this.removeClass('post-add-icon');
                _this.data('check_like_status', 0);
                span.html(parseInt(span.html(), 10)+1);
              }else{
                _this.removeClass('targeted_like');
                _this.addClass('post-add-icon');
                _this.data('check_like_status', 1);
                span.html(parseInt(span.html(), 10)-1);
              }

            }
        });
    });

    //post comment -- enter to submit
    $(document).on('keypress', '.post_comment textarea', function(e){
      if(e.which == 13  && !e.shiftKey) {
        e.preventDefault();
        var comments_list = $(this).closest('.ui-block').find('.children');
        form = $(this).closest('form');
        form_data = form.serialize();
        url = $('input[name=postcomment]').val();
        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: form_data,
            success: function (res) {
              form.find("input[type=text], textarea").val("");
              comments_list.append(res.data);
              $('.mCustomScrollbar').perfectScrollbar();
            }
        });
        // console.log(form_data);
      }
    });

    $(document).on('change', '.comment-image', function(e){
      var _this = $(this);
      var comments_list = $(this).closest('.ui-block').find('.comments-list');
      form = _this.closest('form');
      form_data = new FormData(form[0]);
      url = $('input[name=postcomment]').val();
      // form_data.append('file', _this.prop('files')[0]);
      callAjax(url,form_data, function(res){
          if(res.error == false){
              form.find("input[type=text], textarea").val("");
              comments_list.append(res.data);
              $('.mCustomScrollbar').perfectScrollbar();
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
    });

    //loadmore
    $(document).on('click', '.delete_post', function(e){
      e.preventDefault();
      var _ele = $(this).closest('.ui-block');
      var id = $(this).closest('article').attr('id').replace(/post-/, '');
      url = $('input[name=delpost]').val();
      data = 'id='+id;
      callAjax(url,data, function(res){
          if(res.error == false){
            _ele.remove();
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
  $(document).on('click', '.delete_cmt', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var _ele = $(this).closest('#ui-block-comment-'+id);
    url = $(this).data('url');
    data = 'id='+id;
    callAjax(url,data, function(res){
      if(res.error == false){
        _ele.remove();
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


    $(document).on('click', '.edit_post', function(e){
    e.preventDefault();
    form = $('#edit_status');

    var edit_post = 1;
    var list_media = form.find("input[name=list_media]");
    list_media.val('');
      console.log(list_media.html());
    var list_file = form.find("input[name=list_file]");
    list_file.val('');
    var list_video = form.find("input[name=list_video]");
    list_video.val('');

    listing_table = form.find('.post-block-photo');
    var _ele = $(this).closest('.ui-block');
    // var id = $(this).closest('article').attr('id').replace(/post-/, '');
    var id = $(this).data('id');
    $("input[name=id]").remove();
    var input = '<input type="hidden" name="id" value="'+id+'">';
    form.append(input);
    post_id = id;
    url = $('input[name=getpost]').val();
    data = 'id='+id;
    callAjax(url,data, function(res){
      $(document).ready(function () {
        form.find('.videovideo').removeClass('d-hidden');
      })
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.media );
        // console.log(arr3);
        list_media.val(arr3);
        var arr2 = list_file.val().concat( ','+res.file );
        // console.log(arr3);
        list_file.val(arr2);
        var arr1 = list_video.val().concat( ','+res.video );
        // console.log(arr3);
        list_video.val(arr1);
        $('#edit-post-status-by-modal').html(res.data);
        countsttedit();
        $(document).ready(function () {
          form.find('.videovideo').removeClass('d-hidden');
          form.find('.linklink').removeClass('d-hidden');
          if (countsttedit() > 1) {
            form.find('.previewaction').removeClass('d-hidden');
          }
          $('.removevideo').on("click", function (e) {
            // form.find('.clone.d-hidden').clone().removeClass('d-hidden');
            e.preventDefault();
            countsttedit();
            $(this).closest('form.files-group').find('.ui-block-content.video-status').remove();
            $(this).closest('form.files-group').find('.add-options-message').find('input[name=list_video]').val(',');
            $(this).closest('form.files-group').find('.post-video').remove();
            if (countsttedit() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });
          $('.removelink').on("click", function (e) {
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
          $('.removeimg').on("click", function (e) {
            e.preventDefault();

            var deleteid = $(this).attr('data-id');
            var a = res.media;
            a.forEach(function (item, index, array) {
              // console.log(item, index);
              if (item == deleteid) {
                a.splice(index, 1);
              }
            });
            list_media.val(a);
            $(this).closest('.clone').remove();
            if (a.length == 0) {
              $('#add-photo').val('');
              $('.photo-preview').addClass('d-hidden');
              $('#addlink').removeClass('isdisable');
            }
            if (countsttedit() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });

        })

        $('.click-delete-file').on("click", function (e) {
          e.preventDefault();

          var deleteid = $(this).attr("data-filedelete");
          // console.log(res.data[i]);
          var a = res.file;
          a.forEach(function(item, index, array){
            // console.log(item, index);
            if(item == deleteid){
              a.splice(index, 1);
            }
          });
          // console.log(a)
          // console.log(deleteid)
          list_file.val(a);
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
    });
  });
  $(document).on('click', '.edit_cmt', function(e){
    e.preventDefault();
    form = $('#edit_comment');
    // console.log($(this).data('id'))
    var edit_comment = 1;
    var list_media = form.find("input[name=list_media]");
    list_media.val('');
    // console.log(list_media.html());
    var list_file = form.find("input[name=list_file]");
    list_file.val('');
    var list_video = form.find("input[name=list_video]");
    list_video.val('');
    var id = $(this).data('id');
    listing_table = form.find('.post-block-photo');
    var _ele = $(this).closest('#ui-block-comment-'+id);
    // var id = $(this).closest('article').attr('id').replace(/post-/, '');
    $('#edit_comment').find("input[name=id]").remove();
    var input = '<input type="hidden" name="id" value="'+id+'">';
    form.append(input);
    post_id = id;
    url = $(this).data('url');
    data = 'id='+id;
    callAjax(url,data, function(res){
      $(document).ready(function () {
        form.find('.videovideo').removeClass('d-hidden');
      })
      if(res.error == false){
        var arr3 = list_media.val().concat( ','+res.media );
        // console.log(arr3);
        list_media.val(arr3);
        var arr2 = list_file.val().concat( ','+res.file );
        // console.log(arr3);
        list_file.val(arr2);
        var arr1 = list_video.val().concat( ','+res.video );
        // console.log(arr3);
        list_video.val(arr1);
        $('#edit-comment-status-by-modal').html(res.data);
        countsttedit();
        $(document).ready(function () {
          form.find('.videovideo').removeClass('d-hidden');
          form.find('.linklink').removeClass('d-hidden');
          if (countsttedit() > 1) {
            form.find('.previewaction').removeClass('d-hidden');
          }
          $('.removevideo').on("click", function (e) {
            // form.find('.clone.d-hidden').clone().removeClass('d-hidden');
            e.preventDefault();
            countsttedit();
            $(this).closest('form.files-group').find('.ui-block-content.video-status').remove();
            $(this).closest('form.files-group').find('.add-options-message').find('input[name=list_video]').val(',');
            $(this).closest('form.files-group').find('.post-video').remove();
            if (countsttedit() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });
          $('.removelink').on("click", function (e) {
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
          $('.removeimg').on("click", function (e) {
            e.preventDefault();

            var deleteid = $(this).attr('data-id');
            var a = res.media;
            a.forEach(function (item, index, array) {
              // console.log(item, index);
              if (item == deleteid) {
                a.splice(index, 1);
              }
            });
            list_media.val(a);
            $(this).closest('.clone').remove();
            if (a.length == 0) {
              $('#add-photo').val('');
              $('.photo-preview').addClass('d-hidden');
              $('#addlink').removeClass('isdisable');
            }
            if (countsttedit() == 1) {
              $('.previewaction').addClass('d-hidden');
            }
          });

        })

        $('.click-delete-file').on("click", function (e) {
          e.preventDefault();

          var deleteid = $(this).attr("data-filedelete");
          // console.log(res.data[i]);
          var a = res.file;
          a.forEach(function(item, index, array){
            // console.log(item, index);
            if(item == deleteid){
              a.splice(index, 1);
            }
          });
          // console.log(a)
          // console.log(deleteid)
          list_file.val(a);
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
    });
  });

    $(document).on('click', '.report_post', function(e){
    e.preventDefault();
    var _ele = $(this).closest('.ui-block');
    var id = $(this).closest('article').attr('id').replace(/post-/, '');
    url = $('input[name=reportpost]').val();
    data = 'id='+id;
    callAjax(url,data, function(res){
      if(res.error == false){
        _ele.remove();
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

  $(document).on('click', '.report_comment', function(e){
    e.preventDefault();
    var _ele = $(this).closest('.ui-block');
    var id = $(this).closest('.comment-item').attr('id').replace(/ui-block-comment-/, '');
    url = $('input[name=reportpost]').val();
    data = 'id='+id;
    callAjax(url,data, function(res){
      if(res.error == false){
        _ele.remove();
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

    //loadmore
    $(document).on('click', '#load-more', function(e){
      e.preventDefault();
      target = $('.newsfeed-items');
      length = target.find(' > .ui-block').length;
      id = $('input[name=target_user]').val();
      url = $('input[name=load-timeline]').val();
      data = 'id='+id+'&length='+length;
      callAjax(url,data, function(res){
          if(res.error == false){
            target.append(res.data);
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
    var urlParams = new URLSearchParams(window.location.search);

    $(document).on('click', '#newsfeed-more', function(e){
      e.preventDefault();
      hashtag = urlParams.get('hashtag');
      caption = urlParams.get('caption');
      type= $('input[name=param]').val();
      var hashtag = (hashtag === null) ? '' : hashtag;
      var caption = (caption === null) ? '' : caption;
      var type = (type === null) ? '' : type;
      target = $('.newsfeed-items');
      length = target.find(' > .ui-block').length;
      url = $('input[name=newsfeed-more]').val();
      data = 'length='+length+'&hashtag='+hashtag+'&type='+type+'&caption='+caption;
      callAjax(url,data, function(res){
          if(res.error == false){
            target.append(res.data);
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
  function callJs(){
    $('.hp_showimg').each(function(){
      var tong = $(this).find('a').length;
      tong = tong-5;
      $(this).find('a').each(function(index){
        var width = $(this).width();
        $(this).find('img').attr('style','height:'+width+'px;');
        if(index == 4 && tong > 0){
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


  $(document).on('click','.chat-reply',function(){
    $(this).closest('.comment-item').find('.form-reply').slideToggle();
  });
  $(document).on('click', '.popup-comment', function(){
    popup = 1;
  });
// reply comment
   $(document).on('keypress', '.rep_comment textarea', function(e){
      if(e.which == 13  && !e.shiftKey) {
        e.preventDefault();
        var comments_list = $(this).closest('.comment-item').find('.content-rep');
        form = $(this).closest('form');
        form_data = form.serialize();
        url = $('input[name=postcomment]').val();
        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: form_data,
            success: function (res) {
              form.find("input[type=text], textarea").val("");
              comments_list.append(res.data);
              $('.mCustomScrollbar').perfectScrollbar();
            }
        });
        // console.log(form_data);
      }
    });
   //checklogin
  $(document).on('click','.post-add-icon,.add-fw',function (){
    if($('input[name=check-login]').val() == 0){
      $('.signup').click();
    }
  })

  //load more right
  function loadRight(){
    target = $('#post_data');
    length1 = target.find(' > .inline-items').length;
    url = $('input[name=load-data-right]').val();
    $.ajax({
      url:url,
      method:"GET",
      data:{length:length1},
      success:function(data)
      {
        $('.noComment').remove();
        $('#load_more_button').remove();
        $('#post_data').append(data);
      }
    })
  }
  // load more left
  function loadDataLeft()
  {
    target = $('#count-left');
    length1 = target.find(' > li').length;
    url = $('input[name=load-data-left]').val();
    $.ajax({
      url:url,
      method:"GET",
      data:{length:length1},
      success:function(data)
      {
        $('.noComment').remove();
        $('#load_more_button_left').remove();
        $('#load_more_button_left1').remove();
        $('#count-left').append(data);
      }
    })
  }

  //load more comment
  function loadCmt()
  {
    let urlLoadCmt = $('#more-cmttt').data('url');
    let id = $(this).data('id');
    let target = $('#childrens-'+id);
    let length1 = target.find(' > .comment-item').length;
      $.ajax({
        type: "GET",
        url: urlLoadCmt,
        data: {
          'id': id,
          'length': length1,
        },
      }).done(function(response) {
        $('.noComment').remove();
        $('.loadmore-cmt-'+id).remove();
        $('#childrens-'+id).append(response);
        callJs();
        $('.js-zoom-gallery').each(function () {
          $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
              enabled: true
            },
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
              beforeOpen: function () {
                // just a hack that adds mfp-anim class to markup
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = 'mfp-zoom-in';
              }
            },
            closeOnContentClick: true,
            midClick: true
          });
        });
       // console.log(response);
      });

  }

  function countsttedit(){
    lengtht =$('#edit-post-status-by-modal').find('.ui-block-content').length;
    // lengtht2 =$('#post_status').find('.ui-block-contentcount').length;
    lengtht2 =$('.post-block-photocount').find('.clone').length;
    totallength = lengtht +lengtht2;

    return totallength;
  }
  function paramAjax()
  {
    if($('input[name=check-login]').val() == 0 && $(this).data('type')== 'following'||$('input[name=check-login]').val() == 0 && $(this).data('type')== 'my-posts'||$('input[name=check-login]').val() == 0 && $(this).data('type')== 'replies'){
        $('.signup').click();
    }else {
      $('input[name=check-login]').val()
      typeparam = $(this).data('type');
      // urlfollow = $('input[name=followAjax]').val();
      urlfollow = $('input[name=newfeedparam]').val();
      $('input[name=param]').val(typeparam);
      // window.location.hash = 'following';
      //console.log(typeparam);
      $.ajax({
        url: urlfollow,
        method: "GET",
        data: {
          type: typeparam
        },
        success: function (data) {
          $('.ui-block-post').remove();
          $('#paramsajax').html(data);
          $(document).ready(function () {
            callJs();
            $('.js-zoom-gallery').each(function () {
              $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                  enabled: true
                },
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                  beforeOpen: function () {
                    // just a hack that adds mfp-anim class to markup
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'mfp-zoom-in';
                  }
                },
                closeOnContentClick: true,
                midClick: true
              });
            });
          })
        }
      })
    }
  }

  $(function() {

    // let id = $('#cmtID').data('id');

    $(document).on('click', '.loadmore-cmt', loadCmt);
    $(document).on('click', '#load_more_button', loadRight);
    $(document).on('click', '#load_more_button_left', loadDataLeft);
    $(document).on('click', '.newsfeed-loadbytype', paramAjax);
  });
});
