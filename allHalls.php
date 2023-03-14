<!DOCTYPE html>

<html lang="en">

<?php 
 session_start();
require ('inc/head.php'); ?>

<body>
<?php 
require ('inc/preloader_area.php');  

require("admin/handlers/db.php"); 


require("admin/handlers/get-hall.php");
$sql="SELECT * FROM halls where status='approved'";
$query1=mysqli_query($conn,$sql);
$halls=mysqli_fetch_all($query1,MYSQLI_ASSOC);

$sql="SELECT DISTINCT h.city FROM halls h";
$query=mysqli_query($conn,$sql);


?>


    <!-- ========== Top Bar start============= -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-bar-items">
                        <div class="email d-flex align-items-center">
                            <div class="email-icon">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_461_205)">
                                        <path
                                            d="M23.5117 3.30075H2.38674C1.04261 3.30075 -0.0507812 4.39414 -0.0507812 5.73827V20.3633C-0.0507812 21.7074 1.04261 22.8008 2.38674 22.8008H23.5117C24.8558 22.8008 25.9492 21.7074 25.9492 20.3633V5.73827C25.9492 4.39414 24.8558 3.30075 23.5117 3.30075ZM23.5117 4.92574C23.6221 4.92574 23.7271 4.94865 23.8231 4.98865L12.9492 14.4131L2.07526 4.98865C2.17127 4.9487 2.27629 4.92574 2.38668 4.92574H23.5117ZM23.5117 21.1757H2.38674C1.93844 21.1757 1.57421 20.8116 1.57421 20.3632V6.70547L12.4168 16.1024C12.57 16.2349 12.7596 16.3008 12.9492 16.3008C13.1388 16.3008 13.3285 16.2349 13.4816 16.1024L24.3242 6.70547V20.3633C24.3242 20.8116 23.96 21.1757 23.5117 21.1757Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="email-info">
                                <span>Email Now</span>
                                <h6><a href="mailto:example@gmail.com">EasyBooking@gmail.com</a></h6>
                            </div>
                        </div>
                         <div class="social-icon">
                            <ul class="d-flex align-items-center">
                                <li><a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class='bx bxl-pinterest-alt'></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a></li>
                            </ul>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Top Bar End============= -->

    <?php

if(isset($_SESSION['userId'])){
$userid=$_SESSION['userId'];



require ('inc/LoginHeader.php'); 
}else{

     require ('inc/Header.php'); 
}

?>
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-booking">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Our Halls</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Halls</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Home1 Room start============= -->
    

                <div class="our-room-section mb-120">
        <div class="container">
             <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        
                    </div>
                </div>
             </div>

             <div class="row g-4 justify-content-center">
                    
                <?php

if(isset($halls)){
foreach($halls as $index=>$hall){?>
 
    <div class="col-lg-4 col-md-6">
        <div class="single-room">
            <img class="img-fluid" src="admin/HallsImages/<?php echo $hall['image_view']?>" alt="">
            <div class="background"></div>
            <div class="room-content">
                
                <h3><a href="hall-details.php?hallId=<?= $hall['id'];?>"><?php echo $hall['name']?></a></h3>
                <div class="bed-and-person d-flex align-items-center">
                
                    <div class="persons">
                        <p><img src="assets/images/icons/location-svgrepo-com.svg" alt=""><?php echo $hall['city']?></p>
                    </div>
                </div>
                <div class="book-btn">
                    <a class="btn--primary2" href="hall-details.php?hallId=<?= $hall['id'];?>">View Now</a>
                </div>
            </div>
        </div>
    </div>
 

 <?php }



}   
else{?>
    <tr>
      <td colspan="6" class="text-center">No Halls Added</td>
    </tr>
    <?php
} ?>
                </div>
            </div>
           
            </div>
     
    <!-- ========== Home1 Room end============= -->
    <!-- ========== Home1 Footer Start============= -->
    <?php require ('inc/footer.php'); 

require('inc/js_file_link.php'); ?>

</body>

</html>