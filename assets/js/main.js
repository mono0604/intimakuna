const slides = document.querySelectorAll('.slide');
const next = document.querySelector('.next');
const prev = document.querySelector('.prev');

let index = 0;

/* MOSTRAR SLIDE */

function showSlide(i){

    slides.forEach(slide => {
        slide.classList.remove('active');
    });

    slides[i].classList.add('active');
}

/* SIGUIENTE */

function nextSlide(){

    index++;

    if(index >= slides.length){
        index = 0;
    }

    showSlide(index);
}

/* ANTERIOR */

function prevSlide(){

    index--;

    if(index < 0){
        index = slides.length - 1;
    }

    showSlide(index);
}

/* BOTONES */

next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);

/* AUTOMATICO */

setInterval(nextSlide, 3600);