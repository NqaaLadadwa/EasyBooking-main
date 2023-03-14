<?php session_start();

unset($_SESSION['adminId']);


if($_SESSION['usertype']!= null){
    header("location:../../login1.php");
}else{
    header("location:../login.php");
}

?>