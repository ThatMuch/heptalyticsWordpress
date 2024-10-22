document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

    const cards = document.querySelectorAll(".pinnedSections__item");

    const animation = gsap.timeline();
    let cardHeight;
    function initCards() {
        animation.clear();
        cardHeight = cards[0].offsetHeight;
        cards.forEach((card, index) => {
            if (index > 0) {
                gsap.set(card, { y: index * cardHeight });
                animation.to(card, { y: 0, duration: index * 0.5, ease: "none" }, 0);
            }
        });
    }

    initCards();

    ScrollTrigger.create({
        trigger: ".pinnedSections__wrapper",
		//start: "top+=70px top",
		start: "top top",
        pin: true,
        pinSpacing: true,
        end: () => `+=${cards.length * cardHeight}`,
        scrub: true,
        animation: animation,
        // markers: true,
        ease: "none",
        invalidateOnRefresh: true,
    });

    ScrollTrigger.addEventListener("refreshInit", initCards);
});

