$(function() {

    var date_start_content = '';


    $('body').on('click', '.clone_ms', function() {
        var fullmistone = $(this).closest('.milestone_group').find('.mile_property');
        if (fullmistone.hasClass('full')) {
            swal("max milestones exceed 100%");
            return false;
        }
        var max_ms = 99;
        var count = $('.milestone_group').find('.mile_property:not(.d-none)').length;
        if (count >= max_ms) {
            swal("max " + max_ms + " milestones");
            return false;
        }

        var clone = $('.mile_property.d-none').clone().removeClass('d-none');

        // $('#accordion1').css( "height", "+=120px" );
        //reinit selectpicker
        // clone.find('select.percent_payment').selectpicker('refresh');
        //replace name input textarea
        // clone.each(function(){
        //   $(this).find('input,textarea,select').attr('name', function(i,txt) {return txt.replace(/kt_mile/, 'mile'); });
        // });
        // var clone = $('.milestone_group').find('.mile_property').last().clone();
        clone.insertBefore($(this).closest('.wrap_clone_ms'));

        reindex();
        beforePreview();
        milestone_day();

    });


    $('.clone_ms').click(function(){
        $('.sorting-container').css('height','1300px')
    });

    $('body').on('click', '#cardPup',function () {
        $('.sorting-container').css('height','1800px');
       $('#cardPup').addClass("closePup");
    });
  $('body').on('click', '.closePup',function () {
    $('.sorting-container').css('height','1300px');
  });


    $('body').on('click', '.delpanel', function() {
        $(this).closest('.mile_property').remove();
        reindex();
        milestone_day();
    });

    function reindex() {
        var count = 0;
        var percent = 0;
        var price_bid = $('input.work_price').val();
        var price_job = $('input[name=budget]').val();
        // $(this).find('select.percent_payment').selectpicker('destroy');

        $('.milestone_group').find('.mile_property:not(.d-none)').each(function(index) {
            percent = $(this).find('select.percent_payment').val();
            //console.log(percent);
            if (price_job && price_job != '') {
                price_job = price_job.replace(',', '');
                parseFloat(price_job);
                var price_percent = percent * price_job / 100;
            } else if (price_bid && price_bid != '') {
                price_bid = price_bid.replace(',', '');
                parseFloat(price_bid);
                var price_percent = percent * price_bid / 100;
            }
            $(this).find('.info_percent').html(price_percent);
            if (index == 0) {
                //Get the text using the value of select
                /*var opt = $(this).find('select.percent_payment option[value=20]');
                var text = opt.text();
                //We need to show the text inside the span that the plugin show
                $(this).find('.bootstrap-select .filter-option').text(text);
                //Check the selected attribute for the real select
                opt.prop('selected', true)
                .siblings().prop('disabled', 'disabled');*/
                $(this).find('select.percent_payment option[value=20]')
                    .prop('selected', true)
                    .text(function(i, txt) { return '20% | Locked' })
                    .siblings().prop('disabled', 'disabled');

                //hung
                $(this).find('.value_percent').html('20');

                // if(price_job){
                //   var price_percent = 20*price_job/100;
                // }else{
                //   var price_percent = 20*price_bid/100;
                // }

                // $(this).find('.info_percent').html(price_percent);
                // var ms1day = $(this).find('.ms_workday').val();
                // console.log(ms1day);
                // $(this).closest('.milestone_group').find('.mile_property span.day_ms1').html('sdadas');
            }

            a = $(this).find('a.collapsepanel');
            props = $(this).find('.props');
            counter = $(this).find('.ms_counter');
            // a.text(function(i,txt) {return txt.replace(/\d+/, index+1); });
            a.attr('href', function(i, txt) { return txt.replace(/\d+/, index + 1); });
            props.attr('id', function(i, txt) { return txt.replace(/\d+/, index + 1); });
            counter.text(function(i, txt) { return txt.replace(/\d+/, index + 1); });
            $(this).each(function() {
                $(this).find('input,textarea,select').attr('name', function(i, txt) { return txt.replace(/\d+/, index); });
                $(this).find('input,textarea,select').attr('name', function(i, txt) { return txt.replace(/kt_mile/, 'mile'); });
            });
            //reinit selectpicker
            // $(this).find('select.percent_payment').selectpicker('refresh');


            //console.log(index);


            count += parseInt(percent);
            //console.log(count);
            if (parseInt(count) > 100) {
                $(this).addClass('full');
                var sodu = parseInt(count) - 100;
                swal("Total percent greater than 100%. exceed " + sodu + "% percent");
                $(this).find('.percent_payment option[value="FREE UP"]').remove();
                $(this).find('.card-header span.value_percent').html('FULL');
                $(this).find('.ui-block span.value_percent').html('100');
                $(this).find('span.info_percent').html('0');
                $(this).find('select.percent_payment').prepend('<option value="FREE UP" selected>FREE UP %</option>');


            }
            if ($(this).hasClass('full')) {
                if (isNaN(count)) {
                    swal("Please check percent payment, this is value not undefined!");
                } else {
                    if (parseInt(count) <= 100) {
                        var a = $(this).closest('.milestone_group').find('.full');
                        a.find('.percent_payment option[value="FREE UP"]').remove();
                        a.removeClass('full');
                    }
                }
            }

        });
    }


    $(document).on('input', 'input.ms_workday', function() {
        var val = $(this).val();
        //console.log(val);
        var value_day = $(this).closest('.mile_property').find('.value_day');
        value_day.html(val);
        milestone_day();
    });
    $(document).on('change', 'select.percent_payment', function() {
        reindex();
        var price = $('input[name=budget]').val();
        if (price) {
            price = price.replace(',', '');
            // console.log(price);
            parseFloat(price);
            var val = $(this).val();
            //console.log(val);
            var html = val * price / 100;
            //console.log(html);
            var value_percent = $(this).closest('.mile_property').find('.value_percent');
            var info_percent = $(this).closest('.mile_property').find('.info_percent');
            value_percent.html(val);
            info_percent.html(html);
        }

    });
    $(document).on('change', '.budget-value-1', function() {
        $('.budget-value-2').val($('.budget-value-1').val());
    });

//double checkbox
    $(document).on('change', '.budget-value-2', function() {
        $('.budget-value-1').val($('.budget-value-2').val());
    });

//radio
  $(document).on('change', '.radio1', function() {
    var val = $(this).data('week');
     if ($(this).data('week')=='1'){
       $('.radio2-'+val).prop("checked", true);
     }
    if ($(this).data('week')=='2'){
      $('.radio2-'+val).prop("checked", true);
    }
    if ($(this).data('week')=='3'){
      $('.radio2-'+val).prop("checked", true);
    }
    if ($(this).data('week')=='4'){
      $('.radio2-'+val).prop("checked", true);
    }
  });
  $(document).on('change', '.radio2', function() {
    var val = $(this).data('week');
    if ($(this).data('week')=='1'){
      $('.radio1-'+val).prop("checked", true);
    }
    if ($(this).data('week')=='2'){
      $('.radio1-'+val).prop("checked", true);
    }
    if ($(this).data('week')=='3'){
      $('.radio1-'+val).prop("checked", true);
    }
    if ($(this).data('week')=='4'){
      $('.radio1-'+val).prop("checked", true);
    }
  });




    $(document).on('input, change', 'input.work_price', function() {
        var valdefautprice = $(this).closest('.hp_work_price').find('.hidden-price').attr('data-price');
        //console.log(valdefautprice);
        if (valdefautprice) {
            valdefautprice = valdefautprice.replace(',', '');
            var val = $(this).val();
            $(this).closest(document).find('.total_bid_price').html(val);
            val = val.replace(',', '');
            console.log(valdefautprice);
            console.log(val);
            parseFloat
            if (parseFloat(val) >= parseFloat(valdefautprice)) {
                var count = parseFloat(val) - parseFloat(valdefautprice);
                var value_price = $(this).closest('.hp_work_price').find('.hp_price_up');
                value_price.html(count);
            }

        }

    });
    $(document).on('select, change', 'select.percent_payment', function() {
        var valdefautprice = $('.hp_work_price').find('.work_price').val();

        //console.log(valdefautprice);
        if (valdefautprice) {
            valdefautprice = valdefautprice.replace(',', '');
            var val = $(this).val();
            var html = val * valdefautprice / 100;
            //console.log(html);
            var value_percent = $(this).closest('.mile_property').find('.value_percent');
            var info_percent = $(this).closest('.mile_property').find('.info_percent');
            value_percent.html(val);
            info_percent.html(html);
        }

    });


    $(document).on('input, change', 'input[name=budget], input[name=price]', function() {

        var price = $(this).val();
        //console.log(price);
        price = price.replace(',', '');
        $('.mile_property select.percent_payment').each(function() {
            var val = $(this).val();
            var html = val * price / 100;
            // console.log(html);
            var value_percent = $(this).closest('.mile_property').find('.value_percent');
            var info_percent = $(this).closest('.mile_property').find('.info_percent');
            value_percent.html(val);
            info_percent.html(html);
        });
    });


});

