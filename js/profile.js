const delButton = document.querySelector("#del-button");
// const modal = document.querySelector(".modal");
const modal = document.querySelector(".modal-container");
const noButton = document.querySelector("#no");
const page = document.body;
const p = document.querySelector(".review .full-review");
const full = document.querySelectorAll(".full");

delButton.addEventListener('click', toggleModal);

noButton.addEventListener('click', closeModal);


function toggleModal (){
    modal.style.display='flex'
    // page.style.filter='blur(10px) brightness(66%) opacity(82%)'
    page.style.overflow = 'hidden';
}

function closeModal (){
    modal.style.display='none'
    // page.style.filter='blur(0px) brightness(100%) opacity(100%)'
    page.style.overflow = 'auto';
}

full.forEach((elem) => {
    elem.addEventListener('click', () =>{
        elem.parentElement.parentElement.childNodes[1].classList.toggle("full-review");
    });
})