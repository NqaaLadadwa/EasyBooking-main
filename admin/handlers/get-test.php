<?php


$hall_id=$_GET['hallId'];

$test= $hall_id;

$sql1="SELECT h.id FROM subhalls h where h.hall_id ='$test'";

$sqlResult1=mysqli_query($conn,$sql1);


//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$hallData=mysqli_fetch_all($sqlResult1);


?>