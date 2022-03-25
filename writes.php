<?php
session_start();
if(!isset($_SESSION['writeEmail'])){
    header("location:index.php");
}else{
    include 'functions.php';
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
  <link href="css/style.css" rel="stylesheet">
  <link href="css/sticky.css" rel="stylesheet">
  <link href="css/profile.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet" />
</head>
    <body>
        <!--<div id="splash">
            <h2>Ayuma Writers App</h2>
        </div> -->
        <div class="container-fluid " >
            <header class="header-app" id="headerApp">
                <form action="writes.php?page=search" method="POST">
                <div class="header-container row ">
                    
                        <input type="text" name="search" class="search" placeholder="Search..." />
                    
                  
                </div>
                    </form>
                <!--
                <div class="header-nav" id="header-nav">
                    <a href="writes.php"><i class="fa fa-home"></i></a>
                    <a href="#"><i class="fa fa-users"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                    <a href="#"><i class="fa fa-video-camera"></i></a>
                    <a href="#"><i class="fa fa-bell"></i></a>
                    <a href="writes.php?page=moreActive"><i class="fa fa-bars"></i></a>
                </div>
                -->
                
            </header>
            <hr class="my-1" />
            
            <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                include($page.'.php');
            }else{
                
                
                
                ?>
                  
          
        <div class='row'>
           <!-- <div class="top-text">
                <span></span>
                <span class="pr-2" style="font-size: 13px;"><a href="#">Most Popular #tags</a></span>
           
            </div>-->
            
            
            
              
                <div class="box">
                    
                    <?php 
                    $gethashtag = getHashTag();
                    $reglink = "/#+([a-zA-Z0-9_]+)/";
                    foreach ($gethashtag as $keytag => $hashdata){
                        $userNamestr = $hashdata['tagUser']; 
                        $userNamestr = preg_replace($reglink, "<a class='' href='writes.php?page=tag&tagN=$1'>$0</a>", $userNamestr);
                        
                        ?>
                          <div class="card1">
                              <div class="cc">
                                   <p class="text-center " style="font-size: 13px;"><?php echo $userNamestr ?></p>
                                   <p class="text-center" style="font-size: 14px;"><span class="white-ic font-weight-bold"><?php echo totalQuote($hashdata['tagUser']) ?><br></span><span class="blue-text">Quotes</span></p>
                              </div>
                             
                          </div>  
                         <?php
                    }
                    
                    ?>
                    
                    
                   <!-- <div class="card2"></div>
                    <div class="card3"></div>
                    <div class="card1"></div>
                    <div class="card2"></div>
                    <div class="card3"></div>
                    <div class="card1"></div>
                    <div class="card2"></div>
                    <div class="card3"></div>
                    <div class="card1"></div>
                    <div class="card2"></div>
                    <div class="card3"></div>
                   -->
                    
                </div>
        </div>
            
            <div class="row mb-5" >
                <?php
                $imgsrc = 'image/';
                include 'db/connect_db.php';
                $finduser_tag = "SELECT * FROM tblfollower WHERE fby='".$_SESSION['writeID']."'";
                $runfind = mysqli_query($conn, $finduser_tag);
                $check_row = mysqli_num_rows($runfind);
                if($check_row > 0){

                    while($datas = mysqli_fetch_assoc($runfind)){

                           
                           $getPosts = all_posts($datas['tagUser'],$datas['tagUser']);
                     foreach ($getPosts as $index=>$postdata){
                         
                         
                        
                         
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
                            <i class="fa fa-star-o"></i>
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
                          <div class="dev-content text-center read-more" style="background-color:<?php echo $postdata['ptBgColor']; ?>">
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
                     
                        <span class="white-ic " style="font-size:12px;  padding-left: 5px;">
                         <span class="blue-ic  ">
                         <?php 
                         
                         ?>
                         </span> <?php echo number_format(numberoflikes($ptID)) ?> 
                         <span class="white-ic">Likes</span>
                             
                        </span>
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
                      }

                 }
                     ?>
                
            </div>
<?php
                   
                     
                  
      
               
            }
            
            
            ?>
            
           
        </div>
        
        <footer class="footer-app">
            <a href="writes.php"><i class="fa fa-home"><sup>2</sup></i></a>
            <a href="#"><i class="fa fa-bell"><sup>20</sup></i></a>
            <a href="writes.php?page=publish"><i class="fa fa-plus-circle"></i></a>
            <a href="writes.php?page=me"><i class="fa fa-user"></i></a>
            <a href="writes.php?page=moreActive"><i class="fa fa-bars"></i></a>
        </footer>
        
       
       
       
       
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/publish.js"></script>
  <script type="text/javascript" src="js/NoticeZ.js"></script>
  <script type="text/javascript" src="js/NoticeZ.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>   
  </body>
</html>
<?php } ?>
