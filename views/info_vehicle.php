<a href="/controllers/home_controller.php">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill rounded arrow-left m-4" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
    </svg>
</a>
<h1 class="title-blue fw-semibold mb-4 text-center">Un véhicule emblématique</h1>
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col">
            <img class="img-fluid rounded" src="/public/uploads/vehicles/<?= $getVehicleList->picture ?>">
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-1"></div>
        <div class="col-10">
            <p class="fs-5">Le <span class="custom-table-text fw-bold"><?= $getVehicleList->brand ?> <?= $getVehicleList->model ?></span> est une icône automobile qui incarne une époque d'innocence, de créativité et d'aventure. Son design classique, sa polyvalence et son impact culturel en font un véhicule inoubliable et chéri par de nombreuses générations.</p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="subtitle-blue fw-semibold fs-3 mb-3">Fiche technique</h2>
            <p class="subtitle-blue fw-semibold">Marque : <?= $getVehicleList->brand ?></p>
            <p class="subtitle-blue fw-semibold">Modèle : <?= $getVehicleList->model ?></p>
            <p class="subtitle-blue fw-semibold">Kilomètrage : <?= $getVehicleList->mileage ?></p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/controllers/rent_controller.php?id_vehicles=<?= $getVehicleList->id_vehicles ?>">
            <button class="btn check-info-vehicle rounded text-white btn-lg">Réserver ce véhicule</button>
        </a>
    </div>
</div>