<?php
// Include the database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'stayvers_user');
define('DB_PASSWORD', 'Rc0a$EB*r9)=');
define('DB_NAME', 'stayvers_db');


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


?>