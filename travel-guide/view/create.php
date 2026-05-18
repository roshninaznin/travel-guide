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

<h2>Create Post</h2>

<form name="myform"  method="post" action="../controller/PostController.php?action=create" enctype="multipart/form-data" onsubmit="return validate()">
Title:
<input name="title">

History:
<textarea name="short_history"></textarea>

Country:
<input name="country_representation">

Genre:
<select name="genre">
    <option>beach</option>
    <option>mountain</option>
</select>

Cost:
<input name="cost_level">

Travel:
<input name="travel_medium_info">

Image:
<input type="file" name="image">

<input type="submit">

</form>

</div>

<script src="../assets/script.js"></script>
    
</body>
</html>


