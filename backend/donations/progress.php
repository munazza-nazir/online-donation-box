<?php
include "../config/db.php";

$result = mysqli_query($conn, "SELECT SUM(amount) AS total FROM donations");
$row = mysqli_fetch_assoc($result);

$total = $row['total'] ?? 0;
$goal = 500000;

echo json_encode([
  "total" => $total,
  "percent" => min(100, ($total / $goal) * 100)
]);
?>
