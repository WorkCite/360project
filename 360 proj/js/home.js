$(function(){
/* modal */
  var modal = $(".modal");
  var btn = $(".post");
  var span = $('.close');
  var block = $('.postBlock');
  btn.on('click', function(event){
   /*  var modal1 = $('<div class="modal" title="Basic dialog"></div>');
    var content = $(' <div class="modal-content"></div>');
    var close = $('<span class="close">&times;</span>');
    var par = $('<div class="paragraph"></div>')
    content.append(close);
    content.append(par);
    modal1.append(content);
    modal1.insertBefore('body'); */
    if($(event.target).parents('.postBlock').length){
    // modal parag
    var p = $('.paragraph');
    // post block content
    var str = $(event.target).parents('.postBlock').find('.content').text();
    // post image
    var str2 = $(event.target).parents('.postBlock').find('.image');
    // create nodes
    var content =$('<p>'+str+'</p>')
    content.css({
      color:'black',
    });
    p.append(content);
    p.append(str2.clone());
    modal.fadeIn(1000);
  }
  });

  span.on('click',function(){
    modal.fadeOut(1000);  
    $('.paragraph').find('p').remove();
    $('.paragraph').find('img').remove();
  });

  $(window).on('click',function(event){
    if($(event.target).is(modal)){
      modal.fadeOut(1000);
      $('.paragraph').find('p').remove();
      $('.paragraph').find('img').remove();
    }
  });
});
/* window.addEventListener('load', function(){
  var modal = document.getElementsByClassName("modal")[0];

  // Get the button that opens the modal
  var btn = document.getElementsByClassName("post")[0];
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks on the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}); */