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
<h1 style="color:white;">Login</h1>

<form method="post" action="../controller/PostController.php?action=login">

Username:
<input name="username">

Password:
<input type="password" name="password">

<input type="submit" value="Login" >

</form>
</div>


    
</body>
</html>
