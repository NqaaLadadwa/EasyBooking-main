<?php session_start();

if($_SESSION['adminType'] ==1){
    header("location: index.php");
}

require("handlers/db.php");
require("handlers/get-admin.php");
$sql="SELECT * FROM admins";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$admins=mysqli_fetch_all($query,MYSQLI_ASSOC);

}
require("inc/header.php");
?>




    

<main role="main" class="flex-shrink-0 ">
        <div class="container">
        <br>
            <h1>List of Admin</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">created at</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                   

                    </tr>
                </thead>
                <tbody>

<?php

if(isset($admins)){


    //here we go to delete page and نمرر parameter 
    //strtotime convert string to time 
//index is a proparities for foreach that give me a chance to give a correct id
//ican sent more than one parametrers by &
 /*sent data in get way in search*/

foreach($adminData as $index=>$users){?>


    <tr>
    <td><?=$index+1;?></td>
    <td><?=$users[1];?></td>
    <td><?=$users[2];?></td>
    <td><?php
    if($users[3]==1){?>
    <span >Admin</span> 
    <?php } else{?>
    <span >Super Admin</span> 
    <?php }
    ?></td>
    <td><?=date('j M Y',strtotime($users[4]));?></td>
    
    <td><a href="handlers/deleteadmin.php?adminId=<?= $users[0];?>"class="btn btn-dark">delete</a></td>
    <td><a href="edit-admin.php?userId=<?= $users[0];?>"class="btn btn-dark">Edit</a></td>

    </tr>
<?php }
}
else{?>
  <tr>
    <td colspan="6" class="text-center">No Admin Added</td>
  </tr>
  <?php
} ?>
                </tbody>
            </table>
            <ul class="navbar-nav mr-auto">
               
               <li class="nav-item">
                   <a class="text-danger text-bold h4 text-align-left" href="createadmin.php"><u>Create an admin</u></a>
               </li> 

           </ul>
        </div>

    </main>
    <?php
require("inc/footer.php");

?>