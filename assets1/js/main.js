// calendar

function changeInputType(input) {
    if (input.type === "text") {
        input.type = "date";
        input.focus();
    } else if (input.type === "date" && input.value === "") {
        input.type = "text";
    }
}

//carousels

  //yuglflf


  // function initializeSlider(sliderSelector, enableAutoScroll) {
  //   const slider = document.querySelector(sliderSelector);
  //   const track = slider.querySelector("[data-slider-track]");
  //   const prev = slider.querySelector("[data-slider-prev]");
  //   const next = slider.querySelector("[data-slider-next]");
  //   const slideWidth = slider.querySelector(".each-slide").offsetWidth;
  
  //   if (!slider || !track) return;
  
  //   let autoScrollInterval;
  
  //   function startAutoScroll() {
  //     autoScrollInterval = setInterval(() => {
  //       track.scrollBy({
  //         left: slideWidth,
  //         behavior: "smooth",
  //       });
  
  //       // Check if we have reached the end, then scroll back to the start
  //       if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
  //         track.scrollTo({ left: 0, behavior: "smooth" });
  //       }
  //     }, 3000); // Adjust the auto-scroll interval as needed
  //   }
  
  //   function stopAutoScroll() {
  //     clearInterval(autoScrollInterval);
  //   }
  
  //   startAutoScroll();
  
  //   slider.addEventListener("mouseenter", stopAutoScroll);
  //   slider.addEventListener("mouseleave", startAutoScroll);
  
  //   prev.addEventListener("click", () => {
  //     next.removeAttribute("disabled");
  
  //     track.scrollBy({
  //       left: -slideWidth,
  //       behavior: "smooth",
  //     });
  
  //     // Check if we have reached the beginning, then scroll to the end
  //     if (track.scrollLeft <= 0) {
  //       track.scrollTo({
  //         left: track.scrollWidth,
  //         behavior: "smooth",
  //       });
  //     }
  //   });
  
  //   next.addEventListener("click", () => {
  //     prev.removeAttribute("disabled");
  
  //     track.scrollBy({
  //       left: slideWidth,
  //       behavior: "smooth",
  //     });
  
  //     // Check if we have reached the end, then scroll back to the start
  //     if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
  //       track.scrollTo({ left: 0, behavior: "smooth" });
  //     }
  //   });
  
  //   if (enableAutoScroll) {
  //     startAutoScroll();
  //   }
  // }
  
  // // Call the function for the slider with [data-slider-wander]
  // initializeSlider("[data-slider-wander]", true); // Enable auto-scroll

  // // Call the function for the second slider with [data-slider]
  // initializeSlider("[data-slider]", true); // Disable auto-scroll

  // // Call the function for the slider with [data-slider-2]
  // initializeSlider("[data-slider-2]");



//   function initializeSlider(sliderSelector, enableAutoScroll) {
//     const slider = document.querySelector(sliderSelector);
//     const track = slider.querySelector("[data-slider-track]");
//     const prev = slider.querySelector("[data-slider-prev]");
//     const next = slider.querySelector("[data-slider-next]");
//     const slideWidth = slider.querySelector(".each-slide").offsetWidth;
  
//     if (!slider || !track) return;
  
//     let autoScrollInterval;
  
//     function startAutoScroll() {
//       autoScrollInterval = setInterval(() => {
//         track.scrollBy({
//           left: slideWidth,
//           behavior: "smooth",
//         });
  
//         // Check if we have reached the end
//         if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
//           // Scroll back to the start without smooth behavior
//           track.scrollTo({ left: 0, behavior: "auto" });
//         }
//       }, 2000); // Adjust the auto-scroll interval as needed
//     }
  
//     function stopAutoScroll() {
//       clearInterval(autoScrollInterval);
//     }
  
//     startAutoScroll();
  
//     slider.addEventListener("mouseenter", stopAutoScroll);
//     slider.addEventListener("mouseleave", startAutoScroll);
  
//     prev.addEventListener("click", () => {
//       next.removeAttribute("disabled");
  
//       track.scrollBy({
//         left: -slideWidth,
//         behavior: "smooth",
//       });
  
//       // Check if we have reached the beginning
//       if (track.scrollLeft <= 0) {
//         // Scroll to the end without smooth behavior
//         track.scrollTo({
//           left: track.scrollWidth,
//           behavior: "auto",
//         });
//       }
//     });
  
//     next.addEventListener("click", () => {
//       prev.removeAttribute("disabled");
  
//       track.scrollBy({
//         left: slideWidth,
//         behavior: "smooth",
//       });
  
//       // Check if we have reached the end
//       if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
//         // Scroll back to the start without smooth behavior
//         track.scrollTo({ left: 0, behavior: "auto" });
//       }
//     });
  
//     if (enableAutoScroll) {
//       startAutoScroll();
//     }
// }

// // Call the function for the slider in "Find your wonderland"
// initializeSlider("[data-slider-wander]", true); // Enable auto-scroll


// function initializeSlider(sliderSelector, enableAutoScroll) {
//   const slider = document.querySelector(sliderSelector);
//   const track = slider.querySelector("[data-slider-track]");
//   const prev = slider.querySelector("[data-slider-prev]");
//   const next = slider.querySelector("[data-slider-next]");
//   const slideWidth = slider.querySelector(".each-slide").offsetWidth;

