
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

    $employeeID = $_POST['employeeID'];
    $department = $_POST['department'];
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];

    // UPDATE statement
    $sql = "UPDATE patientinformation.Doctor SET SpecialtyDepartment = '$department', Name = '$name', PhoneNumber = '$phoneNumber' WHERE EmployeeId = '$employeeID'";
    //$result = $conn->query($sql);

  // Execute statement
    if (mysqli_query($conn, $sql)) {
        echo "doctor updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

  // Close the connection   
  mysqli_close($conn); 

?>