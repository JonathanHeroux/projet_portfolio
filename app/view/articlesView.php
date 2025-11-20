<?php
$title = "Aticles";

ob_start();


?>

<section class="container">
<p class="fs-2 fw-bold">Welcome to my articles!</p>

<div class="row g-4">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-white">
            <img src="assets/img/favicon.png" class="card-img-top" alt="Image work in progress">
            <div class="card-header">New articles</div>
                <div class="card-body">
                    <p class="card-text"></p>
                    <h5 class="card-title mt-2">Coming soon!</h5>
                </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-white">
            <img src="assets/img/favicon.png" class="card-img-top" alt="Image work in progress">
            <div class="card-header">New articles</div>
                <div class="card-body">
                    <p class="card-text"></p>
                    <h5 class="card-title mt-2">Coming soon!</h5>
                </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-white">
            <img src="assets/img/favicon.png" class="card-img-top" alt="Image work in progress">
            <div class="card-header">New articles</div>
                <div class="card-body">
                    <p class="card-text"></p>
                    <h5 class="card-title mt-2">Coming soon!</h5>
                </div>
        </div>
    </div>
</div>
</section>

<?php
$content = ob_get_clean();
require __dir__ .'/baseView.php';
?>