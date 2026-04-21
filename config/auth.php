<?php require __DIR__ . '/../vendor/authload.php' ?>
<?php 
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
  $dotenv->load();

  $server = "localhost";
  $username = "root";
  $password = $_ENV['DB_PASSWORD'];
  $database = $_ENV['DATABASE'];

  $conn = new mysqli($server, $username, $password, $database);

  if($conn -> connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }
?>