$('.description-project-more .friend-about span').each(function(event){
  var max_length = 150;
  if($(this).html().length > max_length){
    var short_content 	= $(this).html().substr(0,max_length);
    var long_content	= $(this).html().substr(max_length);
    $(this).html(short_content+
      '<a href="#" class="read_more"><br/>More...</a>'+
      '<span class="more_text" style="display:none; font-size: 14px;">'+long_content+'</span><br/><a href="#" class="hide_more">Hide...</a>');

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

$('.milestone-description .friend-about span').each(function(event){
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
