



<div class="container">
    <div class="text-center">
        <h1><?= (isset($id)) ? 'Modifier' : 'Créer'?> votre profil et decouvrez les membres près de chez vous gratuitement <br> <small class="text-muted">Rejoignez une importante communauté de passionnés</small> </h1>
    </div>
    <div class="text-center">
        <h2 class="m-5">1.Vos informations de connexion</h2>
    </div>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="formsignUp">
        <!-- Adresse mail -->
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <!-- Champs email -->
                    <input required aria-describedby="emailHelp" type="email" name="mail" id="mail" value="<?= htmlentities($consumer->mail ?? '') ?>" class="form-control <?= isset($error['mail']) ? 'errorField' : '' ?>" placeholder="Votre E-mail*" autocomplete="email">
                    <small id="emailHelp" class="form-text error"><?= $error['mail'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>


        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <div class="mb-4">
                    <!-- Password -->
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe**" pattern="^<?= REGEX_PASSWORD ?>">
                    <p class="required">** Doit contenir une majuscule, une minuscule, un chiffre et faire minimum 8 caracteres</p>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
                <div class="mb-4">
                    <!-- Password -->
                    <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" placeholder="Confirmation MDP**" pattern="^<?= REGEX_PASSWORD ?>">
                    <p class="required">** Doit contenir une majuscule, une minuscule, un chiffre et faire minimum 8 caracteres</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h2 class="m-5">2.Vos informations personnelles</h2>
        </div>
        <!-- Civilité -->
        <div class="col my-5 text-center justify-content-center">
            <label class="my-3 fs-4">Votre civilité </label>
            <div class="form-check d-flex justify-content-center ">
                <input class="form-check-input" type="radio" name="civility" id="civility0" value="0" <?= (isset($consumer->civility) && $consumer->civility == 0) ? 'checked' : '' ?>>
                <label class="form-check-label" for="civility0">
                    FEMME
                </label>
            </div>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="radio" name="civility" id="civility1" value="1" <?= (isset($consumer->civility) && $consumer->civility == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="civility1">
                    HOMME
                </label>
            </div>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="radio" name="civility" id="civility2" value="2" <?= (isset($consumer->civility) && $consumer->civility == 2) ? 'checked' : '' ?>>
                <label class="form-check-label" for="civility2">
                    AUTRE
                </label>
            </div>
            <small class="form-text error"><?= $error['civility'] ?? '' ?></small>
        </div>
        <!-- fin de la civilité  -->


        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs prénom -->
                    <input required aria-describedby="firstnameHelp" type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez votre prénom*" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="first-name" value="<?= htmlentities($consumer->firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                    <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                </div>
            </div>
            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs nom -->
                    <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname" title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($consumer->lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                    <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">

            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs date de naissance -->
                    <label class="text-center" for="birthday">Date de naissance * </label>
                    <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($consumer->birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp">
                    <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                </div>
            </div>
        </div>


        <div class="text-center">
            <input type="submit" value="Envoyer" class="btn btn-primary mt-3" id="validForm">
        </div>

</div>
<!-- Complement d'information pour le profil utilisateur-->

<div class="text-center">
    <h1>Votre profil</h1>
</div>
<!-- Type de balade -->
<div class="text-center">
    <h3>Quel type de balade souhaitez-vous faire ? </h3>
</div>
<div class="row">
    <div class="col">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="walk_type" id="walk_type0" value="0" <?= (isset($consumer->walk_type) && $consumer->walk_type == 0) ? 'checked' : '' ?>>
            <label class="form-check-label" for="walk_type0">
                Courte balade (≃ 1h)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="walk_type" id="walk_type1" value="1" <?= (isset($consumer->walk_type) && $consumer->walk_type == 1) ? 'checked' : '' ?>>
            <label class="form-check-label" for="walk_type1">
                Longue balade (> 2h)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="walk_type" id="walk_type2" value="2" <?= (isset($consumer->walk_type) && $consumer->walk_type == 2) ? 'checked' : '' ?>>
            <label class="form-check-label" for="walk_type2">
                Faire jouer nos chiens
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="walk_type" id="walk_type3" value="3" <?= (isset($consumer->walk_type) && $consumer->walk_type == 3) ? 'checked' : '' ?>>
            <label class="form-check-label" for="walk_type3">
                Autre
            </label>
        </div>
        <!-- Quand la balade -->
        <div class="text-center">
            <h3>Quand êtes-vous habituellement disponible</h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot0" value="0" <?= (isset($consumer->walk_time_slot) && $consumer->walk_time_slot == 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="walk_time_slot0">
                        En semaine, pendant la journée
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot1" value="1" <?= (isset($consumer->walk_time_slot) && $consumer->walk_time_slot == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="walk_time_slot1">
                        En semaine, le soir
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot2" value="2" <?= (isset($consumer->walk_time_slot) && $consumer->walk_time_slot == 2) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="walk_time_slot2">
                        Le Week-end
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot3" value="3" <?= (isset($consumer->walk_time_slot) && $consumer->walk_time_slot == 3) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="walk_time_slot3">
                        Autre
                    </label>
                </div>
            </div>
            <div>

                <div class="text-center">
                    <label class="bi bi-pen-fill mb-4" for="aboutU"> Votre description</label>
                </div>
                <div class="row">
                    <div class="col">
                        <textarea class="form-control mt-3" name="walk_description" id="walk_description" rows="10" placeholder="Randonnée de plusieurs heures ou simplement lancer de frisbee dans le parc du village ? Parlez nous de vous et de ce que vous aimez faire avec votre chien  🐕‍🦺🚶‍♀️ "><?= $consumer->walk_description ?? '' ?></textarea>
                        <small class="form-text error"><?= $error['walk_description'] ?? '' ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success mt-5">Valider son profil</button>
    </div>
    </form>
    <p class="required">* Champs obligatoires</p>
    <p class="required">** Doit contenir une majuscule, une minuscule, un chiffre et faire minimum 8 caracteres</p>
</div>
