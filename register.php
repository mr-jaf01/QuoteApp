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
            
            <h4 class="" style="color: darkgrey;">Register</h4>
                
                   <input type="text" required      name="fullName" class="" placeholder="Full Name" />
                   <input type="email" required     name="Email" class="" placeholder="Email" />
                    
                    <input type="text"  required    name="userName" class="" placeholder="User Name" />
                    <input type="password" required name="pass" class="" placeholder="Password" />
                    <input type="password" required name="cpass" class="" placeholder="Comfirm Password" />
                    <input type="file" name="photo" hidden />
                    <div class="rightbtn">
                        <button name="submit" class="btn btn-dark btn-sm">Submit</button>
                    </div>
        </div>
        </form>
        <div class="justify-content-center forgotlinks">
            <span style="color:white">Already Have Account!<a class=""  href="index.php?page=login"> Login</a></span>
            
        </div>
        
        <div class="regStatus justify-content-center">
            <?php
            if(isset($_POST['submit'])){
                
                $fullname = $_POST['fullName'];
                $email = $_POST['Email'];
                
                $userName = '@'.$_POST['userName'];
                $password = md5($_POST['pass']);
                $cpassword = md5($_POST['cpass']);
                
                
                
                if($password == $cpassword){
                    include 'db/connect_db.php';
                   $registerQ = "INSERT IGNORE INTO writers(writeName,writeEmail,writeUser,writePass)VALUES("
                           . "'$fullname','$email','$userName','$cpassword')";
                   $runRegister = mysqli_query($conn, $registerQ);
                   if($runRegister){
                       
                       ?>
            <p class="alert alert-success">
                Successfully Registered
            </p>   
                    <?php
                    
                               header("Refresh:2, url=index.php?page=login");
                       
                   }else{
                       ?>
            <p class="alert alert-danger">
                Oops! Can not Register! Try Again
            </p>   
                    <?php
                   }
                }else{
                    ?>
            <p class="alert alert-danger">
                Password Mis-match
            </p>   
                    <?php
                }
            }
            ?>
        </div>
    </body>
</html>
