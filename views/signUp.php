
<section class="container">
    <h1 class="title text-center my-5"><?= (isset($id_consumer)) ? 'Modifier' : 'Créer' ?> votre profil </h1>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 ">
            <img class="img-fluid rounded" src="../public/assets/img/coupleWalk.jpg" alt="couple marchant avec son chien">
        </div>

    </div>
        <div class="text-center">
            <h2 class="my-5">1 Vos informations de connexion</h2>
        </div>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="formsignUp">
            <!-- Adresse mail -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7 ">
                    <div class="mb-4">
                        <!-- Champs email -->
                        <input required aria-describedby="emailHelp" 
                        type="email"
                        name="mail"
                        id="mail" 
                        value="<?= htmlentities($_SESSION['consumer']->mail ?? '') ?>" 
                        class="form-control" 
                        placeholder="Votre E-mail*" 
                        autocomplete="email">
                    </div>
                    <div class="error text-danger"><p><?=$error['mail'] ?? ''?></p></div>
                </div>
                
            </div>

<?php if(!isset($_SESSION['consumer']->password)) {?>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Password -->
                        <input type="password"
                        name="password"     
                        id="password" 
                        class="form-control" 
                        placeholder="Mot de passe**" 
                        pattern="^<?= REGEX_PASSWORD ?>">
                        <p class="required">** Doit contenir une majuscule, une minuscule, un chiffre et faire minimum 8 caracteres</p>
                        <div class="error text-danger"><?= $error['password'] ?? ''?></div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7 ">
                    <div class="mb-4">
                        <!-- Password -->
                        <input type="password" 
                        name="passwordConfirm" 
                        id="passwordConfirm" 
                        class="form-control" 
                        placeholder="Confirmation MDP**" 
                        pattern="^<?= REGEX_PASSWORD ?>">
                        <p class="required">** Doit contenir une majuscule, une minuscule, un chiffre et faire minimum 8 caracteres</p>
                        <div class="error text-danger"><?=$error['password'] ?? ''?></div>
                    </div>
                </div>
            </div>
<?php } ?>
            <div class="text-center">
                <h2 class="my-5">2 Vos informations personnelles</h2>
            </div>
            <!-- Civilité -->
            <div class="col my-5 text-center justify-content-center">
                <label class="my-3 fs-4">Votre civilité </label>
                <div class="form-check d-flex justify-content-center ">
                    <input 
                    class="form-check-input" 
                    type="radio" 
                    name="civility" 
                    id="civility0" 
                    value="0" <?= (isset($_SESSION['consumer']->civility) && $_SESSION['consumer']->civility == 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="civility0">
                        FEMME
                    </label>
                </div>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="civility" id="civility1" value="1" <?= (isset($_SESSION['consumer']->civility) && $_SESSION['consumer']->civility == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="civility1">
                        HOMME
                    </label>
                </div>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="radio" name="civility" id="civility2" value="2" <?= (isset($_SESSION['consumer']->civility) && $_SESSION['consumer']->civility == 2) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="civility2">
                        AUTRE
                    </label>
                </div>
                <div class="error text-danger"><?=$error['civility'] ?? ''?></div>
            </div>
            <!-- fin de la civilité  -->


            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs prénom -->
                        <input required aria-describedby="firstnameHelp" type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez votre prénom*" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="first-name" value="<?= htmlentities($_SESSION['consumer']->firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <div class="error text-danger"><?=$error['firstname'] ?? ''?></div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs nom -->
                        <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname" title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($_SESSION['consumer']->lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <div class="error text-danger"><?=$error['lastname'] ?? ''?></div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-3">

                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs date de naissance -->
                        <label class="text-center" for="birthday">Date de naissance * </label>
                        <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($_SESSION['consumer']->birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp">
                        <div class="error text-danger"><?=$error['birthdate'] ?? ''?></div>
                    </div>
                </div>
            </div>


            <!-- Complement d'information pour le profil utilisateur-->

            <div class="text-center">
                <h2 class="my-5">2 Vos préférences de balade</h2>
            </div>
            <!-- Type de balade -->
            <div class="text-center">
                <h3 class="my-4">Quel type de balade souhaitez-vous faire ? </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="walk_type" id="walk_type0" value="0" <?= (isset($_SESSION['consumer']->walk_type) && $_SESSION['consumer']->walk_type == 0) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="walk_type0">
                            Courte balade (≃ 1h)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="walk_type" id="walk_type1" value="1" <?= (isset($_SESSION['consumer']->walk_type) && $_SESSION['consumer']->walk_type == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="walk_type1">
                            Longue balade (> 2h)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="walk_type" id="walk_type2" value="2" <?= (isset($_SESSION['consumer']->walk_type) && $_SESSION['consumer']->walk_type == 2) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="walk_type2">
                            Faire jouer nos chiens
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="walk_type" id="walk_type3" value="3" <?= (isset($_SESSION['consumer']->walk_type) && $_SESSION['consumer']->walk_type == 3) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="walk_type3">
                            Autre
                        </label>
                        <div class="error text-danger"><?=$error['walk_type'] ?? ''?></div>
                    </div>
                </div>
            </div>
                <!-- Quand la balade -->
                <div class="text-center">
                    <h3 class="my-4">Quand êtes-vous habituellement disponible</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 ">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot0" value="0" <?= (isset($_SESSION['consumer']->walk_time_slot) && $_SESSION['consumer']->walk_time_slot == 0) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="walk_time_slot0">
                                En semaine, pendant la journée
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot1" value="1" <?= (isset($_SESSION['consumer']->walk_time_slot) && $_SESSION['consumer']->walk_time_slot == 1) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="walk_time_slot1">
                                En semaine, le soir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot2" value="2" <?= (isset($_SESSION['consumer']->walk_time_slot) && $_SESSION['consumer']->walk_time_slot == 2) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="walk_time_slot2">
                                Le Week-end
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walk_time_slot" id="walk_time_slot3" value="3" <?= (isset($_SESSION['consumer']->walk_time_slot) && $_SESSION['consumer']->walk_time_slot == 3) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="walk_time_slot3">
                                Autre
                            </label>
                            <div class="error text-danger"><?=$error['walk_time_slot'] ?? ''?></div>
                        </div>
                    </div>
                    <div>

                        <div class="text-center">
                            <label class="bi bi-pen-fill mb-4" for="aboutU"> Votre description</label>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6">
                                <textarea class="form-control mt-3" name="walk_description" id="walk_description" rows="10" placeholder="Randonnée de plusieurs heures ou simplement lancer de frisbee dans le parc du village ? Parlez nous de vous et de ce que vous aimez faire avec votre chien  🐕‍🦺🚶‍♀️ "><?= $_SESSION['consumer']->walk_description ?? '' ?></textarea>
                                <div class="error text-danger"><?=$error['walk_description'] ?? ''?></div>
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
    </section>
