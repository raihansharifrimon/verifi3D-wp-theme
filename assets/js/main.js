const mainMenu = document.getElementById('primary-menu');
const mobileMenutoggler = document.getElementById('mobileMenutoggler');

mobileMenutoggler.addEventListener('click', () => {
    mainMenu.classList.toggle('open-moblie-menu')

    setTimeout(() => {
        mainMenu.classList.toggle('moblie-show-menu')
    }, 200);
    console.log(mainMenu);
})
