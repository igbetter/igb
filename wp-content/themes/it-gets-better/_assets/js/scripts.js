const igbDarkMode={init(){this.changeListener(),this.tabindexListener()},changeListener(){const e=document.querySelectorAll('.dark-toggle input[type="checkbox"]');e.length<=0||e.forEach((e=>{e.addEventListener("change",(e=>{this.toggle(e.currentTarget.checked)}))}))},tabindexListener(){document.querySelectorAll(".dark-toggle__switch").forEach((e=>{e.addEventListener("keyup",(e=>{if("Enter"===e.key||13===e.keyCode){const t=e.currentTarget.closest(".dark-toggle").querySelector('input[type="checkbox"]');t.checked=!t.checked,this.toggle(t.checked)}}))}))},toggle(e){document.querySelector("body").classList.toggle("theme-light"),document.querySelector("body").classList.toggle("theme-dark",e),localStorage.setItem("darkMode",e)}};document.addEventListener("DOMContentLoaded",(()=>{igbDarkMode.init()})),setTimeout((function(){document.body.classList.toggle("preload")}),500),jQuery(document).ready((function(e){e("li.current_page_parent").addClass("sub_menu_open"),e(".dropdown_toggle").on("click",(function(t){t.preventDefault(),e(this).hasClass("closed")?(e("li.menu-item-has-children").removeClass("sub_menu_open"),e(".dropdown_toggle").removeClass("open").addClass("closed"),e(this).removeClass("closed").addClass("open"),e(this).parent("li.menu-item-has-children").addClass("sub_menu_open"),e(this).find(".sub-menu").show().animate({width:"toggle"})):(e(this).removeClass("open").addClass("closed"),e(this).parent("li.menu-item-has-children").removeClass("sub_menu_open"))})),e(".back_button").on("click",(function(t){e(this).parents("li.menu-item-has-children").removeClass("sub_menu_open"),e(this).parent(".sub-menu").hide().animate({width:"toggle"})})),e("li").hasClass("current_page_parent")&&(e(this).addClass("sub_menu_open"),e(this).find(".dropdown_toggle").removeClass("closed").addClass("open"),e(this).find("sub-menu").show())})),jQuery(document).ready((function(e){e(window).scroll((function(){e(window).scrollTop()>=50?e("header.site_main_header").addClass("smaller"):e("header.site_main_header").removeClass("smaller")}))}));
//# sourceMappingURL=scripts.js.map