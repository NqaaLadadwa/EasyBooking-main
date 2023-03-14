<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "easybooking";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get date from POST parameter
$date = $_POST['date'];
$hallId = $_POST['hallId'];
$dayOfWeek = date('l', strtotime($date));



// Prepare SQL statement
$sql=("SELECT $dayOfWeek FROM prices WHERE hall_id=$hallId ");
// Execute the SQL statement and get the result
$sqlResult = mysqli_query($conn, $sql);

// Check if there is a result
if ($sqlResult) {
  // Get the row from the result
  $row = mysqli_fetch_assoc($sqlResult);
  
  // Get the price for the selected day
  $price = $row[$dayOfWeek];
  $deposit= floatval($price)*.2;
  // Print the price
  echo "<strong>Total Price: " . $price ."₪</strong>";

 
  echo "<br>"."<strong> The deposit you have to pay is: ".  $deposit."₪</strong>"  ;
} else {
  // Print an error message if the SQL statement failed
  echo 'Error: ' . mysqli_error($conn);
}

