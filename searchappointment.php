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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $doctorId = $_POST["name"];

  // SQL query to retrieve appointments for the given doctor's ID
  $sql = "SELECT * FROM Appointment WHERE EmployeeID = '$doctorId'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>Appointments for Doctor ID: $doctorId</h2>";
    echo "<table border='1'>
          <tr>
          <th>Appointment ID</th>
          <th>Date</th>
          <th>Time</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["AppointmentId"] . "</td>";
      echo "<td>" . $row["Date"] . "</td>";
      echo "<td>" . $row["Time"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No appointments found for Doctor ID: $doctorId";
  }
}

$conn->close();
?>
