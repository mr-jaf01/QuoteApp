<?php
if(isset($_POST['hashtagName'])){
    include 'db/connect_db.php';
    $output = '';
    $query = "SELECT * FROM hashtags WHERE tagName LIKE '%".$_POST['hashtagName']."%'";
    $result = mysqli_query($conn, $query);
    $output - '<ul style="list-style:none">';
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
           $output .= '<li style="list-style:none; cursor:pointer; color:white">'.$row['tagName'].'</li>'; 
        }
    } else {
        //$output .= '<li style="list-style:none; cursor:pointer; color:white">No Matching HashTag</li>';
    }
    $output .= '</ul>';
    echo $output;
}