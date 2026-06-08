<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

include "db.php";

$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Blog CRUD</title>
</head>

<body>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>

<a href="add.php">Add New Post</a> |
<a href="logout.php">Logout</a>

<hr>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Title</th>
<th>Content</th>
<th>Created At</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['content']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

|

<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>