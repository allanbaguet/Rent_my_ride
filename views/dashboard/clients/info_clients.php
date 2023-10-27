<div class="container-fluid">
    <a href="/controllers/dashboard/rents/list_rents_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill rounded arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Informations du client</h1>
    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white my-3">
                    <div class="card-body border rounded border-3 border-primary ps-4">
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Nom : </span> <?= $getClientList->lastname ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Prénom : </span><?= $getClientList->firstname ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Email : </span><?= $getClientList->email ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Date de naissance : </span><?= date('d-m-Y', strtotime($getClientList->birthday)) ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Téléphone : </span><?= $getClientList->phone ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Ville : </span><?= $getClientList->city ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Code postal : </span><?= $getClientList->zipcode ?></p>
                        <!-- <div class="d-flex justify-content-center">
                            <a href="/controllers/info_vehicle_controller.php?id_vehicles=<?= $getClientList->id_vehicles ?>">
                                <button class="btn check-info-vehicle rounded text-white btn-lg">Voir -></button>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="container-fluid">
<h2 class="text-center mb-4 mt-4">Location du véhicule</h2>
    <div class="row">
    <?php foreach ($getVehicleClient as $vehicleClient) { ?>
        <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white my-3">
                    <div class="card-body border rounded border-3 border-primary ps-4">
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Marque : </span> <?= $vehicleClient->brand ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Modèle : </span><?= $vehicleClient->model ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Immatriculation : </span><?= $vehicleClient->registration ?></p>
                        <p class="card-text text-black fw-semibold fs-4"><span class="custom-table-text">Kilométrage : </span><?= $vehicleClient->mileage ?></p>
                        <img src="/public/uploads/vehicles/<?= $vehicleClient->picture ?>" class="card-img-top img-fluid" alt="image combi t1 rouge">
                        <!-- <div class="d-flex justify-content-center">
                            <a href="/controllers/info_vehicle_controller.php?id_vehicles=<?= $getClientList->id_vehicles ?>">
                                <button class="btn check-info-vehicle rounded text-white btn-lg">Voir -></button>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
</div>