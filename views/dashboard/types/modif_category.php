<div class="container-fluid">
    <a href="/controllers/dashboard/types/category_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill rounded arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Modification de la catégorie</h1>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form method="POST">
                <!-- <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Catégorie enregistrée avec succés !</strong> 
                </div> -->
                <div class="mb-3 row my-5">
                    <label for="type" class="col-sm-4 col-form-label fw-semibold fs-5 title-input">Catégorie</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control type" id="type" name="type" value="<?= $typeObj->type?>" pattern="[A-Za-zÀ-ÿ].{1,30}" required>
                        <div id="typeHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['type'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                        <button type="submit" class="btn button-add text-white">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- appel du script ici dans la vue, car il est lu que dans cette page  -->
<script defer src="/public/assets/js/script.js"></script>