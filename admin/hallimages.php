<?php session_start();
require("handlers/db.php");
require("inc/header.php");
require("handlers/get-subhall.php");
$mainhallid=$_SESSION['hall_id'];
$sql="SELECT * FROM subhalls";

$query=mysqli_query($conn,$sql);
$hallId=$_GET['hallId'];

$halls=mysqli_fetch_all($query,MYSQLI_ASSOC);
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



            <form action="handlers/upload.php?hallId=<?=$hallId;?>" enctype="multipart/form-data" method="POST">

 

            <div class="form-group">
                    <label for="name">Hall images</label>
                    <input type="file" multiple name="image[]" class="form-control" placeholder="Enter image">
                    </div>

      <br>
      <br>
    
                <button type="submit" name="submit" class="btn btn-primary">Add Images</button>
                <a  href="showsubhalls.php?hallId=<?=$mainhallid;?>" class="btn btn-primary">Back to hall list </a>
                

            </form>
        </div>
    </main>

<?php
require("inc/footer.php");

?>