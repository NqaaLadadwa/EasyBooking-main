<?php session_start();
require("db.php");

$userId=$_GET['userId'];
$sql="SELECT * FROM users where id=$userId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
    $admin=mysqli_fetch_assoc($query);
    $sql="DELETE FROM users where id=$userId";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="User was deleted";
    header("Refresh:0;url=../showusers.php");
    }

}else{
    $_SESSION['errors']="no data found";
    header("Refresh:0;url=../showusers.php");
}



?>