$('body').on('submit', '#login', function(e){
  e.preventDefault();
  loader(true);
  var form = $("#login");
  $.ajax({
    type: "post",
    url:  '/Control/Auth/login_procces',
    data: form.serialize(),
    success : function(response){
      loader(false);
      var data = JSON.parse(response);
      if (data.status == 'success') {
        toastr["success"](data.msg);
        location.reload();
      }
      else{
        toastr["error"](data.msg);
      }
    },
    error : function(err){
      Swal.fire({
          title: 'Sistem Xətası!',
          html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
          type: 'error'
      });
    }
  });
  return false;
});