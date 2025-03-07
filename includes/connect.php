<?php
// includes/connect.php for Onoh (PDO version)
$host = 'localhost';
$dbname = 'portfolio_db'; // Adjust to her actual DB name
$user = 'root';           // Adjust to her DB credentials
$pass = '';              // Adjust to her DB credentials

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>