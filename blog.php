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
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Blog Grid</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Grid</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Blog Grid Page start============= -->
    <div class="home-one-blog pt-120 mb-120">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="blog-wrrap">
                        <div class="blog-img">
                            <img src="assets/images/blog/blog-grid-1.png" alt="">
                            <div class="batch">
                                <a href="blog.php">July 19, 2022</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.php">By, Admin -</a> <a href="blog.php">Hotel</a>
                            </div>
                            <div class="blog-title">
                                <h4><a href="blog-details.html">ullamcorper sapien sed ton efficitur enim.</a></h4>
                            </div>
                            <div class="read-more-btn">
                                <a href="blog-details.html">
                                    <svg width="43" height="10" viewBox="0 0 43 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5H41" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M36 9L41 5L36 1" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                     Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">01</a></li>
                          <li class="page-item"><a class="page-link" href="#">02</a></li>
                          <li class="page-item"><a class="page-link" href="#">03</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Blog Grid Page end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>