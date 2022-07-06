                <!-- Nav bar en mode < 576 px  -->
                <div>
    <nav class="navbar navbar-expand-lg text-center text-dark navBarSm">
        <div class="container-fluid justify-content-between ">
            <a  href="../controllers/parameters-controller.php" class="bi bi-gear gear text-dark img-fluid bootIcons" ></a>
            <div>
                    <a  class="link" href="../controllers/pages-controller.php"><h1 class="title text-dark">WALKYZ </h1></a>
                    <a  class="link" href="../controllers/pages-controller.php"><h3 class="text-dark">Le rendez-vous balade</h3></a>
            </div>
            
            <button class="navbar-toggler buttonNav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon iconNav <?=$btnClass?>"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item dropdown ">
                            <ul  class="list-unstyled" aria-labelledby="navbarDropdown ">
                                <li><a class="dropdown-item" href="../controllers/pages-controller.php?cat=global">Actualités générales</a></li>
                                <li><a class="dropdown-item" href="../controllers/pages-controller.php?cat=foot">Football</a></li>
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
<div>
    <nav class="navbar text-center <?=$bgClass?> navBarLg">
        <div class="container-fluid justify-content-between  w-100">
            <a href="../controllers/pages-controller.php"><img src="../public/assets/img/Logo.png" class="logo"  alt="logo de l'équipe 22 avec style, une chaussure multicolor"></a>
        <div>
            <a  class="link" href="../controllers/pages-controller.php"><h1 class="title text-dark">WALKYZ </h1></a>
            <a  class="link" href="../controllers/pages-controller.php"><h3 class="text-dark">Le rendez-vous balade</h3></a>
        </div>
        
            <a  href="../controllers/parameters-controller.php" class="bi bi-gear gear text-dark bootIcons" ></a>

        </div>
        <div class="<?=$txtClass?> d-flex justify-content-between w-100 mt-3">
            <p><a class="text-decoration-none text-dark" href="../controllers/pages-controller.php?cat=global">Actualités générales </a></p>
            <p><a class="text-decoration-none text-dark" href="../controllers/pages-controller.php?cat=foot">Football </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/signUp-controller.php">Inscription </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/signIn-controller.php">Connexion </a></p>
            <p><a class="text-decoration-none text-dark" href="/controllers/contact-controller.php">Contactez-nous </a></p>
        </div>
    </nav>
</div>