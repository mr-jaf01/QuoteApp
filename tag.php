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
        <div>
        <div  style="background-color:#1c1d1e;" class="row profile-page">
            <a  class="blue-ic font-weight-bold"><?php echo '#'.$_GET['tagN']; ?></a>
            <?php 
              include 'db/connect_db.php';
              echo  make_follow_btn($_SESSION['writeID'], '#'.$_GET['tagN']);
             
             ?>
            
          
        </div>
         <div  style="background-color:#1c1d1e; font-size: 14px;" class="row header-img">
             
             <a href="#"><span class="red-ic font-weight-bold" ><?php echo totalQuote($_GET['tagN'])  ?></span>Quotes</a>
             <a href="#"><span class="red-ic font-weight-bold"><?php echo hashtagNumF('#'.$_GET['tagN']) ?></span>Followers</a>
        </div>
        
       
        </div>
        <hr class="my-1" />
        
        <?php 
        $tag = '#'.$_GET['tagN'];
        if(hashtagNumF($tag) > 0){
           ?>
            <div class="row">
            <span class="grey-ic font-weight-bold pl-2" style="font-size: 13px;">Followers</span>
            <hr class="my-1" />
            <div class="box box-tag">
                <?php
            
            $showFollower = "SELECT * FROM tblfollower WHERE tagUser='$tag'";
            $runshow = mysqli_query($conn, $showFollower);
            while($data = mysqli_fetch_assoc($runshow)){
                
                $followrID = $data['fby'];
                $getFollowUser = followByUsers($followrID);
                
                foreach ($getFollowUser as $key=>$followerD){
                    
                    ?>
                        
                <div class="card1">
                    <?php 
                    $userid = $followerD['writerID'];
                     echo "<a href='writes.php?page=profile&userid=$userid' style='padding-left:10px;  font-size:12px;'>".$followerD['writeUser'].'<br>'."</a>"; 
                    ?>
                    <?php 
                       if(getUserImage($followerD['writerID']) != ''){
                          ?>
                    <center><img  src="<?php echo 'image/'.getUserImage($followerD['writerID']) ?>" /> </center> 
                           <?php 
                       }else{
                           ?>
                    <center> <img  src="image/logoQA.png" />  </center>
                           <?php
                       }
                       
                       ?>
                    <?php
                     echo "<p class='text-center' style='font-size:13px;'>".make_follow_btn($_SESSION['writeID'], $followerD['writeUser'])."</p>"; 
                    ?>
                    
                </div>  
                        
                    <?php
                    
                }
                
            }
            
            ?>
                
                    
                    
            </div>
        </div>  
               
            <?php 
        }
       ?>
       
       
        <div class="row mb-5">
        <?php 
        $imgsrc = 'image/';
        $hashTagex = "/#+([a-zA-Z0-9_]+)/";
      
        $query = "SELECT * FROM posts WHERE hashtag LIKE '%".$_GET['tagN']."%' ORDER BY ptID DESC";
        $run_query = mysqli_query($conn, $query);
        if(@mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_assoc($run_query)){
                ?>
                <div class="post-dev">
                   <div class="dev-header">
                       <?php 
                       if(getUserImage($row['postedBy']) != ''){
                          ?>
                            <img src="<?php echo $imgsrc.getUserImage($row['postedBy']) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                       
                        <h6 style="font-size: 14px;"><a class="" href="writes.php?page=profile&userid=<?php echo $row['postedBy'] ?>"><?php echo getUser($row['postedBy']); ?></a></h6>
                        
                    </div>
                    <hr class="my-1"/>
                    
                    <div class="dev-status-header">
                        <span class="red-ic font-weight-bold ">
                        <?php 
                        $time = strtotime($row['ptDate']);
                        
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
                           $hashstring = $row['hashtag'];
                           $hashTagex = "/#+([a-zA-Z0-9_]+)/";
                           $hashstring= preg_replace($hashTagex, "<a href='writes.php?page=tag&tagN=$1'>$0</a>", $hashstring);
                           echo $hashstring;
                           ?>
                            
                   
                    </div>
                    <?php 
                    if($row['ptBgColor'] == ""){
                        ?>
                          <div class="dev-content text-center read-more" style="color:white">
                        <i class="fa fa-quote-left"></i><br>
                         <?php
                         $ptID = $row['ptID'];
                         $string_post = $row['ptContent'];
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
                         <div class="dev-content text-center read-more" style="background-color: <?php echo $row['ptBgColor'] ?>">
                        <i class="fa fa-quote-left"></i><br>
                         <?php
                         $ptID = $row['ptID'];
                         $string_post = $row['ptContent'];
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
                     <p class="white-ic" style="font-size:12px; padding-left: 5px;">
                         <span class="blue-ic ">
                         <?php 
                         
                         ?>
                        </span> <?php echo number_format(numberoflikes($row['ptID'])) ?> 
                         <span class="white-ic">Likes</span>
                             
                        </p>
                     <div class="footer-dev">
                         <ul style="color:white;">
                             <li><a class="blue-ic" ><?php echo likebuttun($_SESSION['writeID'], $row['ptID']); ?></a></li>
                             <li><a href="writes.php?page=comment&quote=<?php echo $row['ptID'] ?>" class="blue-ic" ><?php echo comments($_SESSION['writeID'], $row['ptID']) ?> <span class="white-text" style="font-size:12px; "><?php echo numofcomment($row['ptID']) ?> Comments</span></a></li>
                             <li><a href="#"><i class="fa fa-share"></i></a></li>
                         </ul>
                         
                         <?php 
                         if(numberoflikes($row['ptID']) > 10){
                             ?>
                         <small class="white-text"><?php echo number_format(numberoflikes($row['ptID'])) ?> Likes</small>    
                             <?php
                         }
                         
                         ?>
                     </div>
                    
                    
                    
                    
                </div>
                
                <?php
            }
        }else{
            
            echo 'No Post Found in this Tag';
        }
        
        ?>
        
        </div> 
       
    </body>
</html>
