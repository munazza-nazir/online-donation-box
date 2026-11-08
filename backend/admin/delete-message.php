<?php
include "auth.php";
if ($_SESSION['role'] != 'admin') {
    die("Access denied. Admin only.");
}

session_start();
include "../config/db.php";

if (!isset($_SESSION['admin'])) {
  header("Location: admin-login.php");
  exit();
}

$id = $_GET['id'];

$query = "DELETE FROM messages WHERE id=$id";
mysqli_query($conn, $query);

header("Location: messages.php?deleted=1");
exit();

