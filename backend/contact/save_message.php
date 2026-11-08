<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  if ($name == "" || $email == "" || $message == "") {
    echo "error";
    exit();
  }

  $sql = "INSERT INTO contact_messages (full_name, email, message)
          VALUES ('$name', '$email', '$message')";

  if (mysqli_query($conn, $sql)) {
    echo "success";
  } else {
    echo "error";
  }
}
?>
