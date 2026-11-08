
<?php
include "auth.php";

/* 🔌 DB connection */
require_once __DIR__ . "/../config/db.php";

/* 🔐 Admin protection */
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/admin-login.php");
    exit();
}

// DELETE MESSAGE
if (isset($_GET['delete']) && $_SESSION['role'] == 'admin') {
 $id = (int) $_GET['delete'];
  mysqli_query($conn, "DELETE FROM contact_messages WHERE id=$id");

  header("Location: messages.php?deleted=1");
  exit();
}

// Mark all unseen as seen
mysqli_query($conn, "UPDATE contact_messages SET status='seen' WHERE status='unseen'");

/* 📩 Fetch messages */
$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY created_at DESC");
?>


<!DOCTYPE html>
<html>
<head>
<title>Contact Messages</title>
<style>
body {
  font-family: Arial;
  background: #f4f6f8;
}
.container {
  width: 90%;
  margin: 30px auto;
  background: white;
  padding: 20px;
  border-radius: 10px;
}
table {
  width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
}

th {
  background: linear-gradient(135deg, #0b5ed7, #1d4ed8);
  color: white;
  padding: 12px;
  text-align: left;
}

td {
  padding: 12px;
  border-bottom: 1px solid #ddd;
  word-wrap: break-word;
}
th, td {
  text-align: center;
}
td:nth-child(4) {
  text-align: left;
}

</style>
</head>
<body>

<div class="container">
<h2>📩 Contact Messages</h2>
<a href="dashboard.php" style="text-decoration:none;color:#0b5ed7;">⬅ Back to Dashboard</a>
<br><br>


<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Message</th>
  <th>Date</th>
  <th>Action</th>
  <th>Status</th>
</tr>


<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr  style="<?= $row['status']=='unseen' ? 'background:#fff7f7;' : '' ?>">
  <td><?= $row['id'] ?></td>
  <td><?= $row['full_name'] ?></td>
  <td><?= $row['email'] ?></td>
  <td><?= $row['message'] ?></td>
  <td><?= $row['created_at'] ?></td>
  <td>
  <?php if($_SESSION['role'] == 'admin') { ?>
    <a href="messages.php?delete=<?= $row['id'] ?>" 
       onclick="return confirm('Delete this message?')"
       style="color:red;">Delete</a>
  <?php } else { ?>
    View only
  <?php } ?>
</td>


<td>
  <?php if($row['status'] == 'unseen') { ?>
    <span style="color:red;font-weight:bold;">Unseen</span>
  <?php } else { ?>
    <span style="color:green;">Seen</span>
  <?php } ?>
</td>

</tr>
<?php } ?>

</table>
</div>

<div >
  <?php if (isset($_GET['deleted'])) { ?>
    <div id="successMsg"  style="background:#d4edda;color:#155724;padding:10px;margin-bottom:10px;border-radius:6px;">
      ✅ Message deleted successfully
    </div>
  <?php } ?>

<script>
setTimeout(() => {
  const msg = document.getElementById("successMsg");

  if (msg) {
    msg.style.transition = "opacity 0.5s ease";
    msg.style.opacity = "0";

    setTimeout(() => {
      msg.remove();

      // remove ?deleted=1 from URL so it won't appear on refresh
      window.history.replaceState({}, document.title, "messages.php");
    }, 500);
  }
}, 3000); // 3 seconds
</script>

</body>
</html> 