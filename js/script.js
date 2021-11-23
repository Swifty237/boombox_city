
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */

let prevScrollpos = window.pageYOffset;

window.addEventListener("scroll", () => {

    let currentScrollPos = window.pageYOffset;

        if (prevScrollpos > currentScrollPos) { 

            document.querySelector(".navigation").style.top = 0;
        } 

        else {

            document.querySelector(".navigation").style.top = "-50em";
        }

        prevScrollpos = currentScrollPos;
})

const ratio = .5;
const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}

const handleIntersect = function (entries, observer) {

    entries.forEach(function (entry) {
        
        if (entry.intersectionRatio > ratio) {

            entry.target.classList.add("footbar-visible");
            observer.unobserve(entry.target);
        }
    })
}

const observer = new IntersectionObserver(handleIntersect, options);

observer.observe(document.getElementById("footbar"));