

<?php  session_start();
require("db.php");
$hallId=$_POST['hallId'];

$sql="SELECT * FROM halls where id=$hallId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){


    $name=strip_tags(trim($_POST['name']));
    $type=strip_tags(trim($_POST['type']));
    $city=strip_tags(trim($_POST['city']));
    $address=strip_tags(trim($_POST['address']));
 
    $hall_describtion=strip_tags(trim($_POST['hall_describtion']));

   
$errors=[];


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
           
 $sql="SELECT id,name,type,city,address,hall_describtion FROM halls";



        if (empty($errors)){
$sql="UPDATE halls SET
name='$name',
type='$type',
city='$city',
address='$address',
hall_describtion='$hall_describtion'
WHERE id=$hallId";
if(mysqli_query($conn,$sql)){

$_SESSION['success1']="Hall updated succefully";
$test=   $_SESSION['usertype'];

if ($test=='owner'){
header("Refresh:0;URL=../showhallowner.php");
}else{
    header("Refresh:0;URL=../showhalls.php");
}

}
        }else {
            $_SESSION['errors1']=$errors;
    header("Refresh:0;URL=../edit-hall.php?hallId=$hallId");
           
           
        }    
                       }else{

 $_SESSION['errors']="no data found";
 

                       }  
?>

