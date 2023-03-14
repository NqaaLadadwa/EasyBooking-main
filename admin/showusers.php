<?php session_start();
require("handlers/db.php");
require("handlers/get-user.php");
$sql="SELECT * FROM users";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
$users=mysqli_fetch_all($query,MYSQLI_ASSOC);

}
require("inc/header.php");
?>

    

<main role="main" class="flex-shrink-0 ">
        <div class="container">
        <br>
            <h1>List of Users</h1>          

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
                    <th scope="col">Status</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    
                    </tr>
                </thead>
                <tbody>

<?php

if(isset($users)){


    //here we go to delete page and نمرر parameter 
    //strtotime convert string to time 
//index is a proparities for foreach that give me a chance to give a correct id
//ican sent more than one parametrers by &
 /*sent data in get way in search*/

foreach($userData as $index=>$users){?>

    <tr>
    <td><?=$index+1;?></td>
    <td><?=$users[1];?></td>
    <td><?=$users[2];?></td>
    <td><?=$users[4];?></td>

<td><?php
    if($users[5]==1){?>
    <span ><i class="fas fa-check"></i></span> 
    <?php } else{?>
    <span ><i class="fas fa-times"></i></span> 
    <?php }
    ?></td>
    
    <td><?=date('j M Y',strtotime($users[6]));?></td>
  
    
    <td><a href="handlers/deleteuser.php?userId=<?= $users[0];?>"class="btn btn-dark">delete</a></td>
    <td><a href="edit-user.php?userId=<?= $users[0];?>"class="btn btn-dark">Edit</a></td>
    
    </tr>
<?php }

}

else{?>
  <tr>
    <td colspan="6" class="text-center">No User Added</td>
  </tr>
  <?php
} ?>
                </tbody>
            </table>
           
        </div>









        <div class="container">
        <br>
        <?php
        $sql="SELECT id,name,email,password, type, status, created_at FROM users where type='owner'";
        //here query that get data from sql
        //sqlResult that going to database and put data in it
        $sqlResult=mysqli_query($conn,$sql);
        //to get data from sql, here just get the first data i can use fetch all to get all or use for loop with assoc
        // we use sssoc when we return one coloumn
        $adminData=mysqli_fetch_all($sqlResult);
        
        
        ?>
            <h1>List of Owners</h1>          

                <br>
            
            <table class="table table-bordered text-center justify-content-start">
                <thead  class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    
                    </tr>
                </thead>
                <tbody>

<?php

if(isset($users)){


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
    <td><?=$users[4];?></td>

<td><?php
    if($users[5]==1){?>
    <span ><i class="fas fa-check"></i></span> 
    <?php } else{?>
    <span ><i class="fas fa-times"></i></span> 
    <?php }
    ?></td>
    
    <td><?=date('j M Y',strtotime($users[6]));?></td>
  
    
    <td><a href="handlers/deleteuser.php?userId=<?= $users[0];?>"class="btn btn-dark">delete</a></td>
    <td><a href="edit-user.php?userId=<?= $users[0];?>"class="btn btn-dark">Edit</a></td>
    
    </tr>
<?php }

}

else{?>
  <tr>
    <td colspan="6" class="text-center">No User Added</td>
  </tr>
  <?php
} ?>
                </tbody>
            </table>
           
        </div>


















    </main>
    <?php
require("inc/footer.php");

?>