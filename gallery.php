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
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Gallery</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Gallery Start============= -->
    <div class="home-one-gallery two pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Image</span>
                        <h2>Image Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item one">
                        <img class="img-fluid" src="assets/images/bg/gallery-1.png" alt="gallery">
                        <a href="assets/images/bg/gallery-1.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item two">
                        <img class="img-fluid" src="assets/images/bg/gallery-2.png" alt="gallery">
                        <a href="assets/images/bg/gallery-2.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item three">
                        <img class="img-fluid" src="assets/images/bg/gallery-3.png" alt="gallery">
                        <a href="assets/images/bg/gallery-3.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item four">
                        <img class="img-fluid" src="assets/images/bg/gallery-4.png" alt="gallery">
                        <a href="assets/images/bg/gallery-4.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item five">
                        <img class="img-fluid" src="assets/images/bg/gallery-5.png" alt="gallery">
                        <a href="assets/images/bg/gallery-5.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item nine">
                        <img class="img-fluid" src="assets/images/bg/gallery-7.png" alt="gallery">
                        <a href="assets/images/bg/gallery-7.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item six">
                        <img class="img-fluid" src="assets/images/bg/gallery-6.png" alt="gallery">
                        <a href="assets/images/bg/gallery-6.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12 d-lg-block d-md-flex mr1">
                    <div class="gallery-item seven">
                        <img class="img-fluid" src="assets/images/bg/gallery-8.png" alt="gallery">
                        <a href="assets/images/bg/gallery-8.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                    <div class="gallery-item eight">
                        <img class="img-fluid" src="assets/images/bg/gallery-9.png" alt="gallery">
                        <a href="assets/images/bg/gallery-9.png" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                    
                
            </div>
        </div>
    </div>
    <div class="home-one-gallery two mb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Video</span>
                        <h2>Video Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item one">
                        <img class="img-fluid" src="assets/images/bg/video-img-1.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item two">
                        <img class="img-fluid" src="assets/images/bg/video-img-2.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item three">
                        <img class="img-fluid" src="assets/images/bg/video-img-3.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item four">
                        <img class="img-fluid" src="assets/images/bg/video-img-4.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item five">
                        <img class="img-fluid" src="assets/images/bg/video-img-5.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item nine">
                        <img class="img-fluid" src="assets/images/bg/video-img-7.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item six">
                        <img class="img-fluid" src="assets/images/bg/video-img-6.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12 d-lg-block d-md-flex mr1">
                    <div class="gallery-item seven">
                        <img class="img-fluid" src="assets/images/bg/video-img-8.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                    <div class="gallery-item eight">
                        <img class="img-fluid" src="assets/images/bg/video-img-9.png" alt="gallery">
                        <a href="https://www.youtube.com/watch?v=OQm_UJS5kE4" class="popup-youtube"><i class='bx bx-play'></i></a>
                    </div>
                </div>
                    
                
            </div>
        </div>
    </div>
    <!-- ========== Gallery End============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>