<?php

session_start();
if($_SESSION['adminType'] ==1){
    header("location: index.php");
}

$userId=$_GET['userId'];
require("inc/header.php");
require("handlers/get-admin-data.php");


?>




    <!-- Main content -->


    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Edit User</h1>

            <?php if(isset( $_SESSION['errors1'])){
            foreach($_SESSION['errors1'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors1']);
          }?>

            <form action="handlers/update-admin.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $userData['name'];?>" placeholder="Enter name">
                    <input type="hidden"  name="userId" value="<?= $userData['id'];?>" >

                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?= $userData['email'];?>" placeholder="Enter Email">

                </div>


                <div class="form-group">
                    <label for="name">Type</label>
                    <select  name ="type" " class="custom-select" id="inputGroupSelect01">
   
    <option value="1" <?php if($userData['type']==1) echo "selected" ?> value="1">Admin</option>
    <option value="2" <?php if($userData['type']!=1) echo "selected" ?>>Super Admin</option>
   
  </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
        


    <?php
require("inc/footer.php");

?>