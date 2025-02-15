////////////////////////
// main functions /////
//////////////////////
let toggleElement = function (ele, className) {
    ele.classList.toggle(className);
};

/////////////////////////////////////
///// start navbar /////////////////
///////////////////////////////////
// [01- dark and light ]

let funChangeImagesDark = function () {
    // let headerImage = document.querySelector(".header");
    // if (document.documentElement.classList.contains("dark")) {
    //     headerImage.setAttribute(
    //         "style",
    //         "background: url("+ ASSET_URL + "/imgs/lecture_banner_dark.png) no-repeat; background-size:cover;"
    //     );
    // } else {
    //     headerImage.setAttribute(
    //         "style",
    //         "background: url("+ ASSET_URL + "/imgs/lecture_banner.png) no-repeat; background-size:cover;"
    //     );
    // }
};
// let funChangeImagesDark = function () {
//     let headerImage = document.querySelector(".header");
//     if (document.documentElement.classList.contains("dark")) {
//         if(window.innerWidth <= 765){
//             headerImage.setAttribute("style", "background: url("+ ASSET_URL + "/imgs/mob_banner_dark.png) no-repeat;");
//         }else{
//             headerImage.setAttribute("style", "background: url("+ ASSET_URL + "/imgs/lecture_banner_dark.png) no-repeat;");
//         }
//     } else {
//         if(window.innerWidth <= 765){
//             headerImage.setAttribute("style", "background: url("+ ASSET_URL + "/imgs/mob_banner.png) no-repeat;");
//         }else{
//             headerImage.setAttribute("style", "background: url("+ ASSET_URL + "/imgs/lecture_banner.png) no-repeat;");
//         }
//     }
// };

let addStyleToLocaleStorage = function () {
    if (localStorage.getItem("style") === null) {
        localStorage.setItem("style", "dark");
    } else {
        localStorage.removeItem("style");
    }
};

let addDarkClassToHtml = function () {
    if (localStorage.getItem("style") === null) {
        document.documentElement.classList.remove("dark");
    } else {
        document.documentElement.classList.add(localStorage.getItem("style"));
    }
};
let updateUI = function () {
    addStyleToLocaleStorage();
    addDarkClassToHtml();
    // funChangeImagesDark();
};
// addDarkClassToHtml();
let sun = document.querySelector(".sunMoon");
// let moon = document.querySelector(".sunMoon");
sun.addEventListener("click", updateUI);
// moon.addEventListener("click", updateUI);
// [02 - toggle menu]
let toggleBarBtn = document.querySelector(".toggleBarBtn");
let bigLeft = document.querySelector(".bigLeft");

toggleBarBtn.addEventListener("click", function () {
    toggleElement(bigLeft, "activeNavMenu");
});

//[03- progress nav]
let navBar = document.querySelector(".myNav");
let progNav = document.querySelector(".navProgChild");
let navProgFunction = function () {
    let { scrollTop, scrollHeight } = document.documentElement;
    let myWidth = (scrollTop / (scrollHeight - window.innerHeight)) * 100;

    progNav.style.width = `${myWidth}%`;
};
navProgFunction();
window.addEventListener("scroll", navProgFunction);
sal({
    rootMargin: "0% 50%",
    threshold: 0.3, // 50%
    animateClassName: "sal-animate",
    disabledClassName: "sal-disabled",
    selector: "[data-sal]",
    once: true, // run only once
    disabled: false,
    enterEventName: "sal:in",
    exitEventName: "sal:out",
});