function check_milestone() {
    if ($('.milestone_group').closest('.form-section').is(':visible') && $('.milestone_group .mile_property:not(.d-none)').length > 0) {
        var total = 0;
        $('.milestone_group .mile_property:not(.d-none)').find('.percent_payment').each(function(index) {
            total += parseInt($(this).val()) || 0;

        });
        // var total = parseInt(total) || 0;
        if (total != 0 && total != 100) {
            var left = 100 - parseInt(total);
            swal("Total percent must 100%. Left " + left + "% complete milestones");
            return false;
        } else if (total > 100) {
            var sodu = parseInt(total) - 100;
            swal("Total percent greater than 100%. exceed " + sodu + "% percent");
            return false;
        }
        if ($('.mile_property').hasClass('full')) {
            swal("Total percent exceeds 100%");
            return false;
        }
    }

    return true;
}

function beforePreview() {
    $('.addnew-form input,textarea,select').each(function() {
        val = $(this).val();
        name = $(this).attr('name');
        name = name.replace(/[^a-z0-9\s]/gi, '_').replace(/[-\s]/g, '_');
        $('.preview-job').find('.' + name).html(val);
    });
    ms = $('.milestone_group .mile_property:not(.d-none)');
    list_ms = $('.list_ms');
    list_ms.html('');
    if (ms.length > 0) {
        $('.have-milestone').css('display', 'block');
        $('.no-milestone').css('display', 'none');
        ms.each(function(index) {
            clone = $('.item-ms.d-none').clone().removeClass('d-none');
            _this = $(this);
            a = clone.find('a.collapse');
            props = clone.find('div.collapse');
            counter = clone.find('.ms_counter');
            a.attr('href', function(i, txt) { return txt.replace(/\d+/, index + 1); });
            props.attr('id', function(i, txt) { return txt.replace(/\d+/, index + 1); });
            counter.text(function(i, txt) { return txt.replace(/\d+/, index + 1); });

            percent_payment = _this.find('.ms_percent_payment').val();
            clone.find('.percent_payment').html(percent_payment);
            workday = _this.find('.ms_workday').val();
            clone.find('.workday').html(workday);
            title = _this.find('.ms_title').val();
            clone.find('.title').html(title);
            description = _this.find('.ms_description').val();
            clone.find('.description').html(description);
            info_percent = _this.find('.info_percent').first().text();
            clone.find('.info_percent').html(info_percent);

            list_ms.append(clone);
        });
    } else {
        $('.have-milestone').css('display', 'none');
        $('.no-milestone').css('display', 'block');
    }

}

