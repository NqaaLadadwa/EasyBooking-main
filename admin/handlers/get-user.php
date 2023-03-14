<?php
$sql="SELECT id,name,email,password, type, status, created_at FROM users where type='user'";
//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$userData=mysqli_fetch_all($sqlResult);



?>