<!DOCTYPE html>

<html lang="en">

<?php 
 session_start();
require ('inc/head.php'); ?>

<body>
<?php 
require ('inc/preloader_area.php');  

require("admin/handlers/db.php"); 
require("admin/handlers/get_feedback.php");

$sql="SELECT * FROM feedbacks";
$query=mysqli_query($conn,$sql);
$users=mysqli_fetch_all($query,MYSQLI_ASSOC);

require("admin/handlers/get-hall.php");
$sql="SELECT * FROM halls where status='approved' limit 6";
$query1=mysqli_query($conn,$sql);
$halls=mysqli_fetch_all($query1,MYSQLI_ASSOC);

$sql = "SELECT subhalls.*, halls.city, halls.name AS hall_name FROM subhalls JOIN halls ON subhalls.hall_id = halls.id ORDER BY subhalls.num_of_reservation DESC LIMIT 3";
$result = $conn->query($sql);

require("admin/handlers/get-feature.php");
$sql="SELECT * FROM features";
$query3=mysqli_query($conn,$sql);
$features=mysqli_fetch_all($query3,MYSQLI_ASSOC);

?>


    <!-- ========== Top Bar start============= -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-bar-items">
                        <div class="email d-flex align-items-center">
                            <div class="email-icon">
                                <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_461_205)">
                                        <path
                                            d="M23.5117 3.30075H2.38674C1.04261 3.30075 -0.0507812 4.39414 -0.0507812 5.73827V20.3633C-0.0507812 21.7074 1.04261 22.8008 2.38674 22.8008H23.5117C24.8558 22.8008 25.9492 21.7074 25.9492 20.3633V5.73827C25.9492 4.39414 24.8558 3.30075 23.5117 3.30075ZM23.5117 4.92574C23.6221 4.92574 23.7271 4.94865 23.8231 4.98865L12.9492 14.4131L2.07526 4.98865C2.17127 4.9487 2.27629 4.92574 2.38668 4.92574H23.5117ZM23.5117 21.1757H2.38674C1.93844 21.1757 1.57421 20.8116 1.57421 20.3632V6.70547L12.4168 16.1024C12.57 16.2349 12.7596 16.3008 12.9492 16.3008C13.1388 16.3008 13.3285 16.2349 13.4816 16.1024L24.3242 6.70547V20.3633C24.3242 20.8116 23.96 21.1757 23.5117 21.1757Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="email-info">
                                <span>Email Now</span>
                                <h6><a href="mailto:example@gmail.com">EasyBooking@gmail.com</a></h6>
                            </div>
                        </div>
                         <div class="social-icon">
                            <ul class="d-flex align-items-center">
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
    </div>
    <!-- ========== Top Bar End============= -->

    <?php

if(isset($_SESSION['userId'])){
$userid=$_SESSION['userId'];



require ('inc/LoginHeader.php'); 
}else{

     require ('inc/Header.php'); 
}

