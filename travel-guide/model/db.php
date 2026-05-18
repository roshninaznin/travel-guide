<?php

function getConnection(){
    return mysqli_connect("localhost", "root", "", "travel_db");
}

?>