<?php
require("db.php");
$sql="SELECT id,name,email,password, type, status, created_at FROM users where id=$userId";
$sqlResult=mysqli_query($conn,$sql);
$userData=mysqli_fetch_assoc($sqlResult);
?>