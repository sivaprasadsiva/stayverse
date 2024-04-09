// function initializeSlider(sliderSelector, enableAutoScroll) {
//     const slider = document.querySelector(sliderSelector);
//     const track = slider.querySelector("[data-slider-track]");
//     const prev = slider.querySelector("[data-slider-prev]");
//     const next = slider.querySelector("[data-slider-next]");
//     const slideWidth = slider.querySelector(".each-slide").offsetWidth;

//     if (!slider || !track) return;

//     let autoScrollInterval;

//     function startAutoScroll() {
//         let currentSlideIndex = 0;

//         function scrollToNextSlide() {
//             // Calculate the next slide index
//             const nextSlideIndex = (currentSlideIndex + 1) % track.children.length;

//             // Scroll to the next slide
//             track.scrollBy({
//                 left: slideWidth,
//                 behavior: "smooth",
//             });

//             // Check if we have reached the end
//             if (nextSlideIndex === 0) {
//                 // Scroll back to the first slide without smooth behavior
//                 track.scrollTo({ left: 0, behavior: "auto" });

//                 // Reset currentSlideIndex to 0 for the next round
//                 currentSlideIndex = 0;
//             } else {
//                 currentSlideIndex = nextSlideIndex;
//             }
//         }

//         // Scroll to the next slide immediately when starting
//         scrollToNextSlide();

//         autoScrollInterval = setInterval(scrollToNextSlide, 3000); // Each slide stays for 3 seconds, adjust the interval as needed
//     }

//     function stopAutoScroll() {
//         clearInterval(autoScrollInterval);
//     }

//     startAutoScroll();

//     slider.addEventListener("mouseenter", stopAutoScroll);
//     slider.addEventListener("mouseleave", startAutoScroll);

//     prev.addEventListener("click", () => {
//         next.removeAttribute("disabled");

//         track.scrollBy({
//             left: -slideWidth,
//             behavior: "smooth",
//         });

//         // Check if we have reached the beginning
//         if (track.scrollLeft <= 0) {
//             // Scroll to the end without smooth behavior
//             track.scrollTo({
//                 left: track.scrollWidth,
//                 behavior: "auto",
//             });
//         }
//     });

//     next.addEventListener("click", () => {
//         prev.removeAttribute("disabled");

//         track.scrollBy({
//             left: slideWidth,
//             behavior: "smooth",
//         });

//         // Check if we have reached the end
//         if (track.scrollLeft + track.clientWidth >= track.scrollWidth) {
//             // Scroll back to the first slide without smooth behavior
//             track.scrollTo({ left: 0, behavior: "auto" });
//         }
//     });

//     if (enableAutoScroll) {
//         startAutoScroll();
//     }
// }

// initializeSlider("[data-slider]", true); // Enable auto-scroll
// initializeSlider("[data-slider-2]", true); // Enable auto-scroll
