<?php
require("db.php");
$sql="SELECT id,name,icon FROM features where id=$featureId";
$sqlResult=mysqli_query($conn,$sql);
$featureData=mysqli_fetch_assoc($sqlResult);


?>