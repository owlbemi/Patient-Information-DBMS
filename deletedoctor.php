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
  }

  echo "Connection established successfully..."; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $employeeID = $_POST['employeeID'];

  // Delete
  $sql = "DELETE FROM patientinformation.Doctor WHERE EmployeeId = $employeeID";
  //$result = $conn->query($sql);

  // Execute
  if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }
}
  // Close the connection   
  mysqli_close($conn); 

?>