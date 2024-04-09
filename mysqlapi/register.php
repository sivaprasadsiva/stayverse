<?php
include('config.php');

if (
    isset($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["referral_code"]) &&
    isset($_POST["password"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone"])
) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $referral_code = $_POST["referral_code"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT COUNT(*) FROM user_login WHERE email = ?";
    $stmt = $mysqli->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($emailCount);
    $stmt->fetch();
    $stmt->close();

    if ($emailCount > 0) {
        $return["error"] = true;
        $return["message"] = "Email already exists.";
    } else {
        // Create a prepared statement to insert the new user
        $insertQuery = "INSERT INTO user_login (first_name, last_name, referral_code, password, email, phone) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($insertQuery);

        if ($stmt) {
            $stmt->bind_param("ssssss", $first_name, $last_name, $referral_code, $password, $email, $phone);

            if ($stmt->execute()) {
                $return["error"] = false;
                $return["message"] = "User registered successfully";
                $return["user_data"] = array(
                    "user_id" => $stmt->insert_id,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "referral_code" => $referral_code,
                    "email" => $email,
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
    $return["message"] = "Send all parameters.";
}

header('Content-Type: application/json');
echo json_encode($return);
?>
