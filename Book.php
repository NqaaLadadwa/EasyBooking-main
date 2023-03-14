
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0">
    <script src="assets/js/fg.timepicker.js"></script>
    <link type="text/css" rel="stylesheet"  href="assets/css/fg.timepicker.css" />
</head>

<?php session_start();
require ('inc/head.php'); ?>

<body>
    <?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 

    

    if(isset($_SESSION['userId'])){
    $userid=$_SESSION['userId'];
   
    require ('inc/LoginHeader.php'); 
    }else{
    
         require ('inc/Header.php'); 
    }
    
  
    
    $shallId=$_GET['shallId'];
    
    require('admin/handlers/db.php');
    
    $sql= "SELECT * FROM images where subhall_id=$shallId";
    $query = mysqli_query($conn,$sql);

    $sql="SELECT * FROM subhalls where id=$shallId";
    $sqlResult=mysqli_query($conn,$sql);
    $hallData=mysqli_fetch_assoc($sqlResult);

   $hallid= $hallData['hall_id'];
   $sql="SELECT * FROM halls where id=$hallid";
   $sqlResult=mysqli_query($conn,$sql);
   $hall=mysqli_fetch_assoc($sqlResult);
    ?>
    <!-- ========== Breadcumb start============= -->
  
    

    <div class="breadcrumb-section-login">
        
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                <div class="hero-video">
                    
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Booking A Hall</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book</li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Room & Suits start============= -->
    <div class="room-suits-details-page pt-120 mb-120">
        <div class="container">
            <div class="row mb-80 g-8">
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
    initialView: 'timeGridWeek',
    headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'timeGridWeek,timeGridDay' // user can switch between the two
  },

    events: 'getreservation.php?shallId='+shallId,
        
  

});

  calendar.render();
});

</script>
<br>
<div class="btn-group">
<div style="width: 25px; height: 25px; background-color:#00D700; border-radius: 15px;"></div>
<p> &nbsp;Approved Reservation&nbsp;&nbsp;</p>
<div style="width: 25px; height: 25px; background-color:#D70000; border-radius: 15px;"></div>
<p> &nbsp;Pended Reservation</p>
</div>
<br>
                
                   
                </div>
                <div class="col-lg-5">
                <div class="widget-area2">
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
                        <div class="widget-title">
                            <h5>Book <?php echo $hall['name'];?> - <?php echo $hallData['name'];?></h5>
                        </div>
                        <div class="single-widgets booking-widgets">
                           
                        <form action="admin/handlers/insert-reservation.php" enctype="multipart/form-data" method="POST">

                        
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




                              

                            
                           
                                <div class="cwp-block-text__inside-wrapper">
  <div class="searchbox-input date-picker-input input__list">
    <input autocomplete="off" placeholder="Pick A Date" type="text" name="date" id="datepicker16" value="" class="claender">
  </div>


                                
                                <div class="row">
                                    <div class="col-xl-6">
                                    <div class="example" id="e2_std_input">


                                    <div  class="wp-block-text__inside-wrapper ">
            
                                    <input type="text" id="e2_input" name="start_time" placeholder="Starting Time">
                                    </div>
                                    <script>
                                    let e2TP = new fg.Timepicker({
                                    hoursStart:09,
                                    hoursEnd: 24,
                                    bindInput: document.getElementById('e2_input'),
                                    animatePopup: true});
                                    </script>
                                    </div>
                                        
                                    </div>

                                    <div class="col-xl-6"">
                                    <div class="example" id="e3_std_input">


                                    <div  class="wp-block-text__inside-wrapper ">
            
                                    <input type="text" id="e3_input"  name="end_time" placeholder="Ending Time">
                                    </div>
                                    <script>
                                   let e3TP = new fg.Timepicker({
                                   hoursStart:09,
                                   hoursEnd: 24,
                                   bindInput: document.getElementById('e3_input'),
                                   animatePopup: true,});

                                    </script>
                                    </div>
                                        
                                    </div>

                            
                                </div>



                            <div class="wp-block-text__inside-wrapper ">
                                <textarea name="notes" placeholder="Note (If Any)"></textarea>
                            </div>
                            
                            
                            <div id="results"></div>
                            
                            <br>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var hallId = <?php echo  $shallId; ?>;
    $('#datepicker16').on('change', function() {
      var date = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'price.php',
        data: { date: date, hallId: hallId },
        success: function(result) {
          $('#results').html(result);
        },
        error: function() {
          $('#results').html('An error occurred.');
        }
      });
    });
  });
</script>
                            <div class="wp-block-text__inside-wrapper submit-btn">
                                <button type="submit">Book Now</button>
                            </div> 
                        </form>


                        </div>
                   
                    </div>
     
                </div>
               
            </div>

        </div>
        
    </div>

    
    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>
</body>

</html>