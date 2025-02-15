// let toggleBtn = function (firstEle, secondEle, classActive) {
//     firstEle.addEventListener("click", function () {
//         firstEle.classList.toggle(classActive);
//         secondEle.classList.toggle(classActive);
//     });
//     secondEle.addEventListener("click", function () {
//         secondEle.classList.toggle(classActive);
//         firstEle.classList.toggle(classActive);
//     });
// };
////////////////////////
// main functions /////
//////////////////////

let toggleElement = function (ele, className) {
    ele.classList.toggle(className);
};
let removeElemment = function (ele, className) {
    ele.classList.remove(className);
};
let addElement = function (ele, className) {
    ele.classList.add(className);
};

sal({
    rootMargin: "0% 50%",
    threshold: 0.2, // 50%
    animateClassName: "sal-animate",
    disabledClassName: "sal-disabled",
    selector: "[data-sal]",
    once: true, // run only once
    disabled: false,
    enterEventName: "sal:in",
    exitEventName: "sal:out",
});
//[04- testimonials}
var swiper = new Swiper(".realSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 600,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 5000,
    },
    breakpoints: {
        // when window width is >= 320px

        // when window width is >= 480px
        0: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        // when window width is >= 640px
        750: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1400: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});

/////////////////////////////////////
///// start navbar /////////////////
///////////////////////////////////
// [01- dark and light ]
// generate random number from 1 to 4
// let randomNum = Math.floor(Math.random() * 4) + 1;

// let mobileImg = document.querySelector(".mobileImage img");
// mobileImg.setAttribute("src", `${ASSET_URL}/imgs/habashy${randomNum}.webp`);

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

//[04- testimonials}
var swiper = new Swiper(".realSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 600,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 5000,
    },
    breakpoints: {
        // when window width is >= 320px

        // when window width is >= 480px
        0: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        // when window width is >= 640px
        750: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1400: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});

// First Box Logic
const svg1 = document.querySelector(".firstBoxs svg");
const cube0 = document.getElementById("cube0");

// Clone cubes for first box
for (let i = 1; i < 11; i++) {
    const newCube = cube0.cloneNode(true);
    newCube.id = `cube${i}`;
    svg1.appendChild(newCube);
}

// Divide cubes into two blocks for first box
const cubes1 = ["cube7", "cube8", "cube9", "cube10"];
for (const cubeId of cubes1) {
    document.getElementById(cubeId).classList.replace("block1", "block2");
}

// GSAP Timeline for first box
var tla1 = gsap.timeline({});
tla1.set("#cube0", { x: 150, y: 78 });
tla1.set("#cube1", { x: 150, y: 54 });
tla1.set("#cube2", { x: 150, y: 30 });
tla1.set("#cube3", { x: 171, y: 90 });
tla1.set("#cube4", { x: 129, y: 90 });
tla1.set("#cube5", { x: 129, y: 66 });
tla1.set("#cube6", { x: 129, y: 66 });
tla1.set("#cube7", { x: 50, y: 78 });
tla1.set("#cube8", { x: 50, y: 54 });
tla1.set("#cube9", { x: 71, y: 90 });
tla1.set("#cube10", { x: 29, y: 90 });
tla1.to("svg", { opacity: 1 });

// Generate Tetris shapes for first box
var tl1 = gsap.timeline({ repeat: -1, repeatRefresh: true, duration: 0.3 });
tl1.to("html", {
    "--colorMain": "random([0, 45, 90, 135, 180, 225, 270, 315])",
    delay: 3,
});
tl1.to("#cube2", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube3", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube4", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube5", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube6", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube8", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube9", { opacity: "random(0, 1, 1)" }, "<");
tl1.to("#cube10", { opacity: "random(0, 1, 1)" }, "<");

// Second Box Logic
const svg2 = document.querySelector(".secondBoxs svg");
const cube0_2 = document.getElementById("cube0").cloneNode(true);
cube0_2.id = "cube0_2";

// Clone cubes for second box
for (let i = 1; i < 11; i++) {
    const newCube = cube0_2.cloneNode(true);
    newCube.id = `cube${i}_2`;
    svg2.appendChild(newCube);
}

// Divide cubes into two blocks for second box
const cubes2 = ["cube7_2", "cube8_2", "cube9_2", "cube10_2"];
for (const cubeId of cubes2) {
    document.getElementById(cubeId).classList.replace("block1", "block2");
}

// GSAP Timeline for second box
var tla2 = gsap.timeline({});
tla2.set("#cube0_2", { x: 150, y: 78 });
tla2.set("#cube1_2", { x: 150, y: 54 });
tla2.set("#cube2_2", { x: 150, y: 30 });
tla2.set("#cube3_2", { x: 171, y: 90 });
tla2.set("#cube4_2", { x: 129, y: 90 });
tla2.set("#cube5_2", { x: 129, y: 66 });
tla2.set("#cube6_2", { x: 129, y: 66 });
tla2.set("#cube7_2", { x: 50, y: 78 });
tla2.set("#cube8_2", { x: 50, y: 54 });
tla2.set("#cube9_2", { x: 71, y: 90 });
tla2.set("#cube10_2", { x: 29, y: 90 });
tla2.to("svg", { opacity: 1 });

// Generate Tetris shapes for second box
var tl2 = gsap.timeline({ repeat: -1, repeatRefresh: true, duration: 0.3 });
tl2.to("html", {
    "--colorMain": "random([0, 45, 90, 135, 180, 225, 270, 315])",
    delay: 3,
});
tl2.to("#cube2_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube3_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube4_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube5_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube6_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube8_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube9_2", { opacity: "random(0, 1, 1)" }, "<");
tl2.to("#cube10_2", { opacity: "random(0, 1, 1)" }, "<");
