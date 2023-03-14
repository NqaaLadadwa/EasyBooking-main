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
    <div class="breadcrumb-section-about2">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Blog Sidebar</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Sidebar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Blog Grid Page start============= -->
    <div class="inner-blog pt-120 mb-120">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="widget-area">
                        <div class="single-widgets widget_search">
                            <form>
                                <label>Search</label>
                                <div class="wp-block-search__inside-wrapper ">
                                    <input type="search" id="wp-block-search__input-1" class="wp-block-search__input " name="s" value="" placeholder="Search Here" required="">
                                    <button type="submit" class="wp-block-search__button">
                                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.10227 0.0713005C1.983 0.760967 -1.22002 5.91264 0.44166 10.7773C1.13596 12.8 2.60323 14.471 4.55652 15.4476C6.38483 16.3595 8.59269 16.5354 10.5737 15.9151C11.4023 15.6559 12.6011 15.0218 13.2121 14.5126L13.3509 14.3969L16.1281 17.1695C19.1413 20.1735 18.9932 20.0531 19.4237 19.9698C19.6505 19.9281 19.9282 19.6504 19.9699 19.4236C20.0532 18.9932 20.1735 19.1413 17.1695 16.128L14.397 13.3509L14.5127 13.212C14.7858 12.8834 15.2394 12.152 15.4755 11.6614C17.0029 8.48153 16.3271 4.74159 13.7814 2.28379C11.9994 0.561935 9.52304 -0.257332 7.10227 0.0713005ZM9.38418 1.59412C11.0135 1.9135 12.4669 2.82534 13.4666 4.15376C14.0591 4.94062 14.4572 5.82469 14.6793 6.83836C14.8136 7.44471 14.8228 8.75925 14.7025 9.34708C14.3507 11.055 13.4713 12.4622 12.1336 13.4666C11.3467 14.059 10.4627 14.4571 9.44898 14.6793C8.80097 14.8228 7.48644 14.8228 6.83843 14.6793C4.78332 14.2303 3.0985 12.9389 2.20054 11.1337C1.75156 10.2312 1.54328 9.43503 1.49699 8.4445C1.36276 5.62566 3.01055 3.05677 5.6535 1.96904C6.10248 1.7839 6.8014 1.59412 7.28741 1.52932C7.74102 1.46452 8.92595 1.50155 9.38418 1.59412Z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="single-widgets widget_egns_recent_post">
                            <div class="widget-title">
                                <h3>Newest Posts</h3>
                            </div>
                            <div class="recent-post-wraper">
                                <div class="widget-cnt">
                                    <div class="wi">
                                        <a href="#"><img src="assets/images/blog/blog-sidebar-1.png" alt=""></a>
                                    </div>
                                    <div class="wc">
                                       <span>July 18, 2022</span>
                                       <h6><a href="#">Quisque laoreet Maecento facilisis tristique.</a></h6>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <div class="single-widgets widget_egns_tag">
                            <div class="widget-title">
                                <h3>All Tag</h3>
                            </div>
                            <p class="wp-block-tag-cloud">
                                <a href="blog-details.php">Hotel</a>
                            </p>
                        </div>
                        <div class="single-widgets widget_egns_social">
                            <div class="widget-title">
                                <h3>Social</h3>
                            </div>
                            <ul class="social-link d-flex align-items-center">
                                <li><a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class='bx bxl-pinterest-alt'></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-sm-10">
                            <div class="blog-wrrap">
                                <div class="blog-img">
                                    <img src="assets/images/blog/blog-grid-1.png" alt="">
                                    <div class="batch">
                                        <a href="blog.php">June 17, 2022</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.php">By, Admin -</a> <a href="blog.php">Hotel</a>
                                    </div>
                                    <div class="blog-title">
                                        <h4><a href="blog-details.php">ullamcorper sapien sed ton efficitur enim.</a></h4>
                                    </div>
                                    <div class="read-more-btn">
                                        <a href="blog-details.php">
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
            
        </div>
    </div>
    <!-- ========== Blog Grid Page end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>