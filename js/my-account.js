// my account flip card

function flipCardReg() {
    const btnLog = document.querySelector(".dont-account a");
    const btnReg = document.querySelector(".have-account a");

    const btnTarget = document.querySelector(".my-account-wrapper");

    btnLog?.addEventListener("click", function () {
        btnTarget.classList.add("active");
        document.querySelector('.login-window').classList.add('hide')
        document.querySelector('.registration-window').classList.add('visible')
    });
    btnReg?.addEventListener("click", function () {
        btnTarget.classList.remove("active");
        document.querySelector('.login-window').classList.remove('hide')
        document.querySelector('.registration-window').classList.remove('visible')
    });
}

flipCardReg();

// My account page menu toggle class
const closeBtn = document.querySelector('.navigation-header-close')
const btnTarget = document.querySelector('.woocommerce-MyAccount-navigation')
const accountContent = document.querySelector('.woocommerce-MyAccount-content')

closeBtn.addEventListener("click", (e) => {
    e.preventDefault()
    btnTarget.classList.toggle('active')
    accountContent.classList.toggle('active')
})

// Progress bar My account page
function progressCircle () {
    const circle = document.querySelector('.progress-ring__circle');
    const radius = circle?.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;
    const progressTotal = document.querySelector('.progress-ring-wrapper .progress-total')
    const progressActive = document.querySelector('.subscription-active-js')
    if (circle) {
        circle.style.strokeDasharray = `${circumference} ${circumference}`
        circle.style.strokeDashoffset = `${circumference} ${circumference}`
    }
    const progressPercent = progressActive?.innerHTML * 100 / progressTotal?.innerHTML

    function setPercent (percent) {
        const offset = circumference - percent / 100 * circumference;
        if (circle) {
            circle.style.strokeDashoffset = offset;

        }
    }
    setPercent(progressPercent)
}

progressCircle()

// toggle subscription My account page
function toggleSubs () {
    const buttonTable = document.querySelector('.dashboard-table-toggle-table')
    const buttonCards = document.querySelector('.dashboard-table-toggle-cards')
    const targetTable = document.querySelector('.custom-table')
    const targetCards = document.querySelector('.dashboard-table-cards')
    const targetNavPagination = document.querySelector('.pagination-container');

    buttonTable?.addEventListener('click',function () {
        buttonTable.classList.add('active')
        targetTable.classList.add('visible')
        targetNavPagination.classList.add('visible')
        buttonCards.classList.remove('active')
        targetCards.classList.remove('visible')
    })
    buttonCards?.addEventListener('click',function () {
        buttonCards.classList.add('active')
        targetCards.classList.add('visible')
        targetNavPagination.classList.remove('visible')
        buttonTable.classList.remove('active')
        targetTable.classList.remove('visible')
    })
}

toggleSubs()

//My account page dropdownSort()
function dropdownAction () {
    jQuery(function() {
        jQuery('.dropdown-simple').click(function(e) {
            jQuery(this).find('.dropdown-list-simple').slideToggle(200)
        });
        jQuery('.dropdown-simple-card').click(function(e) {
            jQuery(this).find('.dropdown-list-simple').slideToggle(200)
        });
    });
}
dropdownAction()

// Disable body scroll on popup My account page
jQuery(".open_popup_payment").click(function () {
    jQuery("#paymen_modal_wrap").addClass("closed_payment_modal");
    jQuery("#paymen_modal").addClass("closed_payment_modal");
    jQuery("body").addClass("body_no_scroll");
 });
 jQuery(".close-modal").click(function () {
    jQuery("#paymen_modal_wrap").removeClass("closed_payment_modal");
    jQuery("#paymen_modal").removeClass("closed_payment_modal");
    jQuery("body").removeClass("body_no_scroll");
 });
 jQuery("#paymen_modal_wrap").click(function () {
    jQuery("#paymen_modal_wrap").removeClass("closed_payment_modal");
    jQuery("#paymen_modal").removeClass("closed_payment_modal");
    jQuery("body").removeClass("body_no_scroll");
 });

 // custom input type file on edit account My account page
jQuery('.edit-account-upload-image-wrapper > svg').click(function(){
    jQuery('.edit-account-col:nth-child(1) input[type=file].woocommerce-Input').click();
});

jQuery('.edit-account-upload-buttons-change').click(function(){
    jQuery('.edit-account-col:nth-child(1) input[type=file].woocommerce-Input').click();
});

var loadFile = function(event) {
    var output = document.querySelector('.image_uload_file');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

// dashboard cards slider My account page
function dashboardCardsSlider() {
    jQuery('.my-account-dashboard-cards').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: false,
    });
}

if (window.matchMedia("(max-width: 640px)").matches) {
    dashboardCardsSlider();
}

// dashboard table(card) slider My account page
function dashboardSubscriptionCardsSlider() {
    jQuery('.dashboard-table-cards').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: false,
    });
}

if (window.matchMedia("(max-width: 640px)").matches) {
    dashboardSubscriptionCardsSlider();
}

//SORT TABLE My account page
jQuery(document).ready(init);
function init(jQuery) {
  initTableSorter();
}
function initTableSorter() {
jQuery("[data-sort=table]").tablesorter({
    sortList: [[0,1]]
  });
}

//SORT SELECT DROPDOWN My account page
jQuery(document).ready(function() {
    //SORT BY NUMBER INCREAS    
      function sortByNumber(rows, selector, ascending) {
          rows.sort(function(a, b) {
            var numberA = parseInt(jQuery(selector, a).text(), 10);
          var numberB = parseInt(jQuery(selector, b).text(), 10);
          if (ascending)
                return numberA - numberB;
          else
              return numberB - numberA;
        });
        return rows;
      }
    //SORT BY NUMBER DECREAS 
      function sortByNumberDec(rows, selector, ascending) {
        rows.sort(function(a, b) {
          var numberA = parseInt(jQuery(selector, a).text(), 10);
        var numberB = parseInt(jQuery(selector, b).text(), 10);
        if (ascending)
              return numberB - numberA;
        else
            return numberA - numberB;
      });
      return rows;
    }
    //SORT BY TEXT A-B     
      function sortByText(rows, selector, ascending) {
          rows.sort(function(a, b) {
            var textA = jQuery(selector, a).text();
          var textB = jQuery(selector, b).text();
          if (ascending)
              return textA.localeCompare(textB);
          else
                return textB.localeCompare(textA);
        });
        return rows;
      }
      function sortAllBy(field) {
          var rows = jQuery('#table tbody tr').toArray();
          switch (field) {
            case 'From New (order date)':
              rows = sortByNumber(rows, 'td.col-period', true);
              break;
          case 'Total (increase)':
              rows = sortByNumber(rows, 'td.col-total', true);
              break;
          case 'Total (decrease)':
            rows = sortByNumberDec(rows, 'td.col-total', true);
            break;  
          case 'Time remaining (less)':
             rows = sortByNumber(rows, 'td.col-time-remeining', true);
              break;
          case 'Time remaining (more)':
             rows = sortByNumberDec(rows, 'td.col-time-remeining', true);
           break;
          default:
             rows = sortByNumber(rows, 'td.col-period', true);
            break;
        }
        for (var i = 0; i < rows.length; i++) {
            jQuery('#table tbody').append(rows[i]);
        }
      }
      jQuery('#sort-select').on('change', function() {
          sortAllBy(this.value);
      });
    });