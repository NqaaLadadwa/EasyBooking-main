<?php 
//connect to database
session_start();
require("db.php");

$name=strip_tags(trim($_POST['name']));
$icon_file = $_FILES["icon"];	
$iconName=$icon_file['name'];
$icontmpname=$icon_file['tmp_name'];
$size=$icon_file['size'];
$ext=pathinfo($iconName,PATHINFO_EXTENSION);
$sizeMb=$size/(1024*1024);
$newName=uniqid().".".$ext;
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


if(empty($_FILES['icon']['name'])){

            $errors[]="SVG file of the icon is required";

          }elseif($sizeMb>1)
{
    $errors[]="Image size is more than 1Mb";

}elseif(! in_array($ext,['svg'])){

    $errors[]="This is not SVG file";

}


// //i could add validation to img 


//$sql="SELECT id,name, city, number_of_guests,services,hall_describtion,price FROM halls";
if (empty($errors)){
    
   
    //insert data in database
    $sql="INSERT INTO features(name, icon) 
    VALUES ('$name','$newName')";
//check if added and make alert that tell user that added and return to insert page
if($sqlResult=mysqli_query($conn,$sql)){
    move_uploaded_file($icontmpname,"../IconFiles/$newName");
    $_SESSION['success']="Feature added successfully";
header("Refresh:0;URL=../createfeature.php");

    }


}else{
$_SESSION['errors']="error while inserted";

$_SESSION['errors']=$errors;
    header("Refresh:0;URL=../createfeature.php");

}

?>

