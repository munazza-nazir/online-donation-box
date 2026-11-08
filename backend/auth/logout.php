<?php
session_start();

/* Destroy session */
session_unset();
session_destroy();

/* Redirect to login */
header("Location: admin-login.php");
exit();