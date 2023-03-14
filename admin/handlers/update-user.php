
<?php  session_start();
require("db.php");
$userId=$_POST['userId'];

$sql="SELECT * FROM users where id=$userId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){

$status=$_POST['status'];

$errors=[];







if (empty($errors)){
$sql="UPDATE users SET
status='$status'
WHERE id=$userId";
if(mysqli_query($conn,$sql)){

$_SESSION['success1']="User updated succefully";

header("Refresh:0;URL=../showusers.php");

}
        }else {
            $_SESSION['errors1']=$errors;
    header("Refresh:0;URL=../edit-user.php?userId=$userId");
           
           
        }    
                       }else{

 $_SESSION['errors']="no data found";
 

                       }  
?>

