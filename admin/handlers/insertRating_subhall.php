<?php 
//connect to database
session_start();
require("db.php");

$rating=$_POST['rating'];
$user_id=$_POST['user_id'];
$hall_id=$_POST['hall_id'];
$description=$_POST['description'];

$errors=[];



    if (empty($errors)){

$sql="INSERT INTO rating(user_id,hall_id,rating_number,description) 
VALUES ('$user_id','$hall_id','$rating','$description')";
$sqlResult=mysqli_query($conn,$sql);
header("Refresh:0;URL=../../index.php");
    }else{

        header("Refresh:0;URL=../../rating_subhall.php");
    }
?>

