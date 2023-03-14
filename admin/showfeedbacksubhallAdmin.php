<?php session_start();
require("handlers/db.php");
$sql1="SELECT feedback_subhall.id ,users.name as uname, subhalls.name, 
feedback_subhall.experience,
feedback_subhall.Recommendation,
feedback_subhall.halls_images_useful,
feedback_subhall.payment_process,
feedback_subhall.feedback
FROM feedback_subhall
JOIN users ON feedback_subhall.user_id = users.id
JOIN subhalls ON feedback_subhall.hall_id = subhalls.id
;
";

//here query that get data from sql
//sqlResult that going to database and put data in it
$sqlResult=mysqli_query($conn,$sql1);
//to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
// we use sssoc when we return one coloumn
$feedbackData=mysqli_fetch_all($sqlResult);
$sql="SELECT * FROM feedback_subhall";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$feedback=mysqli_fetch_all($query,MYSQLI_ASSOC);

}
require("inc/header.php");
?>

  

      

<main role="main" class="flex-shrink-0 ">
        <div class="container">
        <br>
            <h1>List of FeedBack</h1>
            <br>
            <?php if(isset( $_SESSION['errors'])){
            ?>
  <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errors'];?> </div>  

    <?php     
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
                    <th scope="col">Subhall name</th>
                    <th scope="col">User name</th>
                    <th >Experience</th>  
                    <th>Recommendation</th>  
                    <th >Halls images </th>  
                    <th >Payment process</th>  
                    <th >Feedback</th>  



                    <th scope="col">Delete</th>  

                    
                    </tr>
                </thead>
                <tbody>

<?php

if(isset($feedback)){



foreach($feedbackData as $index=>$feedback){?>


    <tr>
    
    <td><?=$feedback[2];?></td>
    <td><?=$feedback[1];?></td>
    
    <td><?=$feedback[3];?></td>
    <td><?=$feedback[4];?></td>
    <td><?=$feedback[5];?></td>
    <td><?=$feedback[6];?></td>
    <td><?=$feedback[7];?></td>

   <td><a href="handlers/deletefeedbacksub.php?feedbackId=<?= $feedback[0];?>"class="btn btn-dark">delete</a></td>
 
    </tr>
<?php }



}
else{?>
  <tr>
    <td colspan="6" class="text-center">No Feedback Added</td>
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