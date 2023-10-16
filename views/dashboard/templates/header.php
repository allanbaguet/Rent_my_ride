<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Un site sur la location des véhicules pour une date définie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Rent My Ride</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/controllers/home_controller.php">
                <img src="/public/assets/img/rent_my_ride-removebg.png" alt="logo rent my ride" class="logo-image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-toggler-icon-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link active text-white fs-4" aria-current="page" href="/controllers/dashboard/types/category_controller.php">Catégories</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active text-white fs-4" aria-current="page" href="/controllers/dashboard/vehicles/list_vehicle_controller.php">Véhicules</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active text-white fs-4" aria-current="page" href="/controllers/home_controller.php">Retour au site</a>
                    </li>
                </ul>
            </div>
            <img src="/public/assets/img/icon-user.jpg" alt="Image de profil" class="profil-image img-fluid">
        </div>
    </nav>