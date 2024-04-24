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

echo "Connection established successfully..."."<br>"."<br>"; 


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) {

    $doctorName = $_POST["name"];

      // SELECT statement
      $sql = "SELECT EmployeeId, Name, SpecialtyDepartment, PhoneNumber FROM Doctor WHERE Name LIKE ?";
      $stmt = $conn->prepare($sql);

      // Bind parameters and execute the statement
      $likeName = "%$doctorName%";
      $stmt->bind_param("s", $likeName);
      $stmt->execute();

      // Store the result so we can check the number of rows returned
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          // Fetch each row and output the data
          while ($row = $result->fetch_assoc()) {
              echo "Doctor ID: " . $row['EmployeeId'] . "<br>";
              echo "Name: " . $row['Name'] . "<br>";
              echo "Specialty/Department: " . $row['SpecialtyDepartment'] . "<br>";
              echo "Phone Number: " . $row['PhoneNumber'] . "<br><br>";
          }
      } else {
          echo "No doctors found with the name '$doctorName'.";
      }

      // Close the prepared statement
      $stmt->close();
  } else {
      echo "Please enter a doctor's name to search.";
  }





// Close the connection   
mysqli_close($conn); 

?>