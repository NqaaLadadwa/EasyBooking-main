<?php
$sql="SELECT f.id, f.FeedBack, u.name
FROM feedbacks f
INNER JOIN users u
ON f.user_id = u.id";

//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$feedbackData=mysqli_fetch_all($sqlResult);



?>