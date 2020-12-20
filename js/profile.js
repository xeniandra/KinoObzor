const delButton = document.querySelector("#del-button");
// const modal = document.querySelector(".modal");
const modal = document.querySelector(".modal-container");
const noButton = document.querySelector("#no");
const page = document.body;
const p = document.querySelector(".review .full-review");
const full = document.querySelector(".full");

delButton.addEventListener('click', toggleModal);

noButton.addEventListener('click', closeModal);

full.addEventListener('click', fullReview);

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

function fullReview (){
    if(document.querySelector(".full-review")){
        p.classList.remove("full-review")
    }
    else{
        p.classList.add("full-review")
    }
    
}