<?php 

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming that `Name` is unique 
    $patientSsn = mysqli_real_escape_string($conn, $_POST['patientSsn']);
    $patientName = mysqli_real_escape_string($conn, $_POST['patientName']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $patientPhoneNumber = mysqli_real_escape_string($conn, $_POST['patientPhoneNumber']);
    $insuranceCode = mysqli_real_escape_string($conn, $_POST['insuranceCode']);

    // UPDATE statement
    $sql = "UPDATE patientinformation.Patient(PatientSsn, Sex, Name, DOB, PhoneNumber, InsuranceCode)
     VALUES ('$patientSsn', '$sex', '$patientName', '$dob', '$patientPhoneNumber', '$insuranceCode')";


    // Execute statement
    if (mysqli_query($conn, $sql)) {
    echo "Patient Profile created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

    // Close the connection   
    mysqli_close($conn); 
?>
