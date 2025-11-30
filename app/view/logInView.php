<?php

$title = "Log In";

ob_start();

?>

<section class="d-flex flex-column align-items-center justify-content-center m-auto">

    <?php if (isset($_GET['error']) && isset($_GET['message'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
    <?php elseif (isset($_GET['success'])): ?>
        <div class="alert alert-success">
            You are now registered. You can log in.
        </div>
    <?php endif; ?>
    
    <p class="display-6">Please log in.</p>
        <div class="mt-3" style="width:300px">
            <form method="post" action="index.php?page=login" class="vstack login-form">
                <input type="email" name="email" class=" bg-dark text-white" placeholder="Votre email" required />
                <input type="password" name="password" class=" bg-dark text-white" placeholder="Password" required />

                <div class="d-flex align-items-center gap-2 my-2">
                    <input class="" type="checkbox" name="auto" id="auto" checked>
                    <label class="" for="auto">Remember me</label>
                </div>
                <button type="submit" class="btn btn-neon">Log in</button>
            </form>
        </div>
        <p class="display-6 mt-5 fst-italic">To make comments you have to sign in first</p>
        <div class="mt-3" style="width:300px">
            <form method="post" action="index.php?page=register" class="vstack login-form">
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