$(document).on('input, change', 'input.hp_work_time', function() {
    var valdefaut = $(this).closest('.hp_work_day').find('.hidden-time').attr('data-time');
    //console.log(valdefaut);
    var val = parseInt($(this).val());
    // console.log(val);

    if (val > valdefaut) {
        var count = val - valdefaut;
        $(this).closest('.hp_work_day').find('.hp_units1').removeClass('hp_hidden');
        var value_day = $(this).closest('.hp_work_day').find('.countup');
        value_day.html(count);
    } else if (val < valdefaut) {
        var count = valdefaut - val;
        $(this).closest('.hp_work_day').find('.hp_units2').removeClass('hp_hidden');
        var value_day = $(this).closest('.hp_work_day').find('.countdown');
        value_day.html(count);
    } else {
        var count = valdefaut - val;
        $(this).closest('.hp_work_day').find('.hp_units1').addClass('hp_hidden');
        $(this).closest('.hp_work_day').find('.hp_units2').addClass('hp_hidden');
    }
    $(this).closest(document).find('.total_bid_day').html(val);
});

$("input, select").change(function() {
    var id = $(this).val();
    if($(this).attr('id') == 'checkboxid2'){
      if ($('.checkboxid2-' + id).is(":checked")) // nếu ấn check
      {
        $('.checkboxid1-' + id).prop("checked", true);
      } else {
        $('.checkboxid1-' + id).prop("checked", false);
      }
    }

    if($(this).attr('id') == 'checkboxid1'){
      if ($('.checkboxid1-' + id).is(":checked"))
      {
        $('.checkboxid2-' + id).prop("checked", true);
      } else {
        $('.checkboxid2-' + id).prop("checked", false);
      }
    }

    hungcheck();
    nextstep();
    list_type_bid();
    cat_skill();
    totalday();
});


