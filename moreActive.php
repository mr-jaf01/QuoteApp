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
            
            <div class="moreActive-header">
                
                    <?php
                
                    if(getUserImage($_SESSION['writeID']) != ''){
                          ?>
                <img src="<?php echo "images/".getUserImage($_SESSION['writeID']) ?>" class="moreActive-header-img" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                
                
               
                    <h4 style=" color: white" class="font-weight-bold">
                        <?php 
                        
                        echo getUser($_SESSION['writeID']);
                        ?>
                        
                    </h4>
                   
                    
                
            </div>
        
           
        </div>
        <hr class="my-1"/>
         <div class="row logout">
            <a href="#">Followers</a>
            <i class="fa fa-users white-ic"></i> 
        </div>
        <hr class="my-1"/>
        
        <div class="row logout">
            <a href="#">Events</a>
            <i class="fa fa-calendar green-ic "></i> 
        </div>
        <hr class="my-1"/>
        
        <div class="row logout">
            <a href="#">Rating</a>
            <i class="fa fa-star white-ic"></i> 
        </div>
        <hr class="my-1"/>
        
        
        <div class="row logout">
            <a href="writes.php?page=settings">Settings</a>
            <i class="fa fa-support white-ic"></i> 
        </div>
        <hr class="my-1"/>
        
        <div class="row logout">
            <a href="logout.php">Logout</a>
            <i class="fa fa-sign-out red-ic"></i> 
        </div>
        <hr class="my-1"/>
        
    </body>
</html>
