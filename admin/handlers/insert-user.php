<?php session_start();
require('db.php'); 

$name=strip_tags(trim($_POST['name']));
$email=strip_tags(trim($_POST['email']));
$password=strip_tags(trim($_POST['password']));
$type=$_POST['type'];
$errors = [];


//Name Validation


if(empty($name)){
    $errors[]="Name is required";
}else if(is_numeric($name)){
    $errors[]="Name must be string";
}else if(strlen($name) <= 2 || strlen($name) > 40){
    $errors[]="Name Must Be At Least 2 Characters";
}


/*echo '<pre>';
print_r($errors);
echo '</pre>';*/

//Email Validation
$checkUser = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $checkUser);
$count = mysqli_num_rows($result);

if(empty($email)){
    $errors[]="Email is required";
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[]= "Email is not Valid";
 }else if(strlen($email) <= 5 || strlen($email) > 80){
    $errors[]="Check the email's size";
}else if($count > 0){
    $errors[]="This email is already registered";
}

//Password Validation

if(empty($password)){
    $errors[]= "Password is required";
 }else if(!preg_match("#[0-9]+#",$password)){
    $errors[]= "Your Password Must Contain At Least 1 Number!";
 }else if(!preg_match("#[A-Z]+#",$password)){
    $errors[]= "Your Password Must Contain At Least 1 Capital Letter!";
 }else if(!preg_match("#[a-z]+#",$password)){
    $errors[]= "Your Password Must Contain At Least 1 Small Letter!";
 }else if(strlen($password) <=6 || strlen($password) >=50){
    $errors[]= "Password Must Be At Least 6 characters";
 }



/*$password=password_hash($password,PASSWORD_DEFAULT);


$sql="INSERT INTO users(name, email, password, type) VALUES('$name','$email','$password','$type')";
if($sqlResult=mysqli_query($conn, $sql)){?>

    <script>alert("user added")</script>

<?php

//$_SESSION['errors'] = ["User added"];
//header("location: ../login.php");
    header("Refresh:0;URL=../create.php");
}*/


if (empty($errors)){
    //encrebtion passwords
    $password=password_hash($password,PASSWORD_DEFAULT);
    //insert data in database
    $sql="INSERT INTO users(name,email,password,type) 
    VALUES ('$name','$email','$password','$type')";
//check if added and make alert that tell user that added and return to insert bage
if($sqlResult=mysqli_query($conn,$sql)){
  //  $_SESSION['success']="User added successfully";
   
  header("Refresh:0;URL=../../login1.php");
    


    }


}else{
$_SESSION['errors']="error while inserted";

$_SESSION['errors']=$errors;
header("Refresh:0;URL=../../create1.php");

}


?>