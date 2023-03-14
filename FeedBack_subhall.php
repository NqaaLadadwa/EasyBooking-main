 
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

$shallId=$_GET['shallId'];
$_SESSION['hallId'] = $shallId;
require('admin/handlers/db.php');
$sql="SELECT * FROM subhalls where id=$shallId";
$sqlResult=mysqli_query($conn,$sql);
$hallData=mysqli_fetch_assoc($sqlResult);

$hallid= $hallData['hall_id'];
$sql="SELECT * FROM halls where id=$hallid";
$sqlResult=mysqli_query($conn,$sql);
$hall=mysqli_fetch_assoc($sqlResult);
?>
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section">

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
                    <form  action="admin/handlers/insertFeedBack_subhall.php" enctype="multipart/form-data" method="POST">
                        <div class="row g-4">

                            <div class="col-md-12">
                            <h4><img src="assets/images/bg/bullet-point.png" height="20px"> How was your experience with our hall?</h4>
                            <br>
                           
                          
                   
                          <div class="btn-group">
                          
                          <input type="radio" class="btn-check"  name="experience" value="Excellent"  id="option1" autocomplete="off" checked />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option1">Excellent</label>
                          <br> <br> <br>
                          <input type="radio" class="btn-check"  name="experience" value="Good"  id="option2" autocomplete="off"  />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option2">Good</label>
                          <br>
                          <input type="radio" class="btn-check"  name="experience" value="Average"  id="option3" autocomplete="off"  />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option3">Average</label>
                          <br>
                          <input type="radio" class="btn-check" name="experience" value="Poor"  id="option4" autocomplete="off" />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option4">Poor</label>
                          </div>
                         
                          <br>
<br>                       
<br>
<br>
  <h4><img src="assets/images/bg/bullet-point.png" height="20px"> What would you say to someone who asked about our hall?</h4>
  <br>

  <div class="btn-group">
                          
                          <input type="radio" class="btn-check"  name="Recommendation" value="Highly Recommend"  id="option5" autocomplete="off" checked />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option5">Highly Recommend</label>
                          <br> <br> <br>
                          <input type="radio" class="btn-check"  name="Recommendation" value="Recommend"  id="option6" autocomplete="off"  />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option6">Recommend</label>
                          <br>
                          <input type="radio" class="btn-check"  name="Recommendation" value="Neutral"  id="option7" autocomplete="off"  />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option7">Neutral</label>
                          <br>
                          <input type="radio" class="btn-check" name="Recommendation" value="Not Recommend"  id="option8" autocomplete="off" />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option8">Not Recommend</label>
                          </div>

                          <br>
<br>
  <br>
<br>

  <h4><img src="assets/images/bg/bullet-point.png" height="20px"> Did you find the hall's images on the website relevant and useful?</h4>
  <br>
  <div class="btn-group">
                          
                          <input type="radio" class="btn-check"  name="img" value="Good"  id="option9" autocomplete="off" checked />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option9">Yes</label>
                          <br> <br> <br>
                          <input type="radio" class="btn-check"  name="img" value="Bad"  id="option10" autocomplete="off"  />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option10">No</label>
                          <br>
                          </div>
  <br>
<br>
<br>
<br>
  <h4><img src="assets/images/bg/bullet-point.png" height="20px"> Was the payment process smooth and fast?</h4>
  <br>
  <div class="btn-group">
                          
                          <input type="radio" class="btn-check"  name="payment" value="Good"  id="option11" autocomplete="off" checked />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option11">Yes</label>
                          <br> <br> <br>
                          <input type="radio" class="btn-check"  name="payment" value="Bad"  id="option12" autocomplete="off"  />
                          <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-secondary" for="option12">No</label>
                          <br>
                          </div>
  <br>
<br>
<br>
<br>

  <h4><img src="assets/images/bg/bullet-point.png" height="20px"> Do you have any comments, questions, or suggestions?</h4>
  <br>
  <textarea  name="FeedBack" id="FeedBack" placeholder="Your message" rows="4" cols="80"></textarea>
    
  <br>
<br>
    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id?>" >
    <input type="hidden" id="hall_id" name="hall_id" value="<?= $hallData['id']?>" >
    <div class="form-inner">
                                    <button  class="btn btn-outline-secondary" type="submit" >Send FeedBack</button>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-inner">
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