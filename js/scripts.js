$(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
   action = 'like';
  } else if($clicked_btn.hasClass('fa-thumbs-up')){
   action = 'unlike';
  }
  $.ajax({
   url: 'index.php',
   type: 'post',
   data: {
    'action': action,
    'banner_id': post_id
   },
   success: function(data){
    res = JSON.parse(data);
    if (action == "like") {
     $clicked_btn.removeClass('fa-thumbs-o-up');
     $clicked_btn.addClass('fa-thumbs-up');
    } else if(action == "unlike") {
     $clicked_btn.removeClass('fa-thumbs-up');
     $clicked_btn.addClass('fa-thumbs-o-up');
    }
    // display the number of likes and dislikes
    document.getElementById('voto-'+post_id).textContent= res.likes + " voto(s)";

   }
  });  

});


});