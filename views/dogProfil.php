<div class="container">

    <div class="container">
        <!-- Profil canin -->
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
                        <input type="text" name="name" id="name" title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez son nom *" class="form-control <?= isset($error['name']) ? 'errorField' : '' ?>" autocomplete="name" value="<?= htmlentities($_SESSION['dog']->name ?? '') ?>" minlength="1" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs surnom -->
                        <input type="text" name="nickname" id="nickname" title="Veuillez entrer un surnom sans chiffres" placeholder="Entrez son surnom*" class="form-control <?= isset($error['nickname']) ? 'errorField' : '' ?>" autocomplete="name" value="<?= htmlentities($_SESSION['dog']->nickname ?? '') ?>" minlength="1" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="nicknameHelp" class="form-text error"><?= $error['nickname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs âge -->
                        <!-- Champs date de naissance -->
                    <label class="text-center" for="birthdate">Date de naissance * </label>
                    <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($_SESSION['consumer']->birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp">
                    <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs poids -->
                        <input type="number" name="weight" id="weight" title="Entrez son poids" placeholder="Entrez son poids*" class="form-control <?= isset($error['weight']) ? 'errorField' : '' ?>" autocomplete="weight" value="<?= htmlentities($_SESSION['dog']->weight ?? '') ?>" minlength="1" maxlength="3" pattern="<?= REGEX_AGE ?>">
                    <small id="weightHelp" class="form-text error"><?= $error['weight'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- race nom -->
                        <input type="text" name="breed" id="breed" title="Veuillez entrer une race sans chiffres" placeholder="Entrez sa race*" class="form-control <?= isset($error['breed']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($_SESSION['dog']->breed ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="breedHelp" class="form-text error"><?= $error['breed'] ?? '' ?></small>
                    </div>
                </div>
            </div>

            <!-- stats -->
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <h3 class="my-4 text-center">Comment definiriez vous le caractère de votre chien avec les humains ?</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats" id="stats0" value="0" <?= (isset($_SESSION['dog']->stats) && $_SESSION['dog']->stats == 0) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="stats0">
                            Dominant
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats" id="stats1" value="1" <?= (isset($_SESSION['dog']->stats) && $_SESSION['dog']->stats == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="stats1">
                            Passif-Agressif
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats" id="stats2" value="2" <?= (isset($_SESSION['dog']->stats) && $_SESSION['dog']->stats == 2) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="stats2">
                            Timide
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats" id="stats3" value="3" <?= (isset($_SESSION['dog']->stats) && $_SESSION['dog']->stats == 3) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="stats3">
                            Amical
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats" id="stats3" value="3" <?= (isset($_SESSION['dog']->stats) && $_SESSION['dog']->stats == 3) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="stats3">
                            Indépendant
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats" id="stats4" value="4" <?= (isset($_SESSION['dog']->stats) && $_SESSION['dog']->stats == 4) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="stats4">
                            Joueur
                        </label>
                    </div>

                    <!-- behavior -->
                    <div class="text-center">
                        <h3 class="my-4">Quel est son comportement vis a vis des autres chiens ?</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="behavior" id="behavior0" value="0" <?= (isset($_SESSION['dog']->behavior) && $_SESSION['dog']->behavior == 0) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="behavior0">
                                    Joueur
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="behavior" id="behavior1" value="1" <?= (isset($_SESSION['dog']->behavior) && $_SESSION['dog']->behavior == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="behavior1">
                                    très peu interessé par les autres chiens
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="behavior" id="behavior2" value="2" <?= (isset($_SESSION['dog']->behavior) && $_SESSION['dog']->behavior == 2) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="behavior2">
                                    Il préfére faire sa vie de son côté
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="behavior" id="behavior3" value="3" <?= (isset($_SESSION['dog']->behavior) && $_SESSION['dog']->behavior == 3) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="behavior3">
                                    Se comporte mal avec les autres chiens
                                </label>
                            </div>

                                <div class="text-center">
                                    <label class="bi bi-pen-fill my-4" for="aboutU">La description de votre chien</label>
                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <textarea class="form-control mt-3" name="description" id="description" rows="10" placeholder="Plutôt du genre à passer sa journée devant la cheminée ou à rester dans le jardin pendant des heures a chasser les nuages ? Présentez ici votre doggo ! 🐕‍🦺🚶‍♀️ "><?= $_SESSION['dog']->description ?? '' ?></textarea>
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
