

<?php  session_start();
require("db.php");
$userId=$_POST['userId'];

$sql="SELECT * FROM admins where id=$userId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){


$name=strip_tags(trim($_POST['name']));
$email=strip_tags(trim($_POST['email'])); 
$type=$_POST['type'];

$errors=[];



if(empty($name)){
    $errors[]="Name is required";
    }elseif(is_numeric($name)){
    
    $errors[]="Name must not contain numbers";
    }elseif(strlen($name)<= 2 || strlen($name)>30 ){
        $errors[]="name must be more that 2 letters and less than 30";
    
    }
    
    // --2 validation for email
    if(empty($email)){
        $errors[]="Email is required";
        }elseif(strlen($email) <= 5 || strlen($email)>80 ){
            $errors[]="Email size error";
        }






        if (empty($errors)){
$sql="UPDATE admins SET
name='$name',
email='$email',
type='$type'
WHERE id=$userId";
if(mysqli_query($conn,$sql)){

$_SESSION['success1']="Admin updated succefully";

header("Refresh:0;URL=../showadmins.php");

}
        }else {
            $_SESSION['errors1']=$errors;
    header("Refresh:0;URL=../edit-admin.php?userId=$userId");
           
           
        }    
                       }else{

 $_SESSION['errors']="no data found";
 

                       }  
?>

