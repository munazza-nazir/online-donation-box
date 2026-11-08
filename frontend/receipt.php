<?php
session_start();

if (!isset($_GET['ref'])) {
    header("Location: ../index.php");
    exit();
}

$reference = $_GET['ref'];

/* OPTIONAL: fetch from DB (best practice) */
require_once __DIR__ . "/../backend/config/db.php";

$query = "SELECT * FROM donations WHERE reference_id='$reference' LIMIT 1";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Receipt not found");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Donation Receipt</title>
  <style>
    body {
      font-family: Arial;
      background: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .receipt {
      background: white;
      padding: 30px;
      border-radius: 12px;
      width: 400px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #16a34a;
    }

    p {
      margin: 10px 0;
      font-size: 15px;
    }

    .ref {
      background: #e0f2fe;
      padding: 10px;
      border-radius: 6px;
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }

    .btn {
      display: block;
      margin-top: 20px;
      text-align: center;
      padding: 10px;
      background: #2563eb;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .btn:hover {
      background: #1d4ed8;
    }
  </style>
</head>
<body>

<div class="receipt">
  <h2>✅ Donation Receipt</h2>

  <p><strong>Name:</strong> <?= $data['full_name'] ?></p>
  <p><strong>Email:</strong> <?= $data['email'] ?></p>
  <p><strong>Amount:</strong> ₨ <?= $data['amount'] ?></p>
  <p><strong>Cause:</strong> <?= $data['cause'] ?></p>
  <p><strong>Payment Method:</strong> <?= $data['payment_method'] ?></p>
  <p><strong>Status:</strong> <?= $data['status'] ?></p>
  <p><strong>Date:</strong> <?= $data['created_at'] ?></p>

  <div class="ref">
    Reference ID: <?= $data['reference_id'] ?>
  </div>

  <button class="btn" onclick="window.print()">🖨 Print Receipt</button>
  <a href="/online-donation-box/<?= strtolower(str_replace(' ', '-', $data['cause'])) ?>.php?payment=success" class="btn">
  🔙 Back to Campaign
</a>
</div>

</body>
</html>