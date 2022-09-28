                <!-- Nav bar en mode < 576 px  -->
                <div class="container-fluid headerColor">
    <nav class="navbar navbar-expand-lg justify-content-arround text-dark  navBarSm">
        <div class="container-fluid justify-content-between ">
            <a  href="../controllers/parameters-controller.php" class="bi bi-gear gear text-dark img-fluid bootIcons" ></a>
            <div>
                    <a  class="link" href="../controllers/pages-controller.php"><h1 class="title text-dark">WALKYZ </h1></a>

            </div>
            
            <button class="navbar-toggler buttonNav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon iconNav"></span>
            </button>
                <div class="collapse navbar-collapse text-end" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item dropdown ">
                            <ul  class="list-unstyled" aria-labelledby="navbarDropdown ">
                                <li><a class="dropdown-item" href="/controllers/dogProfil-controller.php">profil</a></li>
                                <li><a class="dropdown-item" href="/controllers/forgotPassword-controller.php">mot de passe oublié</a></li>
                                <li><a class="dropdown-item" href="/controllers/signUp-controller.php">Inscription</a></li>
                                <li><a class="dropdown-item" href="/controllers/signIn-controller.php">Connexion</a></li>
                                <li><a class="dropdown-item" href="/controllers/contact-controller.php">Contactez-nous</a></li>
                            </ul>
                        </li>
                    </ul>
            </div>

        </div>
    </nav>
</div>


                        <!-- Nav bar en mode > 576 px  -->
<div class="container-fluid headerColor navBarLg">
    <nav class="navbar text-center">
        <div class="container-fluid justify-content-arround  ">
                <a href="../controllers/pages-controller.php"><img src="../public/assets/img/Logo.png" class="logo"  alt="logo de l'équipe 22 avec style, une chaussure multicolor"></a>
            <div>
                <a  class="link" href="../controllers/pages-controller.php"><h1 class="title text-dark">WALKYZ </h1></a>
                <a  class="link" href="../controllers/pages-controller.php"><h3 class="text-dark">Le rendez-vous balade</h3></a>
            </div>
            
                <a  href="../controllers/parameters-controller.php" class="bi bi-gear gear text-dark bootIcons" ></a>
        </div>
    </nav>
        <div class=" d-flex justify-content-around w-100">
            <p><a class="text-decoration-none text-dark" href="/controllers/dogProfil-controller.php">profil </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/forgotPassword-controller.php">mot de passe oublie </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/signUp-controller.php">Inscription </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/signIn-controller.php">Connexion </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/contact-controller.php">Contactez-nous </a></p>
        </div>
    
</div>
