
<?php
include "db.php";

// Check if ID is provided
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    // Delete the selected post
    mysqli_query($conn, "DELETE FROM posts WHERE id='$id'");
}

// Redirect back to the homepage
header("Location: index.php");
exit();
?>

