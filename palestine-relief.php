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
  <title>Palestine Relief - Online Donation Box</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* --- Page-Specific Styling (Optional override from style.css) --- */
    .hero-palestine {
  position: relative;
  height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: #fff;
  overflow: hidden;
}

.hero-palestine::before {
  content: "";
  position: absolute;
  inset: 0;
  background: url('images/palestine1.png.jpg') center/cover no-repeat;
  animation: heroZoom 18s ease-in-out infinite alternate;
  z-index: -2;
}

.hero-palestine::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(rgba(150,0,0,0.55), rgba(0,0,0,0.55));
  z-index: -1;
}
.hero-palestine h1 { font-size: 3rem;
   font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 15px; }
    .hero-palestine p {
    font-size: 1.2rem;
     max-width: 700px;
    margin: 0 auto;
    line-height: 1.6; }


    .cause-details {
      padding: 60px 10%;
      background: #fff;
      text-align: center;
    }

    .cause-details h2 {
      color: #b60000;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .cause-info p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #444;
      margin-bottom: 40px;
    }

    .progress-section {
      background: #fff3f3;
      padding: 30px;
      border-radius: 10px;
      margin-bottom: 40px;
    }

    .progress-bar {
      width: 100%;
      height: 15px;
      background: #ddd;
      border-radius: 10px;
      overflow: hidden;
    }

    .progress {
      width: 0%;
      height: 100%;
      background: #b60000;
      border-radius: 10px;
    }

    .donate-form {
      background: #fafafa;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto;
    }

    .donate-form h3 {
      color: #b60000;
      margin-bottom: 25px;
    }

    .donate-form label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      color: #333;
      font-weight: 600;
    }

    .donate-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    .cause-btn {
      background: #b60000;
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1.1rem;
      transition: 0.3s;
    }

    .cause-btn:hover {
      background: #8a0000;
    }

    .footer {
      background: #111;
      color: #ccc;
      text-align: center;
      padding: 20px 10px;
      font-size: 0.9rem;
    }
    /* ===== Payment Options Section ===== */
.payment-options {
  padding: 60px 10%;
  background: #fff8f8;
  text-align: center;
  border-radius: 12px;
  margin: 50px auto;
}

.payment-options h3 {
  color: #b60000;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

.payment-options p {
  color: #555;
  margin-bottom: 30px;
  font-size: 1rem;
}

.payment-icons {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 25px;
}

.payment-card {
  background: #fff;
  border-radius: 10px;
  padding: 20px;
  width: 140px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: 0.3s ease;
}

.payment-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

.payment-card img {
  width: 60px;
  height: 60px;
  object-fit: contain;
  margin-bottom: 10px;
}
@media (min-width: 768px) {
  .impact-grid {
    grid-template-columns: repeat(3, 1fr);
  }

  .impact-box.center-glow {
    grid-column: 2;   /* middle column */
    justify-self: center;
  }
}
.popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.popup-box {
  background: white;
  padding: 30px;
  border-radius: 10px;
  text-align: center;
}

.impact-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 25px;
  margin-top: 30px;
}

@media (min-width: 768px) {
  .impact-grid {
    grid-template-columns: repeat(3, 1fr);
  }

  .impact-box.center-glow {
    grid-column: 2;
    grid-row: 2;
    justify-self: center;
  }
}
.impact-box {
  background: #fff;
  padding: 25px 20px;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 6px 15px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  cursor: pointer;
  position: relative;
}

.impact-box i {
  font-size: 2.5rem;
  color: #b60000;
  margin-bottom: 10px;
  transition: 0.3s;
}

/* Hover Effect */
.impact-box:hover {
  transform: translateY(-10px) scale(1.03);
  box-shadow: 0 0 25px rgba(182,0,0,0.5);
}



/* Special glow for center card */
.center-glow {
  box-shadow: 0 0 30px rgba(182,0,0,0.6);
  animation: pulseGlow 2s infinite alternate;
}

@keyframes pulseGlow {
  from {
    box-shadow: 0 0 20px rgba(182,0,0,0.4);
  }
  to {
    box-shadow: 0 0 40px rgba(182,0,0,0.8);
  }
}
.payment-option:hover {
  box-shadow: 0 0 20px rgba(37, 99, 235, 0.6);
}
  </style>
</head>

