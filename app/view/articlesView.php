<?php
$title = "Aticles";

ob_start();


?>

<section class="container">
<p class="fs-2 fw-bold">Welcome to my articles! This features is coming soon... </p>
</section>

<?php
$content = ob_get_clean();
require __dir__ .'/baseView.php';
?>