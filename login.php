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
        
        <form action="#" method="POST" enctype="multiPart/form-data">
        <div class="register-main-app">
            
                   <h4 class="" style="color: darkgrey;">Login</h4>
                
                   <input type="Email" required name="loginemail" class="" placeholder="Email" />
                   <input type="password" required name="loginpass" class="" placeholder="Password" />
                    
                    
                    <div class="rightbtn">
                        <button name="login" class="btn btn-dark btn-sm">Login</button>
                    </div>
        </div>
        </form>
        <div class="justify-content-center forgotlinks">
            <a class="" href="index.php?page=reset">Fogot Password?</a>
             <span class="" style="color:white">Don't Have An account? <a href="index.php?page=register">Sign Up</a></span> 
        </div>
        
        <div class="loginBody justify-content-center">
            <?php 
            if(isset($_POST['login'])){
                $loginemail = $_POST['loginemail'];
                $loginpass = md5($_POST['loginpass']);
                include 'db/connect_db.php';
                $checkCredential = "SELECT * FROM writers WHERE writeEmail='$loginemail'";
                $runcheck = mysqli_query($conn, $checkCredential);
                $checkuser = mysqli_num_rows($runcheck);
                if($checkuser > 0){
                    
                    while($loginCredential = mysqli_fetch_assoc($runcheck)){
                        
                        $writeID = $loginCredential['writerID'];
                        $writeEmail = $loginCredential['writeEmail'];
                        $writePass = $loginCredential['writePass'];
                    }
                    
                    if($writeEmail == $loginemail){
                        if($writePass == $loginpass){
                            header("Refresh:3, url=writes.php");
                            $_SESSION['writeEmail'] = $writeEmail;
                            $_SESSION['writeID'] = $writeID;
                        }else{
                            ?>
            <p class="alert alert-danger">Wrong Password</p>   
                        
                    <?php
                        }
                    }else{
                        ?>
            <p class="alert alert-danger">Incorrect User Name</p>   
                        
                    <?php
                    }
                    
                    
                    
                }else{
                    ?>
            <p class="alert alert-danger">User Not Found</p>   
                        
                    <?php
                }
            }
            
            ?>
        </div>
    </body>
</html>
