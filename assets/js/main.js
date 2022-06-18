let logo = document.getElementById('logo');
let stickyLogo = document.getElementById('stickyLogo');

window.addEventListener('scroll', () => {
    let scrollPosition = window.scrollTo;
    if (scrollPosition > 5) {
        stickyLogo.style.display = "none";
        logo.style.display = "block";
        console.log("default");
    }
    else {
        stickyLogo.style.display = "block";
        logo.style.display = "none";
        console.log("sticky");
    }
})
