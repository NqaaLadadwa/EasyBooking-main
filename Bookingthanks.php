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

    <!-- ========== Room & Suits start============= -->
    <div class="error-page pt-120 mb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-wrrap">
                   
                        <div class="error-content text-center">
                            <div class="contents">
                        <p style="font-size:40px">We’re so happy to help you make your</p>
                        <p style="font-size:40px">reservations.</p>

                        <p style="font-size:40px">please come back soon!</p>
                    </div>
                            <a class="btn--primary" href="index.php"><i class="bx bx-home"></i>Back To Home</a>
                        <br/>
                        <br/><br/>
                        </div>
                        <div class="error-img">
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