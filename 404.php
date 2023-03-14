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
    <div class="breadcrumb-section-login">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Error</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Error</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Room & Suits start============= -->
    <div class="error-page pt-120 mb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-wrrap">
                        
                        <div class="error-content text-center">
                            <h2>Something Went Wrong!</h2>
                            <p>Sorry, we couldn't find what you were looking for or the page no longer exists.
                            Please return back to homepage and see if you can find what you are looking for.
                            </p>

                            <a class="btn--primary" href="index.php"><i class="bx bx-home"></i>Back To Home</a>
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