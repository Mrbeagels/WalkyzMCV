</body>
<footer class="container-fluid">
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-lg-4 d-flex justify-content-center">
        <img src="../public/assets/img/illufooter.png" class="img-fluid" alt="centre ville vivant pleins de gens et au millieu une dame rousse promene son chien">
        </div>
        <div class="col-12 col-lg-4  ">
            <ul class="text-center list-unstyled">
                <?php 
                    if(empty($_SESSION['consumer']))
                    {?>
                <li><a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">Faire une balade</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">Inscription</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/signIn-controller.php">Connexion</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/contact-controller.php">Contact</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/naws-controller.php">Actualité</a></li>
            
                <?php }else { ?>
                        <li>
                        <h4 class="text-dark fw-bold py-2">Les balades</h4>
                    </li>
                    <li><a class="text-decoration-none text-dark" href="../controllers/createWalk-controller.php">Créer une balade</a></li>
                    <li><a class="text-decoration-none text-dark" href="../controllers/listWalk-controller.php">Voir les balades</a></li>
                    <li><a class="text-decoration-none text-dark" href="../controllers/editWalk-controller.php">Modifier une balade</a></li>
                    <li>
                        <h4 class="text-dark fw-bold py-2">Mon chien</h4>
                    </li>
                    <li><a class="text-decoration-none text-dark" href="../controllers/dogProfil-controller.php">Créer son profil</a></li>
                    <li><a class="text-decoration-none text-dark" href="../controllers/editDog-controller.php">Modifier son profil</a></li>
                    <li>
                        <h4 class="text-dark fw-bold py-2">Informations complémentaires</h4>
                    </li>
                    <li><a class="text-decoration-none text-dark" href="../controllers/contact-controller.php">contactez-nous</a></li>
                    <li><a class="text-decoration-none text-dark" href="#bgHowItWork">Comment ça marche</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <a href="../controllers/pages-controller.php"><img src="../public/assets/img/Logo.png" class="img-fluid logofooter" alt="logo du site walkyz, une tête de chien orange et blanche"></a>
        </div>
    </div>
    <div class="row text-center mt-5">
        <div class="col-4"><a  class="text-decoration-none text-black" href="../controllers/CGU-controller.php">CGU</a></div>
        <div class="col-4"><p>Copyright Thibaud Marin 2022 pour l'examen de la Manu</p></div>
        <div class="col-4"><a class="text-decoration-none text-black"  href="../controllers/legalNotice-controller.php">Mention légales</a></div>
    </div>

</footer>
<!-- CDN js BOOTSTRAP -->
<!-- JavaScript Bundle with Popper -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- Mon script JS -->
<!-- <script src="../public/assets/js/script.js"></script> -->
</body>

</html>