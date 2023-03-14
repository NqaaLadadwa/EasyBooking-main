<?php session_start();
require("handlers/db.php");
require("handlers/get_owner_hall.php");
$test= $_SESSION['userId'];
$sql="SELECT h.id,h.name,h.type,h.city,h.address, h.hall_describtion FROM halls h where h.user_id ='$test'";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
    $halls=mysqli_fetch_all($query,MYSQLI_ASSOC);
  
    }


require("inc/header.php");
?>

      

<main role="main" class="flex-shrink-0 ">
        <div class="container">
        <br>
            <h1>List of Halls</h1>
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
                    <th scope="col"  >Hall name</th>
                    <th scope="col">Show Subhall</th>
                 

                    </tr>
                </thead>
                <tbody>

<?php

if(isset($halls)){




foreach($hallData as $index=>$halls){?>


    <tr>
   <?php
   $_SESSION['hallId']=$halls[0];
   ?> 
    <td><?=$index+1;?></td>
    <td><?=$halls[1];
  
    ?></td>
  
    <td><a href="resdetails.php?hallId=<?= $_SESSION['hallId'];?>&start_date=<?= 'null'; ?>&end_date=<?= 'null'; ?>"class="btn btn-dark">Show Subhalls reservations</a></td>

    </tr>
<?php }
}
else{?>
  <tr>
    <td colspan="6" class="text-center">No Halls Added</td>
  </tr>
  <?php
} ?>


                </tbody>

            </table>
            
               
            <a href="allincomes.php?userId=<?= $test?>&start_date=<?= 'null'; ?>&end_date=<?= 'null'; ?>"class="btn btn-dark">Show All Subhalls reservations</a>


        </div>

    </main>


  <?php
require("inc/footer.php");

?>