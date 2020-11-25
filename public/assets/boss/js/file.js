$(document).ready(function () {
  get_data('', '/alchemunity/file/files', 'get', this, function (object, data) {
    console.log(data);
  })  
});