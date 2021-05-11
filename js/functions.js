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

var programsHorizontalSwiper = new Swiper('.main-shows-slider-carousel', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 4,
    spaceBetween: 10,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 2,
        },
        1366: {
            slidesPerView: 3,
        },
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    }
    
});

var allProgramsHorizontalSwiper = new Swiper('.programs-shows-slider-carousel', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 4,
    spaceBetween: 10,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
        1366: {
            slidesPerView: 4,
        },
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    }
    
});