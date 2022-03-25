<?php
session_start();
?>
<!DOCTYPE html>
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
            <center><h4 class="font-weight-bold white-text pt-3">Quote App</h4></center>
            
        </section>
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#212121" fill-opacity="1" d="M0,160L1440,64L1440,0L0,0Z"></path></svg>
        
        <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    include($page.'.php');
                }else{
                   
                    include'login.php';
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
