const menuToggle = document.querySelector('.menu-toggle');
const mainNav = document.querySelector('.main-nav');
const navLinks = document.querySelectorAll('.main-nav a');

function closeMenu() {
    mainNav.classList.remove('is-open');
    menuToggle.classList.remove('is-open');

    menuToggle.setAttribute('aria-expanded', 'false');
    menuToggle.setAttribute('aria-label', 'Open navigation menu');
}

menuToggle.addEventListener('click', () => {
    const isOpen = mainNav.classList.contains('is-open');
    
    if (isOpen) {
        closeMenu();
    } else {
        mainNav.classList.add('is-open');
        menuToggle.classList.add('is-open');

        menuToggle.setAttribute('aria-expanded', 'true');
        menuToggle.setAttribute('aria-label', 'Close navigation menu');
    }
});

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        closeMenu();
    });
});

window.addEventListener('resize', () => {
    if (window.innerWidth >= 769) {
        closeMenu();
    }
});