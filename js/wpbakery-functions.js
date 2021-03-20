var mainNewsBarSwiper = new Swiper('.main-bar-swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 4,
    spaceBetween: 10,
    /*
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    */
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
    }
});

var mainNewsDestSwiper = new Swiper('.main-bar-dest-news-swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    /*
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    */
});