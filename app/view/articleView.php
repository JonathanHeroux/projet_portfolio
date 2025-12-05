<?php

$title = htmlspecialchars($article['title']);

ob_start();
?>

<section class="container my-4">

    <a href="index.php?page=articles" class="btn btn-neon text-white mb-3">← Back to articles</a>

    <div class="row">
        <div class="col-12 col-lg-8">

            <div class="card bg-dark text-white mb-4">
                <?php if (!empty($article['article_image'])): ?>
                    <img src="<?= htmlspecialchars($article['article_image']) ?>" class="card-img-top" alt="Article image">
                <?php endif; ?>

                <div class="card-body">
                    <h1 class="card-title mb-3"><?= htmlspecialchars($article['title']) ?></h1>
                    <p class="text-white">Published on <?= htmlspecialchars($article['created_at'] ?? '') ?></p>
                    <hr>
                    <p class="card-text"><?= nl2br(htmlspecialchars($article['teaser'])) ?></p>
                </div>
            </div>

            
            <section class="mb-5">
                <h2 class="fs-4 mb-3">Comments</h2>

                <?php if (!empty($_SESSION['comment_success'])): ?>
                    <div class="alert alert-success fw-bold animFadeIn">Comment added successfully.
                    </div>
                <?php unset($_SESSION['comment_success']); ?>
                <?php endif; ?>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($comments)): ?>
                    <?php if (isset($_GET['comment_deleted'])): ?>
                        <div class="alert alert-danger fw-bold animFadeIn floating-alert">Comment deleted.</div>
                <?php endif; ?>
                
                <?php if (isset($_GET['comment_updated'])): ?>
                        <div class="alert alert-warning fw-bold animFadeIn floating-alert">Comment updated.</div>
                <?php endif; ?>

                    <ul class="list-unstyled">
                        <?php foreach ($comments as $comment): ?>
                            <li class="mb-3 p-3 border rounded bg-black bg-opacity-25">
                                
                                <?php if (!empty($comment['author_name'])): ?>
                                    <p class="mb-1 fw-bold">
                                        <?= htmlspecialchars($comment['author_name']) ?>
                                    </p>
                                <?php endif; ?>

                                <p class="mb-1">
                                    <?= nl2br(htmlspecialchars($comment['content'])) ?>
                                </p>
                                
                                <?php if (!empty($_SESSION['connect']) && $_SESSION['role'] === 'admin'): ?>
                                <div class="d-flex gap-2 mb-2">
                                    <button class="btn btn-sm btn-outline-warning" type="button" data-bs-toggle="collapse" data-bs-target="#edit-<?= (int)$comment['id'] ?>">Edit</button>
                                    <form method="post" class="m-0">
                                    <input type="hidden" name="delete_comment_id" value="<?= (int)$comment['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                                <div class="collapse" id="edit-<?= (int)$comment['id'] ?>">
                                    <form method="post" class="mt-2">
                                    <input type="hidden" name="update_comment_id" value="<?= (int)$comment['id'] ?>">
                                    <textarea name="content" class="form-control bg-dark text-white" rows="3" required><?= htmlspecialchars($comment['content']) ?></textarea>
                                    <button type="submit" class="btn btn-neon btn-sm mt-2">Update</button>
                                    </form>
                                </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($comment['created_at'])): ?>
                                    <p class="mb-0 text-secondary" style="font-size: 0.85rem;">
                                        Posted on <?= htmlspecialchars($comment['created_at']) ?>
                                    </p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-white">No comments yet. Be the first to react!</p>
                <?php endif; ?>

            </section>

            <section class="mb-5">
                <h2 class="fs-4 mb-3">Add a comment</h2>

                <?php if (!empty($_SESSION['connect'])): ?>

                    <form method="post">
                        <div class="mb-3">
                            <label for="content" class="form-label">Your comment</label>
                            <textarea 
                                name="content" 
                                id="content" 
                                rows="4" 
                                class="form-control bg-dark text-white" 
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-neon fw-bold">
                            Send
                        </button>
                    </form>

                <?php else: ?>

                    <p class="text-white fs-4 fst-italic">You must be logged in to comment.</p>
                        <a href="index.php?page=login" class="btn btn-neon">Log in</a>
                    

                <?php endif; ?>
            </section>

        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/baseView.php';
