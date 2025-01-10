document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("opacity-100", "translate-y-0");
                entry.target.classList.remove("opacity-0", "translate-y-5");
                observer.unobserve(entry.target);
            }
        });
    });

    document.querySelectorAll(".scroll-animate").forEach((el) => observer.observe(el));
});