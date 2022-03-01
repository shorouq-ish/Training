<?php
session_start();

$db=new mysqli("localhost","root","","training");
if(!$db){
    echo"DB connec faild";
}

if(isset($_POST["submit"])){
    $username =  $_POST['username'];
    $password =  $_POST['password'];

    $query = "SELECT * FROM login WHERE Email='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    $row = $results->fetch_assoc();
    $count = mysqli_num_rows($results);
    echo $count;
if ( $count >= 1) {
    $_SESSION['Email'] = $username;
    $verified = $row['verified'];
    if($verified){
        header('location: main.php');
    }



}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link rel="stylesheet" href="CSS/login.css">

</head>
<body>

<div class="center">
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <div class="textfield">
            <input name="username" type="text" required>
            <span></span>
            <label>Username</label>
        </div>

        <div class="textfield">
            <input name="password" type="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <div class="pass">
            Forgot Password
        </div>
        <input name="submit" type="submit" value="Login">
        <div class="signup_link">
            Not a member? <a href="signup.php">Signup</a>
        </div>
    </form>
</div>

</body>
</html>
