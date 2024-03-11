AOS.init();

    $(".owl-carousel").owlCarousel({
        nav: true,
        loop: true,
        margin: 10,
        dots: false,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });
