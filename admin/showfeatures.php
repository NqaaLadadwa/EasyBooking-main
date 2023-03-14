<?php session_start();
require("handlers/db.php");
require("handlers/get-feature.php");
$sql="SELECT * FROM features";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$features=mysqli_fetch_all($query,MYSQLI_ASSOC);

}
require("inc/header.php");
?>

  

      

<main role="main" class="flex-shrink-0 ">
        <div class="container">
        <br>
            <h1>List of Features</h1>
            <br>
            <?php if(isset( $_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){?>
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

    <?php        }
            unset($_SESSION['errors']);
          }?>



<?php
                if (isset($_SESSION['success'])){?>
<div class="alert alert-info" role="alert">
<?php echo $_SESSION['success'];
?>
 </div>
 <?php
 unset($_SESSION['success']);
 
                }
          
                ?>

        <br>
            
            <table class="table table-bordered text-center justify-content-start">
                <thead  class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Feature name</th>  
                    <th scope="col"style="width:50%"> Feature icon</th>            
                    <th scope="col">Delete</th>
                    
                    </tr>
                </thead>
                <tbody>

<?php

if(isset($features)){



foreach($featureData as $index=>$features){?>


    <tr>
    <td><?=$index+1;?></td>
    <td><?=$features[1];?></td>
    <td><img class="img-fluid" style="height:50px" src="IconFiles/<?php echo$features[2] ?>"/> </td>

   <td><a href="handlers/deletefeature.php?featureId=<?= $features[0];?>"class="btn btn-dark">delete</a></td>

    </tr>
<?php }



}
else{?>
  <tr>
    <td colspan="6" class="text-center">No Features Added</td>
  </tr>
  <?php
} ?>
                </tbody>
            </table>
            <ul class="navbar-nav mr-auto">
               
       

           </ul>
        </div>

    </main>


  <?php
require("inc/footer.php");

?>