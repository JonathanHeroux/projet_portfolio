<?php

$title = "Contact";

ob_start();

?>

<section>
    <div class="vstack align-items-center justify-content-center cta-wrap w-100">
        <p class=" fw-lighter fst-italic cta-note fs-5 animToLeft">Where the ideas become reality</p>
            <div id="contactPanel" class="mt-3 w-75 animToLeft">
                <form id="formContact" class="mt-2">
                    <div class="mt-2 animToLeft" style="--delay:0.5s">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control text-white">
                    </div>
                    <div class="mt-2 animToLeft" style="--delay:0.9s">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control text-white">
                    </div>
                    <div class="mt-2 animToLeft" style="--delay:1.2s">
                        <p>Message</p>
                        <textarea name="message" id="message" rows="5" cols="50" class="form-control text-white"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-neon fw-bold rounded w-25 mt-3 animToLeft" style="--delay:1.5s">Send</button>
                    </div>
                </form>
            </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require __DIR__ . "/baseView.php"; 

