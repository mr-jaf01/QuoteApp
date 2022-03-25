<?php
include 'db/connect_db.php';
if(isset($_POST['commenttext'])){
     $date = date('Y-m-d H:i:s');
    $query = "INSERT IGNORE INTO comment(cmt,quoteID,cmBy,cmDate) "
            . "VALUES('".$_POST['commenttext']."','".$_POST['quoteID']."',"
            . "'".$_POST['cmBy']."','$date')";
    $run = mysqli_query($conn, $query);
    if($run){
        echo 'comment send'; 
    }else{
        echo 'Unable to send comment';
    }
}
