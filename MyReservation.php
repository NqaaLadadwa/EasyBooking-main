<?php 
session_start();
$user_id= $_SESSION['userId']; 

require ('inc/head.php');
//(reservations.date > NOW() OR reservations.date = NOW()) 
require("admin/handlers/db.php");

$sql1="SELECT subhalls.name as hall_name, reservations.date, reservations.start_time, reservations.end_time ,reservations.hall_id,reservations.created_at,reservations.status,reservations.id,reservations.price,reservations.hall_id,reservations.user_id
FROM reservations 
JOIN subhalls ON reservations.hall_id = subhalls.id 
WHERE reservations.user_id =$user_id 
ORDER BY reservations.date DESC;

";

$sqlResult=mysqli_query($conn,$sql1);

$feedbackData=mysqli_fetch_all($sqlResult);
$sql="SELECT subhalls.name as hall_name, reservations.date, reservations.start_time, reservations.end_time ,reservations.hall_id,reservations.created_at,reservations.status,reservations.id
FROM reservations 
JOIN subhalls ON reservations.hall_id = subhalls.id
WHERE   reservations.user_id =$user_id
ORDER BY reservations.date DESC

 ";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$feedback=mysqli_fetch_all($query,MYSQLI_ASSOC);


}





?>

<!DOCTYPE html>
<html lang="en">



<body>
    <?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 

 ?>
     <?php

if(isset($_SESSION['userId'])){
$userid=$_SESSION['userId'];

require ('inc/LoginHeader.php'); 
}else{

     require ('inc/Header.php'); 
}

?>
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-about ">

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">My Reservations</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Reservations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->


    <!-- ========== Room & Suits start============= -->
    <div class="contact-page mb-120  overflow-hidden">
        <div class="container-fluid px-0">
     
        </div>
   
                <div class="container">
                    <br>
                    <br>
  <h2>My Reservations</h2>
  <br>
  <br>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Hall Name</div>
  
      <div class="col col-2">Reservation Date</div>
      <div class="col col-3">Start Time</div>
      <div class="col col-4">End Time</div>
    
      <div class="col col-5">Action</div>
    </li>
    <?php

if(isset($feedback)){
$current_date = date("Y-m-d");


foreach($feedbackData as $index=>$feedback){?>
    <li class="table-row">
      <div class="col col-1" data-label="Hallname"><a href="subhall-details.php?shallId=<?=$feedback[4];?>"><?=$feedback[0];?></a></div>
      <div class="col col-2" data-label="Date"><?=$feedback[1];?></div>
      <div class="col col-3" data-label="Staer_time"><?=$feedback[2];?></div>
      <div class="col col-4" data-label="End_time"><?=$feedback[3];?></div>



      <?php
if ($feedback[6]=="approved"){
  if ($feedback[1]< $current_date){
?> 
    <div class="col col-5" data-label="Feedback">    
      <button class="font-weight-bold btn btn-outline-Dark" onclick="window.location.href='FeedBack_subhall.php?shallId=<?= $feedback[4]; ?>';">
        Feedback
      </button>  
    </div>
<?php
  } else {
    if(isset($_POST['cancel' . $feedback[7]])) {
      $sql="UPDATE reservations set status='canceled' where id='" . $feedback[7] . "'";
      $query=mysqli_query($conn,$sql);
      // Display a success message to the user
      echo "Reservation successfully canceled.";
    }
?>
    <div class="col col-5" data-label="Cancel"> 
      <form action="" method="post">
        <button class="font-weight-bold btn btn-outline-Dark" type="submit" name="cancel<?= $feedback[7] ?>" id="cancel<?= $feedback[7] ?>" >CANCEL</button>
      </form>
    </div>
<?php
  }
}




if ($feedback[6]=="canceled"){
  ?>
  <div class="col col-5 d-flex justify-content-center">
    <i>CANCELED</i>
  </div> 
  <?php
} else {
  if ($feedback[6]=="pending"){
  
    $olddate=$feedback[5];
    $afterTomorrow = date("Y-m-d", strtotime("+2 days", strtotime($olddate)));
    if ($current_date==$afterTomorrow){
      $sql="UPDATE reservations set status='canceled' where id='$feedback[7]'";
      $query=mysqli_query($conn,$sql);
      // update the $feedback array with the new status
      $feedback[6] = 'canceled';
      ?>
      <div class="col col-5 d-flex justify-content-center">
        <i>CANCELED due to not pay</i>
      </div>
      <?php
    }
  }
}

if ($feedback[6]=="pending" && $feedback[1]>$current_date ){
  
   if(isset($_POST['cancel' . $feedback[7]])) {
      $sql="UPDATE reservations set status='canceled' where id='" . $feedback[7] . "'";
      $query=mysqli_query($conn,$sql);
      // Display a success message to the user
      echo "Reservation successfully canceled.";
    }
?>

  
  <div class="col col-5 d-flex justify-content-center">
  <button style="height:39px;"  class="font-weight-bold btn btn-outline-Dark" type="submit" name="payment" id="payment"onclick="window.location.href='payment.php?price=<?= $feedback[8]; ?>&hall_id=<?= $feedback[10]; ?>&user_id=<?= $feedback[9]; ?>&reservation_id=<?= $feedback[7]; ?>';" >Payment</button>

  <form action="" method="post">
     
  <button class="font-weight-bold btn btn-outline-Dark" type="submit" name="cancel<?= $feedback[7] ?>" id="cancel<?= $feedback[7] ?>" >CANCEL</button>
      </form>
                                 
                         </div>
                         <div class="col col-5" data-label="Cancel"> 

    </div>
  <?php
  
  }




}
?>  </ul>
<?php
}
else{?>
  <tr>
  <div class="col col-5" data-label="Cancel">            No Reservations</div>
   
  </tr>
  <?php
} ?>
</div>
    
                




  





    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>
</body>

</html>














