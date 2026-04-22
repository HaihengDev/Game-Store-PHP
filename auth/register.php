<?php
include '../config/auth.php';

$username = trim($_POST['username'] ?? "");
$email = trim($_POST['email'] ?? "");
$passwordInput = trim($_POST['password'] ?? "");
$confirm = trim($_POST['confirm'] ?? "");

if ($passwordInput !== $confirm) {
  echo json_encode(['status' => 'error', 'message' => '*Password does not match']);
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['status' => 'error', 'message' => '*Only email allowed']);
  exit;
}

$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
  echo json_encode(['status' => 'error', 'message' => '*This email is already exist']);
  exit;
}

$password = password_hash($passwordInput, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?);");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
  echo json_encode(["status" => "success", "redirect" => "/"]);
  exit;
} else {
  echo json_encode(['status' => 'error', 'message' => 'Database error']);
  exit;
}

$stmt->close();
