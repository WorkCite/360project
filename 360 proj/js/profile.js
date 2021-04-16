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
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}