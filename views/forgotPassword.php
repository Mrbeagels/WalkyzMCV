<div class="container">

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-7 text-center ">
            <div class="mb-4  ">
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="formsignUp">
                <!-- Champs email -->
                    <h1 class="mb-5">Mot de passe oublié</h1>
                    <input required aria-describedby="emailHelp" type="email" name="email" id="email" value="<?= htmlentities($email ?? '') ?>" class="form-control <?= isset($error['email']) ? 'errorField' : '' ?>" placeholder="Votre E-mail*" autocomplete="email">
                    <small id="emailHelp" class="form-text error"><?= $error['email'] ?? '' ?></small>
                    <p class="required">*Votre adresse mail est obligatoire</p>
                    <!-- Modal -->
                    <!-- Button trigger modal -->
                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <!-- probleme sur la modole -->
                        Envoyer
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Un mail de récupération de mot de passe vient d'être envoyé vers <span class="fw-bold"><?=$email?></span><br>
                                <span class="text-muted"> N'hésitez pas à consulter vos spams, cette opération peut prendre quelques minutes</span>  
                                </div>
                                <div class="modal-footer">
                                    <a href="/controllers/signIn-controller.php"><button type="button" class="btn btn-success">Retour a l'accueil</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>