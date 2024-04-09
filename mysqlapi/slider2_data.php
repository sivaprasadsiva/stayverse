<?php
include('config.php');
$data = [];

$sql = "SELECT * FROM slider WHERE status = 2"; 
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['photo_url'] = 'https://stayverse.in/assets/images/' . $row['image'];
        $data[] = $row;
    }
}

// Close the database connection
$mysqli->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
