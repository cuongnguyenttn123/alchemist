
    $(document).on('click', '.submit_reg', function(e) {
        e.preventDefault();
        _this =  $(this).closest('.reg_form');
        _this.find('.invalid-feedback').hide();
        form_data = _this.serialize();
        // console.log(form_data);
        $.ajax({
               type:'POST',
               url: _this.attr('action'),
               data: form_data,
               success:function(data){
                if(data.error){
                    $.each(data.message, function(key,value) {
                        // console.log(key);
                        // console.log(value[0]);
                        // $('#reg_form').find('.'+key).siblings('.invalid-feedback').text(value[0]).show();
                        jQuery.sticky(value[0], {classList: 'important', speed: 200, autoclose: 5000});
                    });
                }else {
                    console.log(data.role);
                    // jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                    swal("Success!", data.message, "success");
                }
               }
        });
    });
    $(document).on('click', '.form_login button[type=submit]', function(e) {
        e.preventDefault();
        _this = $(this).closest('.form_login');
        _this.find('.invalid-feedback').hide();
        form_data = _this.serialize();
        $.ajax({
               type:'POST',
               url: _this.attr('action'),
               data: form_data,
               success:function(data){
                if(data.error && data.validate){
                    // jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                    $.each(data.message, function(key,value) {
                        jQuery.sticky(value[0], {classList: 'important', speed: 200, autoclose: 5000});
                    });
                }else {
                    if (data.success) {
                        jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                        setTimeout(function(){window.location.reload();} , 2000);
                    }else{
                        jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                    }
                }
               }
            });
    });
    $(document).on('click', '.vkl', function(e) {
        e.preventDefault();
        _this = $(this).closest("form");
        form_data = _this.serialize();
        var url = _this.attr('action');
        callAjax(url,form_data, function(res){
            if(res.error == false){
                swal(res.message);
                setTimeout(function(){window.location.reload();} , 2000);
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

    // hero
    $('.forgot').click(function(){
     $(this).closest('.tab-content').find('#forgot_password').addClass('active show');
     $(this).closest('.tab-pane').removeClass('active show');
    });
    $('.backhome').click(function(){
     $(this).closest('.tab-content').find('.login').addClass('active show');
     $(this).closest('.tab-pane').removeClass('active show');
    });