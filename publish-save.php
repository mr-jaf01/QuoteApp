<?php
session_start();
if(isset($_POST['postContent']) && isset($_POST['bgcolorval'])){
    $postcontent = $_POST['postContent'];
    $bgColor = $_POST['bgcolorval'];
    $postedBy = $_SESSION['writeID'];
    $hashtag = $_POST['posthashtag'];
    $date = date('Y-m-d H:i:s');
    //$time = date('');
    include 'db/connect_db.php';
    $publish_save = "INSERT INTO posts(ptContent,postedBy,ptDate,ptBgColor,hashtag) VALUES("
            . "'$postcontent','$postedBy','$date','$bgColor','$hashtag')";
    $runPublish = mysqli_query($conn, $publish_save);
    if($runPublish){
        echo 'Quote Published';
    }else{
        echo 'Oops! Cannot Published';
    }
}
