jQuery(".tab").click((function(){jQuery(this).hasClass("collapsed")?(jQuery(this).removeClass("collapsed"),jQuery(this).siblings().removeClass("expanded"),jQuery(this).addClass("expanded"),jQuery(this).siblings().addClass("collapsed")):(jQuery(this).toggleClass("expanded"),jQuery(this).siblings().toggleClass("collapsed"))}));const igbDarkMode={init(){this.setInitialMode(),this.changeListener(),this.tabindexListener()},setInitialMode(){const e="true"===localStorage.getItem("darkMode");document.querySelector("body").classList.toggle("theme-light",!e),document.querySelector("body").classList.toggle("theme-dark",e);document.querySelectorAll('.darkmode_switch input[type="checkbox"]').forEach((t=>{t.checked=e}))},changeListener(){const e=document.querySelectorAll('.darkmode_switch input[type="checkbox"]');e.length<=0||e.forEach((e=>{e.addEventListener("change",(e=>{this.toggle(e.currentTarget.checked)}))}))},tabindexListener(){document.querySelectorAll(".switch__input").forEach((e=>{e.addEventListener("keyup",(e=>{if("Enter"===e.key||13===e.keyCode){const t=e.currentTarget.closest(".darkmode_switch").querySelector('input[type="checkbox"]');t.checked=!t.checked,this.toggle(t.checked)}}))}))},toggle(e){document.querySelector("body").classList.toggle("theme-light",!e),document.querySelector("body").classList.toggle("theme-dark",e),localStorage.setItem("darkMode",e)}};document.addEventListener("DOMContentLoaded",(()=>{igbDarkMode.init()})),setTimeout((function(){document.body.classList.toggle("preload")}),500),jQuery(document).ready((function(e){e("#mobile_filter_toggle_button").on("click",(function(t){t.preventDefault(),e(".browse_content_main").toggleClass("filter_is_open"),e(".browse_content_main .filter_column").toggleClass("open"),e(this).text(((e,t)=>"Show More Filters"==t?"Hide More Filters":"Show More Filters"))}))})),function(e){"use strict";document.addEventListener("DOMContentLoaded",(()=>{const e=document.querySelectorAll("#menu-main-navigation > .menu-item > a"),t=document.querySelectorAll(".sub-menu");let n=-1,o=null;function s(){t.forEach((e=>{e.style.display="none",e.style.opacity="0";const t=e.previousElementSibling;t&&"A"===t.tagName&&t.setAttribute("aria-expanded","false")})),o=null}function a(e){e.style.display="block",e.style.opacity="1";const t=e.previousElementSibling;t&&"A"===t.tagName&&t.setAttribute("aria-expanded","true")}function l(e){const t=e.target.closest(".menu-item > a");if(t){const n=t.parentElement.querySelector(".sub-menu");n&&("block"===n.style.display?s():(s(),a(n)),e.preventDefault())}}e.forEach((e=>e.addEventListener("click",l))),document.addEventListener("keydown",(function(t){if("ArrowRight"===t.key){if(n<e.length-1){n++;const t=e[n];o&&s(),t.focus(),o=t.nextElementSibling,o&&o.classList.contains("sub-menu")&&a(o)}t.preventDefault()}else if("ArrowLeft"===t.key){if(n>0){n--;const t=e[n];o&&s(),t.focus(),o=t.nextElementSibling,o&&o.classList.contains("sub-menu")&&a(o)}t.preventDefault()}else if("ArrowDown"===t.key){if(o){const e=document.activeElement,t=Array.from(o.querySelectorAll(".menu-item a")),n=t.indexOf(e);n<t.length-1&&t[n+1].focus()}t.preventDefault()}else if("ArrowUp"===t.key){if(o){const e=document.activeElement,t=Array.from(o.querySelectorAll(".menu-item a")),n=t.indexOf(e);n>0&&t[n-1].focus()}t.preventDefault()}else"Escape"===t.key&&(s(),n=-1,document.activeElement&&document.activeElement.closest(".menu-item")&&document.querySelector(".menu-item a").focus())}))})),e(document).ready((function(){e.fn.toggleAttrVal=function(t,n,o){var s=e(this).attr(t);return s===n?(e(this).attr(t,o),this):(e(this).attr(t,n),this)};const t=e("#menu_toggle_button"),n=e(".header_center"),o=e("body"),s=e(".header_center"),a=n.find("a"),l=e=>{a.attr("tabindex",e)};t.on("click",(function(){o.hasClass("main_nav_is_open")?(o.removeClass("main_nav_is_open"),t.removeClass("main_nav_open"),s.hide("slide",{direction:"right"},500),setTimeout((()=>{n.attr("style","")}),501),e("path.top_line").toggleAttrVal("d","m 5 5 l 30 30","m 15 10 l 20 0"),e("path.bottom_line").toggleAttrVal("d","m 5 35 l 30 -30","m 5 30 l 30 0"),l("-1"),setTimeout((()=>{t.focus()}),500)):(o.addClass("main_nav_is_open"),t.addClass("main_nav_open"),s.show("slide",{direction:"right"},500),e("path.top_line").toggleAttrVal("d","m 5 5 l 30 30","m 15 10 l 20 0"),e("path.bottom_line").toggleAttrVal("d","m 5 35 l 30 -30","m 5 30 l 30 0"),l("0"),setTimeout((()=>{a.first().focus()}),500))}))}))}(jQuery);var body=document.querySelector("body"),siteheader=document.querySelector("header").getElementsByClassName("site_main_header")[0],menutoggle=document.getElementById("menu_toggle_button"),menubutton_topline=document.getElementsByClassName("top_line")[0],menubutton_bottomline=document.getElementsByClassName("bottom_line")[0];window.addEventListener("pageshow",(function(e){window.scrollY>=50&&siteheader.classList.add("smaller")})),jQuery(document).ready((function(e){e("#safeExit").hover((function(t){t.preventDefault(),e("#safeExitContent").removeClass("hidden")})),e("#safeExit a").on("click",(function(t){var n=e(this).attr("href");t.preventDefault(),document.body.innerHTML="",window.open(n,"_newtab"),window.location.replace(n)})),e("#safeExitContent").on("mouseleave",(function(t){t.preventDefault(),e("#safeExitContent").addClass("hidden")}))})),jQuery(document).ready((function(e){e("#search_bar_toggle").on("click",(function(t){t.preventDefault(),e("body").toggleClass("search_is_open"),e(this).hasClass("search_closed")?(e(this).removeClass("search_closed").addClass("search_open"),e(".site_search_bar").removeClass("search_closed").addClass("search_open")):(e(this).removeClass("search_open").addClass("search_closed"),e(".site_search_bar").removeClass("search_open").addClass("search_closed"))})),e(".jetpack-instant-search__overlay-close").on("click",(function(t){e("body").toggleClass("search_is_open"),e("#search_bar_toggle").removeClass("search_open").addClass("search_closed"),e(".site_search_bar").removeClass("search_open").addClass("search_closed")}))})),jQuery(document).ready((function(e){e(window).on("load scroll",(function(){var t=e(".simple_parallax_scroll"),n=t.length;window.requestAnimationFrame((function(){for(var o=0;o<n;o++){var s=t.eq(o),a=e(window).scrollTop(),l=(s.offset().top,s.height()),i=(.5*window.innerHeight-.5*l)/l*(a+.01);scrollinlimited=Math.min(i,100),window.matchMedia("(orientation: portrait)").matches?s.css({"object-position":scrollinlimited+"% center"}):s.css({"object-position":"center "+scrollinlimited+"%"})}}))}))})),document.addEventListener("DOMContentLoaded",(function(){Splide.defaults={perPage:5,perMove:1,gap:"2rem",autoHeight:!0,drag:"free",noDrag:"input, textarea, .no-drag",dragMinThreshold:{mouse:0,touch:10},keyboard:!0,wheel:!0,releaseWheel:!0,trimSpace:!1,cover:!0,breakpoints:{900:{perPage:4,height:"150px"},640:{perPage:3,height:"125px"},480:{perPage:2,height:"100px"}}};for(var e=document.getElementsByClassName("splide"),t=0;t<e.length;t++)new Splide(e[t]).mount()})),jQuery(document).ready((function(e){function t(){e(window).scrollTop()>50?e("header.site_main_header").addClass("smaller"):e("header.site_main_header").removeClass("smaller")}t(),e(window).scroll((function(){t()})),e(window).on("load",(function(){t()}))}));
//# sourceMappingURL=scripts.js.map