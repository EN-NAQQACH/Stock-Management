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


