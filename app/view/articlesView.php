<?php
$title = "Articles";

ob_start();

$formOpen = isset($_GET['success']) && !isset($_GET['updated']) && !isset($_GET['edit_id']);

// var_dump($articles);



?>

<section class="container">
    <p class="fs-2 fw-bold mb-4 text-center">Welcome to my articles!</p>

    <?php if(!empty($_SESSION['connect']) && $_SESSION['role'] === "admin"): ?>

        <?php if(!empty($articleToEdit)):?>
        <div class="floating-edit-form animFadeIn">
            <p class="fs-4 fw-bold mb-3 text-white">Edit article</p>

            <form method="post" action="index.php?page=articles" class="vstack gap-3">
                <input type="hidden" name="id" value="<?= (int) $articleToEdit['id'] ?>">

                <div>
                    <label class="form-label text-white">Title</label>
                    <input type="text" name="title" class="form-control bg-dark text-white" value="<?= htmlspecialchars($articleToEdit['title']) ?>" required>
                </div>

                <div>
                    <label class="label-form text-white">Teaser</label>
                    <textarea name="teaser" rows="3" class="form-control bg-dark text-white" required><?= htmlspecialchars($articleToEdit['teaser'])?></textarea>
                </div>

                <div>
                    <label class="form-label text-white">Image path</label>
                    <input type="text" name="article_image" class="form-control bg-dark text-white" value="<?= htmlspecialchars($articleToEdit['article_image'])?>" required>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" name="update_article" class="btn btn-neon">Update article</button>
                    <a href="index.php?page=articles" class="btn btn-neon">Cancel</a>
                </div>
            </form>
        </div>
        <?php endif; ?>


        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success fw-bold animFadeIn floating-alert alert-dismissible">Article created successfully.</div>
        <?php endif; ?>
        <?php if(isset($_GET['deleted'])): ?>
            <div class="alert alert-danger fw-bold animFadeIn floating-alert alert-dismissible">Article deleted successfully.</div>
        <?php endif; ?>
        <?php if(isset($_GET['updated'])): ?>
            <div class="alert alert-warning fw-bold animFadeIn floating-alert alert-dismissible">Article updated successfully.</div>
        <?php endif; ?>

        <button class="btn btn-neon mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#addArticleForm" aria-expanded="<?= $formOpen ? 'true' : 'false' ?>" aria-controls="addArticleForm">Add article</button>

        <div class="collapse <?= $formOpen ? 'show' : '' ?>" id="addArticleForm">
            <form method="post" action="index.php?page=articles" class="vstack gap-3 mb-5" style="max-width:600px;">
                <div>
                    <label class="form-label text-white">Title</label>
                    <input type="text" name="title" class="form-control bg-dark text-white" required>
                </div>
                <div>
                    <label class="form-label text-white">Teaser</label>
                    <textarea name="teaser" rows="3" class="form-control bg-dark text-white" required></textarea>
                </div>
                <div>
                    <label class="form-label text-white">Image path</label>
                    <input type="text" name="article_image" class="form-control bg-dark text-white" placeholder="assets/img/flavicon.png" required>
                </div>
                <button type="submit" class="btn btn-neon mt-2 w-25">Save article</button>
            </form>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <?php if(!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 text-white">
                        <img src="<?= htmlspecialchars($article['article_image']) ?>" class="card-img-top" alt="Article image">
                        <div class="card-header">

                            <?php if(!empty($_SESSION['connect']) && $_SESSION['role'] === "admin"): ?>
                                <div class="d-flex gap-2">

                                    <a href="index.php?page=articles&edit_id=<?= (int)$article['id']?>" class="btn btn-sm btn-outline-warning">Edit</a>

                                    <form method="post" action="index.php?page=articles" class="m-0 p-0">
                                        <input type="hidden" name="delete_id" value="<?= (int)$article['id']?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= nl2br(htmlspecialchars($article['teaser'])) ?> </p>
                            <h5 class="card-title mt-2"><?= htmlspecialchars($article['title']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
    </div>
       
</section>

<?php
$content = ob_get_clean();
require __dir__ .'/baseView.php';
?>