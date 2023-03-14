<?php 
session_start();
$user_id= $_SESSION['userId']; 

require ('inc/head.php');
//(reservations.date > NOW() OR reservations.date = NOW()) 
require("admin/handlers/db.php");

$sql2="SELECT * From users where id=$user_id";
$query2=mysqli_query($conn,$sql2);
$information=mysqli_fetch_all($query2,MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">



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
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">My Profile</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
     
        </div>
   
                <div class="container">
                    <br>
                    <br>
  <h2>My Profile</h2>
  <br>
  <br>


            

            <?php if(isset( $_SESSION['errors3'])){
            foreach($_SESSION['errors3'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors3']);
          }?>

<?php if(isset( $_SESSION['success3'])){
          ?>
  <div class="alert alert-success" role="alert"> <?php echo $_SESSION['success3'];?> </div>  

    <?php        
            unset($_SESSION['success3']);
          }?>

            <form action="admin/handlers/update-profile.php" method="POST">
                <div class="form-inner">
                    
                    <label for="name"> Name</label>
                    <br>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $information[0]['name'];?>">
                    <input type="hidden"  name="userId" value="<?= $information[0]['id'];?>" >

                    

                </div>

                <br>

                <div class="form-inner">
                    <label for="name">Email</label>
                    <br>
                    <input type="text" name="email" class="form-control" id="email" value="<?= $information[0]['email'];?>" placeholder="Enter Address">

                </div>
        
                <br>
    
                <div class="form-inner">
                    <label for="name">Password</label>
                    <br>
                    <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Enter New Password">
                    <input type="hidden"  name="oldpassword" value="<?= $information[0]['password'];?>" >
                  </div>

      
     
              
                    <br>

                    <div class="form-inner">
                    <button  class="btn btn-outline-secondary" type="submit" >Submit</button>
        </div>
            </form>
      
            <label for="my-box"><strong> Deactivate account or delete it!</strong></label>
            <br>
            <br>
<div id="my-box" style="display: none;">
  
  <button class="btn btn-outline-secondary"><a href="admin/handlers/deactivate.php?userId=<?= $information[0]['id'];?>">Deactivate</a></button>
  <button class="btn btn-outline-secondary"><a href="admin/handlers/delete-profile.php?userId=<?= $information[0]['id'];?>">Delete</a></button>
</div>

<script>
  const label = document.querySelector('label[for="my-box"]');
  const box = document.querySelector('#my-box');

  label.addEventListener('click', function() {
    box.style.display = box.style.display === 'none' ? 'block' : 'none';
  });
</script>

  
</div>
    
                </div>




  





    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>
</body>

</html>














