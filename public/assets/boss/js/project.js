 /**
 * @author khaihoangdev@gmail.com
 * @desc 
 * @return 
 * @time 17h:28/11/2018
 */

 $(document).ready(function () {
  //#region don't know
  // $('#basic-form').parsley();
  // $('#optgroup').multiSelect({  });
  $('#optgroup').multiSelect({
      selectableOptgroup: true,
      selectableHeader: "<input type='text' class='search-input p-1' style='width: 100%;border-top: 1px solid #ccc;border-left: 1px solid #ccc;border-right: 1px solid #ccc;border-bottom: none;border-radius: 2px;' autocomplete='off' placeholder='Searching...'>",
      selectionHeader: "<input type='text' class='search-input p-1' style='width: 100%;border-top: 1px solid #ccc;border-left: 1px solid #ccc;border-right: 1px solid #ccc;border-bottom: none;border-radius: 2px;'autocomplete='off' placeholder='Searching...'>",
      afterInit: function (ms) {
          var that = this,
              $selectableSearch = that.$selectableUl.prev(),
              $selectionSearch = that.$selectionUl.prev(),
              selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
              selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

          that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
              .on('keydown', function (e) {
                  if (e.which === 40) {
                      that.$selectableUl.focus();
                      return false;
                  }
              });

          that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
              .on('keydown', function (e) {
                  if (e.which == 40) {
                      that.$selectionUl.focus();
                      return false;
                  }
              });
      },
      afterSelect: function () {
          this.qs1.cache();
          this.qs2.cache();
      },
      afterDeselect: function () {
          this.qs1.cache();
          this.qs2.cache();
      }
  });

  $('.single-selection').multiselect({
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      templates: {}
  });
  
  //#endregion don't know
  //#region editor description
  $('.summernote').summernote({
      placeholder: "Project description",
      height: 300,
      callbacks: {
          onChange: function (contents, $editable) {
              console.log('onChange:', contents, $editable);
          }
      }
  });
  //#endregion editor description
  //#region deadline
    $(".project-deadline").datepicker({
        format: ' mm/dd/yyyy',
        startDate: '0d'
    });
    //#endregion deadline
  //#region milestone
  let miles = [];
  function Mile() {
    this.mile_name = "";
    this.mile_description = "";
    this.mile_workday = "";
    this.mile_perpay = 0;
    this.mile_content = "";
  }
  //define pattern mile
  let mile_pattern = `<div class="mile-properties">${$('.mile-properties')[0].innerHTML}</div>`;
  // listen change
  let mile_change_handle = function () {
    $('.data-change-handle').change(function () {
      //find parent to take index data in miles
      var id = $(this).parents(".mile-properties").attr("id");
      var attr = this.getAttribute("data-name")
      var value = this.value;
      miles[id][attr] = value;
      _miles = Object.keys(miles).map(e=>miles[e]);
      document.querySelector("input[name=milestones]").value = JSON.stringify(_miles);
    });
    $('.data-change-handle').keyup(function () {
      //find parent to take index data in miles
      var id = $(this).parents(".mile-properties").attr("id");
      var attr = this.getAttribute("data-name");
      var value = this.value;
      miles[id][attr] = value;
      _miles = Object.keys(miles).map(e=>miles[e]);
      document.querySelector("input[name=milestones]").value = JSON.stringify(_miles);
    });
  }
  // handle remove mile
  /**
   * @desc remove action will be excute if miles length > 1
   */
  let mile_remove_handle = function () {
    $(".mile-trash").on("click", function () {
      if (Object.keys(miles).length > 1) {
        var that = $(this).parents(".mile-properties");
        var id = that.attr("id");
        delete miles[id];
        that.remove();
        _miles = Object.keys(miles).map(e=>miles[e]);
        document.querySelector("input[name=milestones]").value = JSON.stringify(_miles);
      }
    })
  }

  let mile_show_form = function (parent = null) {
    if (parent) {
      $(parent).find('input[data-name=mile_name]').attr('readonly', false);
      $(parent).children('.mile-des').removeClass("d-none");
      $(parent).children('.mile-perpay').removeClass("d-none");
      $(parent).children('.mile-content').removeClass("d-none");
      $(parent).children('.mile-time').removeClass("d-none");
      $(parent).children('.mile-show').addClass("d-none");
      $(parent).children('.mile-hide').removeClass("d-none");
    } else {
      $('input[data-name=mile_name]').attr('readonly', false);
      $('.mile-des').removeClass("d-none");
      $('.mile-perpay').removeClass("d-none");
      $('.mile-content').removeClass("d-none");
      $('.mile-time').removeClass("d-none");
      $('.mile-show').addClass("d-none");
    }
  }

  let mile_hide_form = function () {
      $('input[data-name=mile_name]').attr('readonly', true);
      $('.mile-des').addClass("d-none");
      $('.mile-perpay').addClass("d-none");
      $('.mile-content').addClass("d-none");
      $('.mile-time').addClass("d-none");
      $('.mile-hide').addClass("d-none");
      $('.mile-show').removeClass("d-none");
  }

  let mile_add_form = function () {
    mile_hide_form();
    let ele = html_parser(mile_pattern);
    var id = gen_id();
    ele.querySelector(".mile-properties").setAttribute('id', id);
    miles[id] = new Mile();
    var pattern = ele.querySelector("body").innerHTML;
    $('.mile').append(pattern);
    mile_change_handle();
  }

  let mile_show_form_action = function () {
    $('.mile-show').on('click', function () {
      mile_hide_form();
      mile_show_form($(this).parent())
    });
  }

  let mile_hide_form_action = function () {
    $('.mile-hide').on('click', function () {
      mile_hide_form();
    });
  }

  $('.mile-add').on('click', function () {
    
    mile_hide_form();
    mile_add_form();
    mile_show_form_action();
    mile_hide_form_action();
    mile_change_handle();
    mile_remove_handle();
  })
  //#region run on startup
  var _id = gen_id();
  document.querySelector(".mile-properties").setAttribute("id", _id);
  miles[_id] = new Mile();
  mile_show_form_action();
  mile_hide_form_action();
  mile_change_handle();
  mile_remove_handle();
  //#endregion run on startup
  //#endregion milestone
  //#region address select handle
  /**
  * @author khaihoangdev@gmail.com
  * @desc get state
  * @time 09h:06/12/2018
  */
  //#region country select handle
  let add_default_option = function (object) {
    var option = document.createElement("option");
    option.text = "None";
    option.setAttribute("selected", true);
    object.options.add(option);
  }
  $("select[name=address_country]").change(function () {
    var data = { "_country": this.value };
    var state_link = document.querySelector("input[name=state_link").value; 
    var that = this.parentElement.parentElement.nextElementSibling.querySelector("select");
    var that_that = this.parentElement.parentElement.nextElementSibling.nextElementSibling.querySelector("select");
    that.city = that_that;
    get_data(data, state_link, 'POST', that, function (object, data) {
        console.log(data);
      object.innerHTML = "";
      add_default_option(object);
      data.states.forEach(function (e) {
        var option = document.createElement("option");
        option.text = e.state;
        option.value = e.id;
        object.options.add(option);
      });
      object.city.options.length=0;
        add_default_option(object.city);
      data.cities.forEach(function (e) {
        var option = document.createElement("option");
        option.text = e.city;
        option.value = e.id;
        object.city.options.add(option);
      });
      $('.single-selection').multiselect("rebuild");
    });
  });
  //#endregion country select handle
  //#region state select handle
  $("select[name=address_state]").change(function () { 
    var country = document.querySelector("select[name=address_country]").value;
    var data = {
      "_state": this.value,
      "_country": country
    };
    var state_link = document.querySelector("input[name=city_link").value; 
    var that = this.parentElement.parentElement.nextElementSibling.querySelector("select");
    get_data(data, state_link, 'POST', that, function (object, data) {
      object.innerHTML = "";
      add_default_option(object);
      data.cities.forEach(function (e) {
        var option = document.createElement("option");
        option.text = e.city;
        option.value = e.id;
        object.options.add(option);
      });
      $('.single-selection').multiselect("rebuild");
    });
  });
  //#endregion state select handle
  //#endregion address select handle
  /**
  * @author khaihoangdev@gmail.com
  * @desc handle for questions pack
  * @time 14h:07/12/2018
  */
  //#region question
  let questions = [];
  function Question() {
    this.question = "";
    this.option_a = "";
    this.option_b = "";
    this.option_c = "";
    this.option_d = "";
    this.correct_option = "";
  }
   //define pattern question
  let question_pattern = `<div class="_question">${$('._question')[0].innerHTML}</div>`;

    // listen change
    let question_change_handle = function () {
      $('.question-change-hanlde').change(function () {
        //find parent to take index data in questions
        var id = $(this).parents("._question").attr("id");
        var attr = this.getAttribute("data-name")
        var value = this.value;
        questions[id][attr] = value;
        _questions = Object.keys(questions).map(e=>questions[e]);
        document.querySelector("input[name=questions]").value = JSON.stringify(_questions);
      });
      $('.question-change-hanlde').keyup(function () {
        //find parent to take index data in miles
        var id = $(this).parents("._question").attr("id");
        var attr = this.getAttribute("data-name");
        var value = this.value;
        questions[id][attr] = value;
        _questions = Object.keys(questions).map(e=>questions[e]);
        document.querySelector("input[name=questions]").value = JSON.stringify(_questions);
      });
    }
    // handle remove mile
    /**
     * @desc remove action will be excute if miles length > 1
     */
    let question_remove_handle = function () {
      $(".question-trash").on("click", function () {
        if (Object.keys(questions).length > 1) {
          var that = $(this).parents("._question");
          var id = that.attr("id");
          delete questions[id];
          that.remove();
          _questions = Object.keys(questions).map(e=>questions[e]);
          document.querySelector("input[name=questions]").value = JSON.stringify(_questions);
        }
      })
    }
  
    let question_show_form = function (parent = null) {
      if (parent) {
        $(parent).find('textarea[data-name=question]').attr('readonly', false);
        $(parent).children('.options').removeClass("d-none");
        $(parent).children('.question-hide').removeClass("d-none");
        $(parent).children('.question-show').addClass("d-none");
      } else {
        question_hide_form();
      }
    }
  
    let question_hide_form = function () {
        $('textarea[data-name=question]').attr('readonly', true);
        $('.options').addClass("d-none");
        $('.question-hide').addClass("d-none");
        $('.question-show').removeClass("d-none");
    }
  
    let question_add_form = function () {
      question_hide_form();
      let ele = html_parser(question_pattern);
      var id = gen_id();
      ele.querySelector("._question").setAttribute('id', id);
      questions[id] = new Question();
      var pattern = ele.querySelector("body").innerHTML;
      $('._questions').append(pattern);
      question_change_handle();
    }
  
    let question_show_form_action = function () {
      $('.question-show').on('click', function () {
        question_hide_form();
        question_show_form($(this).parent())
      });
    }
  
    let question_hide_form_action = function () {
      $('.question-hide').on('click', function () {
        question_hide_form();
      });
    }
  
    $('.question-add').on('click', function () {
      
      question_hide_form();
      question_add_form();
      question_show_form_action();
      question_hide_form_action();
      question_change_handle();
      question_remove_handle();
    })
      //#region run on startup
      var _id = gen_id();
      document.querySelector("._question").setAttribute("id", _id);
      questions[_id] = new Question();
      question_show_form_action();
      question_hide_form_action();
      question_change_handle();
      question_remove_handle();
      //#endregion run on startup

  //#endregion question
  //#region file select
  // let file_click_event_init = function () {
  //   $(".file-select").on("click", function () {
  //     var data = [];
  
  //     $(this).parent().toggleClass("highlight-select");
  //     $(".image-contain.highlight-select").each(function () {
  //       console.log(this);
  //       data.push($(this).find("a").attr("data-loc"));
  //     })
  //     $("input[name=file_attached]").val(JSON.stringify(data));
  //   })  
  // }
  file_click_event_init();
  //#endregion file select
  //#region modal handle closing
 let gen_file_selected = function () {
     $(".file-attached").html('');
     var _files = $("input[name=file_attached]").val();
     JSON.parse(_files).forEach(function (e) {
         var text = $(`.image-contain a[data-id=${e}]`).find('.file-name p').text();
         $(".file-attached").append(`
  <div class="alert alert-success alert-dismissible" role="alert" data-file-name="${text}"><i class="fas fa-file"></i> ${text}</div>
  `);
     })
 }
  $("#largeModal").on("hidden.bs.modal", gen_file_selected);

  //#endregion modal handle closing
      let metas = {};
      $("input[types=meta]").on('change', function(){
        metas[this.getAttribute("key")] = this.value;
        document.querySelector("input[name=metas]").value = JSON.stringify(metas);
      });

     var files = $("input[name=file_attached]").val();
     var files = files?JSON.parse(files):[];
     $(".image-contain").each(function () {
         if(files.includes($(this).find("a").attr("data-id"))){
             $(this).addClass('highlight-select');
         }
     })
     gen_file_selected();
});
  

