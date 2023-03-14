<?php session_start();
require("handlers/db.php");
$userId = $_GET['userId'];

$sql=" SELECT subhalls.id FROM halls
JOIN subhalls ON halls.id = subhalls.hall_id
WHERE halls.user_id = $userId";
$query=mysqli_query($conn,$sql);
$halls=mysqli_fetch_all($query,MYSQLI_ASSOC);
$_SESSION['user_id']=$userId;

    require("inc/header.php");



?>


<style>
    /* Styling for the label elements */
    label {
      font-size: 18px;
      font-weight: bold;
      margin-right: 10px;
    }
    /* Styling for the input elements */
    input[type="date"] {
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid gray;
    }
    
  </style>
<main role="main" class="flex-shrink-0 ">
  
        <div class="container">
          <form >
          <input type="hidden" id="userId" name="userId" value="<?= $userId;?>">
          <div class="form-group">
  <label  class="font-weight-bold" for="start_date"><strong>Start Date: </strong> </label>
  
  <input type="date" id="start_date" name="start_date" value="<?= 'null'?>>
  </div>
  <br>
  <br>
  <div class="form-group">
  <label class="font-weight-bold" for="end_date"><strong>End Date: </strong> </label>
  <input type="date" id="end_date" name="end_date">
  </div>
  <input class="btn btn-dark " type="submit" value="Search">
</form>

        <br>
 


            <h1>List of reservations</h1>
            
            <br>

        <br>

        
            
            <table class="table table-bordered text-center justify-content-start">
                <thead  class="table-dark">
                    <tr>

    <th>Sub hall name</th>
    <th>Date</th>
    <th>Start Time</th>
    <th>End Time</th>
  
  
             
    <th>Price</th>         
     
         </tr>
                </thead>
                <tbody>

<?php

$userId=$_GET['userId'];
      $start_date=$_GET['start_date'];
      $end_date=$_GET['end_date'];
      if($start_date!='null' and $end_date!='null'  ){
      if((isset($start_date)) and (isset($end_date)) ){
        $newDateS = date("Y-m-d", strtotime($start_date));
    //    echo $newDateS ;
        $newDateE = date("Y-m-d", strtotime($end_date));
      //  echo $newDateE ;


       foreach($halls as $inner_array) {
           foreach($inner_array as $element) {
             $sql="SELECT *,subhalls.price,subhalls.name FROM reservations 
             JOIN subhalls ON reservations.hall_id = subhalls.id 
             WHERE reservations.hall_id = $element and reservations.status='approved'  
              and reservations.date BETWEEN '$newDateS'  AND '$newDateE' 
             
             ";
       
             $query=mysqli_query($conn,$sql);
          //   $query2=mysqli_query($conn,$sql2);
             $halls1=mysqli_fetch_all($query,MYSQLI_ASSOC);
       
        
       ?>
        
         <?php    foreach($halls1 as $event ) {?>
       
       
               <tr>
               
               <td><?php echo $event['name']; ?></td>
               <td><?php echo $event['date']; ?></td>
               <td><?php echo $event['start_time']; ?></td>
               <td><?php echo $event['end_time']; ?></td>
         
             
               <td><?php echo $event['price']; ?></td>

           
             
            
           
               </tr>
           <?php }
       
       
    
             
   
       
        }?>
 <?php

}
}?>








<table class="table table-bordered text-center justify-content-start">
                <thead  class="bg-danger text-dark">
                    <tr>

    <th>Sub hall name</th>
   
             
    <th>Total Price</th>         
                    </tr>
                </thead>
                <tbody>

<?php

foreach($halls as $inner_array) {
    foreach($inner_array as $element) {
 
  $sql2=" SELECT subhalls.name as hall_name, SUM(subhalls.price) as total_price FROM reservations 
  JOIN subhalls ON reservations.hall_id = subhalls.id 
  WHERE reservations.hall_id = $element and reservations.status='approved'  and reservations.date BETWEEN '$newDateS'  AND '$newDateE' 
  GROUP BY subhalls.price

 ";  

 
      
      $query2=mysqli_query($conn,$sql2);
   
     $halls2=mysqli_fetch_all($query2,MYSQLI_ASSOC);

   
 
     $query2=mysqli_query($conn,$sql2);

?>
 
  <?php    foreach($halls2 as $event ) {?>


        <tr>
        
        <td><?php echo $event['hall_name']; ?></td>
  
        <td><?php echo $event['total_price']; ?></td>
    
      
     
    
        </tr>
    <?php }



      
    }

   
  }


?>

                </tbody>
            </table>









      
   <?php  
}else
{


        foreach($halls as $inner_array) {
          foreach($inner_array as $element) {
            $sql="SELECT *,subhalls.name FROM reservations 
            JOIN subhalls ON reservations.hall_id = subhalls.id 
            WHERE reservations.hall_id = $element and reservations.status='approved'  
            ";
      
            $query=mysqli_query($conn,$sql);
         //   $query2=mysqli_query($conn,$sql2);
            $halls1=mysqli_fetch_all($query,MYSQLI_ASSOC);
      
       
      ?>
       
        <?php    foreach($halls1 as $event ) {?>
      
      
              <tr>
              
              <td><?php echo $event['name']; ?></td>
              <td><?php echo $event['date']; ?></td>
              <td><?php echo $event['start_time']; ?></td>
              <td><?php echo $event['end_time']; ?></td>
        
            
              <td><?php echo $event['price']; ?></td>

            
           
          
              </tr>
          <?php }
      
      
      
            
          }
            
         
        }






?>    
<table class="table table-bordered text-center justify-content-start">
<thead  class="bg-danger text-dark">
    <tr>

<th>Sub hall name</th>


<th>Total Price</th>         
    </tr>
</thead>
<tbody>

<?php

foreach($halls as $inner_array) {
foreach($inner_array as $element) {

$sql2="  SELECT subhalls.name as hall_name, SUM(reservations.price) as total_price FROM reservations 
JOIN subhalls ON reservations.hall_id = subhalls.id 
WHERE reservations.hall_id = $element and reservations.status='approved' 
GROUP BY reservations.hall_id, subhalls.name
";  



$query2=mysqli_query($conn,$sql2);

$halls2=mysqli_fetch_all($query2,MYSQLI_ASSOC);



$query2=mysqli_query($conn,$sql2);

?>

<?php    foreach($halls2 as $event ) {?>


<tr>

<td><?php echo $event['hall_name']; ?></td>

<td><?php echo $event['total_price']; ?></td>




</tr>
<?php }




}


}


?>

</tbody>
</table>




<?php





}


?>




    



























                </tbody>
            </table>
            <ul class="navbar-nav mr-auto">
               
       

           </ul>
           <button onclick="history.back()"  class="btn btn-dark">Back to Hall list</button>

        </div>

    </main>


  <?php
require("inc/footer.php");

?>









