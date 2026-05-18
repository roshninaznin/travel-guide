<?php
session_start();
require_once('../model/PostModel.php');
require_once('PostValidation.php');

$action = $_GET['action'];

if($action == "login"){

    $user = login($_POST);

    if($user){

        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        header("location: ../view/dashboard.php");
    }else{
        echo "Login Failed";
    }
}

if($action == "create"){

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/posts/".$img);

    $post = [
        "scout_id" => $_SESSION['id'],
        "title" => $_POST['title'],
        "short_history" => $_POST['short_history'],
        "country_representation" => $_POST['country_representation'],
        "genre" => $_POST['genre'],
        "cost_level" => $_POST['cost_level'],
        "travel_medium_info" => $_POST['travel_medium_info'],
        "image" => $img
    ];

    addPost($post);

    header("location: ../view/my_requests.php");
}


if($action == "delete"){

    session_start();

    $id = $_POST['id'];
    $scout_id = $_SESSION['id'];

    $result = deletePost($id, $scout_id);

    if($result){
        echo json_encode([
            "status" => "success",
            "id" => $id
        ]);
    }else{
        echo json_encode([
            "status" => "error"
        ]);
    }
}

if($action == "update"){
    updatePost($_POST);
    header("location: ../view/my_requests.php");
}
?>