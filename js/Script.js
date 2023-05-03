let sidebar = document.querySelector(".side-bar");
let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};

navLinkk = document.querySelectorAll(".nav-link");

navLinkk.forEach((navLink) => {
  navLink.addEventListener("click", function () {
    navLinkk.forEach((navLink) => navLink.classList.remove("active")); // Remove active class from all links
    this.classList.add("active"); // Add active class to clicked link
  });
});

/* load html page into another one */
/*
const navLinks = document.querySelectorAll('nav .navs-links div');
navLinks.forEach(link => {
  link.addEventListener('click', event => {
    event.preventDefault();
    const page = link.dataset.page;
    loadPage(page);
  });
});

function loadPage(page) {
  const content = document.getElementById('contentall');
  content.classList.add('page-active');
  if (page === 'dashboard') {
    fetch('../html/Acceuil.html')
    .then(response => response.text())
    .then(data => {
      const productContent = document.getElementById('contentall');
      productContent.innerHTML = data;

        // Remove the page-active class after the content is updated
        setTimeout(() => {
          content.classList.remove('page-active');
        }, 500);

    });
  } else if (page === 'Product') {
    fetch('../html/product.html')
      .then(response => response.text())
      .then(data => {
        const productContent = document.getElementById('contentall');
        productContent.innerHTML = data;

          // Remove the page-active class after the content is updated
          setTimeout(() => {
            content.classList.remove('page-active');
          }, 500);
      });
  } else if (page === 'Clients') {
    // Insert code to load Clients page here
    fetch('../html/clients.html')
      .then(response => response.text())
      .then(data => {
        const productContent = document.getElementById('contentall');
        productContent.innerHTML = data;

          // Remove the page-active class after the content is updated
          setTimeout(() => {
            content.classList.remove('page-active');
          }, 500);
      });
  } else if (page === 'contact') {
    // Insert code to load contact page here
    console.log('Loading contact page');
      // Remove the page-active class after the content is updated
      setTimeout(() => {
        content.classList.remove('page-active');
      }, 500);
  } else {
    console.log(`Invalid page: ${page}`);
  }
}
*/
/* change color when i click on any div link */

const navLinkk = document.querySelectorAll(".nav-link");

navLinkk.forEach((navLink) => {
  navLink.addEventListener("click", function () {
    navLinkk.forEach((navLink) => navLink.classList.remove("active")); // Remove active class from all links
    this.classList.add("active"); // Add active class to clicked link
  });
});

/*navLinks.forEach(function(navLink) {
  navLink.addEventListener("click", function(event) {
    sidebar.classList.remove("active");
  });
});*/

/*const links = document.querySelectorAll('.navs-links div a');

links.forEach(link => {
  link.addEventListener('click', clickHandler);
});

function clickHandler(e) {
  e.preventDefault();
  const href = this.getAttribute("href");
  const offsetTop = document.querySelector(href).offsetTop;
  
  scroll({
    top: offsetTop,
    behavior: "smooth"
  });
}*/
