<?php

//Include the database configuration file
require("handlers/db.php");
$hallId=$_GET['hallId'];
$query = $conn->query("SELECT * FROM images where subhall_id=$hallId");

if($query->num_rows>0){
while($row=$query->fetch_assoc()){
?>
<img src="HallsImages/<?php echo $row["image"]; ?>" alt="" />
<?php
}
}else{?>
<p>No image(s) found...</p>
<?php
}
?> 
