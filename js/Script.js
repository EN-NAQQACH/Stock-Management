let sidebar =document.querySelector(".side-bar");
let sidebarbtn =document.querySelector(".sidebarbtn");
let easly = document.querySelector(".side-bar .logo ");
//let navLinks = document.querySelectorAll(".navs-links li a");

sidebarbtn.onclick = function() {
sidebar.classList.toggle("active");
if (sidebar.classList.contains("active")) {
    easly.style.padding = "15px 10px 10px 4px";
    easly.style.fontSize = "1.3rem";
    sidebar.style.transition = "all 0.5s ease-in-out";
  } else {
    easly.style.padding = "15px 10px 10px 18px";
    easly.style.fontSize = "1.6rem";
    sidebar.style.transition = "none";
  }
}

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
  } else if (page === 'about') {
    // Insert code to load about page here
    console.log('Loading about page');
      // Remove the page-active class after the content is updated
      setTimeout(() => {
        content.classList.remove('page-active');
      }, 500);
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


