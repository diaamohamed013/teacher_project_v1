(function ()
{
    let addDarkClassToHtml2 = function() {
        // localStorage.removeItem("style");
        if (localStorage.getItem("style") === null) {
            document.documentElement.classList.remove("dark");
        } else {
            document.documentElement.classList.add(localStorage.getItem("style"));
        }
    };
    addDarkClassToHtml2()


    APP_URL = window.location.origin;
    ASSET_URL = "/home"

    function progressBar() {
        let navProgChild = document.querySelector(".navProgChild");
        navProgChild.style.width = `${(window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100}%`;
    }
    window.addEventListener("scroll", progressBar)

}());


const darkModeSwitch = document.querySelector('.theme-switch__checkbox');

let addStyleToLocaleStorage2 = function() {
    if (!localStorage.getItem("style")) {
        localStorage.setItem("style", "dark");
    } else {
        localStorage.removeItem("style");
    }
};

darkModeSwitch.addEventListener('change', () => {
    if (darkModeSwitch.checked) {
        document.documentElement.classList.add('dark');
    } else {
        console.log("in");
        document.documentElement.classList.remove('dark');
    }
    addStyleToLocaleStorage2();
});
darkModeSwitch.checked = localStorage.getItem("style") === "dark";