?>




    <!-- ========== Hero start============= -->
    <div class="hero-style1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 px-0">
                   <div class="hero-video">
                        <video autoplay loop="loop" muted preload="auto">
                            <source src="assets/video/test3.mp4" type="video/mp4">
                        </video>
                        <div class="hero-content">
                           
                            <h1>Easy Booking.</h1>
                        </div>
                        <div class="scroll-dowm">
                            <a href="#about-area"><img src="assets/images/icons/scroll-down.svg" alt=""></a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Hero end============= -->
    <!-- ========== Home1 About start============= -->
    <div class="home-one-about pt-120 pb-120" id="about-area">
        <img class="about-vector" src="assets/images/bg/h1-about-bg.png" alt="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title1">
                            <span>EasyBooking</span>
                            <h2>Find The Best Halls For Your Event.</h2>
                        </div>
                <p> Hey everyone! Nemat, Raneen and Nqaa are here. We're the creators of Easybooking website. The site was created after a lengthy review to help two categories of people mainly. If you are planning for any event, even if it is a wedding party, Birthday party, Consolation...etc, and you need to search for a hall for this event, or you're a hall's owner who is trying to find an easy way to take the reservations and get good advertising to your hall, this site is FOR YOU!</p>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img class="img-fluid" src="assets/images/bg/event2.jpg" alt="">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Home1 About end============= -->
    <!-- ========== Home1 Room start============= -->
    <div class="our-room-section mb-120">
        <div class="container">
             <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Wedding and Meeting Halls</span>
                        <h2>Our Halls</h2>
                    </div>
                </div>
             </div>

             <div class="row g-4 justify-content-center">
             <?php

            if(isset($halls)){
            foreach($halls as $index=>$hall){?>
             
                <div class="col-lg-4 col-md-6">
                    <div class="single-room">
                        <img class="img-fluid" src="admin/HallsImages/<?php echo $hall['image_view']?>" alt="">
                        <div class="background"></div>
                        <div class="room-content">
                            
                            <h3><a href="hall-details.php?hallId=<?= $hall['id'];?>"><?php echo $hall['name']?></a></h3>
                            <div class="bed-and-person d-flex align-items-center">
                            
                                <div class="persons">
                                    <p><img src="assets/images/icons/location-svgrepo-com.svg" alt=""><?php echo $hall['city']?></p>
                                </div>
                            </div>
                            <div class="book-btn">
                                <a class="btn--primary2" href="hall-details.php?hallId=<?= $hall['id'];?>">View Now</a>
                            </div>
                        </div>
                    </div>
                </div>
             

             <?php }



            }   
            else{?>
                <tr>
                  <td colspan="6" class="text-center">No Halls Added</td>
                </tr>
                <?php
            } ?>

            </div>
             <div class="row pt-70">
                <div class="col-12 d-flex justify-content-center">
                    <a class="room-btn btn--primary eg-btn" href="allHalls.php">Halls</a>
                </div>
             </div>
        </div>
    </div>
    <!-- ========== Home1 Room end============= -->
     <!-- ========== Home1 Feature start============= -->
     <div class="home-one-features mb-120">
        <div class="container-fluid">
            <div class="row align-items-center">
                    <div class="feature-content">
                        <div class="section-title1 text-center">
                            <span>Our Facilites</span>
                            <h2>Core Feature</h2>
                        </div>
                        <div class="row g-5 justify-content-center nav nav-tabs" id="pills-tab" role="tablist">
                        <?php

                            if(isset($features)){
                            foreach($features as $index=>$feature){?>
                           <div class="col-md-2 col-sm-4 col-6 nav-item" role="presentation">
                            
                           <button class="nav-link feature-items" 
                                        type="button" role="tab" >
                                
                                        <img width="50" height="50"  class="img-fluid" src="admin/IconFiles/<?php echo $feature['icon']?>" alt="">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <?php echo $feature['name']?>
                            
                                        </button>

                            </div>
                            <?php }
                            }   
                            else{?>
                                <tr>
                                <td colspan="6" class="text-center">No Features Added</td>
                                </tr>
                                <?php
                            } ?>
                        </div>

                    </div>
               
            </div>
        </div>
    </div>
    <!-- ========== Home1 Feature end============= -->
    <div class="our-room-section mb-120">
        <div class="container">
             <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Wedding and Meeting Halls</span>
                        <h2>The Most Booked Halls</h2>
                    </div>
                </div>
             </div>

             <div class="row g-4 justify-content-center">
             <?php

            if($result->num_rows > 0){
                while($hall = mysqli_fetch_assoc($result)){?>
             
                <div class="col-lg-4 col-md-6">
                    <div class="single-room">
                        <img class="img-fluid" src="admin/HallsImages/<?php echo $hall['image_view']?>" alt="">
                        <div class="background"></div>
                        <div class="room-content">
                            
                        <h3><a href="subhall-details.php?shallId=<?= $hall['id'];?>"><?php echo $hall['name']?></a></h3>                           
                        <div class="bed-and-person d-flex align-items-center">
                    
                        <div class="persons">
                         <p><img src="assets/images/icons/town-hall.svg" alt=""><?php echo $hall['hall_name']?></p>
                        </div>

                         <div class="persons">
                         <p><img src="assets/images/icons/location-svgrepo-com.svg" alt=""><?php echo $hall['city']?></p>
                        </div>                               
                        </div>                                            
                 <div class="book-btn">
                     <a class="btn--primary2" href="subhall-details.php?shallId=<?= $hall['id'];?>">View Now</a>
                 </div>
                        </div>
                    </div>
                </div>
             

             <?php }



            }   
            else{?>
                <tr>
                  <td colspan="6" class="text-center">No Halls Added</td>
                </tr>
                <?php
            } ?>

            </div>
           
        </div>
    </div>
   
    <!-- ========== Home1 Testimonial Start============= -->
    <div class="home-one-testimonial mb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Testimonial</span>
                        <h2>What Our Guests Say</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="swiper testimonial-slider-1">
                    <div class="swiper-wrapper">
                    <?php

