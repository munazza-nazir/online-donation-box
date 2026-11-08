<?php
include "auth.php";
if ($_SESSION['role'] != 'admin') {
    die("Access denied. Admin only.");
}
include "../config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "UPDATE donations SET status='approved' WHERE id=$id");

header("Location: dashboard.php");
exit();
