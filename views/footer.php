<footer class="<?= $bgClass ?> text-center <?= $txtClass ?>">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Walkyz le site qui met en relation des propriétaires de chien qui cherchent un peu de compagnie pour eux, ou pour leurs compagnons a quatres pattes.
            </p>
            <p>
                bottom text intensifie
            </p>

        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-auto text-center mx-auto">
                    <h5 class="text-uppercase <?= $txtClass ?>">Liens</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="../controllers/pages-controller.php?cat=global" class="<?= $txtClass ?> text-decoration-none">Actualités générales</a>
                        </li>
                        <li>
                            <a href="../controllers/pages-controller.php?cat=foot" class="<?= $txtClass ?> text-decoration-none">Football</a>
                        </li>
                        <li>
                            <a href="../controllers/pages-controller.php?cat=tennis" class="<?= $txtClass ?> text-decoration-none">Tennis</a>
                        </li>
                        <li>
                            <a href="../controllers/pages-controller.php?cat=rugby" class="<?= $txtClass ?> text-decoration-none">Rugby</a>
                        </li>
                        <li>
                            <a href="/controllers/contact-controller.php" class="<?= $txtClass ?> text-decoration-none">Contactez-nous</a>
                        </li>
                    </ul>
                </div>
                <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="container-fluid">
        <div class=" d-flex justify-content-between align-items-start w-100">
            <a class="link" href=""><p class="text-dark">Mention légales</p></a>
            <a class="link" href=""><p class="text-dark"> © 2022 Copyright Thibaud Marin</p></a>
            <a class="link" href=""><p class="text-dark">CGU</p></a>
        </div>
    </div>
    <!-- Copyright -->
</footer>
<!-- CDN js BOOTSTRAP -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- Mon script JS -->
<script src="../public/assets/js/script.js"></script>
</body>

</html>