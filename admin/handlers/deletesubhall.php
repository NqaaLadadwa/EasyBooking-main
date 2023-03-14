<?php session_start();
require("db.php");
$mainhallid= $_SESSION['hallId'];
$hallId = $_GET['hallId'];
$sql="SELECT * FROM subhalls where id=$hallId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){

    $hall=mysqli_fetch_assoc($query);
  
    $imgv=$hall['image_view'];

    unlink("../HallsImages/$imgv");
    $sql="DELETE FROM subhalls where id=$hallId";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Sub Hall was deleted";
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
    header("Refresh:0;URL=../showsubhalls.php?hallId=$mainhallid");
}


?>