function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[0] - 1, mdy[1]);
}

function daydiff(first, second) {
    return (second - first) / (1000 * 60 * 60 * 24)
}

function totalday() {
    var deadtime = $('.deadline-time').find('input.project-deadline').val();
    var datenow = $('.deadline-time').find('input[name=daynow]').val();
    if (deadtime && datenow) {
        var totalday = daydiff(parseDate(datenow), parseDate(deadtime));
        $('body').find('span.totalday').html(totalday);
        $('body').find('span.total-project-day').html(totalday);
    }
    var time_start = $('#startbid').val();
    var time_end = $('#endbid').val();
    if (time_start && time_end) {
        var totaltime = daydiff(parseDate(time_start), parseDate(time_end));
        $('body').find('span.totaltime').html(totaltime);
    }

}

function cat_skill() {

    var showbutton_cats = $('.approve_cats').find('.show_button');
    showbutton_cats.html("");
    $('.cats_skill').find('.select_cats option').each(function() {
        var clone = $('.approve_cats').find('.show_cats.d-none').clone().removeClass('d-none');
        var skills = $(this).html();
        //console.log(skills);
        clone.html(skills);
        showbutton_cats.append(clone);
    });

    var showbutton_skill = $('.approve_skill').find('.show_button');
    showbutton_skill.html("");
    $('.cats_skill').find('.select_skill option').each(function() {
        var clone = $('.approve_skill').find('.show_skill.d-none').clone().removeClass('d-none');
        var skills = $(this).html();
        clone.html(skills);
        showbutton_skill.append(clone);
    });


}

function list_type_bid() {
    var total1 = 0;
    var total2 = 0;
    var total3 = 0;
    var total4 = 0;
    var listname = "";
    $('.list_type_bid').each(function() {
        $(this).find('.list_type input[type=checkbox]').each(function() {
            $('.post-thumb.featured').addClass('hp_hidden');
            $('.post-thumb.urgent').addClass('hp_hidden');

        });
        $(this).find('.list_type input[type=checkbox]:checked').each(function() {

            listname = $(this).closest('.checkbox').find('.listname').html();
            var data1 = $(this).attr('data-week1');
            var data2 = $(this).attr('data-week2');
            var data3 = $(this).attr('data-week3');
            var data4 = $(this).attr('data-week4');
            var val = $(this).val();
            total1 += Number(data1);
            total2 += Number(data2);
            total3 += Number(data3);
            total4 += Number(data4);
            if (listname == "Featured Project") {
                $('.post-thumb.featured').removeClass('hp_hidden');
            } else if (listname == "Urgent Project") {
                $('.post-thumb.urgent').removeClass('hp_hidden');
            } else {
                $('.post-thumb.featured').addClass('hp_hidden');
                $('.post-thumb.urgent').addClass('hp_hidden');
            }
        });

        if (total1 > 0) {
            $('span.oneweek').html(total1);
            $('input.oneweek').attr('value', total1);
            $('span.twoweek').html(total2);
            $('input.twoweek').attr('value', total2);
            $('span.threeweek').html(total3);
            $('input.threeweek').attr('value', total3);
            $('span.fourweek').html(total4);
            $('input.fourweek').attr('value', total4);
        } else {
            $('span.oneweek').html('5');
            $('input.oneweek').attr('value', '5');
            $('span.twoweek').html('7.5');
            $('input.twoweek').attr('value', '7.5');
            $('span.threeweek').html('10');
            $('input.threeweek').attr('value', '10');
            $('span.fourweek').html('13.5');
            $('input.fourweek').attr('value', '13.5');
        }

        function addDays(dateObj, numDays) {
            dateObj.setDate(dateObj.getDate() + numDays);
            return dateObj;
        }
        var date = new Date();
        /*$('.hp_week').each(function(){
          $(this).find('input[type=radio]:checked').each(function(){

            var price_craftingcost = $(this).val();
            //alert(price_craftingcost);
            //console.log(price_craftingcost);
            var week = $(this).attr('data-week');
            $('.bid_week').html(7*week);
            $(this).closest('.hp_week').find('input[type=hidden]').attr('value',week);
            $('.craftingcost').html(price_craftingcost);
            $('.bid_start').html(( '0' + (date.getMonth()+1) ).slice( -2 )+'/'+('0' + date.getDate()).slice( -2 )+'/'+date.getFullYear());
            var end_day = addDays(date , 7*week);
            $('.bid_end').html(( '0' + (end_day.getMonth()+1) ).slice( -2 )+'/'+('0' + end_day.getDate()).slice( -2 )+'/'+end_day.getFullYear());

          });
        });*/
        $('.hp_week').each(function() {
            $(this).find('input[type=radio]:checked').each(function() {

                var price_craftingcost = $(this).val();
                //alert(price_craftingcost);
                //console.log(price_craftingcost);
                var week = $(this).attr('data-week');
                $('.bid_week').html(7 * week);
                $(this).closest('.hp_week').find('input[type=hidden]').attr('value', week);
                $('.craftingcost').html(price_craftingcost);
                var dateCreate = $('.deadline-time').find('input.project-deadline').val();
                var date = new Date(dateCreate);
                var date_start = ('0' + (date.getMonth() + 1)).slice(-2) + '/' + ('0' + date.getDate()).slice(-2) + '/' + date.getFullYear();


               // $('.bid_start_contest').html(date_start);


                var end_day = addDays(date, 7 * week);
                var date_stop = ('0' + (end_day.getMonth() + 1)).slice(-2) + '/' + ('0' + end_day.getDate()).slice(-2) + '/' + end_day.getFullYear();
                //console.log(date_stop);
                $('.bid_end_contest').html(date_stop);
                date_stop = date_stop + ' 12:30';
                const date1 = new Date(date_start);
                const date2 = new Date(date_stop);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
                var countdown = diffDays + ' Days, ' + hours + ' Hours, ' + minutes + ' Mins';
                //console.log(countdown)
                $('.bid_end_contest_day').html(countdown);
                $('.contest_week').html(week);
                $('#contest_time_end_value').val(('0' + (end_day.getMonth() + 1)).slice(-2) + '/' + ('0' + end_day.getDate()).slice(-2) + '/' + end_day.getFullYear())
            });
        });
    });
}
hungcheck();

