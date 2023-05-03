// Slick on home page
//slick Assistance
function assistanceSlider() {
    jQuery('.card-container .similar_slider').slick({
        dots: true,
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
assistanceSlider();

// function clientsSlider() {
//     jQuery('.clients-slider-left').slick({
//         lazyLoad: 'ondemand',
//         arrows : false,
//         dots: false,
//         slidesToShow: 6,
//         slidesToScroll: 2,
//         autoplay: true,
//         autoplaySpeed: 4000,
//         speed: 2000,
//         pauseOnHover: false,
//         adaptiveHeight: true,
//         responsive: [
//             {
//                 breakpoint: 2560,
//                 settings: {
//                     slidesToShow: 6,
//                     slidesToScroll: 6,
//                     infinite: true,
//                 }
//             },
//             {
//                 breakpoint: 1920,
//                 settings: {
//                     slidesToShow: 6,
//                     slidesToScroll: 6,
//                     infinite: true,
//                 }
//             },
//             {
//                 breakpoint: 1280,
//                 settings: {
//                     slidesToShow: 5,
//                     slidesToScroll: 5,
//                     infinite: true,
//                 }
//             },
//             {
//                 breakpoint: 1024,
//                 settings: {
//                     slidesToShow: 4,
//                     slidesToScroll: 4,
//                 }
//             },
//             {
//                 breakpoint: 600,
//                 settings: {
//                     slidesToShow: 3,
//                     slidesToScroll: 3,
//                 }
//             }
//         ]
//     });
//     jQuery('.clients-slider-right').slick({
//         lazyLoad: 'ondemand',
//         arrows : false,
//         dots: false,
//         slidesToShow: 5,
//         slidesToScroll: 2,
//         autoplay: true,
//         autoplaySpeed: 4000,
//         speed: 2000,
//         pauseOnHover: false,
//         adaptiveHeight: true,
//         rtl: true,
//         responsive: [
//             {
//                 breakpoint: 2560,
//                 settings: {
//                     slidesToShow: 6,
//                     slidesToScroll: 6,
//                     infinite: true,
//                 }
//             },
//             {
//                 breakpoint: 1920,
//                 settings: {
//                     slidesToShow: 6,
//                     slidesToScroll: 6,
//                     infinite: true,
//                 }
//             },
//             {
//                 breakpoint: 1280,
//                 settings: {
//                     slidesToShow: 5,
//                     slidesToScroll: 5,
//                     infinite: true,
//                 }
//             },
//             {
//                 breakpoint: 1024,
//                 settings: {
//                     slidesToShow: 4,
//                     slidesToScroll: 4,
//                 }
//             },
//             {
//                 breakpoint: 600,
//                 settings: {
//                     slidesToShow: 3,
//                     slidesToScroll: 3,
//                 }
//             }
//         ]
//     });
// }
// clientsSlider();
//slick Testimonials

function testimonialsSlider() {
    jQuery('.testimonials-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    arrows: false,
                    dots: true,
                    centerMode: false,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                }
            }
        ]
    });
}
testimonialsSlider();

function remoteStaff() {
    jQuery('.staff-cards-slides').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    infinite: true,
                    dots: true,
                    centerMode: true,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    infinite: true,
                    dots: true,
                    centerMode: false,
                    slidesToShow: 1,
                }
            }
        ]
    });
}
if (document.documentElement.clientWidth < 768) {
remoteStaff();
}

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



const wordsAll = document.querySelectorAll(".hero h1 .slide")
const wordsArr = Array.from(wordsAll)
const words = wordsArr.map((item)=> {
    return item.innerHTML
})
const text = document.querySelector(".word-slider");
// console.log(wordsArr.length)
// Generator (iterate from 0-3)
function* generator() {
    var index = 0;
    while (true) {
        yield index++;

        if (index > words.length - 1) {
            index = 0;
        }
    }
}

// Printing effect
function printChar(word) {
    let i = 0;
    text.innerHTML = "";
    // text.classList.add(colors[words.indexOf(word)]);
    let id = setInterval(() => {
        if (i >= word.length) {
            setTimeout(
            function timeout() {
                deleteChar();
            },2000)
            clearInterval(id);
        } else {
            text.innerHTML += word[i];
            i++;
        }
    }, 150);
}

// Deleting effect
function deleteChar() {
    let word = text.innerHTML;
    let i = word.length - 1;
    let id = setInterval(() => {
        if (i >= 0) {
            text.innerHTML = text.innerHTML.substring(0, text.innerHTML.length - 1);
            i--;
        } else {
            // text.classList.remove(colors[words.indexOf(word)]);
            printChar(words[gen.next().value]);
            clearInterval(id);
        }
    }, 75);
}

// Initializing generator
let gen = generator();

printChar(words[gen.next().value]);

// function cut130(){
//     let cut = document.getElementsByClassName('cat-desc');
//     for( let i = 0; i < cut.length; i++ ){
//       cut[i].innerText = cut[i].innerText.slice(0,130) + '...';
//     }
//   }
  
//   cut130();

//CATEGORIES SLIDERS
  function categoriesSlider() {
    jQuery('.category-home-slider .similar_slider').slick({
        dots: true,
        infinite: true,
        arrows: true,
        prevArrow:"<button type='button' class='slick-prev-card pull-left'></button>",
        nextArrow:"<button type='button' class='slick-next-card pull-right'></button>",
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 7000,
        responsive: [
            {
            breakpoint: 1800,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 1444,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 1068,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 900,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
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
categoriesSlider();