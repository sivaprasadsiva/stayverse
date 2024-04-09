// const nextButton = document.getElementById("next");
// const prevButton = document.getElementById("previous");
// const imageContainer = document.querySelector(".carousel-images");

// let imageIndex = 0;
// const imageWidth = 400; // Width of each image

// nextButton.addEventListener("click", () => {
//     if (imageIndex < 2) { // Total number of images minus 1
//         imageIndex++;
//         updateCarousel();
//     }
// });

// prevButton.addEventListener("click", () => {
//     if (imageIndex > 0) {
//         imageIndex--;
//         updateCarousel();
//     }
// });

// function updateCarousel() {
//     const translateX = -imageIndex * imageWidth;
//     imageContainer.style.transform = `translateX(${translateX}px)`;
// }


const nextButton = document.getElementById("next");
const prevButton = document.getElementById("previous");
const imageContainer = document.querySelector(".carousel-images");
const imageContainers = document.querySelectorAll(".image-container");

let imageIndex = 0;

nextButton.addEventListener("click", () => {
    if (imageIndex < imageContainers.length - 1) {
        imageIndex++;
        updateCarousel();
    }
});

prevButton.addEventListener("click", () => {
    if (imageIndex > 0) {
        imageIndex--;
        updateCarousel();
    }
});

function updateCarousel() {
    const translateX = -imageIndex * 100 + "%";
    imageContainer.style.transform = `translateX(${translateX})`;
}


