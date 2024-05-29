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
