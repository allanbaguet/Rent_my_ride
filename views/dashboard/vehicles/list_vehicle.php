<div class="container-fluid">
    <a href="/controllers/dashboard/dashboard_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Fiche véhicule</h1>
    <p class="text-center fs-5">
        <!-- message informatif, variable $delete / $archive définie dans le controlleur category -->
        <!-- cible l'id dans le paramètre d'url -->
        <?php
            if ($delete === '1') {
                echo 'Catégorie supprimée avec succès';
            } else if ($delete === '0') {
                echo 'Erreur pendant la suppression de la catégorie';
            } else if ($archive === '1') {
                echo 'Élément archivé avec succès';
            } else if ($archive === '0') {
                echo 'Erreur pendant l\'archivage de l\'élément';
            }
        ?>
    <div class="d-flex justify-content-center">
        <a href="/controllers/dashboard/vehicles/create_vehicle_controller.php">
            <button type="button" class="btn btn-primary mb-4" id="button-green">+ Ajout de véhicule</button>
        </a>
    </div>
    <div class="row my-5">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center table-active">
                        <th scope="col">Catégorie
                            <button class="btn btn-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-contract" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.646 14.854a.5.5 0 0 0 .708 0L8 11.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708zm0-13.708a.5.5 0 0 1 .708 0L8 4.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zM1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8z" />
                                </svg>
                            </button>
                        <th scope="col">Marque
                            <!-- paramètre d'URL / Si $order est égal à 'ASC', alors l'expression retourne 'DESC' et inversement -->
                            <a href="?order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                                <button class="btn btn-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-contract" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M3.646 14.854a.5.5 0 0 0 .708 0L8 11.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708zm0-13.708a.5.5 0 0 1 .708 0L8 4.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zM1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8z" />
                                    </svg>
                                </button>
                            </a>
                        </th>
                        <th scope="col">Modèle
                            <a href="?order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                                <button class="btn btn-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-contract" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M3.646 14.854a.5.5 0 0 0 .708 0L8 11.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708zm0-13.708a.5.5 0 0 1 .708 0L8 4.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zM1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8z" />
                                    </svg>
                                </button>
                            </a>
                        </th>
                        <th scope="col">Modification</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    foreach ($getVehicleList as $vehicleList) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $vehicleList->type ?></th>
                            <td><?php echo $vehicleList->brand ?></td>
                            <th scope="row"><?php echo $vehicleList->model ?></th>
                            <td class="d-flex justify-content-evenly">
                                <a href="/controllers/dashboard/vehicles/modif_vehicle_controller.php?id_vehicles=<?= $vehicleList->id_vehicles ?>">
                                    <button class="btn btn-transparent" title="Modifier l'élément">
                                        <i class="bi bi-pencil">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </i>
                                    </button>
                                </a>
                                <a href="/controllers/dashboard/vehicles/delete_vehicle_controller.php?action=archive&id_vehicles=<?= $vehicleList->id_vehicles ?>">
                                    <button class="btn btn-transparent" title="Archiver l'élément">
                                        <i class="bi bi-pencil">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                                                <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
                                            </svg>
                                        </i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h1 class="text-center mb-4">Véhicules archivés</h1>
    <div class="row my-5">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center table-active">
                        <th scope="col">Catégorie</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Modification</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    //nouvelle variable pour récupérer les éléments archivé
                    foreach ($getVehicleArchived as $vehicleArchived) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $vehicleArchived->type ?></th>
                            <td><?php echo $vehicleArchived->brand ?></td>
                            <th scope="row"><?php echo $vehicleArchived->model ?></th>
                            <td class="d-flex justify-content-evenly">
                                <a href="/controllers/dashboard/vehicles/delete_vehicle_controller.php?action=unarchive&id_vehicles=<?= $vehicleArchived->id_vehicles ?>">
                                    <button class="btn btn-transparent" title="Désarchiver l'élément">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="/controllers/dashboard/vehicles/delete_vehicle_controller.php?action=delete&id_vehicles=<?= $vehicleArchived->id_vehicles ?>">
                                    <button class="btn btn-transparent" title="Supprimer l'élément">
                                        <i class="bi bi-x-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>