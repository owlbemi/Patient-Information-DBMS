<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost"; 
  $username = "root"; 
  $password = "0000"; 
  $dbName = "patientinformation"; 
  
  // Creating connection 
  $conn = mysqli_connect($servername,  
           $username, $password, $dbName); 
  
  // Checking connection 
  if (!$conn) { 
  
        // If connecting fails 
      die("Connection failed: " . mysqli_connect_error()); 
  } 
  
  echo "Connection established successfully..."; 
  
  //Sanitize
  $patientSsn = mysqli_real_escape_string($conn, $patientSsn);

  // Delete
  $sql = "DELETE FROM patientinformation.Patient WHERE PatientSsn = '$patientSsn'";

  // Execute
  if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }

  
  // Close the connection   
  mysqli_close($conn); 
  
  ?>