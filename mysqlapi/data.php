<?php
// Include the database configuration
require_once('config.php'); // Assuming your configuration file is named 'config.php'

// Perform a query to retrieve data from the "homestay" table
$query = "SELECT * FROM homestay"; // Use the table name "homestay"

$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        echo "Rooms: " . $row["rooms"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Photo: " . $row["photo"] . "<br>";
        echo "Contact Person: " . $row["contact_person"] . "<br>";
        echo "Password: " . $row["password"] . "<br>";
        echo "Status: " . $row["status"] . "<br>";
        echo "Contact Name: " . $row["contactname"] . "<br>";
        echo "Contact Number: " . $row["contactnumber"] . "<br>";
        echo "Location: " . $row["location"] . "<br>";
        echo "<hr>"; // Add a horizontal line for separation
    }
} else {
    echo "0 results";
}
header('Content-Type: application/json');
echo json_encode($result);
// Close the database connection
$mysqli->close();
?>
