<?php 
//connect to database
session_start();
require("db.php");

$name=strip_tags(trim($_POST['name']));
$type=strip_tags(trim($_POST['type']));
$city=strip_tags(trim($_POST['city']));
$address=strip_tags(trim($_POST['address']));

$hall_describtion=strip_tags(trim($_POST['hall_describtion']));

$user_id=$_POST['user_id'];

$image_view= $_FILES['image_view'];
$imgvName=$image_view['name'];
$imgvtmpname=$image_view['tmp_name'];
$sizev=$image_view['size'];
$extv=pathinfo($imgvName,PATHINFO_EXTENSION);
$sizeMbv=$sizev/(1024*1024);
$newNamev=uniqid().".".$extv;


$video_view = $_FILES["video_view"];	
$vidName=$video_view['name'];
$vidtmpname=$video_view['tmp_name'];
$sizevid=$video_view['size'];
$extvid=pathinfo($vidName,PATHINFO_EXTENSION);
$newNamevid=uniqid().".".$extvid;


$image_file = $_FILES["image"];	
$imgName=$image_file['name'];
$imgtmpname=$image_file['tmp_name'];
$size=$image_file['size'];
$ext=pathinfo($imgName,PATHINFO_EXTENSION);
$sizeMb=$size/(1024*1024);
$newName=uniqid().".".$ext;

$_SESSION['formhalldata']= $_POST;
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



if($city=='0'){
    $errors[]="city is required";
   }

if(empty($address)){
        $errors[]="Address name is required";
        }elseif(is_numeric($address)){
        
        $errors[]="Address name must not contain numbers";
        }elseif(strlen($address)<= 5 || strlen($address)>40 ){
            $errors[]="Address name must be more that 5 letters and less than 40";
        
        }



 

            if(empty($hall_describtion)){
                $errors[]="Hall describtion are required";
                }elseif(strlen($hall_describtion)<= 20 || strlen($hall_describtion)>500 ){
                    $errors[]="Hall describtion must be more that 20 letters and less than 100";
                
                }    
  

if(empty($_FILES['image']['name'])){

            $errors[]="file is required";

          }elseif($sizeMb>1)
{
    $errors[]="file size more than 1Mb";

}elseif(! in_array($ext,['pdf'])){

    $errors[]="This is not a pdf file";

}


if(empty($_FILES['image_view']['name'])){

    $errors[]="image is required";

  }elseif(! in_array($extv,['png','jpg','jpeg','PNG','mp4'])){

$errors[]="This is not an image";

}


if(!empty($_FILES['video_view']['name'])){

  if(! in_array($extvid,['mp4'])){

$errors[]="This is not an video";

}
}else{

$newNamevid='Null';

}

// //i could add validation to img 


//$sql="SELECT id,name, city, number_of_guests,services,hall_describtion,price FROM halls";
if (empty($errors)){

$sql="INSERT INTO halls(name,type, city,address, hall_describtion, image,image_view,video_view,user_id) 
VALUES ('$name','$type','$city','$address','$hall_describtion','$newName','$newNamev','$newNamevid','$user_id')";
   
//check if added and make alert that tell user that added and return to insert bage
if ($sqlResult=mysqli_query($conn,$sql)){
    $last_id = $conn->insert_id;
    $_SESSION['hall_id'] =$last_id;
    move_uploaded_file($imgtmpname,"../ProofOfOwnershipFiles/$newName");
    move_uploaded_file($imgvtmpname,"../HallsImages/$newNamev");
    move_uploaded_file($vidtmpname,"../HallsImages/$newNamevid");

    $_SESSION['success']="Hall added successfully";
header("Refresh:0;URL=../creatsubhalls.php?hallId=$last_id");

}}
else{
$_SESSION['errors']="error while inserted";

$_SESSION['errors']=$errors;
    header("Refresh:0;URL=../createhall.php");

}

?>

