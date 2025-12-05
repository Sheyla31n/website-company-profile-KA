const layers = document.querySelectorAll(".layer");
window.addEventListener("scroll", () => {
  const scrollValue = window.scrollY;

  layers.forEach((layer, index) => {
    const speed = (index + 1) * 15;
    layer.style.transform = `translateY(${scrollValue / speed}px)`;
  });
});

let lastScrollTop = 0;
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", function () {
    let currentScroll = window.scrollY;

    // scroll down → sembunyikan navbar
    if (currentScroll > lastScrollTop) {
        navbar.classList.add("hidden");
    } 
    // scroll up → tampilkan navbar
    else {
        navbar.classList.remove("hidden");
    }

    lastScrollTop = currentScroll;
});
