<?php
require("db.php");
$hallId=$_GET['hallId'];

$sql = "SELECT subhalls.id, subhalls.name, subhalls.type, subhalls.number_of_guests, 
subhalls.hall_describtion, subhalls.services,
 prices.Sunday, prices.Monday, prices.Tuesday, prices.Wednesday, prices.Thursday, prices.Friday, prices.Saturday
FROM subhalls
JOIN prices ON subhalls.id = prices.hall_id
WHERE subhalls.id = $hallId";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);

?>