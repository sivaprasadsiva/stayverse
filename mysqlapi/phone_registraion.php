<?php
include('config.php');

if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];

    // Check if the phone number already exists in the database
    $checkPhoneQuery = "SELECT COUNT(*) FROM user_login WHERE phone = ?";
    $stmt = $mysqli->prepare($checkPhoneQuery);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->bind_result($phoneCount);
    $stmt->fetch();
    $stmt->close();

    if ($phoneCount > 0) {
        $return["error"] = true;
        $return["message"] = "User with the same phone number already exists.";
    } else {
        // Create a prepared statement to insert the new user with only the 'phone' field
        $insertQuery = "INSERT INTO user_login (phone) VALUES (?)";
        $stmt = $mysqli->prepare($insertQuery);

        if ($stmt) {
            $stmt->bind_param("s", $phone);

            if ($stmt->execute()) {
                $return["error"] = false;
                $return["message"] = "User registered successfully with phone number";
                $return["user_data"] = array(
                    "user_id" => $stmt->insert_id,
                    "phone" => $phone
                );
            } else {
                $return["error"] = true;
                $return["message"] = "Error inserting user data: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $return["error"] = true;
            $return["message"] = "Error preparing the SQL statement: " . $mysqli->error;
        }
    }

    $mysqli->close();
} else {
    $return["error"] = true;
    $return["message"] = "Send the 'phone' parameter.";
}

header('Content-Type: application/json');
echo json_encode($return);
?>
