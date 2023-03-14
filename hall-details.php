<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="en">


<?php require ('inc/head.php'); ?>

<body>

<?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 

  

    if(isset($_SESSION['userId'])){
    $userid=$_SESSION['userId'];

    require ('inc/LoginHeader.php'); 
    }else{
    
         require ('inc/Header.php'); 
    }
    
   

    $hallId=$_GET['hallId'];
//echo $hallId;
  
    require("admin/handlers/get-hall-data.php");
    $sql="SELECT * FROM halls where id=$hallId";
    $sqlResult=mysqli_query($conn,$sql);
    $hallData=mysqli_fetch_assoc($sqlResult);

    $city=$hallData['city'];
    //echo $city;
    
    $sql1="SELECT * FROM halls where city='$city' and id!=$hallId ";
    $query1=mysqli_query($conn,$sql1);
    $halls=mysqli_fetch_all($query1,MYSQLI_ASSOC);
    
    $sql2="SELECT h.id,h.name,h.type,h.number_of_guests,h.hall_describtion,h.services FROM subhalls h where h.hall_id = '$hallId' ";
    $query2=mysqli_query($conn,$sql2);
    $shalls=mysqli_fetch_all($query2,MYSQLI_ASSOC);
    
   

    
    ?>
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-wedding3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Hall's Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hall's Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Room & Suits start============= -->
    <div class="room-suits-details-page pt-120 mb-120">
        <div class="container">
            <div class="row mb-120 g-5">
                <div class="col-lg-8">

<?php 
if ($hallData['video_view']!='Null') {
?>
<video   style="width: 100%; height: 300px; object-fit: cover;"autoplay loop="loop" muted preload="auto">

<source src="admin/HallsImages/<?php echo $hallData['video_view']?>"  type="video/mp4">
</video>
<?php
}else{
    ?>
    <img  style="width: 100%; height: 300px; object-fit: cover;" src="admin/HallsImages/<?php echo $hallData['image_view']?>" alt="Hall Image">

<?php
}
?>
         
                <br>
     <br>
     <div style="text-align: left;">
     
                    <h1 ><?php echo $hallData['name'] ?></h1>
                    </div>
                    <p><?php echo $hallData['hall_describtion'] ?></p>
                    
                 
                    <h4>Extra Services</h4>
                    <ul<p><?php echo $hallData['hall_describtion']?></p>

                    <h4>Address</h4>
                    <ul<p><?php echo $hallData['city']?> , <?php echo $hallData['address']?></p>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area2">
                        <div class="widget-title">
                            <h5>Pick A Subhall</h5>
                        </div>
                 <div class="single-widgets booking-widgets">
                    <form action="subhall-details.php" method="post">       
                        <div class="wp-block-text__inside-wrapper select-items">
                    
                                <select name="subhall">
                                    <?php foreach($shalls as $index => $shall){?>
                                    <option value="<?php echo $shall['id'];?>"><?php echo $shall['name'];?></option>
                                   <?php echo $shallId= $shall['id']; } ?>
                                </select>
                               
                            </div>
                            <div class="section-title1 text-center">
                             <button class="btn--primary" type="submit" name="submit">Select  Hall</button> 
                            </div>
                           
                            
                          
                            
                    </form>       
                           
                            
                    </div>
                    </div>
     
                </div>
            </div>
            <div class="row">
                <div class="section-title d-flex align-items-center justify-content-between mb-50">
                    <h2>Related Halls</h2>
                    <div class="swiper-btn d-flex align-items-center">
                        <div class="btns swiper-button-prev-n">
                            <svg width="26" height="13" viewBox="0 0 26 13" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.26821 12.5247C7.57342 12.4319 7.74572 12.1194 7.66696 11.807C7.64727 11.7142 6.82514 10.8695 5.21536 9.26803L2.79823 6.86094L14.1996 6.85117L25.6059 6.83652L25.7437 6.73399C25.8176 6.68028 25.916 6.54357 25.9554 6.43127C26.0194 6.25062 26.0145 6.21156 25.9407 6.0602C25.8964 5.96743 25.7979 5.85025 25.7241 5.80143C25.5961 5.71842 25.0693 5.71354 14.1947 5.69889L2.79823 5.68913L5.19075 3.30645C6.51008 1.99793 7.6128 0.865182 7.63742 0.791944C7.76049 0.474579 7.63742 0.176744 7.3322 0.0497979C6.9876 -0.0917957 7.05652 -0.150386 3.8468 3.03791C1.82843 5.03976 0.843853 6.05044 0.824161 6.14321C0.80447 6.21645 0.80447 6.33363 0.824161 6.41175C0.843853 6.49964 1.8235 7.50544 3.81727 9.49263C6.34763 12.0071 6.9876 12.6077 7.11067 12.5686C7.12052 12.5686 7.18944 12.5442 7.26821 12.5247Z"></path>
                            </svg>
                        </div>
                        <div class="btns swiper-button-next-n">
                            <svg width="26" height="14" viewBox="0 0 26 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.0947 0.759911C18.7901 0.852686 18.6181 1.16519 18.6967 1.47769C18.7164 1.57046 19.5369 2.4152 21.1437 4.01677L23.5562 6.42402L12.1765 6.43379L0.791783 6.44844L0.654204 6.55098C0.580501 6.60469 0.48223 6.74141 0.442921 6.85372C0.379045 7.03438 0.383959 7.07344 0.457662 7.22481C0.501884 7.31759 0.600155 7.43477 0.673858 7.4836C0.80161 7.56661 1.32736 7.57149 12.1814 7.58614L23.5562 7.59591L21.1682 9.97874C19.8514 11.2873 18.7508 12.4202 18.7262 12.4934C18.6034 12.8108 18.7262 13.1086 19.0309 13.2356C19.3748 13.3772 19.306 13.4358 22.5096 10.2473C24.5242 8.24532 25.5069 7.23457 25.5266 7.1418C25.5462 7.06856 25.5462 6.95137 25.5266 6.87324C25.5069 6.78535 24.5291 5.77948 22.5391 3.79216C20.0136 1.27749 19.3748 0.676902 19.252 0.715965C19.2421 0.715965 19.1733 0.74038 19.0947 0.759911Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="swiper room-dt-slider">
                    <div class="swiper-wrapper">
                <?php

                if(isset($halls)){
                foreach($halls as $index=>$hall){?>
                
                        <div class="swiper-slide">
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
            <td colspan="6" class="text-center">No Related Halls Added</td>
            </tr>
    <?php
} ?>
                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>