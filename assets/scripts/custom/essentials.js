/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */

/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

(function ($) {
	//==================================================================================
	// General Variables & Presets
	//==================================================================================
	var $vpWidth = $(window).width();
	var $root = $('html');
	var isTouch = 'ontouchstart' in document.documentElement;

	//==================================================================================
	// Functions
	//==================================================================================

	function setTouchAttribute() {
		if (isTouch) {
			$root.attr('data-touch','true');
		} else {
			$root.attr('data-touch','false');
		}
	}

	function toggleNavbar() {
		$('.burger').click(function () {
			$(this).toggleClass('active');
			$('.navbar-collapse').toggleClass('active');
			return false;
		});
	}

	function setBlockServiceClass() {
		$('.block__service').each(function (index) {
			if (index % 2 === 1) {
				$(this).addClass('right');
				$(this).find('.card__title').addClass('right');
			}
		});
	}

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

	$(".sliderBenefits__list").owlCarousel({
        margin: 15,
        loop: true,
        dots: false,
        autoplay: false,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        items: 1,
        nav: true,
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
        onInitialized: function (event) {
            const $carousel = $(event?.target);
            initializeCarouselA11y($carousel); // Call initialization function
        },
        onTranslated: function (event) {
            const $carousel = $(event?.target);
            updateCarouselA11y($carousel); // Call update function
        },
    });
	$(".statsSlider__list").owlCarousel({
        margin: 15,
        loop: true,
        dots: false,
        autoplay: false,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        items: 4,
        nav: true,
        navigation: true,
        autoWidth: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
        },
		onInitialized: function (event) {
		const $carousel = $(event?.target);
            initializeCarouselA11y($carousel); // Call initialization function
        },
		onTranslated: function (event) {
			const $carousel = $(event?.target);
            updateCarouselA11y($carousel); // Call update function
        },
    });
	$(".testimonial__list").owlCarousel({
        margin: 15,
        loop: true,
        dots: false,
        autoplay: false,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        items: 1,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
        onInitialized: function (event) {
            const $carousel = $(event?.target);
            initializeCarouselA11y($carousel); // Call initialization function
        },
        onTranslated: function (event) {
            const $carousel = $(event?.target);
            updateCarouselA11y($carousel); // Call update function
        },
    });
	}

	function initializeCarouselA11y($carousel) {
        // ARIA attributes for the carousel container
        $carousel.attr({
            role: "region",
            "aria-label":
			 $carousel.closest('.statsSlider').find('.statsSlider__title').text(),
            tabindex: "0",
        });

        updateAriaLive($carousel, getCurrentSlideText($carousel));

		$carousel.find(".owl-item").each(function (index) {
			 const title = $(this).find(".statsSlider__item__title").text();
             const description = $(this).find(".statsSlider__item__desc").text();
            const ariaLabel = `Slide ${index + 1} - ${title} ${description}`; // Template literal for cleaner string concatenation
             $(this).attr("aria-label", ariaLabel.replace(/\n/g, " ").trim());
        });

		$carousel.find(".owl-prev").attr({
			role: "button",
			"aria-label": "Previous Slide"
		});

        $carousel.find(".owl-next").attr({ role: "button", "aria-label": "Next Slide" });

        // Keyboard navigation
        $carousel.on("keydown", function (e) {
            handleCarouselKeydown($carousel, e);
        });

        updateAriaAttributes($carousel); // Initial update
    }

    function updateCarouselA11y($carousel) {
        updateAriaAttributes($carousel);
        updateAriaLive($carousel, getCurrentSlideText($carousel));
    }

    function handleCarouselKeydown($carousel, e) {
        let $focusedElement = $(document.activeElement);
        let singleOwl = $carousel.data("owl.carousel");
        let type = e.which === 39 ? "next" : null;
        type = e.which === 37 ? "prev" : type;

        if ($focusedElement.is($carousel) || $focusedElement.closest(".owl-nav").length) {
            e.preventDefault();
            if (type === "next") {
                singleOwl.next();
            } else if (type === "prev") {
                singleOwl.prev();
            }
        }
    }

    function updateAriaAttributes($carousel) {
        $carousel.find(".owl-item").attr("aria-hidden", "true");
        $carousel.find(".owl-item.active").removeAttr("aria-hidden");
    }

    function getCurrentSlideText($carousel) {
        const activeItems = $carousel.find(".owl-item.active .statsSlider__item"); // Get all active items
        let slideText = "";
        activeItems.each(function () {
            // Iterate through active items
            slideText += $(this).find(".statsSlider__item__title").text() + " " + $(this).find(".statsSlider__item__desc p").text() + ". ";
        });
        return slideText;
    }

    function updateAriaLive($carousel, text) {
        let $ariaLiveRegion = $carousel.find('[aria-live="polite"]');
        if (!$ariaLiveRegion.length) {
            $ariaLiveRegion = $('<div aria-live="polite" class="visually-hidden"></div>').appendTo($carousel);
        }
        $ariaLiveRegion.text(text);
    }

	function updateArticleListItems() {
		$('.article__list li').each(function () {
			$(this).removeClass('nav-item').addClass('article__item');
		});
	}

	function updateArticleImages() {
		$('.article__item .wp-block-latest-posts__featured-image').each(function () {
			$(this).removeClass('wp-block-latest-posts__featured-image').addClass('article__image');
		});
	}

	function wrapArticleTitle() {
		$('.article__item .wp-block-latest-posts__post-title').each(function () {
			$(this).wrap('<div class="article__body"><h2></h2></div>');
		});
	}

	function addCategoryLinks() {
		var url = window.location.href.split('/');
		url = url[0] + '//' + url[2] + '/';

		$('.sidebar-pro .article__item .article__body h2').each(function () {
			$(this).before('<h6><a href="' + url + 'category/professionnel">• Professionnel</a></h6>');
		});

		$('.sidebar-part .article__item .article__body h2').each(function () {
			$(this).before('<h6><a href="' + url + 'category/particulier">• Particulier</a></h6>');
		});

		$('.sidebar-pro .article__list').after('<a href="' + url + 'category/professionnel" class="btn btn__orange blue dark text-uppercase mb-3">Tous les articles</a>');
		$('.sidebar-part .article__list').after('<a href="' + url + 'category/particulier" class="btn btn__orange blue text-uppercase mb-3">Tous les articles</a>');
	}

	// Find every link with the class "wp-block-button__link wp-element-button" and replace it by a link with the class "btn btn__outlined"
	$('.wp-block-button__link.wp-element-button').each(function () {
		$(this).removeClass('wp-block-button__link wp-element-button').addClass('btn btn__orange blue');
	});
	$('.wp-block-file__button').each(function () {
		$(this).removeClass('wp-block-file__button wp-element-button').addClass('btn btn__orange blue');
	});

	// if ($(".wpml-ls-item")) {
	// 	// const lsItem = document.querySelector(".wpml-ls-item");
	// 	// const navLink = document.querySelector(".wpml-ls-item .nav-link");
	// 	const langSwitcherText = document.querySelector(".wpml-ls-item .wpml-ls-native");

	// 	// only keep the 2 first letters of the language
	// 	const text = langSwitcherText.innerText.slice(0,2);
	// 	langSwitcherText.innerText = text;

	// 	// move it right after the button btn__primary on mobile
	// 	// $(lsItem).insertAfter("#headerCta");
	// 	// $(".wpml-ls-item .dropdown-menu").insertAfter("#headerCta");

    // }

	//==================================================================================
	// Initialization
	//==================================================================================
	$(document).ready(function () {
		setTouchAttribute();
		toggleNavbar();
		setBlockServiceClass();
		initializeOwlCarousel();
		updateArticleListItems();
		updateArticleImages();
		wrapArticleTitle();
		addCategoryLinks();
	});

})(jQuery);
