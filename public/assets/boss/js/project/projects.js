$(document).ready(function () {
  //#region init datatable
    $(".js-basic-example").DataTable({
      "paging":false,
      "ordering": false,
  });
    //#endregion init datatable
  //#region delete
  $(".delete-project").on("click",delete_project);
  function delete_project(){
      var link = document.querySelector("input[name=delete_link]").value;
      var data = {
          'id':this.getAttribute("id")
      }

      showConfirmMessage(data,link,"POST",this,function(ele){
          $(ele).parents('tr').remove();
      });
  }  
  //#endregion delete
  //#region filter
  $("button[action=filter]").click(function () {
    
    var cmd = this.getAttribute("cmd");
    var val = this.getAttribute("val");
    var query = `?action=filter&cmd=${cmd}&val=${val}`
    var url = window.location.href + query;
    window.location = query;
    // toggle value

  });
  let toggle = function (ob) {
    var query = new URLSearchParams(window.location.search);
    console.log(query);
    if(query.get('action')=='filter')
      if (query.get("val") == 'desc')
        document.querySelector(`button[cmd=${query.get('cmd')}]`).setAttribute("val", "asc");
      else
        document.querySelector(`button[cmd=${query.get('cmd')}]`).setAttribute("val", "desc");
    return false;
  }
  toggle();
  //#endregion filter
})
