function init(){fixedNav(),createGallery(),scrollNav()}function fixedNav(){const e=document.querySelector(".header"),t=document.querySelector(".about-festival"),o=document.querySelector("body");window.addEventListener("scroll",(function(){t.getBoundingClientRect().top<0?(e.classList.add("fixed"),o.classList.add("body-scroll")):(e.classList.remove("fixed"),o.classList.remove("body-scroll"))}))}function scrollNav(){document.querySelectorAll(".nav-main a").forEach(e=>{e.addEventListener("click",(function(e){e.preventDefault();const t=e.target.attributes.href.value;document.querySelector(t).scrollIntoView({behavior:"smooth"})}))})}document.addEventListener("DOMContentLoaded",(function(){init()}));
//# sourceMappingURL=app.js.map