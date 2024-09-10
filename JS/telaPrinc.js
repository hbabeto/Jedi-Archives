document.addEventListener("DOMContentLoaded", () => {
    const profileIcon = document.querySelector('.profile-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    profileIcon.addEventListener('mouseover', () => {
        dropdownMenu.style.display = 'block';
    });

    profileIcon.addEventListener('mouseout', () => {
        setTimeout(() => {
            if (!dropdownMenu.matches(':hover')) {
                dropdownMenu.style.display = 'none';
            }
        }, 300);
    });

    dropdownMenu.addEventListener('mouseleave', () => {
        dropdownMenu.style.display = 'none';
    });

    const nav = document.querySelector('nav ul');
    const toggleMenu = document.createElement('div');
    toggleMenu.classList.add('toggle-menu');
    toggleMenu.innerHTML = '&#9776;';

    document.querySelector('header').insertBefore(toggleMenu, nav);

    toggleMenu.addEventListener('click', () => {
        nav.classList.toggle('active');
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const posters = document.querySelectorAll(".movie-poster");

    posters.forEach(poster => {
        poster.addEventListener("click", function() {
            this.classList.toggle("move-right");
        });
    });
});
