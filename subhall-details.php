<?php
      session_start();
      if(isset($_POST['subhall'])){
      $shallId=$_POST['subhall']; }
      elseif(isset($_GET['shallId'])){
      $shallId=$_GET['shallId']; }
?>
<!DOCTYPE html>
<html lang="en">


<?php require ('inc/head.php'); ?>

<body>

<?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 

  

    if(isset($_SESSION['userId'])){
    $userid=$_SESSION['userId'];

    require ('inc/LoginHeader.php'); 

  

    }else{

        $userid='null';
    
        require ('inc/Header.php'); 
    }
    
  
    

  
    require("admin/handlers/db.php");
    $sql="SELECT * FROM subhalls where id=$shallId ";
    $sqlResult=mysqli_query($conn,$sql);
    $shallData=mysqli_fetch_assoc($sqlResult);

    $sql= "SELECT * FROM images where subhall_id=$shallId";
    $query = mysqli_query($conn,$sql);
    
    require("admin/handlers/get_feedback_subhall.php");

    $sql1="SELECT * FROM feedback_subhall WHERE feedback != '' AND hall_id=$shallId ORDER BY id DESC;
    ";
    $query1=mysqli_query($conn,$sql1);
    $users=mysqli_fetch_all($query1,MYSQLI_ASSOC);
    
    $sql2="SELECT * From reservations where hall_id=$shallId and user_id=$userid";
    $query2=mysqli_query($conn,$sql2);
    $reservations=mysqli_fetch_all($query2,MYSQLI_ASSOC);

    $sql3="SELECT MIN(LEAST(Sunday, Monday,Tuesday,Wednesday,Thursday,Friday,Saturday)) as min_price,MAX(GREATEST(Sunday, Monday,Tuesday,Wednesday,Thursday,Friday,Saturday)) as max_price
    FROM prices
    WHERE hall_id = $shallId;
    ";
    $query3=mysqli_query($conn,$sql3);
   
    $price = mysqli_fetch_assoc($query3);
   // $result = // result of the query

    $min_price =  $price['min_price'];
    $max_price =  $price['max_price'];
    


	include_once 'rating.php';

	$rating = new Rating();
	$average = $rating->getRatingAverage($shallId);
	$count = $rating->getRatingTotal($shallId);
	
    
    
    ?>

<head>
<link rel="stylesheet" href="assets/css/rating.css">
</head>
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-wedding">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Hall's Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hall's Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Room & Suits start============= -->
    <div class="room-suits-details-page pt-120 mb-120">
        <div class="container">
            <div class="row mb-120 g-5">
                <div class="col-lg-7">
                    <div class="swiper room-details-slider mb-30">
                        <div class="swiper-wrapper">
                            
                                <?php   
                                if($query->num_rows>0){
                                while($row=mysqli_fetch_array($query)){
                                
                                ?>
                                <div class="swiper-slide">
                                    <div class="rooms-imeges">
                                    <img class="img-fluid" src="admin/HallsImages/<?php echo $row["image"]; ?>" alt="">
                                    </div>
                                </div>
                                    <?php
                                }
                                }else{?>
                                
                                <p>No image(s) found...</p>
                                <?php
                                }
                                ?> 
                               
                           
                        </div>
                        <div class="swiper-btns d-flex align-items-center justify-content-between">
                            <div class="swiper-button-prev-m"><i class="bi bi-chevron-left"></i></div>
                            <div class="swiper-button-next-m"><i class="bi bi-chevron-right"></i></div>
                        </div>
                    </div>
               
                    <h2><?php echo $shallData['name'] ?></h2>
                    <ul class="stars d-flex align-items-center">
                    <?php



//$averageRating = round($average, 0);
for ($i = 1; $i <= 5; $i++) {
    $ratingClass = "star-grey";
    if($i <= $average) {
						$ratingClass = "star-highlight";
					}
   

echo	'<i class="fa fa-star '.$ratingClass. '"; aria-hidden="true"></i>';

 }
 echo $count . ' Review/s';

?>
                    </ul>
                
                    <h4>Price</h4>
                    <ul<p><?php echo $min_price?>₪ - <?php echo $max_price?>₪</p></ul>
                 
                    <h4>Capacity</h4>
                    <ul<p><?php echo $shallData['number_of_guests']?> Guest</p></ul>
                 
                    <h4>Extra Services</h4>
                    <ul<p><?php echo $shallData['services']?></p>

                    
                    
                </ul>
                <br>
  <br> <br>
  <br>
                    <h3><?php echo $shallData['name'] ?>  Calendar</h3>
                    <br> <br>
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
  <br>
     <div class="btn-group">
<div style="width: 25px; height: 25px; background-color:#00D700; border-radius: 15px;"></div>
<p> &nbsp;Approved Reservation&nbsp;&nbsp;</p>
<div style="width: 25px; height: 25px; background-color:#D70000; border-radius: 15px;"></div>
<p> &nbsp;Pended Reservation</p>
</div>
                </div>
                <div class="col-lg-5">
               
  <br>
  <br>
             <div class="widget-area2">
                        <div class="widget-title">
                            <h5>Want A Reservation?</h5>
                        </div>
                        <div class="single-widgets booking-widgets">
                            
                            <div class="section-title1 text-center">
                               <span> <a class="btn--primary6" href="admin/handlers/bookchecklogin.php?shallId=<?= $shallId ?>">Book Now</a> </span>
                            </div>
                            
                        </div>
                    </div>
