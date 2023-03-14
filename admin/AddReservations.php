<?php session_start();
require("handlers/db.php");
require("inc/header.php");
$shallId=$_GET['hallId'];
$sql="SELECT * FROM subhalls where id=$shallId ";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);
$hallid= $hallData['hall_id'];
$sql="SELECT * FROM halls where id=$hallid";
$sqlResult=mysqli_query($conn,$sql);
$hall=mysqli_fetch_assoc($sqlResult);


?>


    <main role="main" class="flex-shrink-0">
        <div class="container">
     
            <?php if(isset( $_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors']);
          }
          if(isset( $_SESSION['success'])){?>
         <div class="alert alert-success" role="alert"> <?php echo  $_SESSION['success'];?> </div>  
        <?php   unset($_SESSION['success']);
        }
          
          ?>
          
       <div class="row mb-80 g-8">
             
             <div class="col-lg-5">
             <div class="widget-area2">
                
       <div class="single-widgets booking-widgets">
       <form action="handlers/insert-reservationbyowner.php" enctype="multipart/form-data" method="POST">

   
       <h1>Add Reservation</h1>                     
<div class="wp-block-text__inside-wrapper select-items">

<select name ="event_type" class="custom-select" id="inputGroupSelect01" >
    <option selected value="1">choose event type</option>
    <?php if($hallData['type']!='2' ) { ?>
    <option value="2">Wedding</option>
    <option value="3">Birthday Party</option>
    
    <option value="4">Consolation</option>
    <option value="5">Shower Party</option>
    <option value="6">Graduation party</option>
    <option value="7">Welcome party</option>
    <option value="8">Gender reveal party</option>

    

 
    <?php } if($hallData['type']=='3' or $hallData['type']=='2'){?>
    <option value="9">Meeting</option>
    <option value="10"> Honoring Ceremony</option>
    <?php } ?>
</select>
 </div>




 <br>

 <div class="wp-block-text__inside-wrapper select-items">
 <input type="hidden"  name="shallId" value="<?= $hallData['id'];?>" >

<select name ="number_guest" class="custom-select" id="inputGroupSelect01" >
   <option selected value="1">Number of Guests</option>
   
   <option value="100">from 50 to 100 guests</option>
   <option value="200">from 100 to 200 guests</option>
   <option value="500">from 200 to 500 guests</option>
   <option value="1000">from 500 to 1000 guests</option>
 
</select>
</div>
<br>


<div class="wp-block-text__inside-wrapper select-items">
<label  class="font-weight-bold" for="start_date"><strong>Event Date: </strong> </label>

<input type="date" id="date" name="date" value="<?= 'null'?>">
<br><br>
<label  class="font-weight-bold" for="start_date"><strong>Start time: </strong> </label>

<input type="time" id="start_time" name="start_time" value="<?= 'null'?>">
<br><br>
<label  class="font-weight-bold" for="start_date"><strong>End time: </strong> </label>

<input type="time" id="end_time" name="end_time" value="<?= 'null'?>">
<br><br>
<div class="wp-block-text__inside-wrapper submit-btn">
<button type="submit" class="btn btn-dark">Book Now</button>
</div> 
</div>

</div> 
</div>

</div> 
<div class="col-lg-7">
        <style>

.dot {
height: 15px;
width: 15px;
background-color: #00D700;
border-radius: 40%;
display: inline-block;
}

</style>

                <div id='calendar'></div>
    <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.0/index.global.min.js "></script>



<script>
    
  var shallId = <?php echo json_encode($shallId); ?>;
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    height: 500,
    width: 100,
    initialView: 'timeGridWeek',
    headerToolbar: {
    left: 'prev,next today',
   
    center: 'title',
    right: 'timeGridWeek,timeGridDay' // user can switch between the two
  },

    events: 'calenderres.php?shallId='+shallId,
        
  

});

  calendar.render();
});

</script>
<div class="btn-group">
<div style="width: 25px; height: 25px; background-color:#00D700; border-radius: 15px;"></div>
<p> &nbsp;Approved Reservation&nbsp;&nbsp;</p>
<div style="width: 25px; height: 25px; background-color:#D70000; border-radius: 15px;"></div>
<p> &nbsp;Pended Reservation</p>
</div>
<br>       
         
       </div>  




  







<br>
</div>


</form>

          
        </div>
    </main>

<?php
require("inc/footer.php");

?>