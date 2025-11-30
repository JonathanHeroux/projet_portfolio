document.addEventListener('DOMContentLoaded', function(){
    let projectFrame = document.getElementById('projectFrame');
    let previewSection = document.getElementById('projectPreview');
    let viewButtons = document.querySelectorAll('.view-project-btn');
    let carouselInit = document.getElementById('projectCarousel');
    let projectCarousel = null;

    if(carouselInit){
    projectCarousel = new bootstrap.Carousel(carouselInit,{
        interval: 8000,
        ride: 'carousel',
        pause:false
        });
    }
    viewButtons.forEach(function(btn){
        btn.addEventListener('click',function(){
            let url = this.dataset.url;

            if(!url) return;

            if(projectCarousel){
                projectCarousel.pause();
            }
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

    let alerts = document.querySelectorAll('.floating-alert');

    alerts.forEach(alert => {
        document.getElementById('alerts-container').appendChild(alert);

        alert.addEventListener('click', () => {
        if (alert.dataset.closing) 
        return;       
        alert.dataset.closing = 'true';
        alert.classList.add('animFadeOut');
        
        let duration = parseFloat(getComputedStyle(alert).animationDuration) * 1000;
        setTimeout(() => alert.remove(), duration);
    });

        setTimeout(() => {
            alert.classList.add('animFadeOut');
                    let duration = parseFloat(getComputedStyle(alert).animationDuration) * 1000;

            setTimeout(() => alert.remove(), duration);
        }, 1500);
    });

    //ChatGPT  no more alert on refresh
    const url = new URL(window.location.href);
    let changed = false;

    ['success', 'deleted', 'updated'].forEach(param => {
        if (url.searchParams.has(param)) {
            url.searchParams.delete(param);
            changed = true;
        }
    });

    if (changed) {
        window.history.replaceState({}, '', url);
    }
});


