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


let testHeihgt = jQuery("#quest_height").height();
// console.log(testHeihgt);

//SET HEIGHT AFTER CONTENT LOAD
jQuery(document).ready(function() { 
  setTimeout( function(){ 
      let afterHeight = jQuery("#list_bottom").outerHeight();
      // console.log(afterHeight + "px");
      jQuery("#list_bottom")[0].style.height = afterHeight + "px"; 
      let newHeihgt = jQuery("#quest_height").height();
        answers.forEach(anwer_desc => {
          anwer_desc.style.height = newHeihgt - 222 + "px";
  });
  }, 250 );
  });

const answers = document.querySelectorAll(".anwer_desc");
const faqlist = document.querySelectorAll(".cards__front");
jQuery( "#quest_height" )[0].style.height = testHeihgt + "px";

jQuery( ".accordion-header" ).click(function() {
  jQuery( ".cards__front" ).addClass( "hide-question" );
  setTimeout( function(){   jQuery( ".pfl-button" ).addClass( "show-button" ); }, 250 );
});

jQuery( ".pfl-button" ).click(function() {
  setTimeout( function(){   jQuery( ".cards__front" ).removeClass( "hide-question" ); }, 150 );
  setTimeout( function(){   jQuery( ".pfl-button" ).removeClass( "show-button" ); }, 150 );

});

const cards = document.querySelectorAll(".cards__single");
cards.forEach((card) => {
  const resultsButton = card.querySelector(".accordion-header");
  resultsButton.addEventListener("click", () => {
    card.classList.add('do-flip');
  });
  const backButton = card.querySelector("#flip-card-btn-turn-to-front");
  backButton.addEventListener("click", () => {
    card.classList.remove('do-flip');
  });

        // jQuery( ".cardproduct-price" ).tooltip({show: {effect:"none", delay:0}});

});