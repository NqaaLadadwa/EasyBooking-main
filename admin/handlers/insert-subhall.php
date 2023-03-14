<?php 
//connect to database
session_start();
require("db.php");
$test=$_SESSION['hall_id'];
$name=strip_tags(trim($_POST['name']));
$type=strip_tags(trim($_POST['type']));
$number_of_guests=strip_tags(trim($_POST['number_of_guests']));
$services=strip_tags(trim($_POST['services']));
$hall_describtion=strip_tags(trim($_POST['hall_describtion']));


$Sunday=strip_tags(trim($_POST['Sunday']));
$Monday=strip_tags(trim($_POST['Monday']));
$Tuesday=strip_tags(trim($_POST['Tuesday']));
$Wednesday=strip_tags(trim($_POST['Wednesday']));
$Thursday=strip_tags(trim($_POST['Thursday']));
$Friday=strip_tags(trim($_POST['Friday']));
$Saturday=strip_tags(trim($_POST['Saturday']));

$max_price = max($Sunday, $Monday, $Tuesday, $Wednesday, $Thursday, $Friday, $Saturday);






$hall_id=$_POST['hall_id'];

$image_view= $_FILES['image_view'];
$imgvName=$image_view['name'];
$imgvtmpname=$image_view['tmp_name'];
$sizev=$image_view['size'];
$extv=pathinfo($imgvName,PATHINFO_EXTENSION);
$sizeMbv=$sizev/(1024*1024);
$newNamev=uniqid().".".$extv;



$_SESSION['formhalldata']= $_POST;
$errors=[];
//Validation
//--1 for name
if(empty($Sunday)){
    $errors[]="price is required";
    }elseif(!is_numeric($Sunday)){

    $errors[]="price must be a number";
    }
    if(empty($Monday)){
        $errors[]="price is required";
        }elseif(!is_numeric($Monday)){
    
        $errors[]="price must be a number";
        }
    
        if(empty($Tuesday)){
            $errors[]="price is required";
            }elseif(!is_numeric($Tuesday)){
        
            $errors[]="price must be a number";
            }
        
            if(empty($Wednesday)){
                $errors[]="price is required";
                }elseif(!is_numeric($Wednesday)){
            
                $errors[]="price must be a number";
                }
                if(empty($Thursday)){
                    $errors[]="price is required";
                    }elseif(!is_numeric($Thursday)){
                
                    $errors[]="price must be a number";
                    }
                    if(empty($Friday)){
                        $errors[]="price is required";
                        }elseif(!is_numeric($Friday)){
                    
                        $errors[]="price must be a number";
                        }
                        if(empty($Saturday)){
                            $errors[]="price is required";
                            }elseif(!is_numeric($Saturday)){
                        
                            $errors[]="price must be a number";
                            }
                        
                    
                
            




if(empty($name)){
$errors[]="Name is required";
}elseif(is_numeric($name)){

$errors[]="Name must not contain numbers";
}elseif(strlen($name)<= 2 || strlen($name)>30 ){
    $errors[]="name must be more that 2 letters and less than 30";

}

if($type=='0'){
 $errors[]="type is required";
}




    if(empty($number_of_guests)){
        $errors[]="Number of guests is required";
        }elseif(!is_numeric($number_of_guests)){
    
        $errors[]="Number of guests must be a number";
        }
   

 

            if(empty($hall_describtion)){
                $errors[]="Hall description are required";
                }elseif(strlen($hall_describtion)<= 10 || strlen($hall_describtion)>500 ){
                    $errors[]="Hall description must be more than 10 letters and less than 100";
                
                }    
                if(empty($services)){
                    $errors[]="Services are required";
                    }elseif(strlen($services)<= 10 || strlen($services)>500 ){
                        $errors[]="Hall description must be more than 10 letters and less than 100";
                    
                    }



if(empty($_FILES['image_view']['name'])){

    $errors[]="image is required";

  }elseif($sizeMbv>20)
{
$errors[]="image size more than 1Mb";

}elseif(! in_array($extv,['png','jpg','jpeg','PNG'])){

$errors[]="This is not an image";

}


// //i could add validation to img 


//$sql="SELECT id,name, city, number_of_guests,services,hall_describtion,price FROM halls";
if (empty($errors)){
   
$sql="INSERT INTO subhalls(name,type,number_of_guests, hall_describtion, services,image_view,hall_id,price) 
VALUES ('$name','$type','$number_of_guests','$hall_describtion','$services','$newNamev','$hall_id','$max_price')";
//check if added and make alert that tell user that added and return to insert bage

if ($sqlResult=mysqli_query($conn,$sql)){
    $last_id2 = $conn->insert_id;
$_SESSION['hall_id2'] =$last_id2;
    move_uploaded_file($imgvtmpname,"../HallsImages/$newNamev");
    $_SESSION['success']="Hall added successfully";
  
    echo $last_id2;

    $sql2="INSERT INTO prices(hall_id,Sunday,Monday,Tuesday,Wednesday, Thursday, Friday,Saturday) 
VALUES ( '$last_id2','$Sunday','$Monday','$Tuesday','$Wednesday', '$Thursday', '$Friday','$Saturday')";
//check if added and make alert that tell user that added and return to insert bage
$sqlResult2=mysqli_query($conn,$sql2);

header("Refresh:0;URL=../hallimages.php?hallId=$last_id2");

}}
else{
  
$_SESSION['errors']="error while inserted";

$_SESSION['errors']=$errors;
    header("Refresh:0;URL=../creatsubhalls.php?hallId=$test");

}

?>