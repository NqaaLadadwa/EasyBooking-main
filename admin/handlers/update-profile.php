<?php session_start();
require('db.php'); 

$id=strip_tags(trim($_POST['userId']));
$name=strip_tags(trim($_POST['name']));
$email=strip_tags(trim($_POST['email']));
$newpassword=strip_tags(trim($_POST['newpassword']));
$oldpassword=strip_tags(trim($_POST['oldpassword']));
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
$checkUser = "SELECT * FROM users WHERE email='$email' and id!=$id";
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


if(!empty($newpassword)){
  if(!preg_match("#[0-9]+#",$newpassword)){
    $errors[]= "New Password Must Contain At Least 1 Number!";
 }else if(!preg_match("#[A-Z]+#",$newpassword)){
    $errors[]= "New Password Must Contain At Least 1 Capital Letter!";
 }else if(!preg_match("#[a-z]+#",$newpassword)){
    $errors[]= "New Password Must Contain At Least 1 Small Letter!";
 }else if(strlen($newpassword) <=6 || strlen($newpassword) >=50){
    $errors[]= "New Password Must Be At Least 6 characters";
 }
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
    if(!empty($newpassword)){
    $newpassword=password_hash($newpassword,PASSWORD_DEFAULT);}
    else{
        $newpassword=$oldpassword;
    }
    //insert data in database
    $sql="UPDATE users set name='$name',email='$email',password='$newpassword'
    where id= $id";
//check if added and make alert that tell user that added and return to insert bage
if($sqlResult=mysqli_query($conn,$sql)){
   $_SESSION['success3']="Updated successfully";
   
  header("Refresh:0;URL=../../profile.php");
    


    }


}else{
$_SESSION['errors3']="error while inserted";

$_SESSION['errors3']=$errors;
header("Refresh:0;URL=../../profile.php");

}


?>