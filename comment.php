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
    <body >
        <?php
         $quoteID = $_GET['quote'];
         if(dynamicCheck('posts', 'ptID', $quoteID) > 0){
             $getQoute = Single_post($quoteID);
            foreach ($getQoute as $key=>$quotedata){
             
                $id = $quotedata['ptID'];
                $ptContent = $quotedata['ptContent'];
                $postedBy = $quotedata['postedBy'];
                $ptdate = $quotedata['ptDate'];
                $hashtag = $quotedata['hashtag'];
                $bgColor = $quotedata['ptBgColor'];
                
         }
             ?>
                <div class="row mb-5" >
            <div class="post-dev main-comment">
                   <div class="dev-header">
                       <?php 
                       if(getUserImage($postedBy) != ''){
                          ?>
                            <img src="<?php echo $imgsrc.getUserImage($postedBy) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                       
                        <h6 style="font-size: 14px;"><a class="" href="writes.php?page=profile&userid=<?php echo $postedBy?>"><?php echo getUser($postedBy); ?></a></h6>
                        
                    </div>
                    <hr class="my-1"/>
                    
                    <div class="dev-status-header">
                        <span class="red-ic font-weight-bold">
                        <?php 
                        $time = strtotime($ptdate);
                        
                        echo get_time_ago($time);
                        
                        ?>
                        </span>
                        
                        <span class="online_status">
                            <i class="fa fa-star-o"></i>
                        </span>
                        
                        
                        
                    </div>
                    <hr class="my-1"/>
                    <div class="tag-bar">
                        
                           <?php 
                           $hashstring = $hashtag;
                           $hashTagex = "/#+([a-zA-Z0-9_]+)/";
                           $hashstring= preg_replace($hashTagex, "<a href='writes.php?page=tag&tagN=$1'>$0</a>", $hashstring);
                           echo $hashstring;
                           ?>
                            
                   
                    </div>
                    <?php
                    if($bgColor == ""){
                        ?>
                         <div class="dev-content text-center read-more" style="color:white">
                        <i class="fa fa-quote-left"></i><br>
                         <?php
                         $ptID = $id;
                         $string_post = $ptContent;
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
                         <div class="dev-content text-center read-more" style="background-color: <?php echo $bgColor; ?>">
                        <i class="fa fa-quote-left"></i><br>
                         <?php
                         $ptID = $id;
                         $string_post = $ptContent;
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
                        <span class=" white-text" style="font-size:12px;  padding-left: 5px;">
                         <span class="blue-ic  ">
                         <?php 
                         
                         ?>
                         </span> <?php echo numberoflikes($id) ?> 
                         <span class="white-text">Likes</span>
                             
                        </span>
                     <div class="footer-dev" >
                         <ul style="color:white;">
                             <li><a class="blue-ic" ><?php echo likebuttun($_SESSION['writeID'], $id); ?></a></li>
                             <li><a class="blue-ic" ><?php echo comments($_SESSION['writeID'], $id) ?> <span class="white-text" style="font-size:12px; "><?php echo numofcomment($id) ?> Comments</span></a></li>
                             <li><a href="#"><i class="fa fa-share"></i></a></li>
                         </ul>
                         
                         <?php 
                         if(numberoflikes($id) > 10){
                             ?>
                         <small class="white-text"><?php echo number_format(numberoflikes($id)) ?> Likes</small>    
                             <?php
                         }
                         
                         ?>
                        
                     </div>
                     <hr class="my-1"/>
                        <?php
                                $getComment = showComment($id);
                                foreach($getComment as $k=>$cmtdata){
                                    
                                    ?>
                     
                                        <div class="comment-display" id="showcmt" style="border-radius: 19px; ">
                                        <a>
                                        <?php 
                                        if(getUserImage($cmtdata['cmBy']) != ''){
                                           ?>
                                             <img src="<?php echo 'image/'.getUserImage($cmtdata['cmBy']) ?>" />  
                                            <?php 
                                        }else{
                                            ?>
                                             <img src="image/logoQA.png" />  
                                            <?php
                                        }

                                        ?>
                                             
                                         </a>
                                             <div style="padding-left: 12px;">
                                                 <span class="blue-ic"><?php echo getUser($cmtdata['cmBy']) ?></span>
                                                 <p class="white-text" style="font-size: 12px;">
                                                     <?php
                                                     echo $cmtdata['cmt'];
                                                     
                                                     ?>
                                                 </p>
                                                 
                                                 <ul style="color:white;">
                                                    <li><a class="blue-ic" ><?php echo likebuttun($_SESSION['writeID'], $cmtdata['cmID']); ?></a></li>                                                   
                                                    <li><a href="#"><i class="fa fa-share"></i></a></li>
                                                </ul>
                                                 
                                             </div>
                                        
                                        </div>
                     <hr class="my-1"/>
                                 
                                    <?php
                                }
                            
                            ?>
                         
                     
                      <div class="commet-box" style="">
                        <?php 
                       if(getUserImage($postedBy) != ''){
                          ?>
                            <img src="<?php echo $imgsrc.getUserImage($postedBy) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                            <input placeholder="Write a comment" type="text" id="comment-text" />
                            <input  type="hidden" value="<?php echo $id; ?>" id="quoteID" />
                            <input  type="hidden" value="<?php echo $_SESSION['writeID']; ?>" id="cmBy" />
                
                            <a class="blue-ic" id="save-comment" style="padding-left: 5px;">Send</i></a>
                     </div>
                    
                   </div>
            
            
                     
        </div>  
                 
                 
                 
                 
                 
            <?php
         }else{
             echo '<span class="white-ic">Quote Not Found</span>';
         }
         
         
        ?>
       
        
</body>
</html>
