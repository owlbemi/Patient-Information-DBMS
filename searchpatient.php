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


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) {

    $patientName = $_POST["name"];

      // SELECT statement
      $sql = "SELECT PatientSsn, Sex, Name, DOB, PhoneNumber, InsuranceCode FROM Patient WHERE Name LIKE ?";
      $stmt = $conn->prepare($sql);

      // Bind parameters and execute the statement
      $likeName = "%$patientName%";
      $stmt->bind_param("s", $likeName);
      $stmt->execute();

      // Store the result so we can check the number of rows returned
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        echo "<h2>Patients found with the name '$patientName':</h2>";
        echo "<table border='1'>
            <tr>
            <th>Patient SSN</th>
            <th>Sex</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Phone Number</th>
            <th>Insurance Code</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["PatientSsn"] . "</td>";
          echo "<td>" . $row["Sex"] . "</td>";
          echo "<td>" . $row["Name"] . "</td>";
          echo "<td>" . $row["DOB"] . "</td>";
          echo "<td>" . $row["PhoneNumber"] . "</td>";
          echo "<td>" . $row["InsuranceCode"] . "</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "No Patients found with the name '$patientName'.";
  }

      // Close the prepared statement
      $stmt->close();
  } else {
      echo "Please enter a patient's name to search.";
  }





// Close the connection   
mysqli_close($conn); 

?>