<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/admin-login.php");
    exit();
}
