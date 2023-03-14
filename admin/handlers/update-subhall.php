

<?php  session_start();
require("db.php");
$hallId=$_POST['hallId'];

$mainhallid=$_SESSION['hall_id'];
//echo $mainhallid;

$sql="SELECT * FROM subhalls where id=$hallId";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){


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


$errors=[];

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

    if(empty($number_of_guests)){
            $errors[]="Number of guests is required";
            }elseif(!is_numeric($number_of_guests)){
        
            $errors[]="Number of guests must be a number";
            }

     
    
                if(empty($hall_describtion)){
                    $errors[]="Hall describtion are required";
                    }elseif(strlen($hall_describtion)<= 20 || strlen($hall_describtion)>500 ){
                        $errors[]="Hall describtion must be more that 20 letters and less than 100";
                    
                    }    
                    if(empty($services)){
                        $errors[]="Services are required";
                        }elseif(strlen($services)<= 20 || strlen($services)>500 ){
                            $errors[]="Hall describtion must be more that 20 letters and less than 100";
                        
                        }
              



$sql="SELECT id,name,type,  number_of_guests,hall_describtion,services FROM subhalls";



        if (empty($errors)){
$sql="UPDATE subhalls SET
name='$name',
type='$type',
number_of_guests='$number_of_guests',

hall_describtion='$hall_describtion',
services='$services'
WHERE id=$hallId";
if(mysqli_query($conn,$sql)){
    $sql2="UPDATE prices SET
    Sunday='$Sunday',
    Monday='$Monday',
    Tuesday='$Tuesday',
    Wednesday='$Wednesday', 
    Thursday='$Thursday', 
    Friday='$Friday'
    ,Saturday ='$Saturday'
    WHERE hall_id=$hallId";
    //check if added and make alert that tell user that added and return to insert bage
    $sqlResult2=mysqli_query($conn,$sql2);
$_SESSION['success1']="Hall updated succefully";
$test=   $_SESSION['usertype'];

if ($test=='owner'){
  header("Refresh:0;URL=../showsubhalls.php?hallId=$mainhallid");
}else{
   header("Refresh:0;URL=../showsubhalls.php?hallId=$mainhallid");
}

}
        }else {
            $_SESSION['errors1']=$errors;
    header("Refresh:0;URL=../edit-subhall.php?hallId=$hallId");
           
           
        }    
                       }else{

 $_SESSION['errors']="no data found";
 

                       }  
?>