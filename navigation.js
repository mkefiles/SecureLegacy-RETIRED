// NAVIGATION BAR: START
/*
* - Without JavaScript, the bar defaults to "enabled"
* - With JavaScript, the bar disappears on window-load
*/
let menu = document.getElementById("menu");
let hamburger = document.getElementById("hamburger");

window.addEventListener("load", () => {
    menu.classList.add("hidden");
});

hamburger.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});
// NAVIGATION BAR: END