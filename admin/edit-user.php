<?php

session_start();
$userId=$_GET['userId'];

require("inc/header.php");
require("handlers/get-user-data.php");


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

            <form action="handlers/update-user.php" method="POST">
         

                <div class="form-group">
                    <label for="name">Status</label>
                    <select  name ="status" " class="custom-select" id="inputGroupSelect01">

   
    <option value="1" <?php if($userData['status']==1) echo "selected" ?> value="1">Active</option>
    <option value="0" <?php if($userData['status']==0) echo "selected" ?>>Not Active</option>
   
  </select>
  <input type="hidden"  name="userId" value="<?= $userData['id'];?>" >

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
        




   
    <?php
require("inc/footer.php");

?>