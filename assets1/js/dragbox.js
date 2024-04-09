// const carousel = document.querySelector(".carousel"),
//   firstImg = document.querySelectorAll("img")[0];
// const arrowIcons = document.querySelectorAll(".wrapper i");

// let isDragStart = false,
//   isDragging = false,
//   prevPageX,
//   prevScrollLeft,
//   positionDiff;

// arrowIcons.forEach((icon) => {
//   icon.addEventListener("click", () => {
//     let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
//     // if clicked icon is left, reduce width value from the carousel scroll left else add to it
//     carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
//   });
// });

// const autoSlide = () => {
//   // if there is no image left to scroll then return from here
//   if (carousel.scrollLeft == carousel.scrollWidth - carousel.clientWidth)
//     return;

//   positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
//   let firstImgWidth = firstImg.clientWidth + 14;
//   // getting difference value that needs to add or reduce from carousel left to take middle img center
//   let valDifference = firstImgWidth - positionDiff;

//   if (carousel.scrollLeft > prevScrollLeft) {
//     // return console.log("user is scrolling to the right");
//     // if user is scrolling to the right
//     return (carousel.scrollLeft +=
//       positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff);
//   }
//   //   console.log("user is scrolling to the left");
//   // if user is scrolling to the left
//   carousel.scrollLeft -=
//     positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
// };

// const dragStart = (e) => {
//   // updating global variables value on mouse down event
//   isDragStart = true;
//   prevPageX = e.pageX || e.touches[0].pageX;
//   prevScrollLeft = carousel.scrollLeft;
// };

// const dragging = (e) => {
//   // scrolling images/carousel to left according to mouse pointer
//   if (!isDragStart) return;
//   e.preventDefault();
//   isDragging = true;
//   carousel.classList.add("dragging");
//   positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
//   carousel.scrollLeft = prevScrollLeft - positionDiff;
// };

// const dragStop = () => {
//   isDragStart = false;
//   carousel.classList.remove("dragging");

//   if (!isDragging) return;
//   isDragging = false;
//   autoSlide();
// };

// carousel.addEventListener("mousedown", dragStart);
// carousel.addEventListener("touchstart", dragStart);

// carousel.addEventListener("mousemove", dragging);
// carousel.addEventListener("touchmove", dragging);

// carousel.addEventListener("mouseup", dragStop);
// carousel.addEventListener("mouseleave", dragStop);
// carousel.addEventListener("touchend", dragStop);





//correct codes


// const carousel = document.querySelector(".carousel");
// const firstImg = document.querySelector("img"); // Use querySelector to get the first image
// const arrowIcons = document.querySelectorAll(".wrapper i");

// let isDragStart = false;
// let isDragging = false;
// let startPosition;
// let prevScrollLeft;

// const imgWidth = firstImg.clientWidth + 14;

// arrowIcons.forEach((icon) => {
//   icon.addEventListener("click", () => {
//     carousel.scrollLeft += icon.id === "left" ? -imgWidth : imgWidth;
//   });
// });

// const dragStart = (e) => {
//   isDragStart = true;
//   startPosition = e.pageX || e.touches[0].pageX;
//   prevScrollLeft = carousel.scrollLeft;
// };

// const dragging = (e) => {
//   if (!isDragStart) return;
//   e.preventDefault();
//   isDragging = true;
//   carousel.classList.add("dragging");
//   const currentPosition = e.pageX || e.touches[0].pageX;
//   const dragDistance = startPosition - currentPosition;
//   carousel.scrollLeft = prevScrollLeft + dragDistance;
// };

// const dragStop = () => {
//   isDragStart = false;
//   carousel.classList.remove("dragging");

//   if (!isDragging) return;
//   isDragging = false;
//   const scrollAmount = Math.round(carousel.scrollLeft / imgWidth) * imgWidth;
//   carousel.scrollLeft = scrollAmount;
// };

// carousel.addEventListener("mousedown", dragStart);
// carousel.addEventListener("touchstart", dragStart);

// carousel.addEventListener("mousemove", dragging);
// carousel.addEventListener("touchmove", dragging);

// carousel.addEventListener("mouseup", dragStop);
// carousel.addEventListener("mouseleave", dragStop);
// carousel.addEventListener("touchend", dragStop);



//code with auto scroll


// const carousel = document.querySelector(".carousel");
// const firstImg = document.querySelector("img");
// const arrowIcons = document.querySelectorAll(".wrapper i");
// let isDragStart = false;
// let isDragging = false;
// let startPosition;
// let prevScrollLeft;
// const imgWidth = firstImg.clientWidth + 14;

// let scrollInterval;

// arrowIcons.forEach((icon) => {
//   icon.addEventListener("click", () => {
//     carousel.scrollLeft += icon.id === "left" ? -imgWidth : imgWidth;
//   });
// });

// const dragStart = (e) => {
//   isDragStart = true;
//   startPosition = e.pageX || e.touches[0].pageX;
//   prevScrollLeft = carousel.scrollLeft;
//   clearInterval(scrollInterval); // Pause auto-scroll when dragging starts
// };

// const dragging = (e) => {
//   if (!isDragStart) return;
//   e.preventDefault();
//   isDragging = true;
//   carousel.classList.add("dragging");
//   const currentPosition = e.pageX || e.touches[0].pageX;
//   const dragDistance = startPosition - currentPosition;
//   carousel.scrollLeft = prevScrollLeft + dragDistance;
// };

// const dragStop = () => {
//   isDragStart = false;
//   carousel.classList.remove("dragging");

//   if (!isDragging) return;
//   isDragging = false;
//   const scrollAmount = Math.round(carousel.scrollLeft / imgWidth) * imgWidth;
//   carousel.scrollLeft = scrollAmount;

//   // Resume auto-scroll when dragging stops
//   scrollInterval = setInterval(autoScroll, 900);
// };

// const autoScroll = () => {
//   // Calculate the next scroll position
//   const nextScrollLeft = carousel.scrollLeft + imgWidth;

//   // If it's at the end, go back to the start
//   if (nextScrollLeft >= carousel.scrollWidth - carousel.clientWidth) {
//     carousel.scrollLeft = 0;
//   } else {
//     carousel.scrollLeft = nextScrollLeft;
//   }
// };

// // Start the auto-scrolling timer
// scrollInterval = setInterval(autoScroll, 900);

// carousel.addEventListener("mousedown", dragStart);
// carousel.addEventListener("touchstart", dragStart);

// carousel.addEventListener("mousemove", dragging);
// carousel.addEventListener("touchmove", dragging);

// carousel.addEventListener("mouseup", dragStop);
// carousel.addEventListener("touchend", dragStop);







const carousel = document.querySelector(".carousel");
const scrollWidth = 250; // Set the fixed scroll width to 250px

let scrollInterval;

const autoScroll = () => {
  // Calculate the next scroll position
  const nextScrollLeft = carousel.scrollLeft + scrollWidth;

  // If it's at the end, go back to the start
  if (nextScrollLeft >= carousel.scrollWidth - carousel.clientWidth) {
    carousel.scrollLeft = 0;
  } else {
    carousel.scrollLeft = nextScrollLeft;
  }
};

// Start the auto-scrolling timer
scrollInterval = setInterval(autoScroll, 1000);

carousel.addEventListener("mouseenter", () => {
  // Pause auto-scroll when the mouse enters the carousel
  clearInterval(scrollInterval);
});

carousel.addEventListener("mouseleave", () => {
  // Resume auto-scroll when the mouse leaves the carousel
  scrollInterval = setInterval(autoScroll, 1000);
});
