<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php 
require ('inc/head.php'); 
require("admin/handlers/db.php"); 
require("admin/handlers/get_feedback.php");
$price = $_GET['price'];
$user_id = $_GET['user_id'];
$hall_id = $_GET['hall_id'];
$reservation_id=$_GET['reservation_id'];
$newPrice=floatval($price)*.2/3.3;
$newPrice = round($newPrice);
?>

<body>
    
 <?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 
    
     ?>
         <?php
    

if(isset($_SESSION['userId'])){
$userid=$_SESSION['userId'];
require ('inc/LoginHeader.php'); 
}
else{
    require ('inc/Header.php'); 
}

?>
    
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s"
                        style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s;">Payment</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
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
                        <h2>Payment</h2>
                    </div>
                    <form  enctype="multipart/form-data" method="POST">
                        <div class="row g-4">

                            <div class="col-md-12">
                                <div class="form-inner">
    <input name="name" id="name" placeholder="Your name" cols="30" rows="10"></input>
    <br> <br>
    <input name="email" id="email" placeholder="Your email" cols="30" rows="10"></input>
  
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


<!-- Set up a container element for the button -->
</div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-inner">
                                </div>
                            </div>
                        </div>
                    </form>
                    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
<div id="paypal-button-container"></div>
<!-- Add the PayPal JavaScript SDK -->

<!-- Create a script to initialize the PayPal button -->
<script>
 paypal.Buttons({
  onClick: function(data, actions) {
    let name = $("#name").val();
    let email = $("#email").val();
    if (name.length == 0) {
      alert("Please enter your name");
      return false;
    }
    if (email.length == 0) {
  alert("Please enter your email");
  return false;
} else if (!/^\S+@\S+\.\S+$/.test(email)) {
  alert("Please enter a valid email address");
  return false;
}
  
  },
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: <?= $newPrice ?>
        }
      }]
    });
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
      alert('Transaction completed by ' + details.payer.name.given_name);
      let name = $("#name").val();
      let user_id = <?= $user_id ?>

 let data={
'name':name,
'price':<?= $newPrice?>,
'user_id':<?= $user_id ?>,
'hall_id':<?= $hall_id ?>,
'reservation_id':<?= $reservation_id ?>,
'payment_type':"Paypal",
"payment_id": details.id

 }
 console.log(data);
 $.ajax({
    method: 'post',
    url:'paymenttable.php',
    data: data,
    success:function(response){

window.location="/easybooking-main/Bookingthanks.php";
 
}
 })

 
    });
  }
}).render('#paypal-button-container');

</script>

                </div>
            </div>
        </div>
    </div>
   
    <!-- ========== Home1 Testimonial end============= -->





    
    <?php require ('inc/footer.php'); 

     require('inc/js_file_link.php'); ?>

</body>

</html>