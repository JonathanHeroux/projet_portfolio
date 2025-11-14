<?php
$title = "Projects";

ob_start();


?>
<section class="container">
    <div id="projectCarousel" class="carousel slide">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex flex-column align-items-center">
                    <img src="assets/img/imgPendu.png" class="d-block w-50 mb-3" alt="Save the Hangman project">
                    <p class=" display-5 fw-bold"> Save The Hangman</p>
                    <p class=" text-center fs-4 fst-italic"> A new kind of hangman game — fully responsive, animated, and multi-language.</p>
                    <button class="btn btn-neon mt-2 view-project-btn" data-url="https://pendu.jonathanheroux.com/">View here</button>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex flex-column align-items-center">
                    <img src="assets/img/favicon.png" class="d-block w-50 mb-3" alt="Work in progress">
                    <p class=" display-5 fw-bold"> New project</p>
                    <p class=" text-center fs-4 fst-italic">Coming soon!</p>
                    <button class="btn btn-neon mt-2 view-project-btn" data-url="">View here</button>
                </div>
            </div>

            <button class="carousel-control-prev hide-project-view" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                <span class=" carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden ">Previous</span>
            </button>

            <button class="carousel-control-next hide-project-view" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                <span class=" carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden ">Next</span>
            </button>
</section>

<section id="projectPreview" class="container my-7 text-center d-none">
            <!-- <p class="display-2 mb-3">Project preview</p>
            <p class="display-6">Select a project above to see it here without leaving the portfolio</p> -->

        <div class="project-frame-wrapper">
            <iframe id="projectFrame" src="" title="Project preview" loading="lazy" style="border:0;" allowfullscreen></iframe>
        </div>
        </div>

        
</section>

<?php
$content = ob_get_clean();
require __dir__ .'/baseView.php';
?>