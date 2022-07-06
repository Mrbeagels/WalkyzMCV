<div class="container">
    <div class="text-center">
        <h1>Créez votre profil et decouvrez les membres près de chez vous gratuitement <br> <small class="text-muted">Rejoignez une importante communauté de passionnés</small> </h1>
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
                    <input required aria-describedby="emailHelp" type="email" name="email" id="email" value="<?= htmlentities($email ?? '') ?>" class="form-control <?= isset($error['email']) ? 'errorField' : '' ?>" placeholder="Votre E-mail*" autocomplete="email">
                    <small id="emailHelp" class="form-text error"><?= $error['email'] ?? '' ?></small>
                    <p class="required">* Champs obligatoires</p>
                </div>
            </div>
        </div>


        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7 ">
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
                    <input class="form-check-input" type="radio" name="civility" id="civility0" value="0" <?= (isset($civility) && $civility == 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="civility0">
                        FEMME
                    </label>
                </div>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="civility" id="civility1" value="1" <?= (isset($civility) && $civility == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="civility1">
                        HOMME
                    </label>
                </div>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="civility" id="civility2" value="2" <?= (isset($civility) && $civility == 2) ? 'checked' : '' ?>>
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
                    <input required aria-describedby="firstnameHelp" type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez votre prénom*" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="first-name" value="<?= htmlentities($firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                    <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                </div>
            </div>
            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs nom -->
                    <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname" title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                    <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">

            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs date de naissance -->
                    <label class="text-center" for="birthday">Date de naissance * </label>
                    <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp">
                    <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                </div>
            </div>

            <div class="col-7">
                <div class="mb-4">
                    <!-- Zip code -->
                    <input type="text" class="form-control" name="zipCode" id="zipCode" aria- describedby="zipCodeHelp" placeholder="Code postal" pattern="[0-9]{5}">
                    <small id="zipCodeHelp" class="form-text error"><?= $error['zipCode'] ?? '' ?></small>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs ville -->
                    <input required aria-describedby="cityHelp" type="text" name="city" id="city" title="Veuillez entrer un nom de ville" placeholder="Entrez votre ville*" class="form-control <?= isset($error['city']) ? 'errorField' : '' ?>" autocomplete="city-name" value="<?= htmlentities($city ?? '') ?>" minlength="1" maxlength="50">
                    <small id="cityHelp" class="form-text error"><?= $error['city'] ?? '' ?></small>
                </div>
            </div>
            <div class="col-7">
                <div class="mb-4">
                    <!-- Champs adresse -->
                    <input required aria-describedby="addressHelp" type="text" name="address" id="address" title="Veuillez entrer votre adresse" placeholder="Entrez votre adresse*" class="form-control <?= isset($error['address']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($address ?? '') ?>" minlength="2" maxlength="250">
                    <small id="addressHelp" class="form-text error"><?= $error['address'] ?? '' ?></small>
                </div>
            </div>
                
                <div class="text-center">
                    <input type="submit" value="Envoyer" class="btn btn-primary mt-3" id="validForm">
                </div>

        </div>
    </form>
    <p class="required">* Champs obligatoires</p>
    <p class="required">** Doit contenir une majuscule, une minuscule, un chiffre et faire minimum 8 caracteres</p>





</div>