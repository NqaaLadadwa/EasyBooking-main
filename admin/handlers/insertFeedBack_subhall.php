<?php 
//connect to database
session_start();
require("db.php");

$FeedBack=$_POST['FeedBack'];
$user_id=$_POST['user_id'];
$hall_id=$_POST['hall_id'];
$experience=$_POST['experience'];
$Recommendation=$_POST['Recommendation'];
$img=$_POST['img'];
$payment=$_POST['payment'];
$errors=[];



    if (empty($errors)){

$sql="INSERT INTO feedback_subhall(experience,Recommendation,halls_images_useful,payment_process  ,feedBack,user_id,hall_id) 
VALUES ('$experience','$Recommendation','$img','$payment','$FeedBack','$user_id','$hall_id')";
$sqlResult=mysqli_query($conn,$sql);
header("Refresh:0;URL=../../Feedbackthanks.php");
    }else{

        header("Refresh:0;URL=../../FeedBack_subhall.php");
    }
?>

