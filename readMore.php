<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>UI/UX</title>
  <!-- Font Awesome -->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/font-awesome.css" rel="stylesheet" />
</head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php
            include 'functions.php';
            $ptID = $_GET['ptID']; 
            $getPost = Single_post($ptID);
            foreach ($getPost as $index=>$postdata){
                $ptContent = $postdata['ptContent'];
                $postedBy = $postdata['postedBy'];
                $bgColor = $postdata['ptBgColor'];
            }
            ?>
              <section class="profile-header-app readMore-header">
                  <?php 
                       if(getUserImage($postedBy) != ''){
                          ?>
                            <img src="<?php echo "image/".getUserImage($postedBy) ?>" />  
                           <?php 
                       }else{
                           ?>
                            <img src="image/logoQA.png" />  
                           <?php
                       }
                       
                       ?>
                       <a class="" href="writes.php?page=profile&userid=<?php echo $postedBy ?>">
                     <?php 
                          echo getUser($postedBy);
                       ?>  
                   </a>
            </section> 
            </div>
            
            <div class="row read-more-full-text" style="background-color: <?php echo $bgColor; ?>">
               <i class="fa fa-quote-left"></i>
                <div class="content-full-text text-center" style="height:400px;">
                    
                    <?php 
                
                        echo $ptContent;
                
                ?>
                    
                </div>
                <i class="fa fa-quote-right"></i>
                <hr class="my-1"/>
                <div class="read-more-dev-footer">
                         <ul>
                             <li><a class="btn  btn-sm" href="#"><i class="fa fa-thumbs-up"><sub>9000</sub></i></a></li>
                             <li><a class="btn  btn-sm" href="#"><i class="fa fa-comment"><sub>9000</sub></i></a></li>
                             <li><a class="btn  btn-sm"  href="#"><i class="fa fa-share"><sub>1000</sub></i></a></li>
                         </ul>
                     </div>
            </div>
            
        </div>
        
        
        
        
     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script> 
    </body>
</html>
