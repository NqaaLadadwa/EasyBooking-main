<?php
require("db.php");
$sql="SELECT id,name,type, city,address, hall_describtion FROM halls where id=$hallId";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);


?>