<?php session_start();
if($_SESSION['adminType'] ==1){
  header("location: index.php");
}

require("handlers/db.php");
require("inc/header.php");
?>
  <!-- Main content -->
  

        

    <main role="main" class="flex-shrink-0">
        <div class="container">
       
            <h1>Edit admin data</h1>
            <?php if(isset( $_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors']);
          }
          if(isset( $_SESSION['success'])){?>
         <div class="alert alert-success" role="alert"> <?php echo  $_SESSION['success'];?> </div>  
        <?php   unset($_SESSION['success']);
        }
          
          ?>
      
          

            <form action="handlers/insert-admin.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name"class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email"class="form-control" id="name" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="name">password</label>
                    <input type="password" name="password" class="form-control" id="my-pass" placeholder="Enter password">

               
                  
                </div>

 
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Type</label>
  </div>
  <select name ="type"class="custom-select" id="inputGroupSelect01">
    <option selected value="1">Choose...</option>
    <option value="1">Admin</option>
    <option value="2">Super Admin</option>
    
   
  </select>
</div>



                <button type="submit" class="btn btn-primary">Add Admin</button>
                <a  href="showadmins.php" class="btn btn-primary">Back to admin list </a>
                <button onclick="history.back()"  class="btn btn-primary">back test</button>

            </form>
        </div>
    </main>
    <?php
require("inc/footer.php");

?>