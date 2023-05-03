
// basket card flip
function basketCardFlip() {
    const btnOpen = document.getElementsByClassName("product-about");
    const btnClose = document.getElementsByClassName("basket_close");
    const btnTarget = document.querySelectorAll(
        ".woocommerce-cart-form__cart-item.cart_item"
    );
    let counter = 0
    // console.log(counter++)
    Array.from(btnOpen).forEach(function (item, index) {
        btnTarget.forEach(function () {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                btnTarget[index].classList.add("active");
            });
        });
    });
    Array.from(btnClose).forEach(function (item, index) {
        btnTarget.forEach(function () {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                btnTarget[index].classList.remove("active");
            });
        });
    });
}

basketCardFlip()

// Update basket list
function updateItemList() {
    document.querySelectorAll('.delete-item-js').forEach((item) => {
        item.addEventListener('click',(e) => {
            setTimeout(basketCardFlip,3000)
        })
    })
}

updateItemList()

// Undo Button Basket
function undoBtn() {
jQuery(document).ready(function (){
    const undoBtn = jQuery(".undo-btn");
    const errorContainer = jQuery('.error-container');

    jQuery('body').on('click' , '.delete-item-js' , function (){
        let currentUrl = jQuery(this).attr('data-undo');

        setTimeout(() =>{
            jQuery(errorContainer).addClass('active');
        },1200);
        if ([undoBtn].length === 1) {
            jQuery(errorContainer).addClass('remove');
        }

        (undoBtn).attr('href' , currentUrl);
    })
})
}

undoBtn()

const cartNoEmmpty = document.querySelector(".cart-collaterals");

// Pdf popup
if(cartNoEmmpty){
    function pdfPopup () {
        const pdfBtn = document.querySelector('.basket_nav_pdf')
        const pdfContent = document.querySelector('.pdf-popup')
        const pdfCloseBackground = document.querySelector('.pdf-background-close')
        const bodyHtml = document.querySelector('body')
    
        pdfBtn.addEventListener('click',function (e) {
            e.preventDefault()
            pdfContent.classList.add('active')
            bodyHtml.classList.add('hidden')
        })
    
        pdfCloseBackground.addEventListener('click',function (e) {
            pdfContent.classList.remove('active')
            bodyHtml.classList.remove('hidden')
        })
    
    }
    pdfPopup();
}
