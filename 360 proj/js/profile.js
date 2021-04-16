/*var modal = $(".about");
var btn = $(".intro");
var span = $(".aboutclose");
btn.on("click", function (event) {
    if ($(event.target).parents(".item6").length) {
        // modal parag
        var p = $(".aboutparagraph");
        // create nodes
        var form =$('<form class="commentForm" method="POST" action="" enctype="multipart/form-data"></form>').appendTo(div);
        var ta =$('<textarea style="width:200pt; height:50pt; outline:none;" name="aboutInput" placeholder="Add description" oninvalid="this.setCustomValidity(\'Enter your description\')" oninput="this.setCustomValidity(\'\')" required></textarea>')
        .appendTo(form)
        .css({
        resize:'unset',
        border: 'none',
        minwidth: '50pt',
        minheight:'50pt',
        margin:'1em 0 1em 0',
        });
        var btn =$('<button type="submit" name="aboutSubmit">Submit</button>')
        .appendTo(form);
        var inner = $(".innerabout");
        inner.append(div);
      }
});*/

/* intro modal */
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