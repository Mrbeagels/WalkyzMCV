<div class="container">

    <div class="container">
        <!-- Profil humain -->
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="background-color:red; height: 200px; margin: 15px;"></div>
                    <div class="col-md-12 col-sm-6 col-xs-12" style="background-color:blue; height: 400px; margin: 15px;"></div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="background-color:yellow; height: 300px; margin: 15px;"></div>
                    <div class="col-md-12 col-sm-6 col-xs-12 profilPicNone" style="background-color:black; height: 300px; margin: 15px;"></div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 col-sm-6 col-xs-12 profilPicNone" style="background-color:grey; height: 200px; margin: 15px;"></div>
                    <div class="col-md-12 col-sm-6 col-xs-12 profilPicNone" style="background-color:green; height: 400px; margin: 15px;"></div>
                </div>
            </div>

                <div class="text-center my-3">
                    <h2>Le profil de votre chien</h2>
                    <p>parlez nous de votre compagnons ! 🐶 </p>
                </div>
            </div>

            <!-- profil canin -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs prénom -->
                        <input type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez son nom *" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="name" value="<?= htmlentities($firstname ?? '') ?>" minlength="1" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs surnom -->
                        <input type="text" name="nickname" id="nickname" title="Veuillez entrer un surnom sans chiffres" placeholder="Entrez son surnom*" class="form-control <?= isset($error['nickname']) ? 'errorField' : '' ?>" autocomplete="name" value="<?= htmlentities($nickname ?? '') ?>" minlength="1" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="nicknameHelp" class="form-text error"><?= $error['nickname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs âge -->
                        <input type="number" name="age" id="age" title="Veuillez entrer un âge" placeholder="Entrez son âge*" class="form-control <?= isset($error['age']) ? 'errorField' : '' ?>" autocomplete="age" value="<?= htmlentities($age ?? '') ?>" minlength="1" maxlength="3" pattern="<?= REGEX_AGE ?>">
                    <small id=" ageHelp" class="form-text error"><?= $error['age'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs poids -->
                        <input type="number" name="weight" id="weight" title="Entrez son poids" placeholder="Entrez son poids*" class="form-control <?= isset($error['weight']) ? 'errorField' : '' ?>" autocomplete="weight" value="<?= htmlentities($weight ?? '') ?>" minlength="1" maxlength="3" pattern="<?= REGEX_AGE ?>">
                    <small id="weightHelp" class="form-text error"><?= $error['weight'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- race nom -->
                        <input type="text" name="dogBreed" id="dogBreed" title="Veuillez entrer une race sans chiffres" placeholder="Entrez sa race*" class="form-control <?= isset($error['dogBreed']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($dogBreed ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="dogBreedHelp" class="form-text error"><?= $error['dogBreed'] ?? '' ?></small>
                    </div>
                </div>
            </div>

            <!-- dogStats -->
            <div class="text-center">
                <h3>Comment definiriez vous le caractère de votre chien avec les humains ?</h3>
            </div>
            <div class="row ">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dogStats" id="dogStats0" value="0" <?= (isset($dogStats) && $dogStats == 0) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="dogStats0">
                            Dominant
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dogStats" id="dogStats1" value="1" <?= (isset($dogStats) && $dogStats == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="dogStats1">
                            Passif-Agressif
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dogStats" id="dogStats2" value="2" <?= (isset($dogStats) && $dogStats == 2) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="dogStats2">
                            Timide
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dogStats" id="dogStats3" value="3" <?= (isset($dogStats) && $dogStats == 3) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="dogStats3">
                            Amical
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dogStats" id="dogStats3" value="3" <?= (isset($dogStats) && $dogStats == 3) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="dogStats3">
                            Indépendant
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dogStats" id="dogStats4" value="4" <?= (isset($dogStats) && $dogStats == 4) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="dogStats4">
                            Joueur
                        </label>
                    </div>

                    <!-- dogBehavior -->
                    <div class="text-center">
                        <h3>Quel est son comportement vis a vis des autres chiens ?</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dogBehavior" id="dogBehavior0" value="0" <?= (isset($dogBehavior) && $dogBehavior == 0) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="dogBehavior0">
                                    Joueur
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dogBehavior" id="dogBehavior1" value="1" <?= (isset($dogBehavior) && $dogBehavior == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="dogBehavior1">
                                    très peu interessé par les autres chiens
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dogBehavior" id="dogBehavior2" value="2" <?= (isset($dogBehavior) && $dogBehavior == 2) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="dogBehavior2">
                                    Il préfére faire sa vie de son côté
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dogBehavior" id="dogBehavior3" value="3" <?= (isset($dogBehavior) && $dogBehavior == 3) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="dogBehavior3">
                                    Se comporte mal avec les autres chiens
                                </label>
                            </div>

                                <div class="text-center">
                                    <label class="bi bi-pen-fill mb-4" for="aboutU">La description de votre chien</label>
                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <textarea class="form-control mt-3" name="description" id="description" rows="10" placeholder="Plutôt du genre à passer sa journée devant la cheminée ou à rester dans le jardin pendant des heures a chasser les nuages ? Présentez ici votre doggo ! 🐕‍🦺🚶‍♀️ "><?= $description ?? '' ?></textarea>
                                        <small class="form-text error"><?= $error['description'] ?? '' ?></small>
                                    </div>
                                </div>
                                <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-5">Valider son profil</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
