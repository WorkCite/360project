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
      modal.fadeIn(1000);
    }
  });

  span.on("click", function () {
    modal.fadeOut(1000);
    $(".paragraph").find("p").remove();
    $(".paragraph").find("img").remove();
  });

  $(window).on("click", function (event) {
    if ($(event.target).is(modal)) {
      modal.fadeOut(1000);
      $(".paragraph").find("p").remove();
      $(".paragraph").find("img").remove();
    }
  });
  /* newpost */
  var close = $(".closeImage");
  var form = $(".newpost-form");
  var span2 = $(".closeform");
  close.on("click", function () {

    $(".uploadedImage").attr('src',"");  
    $(".uploadedImage").css('display','none');
    close.css('display','none');
  });
  $(".newpost").on("click", function () {
    form.fadeIn(1000);
  });
  span2.on("click", function () {
    form.fadeOut(1000);
    $(".uploadedImage").attr('src',"");  
    close.css('display','none');
    $(".uploadedImage").css('display','none');


  });
  $(window).on("click", function (event) {
    if ($(event.target).is(form)) {
      form.fadeOut(1000);
      $(".uploadedImage").attr('src',"");  
      close.css('display','none');
      $(".uploadedImage").css('display','none');

    }
  });
});
