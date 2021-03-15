var menuBtn = '';
var menuBtnCloser = '';
var menuMobile = '';
/* CUSTOM ON LOAD FUNCTIONS */
function documentCustomLoad() {
    "use strict";
    console.log('Functions Correctly Loaded');

    menuBtn = document.getElementById('nav-icon1');
    menuBtnCloser = document.getElementById('nav-icon2');
    menuMobile = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', function() {
        menuMobile.classList.remove('mobile-menu-hidden');
    });

    menuBtnCloser.addEventListener('click', function() {
        menuMobile.classList.add('mobile-menu-hidden');
    });
}

document.addEventListener("DOMContentLoaded", documentCustomLoad, false);