<body>

  <!-- ===== Navbar ===== -->
  <header class="navbar">
     <div class="logo">
    <i class="fas fa-donate"></i> 
  </div>
    <div class="logo">Online Donation Box</div>
    <nav class="nav-links">
      <a href="index.php">Home</a>
      <a href="pakistan-flood.php">Pakistan Flood</a>
      <a href="palestine-relief.php" class="active">Palestine Relief</a>
      <a href="education-fund.php">Education Fund</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </nav>
    <a href="#donate" class="donate-btn">Donate Now</a>
  </header>
 <!-- ===== HERO SECTION ===== -->
  <section class="hero hero-palestine">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1>Palestine Relief Campaign</h1>
    <p>Delivering food, medical aid, and hope to families affected by crisis.</p>
  </div>
</section>

  <!-- ===== About This Cause ===== -->
  <section class="cause-details">
    <div class="cause-info">
      <h2>About This Cause</h2>
      <p>
        The ongoing crisis in Palestine has left countless families without food, shelter, and medical care.
        Our Palestine Relief campaign aims to provide emergency aid, medical support, and education for children in affected areas.
        Every donation, no matter how small, helps rebuild lives and restore hope.
      </p>
    </div>
   
    <div class="donation-impact">
  <h3>How Your Donation Helps</h3>

  <div class="impact-grid">
    <div class="impact-box">
      <i class="fas fa-bread-slice"></i>
      <p>Emergency Food</p>
    </div>
  
     <div class="impact-box">
      <i class="fas fa-hand-holding-water"></i>
      <p>Clean Water</p>
    </div>

    <div class="impact-box">
      <i class="fas fa-briefcase-medical"></i>
      <p>Medical Aid</p>
    </div>
    
   <div class="impact-box reveal center-glow">
  <i class="fas fa-hand-holding-water"></i>
  <p>Temporary Shelter</p>
      </div>

  </div>
</div>
  </div>
   

    <!-- Donation Progress -->
    <div class="progress-section">
      <h3>Campaign Progress</h3>
      <div class="progress-bar">
        <div class="progress" style="width: 0%;" id="progressBar"></div>
      </div>
      <p>
  <strong>₨ <span id="raisedAmount"> 0 </span> raised</strong>
  of ₨ 800,000 goal
</p>
    </div>

    <!-- Donate Form -->
    <div class="donate-form" id="donate">
  <h3>Make a Donation</h3>

<form action="/online-donation-box/frontend/payment/dummy-gateway.php" method="POST">
        <label>Full Name</label> 
  <input type="text" name="full_name" placeholder="Your full name" required> 
  <label>Email Address</label> 
  <input type="email" name="email" placeholder="example@email.com" required> 
  <label>Donation Amount (₨)</label> 
  <input type="number" name="amount" placeholder="Enter amount" min="100"  required> 
  <input type="hidden" name="cause" value="Palestine Relief">
<input type="hidden" id="campaignCause" value="Palestine Relief">


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
    

  <p class="secure-note">🔒 100% Secure & Encrypted Payments</p>
</section>
<section class="trust-section">
  <div class="trust-box">
    <i class="fas fa-shield-alt"></i>
    <p>Secure Donations</p>
  </div>
  <div class="trust-box">
    <i class="fas fa-eye"></i>
    <p>Transparent Usage</p>
  </div>
  <div class="trust-box">
    <i class="fas fa-hands-helping"></i>
    <p>Verified Campaign</p>
  </div>
</section>
  </section>

  <!-- ===== Footer ===== -->
  <footer class="footer">
    <p>© 2025 Online Donation Box | Developed by Munaza Nazir AND Rabia Bibi (BSCS - University of Malakand)</p>
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
function closePopup() {
  document.getElementById("successPopup").style.display = "none";
  window.history.replaceState({}, document.title, "palestine-relief.php");
}
</script>

<script>
function loadProgress() {
  const cause = document.getElementById("campaignCause").value;

  fetch("backend/api/get_progress.php?cause=" + encodeURIComponent(cause))
    .then(res => res.json())
    .then(data => {
      const total = parseInt(data.total) || 0;
      const goal = 800000;

      const percent = Math.min((total / goal) * 100, 100);

      document.getElementById("progressBar").style.width = percent + "%";
      document.getElementById("raisedAmount").innerText = total;
    });
}

document.addEventListener("DOMContentLoaded", loadProgress);
</script>

</body>
</html>