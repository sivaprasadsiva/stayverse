      //blink

      function initializeSlider(sliderSelector) {
        const slider = document.querySelector(sliderSelector);
        const track = slider.querySelector("[data-slider-track]");
        const slides = slider.querySelectorAll(".carousel-slide");
        const prev = slider.querySelector("[data-slider-prev]");
        const next = slider.querySelector("[data-slider-next]");
        let currentSlideIndex = 0;
      
        if (!slider || !track || slides.length === 0 || !prev || !next) {
          console.error("Slider elements not found. Check your HTML structure.");
          return;
        }
      
        function showSlide(index) {
          slides.forEach((slide, i) => {
            if (i === index) {
              slide.style.display = "block";
            } else {
              slide.style.display = "none";
            }
          });
        }
      
        function nextSlide() {
          currentSlideIndex = (currentSlideIndex + 1) % slides.length;
          showSlide(currentSlideIndex);
        }
      
        function prevSlide() {
          currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
          showSlide(currentSlideIndex);
        }
      
        next.addEventListener("click", () => {
          nextSlide();
        });
      
        prev.addEventListener("click", () => {
          prevSlide();
        });
      
        // Initial slide
        showSlide(currentSlideIndex);
      
        function autoAdvance() {
          setInterval(() => {
            nextSlide();
          }, 3000); // Switch to the next slide every 2 seconds
        }
      
        // Start auto-advance after 2 seconds
        setTimeout(autoAdvance, 2000);
      }
      
      // Call the function for the slider with [data-slider-carousel]
      initializeSlider("[data-slider-carousel]");

      // Call the function for the slider with [data-slider-service]
      initializeSlider("[data-slider-service]");