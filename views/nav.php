<!-- Nav bar en mode < 576 px  -->
<div class="container-fluid headerColor">
    <nav class="navbar navbar-expand-lg justify-content-arround text-dark  navBarSm">
        <div class="container-fluid justify-content-between ">
            <?php
            if (empty($_SESSION['consumer'])) { ?>
                <a href="../controllers/signUp-controller.php" class="bi bi-person-circle text-dark img-fluid bootIcons"></a>
            <?php }
            if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
                <!-- <a href="../controllers/signUp-controller.php" class="bi bi-person-check-fill text-dark img-fluid bootIcons"></a> -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-success dropdown-toggle bi bi-person-check-fill" data-bs-toggle="dropdown" aria-expanded="false">
                        
                    </button>
                    <ul class="dropdown-menu bg-success" style="--bs-bg-opacity : .5">
                        <a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">
                                <li> Modifier mon profil</ li>
                            </a>
                            <a class="text-decoration-none text-dark" href="../controllers/signOut-controller.php">
                                <li> Déconnexion</ li>
                            </a>
                            <a class="text-decoration-none text-dark" href="../controllers/news-controller.php">
                                <li> Actualités</ li>
                            </a>
                    </ul>
                </div>
            <?php }
            if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>
                <a href="../controllers/signUp-controller.php" class="bi bi-person-workspace text-dark img-fluid bootIcons"></a>
            <?php }
            ?>
            <div>
                <a class="link" href="../controllers/pages-controller.php">
                    <h1 class="title text-dark">WALKYZ </h1>
                </a>
            </div>

            <button class="navbar-toggler buttonNav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon iconNav"></span>
            </button>
            <div class="collapse navbar-collapse text-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item dropdown ">
                        <ul class="list-unstyled" aria-labelledby="navbarDropdown ">
                            <?php
                            if (empty($_SESSION['consumer'])) { ?>
                                <li><a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">Faire une balade</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">Inscription</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/signIn-controller.php">Connexion</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/contact-controller.php">Contact</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/naws-controller.php">Actualité</a></li>
                            <?php
                            }
                            if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
                                <li>
                                    <h4 class="text-dark fw-bold">Les balades</h4>
                                </li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/createWalk-controller.php">Créer une balade</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/listWalkConsumer-controller.php">Voir les balades</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/editWalk-controller.php">Modifier une balade</a></li>
                                <li>
                                    <h4 class="text-dark fw-bold">Mon chien</h4>
                                </li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/dogProfil-controller.php">Créer son profil</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/editDog-controller.php">Modifier son profil</a></li>
                                <li>
                                    <h4 class="text-dark fw-bold">Informations complémentaires</h4>
                                </li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/contact-controller.php">contactez-nous</a></li>
                                <li><a class="text-decoration-none text-dark" href="#bgHowItWork">Comment ça marche</a></li>

                            <?php
                            }
                            if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>
                                <li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/listWalk-controller.php">Dashboard Balade</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/listDog-controller.php">Dashboard chien</a></li>
                                <li><a class="text-decoration-none text-dark" href="../controllers/listConsumer-controller.php">Dashboard utilisateur</a></li>
                    </li>
                <?php
                            }
                ?>

                </ul>
                </li>
                </ul>
            </div>

        </div>
    </nav>
</div>

