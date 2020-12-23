const p = document.querySelector(".review .full-review");
const full = document.querySelectorAll(".full");

full.forEach((elem) => {
    elem.addEventListener('click', () =>{
        elem.parentElement.parentElement.childNodes[1].classList.toggle("full-review");
    });
})
