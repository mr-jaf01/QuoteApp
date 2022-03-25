<?php
if(isset($_POST['postTagname'])){
    include 'db/connect_db.php';
    $tname = '#'.$_POST['postTagname'];
    $tdes = $_POST['postTagdes'];
    $date = date('Y-m-d h:i:s');
    
    $query = "INSERT INTO hashtags(tagName,tagdes,createdOn) VALUES("
            . "'$tname','$tdes','$date')";
    @$run_query = mysqli_query($conn, $query);
    if($run_query){
        
        echo '#Tag Created';
    }else{
        echo "Oops Can't Create #Tag";
    }
}