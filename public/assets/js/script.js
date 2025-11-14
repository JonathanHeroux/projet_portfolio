document.addEventListener('DOMContentLoaded', function(){
    let projectFrame = document.getElementById('projectFrame');
    let previewSection = document.getElementById('projectPreview');
    let viewButtons = document.querySelectorAll('.view-project-btn');
    let carouselInit = document.getElementById('projectCarousel');
    
    let projectCarousel = new bootstrap.Carousel(carouselInit,{
        interval: 8000,
        ride: 'carousel',
        pause:false
    });

    viewButtons.forEach(function(btn){
        btn.addEventListener('click',function(){
            let url = this.dataset.url;

            if(!url) return;

            projectCarousel.pause();

            previewSection.classList.remove('d-none');

            projectFrame.style.display = 'block';

            projectFrame.src = url;

            previewSection.scrollIntoView({ behavior: 'smooth'});
        });
    });

    let swapButtons = document.querySelectorAll('.hide-project-view');

    swapButtons.forEach(function(btn){

        btn.addEventListener('click', function(){
            projectFrame.src="";
            projectFrame.style.display = 'none';
            
        });
    });
});

