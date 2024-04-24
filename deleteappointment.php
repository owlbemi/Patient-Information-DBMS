<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbName = "patientinformation"; 

// Creating connection 
$conn = mysqli_connect($servername,  
         $username, $password, $dbName); 

// Checking connection 
if (!$conn) { 

      // If connecting fails 
    die("Connection failed: " . mysqli_connect_error()); 
} else {

echo "Connection established successfully..."; 

$appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);

$sql = "DELETE FROM patientinformation.Appointment WHERE AppointmentID = '$appointment_id'";

  if (mysqli_query($conn, $sql)) {
    echo "Appointment deleted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
// Close the connection   
mysqli_close($conn); 

?>