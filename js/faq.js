/* Accordoins on FAQ page */
onload = () => {
    faqAccordion();
  }
function faqAccordion() {
    const accordionHeaders = document.querySelectorAll(".accordion-header");
    const accordionBodies = document.querySelectorAll(".accordion-body");
  
    accordionHeaders.forEach((item) => {
      item.addEventListener("click", (e) => {
        //close all items
        const accordionBody = e.target.nextElementSibling;
        const accordionOpen = getComputedStyle(
          accordionBody,
          null
        ).getPropertyValue("display");
        if (accordionOpen === "none") {
          accordionHeaders.forEach((item) => {
            item.firstElementChild.classList.remove("rotate");
          });
          accordionBodies.forEach((item) => {
            jQuery(item).slideUp("fast");
          });
        }
  
        // toggle current item
        const body = e.target.nextElementSibling;
        const arrow = e.target.firstElementChild;
        arrow.classList.toggle("rotate");
        jQuery(body).slideToggle("fast");
      });
    });
  }