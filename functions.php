<?php
// this fucntion return all post
function all_posts($user,$hashtag){
    include 'db/connect_db.php';
    $query = "SELECT * FROM posts WHERE postedBy='$user' OR postedBy='".$_SESSION['writeID']."' OR hashtag LIKE '%".$hashtag."%' ORDER BY ptID DESC";
    $run_query = mysqli_query($conn, $query);
    $post_data = array();
    while($row = mysqli_fetch_assoc($run_query)){
        $post_data[] = $row;  
    }
    return $post_data;
}

//this function return a single post datas

function Single_post($ptID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM posts WHERE ptID='$ptID'";
    $run_query = mysqli_query($conn, $query);
    $post_data = array();
    if(mysqli_num_rows($run_query) >0){
        while($row = mysqli_fetch_assoc($run_query)){
        $post_data[] = $row;  
    }
    return $post_data;
    } else {
       echo 'No Quote with ID'; 
    }
    
    
}


//this function return Username
function getUser($userID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM writers WHERE writerID='$userID'";
    $run_query = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($run_query)){
            return $row['writeUser'];
    }
    
}

function getUserImage($userID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM writers WHERE writerID='$userID'";
    $run_query = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($run_query)){
            return $row['profileImg'];
    }
    
}

function getHashTag(){
    include 'db/connect_db.php';
    $query = "SELECT * FROM tblfollower ORDER BY fID DESC";
    $run_query = mysqli_query($conn, $query);
    $post_data = array();
    while($row = mysqli_fetch_assoc($run_query)){
        $post_data[] = $row;  
    }
    return $post_data;
    
}

// this function return time ago of a post
function get_time_ago($time){
    $time_difference = time() - $time;
    if($time_difference < 1){        return 'Now';}
    $condition = array(
        
        12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
        
    );
    foreach ($condition as $secs => $str){
        
        $d = $time_difference / $secs;
        
        if($d >= 1){
            $t = round($d);
            return ''.$t.''.$str.($t > 1 ? 's' : '').' ago ';
        }
    }
    
    
}

function UserProfile($userID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM writers WHERE writerID='$userID'";
    $run_query = mysqli_query($conn, $query);
    if(mysqli_num_rows($run_query)){
        $post_data = array();
        while($row = mysqli_fetch_assoc($run_query)){
        $post_data[] = $row;  
    }
    return $post_data;
    
    }else{
        
        return "User Not Found";
    }
    
    
}

function totalQuote($hashtag){
    include 'db/connect_db.php';
    $query = "SELECT * FROM posts WHERE postedBy='$hashtag' OR hashtag LIKE '%".$hashtag."%' ";
    $run_query = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run_query);
    return $num_rows;
}

function make_follow_btn($userid,$hashtag){
    include 'db/connect_db.php';
    $query = "SELECT * FROM tblfollower WHERE fby='$userid' && tagUser='$hashtag'";
    $run = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run);
    $output = '';
    if($num_rows > 0){
        $output = '<button  action-data="unfollow" data-sender="'.$userid.'" hashtag-data="'.$hashtag.'" class="btn btn-dark  btn-sm action-button" style="background-color: #041e9b; border-radius: 19px;">
                    Following
                   </button>';
    }else{
        $output = '<button  action-data="follow" data-sender="'.$userid.'" hashtag-data="'.$hashtag.'" class="btn  btn-sm action-button" style="background-color: #041e9b; border-radius: 19px;">
                     <i class="fa fa-plus"></i>Follow
                   </button>';
    }
    
    return $output;
    
}

function followByUsers($userID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM writers WHERE writerID='$userID' ORDER BY writerID DESC";
    $run_query = mysqli_query($conn, $query);
    $user_data = array();
    while($row = mysqli_fetch_assoc($run_query)){
        $user_data[] = $row;  
    }
    return $user_data;
    
}

function hashtagNumF($hashtag){
    include 'db/connect_db.php';
    $query = "SELECT * FROM tblfollower WHERE tagUser='$hashtag'";
    $run_query = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run_query);
    return $num_rows;
}

function getpostbyuser($userid){
     include 'db/connect_db.php';
    $query = "SELECT * FROM posts WHERE postedBy='$userid' ORDER BY ptID DESC";
    $run_query = mysqli_query($conn, $query);
    $post_data = array();
    while($row = mysqli_fetch_assoc($run_query)){
        $post_data[] = $row;  
    }
    return $post_data;
}

function likebuttun($likeby,$quoteid){
    include 'db/connect_db.php';
    $query = "SELECT * FROM tbllike WHERE likeby='$likeby' && quoteID='$quoteid'";
    $run = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run);
    $output = '';
    if($num_rows > 0){
        $output = '<i like-data="dislike" likeby="'.$likeby.'" quote-data="'.$quoteid.'" class="fa fa-heart action-like">
                   </i>';
    }else{
         $output = '<i like-data="like" likeby="'.$likeby.'" quote-data="'.$quoteid.'" class="fa fa-heart-o action-like">
                   </i>';
    }
    
    return $output;
}

function numberoflikes($quoteID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM tbllike WHERE quoteID='$quoteID' ";
    $run_query = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run_query);
    return $num_rows;
}

function currentUserlike($userid,$quoteID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM tbllike WHERE likeby='$userid' AND quoteID='$quoteID'";
    $run_query = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run_query);
    return $num_rows;
}


function comments($commentBy, $quoteID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM comment WHERE cmBy='$commentBy' && quoteID='$quoteID'";
    $run = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($run);
    $output = '';
    if($num_rows > 0){
        $output = '<i  class="fa fa-comment comment-action">
                   </i>';
    }else{
         $output = '<i class="fa fa-comment-o comment-action">
                   </i>';
    }
    
    return $output;
}

function showComment($quoteID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM comment WHERE quoteID='$quoteID' ORDER BY cmID DESC";
    $run_query = mysqli_query($conn, $query);
    $post_data = array();
    while($row = mysqli_fetch_assoc($run_query)){
        $post_data[] = $row;  
    }
    return $post_data;
}

function numofcomment($quoteID){
    include 'db/connect_db.php';
    $query = "SELECT * FROM comment WHERE quoteID='$quoteID'";
    $run_query = mysqli_query($conn, $query);
    return mysqli_num_rows($run_query);
    
}

function dynamicCheck($table,$colum,$id){
    include 'db/connect_db.php';
    $query = "SELECT * FROM $table WHERE $colum ='$id'";
    $run_query = mysqli_query($conn, $query);
    return mysqli_num_rows($run_query);
}