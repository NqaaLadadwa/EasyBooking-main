<?php session_start();
require("handlers/db.php");
require("handlers/get_owner_hall.php");
$user_id= $_SESSION['userId'];
$sql="SELECT h.id,h.name,h.city,h.address,h.hall_describtion FROM halls h where h.user_id ='$user_id'";
$query=mysqli_query($conn,$sql);

$halls=mysqli_fetch_all($query,MYSQLI_ASSOC);
require("inc/header.php");
?>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            
       
            <h1>Add hall's Images</h1>
            <br>
      <br>
            <?php if(isset( $_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors']);
          }
          if(isset( $_SESSION['success'])){?>
         <div class="alert alert-success" role="alert"> <?php echo  $_SESSION['success'];?> </div>  
        <?php   unset($_SESSION['success']);
        }?>



            <form action="handlers/upload.php" enctype="multipart/form-data" method="POST">
            <div class="input-group-prepend">
<label for="name">Your Hall Name</label>
  </div>


<select name ="hall_id"class="custom-select" id="inputGroupSelect01">

<?php  foreach($hallData as $index=>$halls){

?>

  <option selected value="<?=$halls[0];?>"><?php echo $halls[1]; ?></option>
  <?php   } ?>
</select>  
            <div class="form-group">
                    <label for="name">Hall images</label>
                    <input type="file" multiple name="image[]" class="form-control" placeholder="Enter image">
                    </div>

      <br>
      <br>
                <button type="submit" name="submit" class="btn btn-primary">Add Images</button>
                <a  href="showhalls.php" class="btn btn-primary">Back to hall list </a>
                

            </form>
        </div>
    </main>

<?php
require("inc/footer.php");

?>