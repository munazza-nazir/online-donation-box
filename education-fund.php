<?php
$ref = $_GET['ref'] ?? '';
require_once "backend/config/db.php";

/* 🎓 EDUCATION FUND ONLY */

/* Total approved amount */
$q1 = mysqli_query($conn, "
  SELECT SUM(amount) AS total 
  FROM donations 
  WHERE status='approved' AND cause='Education Fund'
");
$totalRaised = mysqli_fetch_assoc($q1)['total'] ?? 0;

/* Total donors */
$q2 = mysqli_query($conn, "
  SELECT COUNT(DISTINCT email) AS donors 
  FROM donations 
  WHERE status='approved' AND cause='Education Fund'
");
$donors = mysqli_fetch_assoc($q2)['donors'] ?? 0;

/* Calculated impact (logical mapping) */
$books = floor($totalRaised / 500);        // 1 book = 500
$devices = floor($totalRaised / 15000);    // 1 laptop = 15k
$scholarships = floor($totalRaised / 3000);// 1 scholarship = 3k
$schools = max(1, floor($totalRaised / 100000)); // symbolic
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Education Fund | Online Donation Box</title>

<!-- Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 <link rel="stylesheet" href="style.css">
<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}
body{
  font-family:'Poppins',sans-serif;
  background:#f6f8ff;
  color:#1f2937;
  line-height:1.7;
}

/* ===== NAVBAR ===== */

/* ===== HERO ===== */
.hero{
  height:92vh;
  position:relative;
  display:flex;
  align-items:center;
  justify-content:center;
  overflow:hidden;
}
.hero::before{
  content:"";
  position:absolute;
  inset:0;
  background:url('images/education1.png.png') center/cover no-repeat;
  animation:zoomHero 18s ease-in-out infinite alternate;
  z-index:-2;
}
.hero::after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(120deg,rgba(29,78,216,0.75),rgba(34,197,94,0.55));
  z-index:-1;
}
@keyframes zoomHero{
  from{transform:scale(1);}
  to{transform:scale(1.12);}
}
.hero-content{
  background:rgba(255,255,255,0.08);
  backdrop-filter:blur(6px);
  padding:40px;
  border-radius:24px;
  color:#fff;
  text-align:center;
  max-width:780px;
  animation:slideHero 1.6s ease forwards;
}
@keyframes slideHero{
  from{opacity:0;transform:translateX(-80px);}
  to{opacity:1;transform:translateX(0);}
}
.hero-content h1{
  font-size:48px;
  margin-bottom:15px;
}
.hero-content p{
  font-size:18px;
  margin-bottom:30px;
}
.hero-buttons a{
  margin:0 10px;
  padding:14px 32px;
  border-radius:40px;
  font-weight:600;
  text-decoration:none;
}
.btn-primary{
  background:#22c55e;
  color:#fff;
}
.btn-secondary{
  border:2px solid #fff;
  color:#fff;
}

/* ===== SECTION ===== */
section{
  padding:80px 10%;
}
.section-title{
  text-align:center;
  font-size:36px;
  color:#1d4ed8;
  margin-bottom:15px;
}
.section-sub{
  text-align:center;
  max-width:720px;
  margin:auto;
  color:#475569;
}

/* ===== IMPACT ===== */
.impact-box {
  background: #fff;
  padding: 35px 25px;
  border-radius: 18px;
  text-align: center;
  position: relative;
  cursor: pointer;

  box-shadow: 0 10px 25px rgba(0,0,0,0.12);
  transition: all 0.35s ease;

  opacity: 0;
  transform: translateY(40px);
}

.impact-box.show {
  opacity: 1;
  transform: translateY(0);
}

/* Icon */
.impact-box i {
  font-size: 42px;
  color: #1d4ed8;
  margin-bottom: 12px;
  transition: 0.3s;
}

/* Numbers */
.impact-box h3 {
  font-size: 34px;
  color: #16a34a;
  margin: 10px 0;
}

/* Hover effect */
.impact-box:hover {
  transform: translateY(-12px) scale(1.04);
  box-shadow: 0 0 35px rgba(29,78,216,0.6);
}

/* Icon glow on hover */


/* ===== FEATURES ===== */
.features{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
  gap:30px;
  margin-top:50px;
}
.feature-card{
  background:#fff;
  padding:35px;
  border-radius:18px;
  box-shadow:0 12px 30px rgba(0,0,0,0.1);
  text-align:center;
}
.feature-card i{
  font-size:36px;
  color:#22c55e;
  margin-bottom:12px;
}
.center-card {
  grid-column: 1 / -1;
  max-width: 320px;
  margin: 0 auto;
}
.center-card {
  grid-column: 1 / -1;
  max-width: 320px;
  margin: 20px auto;
  position: relative;
  border: 2px solid #22c55e;
  box-shadow: 0 0 25px rgba(34,197,94,0.45);
  animation: glowPulse 2.5s infinite alternate;
}

