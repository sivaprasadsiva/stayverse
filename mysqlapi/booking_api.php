<?php
include('config.php');

if (
    isset($_POST["homestay_id"]) &&
    isset($_POST["user_id"]) &&
    isset($_POST["price"]) &&
    isset($_POST["checkin"]) &&
    isset($_POST["checkout"]) &&
    isset($_POST["payment_mode"]) &&
    isset($_POST["guests"]) &&
    isset($_POST["status"])
) {
    $homestay_id = $_POST["homestay_id"];
    $user_id = $_POST["user_id"];
    $price = $_POST["price"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $payment_mode = $_POST["payment_mode"];
    $guests = $_POST["guests"];
    $status = $_POST["status"];

    // Create a prepared statement to insert the new booking
    $insertQuery = "INSERT INTO booking (homestay_id, user_id, price, checkin, checkout, payment_mode, guests, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);

    if ($stmt) {
        $stmt->bind_param("iiisssii", $homestay_id, $user_id, $price, $checkin, $checkout, $payment_mode, $guests, $status);

        if ($stmt->execute()) {
            $return["error"] = false;
            $return["message"] = "Booking inserted successfully";
            $return["booking_data"] = array(
                "booking_id" => $stmt->insert_id,
                "homestay_id" => $homestay_id,
                "user_id" => $user_id,
                "price" => $price,
                "checkin" => $checkin,
                "checkout" => $checkout,
                "payment_mode" => $payment_mode,
                "guests" => $guests,
                "status" => $status
            );
        } else {
            $return["error"] = true;
            $return["message"] = "Error in booking: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $return["error"] = true;
        $return["message"] = "Error preparing the SQL statement: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    $return["error"] = true;
    $return["message"] = "Send all Data.";
}

header('Content-Type: application/json');
echo json_encode($return);
?>
