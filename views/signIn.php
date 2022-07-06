<div class="container">
    <div class="text-center">
        <!-- Changer la redirection vers le bon formulaire bg -->
        <a href="Connexion.html"><button type="button" class="btn btn-success mt-5">Pas encore inscrit ? C'est ici que ça se passe ! </button></a>


    </div>
    <div class="text-center">
        <h2 class="mt-5">Je me connecte</h2>
    </div>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
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
        <!-- Changer la redirection vers le bon formulaire bg -->
            <a href="#"><button type="button" class="btn btn-success mt-5">Connexion</button></a>
            <a href="/controllers/forgotPassword-controller.php"><p class="required">Mon chien a mangé mon mot de passe</p></a>
        </div>
</form>
