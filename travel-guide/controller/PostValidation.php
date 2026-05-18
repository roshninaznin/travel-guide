<?php

function validatePost($data, $file){

    if($data['title'] == ""){
        return "Title required!";
    }

    if($data['short_history'] == ""){
        return "History required!";
    }

    if($data['country_representation'] == ""){
        return "Country required!";
    }

    if($data['genre'] == ""){
        return "Genre required!";
    }

    if($data['cost_level'] == ""){
        return "Cost required!";
    }

    if($data['travel_medium_info'] == ""){
        return "Travel info required!";
    }

    if($file['image']['name'] == ""){
        return "Image required!";
    }

    $ext = strtolower(pathinfo($file['image']['name'], PATHINFO_EXTENSION));

    if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        return "Only jpg, jpeg, png allowed!";
    }

    return true;
}

?>
