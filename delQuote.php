<?php
session_start();
include 'db/connect_db.php';
if(isset($_POST['quoteID'])){
    $query = "DELETE FROM posts WHERE ptID='".$_POST['quoteID']."' AND "
            . "postedBy='".$_SESSION['writeID']."'";
    if(mysqli_query($conn, $query)){
        return true;
    }
}