// dynamic navbar background
document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("scroll", function() {
        let navbar = document.getElementById('nav-container');
        var height = document.getElementById('heroes').offsetHeight;
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        list = document.querySelectorAll('[id=nav-text]')
        if(scrollTop >= height-80) {
            navbar.classList.remove('md:animate-fadeout')
            navbar.classList.add('-top-40', 'transition-transform', 'duration-300', 'md:animate-fadein')
        } else {
            navbar.classList.remove('-top-40', 'transition-transform', 'duration-300', 'md:animate-fadein')
            navbar.classList.add('md:animate-fadeout')
        }
    })
}); 