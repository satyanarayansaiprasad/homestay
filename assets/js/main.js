document.addEventListener('DOMContentLoaded', function() {
    console.log('MyHomestayMP - Script Loaded');
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Simple sticky header adjustment
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.padding = '0.5rem 0';
            navbar.classList.add('shadow-sm');
        } else {
            navbar.style.padding = '1rem 0';
            navbar.classList.remove('shadow-sm');
        }
    });
});
