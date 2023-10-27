<div class="container-fluid">
    <a href="/controllers/dashboard/dashboard_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill rounded arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Liste des réservations</h1>
    <div class="row my-3">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="table-responsive-md-sm shadow-table">
                <table class="table table-bordered table-hover">
                    <thead class="custom-thead">
                        <tr class="text-start">
                            <th scope="col" class="text-white">Nom</th>
                            <th scope="col" class="text-white">Prénom</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">+ d'infos</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider custom-tbody">
                        <?php
                        foreach ($getClientList as $ClientList) { ?>
                            <tr class="text-center">
                                <td scope="row" class="custom-table-text fw-bold"><?php echo $ClientList->lastname ?></th>
                                <td class="custom-table-text fw-bold"><?php echo $ClientList->firstname ?></td>
                                <td scope="row" class="custom-table-text fw-bold"><?php echo $ClientList->email ?></td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="/controllers/dashboard/clients/info_clients_controller.php?id_clients=<?= $ClientList->id_clients ?>">
                                        <button class="btn btn-transparent" title="Voir information client">
                                            <i class="bi bi-pencil">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </i>
                                        </button>
                                    </a>
                                    <!-- <a href="/controllers/dashboard/rents/confirmed_rent_controller.php?action=confirm&id_rents=<?= $getConfirmed->id_clients ?>">
                                        <button class="btn btn-transparent" title="Confirmer réservation">
                                            <i class="bi bi-check-circle-fill">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </i>
                                        </button>
                                    </a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <h2 class="text-center mb-5">Réservations confirmée</h2>
    <div class="row my-4">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="table-responsive-md-sm shadow-table">
                <table class="table table-bordered table-hover">
                    <thead class="custom-thead">
                        <tr class="text-start">
                            <th scope="col" class="text-white">Nom</th>
                            <th scope="col" class="text-white">Prénom</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">+ d'infos</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider custom-tbody">
                        <?php
                        foreach ($getClientList as $ClientList) { ?>
                            <tr class="text-center">
                                <td scope="row" class="custom-table-text fw-bold"><?php echo $ClientList->lastname ?></th>
                                <td class="custom-table-text fw-bold"><?php echo $ClientList->firstname ?></td>
                                <td scope="row" class="custom-table-text fw-bold"><?php echo $ClientList->email ?></td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="/controllers/dashboard/clients/info_clients_controller.php?id_clients=<?= $ClientList->id_clients ?>">
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
</div> -->