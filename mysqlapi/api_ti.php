<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'stayvers_user');
define('DB_PASSWORD', 'Rc0a$EB*r9)=');
define('DB_NAME', 'stayvers_db');

// Create a new PDO connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors here
    die("Database connection failed: " . $e->getMessage());
}

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM homestay";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Fetch the data as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Close the database connection
    $pdo = null;
    
    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    // Handle database connection or query errors
    echo json_encode(["error" => $e->getMessage()]);
}
?>
