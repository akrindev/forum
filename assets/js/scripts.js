$(document).ready(function(){

   $("#comment_form").bind("submit", function (event) {
        event.preventDefault();
        if ($("#comment_text").val() == "")
        {
            alert("Please enter your comment");
            return false;
        }
     
     
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>diskusi/komentar",
            data: $('#comment_form').serialize(),
            dataType: "html",
            success: function (comment) {
            alert('x');
            },
          
        });
        
});