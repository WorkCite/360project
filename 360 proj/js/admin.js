$(function(){
var addnew= $(".add");
var adduser=$(".adduser");
addnew.on('click', function(event){
    adduser.fadeIn(1000);
});

$(window).on('click',function(event){
    if($(event.target).is(adduser)){
      form.fadeOut(1000);
    }
  });
});