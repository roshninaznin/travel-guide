<?php
require_once('db.php');

function login($user){
    $con = getConnection();

    $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function addPost($post){
    $con = getConnection();

    $sql = "insert into post_requests values(
        null,
        '{$post['scout_id']}',
        '{$post['title']}',
        '{$post['short_history']}',
        '{$post['country_representation']}',
        '{$post['genre']}',
        '{$post['cost_level']}',
        '{$post['travel_medium_info']}',
        '{$post['image']}',
        'pending',
        null
    )";

    return mysqli_query($con, $sql);
}

function getMyPosts($id){
    $con = getConnection();

    return mysqli_query($con, "select * from post_requests where scout_id=$id");
}

function deletePost($id, $scout_id){

    $con = getConnection();

    $sql = "DELETE FROM post_requests 
            WHERE id=$id AND scout_id=$scout_id AND status='pending'";

    return mysqli_query($con, $sql);
}

function getPostById($id){
    $con = getConnection();

    $result = mysqli_query($con, "select * from post_requests where id=$id");

    return mysqli_fetch_assoc($result);
}

function updatePost($post){
    $con = getConnection();

    return mysqli_query($con, "update post_requests set
        title='{$post['title']}',
        short_history='{$post['short_history']}',
        country_representation='{$post['country_representation']}',
        genre='{$post['genre']}',
        cost_level='{$post['cost_level']}',
        travel_medium_info='{$post['travel_medium_info']}'
        where id={$post['id']}");
}
?>