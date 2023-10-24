<div class="container-fluid">
    <div class="row p-0 mb-5">
        <div class="col p-0">
            <div class="img">
                <h1 class="background-text">
                    "Roulez en toute liberté avec <span class="custom-table-text fw-bold">Rent my Combi</span>
                    Votre destination, votre véhicule, votre aventure !"
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-1"></div>
        <div class="col-10">
            <h2 class="subtitle-blue fw-semibold mb-3">La location comme vous l'aimerez</h2>
            <p class="description">Chez <span class="custom-table-text fw-bold">Rent My Combi</span>, nous comprenons que chaque voyage est unique, et c'est pourquoi nous vous offronts la location de voiture parfaite pour répondre à vos besoins spécifiques.</p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-1"></div>
        <div class="col-10">
            <h2 class="subtitle-blue fw-semibold mb-3">Une réservation éclair</h2>
            <p>Nous croyons en la simplicité, c'est
                pourquoi notre processus de réservation
                est rapide et sans tracas. Vous pouvez
                choisir parmi une variété de Combi.</p>
        </div>
    </div>
</div>
<hr class="mb-5">
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="" id="searchForm">
                <input type="search" name="search" id="search" class="input-home" placeholder="Rechercher...">
                <button type="submit" class="btn-research">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
                <div class="form-group">
                    <label for="type" class="form-label mt-4 fst-italic input-home"></label>
                    <select class="form-select" id="type" name="id_types">
                        <option selected disabled>Choisissez une catégorie</option>
                        <?php
                        //boucle permettant d'afficher les catégories, utilisant la méthode get_all
                        //préalablement crée dans le model Type
                        foreach ($getTypesList as $typeList) { ?>
                            <option value="<?= $typeList->id_types ?>"><?php echo $typeList->type ?> </option>
                            <!-- permet de ciblé l'ID des catégories, pour les manipuler ensuite -->
                        <?php }
                        ?>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid my-5">
    <div class="row">
        <div class="col background-cards">
            <h2 class="text-white mt-4 mb-5 fw-bold">Nos véhicules</h2>
            <div class="row">
                <?php foreach ($getVehicleList as $vehicleList) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card text-white my-3">
                            <img src="/public/uploads/vehicles/<?= $vehicleList->picture ?>" class="card-img-top img-fluid" alt="image combi t1 rouge">
                            <div class="card-body">
                                <h4 class="card-title text-black fw-semibold fs-3"><?= $vehicleList->model ?></h4>
                                <p class="card-text text-black fw-semibold fs-4"><?= $vehicleList->type ?></p>
                                <p class="card-text text-black fw-semibold fs-4"><?= $vehicleList->brand ?></p>
                                <div class="d-flex justify-content-center">
                                    <a href="/controllers/info_vehicle_controller.php?id_vehicles=<?= $vehicleList->id_vehicles ?>">
                                        <button class="btn check-info-vehicle rounded text-white btn-lg">Voir -></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- $page correspond au paramètre d'url page récupérer et filtrer -->
                    <!-- si page est inférieur ou égal à la première page, le bouton précédent est désactivé -->
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= ($page > 1) ? "?id_types=$id_types&search=$search&page=" . ($page - 1) : '#' ?>">Précédent</a>
                    </li>
                    <?php
                    for ($currentPage = 1; $currentPage <= $nbPages; $currentPage++) {
                        $active = ($currentPage == $page) ? 'active' : '';
                    ?>
                        <li class="page-item <?= $active ?>">
                            <a class="page-link" href="?id_types=<?= $id_types ?>&search=<?= $search ?>&page=<?= $currentPage ?>"><?= $currentPage ?></a>
                        </li>
                    <?php }
                    ?>
                    <!-- si page est supérieur ou égal à nbPages -> calculé dans home_controller -->
                    <!-- alors btn suivant désactivé -->
                    <li class="page-item <?= ($page >= $nbPages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= ($page < $nbPages) ? "?id_types=$id_types&search=$search&page=" . ($page + 1) : '#' ?>">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>