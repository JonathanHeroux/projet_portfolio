<?php

$title = "Log In";

ob_start();

?>

<section class="d-flex flex-column align-items-center justify-content-center m-auto">
    
    <p class="display-6">Please log in.</p>
        <div class="mt-3" style="width:300px">
            <form method="post" action="inscription.php" class="vstack">
                <input type="email" name="email" class=" bg-dark text-white" placeholder="Votre email" required />
                <input type="password" name="password" class=" bg-dark text-white" placeholder="Password" required />
                <a href="?page=home" class="btn btn-neon">Log in</a>
            </form>
        </div>
        <p class="display-6 mt-5 fst-italic">To make comments you have to sign in first</p>
        <div class="mt-3" style="width:300px">
            <form method="post" action="inscription.php" class="vstack">
                <input type="email" name="email" class=" bg-dark text-white" placeholder="Votre email" required />
                <input type="password" name="password" class=" bg-dark text-white" placeholder="Password" required />
                <input type="password" name="password_two" class=" bg-dark text-white" placeholder="Confirm password" required />
                <button type="submit" class="btn btn-neon">Subscribe </button>
            </form>
        </div>
</section>

<?php

$content = ob_get_clean();

require __DIR__ . "/baseView.php";