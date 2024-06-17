function toggleDropdown() {
  var dropdownMenu = document.getElementById("dropdownMenu");
  if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
  } else {
      dropdownMenu.style.display = "block";
  }
}

window.onclick = function(event) {
  if (!event.target.matches('.profile-link')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.style.display === "block") {
              openDropdown.style.display = "none";
          }
      }
  }
}


// document.addEventListener('DOMContentLoaded', function() {
//     var signinBtn = document.querySelector('.button-signIn');
//     var loginForm = document.getElementById('login-form');
//     var qrCodeSection = document.querySelector('.qr-code');

//     signinBtn.addEventListener('click', function(e) {
//         e.preventDefault(); // Untuk mencegah tindakan default dari tautan

//         loginForm.style.display = 'block';
//         qrCodeSection.style.display = 'none';
//     });
// });




document.addEventListener('DOMContentLoaded', function() {
  const classCards = document.querySelectorAll('.class-card');
  const modal = document.getElementById('class-detail-modal');
  const modalContent = modal.querySelector('.modal-body');
  const closeBtn = modal.querySelector('.close-btn');

  const classDetails = {
      strength: {
          title: "Strength Training",
          description: "Build muscle strength and endurance with our expert trainers. Our strength training program is designed to help you achieve your fitness goals through a variety of weight lifting and resistance exercises."
      },
      yoga: {
          title: "Body Yoga",
          description: "Relax and strengthen your body with our yoga sessions. Our yoga classes cater to all levels and help improve flexibility, reduce stress, and promote overall well-being."
      },
      bodybuilding: {
          title: "Body Building",
          description: "Achieve your bodybuilding goals with customized plans. Our bodybuilding program includes tailored workout routines and nutrition plans to help you build muscle mass and strength."
      },
      weightloss: {
          title: "Weight Loss",
          description: "Effective weight loss programs to get you in shape. Our weight loss classes include cardio workouts, strength training, and dietary advice to help you shed pounds and maintain a healthy lifestyle."
      }
  };

  classCards.forEach(card => {
      card.addEventListener('click', function() {
          const classType = card.getAttribute('data-class');
          const detail = classDetails[classType];
          modalContent.innerHTML = `<h2>${detail.title}</h2><p>${detail.description}</p>`;
          modal.style.display = "block";
      });
  });

  closeBtn.addEventListener('click', function() {
      modal.style.display = "none";
  });

  window.addEventListener('click', function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  });
});

document.getElementById('toggleDuration').addEventListener('click', function() {
  var monthlyCards = document.querySelector('.plan-cards.monthly');
  var annualCards = document.querySelector('.plan-cards.annual');

  if (this.textContent === 'Monthly') {
      this.textContent = 'Annual';
      monthlyCards.style.display = 'none';
      annualCards.style.display = 'flex';
  } else {
      this.textContent = 'Monthly';
      monthlyCards.style.display = 'flex';
      annualCards.style.display = 'none';
  }
});


let currentIndex = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.testimonial-card');
  if (index >= slides.length) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = slides.length - 1;
  } else {
    currentIndex = index;
  }

  slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === currentIndex);
  });
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

document.querySelector('.carousel-control.next').addEventListener('click', nextSlide);
document.querySelector('.carousel-control.prev').addEventListener('click', prevSlide);

// Show the first slide initially
showSlide(currentIndex);
