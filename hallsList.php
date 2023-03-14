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
$sqlT="SELECT DISTINCT h.type FROM halls h";
$queryT=mysqli_query($conn,$sqlT);
$sql="SELECT h.price FROM subhalls h";
$query3=mysqli_query($conn,$sql);

require("admin/handlers/get-hall.php");
$sql="SELECT * FROM halls where status='approved'";
$query1=mysqli_query($conn,$sql);
$halls=mysqli_fetch_all($query1,MYSQLI_ASSOC);

?>

    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section-wedding">
        <div class="container">
            
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Halls</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Halls</li>
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
        <form action="hallsList.php" method="post"> 
            <div class="row mb-70">
                <div class="col-12 d-flex">
                    <div class="multi-main-searchber">
                        <div class="row align-items-center">
                            <div class="col-lg-10">
                                <div class="row gx-3 gy-4">
                                    
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="searchbox-input two three">
                                            <label>City</label>
                                            <select class="person-select" name="cities">
                                            <option value="">Choose a city</option>

                                                <?php while($row1 = mysqli_fetch_array($query)):;?>
                                                <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?> </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="searchbox-input two three">
                                            <label>Type</label>
                                            <select class="person-select" name="types">
                                            <option value="">Choose Halls Type</option>
                                                <?php while($row1 = mysqli_fetch_array($queryT)):;?>


                                              
    <?php if( $row1[0]== '1' ){ ?>
    <option value="1" >Weddings</option> <?php }?>
    <?php if( $row1[0]== '2' ){ ?>
    <option value="2">Meetings</option> <?php }?>
 
   




                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="searchbox-input two three">
                                            <label>Price</label>
                                            <select name="prices">
                                                <option value="">Choose a Price</option>
                                                <option value="1000">₪10000 or less</option>
                                                <option value="20000">₪20000 or less</option>
                                                <option value="30000">₪30000 or less</option>
                                                <option value="40000">₪40000 or less</option>
                                                <option value="50000">₪50000 or less</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                            <div class="col-lg-2 px-0">
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn--primary eg-btn" type="submit" name="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </form>
    </div>
</div>



<div class="row g-4 justify-content-center">
    <?php
    // Check if city or price filter is applied for subhalls
    if(isset($_POST['cities']) || (isset($_POST['prices']) ) || (isset($_POST['types']) )){
        $sql = "SELECT subhalls.*, halls.city, halls.name AS hall_name FROM subhalls JOIN halls ON subhalls.hall_id = halls.id WHERE halls.status='approved'";
if(isset($_POST['cities']) && !empty($_POST['cities'] ) ){
    $city = $_POST['cities'];
  
   
    $sql .= " AND halls.city='$city'";





}
if(isset($_POST['types']) && !empty($_POST['types'])){
    $types = $_POST['types'];
  
    if ( $types==1){
    $sql .= " AND subhalls.type = '1' OR subhalls.type = '3'";
    }else{
        $sql .= " AND subhalls.type = '2' OR subhalls.type = '3'";

    }
}
if(isset($_POST['prices']) && !empty($_POST['prices'])){
    $price = floatval($_POST['prices']);
  
    $sql .= " AND subhalls.price <= $price";
 
}


if((isset($_POST['cities']) && (!empty($_POST['cities'] )) ) && (isset($_POST['types']) && (!empty($_POST['types'])))){
    $city = $_POST['cities'];
   
    $types = $_POST['types'];
   
    if ( $types==1){
    $sql .= " AND halls.city='$city' AND (subhalls.type = '1' OR subhalls.type = '3')";
    }else{
        $sql .= " AND halls.city='$city' AND (subhalls.type = '2' OR subhalls.type = '3')";

    }
}



if((isset($_POST['cities']) && (!empty($_POST['cities'] )) ) && (isset($_POST['prices']) && !empty($_POST['prices']))){
    $city = $_POST['cities'];
    $price = floatval($_POST['prices']);

  
        $sql .= " AND halls.city='$city'  AND subhalls.price <= $price";

    
}


if((isset($_POST['types']) && (!empty($_POST['types']))) && (isset($_POST['prices']) && !empty($_POST['prices']))){
 
    $price = floatval($_POST['prices']);
    $types = $_POST['types'];
  
    
    $sql .= "   AND (subhalls.type =  $types OR subhalls.type = '3') AND subhalls.price <= $price";
   

    
}



if((isset($_POST['cities']) && (!empty($_POST['cities'] )) )&&(isset($_POST['types']) && (!empty($_POST['types']))) && (isset($_POST['prices']) && !empty($_POST['prices']))){
    $city = $_POST['cities'];
    $price = floatval($_POST['prices']);
    $types = $_POST['types'];
 
    if ( $types==1){

        
    $sql .= "  AND halls.city='$city'   AND subhalls.price <= $price AND (subhalls.type = '1' OR subhalls.type = '3')";
    }else{
        $sql .= "  AND halls.city='$city'   AND subhalls.price <= $price AND (subhalls.type = '2' OR subhalls.type = '3')";

    }

    
}










$query = mysqli_query($conn, $sql);
$subhalls = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(!empty($subhalls)){
    $i = 0;
    foreach($subhalls as $subhall){
        if ($i % 3 == 0) {
            echo '<div class="row row-cols-1 row-cols-md-3 g-4" style="padding: 40px;">';
        }
?>
        <div class="col-md-4" >
            <div class="single-room">
                <a href="subhall-details.php?shallId=<?= $subhall['id'];?>">
                    <img class="img-fluid" src="admin/HallsImages/<?php echo $subhall['image_view']?>" alt="" style="width: 100%; height: 300px; object-fit: cover;">
                </a>
                <div class="background"></div>
                <div class="room-content">
                    
                    <h3><a href="subhall-details.php?shallId=<?= $subhall['id'];?>"><?php echo $subhall['name']?></a></h3>
                    <div class="bed-and-person d-flex align-items-center">
                        <div class="persons">
                            <p><img src="assets/images/icons/location-svgrepo-com.svg" alt=""><?php echo $subhall['city']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
        $i++;
        if ($i % 3 == 0 || $i == count($subhalls)) {
            echo '</div>';
        }
    }
} else {
?>
    <div class="col-12 text-center">
        <h2>No Subhalls Found</h2>
    </div>
<?php 
}
    } else {
        // Fetch all approved halls
        $sql = "SELECT * FROM halls WHERE status='approved'";
        $query = mysqli_query($conn, $sql);
        $halls = mysqli_fetch_all($query, MYSQLI_ASSOC);
        // Check if halls are found
        if(!empty($halls)){
            foreach(array_chunk($halls, 3) as $hall_row){
                ?>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="padding: 20px;">
                    <?php foreach($hall_row as $hall){ ?>
                        <div class="col">
                            <div class="single-room">
                                <a href="hall-details.php?hallId=<?= $hall['id'];?>">
 <img class="img-fluid" src="admin/HallsImages/<?php echo $hall['image_view']?>" alt="" style="width: 100%; height: 300px; object-fit: cover;">
                     
</a>
                                <div class="background"></div>
                                <div class="room-content">
                                    <h3><a href="hall-details.php?hallId=<?= $hall['id'];?>"><?php echo $hall['name']?></a></h3>
                               
                                    
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php }
        } else {
            // Display message if no halls are found
            ?>
            <div class="col-12 text-center">
                <h2>No Halls Found</h2>
            </div>
        <?php }} ?>


    <!-- ========== Home1 Room end============= -->
    <!-- ========== Home1 Footer Start============= -->
   
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>

</body>

</html>