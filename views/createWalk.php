
<section class="container-fluid">
    <div class="text-center ">
    <h1 class="my-3 title">Création d'une nouvelle balade</h1>
    <h4 class="mb-3"><?= htmlentities($_SESSION['consumer']->firstname) ?> votre prochaine balade en bonne compagnie est à portée de main ! </h4>
    </div>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <!-- Champs name -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <label for="name"> Nom de votre promenade</label>
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="<?= htmlentities($_SESSION['walk']->name ?? '') ?>" 
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
                <label for="zipCode">Code Postal</label>
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="zipCode" 
                    id="zipCode" 
                    value="<?= htmlentities($_SESSION['walk']->zipCode ?? '') ?>" 
                    class="form-control <?= isset($error['zipCode']) ? 'errorField' : '' ?>" 
                    placeholder="Ex : 80450" 
                    autocomplete="zipCode">
                    <small class="form-text error"><?= $error['zipCode'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- ville -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <label for="city">Ville</label>
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="city" 
                    id="city" 
                    value="<?= htmlentities($_SESSION['walk']->city ?? '') ?>" 
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
                <label for="address">Adresse de la promenade</label>
                <div class="mb-4">
                    <input 
                    type="text" 
                    name="address" 
                    id="address" 
                    value="<?= htmlentities($_SESSION['walk']->address ?? '') ?>" 
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
                <label for="date"> Date et heure</label>
                <div class="mb-4">
                    <input 
                    type="datetime-local" 
                    name="walk_date" 
                    id="walk_date" 
                    value="<?= htmlentities($_SESSION['walk']->walk_date ?? '') ?>" 
                    class="form-control <?= isset($error['walk_date']) ? 'errorField' : '' ?>" 
                    autocomplete="walk_date"
                    min ="<? $dayDate; ?>">
                    <small class="form-text error"><?= $error['walk_date'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>

        <!-- duration -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <label for="duration">Durée estimé de la balade</label>
                <div class="mb-4">
                    <input type="text" name="duration"
                    value="<?= htmlentities($_SESSION['walk']->duration ?? '') ?>" id="duration" class="form-control" placeholder="Ex : 1h30">
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>
        <!-- Type de balade -->
        <div class="text-center">
            <h3>Quel type de balade souhaitez-vous faire ? </h3>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-12 col-lg-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type0" value="0" <?= (isset($_SESSION['walk']->type) && $_SESSION['walk']->type == 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="type0">
                        Courte balade (≃ 1h)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type1" value="1" <?= (isset($_SESSION['walk']->type) && $_SESSION['walk']->type == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="type1">
                        Longue balade (> 2h)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type2" value="2" <?= (isset($_SESSION['walk']->type) && $_SESSION['walk']->type == 2) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="type2">
                        Faire jouer nos chiens
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type3" value="3" <?= (isset($_SESSION['walk']->type) && $_SESSION['walk']->type == 3) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="type3">
                        Agility et exercice
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
                            value="<?= htmlentities($_SESSION['walk']->description ?? '') ?>"
                            placeholder="Randonnée de plusieurs heures ou simplement lancer de frisbee dans le parc du village ? Informez les utilisateurs de ce que voulez faire pendant cette balade "><?= $description ?? '' ?></textarea>
                            <small 
                            class="form-text error"><?= $error['description'] ?? '' ?></small>
                        </div>
                    </div>
                </div>

    </form>

    <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success mt-5">Valider ma balade</button>
                </div>

</section>