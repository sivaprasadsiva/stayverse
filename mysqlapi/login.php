<?php
include('config.php');

// Assuming you're using POST requests in Flutter to send email and password
$email = $_POST['email'];
$password = $_POST['password'];

$check_user_query = "SELECT id, password FROM user_login WHERE email = '$email'";
$result = $mysqli->query($check_user_query);

$response = array();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stored_password = $row['password'];

    if ($password === $stored_password) {
        $response["status"] = true; // Successful login
        $response["message"] = "Login successful";
    } else {
        $response["status"] = false; // Incorrect password
        $response["message"] = "Incorrect password";
    }
} else {
    $response["status"] = false; // User not found
    $response["message"] = "User not found";
}

$mysqli->close();

// Return the response in JSON format
header('Content-Type: application/json');
echo json_encode($response);
?>
