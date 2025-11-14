<?php

$title = "Error";

ob_start();

?>

<section class="container">
    <h1> Oups! <?=$error?></h1>
</section>

<?php

$content = ob_get_clean();
require __DIR__ . '/baseView.php';

?>

