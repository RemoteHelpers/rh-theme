const sidebarContent = document.querySelector(".content-with-sidebar");

onload = () => {
  componentSlider();

}

  // Hide/Show Filter on click
  if(sidebarContent){
    const btn = sidebarContent.querySelector(".hide-btn");
    const sidebar = sidebarContent.querySelector(".sidebar");
    const cards = sidebarContent.querySelector(".products");
  
    btn.addEventListener("click", hideSidebar, false);
  
    function hideSidebar() {
      gsap.to(cards, { duration: 0.2, opacity: 0, onComplete: gsapComplete });
  
      function gsapComplete() {
        btn.classList.toggle("hidden");
        sidebarContent.classList.toggle("fullSize");
        sidebar.classList.toggle("closed");
  
        setTimeout(() => {
          gsap.to(cards, { duration: 0.2, opacity: 1 });
        }, 200);
      }
    }
  }


//REMOVE "#" FROM URL, - SCROLL TO SECTION ID
jQuery(document).ready(function($) { 
var links = document.getElementsByTagName("a");
Array.prototype.forEach.call(links, function(elem, index) {
  var elemAttr = elem.getAttribute("href");
  if(elemAttr && elemAttr.includes("#")) {
    elem.addEventListener("click", function(ev) {
      ev.preventDefault();
      document.getElementById(elemAttr.replace(/#/g, "")).scrollIntoView({
          behavior: "smooth",
          block: "start",
          inline: "nearest"
          });
    });
  }
});
});

// Image SubCategory Slider
function componentSlider() {
    jQuery(".component__slider").slick({
      lazyLoad: 'ondemand',
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: true,
      prevArrow:"<button type='button' class='slick-prev-cat pull-left'></button>",
      nextArrow:"<button type='button' class='slick-next-cat pull-right'></button>",
      fade: true,
      cssEase: "linear",
      autoplay: false,
      autoplaySpeed: 3000,
    });
//Employees SubCategory Slider
//     jQuery(".component_cards_slider .employees").slick({
//       lazyLoad: 'ondemand',
//       slidesToShow: 5,
//       slidesToScroll: 5,
//       dots: true,
//       arrows: true,
//       prevArrow:"<button type='button' class='slick-prev-card pull-left'></button>",
//       nextArrow:"<button type='button' class='slick-next-card pull-right'></button>",
//       autoplay: false,
//       infinite: true,
//       draggable: true,
//       speed: 1000,
//       autoplay: true,
//       autoplaySpeed: 10000,
//       cssEase: 'linear',
//       responsive: [
//           {
//           breakpoint: 1800,
//           settings: {
//             slidesToShow: 4,
//             slidesToScroll: 4,
//           },
//         },
//         {
//           breakpoint: 1444,
//           settings: {
//             slidesToShow: 3,
//             slidesToScroll: 3,
//           },
//         },
//         {
//           breakpoint: 1068,
//           settings: {
//             slidesToShow: 2,
//             slidesToScroll: 2,
//           },
//         },
//           {
//           breakpoint: 760,
//           settings: {
//             slidesToShow: 1,
//             slidesToScroll: 1,
//             speed: 300,
//             arrows: false,
//           },
//         },
//       ],
// });
jQuery(".component_cards_slider .employees").slick({
  lazyLoad: 'ondemand',
  slidesToShow: 4,
  slidesToScroll: 4,
  dots: true,
  arrows: true,
  prevArrow:"<button type='button' class='slick-prev-card pull-left'></button>",
  nextArrow:"<button type='button' class='slick-next-card pull-right'></button>",
  autoplay: false,
  infinite: true,
  draggable: true,
  speed: 1000,
  autoplay: true,
  autoplaySpeed: 10000,
  cssEase: 'linear',
  responsive: [
    {
      breakpoint: 1940,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 1440,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 1290,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
      {
      breakpoint: 760,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 300,
        arrows: false,
      },
    },
  ],
});
    jQuery('.component_cards_slider .employees')
    .on('setPosition', function(event, slick) {
      fixSlickStyle(event, slick);
    })
    .on('afterChange', function(event, slick, currentSlide){
      fixSlickStyle(event, slick);
    });
//Special Offer Slider If enabled at header
    jQuery(".spacial_offer").slick({
      lazyLoad: 'ondemand',
      slidesToShow: 1,
      slidesToScroll: 1,
      cssEase: 'ease-out',
      arrows: true,
      infinite: true,
      prevArrow:"<button type='button' class='slick-prev-card pull-left'></button>",
      nextArrow:"<button type='button' class='slick-next-card pull-right'></button>",
      speed: 500,
      autoplay: false,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 860,
          settings: {
            arrows: false,
            speed: 300,
          },
        },
      ],
});
function fixSlickStyle(event, slick) {
  if (slick.slideCount <= slick.options.slidesToShow) {
    slick.$slideTrack.css('transform','');
  }
}
};