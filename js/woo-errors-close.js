// close button error
jQuery(document).on("click", "#close_notice", function(){
    let elements = document.getElementsByClassName('woocommerce-error');
        for(let i=0; i< elements.length; i++){
            elements[i].style.display = "none";
    }
  });