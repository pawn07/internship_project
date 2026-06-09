
<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM posts WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query(
        $conn,
        "UPDATE posts
        SET title='$title',
        content='$content'
        WHERE id=$id"
    );

    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<center>

<h2>✏️ Edit Post</h2>

<form method="POST">

<label><b>Title</b></label>

<br><br>

<input
type="text"
name="title"
value="<?php echo $row['title']; ?>"
placeholder="Enter Post Title"
required>

<br><br>

<label><b>Content</b></label>

<br><br>

<textarea
name="content"
rows="6"
placeholder="Enter Post Content"
required><?php echo $row['content']; ?></textarea>

<br><br>

<input
type="submit"
name="update"
value="Update Post">

</form>

<br>

<a href="index.php">⬅ Back to Home</a>

</center>

</div>

</body>
</html>

