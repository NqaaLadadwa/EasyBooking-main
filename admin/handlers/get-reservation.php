<?php
$sql= "SELECT s.name,r.event_type,r.number_guests,r.date,r.start_time,r.end_time,r.notes,r.status,r.user_id,r.id
FROM reservations r
JOIN subhalls s ON r.hall_id = s.id
JOIN halls h ON s.hall_id = h.id
WHERE h.user_id = '$id' ";

//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$reservationData=mysqli_fetch_all($sqlResult);



?>