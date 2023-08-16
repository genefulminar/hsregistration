<?php
// Database connection parameters
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'herosystem';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve the reservation date from the query string
$reservationDate = $_GET['reservationDate'];

// Prepare and execute the SQL query to fetch guest information
$sql = "SELECT ControlNo, Firstname, Secondname, Middlename, Lastname, Age, Email, District, Locale, Gender, reservationdate FROM guestinfo WHERE reservationdate = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $reservationDate);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the results into an associative array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the guest information as JSON
echo json_encode($data);
?>
