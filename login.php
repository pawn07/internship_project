
<?php
session_start();
include "db.php";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['username']=$username;
            header("Location:index.php");
            exit();
        }
        else
        {
            echo "<p style='color:red;text-align:center;'>Wrong Password!</p>";
        }
    }
    else
    {
        echo "<p style='color:red;text-align:center;'>User not found!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<center>

<h2>🔐 User Login</h2>

<form method="POST">

<label><b>Username</b></label>
<br><br>

<input
type="text"
name="username"
placeholder="Enter Username"
required>

<br><br>

<label><b>Password</b></label>
<br><br>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<br><br>

<input
type="submit"
name="login"
value="Login">

</form>

<br>

<a href="register.php">Create New Account</a>

</center>

</div>

</body>
</html>
