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
  <title>Quote App</title>
  <!-- Font Awesome -->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet" />
</head>
    <body>
        <section class="header-curve">
            <center><h4 class="font-weight-bold white-text">Quote App</h4></center>
            
        </section>
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#212121" fill-opacity="1" d="M0,160L1440,64L1440,0L0,0Z"></path></svg>
        
        <div class="white-text">
            <h4 class="text-center">About</h4>
            <p class="text-center">
                <i class="fa fa-quote-left"></i><br>
               Quote App is Quote Platform where you 
               can share your quote for free.
               <br>
                <i class="fa fa-quote-right"></i><br>
            </p>
            <center><a href="#" class=" btn btn-dark btn-sm" style="border-radius: 19px;">Read more</a></center>
        </div>
        <hr class="my-1"/>
        <br>
        <div class="btns">
            <a href="index.php?page=register" class="btn btn-dark btn-sm">Register</a>
            <a href="index.php?page=login" class="btn btn-dark btn-sm">Login</a>
        </div>
        <br><br>
        
        <div class="text-center white-text">
            <small>
                Terms and conditions
            </small>
            <br>
            <hr class="my-1" />
            <small>
                Quote App is Free and Always will be free
                for you, Your Data is completely Secure.
            </small>
        </div>
        
        
        
        
        
        <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    include($page.'.php');
                }else{
                   
                    ?>
                        
                     <div class="white-text">
            <h4 class="text-center">About</h4>
            <p class="text-center">
                <i class="fa fa-quote-left"></i><br>
               Quote App is Quote Platform where you 
               can share your quote for free.
               <br>
                <i class="fa fa-quote-right"></i><br>
            </p>
            <center><a href="#" class=" btn btn-dark btn-sm" style="border-radius: 19px;">Read more</a></center>
        </div>
        <hr class="my-1"/>
        <br>
        <div class="btns">
            <a href="index.php?page=register" class="btn btn-dark btn-sm">Register</a>
            <a href="index.php?page=login" class="btn btn-dark btn-sm">Login</a>
        </div>
                  
                        
                        
                    <?php
                    
                }
            
            ?>
        
        
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script> 
    </body>
</html>