<br>
<br>
<br>
<br>

                </div>
                
            </div>
           
        </div>
    </div>


    <div class="row">

        <div class="home-one-testimonial mb-120">
            
        <div class="container">
            
            <div class="row">
                
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Testimonial</span>
                        <h2>What Our Guest Say</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="swiper testimonial-slider-1">
                    <div class="swiper-wrapper">
                    <?php

if(isset($users)){


    //here we go to delete page and نمرر parameter 
    //strtotime convert string to time 
//index is a proparities for foreach that give me a chance to give a correct id
//ican sent more than one parametrers by &
 /*sent data in get way in search*/

foreach($feedbackData as $index=>$users){?>


                        <div class="swiper-slide">
                            <div class="testimonial-wrrap">
                                <img src="assets/images/icons/left-quote.svg" alt="">
                                <div class="content">
                                
                                    <p><?=$users[1];?> </p>
                                    <div class="author-review-area d-flex justify-content-between align-items-center flex-erap">
                                    <div class="authot-area d-flex align-items-center">
                                        <div class="author-img">
                                            <br/>
                                        <img  width="50" height="50" src="assets/images/icons/user1.svg">
                                        </div>
                                    <div class="author-name-deg">
                                            <h4><?=$users[2];?></h4>
                                            </div>
                                </div>
                                </div>
                                </div>
                 
                            </div>
                        </div>
                        <?php }

}?>



</div>
                </div>
                <div class="row align-items-center pt-80">
                <div class="col-lg-4">
                    <div class="swiper-btn-left">
                       <div class="btns swiper-button-prev-e">
                        <svg width="26" height="13" viewBox="0 0 26 13" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.26821 12.5247C7.57342 12.4319 7.74572 12.1194 7.66696 11.807C7.64727 11.7142 6.82514 10.8695 5.21536 9.26803L2.79823 6.86094L14.1996 6.85117L25.6059 6.83652L25.7437 6.73399C25.8176 6.68028 25.916 6.54357 25.9554 6.43127C26.0194 6.25062 26.0145 6.21156 25.9407 6.0602C25.8964 5.96743 25.7979 5.85025 25.7241 5.80143C25.5961 5.71842 25.0693 5.71354 14.1947 5.69889L2.79823 5.68913L5.19075 3.30645C6.51008 1.99793 7.6128 0.865182 7.63742 0.791944C7.76049 0.474579 7.63742 0.176744 7.3322 0.0497979C6.9876 -0.0917957 7.05652 -0.150386 3.8468 3.03791C1.82843 5.03976 0.843853 6.05044 0.824161 6.14321C0.80447 6.21645 0.80447 6.33363 0.824161 6.41175C0.843853 6.49964 1.8235 7.50544 3.81727 9.49263C6.34763 12.0071 6.9876 12.6077 7.11067 12.5686C7.12052 12.5686 7.18944 12.5442 7.26821 12.5247Z" />
                        </svg>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="contents">
                        <p>We always keep them happy</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="swiper-btn-right">
                        <div class="btns swiper-button-next-e">
                            <svg width="26" height="14" viewBox="0 0 26 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0947 0.759911C18.7901 0.852686 18.6181 1.16519 18.6967 1.47769C18.7164 1.57046 19.5369 2.4152 21.1437 4.01677L23.5562 6.42402L12.1765 6.43379L0.791783 6.44844L0.654204 6.55098C0.580501 6.60469 0.48223 6.74141 0.442921 6.85372C0.379045 7.03438 0.383959 7.07344 0.457662 7.22481C0.501884 7.31759 0.600155 7.43477 0.673858 7.4836C0.80161 7.56661 1.32736 7.57149 12.1814 7.58614L23.5562 7.59591L21.1682 9.97874C19.8514 11.2873 18.7508 12.4202 18.7262 12.4934C18.6034 12.8108 18.7262 13.1086 19.0309 13.2356C19.3748 13.3772 19.306 13.4358 22.5096 10.2473C24.5242 8.24532 25.5069 7.23457 25.5266 7.1418C25.5462 7.06856 25.5462 6.95137 25.5266 6.87324C25.5069 6.78535 24.5291 5.77948 22.5391 3.79216C20.0136 1.27749 19.3748 0.676902 19.252 0.715965C19.2421 0.715965 19.1733 0.74038 19.0947 0.759911Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
            
            <br>
            </br>

            <?php 
            
            foreach($reservations as $index=> $reservation){

                if($reservation['status']=='approved'){
                 $_SESSION['$flag']= true;
                } 
             }
            
            ?>



            <div class="col-13">
                    <div class="section-title1 text-center">
                    </div>
                    <div class="section-title1 text-center">
                    <?php if(isset( $_SESSION['errors_h'])){?>
                    <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errors_h'];?> </div>
                    <?php unset($_SESSION['errors_h']); }?>
                    </div>
                    
            </div>

            <?php if(isset( $_SESSION['errors'])){
            ?>
             <div class="section-title1 text-center">
             <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errors'];?> </div>  
            </div>
             <?php       
            unset($_SESSION['errors']);
          } ?>

         </div>
     </div>
    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>