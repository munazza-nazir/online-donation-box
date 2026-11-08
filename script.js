// ==============================
// Animated Counter (Impact Section)
// ==============================
document.addEventListener("DOMContentLoaded", () => {

  const counters = document.querySelectorAll('[data-target]');
  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute('data-target');
      const count = +counter.innerText;
      const increment = target / 200;

      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(updateCount, 10);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  });

  // ==============================
  // Scroll Animation for Impact Cards
  // ==============================
  const boxes = document.querySelectorAll(".impact-box");

  const revealOnScroll = () => {
    boxes.forEach(box => {
      const boxTop = box.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;

      if (boxTop < windowHeight - 80) {
        box.classList.add("show");
      }
    });
  };

  window.addEventListener("scroll", revealOnScroll);
  revealOnScroll(); // 🔑 show on page load
});

// Donation Popup (SAFE FOR ALL PAGES)
function showPopup() {
  const popup = document.getElementById("successPopup");
  if (popup) {
    popup.style.display = "flex";
  }
}

function closePopup() {
  const popup = document.getElementById("successPopup");
  if (popup) {
    popup.style.display = "none";
  }
}

// AJAX submit ONLY if form exists AND page uses AJAX
const donationForm = document.getElementById("donationForm");

if (donationForm && donationForm.dataset.ajax === "true") {
  donationForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch(this.action, {
      method: "POST",
      body: formData
    })
      .then(res => res.text())
      .then(data => {
        if (data.trim() === "success") {
          showPopup();
          this.reset();
          if (typeof loadProgress === "function") loadProgress();
        } else {
          alert("Donation failed. Try again.");
        }
      })
      .catch(() => {
        alert("Server error. Try again.");
      });
  });
}
document.querySelectorAll('.quick-amounts button').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelector('input[name="amount"]').value = btn.textContent.replace('₨ ', '');
  });
});
function loadProgress() {
  const causeInput = document.getElementById("campaignCause");
  const bar = document.getElementById("progressBar");
  const counter = document.querySelector(".counter");

  // 🔒 Stop if this page has no progress section
  if (!causeInput || !bar || !counter) return;

  const cause = causeInput.value;

  fetch("api/get_progress.php?cause=" + encodeURIComponent(cause))
    .then(res => res.json())
    .then(data => {
      const total = parseInt(data.total) || 0;
      const goal = 500000;

      const percent = Math.min((total / goal) * 100, 100);

      bar.style.width = percent + "%";
      counter.innerText = total;
      counter.setAttribute("data-target", total);
    });
}

document.addEventListener("DOMContentLoaded", loadProgress);

const contactForm = document.getElementById("contactForm");

if (contactForm) {
  contactForm.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch(contactForm.action, {
      method: "POST",
      body: new FormData(contactForm)
    })
    .then(res => res.text())
    .then(data => {
      if (data.trim() === "success") {
        document.getElementById("contactPopup").style.display = "flex";
        contactForm.reset();
      } else {
        alert("Message failed. Please try again.");
      }
    });
  });
}

function closeContactPopup() {
  document.getElementById("contactPopup").style.display = "none";
}
