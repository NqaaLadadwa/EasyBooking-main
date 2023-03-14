<?php session_start();

$shallId=$_GET['shallId'];
$_SESSION['shallId']= $shallId;
$_SESSION['booklogin']= false;

if(!isset($_SESSION['userId'])){
    header("location: ../../login1.php");
    $_SESSION['booklogin']= true;  
  }

else{
    header("location: ../../book.php?shallId=$shallId ");
}





?>