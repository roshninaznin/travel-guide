<?php
session_start();
require_once('../model/PostModel.php');

$id = $_GET['id'];
$data = getPostById($id);

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


<link rel="stylesheet" href="../assets/style.css">

<div class="container2">

<h2>Edit Post Request</h2>

<form method="post" action="../controller/PostController.php?action=update">

<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

Title:
<input name="title" value="<?php echo $data['title']; ?>">

History:
<textarea name="short_history"><?php echo $data['short_history']; ?></textarea>

Country:
<input name="country_representation" value="<?php echo $data['country_representation']; ?>">

Genre:
<select name="genre">
    <option <?php if($data['genre']=="beach") echo "selected"; ?>>beach</option>
    <option <?php if($data['genre']=="mountain") echo "selected"; ?>>mountain</option>
</select>

Cost:
<input name="cost_level" value="<?php echo $data['cost_level']; ?>">

Travel:
<input name="travel_medium_info" value="<?php echo $data['travel_medium_info']; ?>">

<input type="submit" value="Update">

</form>

</div>
