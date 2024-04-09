<?php
include('config.php'); // Include your database configuration

$data = [];

try {
   $sql = "SELECT h.*, r.*, rt.roomtype AS room_type
        FROM homestay h
        LEFT JOIN rooms r ON h.id = r.homestay_id
        LEFT JOIN roomtype rt ON r.roomtype_id = rt.id
        ORDER BY h.id, r.price ASC";

    $result = $mysqli->query($sql);

    if ($result) {
        $homestayData = null;
//        $homestayData['rooms'] = [];

        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];

            if ($homestayData === null || $homestayData['name'] !== $name) {
                // New homestay record
                if ($homestayData !== null) {
                    $hm = ['image_path2' => 'https://stayverse.in/assets/images/' . $row['photo']];
                   $data[] = array_merge($homestayData, $hm);
                }

                $homestayData = $row;
                $homestayData['rooms'] = [];
            }

            // Add room information to the current homestay
            $roomInfo = [
                'roomtype_id' => $row['roomtype_id'],
                'roomtype' => $row['room_type'],
                'details' => $row['details'],
                'offerprice' => $row['offerprice'],
                'price' => $row['price'],
                'image_path' => 'https://stayverse.in/assets/images/' . $row['image'],
                'image_path2' => 'https://stayverse.in/assets/images/' . $row['photo'],
            ];
            $homestayData['rooms'][] = $roomInfo;
        }

        if ($homestayData !== null) {
            $data[] = $homestayData;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    } 
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
