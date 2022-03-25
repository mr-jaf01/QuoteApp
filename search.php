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
        <div class="row">
              <span style="color:grey">Search Result for "<?php echo $_POST['search'] ?>"</span><br>
        
        <br>
        
        <hr class="my-1">
        </div>
        <div class="row people" style="padding-left: 10px; padding-right: 10px;">
            <span class="white-text">People</span>
      
         
     <?php
        include 'db/connect_db.php';
        if(isset($_POST['search'])){
            $findSearch = "SELECT * FROM writers WHERE writeName LIKE '%".$_POST['search']."%' "
                    . " OR writeUser LIKE '%".$_POST['search']."%'";
            $runfindSearch = mysqli_query($conn, $findSearch);
            if(mysqli_num_rows($runfindSearch)>0){
                while($rowd = mysqli_fetch_assoc($runfindSearch)){
                    ?>
       
            
            <div class="search-result-p" style="font-size: 12px;">
                 <a class='grey-ic font-weight-bold' href="writes.php?page=profile&userid=<?php echo $rowd['writerID'] ?>" >
                <?php
                if(getUserImage($rowd['writerID']) != ''){
                          ?>
                            <img src="<?php echo "image/".getUserImage($rowd['writerID']) ?>" />  
                           <?php 
                       }else{
                           ?>
                           
                            <img src="image/logoQA.png" />  
                             
                           <?php
                       }
                ?>
                
               
                   <?php echo $rowd['writeUser'] ?>
                 </a>
                    <?php
                    echo make_follow_btn($_SESSION['writeID'], $rowd['writeUser']);  
                ?>
               
                
                
            </div>
         
                <?php
                }
                
            }else{
                echo '<br><center><span class="text-center" style="color:grey">User Not Found</span></center>';
            }
        }
        
        ?>
        </div> 
        <div class="row" style="padding-left: 10px; padding-right: 10px;">
        <hr class="my-1">
        <span class="white-text">Hash Tags</span>
            <hr class="my-1">
        <?php
        if(isset($_POST['search'])){
            $reglink = "/#+([a-zA-Z0-9_]+)/";
            $findSearch1 = "SELECT * FROM tblfollower WHERE tagUser LIKE '%".$_POST['search']."%'"
                    . "";
            $runfindSearch1 = mysqli_query($conn, $findSearch1);
            if(mysqli_num_rows($runfindSearch1)>0){
                while($rowd1 = mysqli_fetch_assoc($runfindSearch1)){
                    ?>
       
            
            <div class="search-result-p" style="font-size: 13px;">
                 <span>
                   <?php 
                   $hashlinks = $rowd1['tagUser'] ;
                   $hashlinks =preg_replace($reglink, "<a  href='writes.php?page=tag&tagN=$1'>$0</a>", $hashlinks);
                    echo $hashlinks;       
                      ?>
                 </span>
                    <?php
                    echo make_follow_btn($_SESSION['writeID'], $rowd1['tagUser']);  
                ?>
               
                
                
            </div>
         
                <?php
                }
                
            }else{
                echo '<center><span style="color:grey">Hashtag Not Found</span></center>';
            }
        }
        
        ?>
        </div>
        
        
       
    </body>
</html>
