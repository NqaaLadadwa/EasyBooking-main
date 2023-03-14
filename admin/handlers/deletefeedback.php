<?php session_start();
require("db.php");

$feedbackId=$_GET['feedbackId'];
$sql="SELECT * FROM feedbacks where id=$feedbackId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){

    $feature=mysqli_fetch_assoc($query);

    $sql="DELETE FROM feedbacks where id=$feedbackId";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Feedback was deleted";
  header("Refresh:0;url=../showfeedback.php");
    }

}else{
    $_SESSION['errors']="no data found";
  header("Refresh:0;url=../showfeedback.php");
}


?>