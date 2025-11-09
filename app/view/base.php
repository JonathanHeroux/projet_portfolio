<?php
date_default_timezone_set('America/Toronto');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="32x32"/>
    
    <title>Jonathan Heroux - <?=$title ?></title>
</head>
<body class=" body-bg d-flex flex-column min-vh-100">
    <header class="sticky-top">
            <nav class="navbar navbar-dark navbar-expand-md animFadeIn">
                <div class="container">
                    <div class="navbar-brand"> 
                        <a href="?page=home" class="navbar-brand text-decoration-none fs-2">Jonathan Heroux</a>
                    </div>
                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navShort">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navShort">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="?page=home" class="nav-link ">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=contact" class="nav-link">Contact</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
    </header>

    <div class="mt-5">
    <section class="container text-light">
    <?= $content ?>
    </section>
    </div>

 
    <footer class="mt-auto">
    <div class="container text-center d-flex justify-content-end animFadeIn">
        <p class="text-white mb-0">
            <?php echo date('Y')?> © Copyright Jonathan Heroux        </p>
    </div>
    </footer> 
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script> 

</body>
</html>
