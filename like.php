<?php
   include 'db/connect_db.php';
if($_POST['like_data'] == 'like'){
    $query = "INSERT IGNORE INTO tbllike(likeby,quoteid) "
        . "VALUES('".$_POST['likeby']."','".$_POST['quoteID']."')";
    $runquery = mysqli_query($conn, $query);
    if($runquery){
        echo 'like';
    }else{
        //echo 'unable to like qoute';
    }
}

if($_POST['like_data'] == 'dislike'){
    $dislike = "DELETE FROM tbllike WHERE likeby='".$_POST['likeby']."'"
            . "AND quoteid='".$_POST['quoteID']."'";
    $rundislike = mysqli_query($conn, $dislike);
    if($rundislike){
       echo 'dislike fine';
    }else{
       // echo 'unable to dislike qoute';
    }
}