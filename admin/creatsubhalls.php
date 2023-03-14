<?php session_start();
require("handlers/db.php");
require("inc/header.php");

$_SESSION['hall_id']=$_GET['hallId'];
$id= $_SESSION['hall_id'];
$sql="SELECT * FROM halls where id='$id'";
   $sqlResult=mysqli_query($conn,$sql);
   $hall=mysqli_fetch_assoc($sqlResult);
  

?>

    <main role="main" class="flex-shrink-0">
        <div class="container">
 
            <h1>Add hall</h1>
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
      
         

            <form action="handlers/insert-subhall.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" id="hall_id" name="hall_id" value="<?= $_SESSION['hall_id']?>" >
                <div class="form-group">
                    <label for="name">Hall Name</label>
                   
                    <input type="text" name="name"class="form-control" id="name" placeholder="Enter Hall name" value= <?php if( isset($_SESSION['formhalldata']['name'])) echo $_SESSION['formhalldata']['name']?>>
                </div>
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Type</label>
  </div>
  <select name ="type"class="custom-select" id="inputGroupSelect01">
    <option value="0">Choose...</option>
    <?php if($hall['type']== '1' or $hall['type']== '3'){ ?>
    <option value="1" <?php if( isset($_SESSION['formhalldata']['type']))if($_SESSION['formhalldata']['type']==1) echo "selected"?> value="1">Weddings</option> <?php }?>
    <?php if($hall['type']== '2' or $hall['type']== '3'){ ?>
    <option value="2" <?php if( isset($_SESSION['formhalldata']['type']))if($_SESSION['formhalldata']['type']==2) echo "selected" ?> value="2">Meetings</option> <?php }?>
    <?php if($hall['type']== '3'){ ?>
    <option value="3" <?php if( isset($_SESSION['formhalldata']['type']))if($_SESSION['formhalldata']['type']==3) echo "selected" ?> value="3">Weddings and Meetings</option> <?php } ?>
   
  </select>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Number of Guests</label>
  </div>
  <select name ="number_of_guests"class="custom-select" id="inputGroupSelect01">
    <option value="0">Choose...</option>




  



    <option value="100"  >Up to 100</option>
    <option value="200"  >Up to 200</option> 
    <option value="500"  >Up to 500</option>
    <option value="1000" >Up to 1000</option>
   
  </select>
</div>
               
                
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" name="Sunday"class="form-control" id="name" placeholder="Enter price in Sunday " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>
                    <input type="text" name="Monday"class="form-control" id="name" placeholder="Enter price in Monday " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>
                    <input type="text" name="Tuesday"class="form-control" id="name" placeholder="Enter price in Tuesday " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>
                    <input type="text" name="Wednesday"class="form-control" id="name" placeholder="Enter price in Wednesday " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>
                    <input type="text" name="Thursday"class="form-control" id="Thursday" placeholder="Enter price in Thursday  " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>
                    <input type="text" name="Friday"class="form-control" id="Friday" placeholder="Enter price in Friday  " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>
                    <input type="text" name="Saturday"class="form-control" id="Saturday" placeholder="Enter price in Saturday  " value= <?php if( isset($_SESSION['formhalldata']['price'])) echo $_SESSION['formhalldata']['price']?>>

                  </div>
          
                <div class="form-group">
                    <label for="name">Hall description</label>
                    <textarea  placeholder="Enter a Hall description"  class="form-control" name="hall_describtion" rows="3" id="comment" ><?php if( isset($_SESSION['formhalldata']['hall_describtion'])) echo $_SESSION['formhalldata']['hall_describtion']?></textarea>
                  </div>
                <div class="form-group">
                    <label for="name">Services</label>
                    <textarea class="form-control" placeholder="Enter Services" name="services"rows="4" id="comment" ><?php if( isset($_SESSION['formhalldata']['services'])) echo $_SESSION['formhalldata']['services']?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="name">General Image 550x444</label>
                    <input type="file" name="image_view" class="form-control" placeholder="Enter image">

                  </div>


                <button type="submit" class="btn btn-primary">Add Hall</button>
                <a  href="showhallowner.php" class="btn btn-primary">Back to hall list </a>
                <?php unset($_SESSION['formhalldata'])?>
            </form>
        </div>
    </main>

<?php
require("inc/footer.php");

?>