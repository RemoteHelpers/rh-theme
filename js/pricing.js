//Pricing Cards Sliders on responsive view
if(document.documentElement.clientWidth < 1024) {
  $('.pricing-cards-full').slick({
   dots: true,
   infinite: true,
   arrows: true,
   speed: 300,
   slidesToShow: 2,
   responsive: [
     {
       breakpoint: 768,
       settings: {
        arrows: false,
         centerPadding: '40px',
         slidesToShow: 1
       }
     }
   ]
 });
 $('.pricing-cards-part').slick({
  dots: true,
  infinite: true,
  arrows: true,
  speed: 300,
  slidesToShow: 2,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
 $('.pricing-cards-min').slick({
  dots: true,
  infinite: true,
  arrows: true,
  speed: 300,
  slidesToShow: 2,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
}

// Show time work type price on tab click
function openPrice(evt, priceName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(priceName).style.display = "block";
  document.getElementById(priceName).style.animation = "opacityAnim .5s ease-in-out";
  evt.currentTarget.className += " active";
  }

//Update pricing Slider on Time work Type change
if(document.documentElement.clientWidth < 1024) {
  $('.tab-parttime').click(function() {
    $('.pricing-cards-part').slick('refresh');
  });
  $('.tab-minimum').click(function() {
    $('.pricing-cards-min').slick('refresh');
  });
  $('.tab-fulltime').click(function() {
    $('.pricing-cards-full').slick('refresh');
  });
}