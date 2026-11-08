<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Online Donation Box</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* ===== General Page Style ===== */
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background-color: #f5f8ff;
      color: #333;
    }

    header {
      background-color: #003399;
      color: white;
      padding: 15px 10%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 1.5rem;
      margin: 0;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 500;
      transition: 0.3s;
    }

    nav a:hover {
      color: #ffcc00;
    }

    /* ===== Hero Section ===== */
 .hero {
  position: relative;
  height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  overflow: hidden;
}

/* Background Image */
.hero {
  background:
    linear-gradient(
      rgba(0, 51, 153, 0.35),
      rgba(0, 51, 153, 0.35)
    ),
    url('images/contact.jpg.jpg') center/cover no-repeat;

  color: white;
  text-align: center;
  padding: 120px 10%;
}
    .hero p {
      font-size: 1.1rem;
       max-width: 700px;
      margin: 0 auto;
    }

    /* ===== Contact Section ===== */
    .contact-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 40px;
      padding: 80px 10%;
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      margin-top: -50px;
    }

    /* Contact Info */
    .contact-info {
      flex: 1;
      min-width: 280px;
    }

    .contact-info h3 {
      color: #003399;
      margin-bottom: 20px;
    }

    .info-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .info-item i {
      font-size: 1.3rem;
      color: #003399;
      margin-right: 15px;
      background: #eaf0ff;
      padding: 12px;
      border-radius: 50%;
    }

    .info-item p {
      margin: 0;
      color: #555;
      font-size: 1rem;
    }

    /* Contact Form */
    .contact-form {
      flex: 1;
      min-width: 300px;
    }

    .contact-form h3 {
      color: #003399;
      margin-bottom: 20px;
    }

    .contact-form form {
      display: flex;
      flex-direction: column;
    }

    .contact-form input,
    .contact-form textarea {
      margin-bottom: 15px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      outline: none;
      transition: 0.3s;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #003399;
      box-shadow: 0 0 5px rgba(0, 51, 153, 0.3);
    }

    .contact-form button {
      background-color: #003399;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
    }

    .contact-form button:hover {
      background-color: #002080;
    }

    /* ===== Map Section ===== */
    .map {
      margin: 80px 10%;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .map iframe {
      width: 100%;
      height: 350px;
      border: 0;
    }

    /* ===== Footer ===== */
    footer {
      background-color: #003399;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
      .contact-section {
        flex-direction: column;
        text-align: center;
      }

      .info-item {
        justify-content: center;
      }

      .contact-form form {
        width: 100%;
      }

      .hero h2 {
        font-size: 2.2rem;
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
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  text-align: center;
}

  </style>
</head>
<body>

  <!-- ===== Header ===== -->
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
    <a href="about.php">About</a>
    <a href="contact.php" class="active">Contact</a>
  </nav>

  <a href="index.php" class="donate-btn">Donate Now</a>
</header>

  <!-- ===== Hero Section ===== -->
  <section class="hero">
    <h2 >Contact Us</h2>
    <p>Have a question or want to support a cause? We’d love to hear from you. Get in touch with our team anytime.</p>
  </section>



  <!-- ===== Contact Info + Form ===== -->
  <section class="contact-section">
    <!-- Contact Info -->
    <div class="contact-info">
      <h3>Get In Touch</h3>

      <div class="info-item">
        <i class="fa-solid fa-location-dot"></i>
        <p>University of Malakand, Khyber Pakhtunkhwa, Pakistan</p>
      </div>

      <div class="info-item">
        <i class="fa-solid fa-envelope"></i>
        <p>support@onlinedonationbox.com</p>
      </div>

      <div class="info-item">
        <i class="fa-solid fa-phone"></i>
        <p>+92 300 1234567</p>
      </div>

      <div class="info-item">
        <i class="fa-brands fa-facebook-f"></i>
        <p>/OnlineDonationBox</p>
      </div>

      <div class="info-item">
        <i class="fa-brands fa-instagram"></i>
        <p>@onlinedonationbox</p>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
      <h3>Send a Message</h3>
      <form id="contactForm" action="backend/contact/save_message.php" method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <textarea rows="5" name="message" placeholder="Write your message here..." required></textarea>
        <button type="submit">Send Message</button>
      </form>
    </div>
  </section>

  <!-- ===== Map Section ===== -->
  <section class="map">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13234.374853299873!2d71.8637886!3d34.7029638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38debd2e123456!2sUniversity%20of%20Malakand!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s" 
      allowfullscreen=""
      loading="lazy">
    </iframe>
  </section>

  <!-- ===== Footer ===== -->
  <footer>
    <p>© 2025 Online Donation Box | Designed by Munaza Nazir And Rabia Bibi (BSCS - University of Malakand)</p>
  </footer>
<!-- ===== Live Chat Simulation Box ===== -->
<div class="chatbot-container" id="chatbot">
  <div class="chat-header">
    <h4>💬 Live Support</h4>
    <button id="closeChat"><i class="fa-solid fa-xmark"></i></button>
  </div>
  <div class="chat-body" id="chatBody">
    <div class="bot-msg">Hello 👋! How can we assist you today?</div>
  </div>
  <div class="chat-input">
    <input type="text" id="userInput" placeholder="Type your message..." />
    <button id="sendBtn"><i class="fa-solid fa-paper-plane"></i></button>
  </div>
</div>

<!-- Floating Chat Button -->
<div class="chat-toggle" id="chatToggle">
  <i class="fa-solid fa-comments"></i>
</div>

<script>
  // ===== Chat Toggle =====
  const chatToggle = document.getElementById("chatToggle");
  const chatbot = document.getElementById("chatbot");
  const closeChat = document.getElementById("closeChat");

  chatToggle.addEventListener("click", () => {
    chatbot.style.display = "flex";
    chatToggle.style.display = "none";
  });

  closeChat.addEventListener("click", () => {
    chatbot.style.display = "none";
    chatToggle.style.display = "flex";
  });

  // ===== Chat Message Simulation =====
  const sendBtn = document.getElementById("sendBtn");
  const userInput = document.getElementById("userInput");
  const chatBody = document.getElementById("chatBody");

  sendBtn.addEventListener("click", sendMessage);
  userInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") sendMessage();
  });

  function sendMessage() {
    const message = userInput.value.trim();
    if (message === "") return;

    // User Message
    const userMsg = document.createElement("div");
    userMsg.className = "user-msg";
    userMsg.textContent = message;
    chatBody.appendChild(userMsg);

    userInput.value = "";

    // Simulate Bot Response
    setTimeout(() => {
      const botMsg = document.createElement("div");
      botMsg.className = "bot-msg";
      botMsg.textContent = "Thank you for contacting us! Our team will reply soon 💙";
      chatBody.appendChild(botMsg);
      chatBody.scrollTop = chatBody.scrollHeight;
    }, 1000);

    chatBody.scrollTop = chatBody.scrollHeight;
  }
