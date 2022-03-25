$(document).ready(function(){
    $('#hashtag').keyup(function(){
        var hashtagName = $(this).val();
        if(hashtagName != ""){
            $.ajax({
                
                url:"hashTagSuggest.php",
                method:"POST",
                data:{hashtagName:hashtagName},
                success:function(data){
                    
                    $('#hashtagLish').fadeIn();
                    $('#hashtagLish').html(data);
                    
                }
                
            });
        }
        
        $(document).on('click', 'li', function(){
            $('#hashtag').val($(this).text());
            $('#hashtagLish').fadeOut();
            
        });
        
});
                
});
function publish(){
  var content = document.getElementById("bg-dev-color").innerHTML;
  var hashtag = document.getElementById("hashtag").value;
  if(content != ""){
     var bgColorVal = document.getElementById("bg-dev-color").style.backgroundColor;
      $.post('publish-save.php', {postContent:content, posthashtag:hashtag, bgcolorval:bgColorVal}, 
      function(data){
      //document.getElementById("success-alert").innerHTML = data;
      NoticeZ ( 'Notification' , 'Quote Published',{
           // top left
          // top right
	  // bottom left
	  // bottom right
	  position: "top right",
          // auto close after 3 seoncs
	  time: 5000,
          canClose:true
          // in pixels
	  //padding: 10
          // is closeable?
	  //closeAble: true,
	  // shows an image inside the notification
	  //image: ''
           });
      localStorage.removeItem('editedContent');
  });
  }else{
      alert("you Cannot Publish Empty Space")
  }
}

function save_tag(){
    var tname = document.getElementById('tagName').value;
    var tdes = document.getElementById('tagDes').value;
    
    if(tname != "" && tdes != ""){
    $.post('saveTag.php', {postTagname:tname,postTagdes:tdes}, function(data){
        
        document.getElementById('alert').innerHTML = data;
        
    });
    
    }else{
        
        alert("Enter Tag Name and Description");
    }
}

$(document).on('click', '.action-button', function(){
    var sender_id = $(this).attr('data-sender');
    var action = $(this).attr('action-data');
    var hashtag = $(this).attr('hashtag-data');
    $.ajax({
        url:'followData.php',
        method:'POST',
        data:{sender_id, action:action, hashtag:hashtag},
        success:function(data){
           if(data == 'follow'){
           var sound = new Audio();
           sound.src="./deduction.mp3"; 
           sound.play();
            NoticeZ ( 'Notification' , 'Following',{
           // top left
          // top right
	  // bottom left
	  // bottom right
	  position: "top right",
          // auto close after 3 seoncs
	  time: 5000,
          canClose:true
          // in pixels
	  //padding: 10
          // is closeable?
	  //closeAble: true,
	  // shows an image inside the notification
	  //image: ''
           });
           
           
           }else if(data == 'unfollow'){
           var sound = new Audio();
           sound.src="./deduction.mp3"; 
           sound.play();
               NoticeZ ( 'Notification' , 'Unfollowing',{
           // top left
          // top right
	  // bottom left
	  // bottom right
	  position: "top right",
          // auto close after 3 seoncs
	  time: 5000,
          canClose:true
          // in pixels
	  //padding: 10
          // is closeable?
	  //closeAble: true,
	  // shows an image inside the notification
	  //image: ''
           });
           
           }
           
           ////setInterval(function(){
              // $('.post-dev').load('followData.php').fadeIn('slow');
           //}, 1000);
        }
    });
});

$(document).on('click', '.action-like', function(){
    var likeby = $(this).attr('likeby');
    var like_data = $(this).attr('like-data');
    var quoteID = $(this).attr('quote-data');
    $.ajax({
        url:'like.php',
        method:'POST',
        data:{likeby:likeby, like_data:like_data, quoteID:quoteID},
        success:function(data){
            if(data =="like"){
           var sound = new Audio();
           sound.src="./deduction.mp3"; 
           sound.play();
             NoticeZ ( 'Notification' , 'Quote like',{
           // top left
          // top right
	  // bottom left
	  // bottom right
	  position: "top right",
          // auto close after 3 seoncs
	  time: 5000,
          canClose:true
          // in pixels
	  //padding: 10
          // is closeable?
	  //closeAble: true,
	  // shows an image inside the notification
	  //image: ''
           });
            }else{
           var sound = new Audio();
           sound.src="./deduction.mp3"; 
           sound.play();
                NoticeZ ( 'Notification' , 'Quote dislike',{
           // top left
          // top right
	  // bottom left
	  // bottom right
	  position: "top right",
          // auto close after 3 seoncs
	  time: 5000,
          canClose:true
          // in pixels
	  //padding: 10
          // is closeable?
	  //closeAble: true,
	  // shows an image inside the notification
	  //image: ''
           });
           
           
            }
            
             
        }
    });
});

$('#save-comment').click(function(){
   var commenttext = $('#comment-text').val();
   var quoteID = $('#quoteID').val();
   var cmBy = $('#cmBy').val();
   
   if(commenttext != ''){
       
       $.ajax({
           url:"save-comment.php",
           method:"POST",
           data:{commenttext:commenttext, quoteID:quoteID, cmBy:cmBy},
           success:function(data){
           var sound = new Audio();
           sound.src="./deduction.mp3"; 
           sound.play();
            NoticeZ ( 'Notification' , data,{
                position: "top right",
                time: 4000,
                canClose:true
           });
           
           
           $('#comment-text').val("");
           }
           
           
       });
       
       
   }else{
       var sound = new Audio();
           sound.src="./deduction.mp3"; 
           sound.play();
                NoticeZ ( 'Notification' , 'Can not Send Comment! Empty Box',{
           // top left
          // top right
	  // bottom left
	  // bottom right
	  position: "top right",
          // auto close after 3 seoncs
	  time: 6000,
          canClose:true
          // in pixels
	  //padding: 10
          // is closeable?
	  //closeAble: true,
	  // shows an image inside the notification
	  //image: ''
           });
           
           
   }
});



