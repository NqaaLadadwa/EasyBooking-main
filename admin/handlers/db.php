<?php 
define("SERVERNAME","localhost");
define("USERSERV","root");
define("PASSSERV","1234");
define("DBNAME","easybooking");
$conn=mysqli_connect(SERVERNAME,USERSERV,PASSSERV,DBNAME);

// if($conn){
//     echo "Connect";
// }else {
//   die("error ".mysqli_connect_error($conn));
// }
?>