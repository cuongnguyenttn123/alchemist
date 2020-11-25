$(function () {

	//birthday datepicker
	var date_select_field = $('input.datepicker');
	if (date_select_field.length) {
		var minDate = moment().subtract(39, 'years');
		var start = moment().subtract(19, 'years');

		date_select_field.daterangepicker({
			startDate: start,
			autoUpdateInput: false,
			singleDatePicker: true,
			showDropdowns: true,
	    	// minDate: minDate,
	    	maxDate: moment(),
			locale: {
				format: 'DD/MM/YYYY'
			}
		});
		date_select_field.on('focus', function () {
			$(this).closest('.form-group').addClass('is-focused');
		});
		date_select_field.on('apply.daterangepicker', function (ev, picker) {
			$(this).val(picker.startDate.format('DD/MM/YYYY'));
			$(this).closest('.form-group').addClass('is-focused');
		});
		date_select_field.on('hide.daterangepicker', function () {
			if ('' === $(this).val()){
				$(this).closest('.form-group').removeClass('is-focused');
			}
		});

	}

	//reset form
  	$(document).on('click','.reset_form', function (e) {
  		e.preventDefault();
	    var form = $(this).closest('form');
	    form[0].reset();
	});

	//close 1 modal still open other modal
  	$('.modal').on('hidden.bs.modal', function (e) {
	    if($('.modal').hasClass('show')) {
	    	$('body').addClass('modal-open');
	    }
	});

	function init_selectize() {
		$('.selectize').selectize({
			maxItems: 99
		});
	}
	init_selectize();

	// Javascript to enable link to tab
	var url = document.location.toString();
	if (url.match('#')) {
	    $('.nav-tabs li > a[href="#' + url.split('#')[1] + '"]').tab('show');
        $('html, body').stop().animate({
            scrollTop: $('#'+ url.split('#')[1]).offset().top - 200
        }, 1000);
	}

	/*// Change hash for page-reload
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
	    window.location.hash = e.target.hash;
	});
	$(window).on('hashchange', function() {
	  if (window.location.hash) {
	    $('.' + window.location.hash.substr(1)).click();
	  }
	});*/

	//before ajax
	function before_ajax() {
		$('body').prepend('<div class="loading"><div class="spinner">\
						  <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>\
						</div></div>');
	}
	function after_ajax() {
		$('body').find('.loading').remove();
	}
	$(document).ajaxStart(function(){
	   before_ajax();
	 });

	$(document).ajaxComplete(function(){
	   after_ajax();
	 });

});

	function callAjax(url,data, callback = null, file = null){
		// var p_data = true;
		if (file != null) {
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type: 'POST',
	            url: url,
	            contentType: false,
	            processData: false,
	            data: data,
	            success: function (res) {
	                callback(res);
	            }
	        });
		}else{
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type: 'POST',
	            url: url,
	            data: data,
	            success: function (res) {
	                callback(res);
	            }
	        });
	    }
	}

	$('.sharesocial').on('click',function(){
	  $(this).closest('.post-control-button').find('.share-social').animate({
	    width: "toggle"
	  });
	});

	// hung clear filter


 	$('.clear_selectize').click(function(e){
 		e.preventDefault();
 		$(this).closest('.your-profile-menu').find('select.selectize').each(function(){
 			$(this).selectize()[0].selectize.clear();
 		});
 		$(this).closest('.w-select').find('select.selectize').each(function(){
 			$(this).selectize()[0].selectize.clear();
 		});
 	});
 	$('.clear_price').click(function(e){
 		e.preventDefault();
 		$(this).closest('.search_price').find('select.selectpicker').each(function(){
 			$(this).val('default');
			$(this).selectpicker("refresh");
 		});
 		$(this).closest('.search_price').find('input[type=number]').val('');
 	});



	// end hung clear filter


	$('#home-1').each(function(){
		var ipcheckbox = $('#home-1').find('input[type=checkbox]');
		$(this).find('select,input[type=number]').each(function(){
			if($(this).val() != ''){
				$(this).closest('.collapse').addClass('show');
			}
		});

		if(ipcheckbox){
			var checked = $('#home-1').find('input[type=checkbox]:checked');
			if(checked.length > 0){
				checked.closest('.collapse').addClass('show');
			}
		}

	});

	// $('.menu').focusout(function(){
	// 	$('.profile-settings-responsive.open').removeClass('open');
	// }).focusin(function(){
	// 	$('.profile-settings-responsive').addClass('open');
	// });


    // hung download
function downloadAll(files){
    if(files.length == 0) return;
    file = files.pop();
    var theAnchor = $('<a />')
        .attr('href', file[1])
        .attr('download',file[0])
        // Firefox does not fires click if the link is outside
        // the DOM
        .appendTo('body');

    theAnchor[0].click();
    theAnchor.remove();
    downloadAll(files);
}

