<?php
$test= $_SESSION['userId'];
$sql="SELECT h.id,h.name,h.type,h.city,h.address, h.hall_describtion,h.status FROM halls h where h.user_id ='$test'";


//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$hallData=mysqli_fetch_all($sqlResult);

?>