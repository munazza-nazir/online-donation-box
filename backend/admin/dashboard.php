<?php
include "auth.php";

/* 🔐 AUTH CHECK FIRST */
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/admin-login.php");
    exit();
}


/* ✅ CONNECT DB ONCE */
require_once __DIR__ . "/../config/db.php";

/* ✅ SAFETY CHECK */
if (!$conn) {
    die("Database connection failed");
}

/* 📊 Campaign stats */
$campaigns = mysqli_query($conn, "
  SELECT cause, 
         SUM(amount) AS total_amount, 
         COUNT(*) AS total_donors
  FROM donations
  WHERE status='approved'
  GROUP BY cause
");
/* 📩 Message Count */
$msgQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contact_messages");
$msgCount = mysqli_fetch_assoc($msgQuery)['total'];

$chartQuery = mysqli_query($conn, "
  SELECT cause, SUM(amount) AS total
  FROM donations
  WHERE status='approved'
  GROUP BY cause
");

$causes = [];
$amounts = [];

while ($row = mysqli_fetch_assoc($chartQuery)) {
  $causes[] = $row['cause'];
  $amounts[] = $row['total'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard | Online Donation Box</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      margin: 0;
    }
    header {
      background: #003399;
      color: white;
      padding: 15px 30px;
    }
    .container {
      padding: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
    }
    th {
      background: #eaf0ff;
    }
    .summary {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 8px;
      width: 200px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .status {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 13px;
      color: white;
    }
    .status.pending { background: orange; }
    .status.approved { background: green; }
    .status.rejected { background: red; }
    .btn-approve {
      background: #16a34a;
      color: white;
      padding: 5px 8px;
      border-radius: 5px;
      text-decoration: none;
    }
    .btn-reject {
      background: #dc2626;
      color: white;
      padding: 5px 8px;
      border-radius: 5px;
      text-decoration: none;
      margin-left: 5px;
    }

    .filter-box {
  display: flex;
  gap: 20px;
  align-items: flex-end;
  background: #ffffff;
  padding: 15px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  margin-bottom: 20px;
}

.filter-group {
  display: flex;
  flex-direction: column;
}

.filter-group label {
  font-size: 13px;
  color: #555;
  margin-bottom: 5px;
}

.filter-group select {
  padding: 8px 12px;
  border-radius: 6px;
  border: 1px solid #ccc;
  min-width: 160px;
  font-size: 14px;
}

.filter-actions {
  display: flex;
  gap: 10px;
}

.filter-actions button {
  background: #2563eb;
  color: white;
  border: none;
  padding: 9px 16px;
  border-radius: 6px;
  cursor: pointer;
}

.filter-actions button:hover {
  background: #1d4ed8;
}

.reset-btn {
  background: #e5e7eb;
  color: #333;
  padding: 9px 16px;
  border-radius: 6px;
  text-decoration: none;
}

.reset-btn:hover {
  background: #d1d5db;
}

.btn-export{
  background:#1abc9c;
  color:white;
  padding:10px 18px;
  border-radius:6px;
  text-decoration:none;
  font-weight:600;
}
/* Action buttons container */
.action-buttons {
  display: flex;
  gap: 8px;              /* space between buttons */
  align-items: center;
}

/* Common button style */
.btn-approve,
.btn-reject {
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 13px;
  text-decoration: none;
  font-weight: 500;
  white-space: nowrap;   /* prevents breaking into next line */
  display: inline-block;
}

/* Approve button */
.btn-approve {
  background: #16a34a;
  color: white;
}

.btn-approve:hover {
  background: #15803d;
}

/* Reject button */
.btn-reject {
  background: #dc2626;
  color: white;
}

.btn-reject:hover {
  background: #b91c1c;
}
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<header>
  <a href="../auth/logout.php" style="color:white; float:right;">Logout</a>

 <h1>
  <?= ucfirst($_SESSION['role']) ?> Dashboard
</h1>

  <div style="margin-top:10px;">
    <a href="messages.php" style="
      background:#0d6efd;
      color:white;
      padding:8px 15px;
      text-decoration:none;
      border-radius:6px;
      margin-right:10px;
    ">
      📩 Messages (<?= $msgCount ?>)
    </a>
  </div>
</header>

<div class="container">

<?php
/* 📊 SUMMARY */
$totalQuery = mysqli_query($conn,
  "SELECT SUM(amount) AS total FROM donations WHERE status='approved'"
);
$total = mysqli_fetch_assoc($totalQuery)['total'] ?? 0;

$countQuery = mysqli_query($conn,
  "SELECT COUNT(*) AS cnt FROM donations WHERE status='approved'"
);
$count = mysqli_fetch_assoc($countQuery)['cnt'] ?? 0;
?>

<div class="summary">
  <div class="card">
    <h3>Total Raised</h3>
    <p>₨ <?= $total ?></p>
  </div>
  <div class="card">
    <h3>Total Donations</h3>
    <p><?= $count ?></p>
  </div>
</div>
<a href="export.php" class="btn-export">⬇ Export Donations Report</a>

<h2>Campaign Performance</h2>

<table border="1" cellpadding="10" style="width:100%; background:#fff;">
<tr style="background:#f0f0f0;">
  <th>Cause</th>
  <th>Total Raised</th>
  <th>Total Donors</th>
</tr>

<?php while($row = mysqli_fetch_assoc($campaigns)): ?>
<tr>
  <td><?php echo $row['cause']; ?></td>
  <td>₨ <?php echo number_format($row['total_amount']); ?></td>
  <td><?php echo $row['total_donors']; ?></td>
</tr>
<?php endwhile; ?>
</table>
<h2>All Donations</h2>

<form method="GET" class="filter-box">
  <div class="filter-group">
    <label>Cause</label>
    <select name="cause">
      <option value="">All Causes</option>
      <option value="Education Fund">Education Fund</option>
      <option value="Pakistan Flood">Pakistan Flood</option>
      <option value="Palestine Relief">Palestine Relief</option>
    </select>
  </div>

  <div class="filter-group">
    <label>Status</label>
    <select name="status">
      <option value="">All Status</option>
      <option value="pending">Pending</option>
      <option value="approved">Approved</option>
      <option value="rejected">Rejected</option>
    </select>
  </div>

  <div class="filter-actions">
    <button type="submit">Apply Filters</button>
    <a href="dashboard.php" class="reset-btn">Reset</a>
  </div>
</form>

<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Amount</th>
  <th>Cause</th>
  <th>Payment</th>
  <th>Status</th>
  <th>Action</th>
  <th>Date</th>
</tr>

<?php
$where = [];

if (!empty($_GET['cause'])) {
  $cause = mysqli_real_escape_string($conn, $_GET['cause']);
  $where[] = "cause='$cause'";
}

if (!empty($_GET['status'])) {
  $status = mysqli_real_escape_string($conn, $_GET['status']);
  $where[] = "status='$status'";
}

$sql = "SELECT * FROM donations";

if (count($where) > 0) {
  $sql .= " WHERE " . implode(" AND ", $where);
}

$sql .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= $row['full_name'] ?></td> 
  <td><?= $row['email'] ?></td>
  <td>₨ <?= $row['amount'] ?></td>
  <td><?= $row['cause'] ?></td>
  <td><?= $row['payment_method'] ?></td>
  <td>
    <span class="status <?= $row['status'] ?>">
      <?= $row['status'] ?>
    </span>
  </td>
  <td>
  <?php if ($_SESSION['role'] == 'admin' && $row['status'] === 'pending'): ?>
    
    <div class="action-buttons">
      <a href="approve.php?id=<?= $row['id'] ?>" class="btn-approve">✔ Approve</a>
      <a href="reject.php?id=<?= $row['id'] ?>" class="btn-reject">✖ Reject</a>
    </div>

  <?php else: ?>
    -
  <?php endif; ?>
</td>
  <td><?= $row['created_at'] ?></td>

</tr>
<?php } ?>
</table>
</div>

<h2>📊 Donation Analytics</h2>

<div style="display:flex; gap:40px; margin-top:20px; justify-content:center;">

  <div style="width:450px; height:300px;">
    <canvas id="barChart"></canvas>
  </div>

  <div style="width:350px; height:300px;">
    <canvas id="pieChart"></canvas>
  </div>

</div>

<script>
const causes = <?= json_encode($causes) ?>;
const amounts = <?= json_encode($amounts) ?>;

/* BAR CHART */
new Chart(document.getElementById('barChart'), {
  type: 'bar',
  data: {
    labels: causes,
    datasets: [{
      label: 'Amount Raised (PKR)',
      data: amounts,
      backgroundColor: '#2563eb'
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});

/* PIE CHART */
new Chart(document.getElementById('pieChart'), {
  type: 'pie',
  data: {
    labels: causes,
    datasets: [{
      data: amounts,
      backgroundColor: [
        '#16a34a',
        '#2563eb',
        '#dc2626',
        '#f59e0b',
        '#7c3aed'
      ]
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});
</script>

</body>
</html>