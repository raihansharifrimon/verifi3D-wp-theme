let logo = document.getElementById('logo');
let stickyLogo = document.getElementById('stickyLogo');
let navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    let top =  window.pageYOffset || document.documentElement.scrollTop;
    if (top > 5) {
		navbar.classList.add('sticky');
        stickyLogo.style.display = "block";
        logo.style.display = "none";
    }
    else {		
        navbar.classList.remove('sticky');
        stickyLogo.style.display = "none";
        logo.style.display = "block";
    }
})


//Tab
function opentab(tabName) {
    var i;
    var x = document.getElementsByClassName("tab-content");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}


//Tab Indicator
var x = document.getElementsByClassName("tab-content");
var tabNext = document.getElementById("tabNext");
var tabPrev = document.getElementById("tabPrev");

function tabPrevious() {
    if ($(x[0]).css('display') == "block") {
        x[0].style.display = "none";
        x[1].style.display = "none";
        x[2].style.display = "block";
    } else if ($(x[1]).css('display') == "block") {
        x[0].style.display = "block";
        x[1].style.display = "none";
        x[2].style.display = "none";
    } else {
        x[0].style.display = "none";
        x[1].style.display = "block";
        x[2].style.display = "none";
    }
}
function nextTab() {
    if ($(x[0]).css('display') == "block") {
        x[0].style.display = "none";
        x[1].style.display = "block";
        x[2].style.display = "none";
    } else if ($(x[1]).css('display') == "block") {
        x[0].style.display = "none";
        x[1].style.display = "none";
        x[2].style.display = "block";
    } else {
        x[0].style.display = "block";
        x[1].style.display = "none";
        x[2].style.display = "none";
    }


}