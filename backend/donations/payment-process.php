<?php
session_start();
require_once __DIR__ . "/../config/db.php";

if (!isset($_SESSION['donation_data'])) {
    header("Location: ../../index.php");
    exit();
}

$status = $_POST['status'];

/* ❌ If payment failed */
if ($status === "fail") {
    unset($_SESSION['donation_data']);
    header("Location: ../../index.php?payment=failed");
    exit();
}

/* ✅ If payment success */
$data = $_SESSION['donation_data'];

$reference = $data['reference'];

$query = "INSERT INTO donations 
(full_name, email, amount, cause, payment_method, reference_id, status)
VALUES 
(
'{$data['full_name']}',
'{$data['email']}',
'{$data['amount']}',
'{$data['cause']}',
'{$data['payment_method']}',
'$reference',
'pending'
)";

if (!mysqli_query($conn, $query)) {
    die("Database Error: " . mysqli_error($conn));
}

unset($_SESSION['donation_data']);

$causePage = strtolower(str_replace(' ', '-', $data['cause'])) . ".php";
header("Location: ../../frontend/receipt.php?ref=$reference");
exit();
?>