<?php
include '../config/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $passwordInput = $_POST['password'];
  $confirm = $_POST['confirm'];
?>
  <?php
  if ($passwordInput != $confirm) {
  ?>
    <h3 style="text-align: center;"><?php echo "Password do not macth!" ?></h3>
    <?php
    exit;
  }

  if (str_ends_with($email, "@gmail.com")) {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?);");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
    ?>
      <h3 style="text-align: center;"><?php echo "User is registered successfully!"; ?></h3>
    <?php
    } else { ?>
      <h3 style="text-align: center;"><?php echo "Error: " . $stmt->error; ?></h3>
<?php
    }
    $stmt->close();
  }
}
?>