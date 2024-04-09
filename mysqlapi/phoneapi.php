<?php
include('config.php');

if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];

    // Check if the phone number already exists in the database
    $checkPhoneQuery = "SELECT COUNT(*), apitoken FROM user_login WHERE phone = ?";
    $stmt = $mysqli->prepare($checkPhoneQuery);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->bind_result($phoneCount, $apiToken);
    $stmt->fetch();
    $stmt->close();

    if ($phoneCount > 0) {
        // User already exists, update the API token
        function generateApiToken() {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // Add characters as needed
            $apiToken = '';

            for ($i = 0; $i < 64; $i++) {
                $apiToken .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $apiToken;
        }

        $newApiToken = generateApiToken();

        // Update the user's API token in the database
        $updateApiTokenQuery = "UPDATE user_login SET apitoken = ? WHERE phone = ?";
        $stmt = $mysqli->prepare($updateApiTokenQuery);

        if ($stmt) {
            $stmt->bind_param("ss", $newApiToken, $phone);

            if ($stmt->execute()) {
                // Send an OTP using 2Factor.in API
                $otpUrl = 'https://2factor.in/API/V1/1195a96b-6ab2-11ee-addf-0200cd936042/SMS/' . $phone . '/AUTOGEN2/Greetings+and+Welcome';

                // Make an HTTP request to the OTP URL
                $ch = curl_init($otpUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Process the response and handle any errors

                $return["error"] = false;
                $return["message"] = "User already exists. Updated API token.";
                $return["user_data"] = array(
                    "user_id" => $stmt->insert_id,
                    "phone" => $phone,
                    "apitoken" => $newApiToken
                );
            } else {
                $return["error"] = true;
                $return["message"] = "Error updating user's API token: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $return["error"] = true;
            $return["message"] = "Error preparing the SQL statement for updating API token: " . $mysqli->error;
        }
    } else {
        // User doesn't exist, create a new user with an API token
        function generateApiToken() {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // Add characters as needed
            $apiToken = '';

            for ($i = 0; $i < 64; $i++) {
                $apiToken .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $apiToken;
        }

        $newApiToken = generateApiToken();

        $insertQuery = "INSERT INTO user_login (phone, apitoken) VALUES (?, ?)";
        $stmt = $mysqli->prepare($insertQuery);

        if ($stmt) {
            $stmt->bind_param("ss", $phone, $newApiToken);

            if ($stmt->execute()) {
                // Send an OTP using 2Factor.in API
                $otpUrl = 'https://2factor.in/API/V1/1195a96b-6ab2-11ee-addf-0200cd936042/SMS/' . $phone . '/AUTOGEN2/Greetings+and+Welcome';

                // Make an HTTP request to the OTP URL
                $ch = curl_init($otpUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Process the response and handle any errors

                $return["error"] = false;
                $return["message"] = "User registered successfully with phone number and API token";
                $return["user_data"] = array(
                    "user_id" => $stmt->insert_id,
                    "phone" => $phone,
                    "apitoken" => $newApiToken
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
