<?php session_start();
require("handlers/db.php");
$hallId = $_GET['hallId'];
require("handlers/get-subhall.php");
$_SESSION['hall_id']=$hallId;
$sql="SELECT h.id,h.name,h.type,h.number_of_guests,h.hall_describtion,h.services FROM subhalls h where h.hall_id = '$hallId' ";
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
                    <th scope="col">Type</th>
                    <th scope="col">Number of guests</th>
                    <th scope="col"style="width:40%">Hall describtion</th>
                    <th scope="col"> services</th>
                    <th scope="col"> Show Price</th>

                    <th scope="col">Add Images for hall</th>
                    <th scope="col">Show Images for hall</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Add Reservation</th>
                  
                    </tr>
                </thead>
                <tbody>

<?php


if(isset($halls)){


foreach($hallData as $index=>$halls){?>


    <tr>
    <td><?=$index+1;?></td>
    <td><?=$halls[1];?></td>
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
    <td><a href="showprice.php?hallId=<?= $halls[0];?>"class="btn btn-dark">Show Price</a></td>

    <td><a href="hallimages.php?hallId=<?= $halls[0];?>"class="btn btn-dark">Add Images for hall</a></td>
    <td><a href="showimages.php?hallId=<?= $halls[0];?>"class="btn btn-dark">Show hall images</a></td>

   <td><a href="handlers/deletesubhall.php?hallId=<?= $halls[0];?>"class="btn btn-dark">delete</a></td>
   <td><a href="edit-subhall.php?hallId=<?= $halls[0];?>"class="btn btn-dark">Edit</a></td>
   <td><a href="AddReservations.php?hallId=<?= $halls[0];?>"class="btn btn-dark">Add Reservation</a></td>
    </tr>
<?php }


}
else{?>
  <tr>
    <td colspan="6" class="text-center">No SubHalls</td>
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