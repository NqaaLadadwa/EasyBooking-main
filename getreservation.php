<?php
session_start();

require('admin/handlers/db.php'); 
$shallId = $_GET['shallId'];


$query = "SELECT cast(concat(date, ' ', start_time) as datetime) as start,cast(concat(date, ' ', end_time) as datetime)as end, start_time, end_time, hall_id,case when status='approved' then '#00D700' 
  else '#D70000'END as color, concat('Event from ', start_time, ' to ', end_time) as title
  FROM reservations
  WHERE hall_id=$shallId and (status='approved' or status='pending')
  ORDER BY end_time;
  

  ";
  $result = mysqli_query($conn, $query);
  $reservationArrays=array();
  while($reservation=mysqli_fetch_assoc($result)){
if(mysqli_num_rows($result)>0){
  
    array_push($reservationArrays,$reservation);
}

  }
  echo json_encode($reservationArrays);

  

  ?>