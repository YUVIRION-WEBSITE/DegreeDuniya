// Scroll Reveal Animation
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add("active");
            }, index * 150);
        }
    });
}, observerOptions);

document.querySelectorAll(".scroll-reveal").forEach((el) => {
    observer.observe(el);
});

// Form Submission Handler
document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // Get form values
    const firstName = document.getElementById("firstName").value;
    const lastName = document.getElementById("lastName").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const service = document.getElementById("service").value;
    const message = document.getElementById("message").value;

    // Simple validation
    if (!firstName || !lastName || !email || !phone || !message) {
        alert("Please fill in all required fields");
        return;
    }

    // Simulate form submission
    alert(
        `Thank you ${firstName}! We've received your message and will get back to you soon.`
    );

    // Reset form
    this.reset();
});

// Enhanced parallax effect on scroll
let ticking = false;

window.addEventListener("scroll", () => {
    if (!ticking) {
        window.requestAnimationFrame(() => {
            const scrolled = window.pageYOffset;
            const parallaxBg = document.querySelector(".parallax-bg");

            if (parallaxBg) {
                parallaxBg.style.transform = `translateY(${scrolled * 0.5}px)`;
            }

            ticking = false;
        });

        ticking = true;
    }
});
