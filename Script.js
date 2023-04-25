let sidebar =document.querySelector(".side-bar");
let sidebarbtn =document.querySelector(".sidebarbtn");
let easly = document.querySelector(".side-bar .logo ");

sidebarbtn.onclick = function() {
sidebar.classList.toggle("active");
if (sidebar.classList.contains("active")) {
    easly.style.padding = "15px 10px 10px 8px";
    easly.style.fontSize = "1.3rem";
    sidebar.style.transition = "all 0.5s ease-in-out";
  } else {
    easly.style.padding = "15px 10px 10px 18px";
    easly.style.fontSize = "1.6rem";
    sidebar.style.transition = "none";
  }
}


