<?php ob_start();
session_start();
$id= $_SESSION['userId'];
require("handlers/db.php");
require("handlers/get-reservation.php");
$sql= "SELECT s.name,r.event_type,r.number_guests,r.date,r.start_time,r.end_time,r.notes,r.status,r.user_id,r.id
FROM reservations r
JOIN subhalls s ON r.hall_id = s.id
JOIN halls h ON s.hall_id = h.id
WHERE h.user_id = '$id' ";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$reservation=mysqli_fetch_all($query,MYSQLI_ASSOC);
$flag=false;

}
require("inc/header.php");
?>

 
<main role="main" class="flex-shrink-0 ">
        <div class="container">
        <br>
            <h1>List of Reservations</h1>
            <br>

        <br>

       
            
            <table class="table table-bordered text-center justify-content-start">
                <thead  class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hall name</th>
                    <th scope="col">Event Type</th>  
                    <th scope="col">Number of guests</th>        
                    <th scope="col"style="width:17%">Date</th>
                    <th scope="col">Starting Time</th>
                    <th scope="col">Ending Time</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Status</th>
                    <th scope="col"style="width:17%">Action</th>
                   
                 
                    
                    </tr>
                </thead>
                <tbody>

<?php

if(isset($reservation)){



foreach($reservationData as $index=>$reservation){?>


    <tr>
    <td><?=$index+1;?></td>
    <td><?=$reservation[0];?></td>
    <td><?php if($reservation[1]=='2'){
      echo "Wedding";}
      else if($reservation[1]=='3'){
        echo "Birthday Party";}
        else if($reservation[1]=='4'){
          echo "Consolation";}
          else if($reservation[1]=='5'){
            echo "Shower Party";}
            else if($reservation[1]=='6'){
              echo "Graduation party";}
              else if($reservation[1]=='7'){
                echo "Welcome party";}
                else if($reservation[1]=='8'){
                  echo "Gender reveal party";}
                  else if($reservation[1]=='9'){
                    echo "Meeting";}
                    else if($reservation[1]=='10'){
                      echo "Honoring Ceremony";}?></td>
    

    <td><?=$reservation[2];?></td>
    <td><?=$reservation[3];?></td>
    <td><?=$reservation[4];?></td>
    <td><?=$reservation[5];?></td>
    <td><?=$reservation[6];?></td>
    <td><?=$reservation[7];?></td>
    <?php if($reservation[7]== 'pending'){?>
      
      <?php $flag=true; } ?>
    
    <form action="ShowReservations.php" method='post'>
      
    <input type='hidden' name='id' value='<?php echo $reservation[9]?>'>
    <?php if($flag==true){?>
    <td><input  type='submit' name='approve' value='Accept' class="btn btn-success">
    <input type='submit' name='decline' value='Decline' class="btn btn-danger"></td>
<?php } ?>
  </form>


    </tr>
<?php }



}
else{?>
  <tr>
    <td colspan="6" class="text-center">No Reservation Added</td>
  </tr>
  <?php
} ?>
               
        </tbody>
    </table>

                
<?php if(isset($_POST['approve'])){

    $id = $_POST['id'];
    $sql="UPDATE reservations set status='approved' where id='$id'";
    $query=mysqli_query($conn,$sql);
    header("Refresh:0");
  
}

if(isset($_POST['decline'])){

  $id = $_POST['id'];
  $sql="UPDATE reservations set status='canceled' where id='$id'";
  $query=mysqli_query($conn,$sql);
  header("Refresh:0");


}



?>
            <ul class="navbar-nav mr-auto">
               
       

           </ul>
        </div>

    </main>


  <?php 
require("inc/footer.php");
ob_end_flush();
?>