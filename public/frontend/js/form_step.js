$(function () {
  $('.basic-click').click(function(event) {
    $('.basic').css('display', 'block');
    $('.advanced').css('display', 'none');
  
  });
  $('.advanced-click').click(function() {
    console.log("vào q");
    $('#remove-basic').removeClass('step2-basic-height');
    $('.basic').css('display', 'none');
    $('.advanced').css('display', 'block');
  });
  var form = $('.addnew-form');
  var $sections = $('.form-section');
  var $progress = $('.progress-step .step');
  var $step_click = 1;
  function navigateTo(index) {
    // Mark the current section with the class 'current'
    console.log(index);
    $('html, body').animate({scrollTop: $('#new-project').offset().top - 50}, 1000);
    if (index===0){
      $('.click-step-1').trigger('click');
    }
    if (index===1){
      $('.click-step-2').trigger('click');
      $('.basic-click').trigger('click');
      $('.add-basic').addClass('active');
    }
    if (index===2){
      $('.click-step-3').trigger('click');
    }
    $sections
      .removeClass('current')
      .eq(index)
        .addClass('current');
    // Show only the navigation buttons that make sense for the current section:
    $('.form-navigation .previous').toggle(index > 0);
    var atTheEnd = index >= $sections.length - 1;
    $('.form-navigation .next').toggle(!atTheEnd);
    $('.form-navigation [type=submit]').toggle(atTheEnd);
    $progress
      .removeClass('current')
      .eq(index)
        .addClass('current')
      .prev().addClass('is-done');
  }

  function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter('.current'));
  }

  // Previous button is easy, just go back
  $('.form-navigation .previous').click(function() {
    navigateTo(curIndex() - 1);
  });
  // Next button goes forward iff current block validates
  $('.form-navigation .next').click(function() {
    form.parsley({ excluded: ".d-none *"}).whenValidate({
      group: 'block-' + curIndex()
    }).done(function() {
      if(curIndex()==0){
        if(nextstep()){
          navigateTo(curIndex() + 1);
        }else{
          swal("Please check Set Preferences!", {
            timer: 1500,
          });
        }
      }else if(curIndex()==1){
        if(check_milestone()){
          navigateTo(curIndex() + 1);
        }else{
          swal("Total percent must 100%. Left "+left+"% complete milestones", {
            timer: 1500,
          });
        }
      }
      // if(check_milestone() && nextstep()){
      //   navigateTo(curIndex() + 1);
      // }else{
      //   alert(curIndex());
      //   swal("Please check Set Preferences!", {
      //     timer: 1500,
      //   });
      // }
      beforePreview();
      $step_click++;
    //console.log(form.serialize());
    });
    // console.log(form.serialize());
  });

  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
  $sections.each(function(index, section) {
    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
  });
  navigateTo(0); // Start at the beginning
  $(document).on('click', '.click-step-1', function () {
    navigateToClick(0);
  });
  $(document).on('click', '.click-step-2', function () {
    if ($step_click >=2){
      console.log($step_click, "step2");
      navigateToClick(1);
    }
  });
  $(document).on('click', '.click-step-3', function () {
    if ($step_click >=3){
      console.log($step_click, "step2");
      navigateToClick(2);
    }
  });
  function navigateToClick(index) {
    $sections
      .removeClass('current')
      .eq(index)
      .addClass('current');
    // Show only the navigation buttons that make sense for the current section:
    $('html, body').animate({scrollTop: $('#new-project').offset().top - 50}, 1000);
    $('.form-navigation .previous').toggle(index > 0);
    var atTheEnd = index >= $sections.length - 1;
    $('.form-navigation .next').toggle(!atTheEnd);
    $('.form-navigation [type=submit]').toggle(atTheEnd);
    $progress
      .removeClass('current')
      .eq(index)
      .addClass('current')
      .prev().addClass('is-done');
  }
});
