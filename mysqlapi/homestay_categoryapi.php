<?php
include('config.php'); // Include your database configuration

$data = [];

try {
    // Query to select all data from the category table
    $categorySql = "SELECT * FROM category";
    $categoryResult = $mysqli->query($categorySql);

    if ($categoryResult) {
        if ($categoryResult->num_rows > 0) {
            while ($categoryRow = $categoryResult->fetch_assoc()) {
                $data['category_type'][] = $categoryRow;
            }
        } else {
            $data['category_type'] = [];
        }
    } else {
        throw new Exception("Query execution failed for categories: " . $mysqli->error);
    }

    // Query to select homestays, rooms, and their associated room types with category names
    $combinedSql = "SELECT h.*, r.*, rt.*, c.category AS category_name
            FROM homestay h
            JOIN rooms r ON h.id = r.homestay_id
            JOIN roomtype rt ON r.roomtype_id = rt.id
            LEFT JOIN homestay_category hc ON h.id = hc.homestay_id
            LEFT JOIN category c ON hc.category = c.id
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
    } else {
        throw new Exception("Query execution failed for homestays: " . $mysqli->error);
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

?>
