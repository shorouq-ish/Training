<?php
$db=new mysqli("localhost","root","","training");

if(isset($_GET['vkey'])){
$vkey=$_GET['vkey'];
$result = $db->query("select verified, vkey From login WHERE verified= 0 AND vkey='$vkey'");
if($result->num_rows ==1){
    $update = $db->query("update login set verified = 1 where verified= 0 AND vkey = '$vkey'");
    if($update){
        echo "verified";
        header('location: main.php');
    }
}
}
?>