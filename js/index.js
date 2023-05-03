const isAdmin = document.querySelector("#wpadminbar");
const body = document.body;
const homePage = document.querySelector(".home-page");

// Launch functions on page reload
onload = () => {
  if (homePage) {
    testimonialsScroller();
    canvasBackground();
  }
};

//Animated color circles on background
function canvasBackground() {
  const canvas = document.querySelector("canvas");
  const ctx = canvas.getContext("2d");
  const options = acf.get("circleQuantity");
  let w = (canvas.width = 640);
  let h = (canvas.height = 480);
  const circles = [];
  const colors = options.circle_colors.split(",");
  const circleNum = options.circle_number;
  const minSpeed = options.min_speed;
  const maxSpeed = options.max_speed;
  const minRadius = options.min_radius;
  const maxRadius = options.max_radius;

  function calculateSize() {
    w = canvas.width = parseInt(getComputedStyle(canvas).width);
    h = canvas.height = parseInt(getComputedStyle(canvas).height);
  }

  onresize = calculateSize;

  class Circle {
    constructor(x, y, vx, vy, diameter, color) {
      this.x = x;
      this.y = y;
      this.vx = vx;
      this.vy = vy;
      this.diameter = diameter;
      this.color = color;
    }

    drawSelf() {
      ctx.beginPath();
      ctx.fillStyle = this.color;
      ctx.strokeStyle = this.color;
      ctx.arc(this.x, this.y, this.diameter, 0, 2 * Math.PI);
      ctx.stroke();
      ctx.fill();
    }

    moveSelf() {
      if (this.x > w + this.diameter || this.x < this.diameter * -1) {
        this.vx *= -1;
      }
      if (this.y > h + this.diameter || this.y < this.diameter * -1) {
        this.vy *= -1;
      }
      this.x += this.vx;
      this.y += this.vy;
    }
  }

  function createCircles(quantity) {
    let counter = quantity;

    while (counter > 0) {
      const randomX = Math.floor(Math.random() * w);
      const randomY = Math.floor(Math.random() * h);
      const randomVX = Math.random() * maxSpeed - minSpeed;
      const randomVY = Math.random() * maxSpeed - minSpeed;
      const randomRadius = Math.random() * maxRadius + minRadius;
      const randomColor = Math.floor(Math.random() * colors.length);
      circles.push(
        new Circle(
          randomX,
          randomY,
          randomVX,
          randomVY,
          randomRadius,
          colors[randomColor]
        )
      );
      counter--;
    }
  }

  calculateSize();

  createCircles(circleNum);

  circles.forEach((c) => {
    c.drawSelf();
  });

  setInterval(() => {
    ctx.clearRect(0, 0, w, h);
    circles.forEach((c) => {
      c.moveSelf();
      c.drawSelf();
    });
  }, 50);

  console.log(`circle number: ${options.circle_number}`);
  console.log(`circle colors: ${options.circle_colors}`);
  console.log(`circle speed: ${options.min_speed} - ${options.max_speed}`);
  console.log(`circle radius: ${options.min_radius} - ${options.max_radius}`);
}

/* TESTIMONIALS SCROLLER (Hiden for now on front-page) */
function testimonialsScroller() {
  jQuery(".testimonials-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    draggable: true,
    infinite: true,
    swipeToSlide: true,
    adaptiveHeight: true,
  });
}

//FadeIn effect Animation ON SCROLL
jQuery(document).ready(function() {
  
  function onEntry(entry) {
  entry.forEach(change => {
      if (change.isIntersecting) {
      change.target.classList.add('element-show');
      }
  });
  }

  let options = {
  threshold: [0.5] };
  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.element-hidden');

  for (let elm of elements) {
  observer.observe(elm);
  }
})

jQuery(document).ready(function() {
  const observer = lozad();
    observer.observe();
    jQuery(document).ajaxSuccess(function(){
      observer.observe();
  });
});

//Scroll To Top button
let mybutton = document.getElementById("myBtn");
let isMobile = navigator.userAgent.toLowerCase().match(/mobile/i);

if (isMobile) { mybutton.style.cssText += 'opacity: 0;display: none!important;'; }

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.cssText += 'display: block;opacity: 0.9;animation: fadeInFromNone 1s ease-in-out;';
  } else {
    mybutton.style.cssText += 'opacity: 0;display: none;';
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

window.onscroll = function(ev) {
  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    mybutton.style.cssText += 'opacity: 0;display: none;';
  } else {
    scrollFunction();
  }
};