let file_click_event_init = function () {
    $(".file-select").on("click", image_click_event);  
  }
let image_click_event = function () {
    var data = [];
    $(this).parent().toggleClass("highlight-select");
  $(".image-contain.highlight-select").each(function () {
      data.push($(this).find("a").attr("data-id"));
  });
    $("input[name=file_attached]").val(JSON.stringify(data));
  }
  //#region dropzone

/**
* @author khaih
* @email khaihoangdev@gmail.com
* @desc Upload file to server
* @return 
* @time 08h:10/01/2019
* @status Finish
* @requires 
  [@n int number of file,
  [@_represents {} representation for file,
  [@_cover string file container when server response]]]
*/
let drop_sync = function (n = 1, _represents = null, _cover = null) {
  _represents = _represents ? _represents : {
    "pdf": `<div class="icon"><i class="fas fa-file-pdf text-danger"></i></div>`,
    "doc": `<div class="icon"><i class="fas fa-file-word"></i></div>`,
    "docx": `<div class="icon"><i class="fas fa-file-word"></i></div>`,
    "xls": `<div class="icon"><i class="fas fa-chart-bar text-warning"></i></div>`,
    "xlsx": `<div class="icon"><i class="fas fa-chart-bar text-warning"></i></div>`,
    "png": `<div class="image"><img src="[imagesource]" alt="img" class="img-fluid"/></div>`,
    "jpeg": `<div class="image"><img src="[imagesource]" alt="img" class="img-fluid"/></div>`,
    "jpg":`<div class="image"><img src="[imagesource]" alt="img" class="img-fluid"/></div>`
  }
  _cover = _cover ? _cover : `<div class="col-lg-2 col-md-3 col-sm-12 pl-1 pr-1">
                  <div class="card file_manager">
                    <div class="file m-1 image-contain highlight-select">
                      <a href="javascript:void(0);" data-id="[fileid]" class="file-select">
                        [filerep]
                        <div class="file-name">
                          <p class="m-b-5 text-muted">[filename]</p>
                          <small>[filesize] mb <span class="date text-muted">[filetime]</span></small>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>`;

      Dropzone.options.myDropzone ={
      paramName: 'file',
      maxFilesize: 20, // MB
      maxFiles: n,
      acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.docx,.xls,.xlsx,.csv,.mp4",
      init: function () {
          that = this;
          this.on("success", function (file, response) {
            if (response.status == "success") {
              var data = response.info;
              console.log(data);
              __cover = _cover;
              __cover = __cover.replace(/\[filerep\]/, _represents[data.extension].replace(/\[imagesource\]/,data.url));
              __cover = __cover.replace(/\[fileid\]/, data.id);
              __cover = __cover.replace(/\[filename\]/, data.name);
              __cover = __cover.replace(/\[filesize\]/, data.size);
              __cover = __cover.replace(/\[filetime\]/, data.time);
              $(".media-container").append(__cover);
              $(".file-select").last().on("click", image_click_event);

              //auto add
              $(".image-contain.highlight-select").each(function () {
                data.push($(this).find("a").attr("data-id"));
            });
            }
          });
      }
    }
  }
drop_sync(20);
  //#endregion dropzone
