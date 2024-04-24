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

  $insuranceCode = mysqli_real_escape_string($conn, $_POST['insuranceCode']);
  $insuranceName = mysqli_real_escape_string($conn, $_POST['insuranceName']);

  $sql = "INSERT INTO patientinformation.Insurance(InsuranceCode, InsuranceName)
   VALUES ('$insuranceCode', '$insuranceName')";

  if (mysqli_query($conn, $sql)) {
    echo "Insurance Profile for patient created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the connection   
mysqli_close($conn); 

// Creating connection 
$conn = mysqli_connect($servername,  
         $username, $password, $dbName); 

// Checking connection 
if (!$conn) { 

      // If connecting fails 
    die("Connection failed: " . mysqli_connect_error()); 
} else {

  echo "Connection established successfully..."."<br>"."<br>"; 

  $patientSsn = mysqli_real_escape_string($conn, $_POST['patientSsn']);
  $patientName = mysqli_real_escape_string($conn, $_POST['patientName']);
  $sex = mysqli_real_escape_string($conn, $_POST['sex']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $patientPhoneNumber = mysqli_real_escape_string($conn, $_POST['patientPhoneNumber']);
  $insuranceCode = mysqli_real_escape_string($conn, $_POST['insuranceCode']);

  $sql = "INSERT INTO patientinformation.Patient(PatientSsn, Sex, Name, DOB, PhoneNumber, InsuranceCode)
   VALUES ('$patientSsn', '$sex', '$patientName', '$dob', '$patientPhoneNumber', '$insuranceCode')";

  if (mysqli_query($conn, $sql)) {
    echo "Patient Profile created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the connection   
mysqli_close($conn); 

?>