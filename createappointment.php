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

    $employeeId = $_POST['employeeId'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO patientinformation.Appointment (EmployeeId, Date, Time) VALUES ('$employeeId', '$date', '$time')";


    // Execute statement
    if (mysqli_query($conn, $sql)) {
        echo "New appointment created successfully.";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the connection   
mysqli_close($conn); 

?>