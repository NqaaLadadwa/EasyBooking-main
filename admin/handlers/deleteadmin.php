<?php session_start();
require("db.php");

$adminId=$_GET['adminId'];
$sql="SELECT * FROM admins where id=$adminId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
    $admin=mysqli_fetch_assoc($query);
    $sql="DELETE FROM admins where id=$adminId";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Admin was deleted";
    header("Refresh:0;url=../showadmins.php");
    }

}else{
    $_SESSION['errors']="no data found";
    header("Refresh:0;url=../showadmins.php");
}



?>