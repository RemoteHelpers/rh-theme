// Toggle skillset onClick
jQuery( ".accordion-title" ).click(function() {
  jQuery( ".employee-skills, .accordion-title" ).toggleClass('active');
  jQuery(window).off('scroll');
});

// Close skillset after scroll
jQuery(window).on("scroll", function() {
  var height = jQuery(window).scrollTop();
  if(height > 700){
      jQuery('.accordion-title').removeClass('active');
      jQuery('.employee-skills').removeClass('active');
  } else {
      jQuery('.accordion-title').addClass('active');
      jQuery('.employee-skills').addClass('active');
  }
});

// Mobile height with browser bottom bar
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

// Add speciffic class to embed video
jQuery(".wp-block-embed__wrapper iframe").addClass("frame-video");

// Open video in popup
jQuery(".open_popup").click(function () {
  jQuery('.frame-video').attr( 'src', function ( i, val ) { return val; });
  jQuery(".popup_body").addClass("popup_body_show").fadeIn( "slow" );
  jQuery("body").addClass("body_no_scroll"); 
});

// Stop playing iframe video on bootom scroll
jQuery('.swiper-slide-active, .cover_all').scroll(function() {
  jQuery('.frame-video').each(function() {
    const scrollpos = this.getBoundingClientRect();
    if(scrollpos.top < -500){
      jQuery(this).attr( 'src', function ( i, val ) { return val; });
    };
    if(scrollpos.y > 800){
      jQuery(this).attr( 'src', function ( i, val ) { return val; });
    }
  });
});
// Stop playing iframe video on top scroll
jQuery('.swiper-slide-active, .cover_all #modal-ready').scroll(function() {
  jQuery('.frame-video').each(function() {
    const scrollpos = this.getBoundingClientRect();
    if(scrollpos.top < -300){
      jQuery(this).attr( 'src', function ( i, val ) { return val; });
    };
    if(scrollpos.y > 600){
      jQuery(this).attr( 'src', function ( i, val ) { return val; });
    }
  });
});

//Close Portfolio Cross
jQuery(".close_portfolio").click(function () {
setTimeout(function() {
  jQuery(".popup_body").removeClass("popup_body_show");
  jQuery("body").removeClass("body_no_scroll");
}, 500);
  jQuery('.frame-video').attr( 'src', function ( i, val ) { return val; });
});

//Filter porfolio Categories
jQuery(function() {
  jQuery(".select_tag_case").click(function() {
      jQuery('.select_tag_case').removeClass('active_portfolio_filret');
    jQuery(this).addClass("active_portfolio_filret");
});
});

//Create classed for porfolio slider thumbnails
jQuery( ".some1" ).html(jQuery( ".portfolio_items" ).html());
jQuery( ".some1 > .popup_main" ).addClass( "swiper-slide" );
jQuery( ".some1 > .popup_main" ).addClass( "thumb_sl" );
jQuery( ".some1 > .swiper-slide" ).removeClass( "popup_main" );
jQuery( ".some1 > .swiper-slide" ).removeClass( "filter" );
jQuery( ".some1 > .swiper-slide > .open_popup" ).removeClass( "open_popup" );
jQuery( ".some1 > .swiper-slide > .play-video" ).removeClass( "play-video" );
jQuery( ".some1 > .popup_body" ).remove();
jQuery( ".some1 > #seeMore" ).remove();
jQuery( ".some1 > .swiper-slide > h2" ).addClass( "thumb_portfolio_title" );

//Slider Inside Porfolio
if (jQuery(".mySwiper5")[0]){
jQuery(".mySwiper5 .swiper-slide").click(function () {  
  swiper2.update();
  var indexslidenew = jQuery(this).index();
  var loopindexslide = indexslidenew;
  swiper2.slideTo(loopindexslide);
});

var swiper5 = new Swiper(".mySwiper5", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  centeredSlides: true,
  slideToClickedSlide: true,
  touchRatio: 0.5,
    loopedSlides: 2,
  navigation: {
    nextEl: ".swiper-button-next5",
    prevEl: ".swiper-button-prev5",
  },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      960: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
});

