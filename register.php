
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
        echo "<p style='color:green;text-align:center;'>
        Registration Successful!
        <br><br>
        <a href='login.php'>Click here to Login</a>
        </p>";
    }
    else
    {
        echo "<p style='color:red;text-align:center;'>
        Registration Failed!
        </p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<center>

<h2>📝 User Registration</h2>

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
name="register"
value="Register">

</form>

<br>

<a href="login.php">Already have an account? Login</a>

</center>

</div>

</body>
</html>

