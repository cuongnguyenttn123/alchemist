$(document).ready(function () {
	$('.profile_info .tab-pane form').addClass('fdsgf');
    $(document).on('click', '.profile_info .tab-pane form button[type=submit]', function(e) {
        e.preventDefault();
        url = $('input[name=profile_url]').val();
        form_data = $(this).closest('form').serialize();
        callAjax(url,form_data, function(res){
            if(res.error == false){
                jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
                swal(res.message);
            }
        });
    });

        $('.result_search').hide();
        $(document).on('click', '.saveskill', function() {
            _this = $(this).closest('.ui-block');
            var skill = [];
            var detach_skill = [];
            $('input[name="userskill[]"]:checked').each(function(i){
                skill[i] = $(this).val();
            });
            $('input[name="userskill[]"]:not(:checked)').each(function(i){
                detach_skill[i] = $(this).val();
            });
            ajax_saveskills(skill,detach_skill);
        });
        $(document).on('click', '.remove_skill', function() {
            id = $(this).data('id');
            var skill = [];
            var detach_skill = [];
            detach_skill.push(id);
            console.log(skill);
            console.log(detach_skill);
            ajax_saveskills(skill,detach_skill);
            $(this).closest('li').remove();
        });

        function ajax_getkills() {
          $.ajax({
            type:'GET',
            url: $('#getskill').val(),
            data: '',
            success:function(res){
              if (res.error == false) {
                $('.ajax-load-skilss').html(res.data);
              } else {
                swal(res.message);
              }
            }
          });
        }

        function ajax_saveskills(skill, detach_skill){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url: $('#saveskill').val(),
                data: 'skill='+skill+'&detach_skill='+detach_skill,
                success:function(data){
                    $('.skills_left span').text(data.skills_left);
                    if(data.error){
                        jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                    }else {
                        ajax_getkills();
                        jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                        // swal("Success!", data.message, "success");
                    }
                }
            });
        }
        $(document).on('select, change', '.select-category select', function() {
            // console.log('aaaaaa');
            _this = $(this).closest('.ui-block');
            cat_id = $(this).val();
            // console.log(cat_id);
            form_data = 'cat_id='+cat_id;
            ajax_searchskill(form_data);
        });
        $(document).on('click', '.search-category', function() {
           //console.log('aaaaaa');
          cat_id = $(this).attr('data-cat_id');
          console.log(cat_id);
          form_data = 'cat_id='+cat_id;
          ajax_searchskill(form_data);
        });
        $(document).on('submit', '.w-search', function(e) {
            e.preventDefault();
            cat_id = $(this).closest('.ui-block').find('select[name="cat_skill"]').val();
            form_data = $(this).serialize();
            if(cat_id){
                console.log(cat_id);
                form_data += '&cat_id='+cat_id;
            }
            ajax_searchskill(form_data);
        });
        function ajax_searchskill(form_data){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url: $('#searchskill').val(),
                data: form_data,
                success:function(data){
                    $('.result_search').find('.h6.title').html(data.title);
                    $('.result_search').find('.row').html(data.output);
                    $('.list_cat').hide();
                    $('.result_search').show();
                }
            });
        }
        $(document).on('click', '.back_to_cat', function() {
            $(this).closest('.ui-block').hide();
            $(this).closest('.ui-block').prev().show();
        });

    $(document).on('click', '.del_notif', function() {
        _counter = $(this).closest('.control-icon').find('.label-avatar');
        _li = $(this).closest('li');
        id = $(this).closest('li').data('id');
        url = $('input[name=deleteNotif]').val();
        form_data = 'id='+id;
        callAjax(url,form_data, function(res){
            if(res.error == false){
                _counter.html(parseInt(_counter.html(), 10)-1);
                _li.remove();
            }else{
               swal(res.message);
            }
        });
    });

    //update profile image
    $(document).on('change ', '.change_profile', function(){
      var _this = $(this);
      var type = _this.data('type');
      if (type=="header") {
        target = $('.profile_banner');
      } else {
        target = $('.avatar');
      }
      var form_data = new FormData();
        form_data.append('type', type);
        form_data.append('file', _this.get(0).files[0]);
        url = $('input[name=update_photo]').val();
        callAjax(url,form_data, function(res){
          if(res.error == false){
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            // reload img
            target.attr('src', res.url);
          }else{
            //swal(res.message);
          }
        },true);
        _this.val('');
    });

    $(document).on('change ', 'select.select_country', function(e){
        e.preventDefault();
        var _this = $(this);
        var ct = _this.find("option:selected").html();
        data = 'country='+ct;
        url = $('input[name=getstate]').val();
        $("select.list_states").html("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: url,
            data: data,
            success: function (res) {
                if(res){
                    $("select.list_states").html(res);
                }
                $('.list_states').selectpicker('refresh');
            }
        });
    });

});
