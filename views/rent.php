<a href="/controllers/home_controller.php">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill rounded arrow-left m-4" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
    </svg>
</a>
<h1 class="title-blue fw-semibold mb-4 text-center">Réservation</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto background-cards">
            <h2 class="text-white mt-4 mb-5 fw-bold">Information personnelle</h2>
            <form method="POST">
                <p class="text-white fw-bold py-1">* (Champs obligatoire)</p>
                <!-- Partie nom -->
                <div class="form-group text-white fw-bold">
                    <label for="lastname" class="form-label mt-4">Votre nom* :</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="Baguet" placeholder="Entrez votre nom " maxlength="50" autocomplete="family-name" pattern="<?= REGEX_LASTNAME ?>" required>
                    <div id="lastnameHelp" class="form-text error d-none text-danger">Ce champ n'est pas valide</div>
                    <p class="error"> <?= $errors['lastname'] ?? '' ?> </p>
                </div>
                <!-- Partie prénom -->
                <div class="form-group text-white fw-bold">
                    <label for="firstname" class="form-label mt-4">Votre prénom* :</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="Allan" placeholder="Entrez votre nom " maxlength="50" autocomplete="given-name" pattern="<?= REGEX_FIRSTNAME ?>" required>
                    <div id="firstnameHelp" class="form-text error d-none text-danger">Ce champ n'est pas valide</div>
                    <p class="error"> <?= $errors['firstname'] ?? '' ?> </p>
                </div>
                <!-- Partie adresse mail -->
                <div class="form-group text-white fw-bold">
                    <label for="email" class="form-label mt-4">Adresse mail* :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre mail" maxlength="120" value="allan@gmail.com" autocomplete="email" pattern="<?= REGEX_EMAIL ?>" required>
                    <div id="emailHelp" class="form-text error d-none text-danger">Cet email n'est pas valide</div>
                    <p class="error"> <?= $errors['email'] ?? '' ?> </p>
                </div>
                <!-- Partie date de naissance -->
                <div class="form-group text-white fw-bold">
                    <label for="birthday" class="form-label mt-4">Votre date de naissance* :</label>
                    <input type="date" class="form-control" name="birthday" id="birthday" max="<?= $currentDate ?>" autocomplete="bday" required>
                    <p class="error"> <?= $errors['birthday'] ?? '' ?> </p>
                </div>
                <!-- Partie téléphone -->
                <div class="form-group text-white fw-bold">
                    <label for="phone" class="form-label mt-4">Téléphone* :</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="0654872154" maxlength="10" placeholder="Ex: 0322541202" pattern="<?= REGEX_PHONE ?>" autocomplete="tel" required>
                    <div id="phoneHelp" class="form-text error d-none text-danger">Ce champ n'est pas valide</div>
                    <p class="error"> <?= $errors['phone'] ?? '' ?> </p>
                </div>
                <!-- Partie code postal -->
                <div class="form-group text-white fw-bold">
                    <label for="zipcode" class="form-label mt-4">Code postal* :</label>
                    <input type="text" inputmode="numeric" class="form-control" name="zipcode" id="zipcode" value="80100" maxlength="5" placeholder="Ex: 80100" autocomplete="postal-code" pattern="<?= REGEX_ZIPCODE ?>" required>
                    <p class="error"> <?= $errors['zipcode'] ?? '' ?> </p>
                </div>
                <!-- Partie ville -->
                <div class="form-group">
                    <label for="city" class="form-label mt-4 text-white fw-bold">Ville* :</label>
                    <select class="form-control" name="city" id="city" maxlength="50">
                        <option selected disabled>Choisissez votre ville</option>
                        <option>Abbeville</option>
                    </select>
                    <p class="error"> <?= $errors['city'] ?? '' ?> </p>
                </div>
                <!-- Partie date début réservation -->
                <div class="form-group text-white fw-bold">
                    <label for="startdate" class="form-label mt-4">Début réservation* :</label>
                    <input type="date" class="form-control" name="startdate" id="startdate" min="<?= $currentDate ?>" required>
                    <p class="error"> <?= $errors['startdate'] ?? '' ?> </p>
                </div>
                <!-- Partie date fin réservation -->
                <div class="form-group text-white fw-bold">
                    <label for="enddate" class="form-label mt-4">Fin réservation* :</label>
                    <input type="date" class="form-control" name="enddate" id="enddate" min="<?= $currentDate ?>" required>
                    <p class="error"> <?= $errors['enddate'] ?? '' ?> </p>
                </div>
                <!-- Partie bouton d'envoi -->
                <div class="d-flex justify-content-center p-5" id="button">
                    <button type="submit" class="btn check-info-vehicle rounded text-white btn-lg">Validation</button>
                </div>
            </form>
        </div>
    </div>
</div>