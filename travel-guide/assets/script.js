function validate(){

    let title = document.forms["myform"]["title"].value;
    let history = document.forms["myform"]["short_history"].value;
    let country = document.forms["myform"]["country_representation"].value;
    let genre = document.forms["myform"]["genre"].value;
    let cost = document.forms["myform"]["cost_level"].value;
    let travel = document.forms["myform"]["travel_medium_info"].value;
    let image = document.forms["myform"]["image"].value;

    if(title == ""){
        alert("Title null!");
        return false;
    }

    if(history == ""){
        alert("History null!");
        return false;
    }

    if(country == ""){
        alert("Country null!");
        return false;
    }

    if(genre == ""){
        alert("Select genre!");
        return false;
    }

    if(cost == ""){
        alert("Cost null!");
        return false;
    }

    if(travel == ""){
        alert("Travel info null!");
        return false;
    }

    // Image validation
    if(image == ""){
        alert("Select image!");
        return false;
    }

    let ext = image.split('.').pop().toLowerCase();

    if(ext != "jpg" && ext != "jpeg" && ext != "png"){
        alert("Only jpg, jpeg, png allowed!");
        return false;
    }

    return true;
}

