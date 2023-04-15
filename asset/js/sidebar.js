
function screenResponsive(screen) {
    const sidebarTitle = document.getElementsByClassName("sidebarTitle");
    const sidebarlenght = sidebarTitle.length;
    if (screen.matches) {
        for (let i = 0; i < sidebarlenght; i++) {
            sidebarTitle[i].setAttribute("hidden", '')
        }
    }
}
var screenx = window.matchMedia('(max-width: 600px)');
screenResponsive(screenx);
screenx.addListener(screenResponsive)