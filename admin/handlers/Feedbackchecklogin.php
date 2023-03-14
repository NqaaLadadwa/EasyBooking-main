<?php
session_start();
$_SESSION['test']=1;
$_SESSION['loginforfeedback'] = true;
$_SESSION['logintest'] = 1;


require('login_user.php');
?>