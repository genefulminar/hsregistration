<?php
// Retrieve the data from the AJAX request
$data = json_decode($_POST['data'], true);

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

// Create table if it doesn't exist
$tableName = 'guestinfo';

// Prepare and execute the insert statement
$insertSQL = "INSERT INTO $tableName (ControlNo, Firstname, Secondname, Middlename, Lastname, Age, Email, District, Locale, Gender, DateCreated, reservationdate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
$stmt = $conn->prepare($insertSQL);

for ($row = 1; $row < count($data); $row++) {
    $controlNo = $data[$row][0]; // Get the value of ControlNo
    $firstname = $data[$row][1]; // Get the value of Firstname

    if (!empty($firstname)) { // Skip if Firstname is empty

        // Check if ControlNo and registrationdate exist in the database
        $checkSQL = "SELECT ControlNo FROM $tableName WHERE ControlNo = ? AND reservationdate = ?";
        $checkStmt = $conn->prepare($checkSQL);
        $checkStmt->bind_param('ss', $controlNo, $data[$row][10]); // Assuming the reservationdate value is in the 10th index of the data array
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "Skipping row $row: ControlNo already exists<br>";
        } else {
            $stmt->bind_param('sssssssssss', $controlNo, $data[$row][1], $data[$row][2], $data[$row][3], $data[$row][4], $data[$row][5], $data[$row][6], $data[$row][7], $data[$row][8], $data[$row][9], $data[$row][10]);

            // Execute the insert statement
            if ($stmt->execute()) {
                echo "Data saved for row $row<br>";
            } else {
                echo "Error saving data for row $row: " . $stmt->error . "<br>";
            }
        }
    } else {
        echo "Skipping row $row: Firstname is empty<br>";
    }
}

$stmt->close();
$conn->close();

?>
