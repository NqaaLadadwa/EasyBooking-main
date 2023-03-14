<?php 
//connect to database
session_start();
require("db.php");



$type=strip_tags(trim($_POST['event_type']));
$number_of_guests=strip_tags(trim($_POST['number_guest']));
$date = strip_tags(trim($_POST['date']));
$newDate = date("Y-m-d", strtotime($date));
$start_time = strip_tags(trim($_POST['start_time']));
$end_time = strip_tags(trim($_POST['end_time']));
$notes=strip_tags(trim($_POST['notes']));
$shallId= strip_tags(trim($_POST['shallId']));

$sql="SELECT * FROM subhalls where id=$shallId";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);

$userId= $_SESSION['userId'];
$errors=[];

function is_decimal( $val )
{
    return is_numeric( $val ) && floor( $val ) != $val;
}


//Validation
if($type=='1'){
$errors[]="Event type is required";
}

if($number_of_guests=='1'){
    $errors[]="Number of guests is required";
    }   elseif($number_of_guests > $hallData['number_of_guests']){
        $errors[]="This hall is not suitable for your guests number!";

    }

    if(empty($date)){
        $errors[]="date is required";
        }elseif($newDate=='1970-01-01'){
            $errors[]="Not a Valid Date";

        }

        if(empty($start_time and $end_time)){
            $errors[]="Times are required";
            }elseif($start_time=='-1:-1' or $end_time=='-1:-1'){
                $errors[]="Time is not Valid!";

            }
   
            $day = date("l", strtotime($date));
           
            $pricesql= "SELECT $day
            FROM prices
            WHERE hall_id = $shallId
            ";
            $priceResult = mysqli_query($conn,  $pricesql);
          
            $price = mysqli_fetch_assoc($priceResult);
        
            $price = $price[$day];

     
// Check for conflicting reservations
$checkSql = "SELECT * FROM reservations WHERE hall_id = '$shallId' AND date = '$newDate' AND (('$start_time' BETWEEN start_time AND end_time) OR ('$end_time' BETWEEN start_time AND end_time)) And (status='approved' or status='pending')";
$checkResult = mysqli_query($conn, $checkSql);
if (mysqli_num_rows($checkResult) > 0) {
  $errors[] = "Sorry, the selected hall is already reserved for that date and time.";
}
// Calculate the duration of the reservation in minutes
$start_timestamp = strtotime($start_time);
$end_timestamp = strtotime($end_time);
$reservation_duration_minutes = ($end_timestamp - $start_timestamp) / 60;

if ($reservation_duration_minutes < 60) {
  $errors[] = "Reservation duration must be at least 1 hour.";
}


if (empty($errors)){
    
   
   
    //insert data in database
    $sql="INSERT INTO reservations(event_type, number_guests,date,start_time, end_time, notes, hall_id,user_id,price) 
    VALUES ('$type','$number_of_guests','$newDate','$start_time','$end_time','$notes','$shallId','$userId','$price')";
//check if added and make alert that tell user that added and return to insert bage
if($sqlResult=mysqli_query($conn,$sql)){
    $reservation_id = mysqli_insert_id($conn);
    $_SESSION['success']="Reservation added successfully";
header("Refresh:0;URL=../../payment.php?price=$price&hall_id=$shallId&user_id=$userId&reservation_id=$reservation_id");

    }


}else{
$_SESSION['errors']="error while inserted";

$_SESSION['errors']=$errors;
   header("Refresh:0;URL=../../book.php?shallId=$shallId");

}

?>