//   if (!slider || !track) return;

//   let autoScrollInterval;

//   function startAutoScroll() {
//     autoScrollInterval = setInterval(() => {
//       track.scrollBy({
//         left: slideWidth,
//         behavior: "smooth",
//       });

//       // Check if we have reached the end, then scroll back to the start
//       if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
//         track.scrollTo({ left: 0, behavior: "smooth" });
//       }
//     }, 3000); // Adjust the auto-scroll interval as needed
//   }

//   function stopAutoScroll() {
//     clearInterval(autoScrollInterval);
//   }

//   slider.addEventListener("mouseenter", stopAutoScroll);
//   slider.addEventListener("mouseleave", startAutoScroll);

//   prev.addEventListener("click", () => {
//     next.removeAttribute("disabled");

//     track.scrollBy({
//       left: -slideWidth,
//       behavior: "smooth",
//     });

//     // Check if we have reached the beginning, then scroll to the end
//     if (track.scrollLeft <= 0) {
//       track.scrollTo({
//         left: track.scrollWidth,
//         behavior: "smooth",
//       });
//     }
//   });

//   next.addEventListener("click", () => {
//     prev.removeAttribute("disabled");

//     track.scrollBy({
//       left: slideWidth,
//       behavior: "smooth",
//     });

//     // Check if we have reached the end, then scroll back to the start
//     if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
//       track.scrollTo({ left: 0, behavior: "smooth" });
//     }
//   });

//   if (enableAutoScroll) {
//     startAutoScroll();
//   }
// }

// // Call the function for the slider in "Find your wonderland"
// initializeSlider("[data-slider-wander]", true); // Enable auto-scroll



function initializeSlider(sliderSelector, enableAutoScroll, slideDuration) {
  const slider = document.querySelector(sliderSelector);
  const track = slider.querySelector("[data-slider-track]");
  const prev = slider.querySelector("[data-slider-prev]");
  const next = slider.querySelector("[data-slider-next]");
  const slideWidth = slider.querySelector(".each-slide").offsetWidth;
  const totalSlides = track.children.length;

  if (!slider || !track) return;

  let autoScrollInterval;

  function startAutoScroll() {
      let currentSlideIndex = 0;

      function scrollToNextSlide() {
          // Calculate the next slide index
          const nextSlideIndex = (currentSlideIndex + 1) % totalSlides;

          // Scroll to the next slide
          track.scrollBy({
              left: slideWidth,
              behavior: "smooth",
          });

          // Check if we have reached the end
          if (nextSlideIndex === 0) {
              // Scroll back to the first slide without smooth behavior
              track.scrollLeft = 0;
          }

          currentSlideIndex = nextSlideIndex;
      }

      autoScrollInterval = setInterval(scrollToNextSlide, slideDuration);
  }

  function stopAutoScroll() {
      clearInterval(autoScrollInterval);
  }

  startAutoScroll();

  slider.addEventListener("mouseenter", stopAutoScroll);
  slider.addEventListener("mouseleave", () => {
      // Restart the auto-scroll immediately when the mouse leaves
      startAutoScroll();

      // Clear the interval one more time to avoid overlap
      clearInterval(autoScrollInterval);
  });

  prev.addEventListener("click", () => {
      next.removeAttribute("disabled");

      track.scrollBy({
          left: -slideWidth,
          behavior: "smooth",
      });

      // Check if we have reached the beginning
      if (track.scrollLeft <= 0) {
          // Scroll to the end without smooth behavior
          track.scrollLeft = track.scrollWidth;
      }
  });

  next.addEventListener("click", () => {
      prev.removeAttribute("disabled");

      track.scrollBy({
          left: slideWidth,
          behavior: "smooth",
      });

      // Check if we have reached the end
      if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
          // Scroll back to the first slide without smooth behavior
          track.scrollLeft = 0;
      }
  });

  if (enableAutoScroll) {
      startAutoScroll();
  }
}

const wanderSlider = initializeSlider("[data-slider-wander]", true, 1000);
const mainSlider = initializeSlider("[data-slider]", true, 1000);
const mainSlider2 = initializeSlider("[data-slider-2]", true, 1000);

wanderSlider.addEventListener("scroll", () => {
    if (wanderSlider.scrollLeft + wanderSlider.clientWidth >= wanderSlider.scrollWidth) {
        mainSlider.scrollLeft = 0;
        mainSlider2.scrollLeft = 0;
    }
});

mainSlider.addEventListener("scroll", () => {
    if (mainSlider.scrollLeft + mainSlider.clientWidth >= mainSlider.scrollWidth) {
        wanderSlider.scrollLeft = 0;
        mainSlider2.scrollLeft = 0;
    }
});

mainSlider2.addEventListener("scroll", () => {
    if (mainSlider2.scrollLeft + mainSlider2.clientWidth >= mainSlider2.scrollWidth) {
        wanderSlider.scrollLeft = 0;
        mainSlider.scrollLeft = 0;
    }
});

//checed radio








// calender







      







  