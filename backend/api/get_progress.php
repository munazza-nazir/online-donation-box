<?php
require_once __DIR__ . "/../config/db.php";

$cause = $_GET['cause'] ?? '';

if ($cause == '') {
    echo json_encode(["total" => 0, "percent" => 0, "goal" => 0]);
    exit;
}

/* 🎯 Set goal per campaign */
$goals = [
    "Education Fund" => 800000,
    "Pakistan Flood" => 500000,
    "Palestine Relief" => 600000
];

$goal = $goals[$cause] ?? 500000;

/* 💰 Get total approved donations */
$stmt = $conn->prepare("SELECT SUM(amount) AS total FROM donations WHERE cause=? AND status='approved'");
$stmt->bind_param("s", $cause);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

$total = $result['total'] ?? 0;

/* 📊 Calculate percent */
$percent = ($goal > 0) ? min(100, round(($total / $goal) * 100)) : 0;

echo json_encode([
    "total" => $total,
    "goal" => $goal,
    "percent" => $percent
]);
