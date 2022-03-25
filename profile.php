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
        $userID = $_GET['userid'];
        if(dynamicCheck('writers', 'writerID', $userID) > 0){
            $getUserDetails = UserProfile($userID);
                foreach($getUserDetails as $key=>$userData){
                    $usrID = $userData['writerID'];
                    $fullName = $userData['writeName'];
                    $userName = $userData['writeUser'];
                    $image = $userData['profileImg'];
                }
            ?>
              <div >
        <div  style="background-color:#1c1d1e;" class="row profile-page">
            <a href="#"><?php echo $userName; ?></a>
            <?php
            echo make_follow_btn($_SESSION['writeID'], $userName);
            ?>
          
        </div>
            
         <div  style="background-color:#1c1d1e; font-size: 13px;" class="row header-img">
                       <?php 
                       if(getUserImage($image) != ''){
                          ?>
                            <img src="<?php echo 'images/'.getUserImage($image) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                       
             
                            <a href="#"><span class="red-ic font-weight-bold" ><?php echo totalQuote($usrID) ?></span>Quotes</a>
                            <a href="#"><span class="red-ic font-weight-bold" ><?php echo hashtagNumF($userName) ?></span>Followers</a>
        </div>
        
       
        </div>
        <hr class="my-1" />

         <div class="row" style="background-color:#1c1d1e; padding:10px; border-radius: 19px;">
                <p class="grey-ic font-weight-bold best-qoute-title">Best Quote</p>
                <hr class="my-1" />
                <p class="best-qoute-body" id="bestQoute" contenteditable="true">
                   Write Here 
                </p>
        </div>
        
        <hr class="my-1" />
        
        <div class="row" style="background-color:#1c1d1e; padding:10px; border-radius: 19px;">
                <p class="grey-ic font-weight-bold personal-info-title">Personal Info</p>
                <hr class="my-1" />
                

        </div>   
                
            <?php
        }else{
            
            echo '<span class="white-ic">User not Found</span>';
        }
        
        
       //$imageScr = 'image/'.$image;
        ?>
       
         
        
         
         
     <script>
            var editedContent = document.getElementById("bestQoute");
            editedContent.innerHTML = localStorage.getItem('bestQoute');
            
            editedContent.addEventListener('blur', function(){
                localStorage.setItem('bestQoute', this.innerHTML);
            });
            
            
        
        </script>     
       
    </body>
</html>
