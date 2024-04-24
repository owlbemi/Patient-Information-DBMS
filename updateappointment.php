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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $appointmentID = $_POST['appointmentID'];
    $employeeID = $_POST['employeeID'];
    $date = $_POST['date'];
    $time = $_POST['time']; 

    // Validate

    // UPDATE statement
    $sql = "UPDATE patientinformation.Appointment SET Date = $date, Time = $time, EmployeeId = $employeeID WHERE AppointmentId= $appointmentID";
    $result = $conn->query($sql);

  // Execute statement
    if (mysqli_query($conn, $sql)) {
        echo "appointment updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

  // Close the connection   
  mysqli_close($conn); 

?>