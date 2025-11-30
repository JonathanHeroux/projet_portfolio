<?php
$title = "Projects";

ob_start();

$formOpen = isset($_GET['success']) && !isset($_GET['updated']) && !isset($_GET['edit_id']);

?>
<section class="container">
    <p class="fs-2 fw-bold mb-5 text-center">Welcome to my projects!</p>

    <?php if (!empty($_SESSION['connect']) && $_SESSION['role'] === "admin"): ?>
    <?php if(!empty($projectToEdit)):?>
        <div class="floating-edit-form animFadeIn">
            <p class="fs-4 fw-bold mb-3 text-white">Edit</p>

            <form method="post" action="index.php?page=projects" class="vstack gap-3">
                <input type="hidden" name="id" value="<?= (int) $projectToEdit['id'] ?>">
                <div>
                    <label class="form-label text-white">Title</label>
                    <input type="text" name="title" class="form-control bg-dark text-white" value="<?= htmlspecialchars($projectToEdit['title']) ?>" required>
                </div>
                <div>
                    <label class=" form-label text-white">Description</label>
                    <textarea name="description" rows="3" class="form-control bg-dark text-white" required><?= htmlspecialchars($projectToEdit['description'])?></textarea>
                </div>
                <div>
                    <label class="label-form text-white">Image path</label>
                    <input type="text" name="project_image" class="form-control bg-dark text-white" value="<?= htmlspecialchars($projectToEdit['project_image'])?>"required>
                </div>
                <div>
                    <label class="form-label text-white">Project URL (for iframe)</label>
                    <input type="text" name="project_url" class="form-control bg-dark text-white" value="<?= htmlspecialchars($projectToEdit['project_url'])?>">
                </div>
                <div class="d-flex gap-2 mt-3">
                    <button type="submit" name="update_project" class="btn btn-neon">Update project</button>
                    <a href="index.php?page=projects" class="btn btn-neon">Cancel</a>
                </div>
            </form>
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['success'])): ?>
        <div class=" alert alert-success fw-bold animFadeIn floating-alert alert-dismissible">Project created successfully</div>
    <?php endif; ?>
    <?php if(isset($_GET['deleted'])): ?>
        <div class=" alert alert-danger fw-bold animFadeIn floating-alert alert-dismissible">Project deleted successfully</div>
    <?php endif; ?>
    <?php if(isset($_GET['updated'])): ?>
        <div class=" alert alert-warning fw-bold animFadeIn floating-alert alert-dismissible">Project updated successfully</div>
    <?php endif; ?>

    <button type="button" class="btn btn-neon mb-3" data-bs-toggle="collapse" data-bs-target="#addProjectForm" aria-expanded="<?= $formOpen ? 'true' : 'false' ?>" aria-controls="addProjectForm">Add project</button>
    <div class="collapse <?= $formOpen ? 'show' : '' ?> mb-4" id="addProjectForm">
        <form method="post" action="index.php?page=projects" class="vstack gap-3" style="max-width:600px">
            <div>
                <label class="form-label text-white">Title</label>
                <input type="text" name="title" class="form-control bg-dark text-white" required>
            </div>
            <div>
                <label class="label-form text-white">Description</label>
                <textarea name="description" rows="3" class="form-control bg-dark text-white" required></textarea>
            </div>
            <div>
                <label class="label-form text-white">Image path</label>
                <input type="text" name="project_image" class="form-control bg-dark text-white" placeholder="assets/img/..." required>
            </div>
            <div>
                <label class="label-form text-white">Project URL (iframe)</label>
                <input type="text" name="project_url" class="form-control bg-dark text-white" placeholder="https://pendu.jonathanheroux.com/">
            </div>
            <button type="submit" class="btn btn-neon mt-2 w-25">Save project</button>
        </form>
    </div>
<?php endif; ?>

    <div id="projectCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php if(!empty($projects)): ?>
                <?php foreach($projects as $index => $project): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="d-flex flex-column align-items-center">
                            <img src="<?= htmlspecialchars($project['project_image']) ?>" class="d-block w-50 mb-3" alt="<?= htmlspecialchars($project['title'])?>">
                            <p class=" display-5 fw-bold mb-1">
                                <?= htmlspecialchars($project['title']) ?> </p>
                            <p class="text-center fs-4 fst-italic mb-3">
                                <?= htmlspecialchars($project['description'])?>
                            </p>
                            <button class="btn btn-neon mt-3 view-project-btn" data-url="<?= htmlspecialchars($project['project_url'])?>">View here</button>
                            
                            <?php if(!empty($_SESSION['connect']) && $_SESSION['role'] === "admin"): ?>
                                <div class="d-flex gap-2 mt-3">
                                    <a href="index.php?page=projects&edit_id=<?= (int) $project['id'] ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form method="post" action="index.php?page=projects" class="m-0 p-0">
                                        <input type="hidden" name="delete_id" value="<?= (int) $project['id']?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item active">
                    <div class="d-flex flex-column align-items-center">
                        <p class="fs-4 text-white-50">No projects yet.</p>
                    </div>
                </div>
            <?php endif; ?>
            </div>
                <button class="carousel-control-prev hide-project-view" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next hide-project-view" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section id="projectPreview" class="container my-7 text-center d-none">
            <div class="project-frame-wrapper">
                <iframe id="projectFrame" src="" title="Porject preview" loading="lazy" style="border:0;" allowfullscreen></iframe>
            </div>
</section>

<?php
$content = ob_get_clean();
require __dir__ .'/baseView.php';
?>