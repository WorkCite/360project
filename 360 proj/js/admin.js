$(function () {
  var addnew = $(".add");
  var adduser = $(".adduser");
  var close = $(".close");

  addnew.on("click", function (event) {
    adduser.fadeIn(1000);
  });

  $(window).on("click", function (event) {
    if ($(event.target).is(adduser)) {
      adduser.fadeOut(1000);
    }
  });

  close.on("click", function () {
    adduser.fadeOut(1000);
  });

  /* delete user */
  var deleteform =$('.deleteuser');
  var deleteBtn = $('.btn_delete');
  var cls = $('.cls');
  deleteBtn.on('click',function(){
    deleteform.fadeIn(1000);
  })
});
