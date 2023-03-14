<?php 
//connect to database
session_start();
require("db.php");
//define a variablee and put data from user in the variable
//for img or file we use $_file not post and we put img in database varchar

//trim is for remove spacing
//striptag is for remove the html tags
$name=strip_tags(trim($_POST['name']));
$email=strip_tags(trim($_POST['email']));
$password=strip_tags(trim($_POST['password']));

$type=1;
$errors=[];
//Validation
//--1 for name
if(empty($name)){
$errors[]="Name is required";
}elseif(is_numeric($name)){

$errors[]="Name must not contain numbers";
}elseif(strlen($name)<= 2 || strlen($name)>30 ){
    $errors[]="name must be more that 2 letters and less than 30";

}

// --2 validation for email
$checkAdmin = "SELECT * FROM admins WHERE email='$email'";
$result2 = mysqli_query($conn, $checkAdmin);
$count2 = mysqli_num_rows($result2);

    if(empty($email)){
        $errors[]="email is required";
     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[]="is not a valid email address";
     }else if(strlen ($email) <= 5 || strlen($email) >80){
        $errors[]="email size error";
     }else if($count2 > 0){
        $errors[]="This email is already registered";
    }





    //--validation for password

    if(empty($password)){
        $errors[]="Password is required";
        }     elseif(!preg_match("#[0-9]+#",$password)) {
            $errors[] = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $errors[]= "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $errors[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
        
        }elseif(strlen($password)<=3 || strlen($password)>50 ){
            $errors[]="Password size error";
        }
    

// //i could add validation to img 



if (empty($errors)){
    //encrebtion passwords
    $password=password_hash($password,PASSWORD_DEFAULT);
    //insert data in database
    $sql="INSERT INTO admins(name,email,password,type) 
    VALUES ('$name','$email','$password','$type')";
//check if added and make alert that tell user that added and return to insert bage
if($sqlResult=mysqli_query($conn,$sql)){
    $_SESSION['success']="Admin added successfully";
header("Refresh:0;URL=../showadmins.php");

    }


}else{
$_SESSION['errors']="error while inserted";

$_SESSION['errors']=$errors;
    header("Refresh:0;URL=../showadmins.php");

}

?>

