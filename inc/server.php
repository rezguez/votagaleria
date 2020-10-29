<?php

$user_id = session_id();
if(empty($a)) session_start();


$user_id= session_id();  // set your user id settings


// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'bootstrap_gallery');


if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error($conn));
    exit();
}

// if user clicks like or dislike button
if (isset($_POST['action'])) {
    $banner_id = $_POST['banner_id'];
    $action = $_POST['action'];

    
    switch ($action) {
        case 'like':
            $sql1 = "SELECT COUNT(*) FROM rating_info
                 WHERE user_id = '$user_id' AND rating_action='like'";
            $rs = mysqli_query($conn, $sql1);
            $result = mysqli_fetch_array($rs);
            if ($result[0]>2) break;
            $sql="INSERT INTO rating_info (user_id, banner_id, rating_action)
             VALUES ('$user_id', $banner_id, 'like')
             ON DUPLICATE KEY UPDATE rating_action='like'";
            break;
        case 'unlike':
            $sql="DELETE FROM rating_info WHERE user_id='$user_id' AND banner_id=$banner_id";
            break;
        default:
            break;
    }
    
    // execute query to effect changes in the database ...
    mysqli_query($conn, $sql);
    echo getRating($banner_id);
    exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM rating_info
      WHERE banner_id = $id AND rating_action='like'";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
}


// Get total number of likes and dislikes for a particular post
function getRating($id)
{
    global $conn;
    $rating = array();
    $likes_query = "SELECT COUNT(*) FROM rating_info WHERE banner_id = $id AND rating_action='like'";
    $likes_rs = mysqli_query($conn, $likes_query);

    $likes = mysqli_fetch_array($likes_rs);

    $rating = [
        'likes' => $likes[0],

    ];
    return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($banner_id)
{
    global $conn;
    global $user_id;
    $sql = "SELECT * FROM rating_info WHERE user_id='$user_id'
      AND banner_id=$banner_id AND rating_action='like'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    }else{
        return false;
    }
}


$sql = "SELECT * FROM banner";
$result = mysqli_query($conn, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);