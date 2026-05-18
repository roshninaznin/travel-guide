<?php
session_start();
require_once('../model/PostModel.php');

$result = getMyPosts($_SESSION['id']);

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
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="container3">

<h2>My Requests</h2>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<h3><?php echo $row['title']; ?></h3>
<p><?php echo $row['short_history']; ?></p>
<p><?php echo $row['country_representation']; ?></p>
<p><?php echo $row['genre']; ?></p>
<p><?php echo $row['cost_level']; ?></p>
<p><?php echo $row['travel_medium_info']; ?></p>
<img src="../uploads/posts/<?php echo $row['image']; ?>" width="200">

<p style="color:black ; font-weight: bolder">Status: <?php echo $row['status']; ?></p>

<div id="edt_btn" >
    <a href="edit.php?id=<?php echo $row['id']; ?>" >Edit</a>
</div>

<div class="post-box">

    <button class="delete-btn" data-id="<?php echo $row['id']; ?>">
        Delete
    </button>

</div><hr>

<?php } ?>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let buttons = document.querySelectorAll(".delete-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", function () {

            let postId = this.getAttribute("data-id");

            if(!confirm("Are you sure?")){
                return;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/PostController.php?action=delete", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onload = function () {

                if(xhr.status == 200){

                    let res = JSON.parse(xhr.responseText);

                    if(res.status == "success"){
                        btn.closest(".post-box").remove();
                    }else{
                        alert("Delete failed!");
                    }

                }else{
                    alert("Server error!");
                }
            };

            xhr.send("id=" + postId);
        });
    });

});
</script>