$('.download-all').on('click', function(){
  var files = [];
  //console.log(files);
  $(this).closest('.alldownload').find('.my-files').each(function(){
    var href = $(this).attr('href');
    var name = $(this).attr('data-name');
    var item = [];
    //console.log(href);
    item.push(name);
    item.push(href);
    // console.log(item);
    files.push(item);
    //console.log(files);
  });
  // files.shift();
  // console.log(files);
  downloadAll(files);
});


    //add custom parsley max files
    window.Parsley.addValidator('maxFile', {
      validateString: function(_value, max, parsleyInstance) {
        if (!window.FormData) {
          alert('You are making all developpers in the world cringe. Upgrade your browser!');
          return true;
        }
        var files = parsleyInstance.$element[0].files;
        if(files.length > max)
          return false;
      },
      requirementType: 'integer',
      messages: {
        en: 'This field max %s files',
      }
    });

function color_pie(){
	var lv = $('.user_lever').find('.pie-chart').attr('data-lv');
	// console.log(lv);
	if(lv >= 1 && lv <= 15){
		$('.user_lever').find('.pie-chart').attr('data-startcolor','#90CB1E');
		$('.user_lever').find('.pie-chart').attr('data-endcolor','#78B10A');
	}
	if(lv >= 16 && lv <= 30){
		$('.user_lever').find('.pie-chart').attr('data-startcolor','#6cd9ff');
		$('.user_lever').find('.pie-chart').attr('data-endcolor','#328cc4');
	}
	if(lv >= 31 && lv <= 45){
		$('.user_lever').find('.pie-chart').attr('data-startcolor','#ff82af');
		$('.user_lever').find('.pie-chart').attr('data-endcolor','#ed5f91');
	}
	if(lv >= 46 && lv <= 60){
		$('.user_lever').find('.pie-chart').attr('data-startcolor','#ab80ff');
		$('.user_lever').find('.pie-chart').attr('data-endcolor','#7f3ffc');
	}
	if(lv >= 61 && lv <= 75){
		$('.user_lever').find('.pie-chart').attr('data-startcolor','#f94646');
		$('.user_lever').find('.pie-chart').attr('data-endcolor','#ff0303');
	}
	if(lv >= 76 && lv <= 90){
		$('.user_lever').find('.pie-chart').attr('data-startcolor','#ffc551');
		$('.user_lever').find('.pie-chart').attr('data-endcolor','#fce221');
	}

}

color_pie();
//////

$(document).on('click', '.reset_file', function(){
  $(this).closest('.form-group').find('input[type=file]').val('');
  $(this).closest('.showfile').find('.material-input').html('');
});


// gioi han ky tu

$('.friend-avatar .friend-about span').each(function(event){
	var max_length = 150;
	if($(this).html().length > max_length){
		var short_content 	= $(this).html().substr(0,max_length);
		var long_content	= $(this).html().substr(max_length);
		$(this).html(short_content+
					 '<a href="#" class="read_more"><br/>More...</a>'+
					 '<span class="more_text" style="display:none;">'+long_content+'</span><br/><a href="#" class="hide_more">Hide...</a>');

		$(this).find('a.read_more').click(function(event){
			event.preventDefault();
			$(this).hide();
			$(this).parents('.friend-about').find('.more_text').show();
			$(this).closest('.friend-about').find('.hide_more').show();
		});
		$(this).find('a.hide_more').click(function(event){
			event.preventDefault();
			$(this).hide();
			$(this).closest('.friend-about').find('.more_text').hide();
			$(this).closest('.friend-about').find('.read_more').show();

		});
	}
});
$('.friend-avatar .friend-about em.skill-dc').each(function(event){
	var max_length = 40;
	if($(this).html().length > max_length){
		var short_content 	= $(this).html().substr(0,max_length);
		var long_content	= $(this).html().substr(max_length);
		$(this).html(short_content+
					 '<a href="#" class="read_more"><br/>More...</a>'+
					 '<span class="more_text" style="display:none;">'+long_content+'</span>'+
					 '<br/><a href="#" class="hide_more">Hide...</a>');

		$(this).find('a.read_more').click(function(event){
			event.preventDefault();
			$(this).hide();
			$(this).closest('em.skill-dc').find('.more_text').show();
			$(this).closest('em.skill-dc').find('.hide_more').show();
		});
		$(this).find('a.hide_more').click(function(event){
			event.preventDefault();
			$(this).hide();
			$(this).closest('em.skill-dc').find('.more_text').hide();
			$(this).closest('em.skill-dc').find('.read_more').show();

		});
	}
});




