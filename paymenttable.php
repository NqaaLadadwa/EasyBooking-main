<?php
require("admin/handlers/db.php");

$payment_id= $_POST['payment_id'];
$user_id= $_POST['user_id'];
$hall_id= $_POST['hall_id'];
$price= $_POST['price'];
$name= $_POST['name'];
$reservation_id=$_POST['reservation_id'];
$flag=201;
$sql="INSERT INTO payments(payment_id,user_id, hall_id,price, name) 
VALUES ('$payment_id','$user_id','$hall_id','$price','$name')";
   $sqlResult=mysqli_query($conn,$sql);
   $sql2="UPDATE reservations SET status='approved' WHERE id=$reservation_id";
   $sqlResult2=mysqli_query($conn,$sql2)
?>