<?php
// Include your database configuration
require 'config.php';

// Check if the HTTP request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you're passing data in the request body (e.g., JSON)
    $data = json_decode(file_get_contents("php://input"));

    if ($data) {
        $phone = $data->phone; // Phone number
        $isVerified = $data->isVerified; // true or false condition

        // Update the 'user_login' table in the database
        $query = "UPDATE user_login SET phone = :phone, verified_is = :verified_is WHERE id = :user_id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':verified_is', $isVerified, PDO::PARAM_BOOL); // Assuming 'verified_is' is a boolean field
        $stmt->bindParam(':user_id', $user_id); // You need to set the user_id appropriately

        // Execute the SQL query
        if ($stmt->execute()) {
            // Return a success response
            $response = array("message" => "User data updated successfully");
            echo json_encode($response);
        } else {
            // Return an error response
            $response = array("message" => "Failed to update user data");
            echo json_encode($response);
        }
    } else {
        // Return an error response for invalid input
        $response = array("message" => "Invalid input data");
        echo json_encode($response);
    }
} else {
    // Return an error response for unsupported HTTP method
    $response = array("message" => "Unsupported HTTP method");
    echo json_encode($response);
}
?>
