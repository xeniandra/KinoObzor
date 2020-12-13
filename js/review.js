const p = document.querySelector(".review .full-review");
const full = document.querySelector(".full");


full.addEventListener('click', fullReview);


function fullReview (){
    if(document.querySelector(".full-review")){
        p.classList.remove("full-review")
    }
    else{
        p.classList.add("full-review")
    }
    
}