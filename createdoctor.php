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

  echo "Connection established successfully..."."<br>"."<br>"; 

  $doctorName = mysqli_real_escape_string($conn, $_POST['doctorName']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  $doctorPhoneNumber = mysqli_real_escape_string($conn, $_POST['doctorPhoneNumber']);

  $sql = "INSERT INTO patientinformation.Doctor(SpecialtyDepartment, Name, PhoneNumber)
   VALUES ('$department', '$doctorName', '$doctorPhoneNumber')";

  if (mysqli_query($conn, $sql)) {
    echo "Doctor Profile created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the connection   
mysqli_close($conn); 

?>