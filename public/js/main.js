document.addEventListener("DOMContentLoaded",(function(e){document.querySelectorAll('a[href="#toggle-menu"], li.toggle-menu:not(.menu-item)').forEach((function(e){e.addEventListener("click",(function(e){e.preventDefault(),e.stopPropagation();var t=this.querySelector("ul");if(t.classList.contains("hidden")){var n=document.querySelector(".submenu:not(.hidden)");n&&n!==this&&n.classList.toggle("hidden")}t.classList.toggle("hidden")}))}));var t=document.querySelectorAll("li.toggle-menu.menu-item");t&&t.forEach((function(e){e.addEventListener("click",(function(e){e.stopPropagation(),this.querySelector("ul").classList.toggle("hidden")}))}));var n=document.getElementById("toggle-menu");n&&n.addEventListener("click",(function(e){e.stopPropagation();var t=document.querySelector("#menu");t&&t.classList.toggle("hidden")})),window.addEventListener("click",(function(){n&&document.querySelector("#menu").classList.add("hidden"),document.querySelectorAll("ul.submenu").forEach((function(e){e.classList.add("hidden"),e.querySelectorAll("ul").forEach((function(e){e.classList.add("hidden")}))}))}))}));