<!-- Nav bar en mode > 576 px  -->
<div class="container-fluid headerColor navBarLg">
    <nav class="navbar text-center justify-content-center">
        <div class="container-fluid justify-content-arround  ">
            <a href="../controllers/pages-controller.php"><img src="../public/assets/img/Logo.png" class="logo" alt="Walkyz son logo orange si charismatique, on a envie de faire des bisous sur cette tête de dougy"></a>
            <div>
                <a class="link" href="../controllers/pages-controller.php">
                    <h1 class="title text-dark">WALKYZ </h1>
                </a>
                <a class="link" href="../controllers/pages-controller.php">
                    <h3 class="text-dark">Le rendez-vous balade</h3>
                </a>
            </div>
            <!-- Bouton users -->
            <div>
                <?php
                if (empty($_SESSION['consumer'])) { ?>
                    <a href="../controllers/signUp-controller.php" class="bi bi-person-circle text-dark img-fluid bootIcons"></a>
                <?php }
                if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
                    <!-- <a href="../controllers/signUp-controller.php" class="bi bi-person-check-fill text-dark img-fluid bootIcons" ></a> -->
                    <div class="btn-group dropstart">
                        <button type="button" class="btn btn-success dropdown-toggle bi bi-person-check-fill" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bi bi-person-check-fill"></span>
                        </button>
                        <ul class="dropdown-menu bg-success" style="--bs-bg-opacity : .5">
                            <a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">
                                <li> Modifier mon profil</ li>
                            </a>
                            <a class="text-decoration-none text-dark" href="../controllers/signOut-controller.php">
                                <li> Déconnexion</ li>
                            </a>
                            <a class="text-decoration-none text-dark" href="../controllers/news-controller.php">
                                <li> Actualités</ li>
                            </a>
                        </ul>
                    </div>
                <?php }
                if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>
                    <!-- <a href="../controllers/signUp-controller.php" class="bi bi-person-workspace text-dark img-fluid bootIcons"></a> -->
                    <div class="btn-group dropstart">
                        <button type="button" class="btn btn-success dropdown-toggle bi bi-person-check-fill" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bi bi-person-workspace"></span>
                        </button>
                        <ul class="dropdown-menu bg-success" style="--bs-bg-opacity : .5">
                            <a class="text-decoration-none text-dark" href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=walkyz&table=users">
                                <li>Accès à la base de donnée</ li>
                            </a>
                            <a class="text-decoration-none text-dark" href="../controllers/signOut-controller.php">
                                <li>Déconnexion</ li>
                            </a>

                        </ul>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </nav>
    <!-- Debut des onglets de navigation  -->
    <div class=" d-flex justify-content-between pb-4 ">
        <?php
        if (empty($_SESSION['consumer'])) { ?>
            <p><a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">Créer ma première balade</a></p>
        <?php
        }
        if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
            <div class="dropdown">
                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Les balades
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../controllers/createWalk-controller.php">Créer une nouvelle balade</a></li>
                    <li><a class="dropdown-item" href="../controllers/listWalkConsumer-controller.php">Voir les balades</a></li>
                    <li><a class="dropdown-item" href="../controllers/editWalk-controller.php">Modifier une balade</a></li>
                </ul>
            </div>
        <?php
        }
        if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Les balades
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../controllers/createWalk-controller.php">Créer une nouvelle balade</a></li>
                    <li><a class="dropdown-item" href="../controllers/listWalk-controller.php">DashBoard des balades</a></li </ul>
            </div>
        <?php
        }


        if (empty($_SESSION)) {
        ?>
            <p><a class="text-decoration-none text-dark" href="../controllers/signUp-controller.php">Inscription</a></p>
        <?php
        }
        if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
            <div class="dropdown">
                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mon chien
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../controllers/dogProfil-controller.php">Créer le profil de mon chien</a></li>
                    <li><a class="dropdown-item" href="../controllers/editDog-controller.php">Modifier le profil de mon chien</a></li>
                </ul>
            </div>
        <?php
        }
        if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>
            <div class="dropdown">
                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Les chiens
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../controllers/listDog-controller.php">DashBoard des doggos</a></li>
                </ul>
            </div>
        <?php }


        if (empty($_SESSION)) { ?>
            <p><a class="text-decoration-none text-dark" href="../controllers/signin-controller.php">Connexion</a></p>
        <?php }
        if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
            <button class="btn btn-success"><a class="text-decoration-none text-light" href="../controllers/contact-controller.php?id=<?= htmlentities($_SESSION['consumer']->id_consumer) ?>">Nous contacter</a></button>
        <?php
        }
        if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>

            <div class="dropdown">
                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Les utilisateurs
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../controllers/dogProfil-controller.php">DashBoard des utilisateurs</a></li>
                </ul>
            </div>



        <?php }

        if (empty($_SESSION)) { ?>
            <p><a class="text-decoration-none text-dark" href="../controllers/contact-controller.php">Contact</a></p>
        <?php }
        if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)) { ?>
            <button class="btn btn-success"><a class="text-decoration-none text-light" href="../controllers/pages-controller.php#bgHowItWork">Comment ça marche ?</a></button>
        <?php }
        if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)) { ?>
            <p><a class="text-decoration-none text-light btn btn-success" href="../controllers/signOut-controller.php">Déconnexion</a></p>

        <?php } ?>

    </div>

</div>