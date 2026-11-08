<?php
session_start();
include "../config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

 if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['admin'] = $row['username'];
    $_SESSION['role']  = $row['role'];   // ⭐ important line

    header("Location: ../admin/dashboard.php");
    exit();
} else {
    $error = "Invalid username or password";
}

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
  body {
    margin: 0;
    height: 100vh;
    font-family: "Segoe UI", Arial, sans-serif;
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-box {
    background: white;
    padding: 40px;
    width: 360px;
    border-radius: 14px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    text-align: center;
    animation: fadeIn 0.8s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .login-box h2 {
    margin-bottom: 25px;
    color: #1e3a8a;
    font-size: 26px;
  }

  .login-box input {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 15px;
    outline: none;
  }

  .login-box input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 2px rgba(37,99,235,0.2);
  }

  .login-box button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.2s;
  }

  .login-box button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  }

  .error {
    background: #fee2e2;
    color: #991b1b;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    font-size: 14px;
  }

  .footer {
    margin-top: 20px;
    font-size: 13px;
    color: #666;
  }
</style>

</head>

<body>

<div class="login-box">
  <h2>Online Donation Box</h2>

  <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST">
    <input type="text" name="username" placeholder="👤 Username" required>
    <input type="password" name="password" placeholder="🔒 Password" required>
    <button type="submit">Login</button>
  </form>

  <div class="footer">
    Admin & Staff Portal
  </div>
</div>
</body>
</html>