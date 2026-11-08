<?php
$showSuccess = false;
$ref = null;

/* Old system */
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $showSuccess = true;
    $ref = $_GET['ref'] ?? null;
}

/* Dummy gateway system */
if (isset($_GET['payment']) && $_GET['payment'] == 'success') {
    $showSuccess = true;
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Pakistan Flood Relief | Online Donation Box</title> 
<link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
<style>
  .cause-btn {
  display: block;
  margin: 25px auto 0;
  text-align: center;
}
.break-card:hover {
  box-shadow: 0 0 18px rgba(37, 99, 235, 0.55);
}
.donation-help-list li:hover {
  box-shadow: 0 0 14px rgba(37, 99, 235, 0.45);
  border-radius: 8px;
}
.payment-option:hover {
  box-shadow: 0 0 20px rgba(37, 99, 235, 0.6);
}
</style>
</head> 

<body> 
<!-- ===== NAVBAR ===== --> 
<header class="navbar"> 
  <div class="logo">
    <i class="fas fa-donate"></i> 
  </div>
<div class="logo">Online Donation Box</div> 
<nav class="nav-links"> 
<a href="index.php">Home</a> 
<a href="pakistan-flood.php" class="active">Pakistan Flood</a> 
<a href="palestine-relief.php">Palestine Relief</a> 
<a href="education-fund.php">Education Fund</a> 
<a href="about.php">About</a> 
<a href="contact.php">Contact</a> 
</nav> 
<a href="#donate" class="donate-btn">Donate Now</a> 
</header> 
<!-- ===== HERO / BANNER ===== --> 
<section class="hero cause-hero"> 
<div class="hero-overlay"></div> 
<div class="hero-content"> 
<h1>Pakistan Flood Relief Campaign</h1> 
<p>Together, we can rebuild homes, restore livelihoods, and bring hope to flood-affected families.</p> 
<a href="#donate" class="hero-btn">Support This Cause</a> 
</div> </section> 
<!-- ===== CAUSE DETAILS ===== --> 
 <section class="cause-details"> 
  <!-- ABOUT --> 
<div class="cause-info"> 
<h2>About This Campaign</h2> 
<p> Seasonal floods in Pakistan have displaced thousands of families, destroying homes, crops, and livelihoods. This campaign focuses on providing emergency relief including food, clean water, medical aid, and temporary shelter for affected communities. </p> 
</div> <div class="donation-breakdown"> 
  <h3>Where Your Donation Goes</h3> 
<div class="breakdown-grid"> 
  <div class="break-card">🍞<span>Food & Clean Water</span>
  <strong>40%</strong></div> <div class="break-card">🏠<span>Temporary Shelter</span>
  <strong>30%</strong></div> <div class="break-card">🏥<span>Medical Aid</span>
  <strong>20%</strong></div> <div class="break-card">🚚<span>Logistics</span>
  <strong>10%</strong></div> </div> </div>
 <!-- IMPACT LIST --> <div class="impact-list"> 
<ul class="donation-help-list"> 
<h3>How Your Donation Helps</h3>
 <li><i class="fas fa-utensils"></i> Emergency food packages</li>
<li><i class="fas fa-tint"></i> Clean drinking water</li>
 <li><i class="fas fa-briefcase-medical"></i> Medical assistance</li>
 <li><i class="fas fa-house-damage"></i> Temporary shelters</li> 
</ul> </div> 
<!-- PROGRESS --> 
 <div class="progress-section">
 <h3>Campaign Progress</h3> 
 <div class="progress-bar"> 
<div class="progress" style="width: 0%;" id="progressBar"></div> </div> 
<div class="progress-info"> 
  <p><strong>₨<span id="raisedAmount">0</span> raised</strong> of ₨ 500,000 goal</p> 
  <p>👥 Be the first donor to support this campaign</p> </div>
 </div> 
 <!-- DONATION FORM --> 
  <div class="donate-form" id="donate">
  <h3>Make a Donation</h3>

  <form action="/online-donation-box/frontend/payment/dummy-gateway.php" method="POST">
        <label>Full Name</label> 
  <input type="text"  name="full_name" placeholder="Your full name" required> 
  <label>Email Address</label> 
  <input type="email" name="email" placeholder="example@email.com" required> 
  <label>Donation Amount (₨)</label> 
  <input type="number" name="amount" placeholder="Enter amount" min="100" required> 
  <input type="hidden" name="cause" value="Pakistan Flood">
<input type="hidden" id="campaignCause" value="Pakistan Flood">


  <!-- QUICK AMOUNTS --> 
  <div class="quick-amounts"> 
  <button type="button">₨ 1000</button> 
  <button type="button">₨ 3000</button> 
  <button type="button">₨ 5000</button> 
</div> 
<!-- Payment Methods --> 
 <div class="payment-methods"> <p>Select Payment Method</p> 
  <label class="payment-option"> <input type="radio" name="payment_method" value="JazzCash" required>
    <img src="images/jazzcash.png.png" alt="JazzCash"> JazzCash </label> 
    <label class="payment-option"> <input type="radio" name="payment_method" value="EasyPaisa">
      <img src="images/easypaisa.png.avif" alt="EasyPaisa"> EasyPaisa </label> 
      <label class="payment-option"> <input type="radio" name="payment_method" value="PayPal">
        <img src="images/paypal.png.png" alt="PayPal"> PayPal 
      </label> <label class="payment-option"> 
        <input type="radio" name="payment_method" value="Card">

        <img src="images/visa.png.png" alt="Card"> Visa / MasterCard </label> 
      </div> 
      <button type="submit" class="cause-btn">
  <i class="fas fa-heart"></i> Donate Now
</button>
     </form>
    </section> <!-- ===== FOOTER ===== --> <footer class="footer">
  <p>© 2025 Online Donation Box | Developed by Munaza Nazir & Rabia Bibi (BSCS – University of Malakand)</p>
 </footer>

<div id="successPopup" class="popup" style="display: <?= $showSuccess ? 'flex' : 'none' ?>;">
  <div class="popup-box">
    <h3>🎉 Thank You!</h3>
    <p>Your donation has been submitted successfully.</p>
    <p style="font-size:13px;color:#555;">
      You can view your receipt for full details.
    </p>
    <button onclick="closePopup()">OK</button>
  </div>
</div>
<script src="script.js"></script> 
<script>
function loadProgress() {
  const cause = document.getElementById("campaignCause").value;

  fetch("backend/api/get_progress.php?cause=" + encodeURIComponent(cause))
    .then(res => res.json())
    .then(data => {
      const total = parseInt(data.total) || 0;
      const goal = 500000;

      const percent = Math.min((total / goal) * 100, 100);

      document.getElementById("progressBar").style.width = percent + "%";
      document.getElementById("raisedAmount").innerText = total;
    });
}

document.addEventListener("DOMContentLoaded", loadProgress);

function closePopup() {
  document.getElementById("successPopup").style.display = "none";
  window.history.replaceState({}, document.title, window.location.pathname);
}

</script>

</body> 
</html>