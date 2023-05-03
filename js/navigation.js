/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

function removeParLink () {
  let tempLink = document.getElementsByClassName('to-remove');
  for (let i = 0; i < tempLink.length; i++) {
    tempLink[i].remove();
  }
}

function fixArrow () {
  let curr = document.querySelector('.current');
  curr.addEventListener('click', function() {
    curr.classList.remove('current');
  })
}


function fixLink () {
  let currentItemLink = document.getElementsByClassName('current')[0].getElementsByTagName('a')[0];
  let parentLink = currentItemLink;
  let currentsubMenu = document.getElementsByClassName('current')[0].getElementsByTagName('ul')[0]
  let newLi = document.createElement('a');
  let catName = currentItemLink.textContent;
  if (catName === "Virtual Assistants") {
    catName = 'VA';
  }
  let customClassName = 'menu-item-custom' + document.getElementsByClassName('current')[0].getElementsByTagName('a')[0].textContent;
  removeParLink();
  newLi.classList.add('menu-item');
  newLi.classList.add('to-remove');
  let checkIfCustomExist = document.querySelector('customClassName');

  newLi.href = parentLink;
  newLi.innerText = 'All ' + catName + ' ➜';
  newLi.classList.toggle('to-parent-cat-'+ catName);
  currentItemLink.removeAttribute('href');
  currentsubMenu.appendChild(newLi);
  currentItemLink.addEventListener('click', removeParLink);

}
//Check in menu element is category and has no child
jQuery(document).ready(function($) { 
  $("#menu-main-header-menu > .menu-item-object-product_cat").each(function() {
    if(!$(this).hasClass( "menu-item-has-children" )){
      $(this).addClass('cat-no-child');
    }
  });
});

(function () {
  const siteNavigation = document.getElementById("site-navigation");

  // Return early if the navigation don't exist.
  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByTagName("button")[0];

  // Return early if the button don't exist.
  if ("undefined" === typeof button) {
    return;
  }
  const menu = siteNavigation.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");

    if (button.getAttribute("aria-expanded") === "true") {
      button.setAttribute("aria-expanded", "false");

      // disable body scroll. enable menu scroll. show social icons
      document.body.style.overflowY = "initial";
      menu.style.overflowY = "initial";
    } else {
      button.setAttribute("aria-expanded", "true");
      document.body.style.overflowY = "hidden";
      menu.style.overflowY = "scroll";
    }
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener("click", function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
      document.body.style.overflowY = "initial";
      menu.style.overflowY = "initial";
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName("a");

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    ".menu-item-has-children > a, .page_item_has_children > a"
  );
  
  const linksContainer = document.querySelectorAll('.menu-item-has-children');

  linksContainer.forEach((link,index) => {

    link.addEventListener("click", (e) => {
      if (window.innerWidth > 980) return;

      // close all other submenus
      const submenus = menu.querySelectorAll(".sub-menu");
      submenus.forEach((item) => {
        jQuery(item).slideUp();
      });

      linksContainer.forEach((item) => {
        item.classList.remove('current')
      })
      link.classList.add('current');
      fixLink();
      link.addEventListener('click', function(){
        if (link.classList.contains('current')) {
        link.classList.remove('current');
        }
        else if (!link.classList.contains('current')) {
          link.classList.add('current');
        }
      });

      // if class 'sub-menu' is present - toggle submenu
      const submenu = link.querySelector('ul');
     
      // console.log(link.querySelector('ul'))
      if (submenu.classList.contains("sub-menu")) {
        if (submenu.style.display === "block") return;
        jQuery(submenu).slideDown();
      } else {
        console.error(`Element has no submenu`);
      }
    });
  })

  // Toggle mini cart on cart icon (main menu)
  const menuCartBtn = document.querySelector("#menu-cart-btn");
  menuCartBtn.addEventListener("click", openMiniCart, false);

  function openMiniCart() {
    window.location.href = "/cart"
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === "focus" || event.type === "blur") {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains("nav-menu")) {
        // On li elements toggle the class .focus.
        if ("li" === self.tagName.toLowerCase()) {
          self.classList.toggle("focus");
        }
        self = self.parentNode;
      }
    }

    if (event.type === "touchstart") {
      const menuItem = this.parentNode;
      // event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove("focus");
        }
      }
      menuItem.classList.toggle("focus");
    }
  }

  showSocial();
})();

onresize = showSocial;

function showSocial() {
  // add social icons to mobile menu if < 980
  const siteNavigation = document.getElementById("site-navigation");
  const menu = siteNavigation.getElementsByTagName("ul")[0];
  const social = document.querySelector("#header-social-icons");
  if (window.innerWidth <= 980) {
    menu.append(social);
    social.style.display = "flex";
  } else {
    social.style.display = "none";
  }
}

