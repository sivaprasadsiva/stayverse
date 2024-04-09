<?php
include('config.php'); // Include your database configuration

$data = [];

try {
    // Query to select all data from the homerules table
    $homerulesSql = "SELECT * FROM homerules";
    $homerulesResult = $mysqli->query($homerulesSql);

    if ($homerulesResult) {
        if ($homerulesResult->num_rows > 0) {
            while ($homerulesRow = $homerulesResult->fetch_assoc()) {
                $data['rule_type'][] = $homerulesRow;
            }
        } else {
            $data['rule_type'] = [];
        }
    } else {
        throw new Exception("Query execution failed for homerules: " . $mysqli->error);
    }

    // Query to select homestays, rooms, and their associated room types with rule names
    $combinedSql = "SELECT h.*, r.*, rt.*, hr.homerules AS rule_name
            FROM homestay h
            JOIN rooms r ON h.id = r.homestay_id
            JOIN roomtype rt ON r.roomtype_id = rt.id
            LEFT JOIN homestay_rules hhr ON h.id = hhr.homestay_id
            LEFT JOIN homerules hr ON hhr.rules = hr.id
            ORDER BY h.id, r.id";
    $combinedResult = $mysqli->query($combinedSql);

    if ($combinedResult) {
        if ($combinedResult->num_rows > 0) {
            while ($row = $combinedResult->fetch_assoc()) {
                $row['image_path'] = 'https://stayverse.in/assets/images/' . $row['image']; 
                $row['image_path2'] = 'https://stayverse.in/assets/images/' . $row['photo']; 

                // Include the room type in the response
                $row['room_type'] = $row['roomtype_name'];

                $data['homestays'][] = $row;
            }
        } else {
            $data['homestays'] = [];
        }
    } 

    header('Content-Type: application/json');
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
