<?php
include('config.php'); // Include your database configuration

$data = [];

try {
    // Query to select all room types from the 'roomtype' table
    $roomTypeSql = "SELECT * FROM roomtype";
    $roomTypeResult = $mysqli->query($roomTypeSql);

    if ($roomTypeResult) {
        if ($roomTypeResult->num_rows > 0) {
            while ($roomTypeRow = $roomTypeResult->fetch_assoc()) {
                $data['room_types'][] = $roomTypeRow;
            }
        } else {
            $data['room_types'] = [];
        }
    } else {
        throw new Exception("Query execution failed for room types: " . $mysqli->error);
    }

    // Query to select homestays, rooms, and their associated room types
    $sql = "SELECT h.*, r.*, rt.* 
            FROM homestay h
            JOIN rooms r ON h.id = r.homestay_id
            JOIN roomtype rt ON r.roomtype_id = rt.id
            ORDER BY h.id, r.id";
    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['image_path'] = 'https://stayverse.in/assets/images/' . $row['image']; 
                $row['image_path2'] = 'https://stayverse.in/assets/images/' . $row['photo']; 

                // Include the room type in the response
                $row['room_type'] = $row['roomtype_name'];

                $data['homestays'][] = $row;
            }
        } else {
            $data['homestays'] = [];
        }
    } else {
        throw new Exception("Query execution failed for homestays: " . $mysqli->error);
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