if(isset($users)){


    //here we go to delete page and نمرر parameter 
    //strtotime convert string to time 
//index is a proparities for foreach that give me a chance to give a correct id
//ican sent more than one parametrers by &
 /*sent data in get way in search*/

foreach($feedbackData as $index=>$users){?>


                        <div class="swiper-slide">
                            <div class="testimonial-wrrap">
                                <img src="assets/images/icons/left-quote.svg" alt="">
                                <div class="content">
                                
                                    <p><?=$users[1];?> </p>
                                    <div class="author-review-area d-flex justify-content-between align-items-center flex-erap">
                                    <div class="authot-area d-flex align-items-center">
                                        <div class="author-img">
                                            <br/>
                                        <img  width="50" height="50" src="assets/images/icons/user1.svg">
                                        </div>
                                    <div class="author-name-deg">
                                            <h4><?=$users[2];?></h4>
                                            </div>
                                </div>
                                </div>
                                </div>
                 
                            </div>
                        </div>
                        <?php }

}?>
                    </div>
                </div>

                
            </div>
            <div class="row align-items-center pt-80">
                <div class="col-lg-4">
                    <div class="swiper-btn-left">
                       <div class="btns swiper-button-prev-e">
                        <svg width="26" height="13" viewBox="0 0 26 13" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.26821 12.5247C7.57342 12.4319 7.74572 12.1194 7.66696 11.807C7.64727 11.7142 6.82514 10.8695 5.21536 9.26803L2.79823 6.86094L14.1996 6.85117L25.6059 6.83652L25.7437 6.73399C25.8176 6.68028 25.916 6.54357 25.9554 6.43127C26.0194 6.25062 26.0145 6.21156 25.9407 6.0602C25.8964 5.96743 25.7979 5.85025 25.7241 5.80143C25.5961 5.71842 25.0693 5.71354 14.1947 5.69889L2.79823 5.68913L5.19075 3.30645C6.51008 1.99793 7.6128 0.865182 7.63742 0.791944C7.76049 0.474579 7.63742 0.176744 7.3322 0.0497979C6.9876 -0.0917957 7.05652 -0.150386 3.8468 3.03791C1.82843 5.03976 0.843853 6.05044 0.824161 6.14321C0.80447 6.21645 0.80447 6.33363 0.824161 6.41175C0.843853 6.49964 1.8235 7.50544 3.81727 9.49263C6.34763 12.0071 6.9876 12.6077 7.11067 12.5686C7.12052 12.5686 7.18944 12.5442 7.26821 12.5247Z" />
                        </svg>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="contents">
                        <p>We are always keep them happy</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="swiper-btn-right">
                        <div class="btns swiper-button-next-e">
                            <svg width="26" height="14" viewBox="0 0 26 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0947 0.759911C18.7901 0.852686 18.6181 1.16519 18.6967 1.47769C18.7164 1.57046 19.5369 2.4152 21.1437 4.01677L23.5562 6.42402L12.1765 6.43379L0.791783 6.44844L0.654204 6.55098C0.580501 6.60469 0.48223 6.74141 0.442921 6.85372C0.379045 7.03438 0.383959 7.07344 0.457662 7.22481C0.501884 7.31759 0.600155 7.43477 0.673858 7.4836C0.80161 7.56661 1.32736 7.57149 12.1814 7.58614L23.5562 7.59591L21.1682 9.97874C19.8514 11.2873 18.7508 12.4202 18.7262 12.4934C18.6034 12.8108 18.7262 13.1086 19.0309 13.2356C19.3748 13.3772 19.306 13.4358 22.5096 10.2473C24.5242 8.24532 25.5069 7.23457 25.5266 7.1418C25.5462 7.06856 25.5462 6.95137 25.5266 6.87324C25.5069 6.78535 24.5291 5.77948 22.5391 3.79216C20.0136 1.27749 19.3748 0.676902 19.252 0.715965C19.2421 0.715965 19.1733 0.74038 19.0947 0.759911Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Home1 Testimonial end============= -->
    <!-- ========== Home1 Video section============= -->
    <div class="home-one-video mb-120">
    <div class="video-area">
        <video autoplay loop="loop" muted preload="auto">
            <source src="assets/video/home.mp4" type="video/mp4">
        </video>
        <div class="our-activitys">
            <div class="booking counter-item d-flex align-items-center">
                <div class="number counter">
                    <h2 class="odometer" data-odometer-final="10">1</h2>
                </div>
                <div class="contents">
                    <p>Booking <br>Of Month</p>
                </div>
            </div>
            <div class="visitors counter-item d-flex align-items-center">
                <div class="number counter">
                    <h2 class="odometer" data-odometer-final="50">2</h2>
                </div>
                <div class="contents">
                    <p>Visitors Visit <br>Daily.</p>
                </div>
            </div>
            <div class="satisfied-gest counter-item d-flex align-items-center">
                <div class="number counter d-flex align-items-center">
                    <h2 class="odometer" data-odometer-final="1.5">1</h2>
                    <span>K</span>
                </div>
                <div class="contents">
                    <p>Satisfied <br>Guest.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ========== Home1 Video section============= -->
    <!-- ========== Home1 Gallery Start============= -->
    <div class="home-one-gallery mb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title1 text-center">
                        <span>Gallery</span>
                        <h2>See Our Halls</h2>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item one">
                        <img class="img-fluid" src="assets/images/bg/gallery-1.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-1.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item two">
                        <img class="img-fluid" src="assets/images/bg/gallery-2.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-2.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item three">
                        <img class="img-fluid" src="assets/images/bg/gallery-3.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-3.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item four">
                        <img class="img-fluid" src="assets/images/bg/gallery-4.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-4.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item five">
                        <img class="img-fluid" src="assets/images/bg/gallery-5.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-5.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item nine">
                        <img class="img-fluid" src="assets/images/bg/gallery-7.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-7.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item six">
                        <img class="img-fluid" src="assets/images/bg/gallery-6.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-6.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12 d-lg-block d-md-flex mr1 ">
                    <div class="gallery-item seven">
                        <img class="img-fluid" src="assets/images/bg/gallery-8.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-8.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                    <div class="gallery-item eight">
                        <img class="img-fluid" src="assets/images/bg/gallery-9.jpg" alt="gallery">
                        <a href="assets/images/bg/gallery-9.jpg" data-fancybox="gallery" class="gallary-item-overlay"> <i class="bi bi-eye"></i> </a>
                    </div>
                </div>
                    
                
            </div>
        </div>
    </div>
    <!-- ========== Home1 Gallery End============= -->
   
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>


</body>

</html>
