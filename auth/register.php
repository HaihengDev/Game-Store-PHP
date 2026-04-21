<?php 
  include '../config/auth.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(str_contains($email, "@gmail.com")) {
      $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?);");
      $stmt->bind_param("ss", $username, $email, $password);

      if($stmt->execute()) {
        echo "User is registered successfully!";
      } else {
        echo "Error: " . $stmt->error;
      }
      $stmt->close();
    }
  }
?>