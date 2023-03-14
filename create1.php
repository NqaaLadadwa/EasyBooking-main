
<!DOCTYPE html>
<html lang="en">
<?php session_start();


?>
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
    <div class="breadcrumb-section-signup">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Signup</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Signup</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Room & Suits start============= -->
    <div class="contact-page mb-120  overflow-hidden">
       
        <div class="container">
            <div class="row">
                <div class="col-lg-12 center-block">
                    <div class="section-title text-center">
                        <br/>
                        <br/>
                       
                        <h2>Signup</h2>
                        
                        <?php

if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){ ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php }
    unset($_SESSION['errors']);

        
    }
  
?>
<?php        
unset($_SESSION['errors']);

if(isset( $_SESSION['success'])){?>
<div class="alert alert-success" role="alert"> <?php echo  $_SESSION['success'];?> </div>  
<?php   unset($_SESSION['success']);
}

?>

                    </div>
                    <form action="admin/handlers/insert-user.php" method="POST">

                        <div class="row g-4">
                        <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="email" name="email" class="form-control" id="name" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="password" name="password" class="form-control" id="name" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>
              
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>



                            <div class="col-lg-4">
                            <div class="btn-group">
                          
  <input type="radio" class="btn-check"  name="type" value="user"  id="option1" autocomplete="off" checked />
  <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-dark" for="option1">User</label>

  <input type="radio" class="btn-check" name="type" value="owner"  id="option2" autocomplete="off" />
  <label style="width:205px; height:50px; font-size: 20px;" class="btn btn-outline-dark" for="option2">Hall's Owner</label>
  </div>
  
  </div>
                            <div class="col-lg-4">
                                <div class="form-inner">
                                    <input type="hidden" placeholder="Subject">
                                </div>
                            </div>
                            
                 
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-inner">
                                    <button type="submit">Signup</button>
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