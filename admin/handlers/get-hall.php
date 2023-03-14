<?php

$sql="SELECT id,name,type,city,address,hall_describtion,status FROM halls";

//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$hallData=mysqli_fetch_all($sqlResult);

?>