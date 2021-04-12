var mainNewsBarSwiper = new Swiper('.main-bar-swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 3,
    spaceBetween: 10,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
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
            slidesPerView: 2,
        },
    }
});

var mainNewsDestSwiper = new Swiper('.main-bar-dest-news-swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    }
});

var mainNewsDestSwiper = new Swiper('.vertical-swiper-container', {
    direction: 'vertical',
    loop: true,
    slidesPerView: 2,
    spaceBetween: 10,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    }
});

var podcastSwiper = new Swiper('.podcast-swiper-container', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 5,
    spaceBetween: 20,
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