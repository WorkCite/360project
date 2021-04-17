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
      var author =$(event.target).parents(".postBlock").find(".author");
      var p = $(".paragraph");
      // post block content
      var str = $(event.target).parents(".postBlock").find(".content").text();
      // post image
      var str2 = $(event.target).parents(".postBlock").find(".image");
      //post postid
      var postId = $(event.target).parents(".postBlock").find(".idp").text();
      console.log("id: "+postId);
      
      // create nodes
      var content = $("<p>" + str + "</p>");
      content.css({
        color: "black",
      });
      var intid = $("<p class='tempid'>" + postId + "</p>");
      intid.css({
        color: "black",
      });
      p.append(content);
      p.append(intid);
      p.append(str2.clone());
      modal.fadeIn(500);
    }
  });

  span.on("click", function () {
    modal.fadeOut(500);
/*     $('.openComment').remove();
 */    
    $('.commentForm').remove();
    $(".paragraph").find("p").remove();
    $(".paragraph").find("img").remove(); 
    $(".modal").find(".author").remove(); 
    $(".openComment").css('display','block');

  });

  $(window).on("click", function (event) {
    if ($(event.target).is(modal)) {
      modal.fadeOut(500);
/*     $('.openComment').remove();
 */    
    $(".modal").find(".author").remove(); 
    $('.commentForm').remove();
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
    var form =$('<form onsbumit="showCom(this.value)" class="commentForm" method="POST" action="" enctype="multipart/form-data"></form>').appendTo(div);
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
  /* newcomment */

});
function showCom(str) {
  if (str == "") {
    return console.log("There is no comment in this block");
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("commentlist").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST","home.php?q="+postId,true);
    xmlhttp.send();
  }
  $('.btn').on('click',function(){
    var clickBtnValue = $(this).val();
    var ajaxurl = 'filter.php',
    data =  {'action': clickBtnValue};
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        alert("action performed successfully");
    });
  });
}