function hungcheck() {
    var flag = true;
    var le = "";
    $(".hungpro").each(function() {

        $(this).find("input").each(function() {

            var nn = $(this).attr('name');
            //alert(nn);
            var le = $(this).closest('.hungpro').find("[name='" + nn + "']:checked").get().length;
            if (le < 1) { flag = false; } else {
                flag == true;
            }

            if (flag == true) {
                $(this).closest('.seachcriteria').addClass('thoaman');
            } else {
                $(this).closest('.seachcriteria').removeClass('thoaman');
            }
            //alert(flag);
        });
        $(this).find("select").each(function() {
            if ($(this).val() != '') {
                flag = true;
                $(this).closest('.seachcriteria').addClass('thoaman');
            }
            if ($(this).val() == '') {
                flag = false;
                $(this).closest('.seachcriteria').removeClass('thoaman');
            }
        });
    });
    $('.cats_skill').each(function() {
        var select_cat = "";
        var select_skil = "";
        $(this).find("select.select_skill").each(function() {
            select_skil = $(this).val();
        });
        $(this).find("select.select_cats").each(function() {
            select_cat = $(this).val();
        });
        if (select_skil != '' && select_cat != '') {
            flag = true;
            $(this).closest('.seachcriteria').addClass('thoaman');
        } else {
            flag = false;
            $(this).closest('.seachcriteria').removeClass('thoaman');
        }
    });
}




function nextstep() {
    var checkclass = $('.countbox').length;
    var hungthoaman = $('.thoaman').length;
    if (checkclass === hungthoaman) {
        return true;
    } else {
        return false;
    }
}

