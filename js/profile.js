const delButton = document.querySelector("#del-button");
const modal = document.querySelector(".modal");
const noButton = document.querySelector("#no");
const page = document.querySelector(".page");
const p = document.querySelector(".review .full-review");
const full = document.querySelector(".full");

delButton.addEventListener('click', toggleModal);

noButton.addEventListener('click', closeModal);

full.addEventListener('click', fullReview);

function toggleModal (){

    modal.style.position='absolute'
    modal.style.display='flex'
    modal.style.left='19%'
    modal.style.top='40%'
    page.style.filter='blur(10px) brightness(66%) opacity(82%)'
}

function closeModal (){
    modal.style.display='none'
    page.style.filter='blur(0px) brightness(100%) opacity(100%)'
}

function fullReview (){
    if(document.querySelector(".full-review")){
        p.classList.remove("full-review")
    }
    else{
        p.classList.add("full-review")
    }
    
}