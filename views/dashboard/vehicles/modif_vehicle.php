<div class="container-fluid">
    <a href="/controllers/dashboard/vehicles/list_vehicle_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Modification du véhicule</h1>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form method="POST">
                <!-- <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Catégorie enregistrée avec succés !</strong> 
                </div> -->
                <div class="mb-3 row my-5">
                    <label for="brand" class="col-sm-4 col-form-label fw-semibold fs-5">Marque</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control brand" id="brand" name="brand" value="<?= $vehicleObj->brand ?>" pattern="<?= REGEX_BRAND ?>" required>
                        <div id="brandHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['brand'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="mb-3 row my-5">
                    <label for="model" class="col-sm-4 col-form-label fw-semibold fs-5">Modèle</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control model" id="model" name="model" value="<?= $vehicleObj->model ?>" pattern="<?= REGEX_MODEL ?>" required>
                        <div id="modelHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['model'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="mb-3 row my-5">
                    <label for="registration" class="col-sm-4 col-form-label fw-semibold fs-5">Immatriculation</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control registration" id="registration" name="registration" value="<?= $vehicleObj->registration ?>" placeholder="XX-000-XX" pattern="<?= REGEX_REGISTRATION ?>" required>
                        <div id="registrationHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['registration'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="mb-3 row my-5">
                    <label for="mileage" class="col-sm-4 col-form-label fw-semibold fs-5">Kilométrage</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control mileage" id="mileage" name="mileage" value="<?= $vehicleObj->mileage ?>" pattern="<?= REGEX_MILEAGE ?>" required>
                        <div id="mileageHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['mileage'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="mb-3 row my-5">
                    <label for="picture" class="col-sm-4 col-form-label fw-semibold fs-5">Image</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input class="form-control" type="file" id="picture" name="picture" value="<?= $vehicleObj->picture ?>" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <div id="pictureHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['mileage'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="mb-3 row my-5">
                    <label for="type" class="col-sm-4 col-form-label fw-semibold fs-5">Catégorie</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="type" id="type" required>
                            <option selected disabled>Choisissez une catégorie</option>
                            <?php
                            //boucle permettant d'afficher les catégories, utilisant la méthode get_all
                            //préalablement crée dans le model Type
                            foreach ($getTypesList as $typeList) { 
                                //ternaire permettant 
                            $isSelected = ($vehicleObj->id_types == $typeList->id_types) ? 'selected' : ''; ?>
                                <option <?= $isSelected  ?> value="<?=$typeList->id_types?>"><?php echo $typeList->type?> </option>
                            <?php }
                            ?>
                        </select>
                        <div id="typeHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                        <p class="error"> <?= $errors['type'] ?? '' ?> </p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- appel du script ici dans la vue, car il est lu que dans cette page  -->
<script defer src="/public/assets/js/script.js"></script>