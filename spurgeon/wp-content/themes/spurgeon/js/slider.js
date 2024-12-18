document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.swiper-container', {
        loop: false,
        autoplay: {
            delay: 5000, // 5 seconds per slide
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            
        },
    });
});