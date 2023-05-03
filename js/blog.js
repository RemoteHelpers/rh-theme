// flip accordeon in contact form
let testHeihgt = jQuery("#quest_height").height();

const answers = document.querySelectorAll(".anwer_desc");
const faqlist = document.querySelectorAll(".cards__front");

jQuery( ".accordion-header" ).click(function() {
    jQuery( ".cards__front" ).addClass( "hide-question" );
    setTimeout( function(){   jQuery( ".pfl-button" ).addClass( "show-button" ); }, 250 );
    jQuery( "#quest_height" )[0].style.height = testHeihgt  + "px";
    answers.forEach(anwer_desc => {
        anwer_desc.style.height = testHeihgt - 242 + "px";
    });
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
});