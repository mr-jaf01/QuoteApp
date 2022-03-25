<?php
include 'db/connect_db.php';
include 'functions.php';
$query = "SELECT * FROM comment WHERE quoteID='".$_POST['quoteID']."'";
$run = mysqli_query($conn, $query);
$output = '';
if(mysqli_num_rows($run) > 0){
    while($cdatas = mysqli_fetch_assoc($run)){
        
       echo $cdatas['cmBy'];
        
    }
}