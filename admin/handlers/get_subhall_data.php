<?php
require("db.php");
$hallId=$_GET['hallId'];
$_SESSION['hallId']=$hallId;
$sql="SELECT id,name,type,number_of_guests,price,hall_describtion,services FROM subhalls  where hall_id ='$hallId'";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);


?>