@keyframes glowPulse {
  from {
    box-shadow: 0 0 15px rgba(34,197,94,0.35);
  }
  to {
    box-shadow: 0 0 35px rgba(34,197,94,0.75);
  }
}

/* Scroll animation */
.feature-card {
  opacity: 0;
  transform: translateY(40px);
  transition: all 0.7s ease;
}

.feature-card.show {
  opacity: 1;
  transform: translateY(0);
}
/* ===== DONATION ===== */
.donate-box{
  background:#fff;
  max-width:650px;
  margin:auto;
  padding:45px;
  border-radius:24px;
  box-shadow:0 20px 45px rgba(0,0,0,0.12);
}
.donate-box h3{
  text-align:center;
  color:#1d4ed8;
  margin-bottom:25px;
}
.donate-box input{
  width:100%;
  padding:12px;
  margin-bottom:15px;
  border-radius:10px;
  border:1px solid #cbd5f5;
}
.donate-box button{
  width:100%;
  background:linear-gradient(135deg,#22c55e,#16a34a);
  border:none;
  padding:14px;
  font-size:18px;
  color:#fff;
  border-radius:40px;
  cursor:pointer;
}
.cause-btn {
  display: block;
  margin: 25px auto 0;  /* auto = center horizontally */
  text-align: center;
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
/* ===== PAYMENTS ===== */
.payments{
  display:flex;
  justify-content:center;
  gap:25px;
  margin-top:30px;
  flex-wrap:wrap;
}
.payment-card{
  background:#fff;
  padding:18px;
  width:130px;
  border-radius:14px;
  box-shadow:0 8px 20px rgba(0,0,0,0.1);
  text-align:center;
}
.payment-card img{
  width:60px;
  height:60px;
  object-fit:contain;
}
.popup {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  display: none;
  justify-content: center;
  align-items: center;
}

.popup-box {
  background: #fff;
  padding: 40px;
  border-radius: 16px;
  text-align: center;
}

/* ===== FOOTER ===== */
footer{
  background:#0f172a;
  color:#cbd5f5;
  padding:35px;
  text-align:center;
  margin-top:80px;
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
  .navbar{flex-direction:column;}
  .hero-content h1{font-size:34px;}
}
.payment-option:hover {
  box-shadow: 0 0 20px rgba(37, 99, 235, 0.6);
}

.impact-grid{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

</style>
</head>

<body>
<div id="successPopup" class="popup" style="display:none;">
  <div class="popup-box">
    <h2>Thank you ❤️</h2>
    <p>Your donation was successful.</p>
     <?php if($ref){ ?>
      <p style="margin-top:10px;font-size:16px;">
        Reference ID: <strong><?= $ref ?></strong>
      </p>
      <p style="font-size:12px;color:#666;">
Please save this Reference ID for future communication.
</p>
    <?php } ?>

    <button onclick="closePopup()">OK</button>
  </div>
</div>
 <!-- ===== Navbar ===== -->
  <header class="navbar"> 
  <div class="logo">
    <i class="fas fa-donate"></i> 
  </div>
<div class="logo">Online Donation Box</div> 
<nav class="nav-links"> 
<a href="index.php">Home</a> 
<a href="pakistan-flood.php" >Pakistan Flood</a> 
<a href="palestine-relief.php">Palestine Relief</a> 
<a href="education-fund.php" class="active">Education Fund</a> 
<a href="about.php">About</a> 
<a href="contact.php">Contact</a> 
</nav> 
<a href="#donate" class="donate-btn">Donate Now</a> 
</header> 

<section class="hero">
  <div class="hero-content">
    <h1>Education for Every Child</h1>
    <p>Support books, digital learning, and scholarships for underprivileged students.</p>
    <div class="hero-buttons">
      <a href="#donate" class="btn-primary">Donate Now</a>
      <a href="#impact" class="btn-secondary">See Impact</a>
    </div>
  </div>
</section>

<section id="impact">
  <h2 class="section-title">Your Impact</h2>
  <p class="section-sub">Every donation transforms lives through education.</p>
  <div class="impact-grid">

  <div class="impact-box">
    <i class="fa-solid fa-book"></i>
    <h3><?= $books ?></h3>
    <p>Books Provided</p>
  </div>

  <div class="impact-box">
    <i class="fa-solid fa-laptop"></i>
    <h3><?= $devices ?></h3>
    <p>Devices Donated</p>
  </div>

  <div class="impact-box">
    <i class="fa-solid fa-user-graduate"></i>
    <h3><?= $scholarships ?></h3>
    <p>Scholarships Awarded</p>
  </div>

  <div class="impact-box">
    <i class="fa-solid fa-school"></i>
    <h3><?= $schools ?></h3>
    <p>Schools Supported</p>
  </div>

</div>
</section>

<section>
  <h2 class="section-title">How We Help</h2>
  <div class="features">
    <div class="feature-card"><i class="fa-solid fa-book-open"></i><h4>Learning Kits</h4><p>Books & stationery</p></div>
    <div class="feature-card"><i class="fa-solid fa-laptop"></i><h4>Digital Learning</h4><p>E-learning devices</p></div>
    <div class="feature-card"><i class="fa-solid fa-graduation-cap"></i><h4>Scholarships</h4><p>Support bright students</p></div>
    <div class="feature-card center-card">
      <i class="fa-solid fa-school"></i>
      <h4>Classrooms</h4>
      <p>Build & equip schools</p>
    </div>
  </div>
</section>
<section id="donate">
<!-- STEP 5: DONATION PROGRESS BAR -->
      <div class="progress-section">
      <h3>Campaign Progress</h3>
      <div class="progress-bar">
        <div class="progress" style="width: 0%;" id="progressBar"></div>
      </div>
      <p>
<strong>₨ <span id="raisedAmount">0</span> raised</strong>
of ₨ <span id="goalAmount">0</span> goal
</p>
      </div>

<!-- DONATION FORM --> 
  <div class="donate-form">
  <h3>Make a Donation</h3>

 <form action="frontend/payment/dummy-gateway.php" method="POST">
        <label>Full Name</label> 
  <input type="text" name="full_name"  placeholder="Your full name" required> 
  <label>Email Address</label> 
  <input type="email" name="email" placeholder="example@email.com" required> 
  <label>Donation Amount (₨)</label> 
  <input type="number" name="amount" placeholder="Enter amount" min="100" required> 
  <input type="hidden" name="cause" value="Education Fund">
<input type="hidden" id="campaignCause" value="Education Fund">


  <!-- QUICK AMOUNTS --> 
  <div class="quick-amounts"> 
  <button type="button">₨ 1000</button> 
  <button type="button">₨ 3000</button> 
  <button type="button">₨ 5000</button> 
</div> 
<!-- Payment Methods --> 
 <div class="payment-methods"> <p>Select Payment Method</p> 
  <label class="payment-option"> <input type="radio"  name="payment_method" value="JazzCash" required>
    <img src="images/jazzcash.png.png" alt="JazzCash"> JazzCash </label> 
    <label class="payment-option"> <input type="radio"  name="payment_method" value="EasyPaisa">
      <img src="images/easypaisa.png.avif" alt="EasyPaisa"> EasyPaisa </label> 
      <label class="payment-option"> <input type="radio"  name="payment_method" value="PayPal">
        <img src="images/paypal.png.png" alt="PayPal"> PayPal 
      </label> <label class="payment-option"> 
        <input type="radio" name="payment_method" value="Card">

        <img src="images/visa.png.png" alt="Card"> Visa / MasterCard </label> 
      </div> 
      <button type="submit" class="cause-btn">
  <i class="fas fa-heart"></i> Donate Now
</button>
     </form>
   </section>

<footer>
  <p>© 2025 Online Donation Box | Developed by Munaza Nazir & Rabia Bibi</p>
</footer>
<script>
document.addEventListener("DOMContentLoaded", () => {

  /* SCROLL REVEAL */
  const boxes = document.querySelectorAll(".impact-box");

  const revealOnScroll = () => {
    boxes.forEach(box => {
      const top = box.getBoundingClientRect().top;
      if (top < window.innerHeight - 100) {
        box.classList.add("show");
      }
    });
  };

  window.addEventListener("scroll", revealOnScroll);
  revealOnScroll();

});
</script>
<script>


const cards = document.querySelectorAll('.feature-card');

const revealCards = () => {
  cards.forEach(card => {
    const cardTop = card.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (cardTop < windowHeight - 100) {
      card.classList.add('show');
    }
  });
};

window.addEventListener('scroll', revealCards);
revealCards();


</script>

<script src="script.js"></script>
<script>
function closePopup() {
  document.getElementById("successPopup").style.display = "none";
  // remove ?success from URL
  window.history.replaceState({}, document.title, "education-fund.php");
}
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  if (window.location.search.includes("success")) {
    document.getElementById("successPopup").style.display = "flex";

    // clean URL after showing popup
    const url = new URL(window.location);
    url.searchParams.delete("success");
    window.history.replaceState({}, document.title, url);
  }
});
</script>

<script>
function loadProgress() {
  const cause = document.getElementById("campaignCause").value;

 fetch("backend/api/get_progress.php?cause=" + encodeURIComponent("Education Fund"))
    .then(res => res.json())
    .then(data => {
  document.getElementById("progressBar").style.width = data.percent + "%";
  document.getElementById("raisedAmount").innerText = data.total;
  document.getElementById("goalAmount").innerText = data.goal;
});
}

document.addEventListener("DOMContentLoaded", loadProgress);
</script>

</body>
</html>
