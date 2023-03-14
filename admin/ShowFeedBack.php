<?php session_start();
require("handlers/db.php");
require("handlers/get_feedback.php");
$sql="SELECT * FROM feedbacks";
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
  <div class="alert alert-danger" role="alert"> <?php echo $error;?> </div>  

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
                    <th scope="col">#</th>
                    <th scope="col">FeedBack</th>  
                    <th scope="col">User Name</th>        
                    <th scope="col">Delete</th>
                 
                    
                    </tr>
                </thead>
                <tbody>

<?php

if(isset($feedback)){



foreach($feedbackData as $index=>$feedback){?>


    <tr>
    <td><?=$index+1;?></td>
    <td><?=$feedback[1];?></td>
    <td><?=$feedback[2];?></td>
   <td><a href="handlers/deletefeedback.php?feedbackId=<?= $feedback[0];?>"class="btn btn-dark">delete</a></td>
 
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