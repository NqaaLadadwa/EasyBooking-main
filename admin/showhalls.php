<?php ob_start();
session_start();
require("handlers/db.php");
require("handlers/get-hall.php");
$sql="SELECT * FROM halls";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$halls=mysqli_fetch_all($query,MYSQLI_ASSOC);
$flag=false;
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
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
             
                    <th scope="col"style="width:30%">Hall describtion</th>
                    <th scope="col"style="width:17%">status</th>
                    <th scope="col"style="width:10%">Show Subhall</th>
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
   <td> <?=$halls[6];?> </td>
    <td><a href="showsubhallsadmin.php?hallId=<?= $_SESSION['hallId'];?>"class="btn btn-dark">Show Subhalls</a></td>

   <td><a href="handlers/deletehall.php?hallId=<?= $_SESSION['hallId'];?>"class="btn btn-dark">delete</a></td>
   <?php if($halls[6]== 'pending'){?>
      
      <?php $flag=true; } ?>
    
    <form action="Showhalls.php" method='post'>
      
    <input type='hidden' name='id' value='<?php echo $halls[0]?>'>
    <?php if($flag==true){?>
    <td><input  type='submit' name='approve' value='Accept' class="btn btn-success">
    <input type='submit' name='decline' value='Decline' class="btn btn-danger"></td>
<?php } ?>
  </form>
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


            <?php if(isset($_POST['approve'])){

    $id = $_POST['id'];
    $sql="UPDATE halls set status='approved' where id='$id'";
    $query=mysqli_query($conn,$sql);
    header("Refresh:0");
  
}

if(isset($_POST['decline'])){

  $id = $_POST['id'];
  $sql="UPDATE halls set status='canceled' where id='$id'";
  $query=mysqli_query($conn,$sql);
  header("Refresh:0");


}



?>
            <ul class="navbar-nav mr-auto">
               
       

           </ul>
        </div>

    </main>


  <?php
require("inc/footer.php");
ob_end_flush();
?>