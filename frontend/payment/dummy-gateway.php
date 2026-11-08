<?php
session_start();

/* If form is submitted */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['donation_data'] = [
        "full_name" => $_POST['full_name'],
        "email" => $_POST['email'],
        "amount" => $_POST['amount'],
        "cause" => $_POST['cause'],
        "payment_method" => $_POST['payment_method']
    ];

    // Generate reference ID
    $_SESSION['donation_data']['reference'] = "REF" . rand(100000, 999999);
}

/* Safety check */
if (!isset($_SESSION['donation_data'])) {
    header("Location: ../index.php");
    exit();
}

$data = $_SESSION['donation_data'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Secure Payment Gateway</title>
  <style>
    body {
      font-family: Arial;
      background: linear-gradient(135deg, #1e3a8a, #2563eb);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: #333;
    }

    .card {
      background: white;
      padding: 30px;
      border-radius: 15px;
      width: 400px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      text-align: center;
      animation: fadeIn 0.5s ease;
    }

    h2 {
      margin-bottom: 20px;
      color: #1e3a8a;
    }

    .info {
      background: #f1f5f9;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .info p {
      margin: 5px 0;
      font-size: 16px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .buttons {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    .btn {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }

    .success {
      background: #16a34a;
      color: white;
    }

    .fail {
      background: #dc2626;
      color: white;
    }

    .success:hover { background: #15803d; }
    .fail:hover { background: #b91c1c; }

    .loader {
      display: none;
      margin-top: 15px;
      color: #2563eb;
      font-weight: bold;
    }

    @keyframes fadeIn {
      from {opacity:0; transform: translateY(10px);}
      to {opacity:1; transform: translateY(0);}
    }
  </style>
</head>
<body>

<div class="card">
  <h2>💳 Secure Payment Gateway</h2>

  <div class="info">
    <p><strong>Name:</strong> <?= $data['full_name'] ?></p>
    <p><strong>Amount:</strong> ₨ <?= $data['amount'] ?></p>
    <p><strong>Method:</strong> <?= $data['payment_method'] ?></p>
    <p><strong>Reference ID:</strong> <?= $data['reference'] ?></p>
  </div>

  <!-- ✅ ONE FORM ONLY (BEST PRACTICE) -->
<form method="POST" action="../../backend/donations/payment-process.php">
    <!-- Fake Card Inputs -->
    <input type="text" name="card" placeholder="Card Number" required>
    <input type="text" name="expiry" placeholder="Expiry (MM/YY)" required>
    <input type="text" name="cvv" placeholder="CVV" required>

    <!-- Hidden status -->
    <input type="hidden" name="status" id="statusInput">

<div class="buttons">

  <button type="submit" class="btn success"
    onclick="setStatus('success'); setTimeout(() => this.form.submit(), 500); return false;">
    ✔ Pay Now
  </button>

  <button type="submit" class="btn fail"
    onclick="setStatus('fail'); setTimeout(() => this.form.submit(), 500); return false;">
    ✖ Cancel
  </button>

</div>

  </form>

  <!-- Loader OUTSIDE -->
  <div id="loader" style="display:none; margin-top:15px; color:#2563eb; font-weight:bold;">
    Processing Payment...
  </div>

</div>
<script>
function setStatus(status) {
  document.getElementById("statusInput").value = status;
  document.getElementById("loader").style.display = "block";
}
</script>
</body>
</html>