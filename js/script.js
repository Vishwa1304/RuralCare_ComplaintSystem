// Example: Confirm before logout
document.addEventListener('DOMContentLoaded', function() {
    const logoutLinks = document.querySelectorAll('a.nav-link[href="#"]');

    logoutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm("Are you sure you want to logout?")) {
                // Redirect to logout.php when implemented
                window.location.href = 'logout.php';
            }
        });
    });
});

// Optional: Smooth scroll for anchors
document.querySelectorAll('a.nav-link').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if(target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});
