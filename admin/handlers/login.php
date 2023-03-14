<?php session_start();
require("db.php");
if(isset($_POST['login'])){
$email= strip_tags(trim($_POST['email']));
$password= strip_tags(trim($_POST['password']));
$errors =[];

//email
if(empty($email)){
    $errors[]="email is required";
 }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[]="is not a valid email address";
 }


//Password
if(empty($password)){
    $errors[]="password is required";
 }elseif(!preg_match("#[0-9]+#",$password)) {
    $errors[]="Your Password Must Contain At Least 1 Number!";
 }elseif(!preg_match("#[A-Z]+#",$password)) {
    $errors[]="Your Password Must Contain At Least 1 Capital Letter!";
 }elseif(!preg_match("#[a-z]+#",$password)) {
    $errors[] ="Your Password Must Contain At Least 1 Lowercase Letter!";
 }else if(strlen ($password) <= 4 || strlen($password) >=50){
    $errors[]="password size error";
 }

 if(empty($errors)){

    $sql="SELECT * from admins where email='$email'";
    $query= mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){
        $admin= mysqli_fetch_assoc($query);
        $adminpassword= $admin['password'];
       
        if(password_verify($password,$adminpassword)){
            $_SESSION['login']= true;
            $_SESSION['adminId']= $admin['id'];
            $_SESSION['adminType']= $admin['type'];
            header("location: ../index.php");

        }else{
            $_SESSION['errors']=["Password is not correct"];
            header("location:../login.php");
        }
    }
    else{
        $_SESSION['errors']=["Email is not correct"];
        header("location:../login.php");
    }
 }

else{

    $_SESSION['errors']= $errors;
    header("location:../login.php");

}

 

}
else{
    header("location:../login.php");
}
?>