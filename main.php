<?php
session_start();

$db=new mysqli("localhost","root","","training");
$username=$_SESSION['Email'];
if(!$db){
    echo"DB connec faild";
}
$error ="";

if ( isset($_POST['submit']) ) {

    $img = $_FILES["image"]["name"];
    $img1 = $_FILES["image"]["tmp_name"];

    $query = "UPDATE login SET img='$img' WHERE Email='$username'";
    $results = $db->query($query);
    $sql1 = "SELECT * FROM login where Email='$username'";
    $result1 = $db->query($sql1);
    if ($results === TRUE) {
        move_uploaded_file($img1, "picture\\" . $img);
        $row = $result1->fetch_assoc();
        // echo "<img src='picture//".$img."' alt=\"Smiley face\"/>";
        //  echo "done";
    }
}

//    $FirstName =  $_POST['FirstName'];
//    $LastName =  $_POST['LastName'];
//    $email =  $_POST['Email'];
//    $password_1 =  $_POST['password_1'];
//    $password_2 =  $_POST['password_2'];









?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/398a01c39a.js" crossorigin="anonymous"></script>
</head>
<body>
<form action="main.php" method="post" enctype="multipart/form-data">
<div class="center">
    <div class="avatar">
        <?php

        $q="select img from login WHERE Email='$username'";
        $result1 = $db->query($q);
        if($result1!=='') {
            $row = $result1->fetch_assoc();
            echo "<div style=''>";
            echo "<img src='picture//" . $row['img'] . "' alt=\"Smiley face\" />";
            echo"</div>";
        }
        else {
            ?>

            <img src="person.jpg" alt="" style="height: 90%; width: 90%">
            <?php
        }
        ?>
    </div>
    <input type="file" name="image"   value="Edit ">
    <button type="submit" name="submit">UPLOAD IMAGE</button>
    <div class="content">
    <div>
        <h1>
        <?php
        $q="select * from login WHERE Email='$username'";
        $result1 = $db->query($q);
        $row = $result1->fetch_assoc();

        echo  $row['FirstName'] ." ". $row['LastName'];

        ?>
        </h1>
    </div>
        <div>
            <h2>
                <?php
                $q="select * from login WHERE Email='$username'";
                $result1 = $db->query($q);
                $row = $result1->fetch_assoc();

                echo  $row['Email'] ;

                ?>
            </h2>
        </div>


    </div>
</div>
</form>
</body>
</html>



