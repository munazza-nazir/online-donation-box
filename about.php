<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us | Online Donation Box</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>

/* ===== HERO ===== */
.about-hero {
  height: 100vh;
  width: 100%;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: #fff;
  overflow: hidden;
}

/* Moving background */
.about-hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background: url("images/about us.jpg.png") center/cover no-repeat;
  animation: heroMove 20s ease-in-out infinite alternate;
  z-index: -2;
}

/* Overlay */
.about-hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    120deg,
    rgba(29,78,216,0.75),
    rgba(34,197,94,0.65)
  );
  z-index: -1;
}

/* Movement animation */
@keyframes heroMove {
  from {
    transform: scale(1) translateX(0);
  }
  to {
    transform: scale(1.15) translateX(-30px);
  }
}

.about-hero h1 {
  font-size: 3.2rem;
  margin-bottom: 15px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.about-hero p {
  font-size: 1.25rem;
  max-width: 750px;
  margin: auto;
}


/* ===== COMMON SECTION ===== */
.section {
  padding: 80px 10%;
  text-align: center;
}

.section h2 {
  color: #1d4ed8 ;
  font-size: 2.2rem;
  margin-bottom: 20px;
}

.section p {
  color: black;
  font-size: 1.1rem;
  line-height: 1.8;
  max-width: 850px;
  margin: auto;
}

/* ===== MISSION & VISION ===== */
.two-col {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 40px;
  margin-top: 50px;
}

.card {
  background: #fff;
  padding: 35px;
  border-radius: 15px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  transition: .4s ease;
}

.card:hover {
  transform: translateY(-10px);
}

/* ===== TEAM ===== */
.team-grid {
  display: flex;
  justify-content: center;
  gap: 40px;
  flex-wrap: wrap;
  margin-top: 40px;
}

.team-card {
  width: 260px;
  background: #fff;
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  transition: .4s;
}

.team-card:hover {
  transform: translateY(-12px);
}

.team-card img {
  width: 110px;
  height: 110px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 15px;
}

.team-card h4 {
  color: #1d4ed8 ;
}

/* ===== VALUES ===== */
.values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
  gap: 30px;
  margin-top: 40px;
}

.value-box {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.1);
  transition: .3s;
}

.value-box:hover {
  transform: scale(1.05);
}

.value-box i {
  font-size: 2.2rem;
  color: #1d4ed8 ;
  margin-bottom: 15px;
}

/* ===== ACKNOWLEDGMENT ===== */
.acknowledgment {
  background: linear-gradient(135deg, #1d4ed8 , #22c55e );
  color: white;
}

.ack-box {
  background: rgba(255,255,255,0.12);
  padding: 50px;
  border-radius: 20px;
  max-width: 850px;
  margin: auto;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.ack-box h2 {
  color: #ffcc00;
}

.ack-line {
  width: 100px;
  height: 3px;
  background: #ffcc00;
  margin: 25px auto;
}
.card:hover,
.team-card:hover,
.value-box:hover {
  box-shadow: 0 15px 35px rgba(29,78,216,0.25);
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
  .about-hero h1 { font-size: 2.2rem; }
}

/* ===== Scroll Reveal Animation ===== */
.reveal {
  opacity: 0;
  transform: translateY(40px);
  transition: all 0.8s ease;
}

.reveal.show {
  opacity: 1;
  transform: translateY(0);
}
</style>
</head>

<body>

<!-- ===== NAVBAR (same as others) ===== -->
<!-- ===== NAVBAR ===== -->
<header class="navbar">
  <div class="logo">
    <i class="fas fa-donate"></i>
  </div>

  <div class="logo">Online Donation Box</div>

  <nav class="nav-links">
    <a href="index.php">Home</a>
    <a href="pakistan-flood.php">Pakistan Flood</a>
    <a href="palestine-relief.php">Palestine Relief</a>
    <a href="education-fund.php">Education Fund</a>
    <a href="about.php" class="active">About</a>
    <a href="contact.php" >Contact</a>
  </nav>

  <a href="index.php" class="donate-btn">Donate Now</a>
</header>
<!-- ===== HERO ===== -->
<section class="about-hero">
  <div>
    <h1>Who We Are</h1>
    <p>Building trust, transparency, and hope through technology-driven donations.</p>
  </div>
</section>

<!-- ===== ABOUT ===== -->
<section class="section">
  <h2>About Online Donation Box</h2>
  <p>
    Online Donation Box is a transparent and secure platform designed to connect donors
    with people in need. From disaster relief to education support, we ensure every donation
    creates real impact.
  </p>

  <div class="two-col">
    <div class="card">
      <h3>Our Mission</h3>
      <p>
        To provide a reliable digital platform where generosity meets accountability,
        enabling communities to rebuild lives through meaningful support.
      </p>
    </div>

    <div class="card">
      <h3>Our Vision</h3>
      <p>
        A world where helping others is simple, transparent, and accessible to everyone.
      </p>
    </div>
  </div>
</section>

<!-- ===== TEAM ===== -->
<section class="section" style="background:#f9f9f9;">
  <h2>Meet Our Team</h2>

  <div class="team-grid">
    <div class="team-card">
      <img src="images/team1.jpg.png">
      <h4>Munaza Nazir</h4>
    </div>

    <div class="team-card">
      <img src="images/team2.jpg.jpg">
      <h4>Rabia Bibi</h4>
    </div>
  </div>
</section>



<!-- ===== VALUES ===== -->
<section class="section">
  <h2>Our Core Values</h2>

  <div class="values-grid">
    <div class="value-box">
      <i class="fas fa-heart"></i>
      <h4>Compassion</h4>
      <p>Empathy drives everything we do.</p>
    </div>

    <div class="value-box">
      <i class="fas fa-shield-alt"></i>
      <h4>Transparency</h4>
      <p>Every donation is accountable.</p>
    </div>

    <div class="value-box">
      <i class="fas fa-users"></i>
      <h4>Teamwork</h4>
      <p>Collective effort brings change.</p>
    </div>

    <div class="value-box">
      <i class="fas fa-lightbulb"></i>
      <h4>Innovation</h4>
      <p>Technology for social good.</p>
    </div>
  </div>
</section>
<section class="mission reveal">
<section class="vision reveal">
<section class="team reveal">
<section class="values reveal">
<section class="acknowledgment reveal">

<!-- ===== ACKNOWLEDGMENT ===== -->
<section class="section acknowledgment">
  <div class="ack-box">
    <h2>With Heartfelt Gratitude</h2>
    <p>
      We sincerely thank our respected supervisor <strong>Sir Hafeez Ur Rahman</strong>
      for his guidance and continuous support throughout the development of
      our Final Year Project <em>“Online Donation Box.”</em>
    </p>
    <div class="ack-line"></div>
    <p>Supervised by <strong>Sir Hafeez Ur Rahman</strong></p>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
  <p>© 2025 Online Donation Box | Developed by Munaza Nazir & Rabia Bibi</p>
</footer>
<script>
// Scroll Reveal Animation
const reveals = document.querySelectorAll(".reveal");

const revealOnScroll = () => {
  reveals.forEach(el => {
    const top = el.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (top < windowHeight - 100) {
      el.classList.add("show");
    }
  });
};

window.addEventListener("scroll", revealOnScroll);
revealOnScroll(); // show visible sections on load
</script>
</body>
</html>


