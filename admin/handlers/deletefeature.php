<?php session_start();
require("db.php");

$featureId=$_GET['featureId'];
$sql="SELECT * FROM features where id=$featureId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){

    $feature=mysqli_fetch_assoc($query);
    $icon=$feature['icon'];
    unlink("../IconFiles/$icon");
    $sql="DELETE FROM features where id=$featureId";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Feature was deleted";
  header("Refresh:0;url=../showfeatures.php");
    }

}else{
    $_SESSION['errors']="no data found";
  header("Refresh:0;url=../showfeatures.php");
}


?>