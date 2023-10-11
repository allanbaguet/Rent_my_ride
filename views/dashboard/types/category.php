<div class="container-fluid">
    <a href="/controllers/dashboard/dashboard_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4">Catégorie de véhicules</h1>
    <p class="text-center fs-5">
        <!-- message d'erreur, variable $delete définie dans le controlleur category -->
        <?php
            if ($delete === '1') {
                echo 'Catégorie supprimé avec succès';
            } else if ($delete === '0') {
                echo 'Erreur pendant la suppression de la catégorie';
            }
        ?></p>
    <div class="d-flex justify-content-center">
        <a href="/controllers/dashboard/types/create_category_controller.php">
            <button type="button" class="btn btn-primary mb-4" id="button-green">+ Ajout de catégorie</button>
        </a>
    </div>
    <div class="row my-5">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center table-active">
                        <th scope="col">ID</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Modification</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php 
                        foreach ($getTypesList as $typeList) { ?>
                            <tr class="text-center">
                                <th scope="row"><?php echo $typeList->id_types ?></th>
                                <td><?php echo $typeList->type ?></td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="/controllers/dashboard/types/modif_category_controller.php?id_types=<?=$typeList->id_types?>">
                                        <button class="btn btn-transparent">
                                            <i class="bi bi-pencil">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </i>
                                        </button>
                                    </a>
                                    <a href="/controllers/dashboard/types/delete_category_controller.php?id_types=<?=$typeList->id_types?>">
                                        <button class="btn btn-transparent">
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