$(function(){
    var modal = $('.introduction');
    var intro = $('.intro');
    var save =$('.save');
    var cls = $('.cls');
    intro.on('click',function(){
        modal.fadeIn(500);
    });
    $(window).on('click',function(event){
        if($(event.target).is(modal)){
          modal.fadeOut(500);
        }
      });
    cls.on('click',function(){
        modal.fadeOut(500);
    });
    save.on('click',function(){
        modal.fadeOut(500);
    });
    
});