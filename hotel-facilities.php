<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php require ('inc/head.php'); ?>

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
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" >Hotel Facilities</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hotel Facilities</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Fcilities Start============= -->
    <div class="facilities-pages mb-120 pt-120">
        <div class="container">
            <div class="row align-items-center g-4 mb-70">
                <div class="col-lg-5">
                    <div class="facilities-img">
                        <img class="img-fluid" src="assets/images/bg/facilities-1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="facilities-content">
                        <span>Locker room</span>
                        <h3>efficitur sit amet Duis mollis nibh vitae libero.</h3>
                        <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucan ligula. Orci varius natoque penatibus ethemen magnis disc
                            Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci parturient monte nascete ridiculus musclineorto </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center g-4 mb-70">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="facilities-content">
                        <span>Restaurant</span>
                        <h3>Curabitur scelerisque lacus ac nisl bibendum tristique.</h3>
                        <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucan ligula. Orci varius natoque penatibus ethemen magnis disc
                            Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci parturient monte nascete ridiculus musclineorto </p>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="facilities-img">
                        <img class="img-fluid" src="assets/images/bg/facilities-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Facilities End============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>