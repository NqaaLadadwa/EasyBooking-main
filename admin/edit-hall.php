<?php

session_start();
$hallId=$_GET['hallId'];
require("inc/header.php");
require("handlers/get-hall-data.php");

$test=   $_SESSION['usertype'];


?>


    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Edit Hall Information</h1>

            <?php if(isset( $_SESSION['errors1'])){
            foreach($_SESSION['errors1'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors1']);
          }?>

            <form action="handlers/update-hall.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $hallData['name'];?>" placeholder="Enter name">
                    <input type="hidden"  name="hallId" value="<?= $hallData['id'];?>" >

                </div>



                <div class="form-group">
                    <label for="name">Type</label>
                    <select  name ="type" " class="custom-select" id="inputGroupSelect01">
    
    <option value="1" <?php if($hallData['type']=="weddings") echo "selected" ?> value="1">Weddings</option>
    <option value="2" <?php if($hallData['type']=="meetings") echo "selected" ?> value="2">Meetings</option>
    <option value="3" <?php if($hallData['type']=="weddings&meetings") echo "selected" ?> value="3">Weddings and Meetings</option>

  </select>
                </div>

   
              
                
                <div class="form-group">
                    <label for="name">City</label>
                    <select  name ="city" " class="custom-select" id="inputGroupSelect01">
    
                    <option value="1" <?php if($hallData['city']=="Ramallah") echo "selected" ?> value="1">Ramallah</option>
                    <option value="2" <?php if($hallData['city']=="Al-Bireh") echo "selected" ?> value="2">Al-Bireh</option>
                    <option value="3" <?php if($hallData['city']=="Birzeit") echo "selected" ?> value="3">Birzeit</option>

                  </select>

                </div>

                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="<?= $hallData['address'];?>" placeholder="Enter Address">

                </div>
        

    
                <div class="form-group">
                    <label for="name">Hall describtion</label>
                    <textarea class="form-control" name="hall_describtion" rows="3" id="hall_describtion"> <?= $hallData['hall_describtion'];?></textarea>
                  </div>

      
     
              



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
        




   

  <?php
require("inc/footer.php");

?>