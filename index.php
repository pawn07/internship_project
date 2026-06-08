<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

include "db.php";
$limit = 5;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($page - 1) * $limit;
$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];
}

$result = mysqli_query($conn,
"SELECT * FROM posts
WHERE title LIKE '%$search%'
OR content LIKE '%$search%'
ORDER BY id DESC
LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html>
<head>
<title>Blog CRUD</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
<form method="GET">
    <input type="text" name="search" placeholder="Search posts...">
    <input type="submit" value="Search">
</form>
<br>

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
<?php

$total_result = mysqli_query($conn, "SELECT * FROM posts");
$total_records = mysqli_num_rows($total_result);

$total_pages = ceil($total_records / $limit);

for($i = 1; $i <= $total_pages; $i++)
{
    echo "<a href='?page=$i'>$i</a> ";
}

?>

</body>
</html>