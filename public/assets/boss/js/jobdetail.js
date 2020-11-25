/**
* @author khaih
* @email khaihoangdev@gmail.com
* @desc just for jobdetail
* @return
* @status Finish
* @created 16h:28/01/2019
* @updated
*/
window.onload = function () {

  //#region bid
  class Bid {
    constructor() {
      this.id;
      this.bid_id;
      this._project;
      this.price = 0;
      this.workday = 0;
      this.title = '';
      this.description = '';
      this.file = null;
      this.miles = [];
      this.skill = [];
      this.file_attached_delete = [];
    }
    get arr_miles() {
      var arr = Object.keys(this.miles).map(key => this.miles[key]);
      return arr;
    }
    get info() {
      return {
        "id": this.id,
        "bid_id": this.bid_id,
        "_project": this._project,
        'price': this.price,
        'workday': this.workday,
        'title': this.title,
        'description': this.description,
        // 'file': this.file,
        'skill': this.skill,
        'file_attached_delete': this.file_attached_delete,
        // 'miles': this.arr_miles
      }
    }
  }
  //#endregion bid
  //#region mile
  class Mile {
    constructor(id) {
      this.id = id;
      this.name = '';
      this.workday = 0;
      this.perpay = 0;
      this.description = '';
    }

    get info() {
      return {
        "id": this.id,
        "name": this.name,
        "workday": this.workday,
        "perpay": this.perpay,
        "description": this.description
      }
    }
  }
  // get mile patern
  // let mile_patern = _('.mile-patern');

  // modal popup handle
  let mile;
  $('.a-c-mile').on('click', function () {

    mile = new Mile(gen_id());
    __('.c-mile').forEach(function (item, index) {
      item.addEventListener('change', function () {
        mile[this.getAttribute('data-key')] = this.value;
      });
    });
  });
  /*_('.add-mile').addEventListener('click', function () {
    // console.log($('.task_form').parsley().isValid());
    if ( $('.task_form').parsley({ excluded: ".d-none *"}).isValid() != true ){
      $('.task_form').parsley({ excluded: ".d-none *"}).validate();
      return false;
    }
    // bid.miles[mile.id] = mile;
    var _mile_patern = mile_patern.cloneNode(true);
    _mile_patern.classList.remove('d-none');
    _mile_patern.id = mile.id;
    var _toggle = '_' + mile.id;
    _mile_patern.querySelector('.collapsed').setAttribute('href', '#' + _toggle);
    _mile_patern.querySelector('.collapsed').setAttribute('aria-controls', _toggle);
    _mile_patern.querySelector('.collapse').id = _toggle;
    _mile_patern.querySelector('.collapse').setAttribute('aria-labelledby', _toggle);
    _mile_patern.querySelector('.mile-title').innerText = mile.name;
    _mile_patern.querySelector('.mile-name').value = mile.name;
    _mile_patern.querySelector('.mile-workday').value = mile.workday;
    _mile_patern.querySelector('.mile-perpay').value = mile.perpay;
    _mile_patern.querySelector('.mile-description').innerHTML = mile.description;

    _('.miles').appendChild(_mile_patern);

    // change mile name
    _('.mile-name').addEventListener('input', function () {
      var val = this.value;
      _parents(this, 'collapse').previousElementSibling.querySelector(".mile-title").innerText = val;
    });

    $(_parents(this, 'modal-target')).modal('toggle');
    // console.log(bid.miles);
  });
  __('.upload-photo-item').forEach(function (e,i) {
    e.addEventListener('click', function () {

      $(_parents(this,'modal-target')).modal('toggle');
    });
  });*/


  // submit bid
 $('.submit-bid').on('click', function (e) {
    e.preventDefault();
    var form = $(this).closest('form');

    var budget = form.find('input.replace_budget').val();
    budget = budget.replace(',','');
    budget = parseFloat(budget);
    form.find('input.replace_budget').val(budget);

    var formElements = form.parsley({ excluded: ".d-none *"});
    console.log(formElements.isValid());
    if ( formElements.isValid() != true ){
      formElements.validate();
      return false;
    }

    // define new bid
    let bid = new Bid;
    bid.bid_id = form.find('input[name=bid_id]').val();
    bid._project = form.find('input[name=_project]').val();
    bid.file_attached_delete = form.find('input[name=file_attached_delete]').val();
    // set value for bid info
    $('.c-biding').each(function (item, index) {
      name = $(this).attr('name');
      bid[name] = this.value;
    });

    //milestone value
    miles = {};
    form.find('.mile_property:not(.d-none)').each(function (item, index) {
      mile = new Mile();
      var _mile = $(this).find('.props').attr('id');
      miles[_mile] = {};
      $(this).find('input,textarea,select').each(function (item, i) {
        var name = $(this).attr('name');
        var type = name.substring(
            name.lastIndexOf("[") + 1,
            name.lastIndexOf("]")
        );
        var val = $(this).val();
        miles[_mile][type] = val;
      });
    });
    // bid.miles = JSON.stringify(miles);

    val = form.find('select[name=skill]').val();
    val_id = form.find('input[name=id]').val();
    bid.skill = val;
    bid.id = val_id;

    var form_data = new FormData();

    $.each(miles, function(i, mile) {
      $.each( mile, function( key, value ) {
        form_data.append('miles['+i+']['+key+']', value);
      });
    });
    $.each( bid.info, function( key, value ) {
      form_data.append(key, value);
    });
    $.each(form.find("input[name='files']")[0].files, function(i, file) {
        form_data.append('files[]', file);
    });
    // console.log(form_data);
    url = $('input[name=bid_create]').val();
    callAjax(url,form_data, function(res){
        if(res.error == false){
             jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
             if (res.redirect != ''){
              setTimeout(function(){window.location.replace(res.redirect);} , 2000);
             }else {
              setTimeout(function(){window.location.reload();} , 2000);
             }
        }else{
            if(!$.isPlainObject(res.message)){
              jQuery.sticky(res.message, {classList: 'important', speed: 200, autoclose: 5000});
            }else {
             $.each(res.message, function(key,value) {
                jQuery.sticky(value[0], {classList: 'important', speed: 200, autoclose: 5000});
             });
            }
        }
    },true);
  });

  $(document).on('click', '.file-select', function () {
    var target = $('input[name=profile_images]:checked')
    id_media = target.val();
    var cloner = target.closest('div').find('.image').html();
    $('input[name=file]').val(id_media);
    $('.output_files').html(cloner);
    $(this).closest('.modal-target').modal('toggle');
  });










};
