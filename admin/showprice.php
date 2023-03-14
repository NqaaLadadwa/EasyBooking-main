<?php session_start();
require("handlers/db.php");

$hall_id=$_GET['hallId'];



$sql="SELECT * FROM prices  where hall_id ='$hall_id'";

//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$hallData=mysqli_fetch_all($sqlResult);
$_SESSION['hall_id']=$hall_id;
$sql="SELECT * FROM prices  where hall_id = '$hall_id' ";
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
                    <th scope="col"> Sunday</th>
                    <th scope="col"  >Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>

                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>

                    <th scope="col">Saturday</th>
                  
                  
                    </tr>
                </thead>
                <tbody>

<?php


if(isset($halls)){


foreach($hallData as $index=>$halls){?>


    <tr>
    <td><?=$index+1;?></td>
    <td><?=$halls[2];?></td>
    <td><?=$halls[3];?></td>
    <td><?=$halls[4];?></td>
    <td><?=$halls[5];?></td>
    <td><?=$halls[6];?></td>
    <td><?=$halls[7];?></td>
    <td><?=$halls[8];?></td>

    </tr>
<?php }


}
else{?>
  <tr>
    <td colspan="6" class="text-center">No Data</td>
  </tr>
  <?php
} ?>



                </tbody>
            </table>
            <ul class="navbar-nav mr-auto">
               
       

           </ul>
           <button class="btn btn-dark" onclick="history.back()">Go Back</button>

        </div>

    </main>


  <?php
require("inc/footer.php");

?>