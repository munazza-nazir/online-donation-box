<?php
session_start();

$_SESSION['donation_data'] = [
  'full_name' => $_POST['full_name'],
  'email' => $_POST['email'],
  'amount' => $_POST['amount'],
  'cause' => $_POST['cause'],
  'payment_method' => $_POST['payment_method']
];

header("Location: ../../frontend/payment/dummy-gateway.php");
exit();
?>