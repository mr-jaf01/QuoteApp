<?php
include 'db/connect_db.php';
if($_POST['action'] == 'follow'){
$query = "INSERT IGNORE INTO tblfollower(fby,tagUser) "
        . "VALUES('".$_POST['sender_id']."','".$_POST['hashtag']."')";
$runquery = mysqli_query($conn, $query);
if($runquery){
    echo 'follow';
}else{
     
}
}

if($_POST['action'] == 'unfollow'){
$query1 = "DELETE FROM tblfollower WHERE fby='".$_POST['sender_id']."'"
        . "AND tagUser='".$_POST['hashtag']."'";
$runquery1 = mysqli_query($conn, $query1);
if($runquery1){
    echo 'unfollow';
}else{
     
}

}