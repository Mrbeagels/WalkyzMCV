<section class="container-fluid">
    <h1>Création d'une nouvelle balade</h1>
    <h4>Votre premiere (ou prochaine) balade en bonne compagnie est à portée de main ! </h4>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <!-- Champs name -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <input required aria-describedby="emailHelp" type="name" name="name" id="name" value="<?= htmlentities($mail ?? '') ?>" class="form-control <?= isset($error['name']) ? 'errorField' : '' ?>" placeholder="Ex : Randonnée du marais des boeufs, mercredi apres-midi" autocomplete="name">
                    <small id="emailHelp" class="form-text error"><?= $error['name'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- duration -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <div class="mb-4">
                    <input type="duration" name="duration" id="duration" class="form-control" placeholder="Ex : 1h30">
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- Time_slot -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <div class="mb-4">
                    <input type="time_slot" name="time_slot" id="time_slot" class="form-control" placeholder="Ex : 15h30">
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- Type de balade -->
        <div class="text-center">
            <h3>Quel type de balade souhaitez-vous faire ? </h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeOfWalkyz" id="typeOfWalkyz0" value="0" <?= (isset($typeOfWalkyz) && $typeOfWalkyz == 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="typeOfWalkyz0">
                        Courte balade (≃ 1h)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeOfWalkyz" id="typeOfWalkyz1" value="1" <?= (isset($typeOfWalkyz) && $typeOfWalkyz == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="typeOfWalkyz1">
                        Longue balade (> 2h)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeOfWalkyz" id="typeOfWalkyz2" value="2" <?= (isset($typeOfWalkyz) && $typeOfWalkyz == 2) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="typeOfWalkyz2">
                        Faire jouer nos chiens
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeOfWalkyz" id="typeOfWalkyz3" value="3" <?= (isset($typeOfWalkyz) && $typeOfWalkyz == 3) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="typeOfWalkyz3">
                        Autre
                    </label>
                    <p class="required">* Champs obligatoires</p>
                </div>
                <!-- description de la balade -->
                <div>
                    <div class="text-center">
                        <label class="bi bi-pen-fill mb-4" for="aboutU"></label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea class="form-control mt-3" name="description" id="description" rows="10" placeholder="Randonnée de plusieurs heures ou simplement lancer de frisbee dans le parc du village ? Informez les utilisateurs de ce que voulez faire pendant cette balade "><?= $description ?? '' ?></textarea>
                            <small class="form-text error"><?= $error['description'] ?? '' ?></small>
                            <p class="required">* Champs obligatoires</p>
                        </div>
                    </div>
                </div>

    </form>
    <!-- btn redirection vers les balades déjà créer -->
    <div class="text-center">
        <input type="submit" value="Envoyer" class="btn btn-primary mt-3" id="validForm">
    </div>

</section>