<?php  session_start();
$id= $_GET['userId'];
require('db.php'); 

$sql="UPDATE users set status=0
    where id= $id";



if($sqlResult=mysqli_query($conn,$sql)){
    
   

session_unset();
session_destroy();
   header("Refresh:0;URL=../../index.php");
  
     
 
 
     }
 
 
 else{
 $_SESSION['errors3']="error while inserted";
 
 $_SESSION['errors3']=$errors;
 header("Refresh:0;URL=../../profile.php");
 
 }

?>