//Slider Similar Portfolio inside Porfolio
var swiper2 = new Swiper(".mySwiper2", {
  speed: 500,
  effect: "coverflow",
  coverflowEffect: {
  stretch: -50 
  },
  loopedSlides: 2,
  autoHeight: true,
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    960: {
      allowTouchMove: true,
    },
  },
});

//Reset Embed video if exist on slide change
swiper2.on('slideChange', function() {
  jQuery('iframe').each(function() {
    jQuery(this).attr('src', jQuery(this).attr('src'));
  });
  });
} else {

}

//FILTER PORTFOLIO
jQuery(document).ready(function(){
if(jQuery(".filter").length > 6){
  jQuery("#seeMore").css( "display", "block" );
 }  
jQuery(".filter").slice(0,6).show();

jQuery("#seeMore").click(function(e){
  e.preventDefault();
  jQuery(".filter:hidden").slice(0,6).fadeIn("slow");
  if(jQuery(".filter:hidden").length == 0){
     jQuery("#seeMore").fadeOut("slow");
    }
});

jQuery(".filter-button").click(function(){
    var value = jQuery(this).attr('data-filter');
    if(value == "All")
    {
      if(jQuery(".filter").length > 6){
        jQuery("#seeMore").css( "display", "block" );
        jQuery(".filter").slice(0,6).show();
       } else {
        jQuery(".filter").slice(0,6).show();
       }
    }
    else
    {
        jQuery("#seeMore").css( "display", "none" );
        jQuery(".filter").not('.'+value).hide();
        jQuery('.filter').filter('.'+value).show();

    }
      if (jQuery(".filter-button").removeClass("active")) {
          jQuery(this).removeClass("active");
      }
          jQuery(this).addClass("active");
      });

});

// ACTIVE SLIDE BY PORFOLIO COVER CLICK
jQuery(".popup_main").click(function () {
swiper2.update();
var indexslide = jQuery(this).index();
// IF NO LOOP SLIDER
// swiper2.slideTo(indexslide);

// IF LOOP SLIDER
var loopindexslide = indexslide + 2;
swiper2.slideTo(loopindexslide);
});    

jQuery(document).on('keyup', function(e) {
if (e.key === "Escape") {
  setTimeout(function() {
    jQuery(".popup_body").removeClass("popup_body_show");
    jQuery("body").removeClass("body_no_scroll");
  }, 500);
    jQuery('.frame-video').attr( 'src', function ( i, val ) { return val; });
}
});

jQuery(document).ready(function(){
jQuery("#commentform").removeAttr('novalidate');
});

//IF RATING STAR EMPTY  
function emptystar(){
jQuery( ".rate_employee" ).text("Please! Rate employee");
jQuery( ".rate_employee" ).css("color", "red");
  setTimeout(function() { 
    jQuery( ".rate_employee" ).text("Rate employee");
    jQuery( ".rate_employee" ).css("color", "grey");
  }, 1500);
};

//Employee description More/Less on Ecmployee single page
jQuery(function ($) {
$(document).ready(function(){
  //length in characters
  const maxLength = 641;
  const ellipsestext = "...";
  const moretext = "Show more";
  const lesstext = "Show less";
  $(".about-text").each(function(){

    const myStr = $(this).text();

    if($.trim(myStr).length > maxLength){
      const newStr = myStr.substring(0, maxLength);

      const removedStr = myStr.substr(maxLength, $.trim(myStr).length);

      const Newhtml = newStr + '<span class="moreellipses">' + ellipsestext + '</span><span class="morecontent"><span class="removed-str">' + removedStr + '</span><a href="javascript:void(0)" class="read-more">' + moretext + '</a></span>';
      
      $(this).html(Newhtml);

    }
  });

  $(".read-more").click(function(){
    if($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
      $('.removed-str').removeClass("open-text");
    }
    else {
      $(this).addClass("less");
      $(this).html(lesstext);
      $('.removed-str').addClass("open-text");
    }

    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
  });
});
});

