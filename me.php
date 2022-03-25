<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        ?>
        <div >
        <div  style="background-color:#1c1d1e;" class="row profile-page">
            <a href="#" class=""><?php echo getUser($_SESSION['writeID']) ?></a>
            <a href="#" style="font-size: 13px; color: grey">
               Edit Profile
            </a>
        </div>
            
         <div  style="background-color:#1c1d1e; font-size: 13px;" class="row header-img">
             <?php 
                       if(getUserImage($_SESSION['writeID']) != ''){
                          ?>
                            <img src="<?php echo $imgsrc.getUserImage($_SESSION['writeID']) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
             
                            <a href="#"><span class="red-ic font-weight-bold" ><?php echo totalQuote($_SESSION['writeID']) ?></span>Quotes</a>
                            <a href="#"><span class="red-ic font-weight-bold"><?php echo hashtagNumF(getUser($_SESSION['writeID'])) ?></span>Followers</a>
        </div>
        
       
        </div>
        <hr class="my-1" />
        
        
        
        
         <hr class="my-1" />
         <div class="row" style="background-color:#1c1d1e; padding:10px; border-radius: 19px;">
                <p class="grey-ic font-weight-bold best-qoute-title">Best Quote</p>
                <hr class="my-1" />
                <p class="best-qoute-body" id="bestQoute" contenteditable="true">
                   Write Here 
                </p>
        </div>
        <hr class="my-1" />
        <div class="row mb-5">
            <?php
            $getuserpost = getpostbyuser($_SESSION['writeID']);
            foreach ($getuserpost as $key=>$postdata){
               ?>
                <div class="post-dev">
                   <div class="dev-header">
                       <?php 
                       if(getUserImage($postdata['postedBy']) != ''){
                          ?>
                            <img src="<?php echo $imgsrc.getUserImage($postdata['postedBy']) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                       
                        <h6 style="font-size: 14px;"><a class="" href="writes.php?page=profile&userid=<?php echo $postdata['postedBy'] ?>"><?php echo getUser($postdata['postedBy']); ?></a></h6>
                        
                    </div>
                    <hr class="my-1"/>
                    
                    <div class="dev-status-header">
                        <span class="red-ic font-weight-bold">
                        <?php 
                        $time = strtotime($postdata['ptDate']);
                        
                        echo get_time_ago($time);
                        
                        ?>
                        </span>
                        
                        <span class="online_status">
                             <a class="blue-ic" onclick="delPost(<?php echo $postdata['ptID'] ?>)">Delete Quote</a>
                        </span>
                        
                        
                        
                    </div>
                    <hr class="my-1"/>
                    <div class="tag-bar">
                        
                           <?php 
                           $hashstring = $postdata['hashtag'];
                           $hashTagex = "/#+([a-zA-Z0-9_]+)/";
                           $hashstring= preg_replace($hashTagex, "<a href='writes.php?page=tag&tagN=$1'>$0</a>", $hashstring);
                           echo $hashstring;
                           ?>
                            
                   
                    </div>
                    <?php
                    if($postdata['ptBgColor'] == ""){
                        ?>
                     <div class="dev-content text-center read-more" style="color:white">
                        <i class="fa fa-quote-left"></i><br>
                         <?php
                         $ptID = $postdata['ptID'];
                         $string_post = $postdata['ptContent'];
                         $string = strip_tags($string_post);
                         if(strlen($string) > 200){
                             $strcut = substr($string, 0, 200);
                             $endPoint = strrpos($strcut, '');
                             
                             $string = $endPoint? substr($strcut, 0, $endPoint) : substr($strcut, 0);
                             $string .= "<br><a class='white-text' href='readMore.php?ptID=${ptID}'>Read more</a>";
                             ?>
                        
                             <?php 
                         }
                         
                         echo $string;
                         ?>
                     <br><i class="fa fa-quote-right"></i>
                     </div>  
                            
                            
                        <?php
                    }else{
                        ?>
                          <div class="dev-content text-center read-more" style="background-color: <?php echo $postdata['ptBgColor'] ?>">
                        <i class="fa fa-quote-left"></i><br>
                         <?php
                         $ptID = $postdata['ptID'];
                         $string_post = $postdata['ptContent'];
                         $string = strip_tags($string_post);
                         if(strlen($string) > 200){
                             $strcut = substr($string, 0, 200);
                             $endPoint = strrpos($strcut, '');
                             
                             $string = $endPoint? substr($strcut, 0, $endPoint) : substr($strcut, 0);
                             $string .= "<br><a class='white-text' href='readMore.php?ptID=${ptID}'>Read more</a>";
                             ?>
                        
                             <?php 
                         }
                         
                         echo $string;
                         ?>
                     <br><i class="fa fa-quote-right"></i>
                     </div>  
                            
                        <?php
                    }
                    ?>
                    
                     <hr class="my-1"/>
                     <p class="white-text " style="font-size:12px; padding-left: 5px;">
                         <span class="blue-ic ">
                         
                         
                         </span> <?php echo numberoflikes($ptID) ?> 
                         <span class="white-text">Likes</span>
                             
                        </p>
                     <div class="footer-dev">
                          <ul style="color:white;">
                             <li><a class="blue-ic" ><?php echo likebuttun($_SESSION['writeID'], $ptID); ?></a></li>
                             <li><a href="writes.php?page=comment&quote=<?php echo $ptID ?>" class="blue-ic" ><?php echo comments($_SESSION['writeID'], $ptID) ?> <span class="white-text" style="font-size:12px; "><?php echo numofcomment($ptID) ?> Comments</span></a></li>
                             <li><a href="#"><i class="fa fa-share"></i></a></li>
                         </ul>
                         
                         <?php 
                         if(numberoflikes($ptID) > 10){
                             ?>
                         <small class="white-text"><?php echo number_format(numberoflikes($ptID)) ?> Likes</small>    
                             <?php
                         }
                         
                         ?>
                     </div>
                    
                    
                    
                    
                </div>   
                   
                   
                <?php
            }
            
            ?>
            
        </div>
        
      
         
     <script>
            var editedContent = document.getElementById("bestQoute");
            editedContent.innerHTML = localStorage.getItem('bestQoute');
            
            editedContent.addEventListener('blur', function(){
                localStorage.setItem('bestQoute', this.innerHTML);
            });
            function delPost(post_id){
               var quoteID = post_id;
               
               $.ajax({
                   url:'delQuote.php',
                   method:'POST',
                   data:{quoteID:quoteID},
                   success:function(data){
                      
                   }
               });
            }
            
    </script>  
        
    </body>
</html>
