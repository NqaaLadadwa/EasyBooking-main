<?php session_start();

if(isset($_SESSION['userId'])){
if ($_SESSION['logintest'] ==1){
    header("location:FeedBack.php");
    $_SESSION['logintest'] = 0;
}else{
header("location:index.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">

<?php require ('inc/head.php'); ?>
<script src="https://kit.fontawesome.com/0c7450fd77.js" crossorigin="anonymous"></script>

<body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-jZNDe/3WBp0G3SjKBxxqzIUpY3aGhVwN/5Q5G5+2TkI2j3X7SxIVJZExnyRV+x1r" crossorigin="anonymous">
    <?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 
    require ('inc/Header.php'); 
    ?>
    
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-login">
        
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                <div class="hero-video">
                    
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Login</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                            
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
            <div class="row mb-80 g-6">
             
                <div class="col-lg-4">
                    <div class="widget-area2">
                        <div class="widget-title">
                        <?php

if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){ ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php }
    unset($_SESSION['errors']);

        
    }
  
?>
                            <h5>Login</h5>
                        </div>
                        <div class="single-widgets booking-widgets">
                        <form method="post" action="admin/handlers/login_user.php">

                            <div class="wp-block-text__inside-wrapper ">
                                <i class='bx bx-envelope' ></i>
                                <input type="email" name="email"  placeholder="Your Email">
                            </div>
          
                            <div class="wp-block-text__inside-wrapper ">
                            <i class="fas fa-lock"></i>

                                <input type="password" name="password"   placeholder="Your Password">
                            </div>
                 
                            <div class="wp-block-text__inside-wrapper submit-btn">
                                <button type="submit" name="login">Login Now</button>
                                
                            </div>

                            <br/>
                          
                            <a href="create1.php" style="color:black; font-weight: bold;" class=" " >Create an account</a>
                        </div>
                        
                    </div>
     
                </div>
                <div class="col-lg-7">
                    
                    <div class="swiper room-details-slider mb-30">
                        <div class="swiper-wrapper">

                        <div class="swiper-slide">
                                <div class="rooms-imeges">
                                    <img class="img-fluid" src="assets\images\bg\wedding6.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rooms-imeges">
                                    <img class="img-fluid"  src="assets\images\bg\meeting8.jpg">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rooms-imeges">
                                    <img class="img-fluid" src="assets\images\bg\wedding8.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rooms-imeges">
                                    <img class="img-fluid" src="assets\images\bg\meeting5.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rooms-imeges">
                                    <img class="img-fluid" src="assets\images\bg\wedding5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-btns d-flex align-items-center justify-content-between">
                            <div class="swiper-button-prev-m"><i class="bi bi-chevron-left"></i></div>
                            <div class="swiper-button-next-m"><i class="bi bi-chevron-right"></i></div>
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