<?php
include "db.php";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "Registration Successful! <a href='login.php'>Login</a>";
    }
    else
    {
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>User Registration</h2>

<form method="POST">

Username:<br>
<input type="text" name="username" required><br><br>

Password:<br>
<input type="password" name="password" required><br><br>

<input type="submit" name="register" value="Register">

</form>

<br>

<a href="login.php">Already have an account? Login</a>

</body>
</html>