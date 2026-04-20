<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$servername='localhost';
$username='root';
$password=$_ENV['DB_PASSWORD'];
$database=$_ENV['DATABASE'];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
?>