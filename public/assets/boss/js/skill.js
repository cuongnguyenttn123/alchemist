$(document).ready(function () {
    $('.edit-skill').on('click', function(){
        var tr = $(this).parents('tr');
        var current = $(tr).find('.name').text();
        var parent = $(tr).find('._category').text();
        var id = $(tr).find('.edit-skill').data('id');
        var data = {
            current,parent,id
        };
        console.log(data)
        $('input[name=id]').val(data.id);
        $('input[name=name]').val(data.current);
        $('select[name=_category] option').each(function (i,e){
            if($(e).text() == data.parent){
                $(e).prop("selected","selected");
            }
        });
        $('button[type=submit]').addClass('col-md-8');
        $('button[type=submit]').text('Update').removeClass('btn-outline-secondary').addClass('btn-outline-success');
        $("html, body").animate({ scrollTop: 0 }, "fast");

        $('.cancel-update').show();
        $('.cancel-update').on('click', function () {
            $('button[type=submit]').removeClass('col-md-8');
            $('input[name=id]').val('');
            $('input[name=name]').val('');
            $('select[name=_category] option:first-child').prop('selected','selected');
            $('button[type=submit]').text('Add more').removeClass('btn-outline-success').addClass('btn-outline-secondary');
            $('.cancel-update').hide();
        })
    })
    $('.js-sweetalert-delete').on('click', function(){
        var ele = this;
        var link = $('input[name=delete-link]').val();
        var data = {
          'id':$(this).attr('data-id')
        };
        showConfirmMessage(data, link, 'POST', ele,function(ele){
            $(ele).parents('tr').remove();
        })
    });
});

