<section class="container-fluid">
    <div class="text-center ">
    <h1 class="my-3">Création d'une nouvelle balade</h1>
    <h4 class="mb-3"><?= htmlentities($_SESSION['consumer']->firstname) ?> (ou prochaine) balade en bonne compagnie est à portée de main ! </h4>
    </div>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <!-- Champs name -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="<?= htmlentities($name ?? '') ?>" 
                    class="form-control <?= isset($error['name']) ? 'errorField' : '' ?>" 
                    placeholder="Ex : Randonnée du marais des boeufs, mercredi apres-midi" 
                    autocomplete="name">
                    <small class="form-text error"><?= $error['name'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- zip code -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="zipcode" 
                    id="zipcode" 
                    value="<?= htmlentities($zipcode ?? '') ?>" 
                    class="form-control <?= isset($error['zipcode']) ? 'errorField' : '' ?>" 
                    placeholder="Ex : 80450" 
                    autocomplete="zipcode">
                    <small class="form-text error"><?= $error['zipcode'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- ville -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="city" 
                    id="city" 
                    value="<?= htmlentities($city ?? '') ?>" 
                    class="form-control <?= isset($error['city']) ? 'errorField' : '' ?>" 
                    placeholder="Ex : Camon" 
                    autocomplete="city">
                    <small class="form-text error"><?= $error['city'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        
        <!-- Address -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="address" 
                    id="address" 
                    value="<?= htmlentities($address ?? '') ?>" 
                    class="form-control <?= isset($error['address']) ? 'errorField' : '' ?>" 
                    placeholder="Ex : 8 Rue René Gambier" 
                    autocomplete="address">
                    <small class="form-text error"><?= $error['address'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- date -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <input 
                    type="datetime-local" 
                    name="date" 
                    id="date" 
                    value="<?= htmlentities($date ?? '') ?>" 
                    class="form-control <?= isset($error['date']) ? 'errorField' : '' ?>" 
                    autocomplete="date">
                    <small class="form-text error"><?= $error['date'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>

        <!-- duration -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <div class="mb-4">
                    <input type="text" name="duration" id="duration" class="form-control" placeholder="Ex : 1h30">
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
                        <h3 class="bi bi-pen-fill mb-4" for="aboutU">Que comptez vous faire pendant cette balade ? </h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea *
                            class="form-control mt-3" 
                            name="description" 
                            id="description" 
                            rows="10" 
                            placeholder="Randonnée de plusieurs heures ou simplement lancer de frisbee dans le parc du village ? Informez les utilisateurs de ce que voulez faire pendant cette balade "><?= $description ?? '' ?></textarea>
                            <small 
                            class="form-text error"><?= $error['description'] ?? '' ?></small>
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