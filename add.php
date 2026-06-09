
<?php
session_start();
include "db.php";

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title,content)
            VALUES('$title','$content')";

    if(mysqli_query($conn,$sql))
    {
        header("Location:index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<center>

<h2>➕ Add New Post</h2>

<form method="POST">

<label><b>Title</b></label>

<br><br>

<input
type="text"
name="title"
placeholder="Enter Post Title"
required>

<br><br>

<label><b>Content</b></label>

<br><br>

<textarea
name="content"
rows="6"
placeholder="Enter Post Content"
required></textarea>

<br><br>

<input
type="submit"
name="submit"
value="Save Post">

</form>

<br>

<a href="index.php">⬅ Back to Home</a>

</center>

</div>

</body>
</html>