//Employee single page vars
const breadcrumbs = document.querySelector(".breadcrumb-container");
const singleProductAbout = document.querySelector(".single-product-about");
const singleProductPage = document.querySelector(".rh-single-product");
const singleProduct = document.querySelector(".single-product");


onload = () => {
ratingHover();
startSlick();

}

/* RELATED PRODUCTS SLIDER on employee page */
function startSlick() {
jQuery(".single-product div.products").slick({
  dots: false,
  infinite: true,
  arrows: true,
  prevArrow:"<button type='button' class='slick-prev-card pull-left'></button>",
  nextArrow:"<button type='button' class='slick-next-card pull-right'></button>",
  speed: 1000,
  slidesToShow: 5,
  slidesToScroll: 5,
  autoplay: true,
  autoplaySpeed: 7000,
  responsive: [
    {
    breakpoint: 1800,
    settings: {
      slidesToShow: 4,
      slidesToScroll: 4,
    },
  },
  {
    breakpoint: 1444,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
    },
  },
  {
    breakpoint: 1068,
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
}

//Employee portfolio Covers Slider
function categoryPortfolio() {
jQuery(".portfolio_items").slick({
  centerMode: true,
  arrows: false,
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 3,
  autoplay: false,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 2270,
      settings: {
        slidesToShow: 5,
      },
    },
    {
      breakpoint: 1880,
      settings: {
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 1530,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 1165,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 815,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
}

//Bredcrums horizontal scroll Employee single page
const arrowLeft = breadcrumbs.querySelector(".breadcrumb-arrow-left");
const arrowRight = breadcrumbs.querySelector(".breadcrumb-arrow-right");
const breadcrumbWindow = breadcrumbs.querySelector(".breadcrumb-window");
const breadcrumbText = breadcrumbs.querySelector(".woocommerce-breadcrumb");

arrowLeft.addEventListener(
"click",
breadcrumbArrowHandler.bind(null, "left"),
false
);
arrowRight.addEventListener(
"click",
breadcrumbArrowHandler.bind(null, "right"),
false
);

function breadcrumbArrowHandler(param) {
const coords = breadcrumbText.offsetWidth - breadcrumbWindow.offsetWidth;
if (param === "left") {
  breadcrumbText.style.transform = "translateX(0)";
} else if (param === "right") {
  breadcrumbText.style.transform = "translateX(-" + coords + "px)";
}
}

//Preloader on Employee single page
document.addEventListener("DOMContentLoaded", () => {
// if (singleProductPage) {
  const loader = document.querySelector(".loader");
  loader.style.opacity = "0";
  loader.style.pointerEvent = "none";
  setTimeout(function () {
    loader.style.display = 'none';
  },1000)
  body.style.overflow = 'visible';
  singleProductPage.classList.remove("preload-fader");

// }
});


/* Rating Stars Hover / Add / Remove on Employee single page */
function ratingHover() {
const stars = document.querySelectorAll(".comment-form-rating i");
const container = document.querySelector(".comment-form-rating");

stars.forEach((star, index) => {
  star.addEventListener("mouseover", function () {
    addStars(stars, index);
  });
  star.addEventListener("click", function () {
    freezeStars(container);
  });
  container.addEventListener("mouseout", removeAllStars, false);
});
}

function addStars(stars, index) {
Array.from(stars).forEach((item, idx) => {
  if (idx <= index) {
    item.classList.add("yellow");
  } else {
    item.classList.remove("yellow");
  }
});
}

function removeAllStars() {
const stars = document.querySelectorAll(".comment-form-rating i");
stars.forEach((star) => {
  star.classList.remove("yellow");
});
}

function freezeStars(container) {
container.removeEventListener("mouseout", removeAllStars, false);
}