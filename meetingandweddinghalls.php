<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php require ('inc/head.php'); 
?>

<body>

<?php require ('inc/preloader_area.php'); 

require ('inc/top_Bar.php'); 


if(isset($_SESSION['userId'])){
$userid=$_SESSION['userId'];


require ('inc/LoginHeader.php'); 
}else{

     require ('inc/Header.php'); 
}


require("admin/handlers/db.php");
require("admin/handlers/get-hall.php");


$sql="SELECT DISTINCT h.city FROM halls h";
$query=mysqli_query($conn,$sql);



?>

    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-wedding2">
        <div class="container">
            
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Meeting Halls</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Meeting Halls</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Home1 Room start============= -->
<div class="room-suits-page-2 pt-120 mb-120">
     <div class="container">
        <form action="meetingandweddinghalls.php" method="post"> 
          <div class="row mb-70">
                <div class="col-12">
                     
                    <div class="multi-main-searchber">
                        <div class="row align-items-center">
                            <div class="col-lg-10">
                                <div class="row gx-3 gy-4">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="searchbox-input date-picker-input">
                                            <label>Date</label>
                                            <input autocomplete="off" placeholder="06/14/2022" type="text" name="checkIn" id="datepicker14" value="" class="claender">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                     
                                            
                                        <div class="searchbox-input two three">
                                            <label>City</label>
                                            <select class="person-select" name="cities">

                                            <?php while($row1 = mysqli_fetch_array($query)):;?>
                                                <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?> </option>
                                                <?php endwhile; ?>
                                            </select>
                                           

                                        </div>
                                        
                                    </div>         
                                </div>                               
                            </div>
                                        <div class="col-lg-2 px-0" >
                                            <div class="col-12 d-flex justify-content-center">
                                            <button class="btn--primary eg-btn" type="submit" name="submit"  >Search</button>
                                         
                                            </div>
                                        </div>
                           
                        </div>
                    </div>

                    
                </div>
            </div>
            </form> 

                <div class="row g-4 justify-content-center">
                     <div class="col-lg-4 col-md-6">
                        <div class="single-room">
                   
                <?php

if(isset($_POST['cities'])){

  //  print_r ($_POST['cities']);
    $city=$_POST['cities'];
    $sql1="SELECT * FROM halls where (type='2' or type='3')  and city='$city' and status='approved'";
    $query1=mysqli_query($conn,$sql1);
    $halls=mysqli_fetch_all($query1,MYSQLI_ASSOC);
 //   print_r ($halls);


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
                    <a class="btn--primary2" href="hall-details.php?hallId=<?= $hall['id'];?>">View More</a>
                        </div>
                    </div>
                </div>
            </div>
      
    <?php }

    
  }
else{?>
<tr>
<td colspan="6" class="text-center">No Related Halls Found</td>
</tr> 
<?php 
} ?>

                </div>
            </div>
         </div>
        </div>
    </div>
    <!-- ========== Home1 Room end============= -->
    <!-- ========== Home1 Footer Start============= -->
   
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>