<?php
require_once "backend/config/db.php";

/* 💰 Total Funds Raised */
$totalQuery = mysqli_query($conn,
  "SELECT SUM(amount) AS total 
   FROM donations 
   WHERE status='approved'"
);
$totalRaised = mysqli_fetch_assoc($totalQuery)['total'] ?? 0;

/* 👥 Active Donors (unique emails) */
$donorQuery = mysqli_query($conn,
  "SELECT COUNT(DISTINCT email) AS donors 
   FROM donations 
   WHERE status='approved'"
);
$donors = mysqli_fetch_assoc($donorQuery)['donors'] ?? 0;

/* 🌍 Causes Supported */
$causeQuery = mysqli_query($conn,
  "SELECT COUNT(DISTINCT cause) AS causes 
   FROM donations 
   WHERE status='approved'"
);
$causes = mysqli_fetch_assoc($causeQuery)['causes'] ?? 0;

/* 🎓 Students Sponsored
   (Temporary logic: Education Fund donations count)
*/
$studentQuery = mysqli_query($conn,
  "SELECT COUNT(*) AS students 
   FROM donations 
   WHERE cause='Education Fund' 
   AND status='approved'"
);
$students = mysqli_fetch_assoc($studentQuery)['students'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Donation Box</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Main CSS -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php if (isset($_GET['payment']) && $_GET['payment'] == 'success'): ?>
  <p style="color:green; text-align:center; font-weight:bold;">
    ✅ Donation Successful! Waiting for approval.
  </p>
<?php endif; ?>

<?php if (isset($_GET['payment']) && $_GET['payment'] == 'failed'): ?>
  <p style="color:red; text-align:center; font-weight:bold;">
    ❌ Payment Failed. Try again.
  </p>
<?php endif; ?>
<!-- ===== NAVBAR ===== -->
<header class="navbar">
  <div class="logo">
    <i class="fas fa-donate"></i> Online Donation Box
  </div>

  <nav class="nav-links">
    <a href="index.php" class="active">Home</a>
    <a href="pakistan-flood.php">Pakistan Flood</a>
    <a href="palestine-relief.php">Palestine Relief</a>
    <a href="education-fund.php">Education Fund</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
  </nav>

  <a href="#causes" class="donate-btn">Donate Now</a>
</header>

<!-- ===== HERO ===== -->
<section class="hero">
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <h1>Your Small Help Can Bring Big Change</h1>
    <p>Join hands to support those in need — every rupee counts.</p>
    <a href="#causes" class="hero-btn">Donate Now</a>
  </div>
</section>

<!-- ===== CAUSES ===== -->
<section class="causes" id="causes">
  <h2>Our Causes</h2>
  <p class="section-subtitle">
    Choose a cause you care about and make a difference today.
  </p>

  <div class="cause-container">

    <div class="cause-card">
      <img src="images/flood.jpg.png" alt="Pakistan Flood">
      <h3>Pakistan Flood Relief</h3>
      <p>Support families affected by devastating floods across Pakistan.</p>
      <a href="pakistan-flood.php" class="cause-btn">Donate Now</a>
    </div>

    <div class="cause-card">
      <img src="images/palestine.jpg.png" alt="Palestine Relief">
      <h3>Palestine Relief Fund</h3>
      <p>Provide essential humanitarian aid to affected families.</p>
      <a href="palestine-relief.php" class="cause-btn">Donate Now</a>
    </div>

    <div class="cause-card">
      <img src="images/education.jpg.webp" alt="Education Fund">
      <h3>Education Fund</h3>
      <p>Empower underprivileged students through education.</p>
      <a href="education-fund.php" class="cause-btn">Donate Now</a>
    </div>

  </div>
</section>

<!-- ===== IMPACT ===== -->
<section class="impact">
  <h2>Our Impact</h2>
  <p class="impact-text">
🌙✨“Whoever saves one life, it is as if he has saved all of mankind.”
    (Qur’an 5:32) 💖⭐
  </p>

  <div class="impact-cards">

  <div class="impact-card">
    <i class="fas fa-hand-holding-heart"></i>
    <h3>₨ <?= number_format($totalRaised) ?></h3>
    <p>Funds Raised</p>
  </div>

  <div class="impact-card">
    <i class="fas fa-users"></i>
    <h3><?= $donors ?></h3>
    <p>Active Donors</p>
  </div>

  <div class="impact-card">
    <i class="fas fa-globe"></i>
    <h3><?= $causes ?></h3>
    <p>Causes Supported</p>
  </div>

  <div class="impact-card">
    <i class="fas fa-graduation-cap"></i>
    <h3><?= $students ?></h3>
    <p>Students Sponsored</p>
  </div>

</div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
  <p>
    © 2025 Online Donation Box <br>
    Developed by Munaza Nazir & Rabia Bibi (BSCS - University of Malakand)
  </p>

  <div class="footer-links">
    <a href="#">Privacy Policy</a>
    <a href="#">Terms of Service</a>
  </div>
</footer>

<!-- JavaScript -->
<script src="script.js"></script>

</body>
</html>
