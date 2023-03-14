 
<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/rating.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="assets/js/rating.js"></script>
  </body>
</html>


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

$shallId=$_GET['shallId'];
require('admin/handlers/db.php');
$sql="SELECT * FROM subhalls where id=$shallId";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);

$hallid= $hallData['hall_id'];
$sql="SELECT * FROM halls where id=$hallid";
$sqlResult=mysqli_query($conn,$sql);
$hall=mysqli_fetch_assoc($sqlResult);

include_once 'rating.php';

$rating = new Rating();
?>

<script src= "assets/js/rating.js"></script> 
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section">

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Rating</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rating</li>
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
                        <br>
                        <h2>What do you think About <?php echo $hall['name'];?> - <?php echo $hallData['name'];?> ?</h2>
                        <br>
<br>
                    </div>
                    <style>
                        .form-center {
   margin: 0 auto;
   width: 50%;
   text-align: center;
}
                    </style>
                    <form  action="admin/handlers/insertRating_subhall.php" enctype="multipart/form-data" method="POST">
                        <div class="row g-4">
                        <div class="form-inner">
                        <i>Click Me! =>
 </i>
                        <i class="fa fa-star fa-lg star-grey rateButton" aria-hidden="true"></i>
										<i class="fa fa-star fa-lg star-grey rateButton" aria-hidden="true"></i>
										<i class="fa fa-star fa-lg star-grey rateButton" aria-hidden="true"></i>
										<i class="fa fa-star fa-lg star-grey rateButton" aria-hidden="true"></i>
										<i class="fa fa-star fa-lg star-grey rateButton" aria-hidden="true"></i>

                                        <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user_id?>" >
                                        <input type="hidden" class="form-control" id="hall_id" name="hall_id" value="<?= $hallData['id']?>" >
									<input type="hidden" name="action" value="saveRating">
                            
</div>
                        <div class="col-md-12">
                                <div class="form-inner">
    <textarea name="description" id="description" placeholder="Your message" cols="30" rows="10"></textarea>

</div>
    
    <div class="form-inner">
        <br>
                                    <button  class="btn btn-outline-secondary" type="submit" id="saveReview" >Send</button>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-group">
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