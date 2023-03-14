<?php session_start();
require("handlers/db.php");
require("handlers/get_owner_hall.php");
$test= $_SESSION['userId'];
$sql="SELECT h.id,h.name,h.type,h.city,h.address, h.hall_describtion,h.status FROM halls h where h.user_id ='$test'";
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
                    <th scope="col"  style="width:10%">Hall name</th>
                    <th scope="col"  style="width:10%">Type</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
             
                    <th scope="col"style="width:40%">Hall describtion</th>
                    <th scope="col"style="width:10%">Status</th>
                    <th scope="col"style="width:10%">Show Subhall</th>
                    <th scope="col"style="width:10%">Add Subhall</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

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
   <td><?php
    if ($halls[2]=='1'){
echo "Weddings";
}else if ($halls[2]=='2'){
    echo "Meetings";

}
else if ($halls[2]=='3'){
    echo "Weddings and Meetings";

}
?></td>
    <td><?=$halls[3];?></td>
    <td><?=$halls[4];?></td>
    <td><?=$halls[5];?></td>
    <td><?=$halls[6];?></td>
    <td><a href="showsubhalls.php?hallId=<?= $_SESSION['hallId'];?>"class="btn btn-dark">Show Subhalls</a></td>
    <td><a href="creatsubhalls.php?hallId=<?= $_SESSION['hallId'];?>"class="btn btn-dark">Add Subhalls</a></td>
    <td><a href="edit-hall.php?hallId=<?= $_SESSION['hallId'];?>"class="btn btn-dark">Edit</a></td>

   <td><a href="handlers/deletehall.php?hallId=<?= $_SESSION['hallId'];?>"class="btn btn-dark">delete</a></td>

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
            <ul class="navbar-nav mr-auto">
               
       

           </ul>
        </div>

    </main>


  <?php
require("inc/footer.php");

?>