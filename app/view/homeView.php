<?php

$title = "Home";

ob_start();
?>

<section class="container">
        <div class="row">
            <div class="col-12 col-lg-6  d-flex align-items-center justify-content-center">
                <div class="p-4">
                    <img src="assets/img/photo-pro-dev.jpg" alt="Professional picture of me" class="img-fluid mb-2 rounded animFadeIn" style="--time:4s; max-width: 350px;">
                    <p class="display-6 mb-1 text-green ">
                     <span class="fw-bolder display-3 text-neon-exact animToRight" style="--delay:1.6s;">Fullstack</span>
                     <span class="animToRight" style="--delay:1.7s;">developper <br></span>
                     <span class=" display-4 fst-italic text-neon-exact animToRight" style="--delay:1.8s;">ready</span> 
                     <span class="animToRight" style="--delay:1.9s;">to make <br></span>
                     <span class="animToRight" style="--delay:2s;">your project</span>
                     <span class="fw-bold display-5 text-neon-exact border-bottom border-2 animToRight" style="--delay:2.1s;"> alive </span></p>
                </div>
            </div>
   
            <div class="col-12 col-lg-6 d-flex ">
                <div class="d-flex flex-column align-items-center w-100">
                    <div class=" d-flex flex-column align-items-center gap-4 w-100 flex-grow-1 justify-content-center">
            
                        <a href="?page=projects" id="projectBtn" class=" btn btn-neon fw-bold rounded w-50 animToLeft" style="--delay:0s;"> Projects </a>
                        <a href="?page=articles" id="articleBtn" class=" btn btn-neon fw-bold rounded w-50 animToLeft" style="--delay:0.5s;" > Articles </a>
                        <a href="?page=aboutme" id="aboutMeBtn" class=" btn btn-neon fw-bold rounded w-50 animToLeft text-decoration-none" style="--delay:1s;"> About me </a>
                    </div>

                    <div class="vstack align-items-center justify-content-center cta-wrap w-100">
                        <p class=" fw-lighter fst-italic cta-note fs-5 animToLeft" style="--delay:1.6s;">Where the ideas become reality</p>
                            <button id="contactBtn" class="btn btn-neon fw-bold rounded w-50 animToLeft" style="--delay:2s;" data-bs-toggle="collapse" data-bs-target="#contactPanel" aria-expanded="false" aria-controls="contactPanel"> Contact </button>
                                <div id="contactPanel" class="collapse mt-3 w-100">
                                    <form id="formContact" class="mt-2">
                                        <div class="mt-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control text-white">
                                        </div>
                                        <div class="mt-2">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control text-white">
                                        </div>
                                        <div class="mt-4">
                                            <textarea name="message" id="message" rows="5" cols="50" class="form-control text-white" placeholder="Message"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-neon fw-bold rounded w-25 mt-3">Send</button>
                                        </div>
                                    </form>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    
</section>

<?php

$content = ob_get_clean();
require __DIR__ . '/baseView.php';

?>
