if(document.documentElement.clientWidth < 1401) {
  $('.outstaffing__content').slick({
    dots: true,
    arrows: false,
    variableWidth: true,
    centerMode: true,
    centerPadding: '0px',
    responsive: [
      {
        breakpoint: 576,
        settings: {
        arrows: true,
        dots: false,
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
