<?php
session_start();

$db=new mysqli("localhost","root","","training");
if(!$db){
    echo"DB connec faild";
}
$error ="";
echo "shorouq";
if ( isset($_POST['submit']) ) {

    $FirstName =  $_POST['FirstName'];
    $LastName =  $_POST['LastName'];
    $email =  $_POST['Email'];
    $password_1 =  $_POST['password_1'];
    $password_2 =  $_POST['password_2'];

    if($password_1 == $password_2 && $FirstName!="" && $LastName!= "" && $email!="" && $password_1!=""){
        $query = "Insert into login (FirstName,LastName, Email, Password)
        VALUES ('$FirstName', '$LastName', '$email', '$password_1')";

        mysqli_query($db, $query);
//        $user =mysqli_fetch_assoc($sql);
        header('location: main.php');

    }
    else {
        $error = "You have to fill all fields";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
<div class="center">
    <h1>Signup</h1>
    <form method="post" action="signup.php">
        <div class="textfield" >
            <input name="FirstName" type="text" required>
            <span></span>
            <label>FirstName</label>
        </div>

        <div class="textfield">
            <input name="LastName" type="text" required>
            <span></span>
            <label>LastName</label>
        </div>

        <div class="textfield">
            <input name="Email" type="text" required>
            <span></span>
            <label>Email</label>
        </div>

        <div class="textfield">
            <input name="password_1" type="password" required>
            <span></span>
            <label>Password</label>
        </div>

        <div class="textfield">
            <input name="password_2" type="password" required>
            <span></span>
            <label>confirm Password</label>
        </div>

        <div class="red-text">

        </div>

        <input name="submit" type="submit" value="Signup">

    </form>
</div>

</body>
</html>



