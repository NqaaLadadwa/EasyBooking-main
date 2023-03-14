<?php session_start();

$shallId=$_GET['shallId'];
$_SESSION['shallId']= $shallId;
$_SESSION['fb_sb_login']= false;

if(!isset($_SESSION['userId'])){
    header("location: ../../login1.php");
    $_SESSION['fb_sb_login']= true;  
  }

else{
    if($_SESSION['$flag']==true){
    header("location: ../../FeedBack_subhall.php?shallId=$shallId ");
    $_SESSION['$flag']=false;
    }
    else{
      header("location: ../../subhall-details.php?shallId=$shallId ");
      $_SESSION['errors_h']="To give feedback you have to reserve this hall first";
    }
}





?>