<?php 
session_start();
// Include the database configuration file 
require("db.php");

require("get-subhall.php");
$mainhallid=$_SESSION['hall_id'];
if(isset($_POST['submit'])){ 

$targetDir = "../HallsImages/image"; 
$allowTypes= array('jpg','png','jpeg','gif','PNG'); 
$error=[];
$statusMsg=$errorMsg=$insertValuesSQL=$errorUpload=$errorUploadType=''; 
$fileNames=array_filter($_FILES['image']['name']); 
if(!empty($fileNames)){ 
foreach($_FILES['image']['name'] as $key=>$val){ 


$fileName = basename($_FILES['image']['name'][$key]); 
$targetFilePath=$targetDir.$fileName; 
$fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION); 
$newName = uniqid().".".$fileType;
if(in_array($fileType,$allowTypes)){ 
if(move_uploaded_file($_FILES["image"]["tmp_name"][$key],"../HallsImages/$newName")){ 

$insertValuesSQL.="('".$newName."','$hall_id'),"; 
}else{ 
$errorUpload.=$_FILES['image']['name'][$key].'|'; 
} 
}else{ 
$errorUploadType.=$_FILES['image']['name'][$key].'|'; 
} 
} 


$errorUpload=!empty($errorUpload)?'Upload Error:'.trim($errorUpload,'|'):''; 
$errorUploadType=!empty($errorUploadType)?'File Type Error:'.trim($errorUploadType,'|'):''; 
$errorMsg=!empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 

if(!empty($insertValuesSQL)){ 
$insertValuesSQL=trim($insertValuesSQL,','); 
$insert=$conn->query("INSERT INTO images (image, subhall_id)VALUES $insertValuesSQL"); 

if($insert){ 
$statusMsg ="Files are uploaded successfully.".$errorMsg; 

}else{ 
echo "Sorry,there was an error uploading your file."; 
$errors[]="Sorry,there was an error uploading your Images.";
} 
}else{ 
echo "Upload failed! ".$errorMsg; 
$errors[]="Upload failed!";
} 
}else{ 
echo'Please select a file  to upload.'; 
$errors[]="Please select a fileto upload.";
} 
} 


if (empty($errors)){
 $_SESSION['success']="Images added succefully";
 $hallId=$_SESSION['hallId'];
   header("Refresh:0;URL=../showsubhalls.php?hallId=$mainhallid");
    
    }else {
      
     $_SESSION['errors']=$errors;
   header("Refresh:0;URL=../hallimages.php?hallId=$hall_id");
}

?>
