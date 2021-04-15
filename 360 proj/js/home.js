$(function () {
  /* modal */
  var modal = $(".modal");
  var btn = $(".post");
  var span = $(".close");
  btn.on("click", function (event) {
    /*  var modal1 = $('<div class="modal" title="Basic dialog"></div>');
    var content = $(' <div class="modal-content"></div>');
    var close = $('<span class="close">&times;</span>');
    var par = $('<div class="paragraph"></div>')
    content.append(close);
    content.append(par);
    modal1.append(content);
    modal1.insertBefore('body'); */
    if ($(event.target).parents(".postBlock").length) {
      // modal parag
      var p = $(".paragraph");
      // post block content
      var str = $(event.target).parents(".postBlock").find(".content").text();
      // post image
      var str2 = $(event.target).parents(".postBlock").find(".image");
      // create nodes
      var content = $("<p>" + str + "</p>");
      content.css({
        color: "black",
      });
      p.append(content);
      p.append(str2.clone());
      modal.fadeIn(500);
    }
  });

  span.on("click", function () {
    modal.fadeOut(500);
/*     $('.openComment').remove();
 */    $('.commentForm').remove();
    $(".paragraph").find("p").remove();
    $(".paragraph").find("img").remove(); 
    $(".openComment").css('display','block');

  });

  $(window).on("click", function (event) {
    if ($(event.target).is(modal)) {
      modal.fadeOut(500);
/*     $('.openComment').remove();
 */    $('.commentForm').remove();
    $(".paragraph").find("p").remove();
    $(".paragraph").find("img").remove(); 
    $(".openComment").css('display','block');

    }
  });
  /* newpost */
  var close = $(".closeImage");
  var form = $(".newpost-form");
  var span2 = $(".closeform");
  close.on("click", function () {
    $(".uploadedImage").attr("src", "");
    $(".uploadedImage").css("display", "none");
    close.css("display", "none");
  });
  $(".newpost").on("click", function () {
    form.fadeIn(500);
  });
  span2.on("click", function () {
    form.fadeOut(500);
    $(".uploadedImage").attr("src", "");
    close.css("display", "none");
    $(".uploadedImage").css("display", "none");
  });
  $(window).on("click", function (event) {
    if ($(event.target).is(form)) {
      form.fadeOut(500);
      $(".uploadedImage").attr("src", "");
      close.css("display", "none");
      $(".uploadedImage").css("display", "none");
      
    }
  });

  $(".openComment").on("click", function () {
    $(".openComment").css('display','none');
/*     <form class="commentForm"><textarea name="commentInput" placeholder="Add description" oninvalid="this.setCustomValidity(\'Enter your description\')" oninput="this.setCustomValidity(\'\')" required></textarea><button type="submit" name="innerSubmit">Submit</button></form>
 */    
    var div = $(
      '<div class="innerBlock"></div>'
    ).css('display','block');
    var form =$('<form class="commentForm"></form').appendTo(div);
    var ta =$('<textarea style="width:200pt; height:50pt; outline:none;" name="commentInput" placeholder="Add description" oninvalid="this.setCustomValidity(\'Enter your description\')" oninput="this.setCustomValidity(\'\')" required></textarea>')
      .appendTo(form)
      .css({
      resize:'unset',
      border: 'none',
      minwidth: '50pt',
      minheight:'50pt',
      margin:'1em 0 1em 0',
    });
    var btn =$('<button type="submit" name="innerSubmit">Submit</button>')
      .appendTo(form);
    var inner = $(".innerComment");
    inner.append(div);
  });


});
