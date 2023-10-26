<div class="container-fluid">
    <a href="/controllers/dashboard/dashboard_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill rounded arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Liste des réservations</h1>
    <div class="row my-5">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="table-responsive-md-sm shadow-table">
                <table class="table table-bordered table-hover">
                    <thead class="custom-thead">
                        <tr class="text-start">
                            <th scope="col" class="text-white">Nom</th>
                            <th scope="col" class="text-white">Prénom</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">Infos client</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider custom-tbody">
                        <?php
                        foreach ($getClientList as $ClientList) { ?>
                            <tr class="text-center">
                                <th scope="row" class="custom-table-text"><?php echo $ClientList->lastname ?></th>
                                <td><?php echo $ClientList->firstname ?></td>
                                <th scope="row"><?php echo $ClientList->email ?></th>
                                <td class="d-flex justify-content-evenly">
                                    <a href="/controllers/dashboard/vehicles/modif_vehicle_controller.php?id_vehicles=<?= $vehicleList->id_vehicles ?>">
                                        <button class="btn btn-transparent" title="Voir information client">
                                            <i class="bi bi-pencil">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
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
</div>