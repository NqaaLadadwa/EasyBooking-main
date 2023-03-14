<?php session_start();
require("db.php");

$hallId=$_GET['hallId'];
$sql="SELECT * FROM halls where id=$hallId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){

    $hall=mysqli_fetch_assoc($query);
    $img=$hall['image'];
    $imgv=$hall['image_view'];
    unlink("../ProofOfOwnershipFiles/$img");
    unlink("../HallsImages/$imgv");
    $sql="DELETE FROM halls where id=$hallId";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Hall was deleted";
        $_SESSION['success1']="Hall updated succefully";
$test=   $_SESSION['usertype'];

if ($test=='owner'){
header("Refresh:0;URL=../showhallowner.php");
}else{
    header("Refresh:0;URL=../showhalls.php");
}
 
    }

}else{
    $_SESSION['errors']="no data found";
  header("Refresh:0;url=../showhalls.php");
}


?>