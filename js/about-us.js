/* ABOUT US PHOTO GALLERY SLIDER */
onload = () => {
    aboutSlider();
    clientsSlider();
  }
  function aboutSlider() {
      jQuery(".gallery-viewport").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".about-gallery",
      });
      jQuery(".about-gallery").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: ".gallery-viewport",
        dots: true,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 1000,
            settings: {
              slidesToShow: 3,
            },
          },
        ],
      });
      jQuery(".gallery-gallery-mobile").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        mobileFirst: true,
        adaptiveHeight: true,
      });
    }
  
    //Clents First Slider on Aboute us page
  function clientsSlider() {
    jQuery('.clients-slider-left').slick({
        lazyLoad: 'ondemand',
        arrows : false,
        dots: false,
        slidesToShow: 6,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 2000,
        pauseOnHover: false,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 2560,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                }
            },
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            }
        ]
    });
  
  //Clents Second Slider on Aboute us page
    jQuery('.clients-slider-right').slick({
        lazyLoad: 'ondemand',
        arrows : false,
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 2000,
        pauseOnHover: false,
        adaptiveHeight: true,
        rtl: true,
        responsive: [
            {
                breakpoint: 2560,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                }
            },
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            }
        ]
    });
  }