<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php require ('inc/head.php'); ?>

<body>
<!-- start preloader area -->
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
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Blog Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
                    <div class="blog-post-area">
                        <div class="blog-details mb-120">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="assets/images/blog/blog-dt-1.png" alt="">
                                <div class="batch">
                                    <span>Hotel</span>
                                </div>
                            </div>
                            <div class="blog-meta">
                                <p><a href="blog.php">By, Admin&nbsp;-&nbsp;</a> <a href="blog.php">Monday, July 18, 2022</a></p>

                            </div>
                            <div class="post-content">
                                <h3>Quisque id pellentesque justo, et convallis augue yeseri Nullam magna dolor.</h3>
                                <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucan thoseni ligulatol. Orci varius natoque penatibus ethemen magnis disc parturient monte nascete ridiculusun musclineorto.</p>
                                <p>Quisque id pellentesque justo, et convallis augue. Nullam magna dolor, efficitur et elit in, mattis tempor odio. Pellentesque non semper mauris. Suspendisse interdum elementum condimentum. Suspendisse ultrices est at magna ornare, vitae eleifend ligula sodales. Quisque vestibulum ullamcorper convallis. Aliquam semper sapien orci, at volutpat elit blandit vitae. Nulla gravida lectus vitae dolor volutpat condimentum tincidunt quis mauris. Aenean accumsan varius facilisis.</p>
                                <blockquote class="wp-block-quote">
                                    <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the one Quisque euismod ullamcorper ultrices. Curabitur hendrerit pharetra maurisai accumsan dapibus. Fusce blandit sem ipsum, sed egestas nisl tristique neconi. penatibus ethemen magnis disc parturient monte nascete ridiculusun fourtee musclineorto.</p>
                                    <cite>
                                        <strong>Galib Al Nahian</strong><br>
                                        <img src="assets/images/blog/blog-signature.png" alt="">
                                    </cite>
                                </blockquote>
                                <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucan thoseni ligulatol. Orci varius natoque penatibus ethemen magnis disc parturient monte nascete ridiculusun musclineorto.</p>
                                <div class="row g-4 pt-20">
                                    <div class="col-lg-9">
                                        <div class="row g-4">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="assets/images/blog/blog-dt-2.png" alt="">
                                            </div>
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="assets/images/blog/blog-dt-3.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 d-lg-block d-none">
                                        <img class="img-fluid" src="assets/images/blog/blog-dt-4.png" alt="">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <img class="img-fluid" src="assets/images/blog/blog-dt-5.png" alt="">
                                    </div>
                                </div>
                                <h3>Bookmarksgrove</h3>
                                <p>Quisque id pellentesque justo, et convallis augue. Nullam magna dolor, efficitur et elit in, mattis tempor odio. Pellentesque non semper mauris. Suspendisse interdum elementum condimentum. Suspendisse ultrices est at magna ornare, vitae eleifend ligula sodales. Quisque vestibulum ullamcorper convallis. Aliquam semper sapien orci, at volutpat elit blandit vitae. Nulla gravida lectus vitae dolor volutpat condimentum tincidunt quis mauris. Aenean accumsan varius facilisis.</p>
                                <div class="row g-4 pt-20">
                                    <div class="col-md-6">
                                        <div class="tags">
                                            <h5>Tagged In:</h5>
                                            <a href="#">Family Room,</a>
                                            <a href="#">Luxury,</a>
                                            <a href="#">Appartment,</a>
                                            <a href="#">Bar & Pub,</a>
                                            <a href="#">Deluxe Hotel.</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-lg-end">
                                        <div class="social-link">
                                            <h5>Share On:</h5>
                                            <ul>
                                                <li><a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a></li>
                                                <li><a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a></li>
                                                <li><a href="https://www.pinterest.com/"><i class='bx bxl-pinterest-alt'></i></a></li>
                                                <li><a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-section">
                            <div class="section-title d-flex align-items-center">
                                <h3>Comment</h3>
                                <span></span>
                            </div>
                            <ul>
                                <li>
                                    <div class="author-img">
                                        <img src="assets/images/blog/comment-author-1.png" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-top d-flex align-items-center justify-content-between">
                                            <div class="comment-meta">
                                                <h5>Polard Girdet</h5>
                                                <span>21 July, 2022 At 10.08 pm</span>
                                            </div>
                                            <div class="replay-btn">
                                                <a href="#">
                                                    <svg width="17" height="12" viewBox="0 0 17 12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.5738 0.0719948C5.51963 0.106831 4.25682 1.38879 2.77396 2.91809C-0.188391 5.97669 -0.0563546 5.81993 0.035055 6.14391C0.0722959 6.27628 0.417621 6.64555 2.79089 9.09103C4.28391 10.6308 5.5501 11.9127 5.60427 11.9441C5.88527 12.0974 6.28138 11.9197 6.3694 11.6027C6.38972 11.5365 6.40326 10.9931 6.40326 10.38V9.27218H10.3745C13.0829 9.27218 14.4101 9.28263 14.5489 9.3105C15.314 9.45333 15.9166 10.2023 15.9166 11.014C15.9166 11.1673 16.025 11.3449 16.1875 11.4599C16.4312 11.6306 16.807 11.5052 16.9357 11.2091C16.9932 11.0802 17 10.9617 17 9.82607C17 8.50579 16.9729 8.07034 16.8612 7.51645C16.6073 6.26583 15.9369 5.07444 15.0195 4.24535C14.2205 3.52424 13.2928 3.05047 12.2433 2.82404C11.8743 2.74391 11.8404 2.74043 9.13877 2.72998L6.40664 2.71953L6.39649 1.53859C6.38633 0.40642 6.38294 0.354166 6.31523 0.260109C6.1358 0.00928974 5.80063 -0.074317 5.5738 0.0719948ZM5.31988 2.68469C5.31988 3.41625 5.32327 3.4476 5.39775 3.55908C5.43838 3.62527 5.5264 3.70887 5.59073 3.74719C5.70584 3.82035 5.76 3.82035 8.77314 3.84125C12.1891 3.86215 11.9725 3.84822 12.7173 4.11645C14.2205 4.65989 15.3783 5.97669 15.7609 7.5687C15.8455 7.92751 15.9403 8.66603 15.9065 8.70435C15.8963 8.7148 15.8455 8.69042 15.7914 8.6521C15.6119 8.5232 15.2124 8.33509 14.9484 8.25497L14.6809 8.17485L10.2289 8.16439L5.77693 8.15743L5.62458 8.23407C5.53994 8.27935 5.43838 8.36644 5.39775 8.43263C5.32327 8.54759 5.31988 8.57894 5.31988 9.3105C5.31988 9.73201 5.30973 10.0734 5.2928 10.0734C5.27926 10.0734 4.3787 9.15722 3.28856 8.0355L1.30802 5.9976L3.28856 3.95969C4.3787 2.83797 5.27926 1.92179 5.2928 1.92179C5.30973 1.92179 5.31988 2.26318 5.31988 2.68469Z" />
                                                    </svg>
                                                     Reply</a>
                                            </div>
                                        </div>
                                        <p>Vestibulum eget mauris dui. Proin luctus est lacus, eu lobortis orchivaone dignissimona atei. Ut nec vulputateri nisl. Mauris vel dolor augue toidan. dolorcoul maximus a finibus eget.</p>
                                    </div>
                                </li>
                                
                            </ul>
                            <div class="section-title d-flex align-items-center pt-120">
                                <h3>Leave A Comment</h3>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-inner mb-30">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-inner mb-30">
                                            <input type="text" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-inner mb-30">
                                            <textarea placeholder="Type your Message"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-inner two">
                                            <button type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>
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