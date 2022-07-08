<div class="container">


    <div class="container">
        <!-- Profil humain -->
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
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
                    </div>
                    <!-- Quand la balade -->
                    <div class="text-center">
                        <h3>Quand êtes-vous habituellement disponible</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="whenWalkyz" id="whenWalkyz0" value="0" <?= (isset($whenWalkyz) && $whenWalkyz == 0) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="whenWalkyz0">
                                    En semaine, pendant la journée
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="whenWalkyz" id="whenWalkyz1" value="1" <?= (isset($whenWalkyz) && $whenWalkyz == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="whenWalkyz1">
                                    En semaine, le soir
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="whenWalkyz" id="whenWalkyz2" value="2" <?= (isset($whenWalkyz) && $whenWalkyz == 2) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="whenWalkyz2">
                                    Le Week-end
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="whenWalkyz" id="whenWalkyz3" value="3" <?= (isset($whenWalkyz) && $whenWalkyz == 3) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="whenWalkyz3">
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
                                    <textarea class="form-control mt-3" name="description" id="description" rows="10" placeholder="Randonnée de plusieurs heures ou simplement lancer de frisbee dans le parc du village ? Parlez nous de vous et de ce que vous aimez faire avec votre chien  🐕‍🦺🚶‍♀️ "><?= $description ?? '' ?></textarea>
                                    <small class="form-text error"><?= $error['description'] ?? '' ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center my-3">
                    <h2>Le profil de votre chien</h2>
                </div>
            </div>

            <!-- profil canin -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs prénom -->
                        <input required aria-describedby="firstnameHelp" type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez son nom *" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="name" value="<?= htmlentities($firstname ?? '') ?>" minlength="1" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs surnom -->
                        <input required aria-describedby="nicknameHelp" type="text" name="nickname" id="nickname" title="Veuillez entrer un surnom sans chiffres" placeholder="Entrez son surnom*" class="form-control <?= isset($error['nickname']) ? 'errorField' : '' ?>" autocomplete="name" value="<?= htmlentities($nickname ?? '') ?>" minlength="1" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="nicknameHelp" class="form-text error"><?= $error['nickname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs âge -->
                        <input required aria-describedby="ageHelp" type="number" name="age" id="age" title="Veuillez entrer un âge" placeholder="Entrez son âge*" class="form-control <?= isset($error['age']) ? 'errorField' : '' ?>" autocomplete="age" value="<?= htmlentities($age ?? '') ?>" minlength="1" maxlength="3" pattern="<?= REGEX_AGE ?>>
                    <small id=" ageHelp" class="form-text error"><?= $error['age'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs âge -->
                        <input required aria-describedby="ageHelp" type="number" name="weight" id="weight" title="Entrez son poids" placeholder="Entrez son poids*" class="form-control <?= isset($error['weight']) ? 'errorField' : '' ?>" autocomplete="weight" value="<?= htmlentities($weight ?? '') ?>" minlength="1" maxlength="3" pattern="<?= REGEX_AGE ?>>
                    <small id="weightHelp" class="form-text error"><?= $error['weight'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-7">
                    <div class="mb-4">
                        <!-- race nom -->
                        <input required aria-describedby="dogBreedHelp" type="text" name="dogBreed" id="dogBreed" title="Veuillez entrer une race sans chiffres" placeholder="Entrez sa race*" class="form-control <?= isset($error['dogBreed']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($dogBreed ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="dogBreedHelp" class="form-text error"><?= $error['dogBreed'] ?? '' ?></small>
                    </div>
                </div>
            </div>

            <!-- dogStats -->
            <div class="text-center">
                <h3>Comment definiriez vous le caractère de votre chien avec les humains ?</h3>
            </div>
            <div class="row">
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
                                        <textarea class="form-control mt-3" name="dogDescription" id="dogDescription" rows="10" placeholder="Plutôt du genre à passer sa journée devant la cheminée ou a rester dans le jardin pendant des heures a chasser les nuages ? présentez ici votre doggo ! 🐕‍🦺🚶‍♀️ "><?= $dogDescription ?? '' ?></textarea>
                                        <small class="form-text error"><?= $error['dogDescription'] ?? '' ?></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-4">
                                            <input class="form-control" type="file" id="filePicture" aria-describedby="filePictureHelp" placeholder="Photo de profil" accept="image/png, image/jpeg" name="filePicture">
                                            <small id="filePictureHelp" class="form-text error"><?= $error['filePicture'] ?? '' ?></small>
                                        </div>
                                    </div>
                                </div>





                                <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-5">Retour à la page d'accueil</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>