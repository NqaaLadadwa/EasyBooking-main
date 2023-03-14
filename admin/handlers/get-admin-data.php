<?php
require("db.php");
$sql="SELECT id,name,email,type FROM admins where id=$userId";
$sqlResult=mysqli_query($conn,$sql);
$userData=mysqli_fetch_assoc($sqlResult);


?>