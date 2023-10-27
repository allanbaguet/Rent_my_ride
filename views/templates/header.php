<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Un site sur la location de véhicules Combi pour vivre le voyage de sa vie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="icon" href="/public/assets/img/rent_my_combi.png" type="image/x-icon">
    <title>Rent My Combi</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
        <a class="navbar-brand" href="/controllers/home_controller.php">
                <img src="/public/assets/img/rent_my_combi.png" alt="logo rent my ride" class="logo-image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <!-- <li class="nav-item">
                        <a class="nav-link active text-white fs-3" aria-current="page" href="/controllers/home_controller.php">Accueil</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link active text-white fs-3" aria-current="page" href="/controllers/dashboard/dashboard_controller.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>