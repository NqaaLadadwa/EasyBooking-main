
<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$user_id= $_SESSION['userId']; 
require ('inc/head.php');
 ?>

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
    <div class="breadcrumb-section-about2">

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">FeedBack</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FeedBack</li>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <br>
                        <br>
                        <?php if(isset( $_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors']);
          }?>
                        <br>
                        <h2>What do you think About Easy Booking?</h2>
                    </div>
                    <form action="admin/handlers/insertFeedBack.php" enctype="multipart/form-data" method="POST">
                        <div class="row g-4">

                            <div class="col-md-12">
                                <div class="form-inner">
    <textarea name="FeedBack" id="FeedBack" placeholder="Your message" cols="30" rows="10"></textarea>
    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id?>" >

</div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-inner">
                                    <button type="submit" >Send FeedBack</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>
</body>

</html>