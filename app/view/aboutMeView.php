<?php
$title = "About me";

ob_start();


?>

<section class="container">
<p>Hello, i'm jonathan and i'm a studen from Believemy since april 2024. My skills are html,css,js ans now i'm learning php, bootstrap and sass. </p>
</section>

<?php
$content = ob_get_clean();
require __dir__ .'/baseView.php';
?>
