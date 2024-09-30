function initializeOwlCarousel() {
	$(".sliderServices__list").owlCarousel({
        margin: 15,
        loop: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
		items: 1,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 1,
            },
        },
    });
}
