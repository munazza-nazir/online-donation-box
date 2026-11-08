<?php
include "auth.php";
require_once "../config/db.php";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=donations_report.csv");

$output = fopen("php://output", "w");

// Column headings
fputcsv($output, [
  'Reference ID',
  'Full Name',
  'Email',
  'Amount',
  'Cause',
  'Payment Method',
  'Status',
  'Date'
]);

$query = "SELECT * FROM donations ORDER BY id DESC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
  fputcsv($output, [
    $row['reference_id'],
    $row['full_name'],
    $row['email'],
    $row['amount'],
    $row['cause'],
    $row['payment_method'],
    $row['status'],
    $row['created_at']
  ]);
}

fclose($output);
exit;
