document.addEventListener("DOMContentLoaded", () => {
    var lastScrollTop = 0;
    window.addEventListener("scroll", () => {
        const menu = document.getElementById("Menü");
        var currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
        let scrollY = currentScrollTop; 

        if(scrollY > 90) {
            menu.style.opacity = 0;
        }
        if (currentScrollTop < lastScrollTop) {
            menu.style.opacity = 1;
        }
        
        lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop; 
    });
    
});

