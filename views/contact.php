
<h1 class="text-center">Comment nous joindre</h1>
<div class="container my-5">
    <div class="d-flex justify-content-around text-center">

        <div>
            <a href="mailto:thibaud.marin1@gmail.com"><span class="bi bi-envelope bootIcons"></span></a>
            <a class="link text-dark" href="mailto:thibaud.marin1@gmail.com">
                <p>Une question ?</p>
            </a>
        </div>

        <div>
            <a href="#logoFooter"> <span class="bi bi-twitter bootIcons"></span></a>
            <a class="link text-dark" href="#logoFooter">
                <p>Nos réseaux</p>
            </a>
        </div>

        <div>
            <a href="tel:+3366109521"><span class="bi bi-phone bootIcons"></span></a>
            <a class="link text-dark" href="tel:+3366109521">
                <p>Par téléphone</p>
            </a>
        </div>
    </div>
</div>






<div class="text-center mb-5">
    <h2>Une question ?</h2>
</div>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="formContact ">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <!-- Champs email -->
                    <input required aria-describedby="emailHelp" type="email" name="email" id="email" value="<?= htmlentities($email ?? '') ?>" class="form-control <?= isset($error['email']) ? 'errorField' : '' ?>" placeholder="Votre E-mail*" autocomplete="email">
                    
                    <small id="emailHelp" class="form-text error"><?= $error['email'] ?? '' ?></small>
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <!-- Champs nom -->
                    <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname" title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                    <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col">
                    <textarea class="form-control mt-3" name="contact" id="contact" rows="10" placeholder="Une remarque ? Une question ? Vous chercher a proposer un coin de balade, n'hésitez pas c'est ici que ça se passe 🐶 "><?= $experience ?? '' ?></textarea>
                    <small class="form-text error"><?= $error['experience'] ?? '' ?></small>
                </div>
            </div>

            <div class="text-center">
            <input type="submit" value="Envoyer" class="btn btn-primary mt-3" id="validForm">
            </div>
    </div>
        
</form>