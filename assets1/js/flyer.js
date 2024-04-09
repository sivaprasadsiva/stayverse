// Wait for the document to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
  // Get all flyer elements
  const flyers = document.querySelectorAll(".flyer");

  // Function to hide all flyer elements
  const hideAllFlyers = () => {
    flyers.forEach(flyer => {
      flyer.style.display = "none";
    });
  };

  // Function to show the flyer at a specific index
  const showFlyer = (index) => {
    hideAllFlyers();
    flyers[index].style.display = "block";
  };

  // Function to rotate through flyers
  const rotateFlyers = () => {
    let currentIndex = 0;
    const numFlyers = flyers.length;

    setInterval(() => {
      showFlyer(currentIndex);

      currentIndex = (currentIndex + 1) % numFlyers;
    }, 3000); // 3 seconds
  };

  // Start the rotation
  rotateFlyers();
});
  // Wait for the document to be fully loaded
  document.addEventListener("DOMContentLoaded", function () {
    // Get all flyer elements
    const flyers = document.querySelectorAll(".flyer");

    // Function to hide all flyers except the first one
    const hideAllFlyersExceptFirst = () => {
      for (let i = 1; i < flyers.length; i++) {
        flyers[i].style.display = "none";
      }
    };

    // Function to show the flyer at a specific index
    const showFlyer = (index) => {
      hideAllFlyersExceptFirst();
      flyers[index].style.display = "flex";
    };

    // Function to rotate through flyers
    const rotateFlyers = () => {
      let currentIndex = 0;
      const numFlyers = flyers.length;

      setInterval(() => {
        showFlyer(currentIndex);

        currentIndex = (currentIndex + 1) % numFlyers;
      }, 3000); // 3 seconds
    };

    // Show the first flyer and start the rotation
    showFlyer(0);
    rotateFlyers();
  });




  // festive
  var container = document.getElementById('container')
var slider = document.getElementById('slider');
var slides = document.getElementsByClassName('slide').length;
var buttons = document.getElementsByClassName('btn');


var currentPosition = 0;
var currentMargin = 0;
var slidesPerPage = 0;
var slidesCount = slides - slidesPerPage;
var containerWidth = container.offsetWidth;
var prevKeyActive = false;
var nextKeyActive = true;

window.addEventListener("resize", checkWidth);

function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
}

function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else {
        if (w < 901) {
            slidesPerPage = 3;
        } else {
            if (w < 1101) {
                slidesPerPage = 5;
            } else {
                slidesPerPage = 7;
            }
        }
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    };
    currentMargin = - currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
    if (currentPosition >= slidesCount) {
        buttons[1].classList.add('inactive');
    }
}

setParams();

function slideRight() {
    if (currentPosition != 0) {
        slider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
        currentMargin += (100 / slidesPerPage);
        currentPosition--;
    };
    if (currentPosition === 0) {
        buttons[0].classList.add('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
};

function slideLeft() {
    if (currentPosition != slidesCount) {
        slider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
        currentMargin -= (100 / slidesPerPage);
        currentPosition++;
    };
    if (currentPosition == slidesCount) {
        buttons[1].classList.add('inactive');
    }
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
};






// slideshow thumnail

