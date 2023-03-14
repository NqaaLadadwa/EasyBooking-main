<?php session_start();
require("handlers/db.php");
require("inc/header.php");
?>

    <main role="main" class="flex-shrink-0">
        <div class="container">
       
            <h1>Add Feature</h1>
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
      
         

            <form action="handlers/insert-feature.php" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="name">Feature Name</label>
                    <input type="text" name="name"class="form-control" id="name" placeholder="Enter Feature Name">
                </div>                        
     
                  <div class="form-group">
                    <label for="name">Feature Icon</label>
                    <input type="file" name="icon" class="form-control" placeholder="Enter icon">

                  </div>

                <button type="submit" class="btn btn-primary">Add Feature</button>
                <a  href="showfeatures.php" class="btn btn-primary">Back to Features list </a>
                

            </form>
        </div>
    </main>

<?php
require("inc/footer.php");

?>