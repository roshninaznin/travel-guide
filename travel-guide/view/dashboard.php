<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit();
}

if($_SESSION['role'] != 'scout'){
    header("location: login.php");
    exit();
}

if($_SESSION['is_verified'] != 1){
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="../assets/style.css">

</head>
<body>

<div class="container">

<h1>Scout Dashboard</h1>  

<hr> <br><br>
<div id="flbox">
<div id="box">
    <a href="create.php">Create Request</a>
</div>

<div id="box">
<a href="my_requests.php">My Requests</a>
</div>

</div>

</div>
<div class="btn">
<a href="login.php"  >Logout </a>
</div>
</body>
</html>

