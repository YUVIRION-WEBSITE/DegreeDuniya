// {{-- JavaScript for Slider Functionality --}}

document.addEventListener("DOMContentLoaded", function () {
    const textSlides = document.querySelectorAll(".text-slide");
    const imageSlides = document.querySelectorAll(".image-slide");
    const controlDots = document.querySelectorAll(".control-dot");
    let currentSlide = 0;
    const totalSlides = textSlides.length;
    let autoPlayInterval;

    function goToSlide(index) {
        const direction = index > currentSlide ? 1 : -1;

        // Hide current slides
        textSlides[currentSlide].style.opacity = "0";
        textSlides[currentSlide].style.transform = "translateY(-50px)";
        textSlides[currentSlide].style.zIndex = "1";
        imageSlides[currentSlide].style.opacity = "0";
        imageSlides[currentSlide].style.transform = `translateY(${
            -100 * direction
        }%)`;
        imageSlides[currentSlide].style.zIndex = "1";
        controlDots[currentSlide].classList.remove("active");
        controlDots[currentSlide].style.background = "transparent";
        controlDots[currentSlide].style.width = "12px";

        // Update current slide
        currentSlide = index;

        // Show new slides
        textSlides[currentSlide].style.opacity = "1";
        textSlides[currentSlide].style.transform = "translateY(0)";
        textSlides[currentSlide].style.zIndex = "2";
        imageSlides[currentSlide].style.opacity = "1";
        imageSlides[currentSlide].style.transform = "translateY(0)";
        imageSlides[currentSlide].style.zIndex = "2";
        controlDots[currentSlide].classList.add("active");
        controlDots[currentSlide].style.background = "#d4af37";
        controlDots[currentSlide].style.width = "40px";
    }

    function nextSlide() {
        const next = (currentSlide + 1) % totalSlides;
        goToSlide(next);
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    // Control dot click handlers
    controlDots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            stopAutoPlay();
            goToSlide(index);
            startAutoPlay();
        });
    });

    // Start autoplay
    startAutoPlay();

    // Pause on hover
    const heroSection = document.querySelector(".hero-section");
    heroSection.addEventListener("mouseenter", stopAutoPlay);
    heroSection.addEventListener("mouseleave", startAutoPlay);

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowUp") {
            stopAutoPlay();
            const prev = (currentSlide - 1 + totalSlides) % totalSlides;
            goToSlide(prev);
            startAutoPlay();
        } else if (e.key === "ArrowDown") {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        }
    });
});

// numeber section js

document.addEventListener("DOMContentLoaded", () => {
    // Counter Animation
    const counters = document.querySelectorAll(".count");
    counters.forEach((counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;
            const increment = target / 100;
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});