$('.hp_file').change(function() {
    $('#list_array_delete').val('');
    $('.btn-clear-file').css("display", "inherit");
    var ui_block = $('.hp_previewfile').find('.hienthi');
    ui_block.html('');
    var $this = $('.hp_previewfile').find('.cart_item.d-none');
    var files = $(this).get(0).files;
    if (files.length === 0) {
        $('.previewfile').addClass('hp_hidden');
    } else {
        $('.previewfile').removeClass('hp_hidden');
    }
    $('.file-drag-preview').css("display", "none");
    $('.btn-display-none').css("display", "block");
    $.each(files, function(i, file) {
        var clone = $this.clone().removeClass('d-none');
        var string = clone.find('.forum-item img').attr('src');
        var name = file.name;
        var lastDot = name.lastIndexOf('.');
        var fileName = name.substring(0, lastDot);
        var ext = name.substring(lastDot + 1);
        var name_file = '';
        if (ext == 'zip' || ext == "rar") {
            ext = 'zip';
            name_file = 'Zip File';
        }
        if (ext == 'jpg' || ext == "png" || ext == "gif") {
            ext = 'jpg';
            name_file = 'Image File';
        }
        if (ext == 'txt' || ext == 'docx') {
            ext = 'wordFile';
            name_file = 'Word Doc';
        }
        if (ext == 'pptx') {
            ext = "powerpointFile";
            name_file = 'PowerPoint';
        }
        if (ext == 'avi' || ext == 'flv' || ext == 'wmv' || ext == 'mov' || ext == 'mp3' || ext == 'mp4') {
            ext = 'video-player';
            name_file = 'Video File';
        }
        if (ext == 'pdf') {
            ext = 'pdfFILE';
            name_file = 'PDF File';
        }
        var laststring = string.lastIndexOf('.');
        var lastname = string.substring(laststring);
        var firststring = string.lastIndexOf('/');
        var firstname = string.substring(0, firststring + 1);
        var newstring = firstname + ext + lastname;
        var classnew = 'delete-view-' + i;
        clone.addClass(classnew);
        //console.log(fileName);
        if (fileName.length > 50) {
            fileName = fileName.substr(0, 50) + "...";
        }
        clone.find('img').attr('src', newstring);
        clone.find('.delete-file img').attr('src', 'img/trash.svg');
        clone.find('.click-delete-file').attr('data-filedelete', i);
        clone.find('.content .title').append(fileName);
        clone.find('.content .post__date time').append(name_file);
        ui_block.append(clone);
    });
});

function milestone_day() {
    var val_day_ms = "";
    var tong = 0;

    $('.milestone_group').find('.mile_property:not(.d-none)').each(function(index) {

        var thisval = $(this).find('.ms_workday').val();
        var loopms = $(this).find('.hp_work_day hp');
        var tongday = '| Total = <span class="tongday">10 </span>days';
        var line = "";
        if (index > 0) {
            line = '|';
        } else {
            line = "";
        }
        val_day_ms += line + ' <span style="padding-right:3px;">M.' + (index + 1) + ': <span>' + thisval + '</span></span> ';

        loopms.html(val_day_ms);
        if (index > 0) {
            loopms.append(tongday);
        }
        if (index == 0) {
            loopms.append('days');
        }
        $(this).find('.tongday').html('');
        tong += parseInt(thisval);
        $(this).find('.tongday').html(tong);
        $(this).closest('.form-post_bid').find('.total_bid_day').html(tong);

        if (tong && tong > 0) {
            $('.addnew-form').find('.totalday').html(tong);
        }
    });
    // console.log(tong);


}
// buget price

var inputnumber = 'Input value is not a number';

function FormatNumber(str) {
    var strTemp = GetNumber(str);
    if (strTemp.length <= 3)
        return strTemp;
    strResult = "";
    for (var i = 0; i < strTemp.length; i++)
        strTemp = strTemp.replace(",", "");
    var m = strTemp.lastIndexOf(".");
    if (m == -1) {
        for (var i = strTemp.length; i >= 0; i--) {
            if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
                strResult = "," + strResult;
            strResult = strTemp.substring(i, i + 1) + strResult;
        }
    } else {
        var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
        var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
            strTemp.length);
        var tam = 0;
        for (var i = strphannguyen.length; i >= 0; i--) {

            if (strResult.length > 0 && tam == 4) {
                strResult = "," + strResult;
                tam = 1;
            }

            strResult = strphannguyen.substring(i, i + 1) + strResult;
            tam = tam + 1;
        }
        strResult = strResult + strphanthapphan;
    }
    return strResult;
}

function GetNumber(str) {
    var count = 0;
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
            alert(inputnumber);
            return str.substring(0, i);
        }
        if (temp == " ")
            return str.substring(0, i);
        if (temp == ".") {
            if (count > 0)
                return str.substring(0, ipubl_date);
            count++;
        }
    }
    return str;
}

function IsNumberInt(str) {
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "." || (temp >= 0 && temp <= 9))) {
            alert(inputnumber);
            return str.substring(0, i);
        }
        if (temp == ",") {
            return str.substring(0, i);
        }
    }
    return str;
}

// end bugget price

$('.create-success').click(function(e) {
    e.preventDefault();
    var form = $('#new-project');
    //var budget = $('#replace_budget-123').val();
    var budget = $('#replace_budget_value').val();
    // console.log(budget);
    budget = budget.replace(',', '');
    budget = parseFloat(budget);
    // console.log(budget);
    $(this).closest('form').find('input.replace_budget').val(budget);
    form.submit();
});
