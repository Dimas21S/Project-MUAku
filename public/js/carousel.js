document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#myCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
          interval: 5000,
          wrap: true
        });
      });

      const messages = [
          "Apa makeup favoritmu hari ini?",
          "Temukan MUA terbaik di sekitarmu!",
          "Siap tampil maksimal hari ini?",
          "Makeup bagus, mood pun ikut baik!",
          "Jangan lupa skin care sebelum makeup!"
        ];
        
        const welcomeElement = document.getElementById('welcome-message');
        let currentIndex = 0;
        
        function rotateMessage() {
          welcomeElement.style.opacity = 0;
          setTimeout(() => 
            {
            currentIndex = (currentIndex + 1) % messages.length;
            welcomeElement.textContent = messages[currentIndex];
            welcomeElement.style.opacity = 1;
          }, 500);
        }
        
        // Change message every 5 seconds
        setInterval(rotateMessage, 5000);