</script>

<style>
  /* ===== Chat Toggle Button ===== */
  .chat-toggle {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background-color: #003399;
    color: white;
    font-size: 1.6rem;
    border-radius: 50%;
    padding: 18px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    z-index: 999;
  }

  .chat-toggle:hover {
    background-color: #002080;
    transform: scale(1.1);
  }

  /* ===== Chat Box ===== */
  .chatbot-container {
    position: fixed;
    bottom: 90px;
    right: 25px;
    width: 320px;
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 1000;
  }

  .chat-header {
    background-color: #003399;
    color: white;
    padding: 12px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .chat-header h4 {
    margin: 0;
    font-size: 1rem;
  }

  .chat-header button {
    background: none;
    border: none;
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
  }

  .chat-body {
    background-color: #f5f8ff;
    padding: 10px;
    height: 250px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .bot-msg {
    align-self: flex-start;
    background: #eaf0ff;
    color: #003399;
    padding: 8px 12px;
    border-radius: 10px 10px 10px 0;
    max-width: 80%;
    font-size: 0.9rem;
  }

  .user-msg {
    align-self: flex-end;
    background: #003399;
    color: white;
    padding: 8px 12px;
    border-radius: 10px 10px 0 10px;
    max-width: 80%;
    font-size: 0.9rem;
  }

  .chat-input {
    display: flex;
    border-top: 1px solid #ddd;
    padding: 8px;
    background-color: white;
  }

  .chat-input input {
    flex: 1;
    padding: 8px;
    border: none;
    outline: none;
    font-size: 0.9rem;
  }

  .chat-input button {
    background-color: #003399;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
  }

  .chat-input button:hover {
    background-color: #002080;
  }
</style>
<div id="contactPopup" class="popup" style="display:none;">
  <div class="popup-box">
    <h3>✅ Message Sent</h3>
    <p>Thank you for contacting us. We will reply soon.</p>
    <button onclick="closeContactPopup()">OK</button>
  </div>
</div>
<script src="script.js"></script>
</body>
</html>