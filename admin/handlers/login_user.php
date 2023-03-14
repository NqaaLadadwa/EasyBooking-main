<?php session_start();
require('db.php'); 


if(isset($_POST['login'])){

 $email = $_POST['email'];
 $password=$_POST['password'];

 $email=strip_tags(trim($email));
 $password=strip_tags(trim($password));
 $errors = [];

if(empty($email)){
  //  echo "error1";
    $errors[]= "Email is required";
 }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[]= "Please enter valid email";
 }

 if(empty($password)){
    $errors[]= "Password is required";
 }else if(!preg_match("#[0-9]+#",$password)){
    $errors[]= "Your Password Must Contain At Least 1 Number!";
 }else if(!preg_match("#[A-Z]+#",$password)){
    $errors[]= "Your Password Must Contain At Least 1 Capital Letter!";
 }else if(!preg_match("#[a-z]+#",$password)){
    $errors[]= "Your Password Must Contain At Least 1 Small Letter!";
 }else if(strlen($password) <=6 || strlen($password) >=50){
    $errors[]= "Please Check the Password's length";
 }

 if(empty($errors)){
    $sql="SELECT * FROM users WHERE email='$email'";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) > 0 ){
        $user = mysqli_fetch_assoc($query);
        $userPassword = $user['password'];
        $type = $user['type'];
        if(password_verify($password, $userPassword)){
            $_SESSION['userId'] = $user['id'];
            $test=$_SESSION['userId'] ;
            $_SESSION['usertype'] = $user['type'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['userstatus']=$user['status'];
    if( $_SESSION['userstatus']==1){
            //echo $_SESSION['userstatus'];
             if(($_SESSION['test']==1) && ($_SESSION['loginforfeedback'] == true) && ( $_SESSION['usertype']== "user")){
               header("location: ../../FeedBack.php");
          
            $_SESSION['test']=0;
           $_SESSION['loginforfeedback'] = false;
              }
         
              else{
               if (( $_SESSION['usertype']== "owner")){
                $_SESSION['booklogin']=null;
                $_SESSION['fb_sb_login'] =null;
                $_SESSION['$flag'] = null;
                header("location: ../../index.php");
          //      header("Refresh:0;URL=../createhall.php");
                


               }else{
               header("location: ../../index.php");
               }
             }
             

             if($_SESSION['booklogin']== true){

               $shallId = $_SESSION['shallId'];

               header("location: ../../book.php?shallId=$shallId ");
               $_SESSION['booklogin']= false;

             }
             
             if($_SESSION['fb_sb_login']== true){

               $shallId = $_SESSION['shallId'];
                if($_SESSION['$flag']==true){
                  header("location: ../../FeedBack_subhall.php?shallId=$shallId ");
                  $_SESSION['$flag']=false;
                  }
                  else{
                    header("location: ../../subhall-details.php?shallId=$shallId ");
                    $_SESSION['errors_h']="To give feedback you have to reserve this hall first";
                  } 
                  
                  $_SESSION['fb_sb_login']= false;

             }

            }else{
               
session_unset();
session_destroy();
               header("location: ../../404.php");
            }
        }else{
            $_SESSION['errors'] = ["Please Enter Correct Password"];
            header("location: ../../login1.php");

        }
    }else{
        $_SESSION['errors'] = ["Please Enter Correct Email"];
        header("location: ../../login1.php");

    }

}else{
    //echo "o";
$_SESSION['errors'] = $errors;
/*echo '<pre>';
print_r($errors);
echo '</pre>';*/
header("location: ../../login1.php");

}

}
else {
    
header("location: ../../login1.php");
//echo "error";
}

?>