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
    <div class="breadcrumb-section-wedding">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
            <div class="row mb-120 g-4 ">
               <div class="col-lg-6">
                <div class="address-area ">
                    <div class="section-title mb-50">
                        <h2>Contact Us If You Have More Questions.</h2>
                    </div>
                    <ul class="address-list">
                        <li>
                            <div class="text">
                                <h4>Location</h4>
                                <p>Birzeit University, Birzeit, Palestine</p>
                            </div>
                        </li>
                        <li>
                            <div class="text">
                                <h4>Phone</h4>
                                <a href="tel:+012-3456-789102">+012-3456-789102</a> <br>
                                <a href="tel:+012-3456-789102">+012-3456-789102</a>
                            </div>
                        </li>
                        <li>
                            <div class="text">
                                <h4>Email</h4>
                                <a href="mailto:info@example.com">info@example.com </a> <br>
                                <a href="mailto:support@example.com">support@example.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
               </div>
               <div class="col-lg-6">
                <div class="location-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48330.162702269045!2d-74.29798882771155!3d40.792034138683825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3ab00d85ee855%3A0x93a15ba40269dd0!2sWest%20Orange%2C%20NJ%2007052%2C%20USA!5e0!3m2!1sen!2sbd!4v1658243800106!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
               </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Have Any Questions</h2>
                    </div>
                    <form>
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="text" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="email" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <textarea placeholder="Your message" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-inner">
                                    <button type="submit">Send Message</button>
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