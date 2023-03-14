<?php

session_start();
$hallId=$_GET['hallId'];
require("inc/header.php");
require("handlers/get-subhall-data.php");

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

            <form action="handlers/update-subhall.php?mainid=<?=$hallId;?>" method="POST">
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
                    <label for="name"> Number of guests</label>
                    <input type="text" name="number_of_guests" class="form-control" id="number_of_guests" value="<?= $hallData['number_of_guests'];?>" placeholder="Enter Number of guests">

                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" name="Sunday" class="form-control" id="price" value="<?= $hallData['Sunday'];?>" placeholder="Enter price">
                    <input type="text" name="Monday" class="form-control" id="price" value="<?= $hallData['Monday'];?>" placeholder="Enter price">
                    <input type="text" name="Tuesday" class="form-control" id="price" value="<?= $hallData['Tuesday'];?>" placeholder="Enter price">
                    <input type="text" name="Wednesday" class="form-control" id="price" value="<?= $hallData['Wednesday'];?>" placeholder="Enter price">
                    <input type="text" name="Thursday" class="form-control" id="price" value="<?= $hallData['Thursday'];?>" placeholder="Enter price">
                    <input type="text" name="Friday" class="form-control" id="price" value="<?= $hallData['Friday'];?>" placeholder="Enter price">
                    <input type="text" name="Saturday" class="form-control" id="price" value="<?= $hallData['Saturday'];?>" placeholder="Enter price">

                </div>

    
                <div class="form-group">
                    <label for="name">Hall describtion</label>
                    <textarea class="form-control" name="hall_describtion" rows="3" id="hall_describtion"> <?= $hallData['hall_describtion'];?></textarea>
                  </div>

                <div class="form-group">
                    <label for="name">Services</label>
                    <textarea class="form-control" name="services"rows="4" id="services" > <?= $hallData['services'];?></textarea>
                  </div>
              



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
        




   

  <?php
require("inc/footer.php");

?>