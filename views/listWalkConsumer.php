<?php if (isset($errorsArray['global'])) { ?>

<div class="alert alert-warning" role="alert">
    <?= nl2br($errorsArray['global']) ?>
</div>



<?php  } else {
?>
<section class="bgFooter container-fluid">
    <div class="row mt-5 ">
        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
            <img src="../public/assets/img/illudog.png" alt="homme a barbe qui promene son chien, couleur froides">
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column justify-content-around ">
            <h1 class="text-success text-center">Liste des balades</h1>
            <div class="text-center">
                <form method="GET">
                        <input type="search" id="site-search" name="search" placeholder="Recherche *" value="<?=$search??'';?>" minlength="1" maxlength="30" >
                        <button class="myButton btn btn-success" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
            <img src="../public/assets/img/woof-success.png" alt="corgi qui rattrape un os au vol">
        </div>
    </div>
    <div class="text-center">
    <small class="text-center fs-italic">*Vous pouvez effectuer une recherche par nom de balade, adresse & ville, code postal et date </small>
    </div>
    <div class="row">
        <?php
                // Si la variable $search n'est pas vide alors j'affiche comme avant la liste des utilisateurs issu de la recherche
                foreach ($walks as $walk) { ?>
        <div class="col-12 col-lg-6">
            <div class="card my-5">
                <div class="card-header text-center  ">
                    <h2> <span class="fw-bold"><?= htmlentities($walk->name)?></span> <br> le <?= htmlentities($walk->walk_date)?> à <?= htmlentities($walk->city)?></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <h5 class="card-title"> Vous pouvez rejoindre cette balade le <?= htmlentities($walk->walk_date)?>, départ au <?= htmlentities($walk->address)?>, <?= htmlentities($walk->city) ?> (<?= $walk->zipCode ?>)</h5>
                    <p class="card-text"> <span class="fw-bold"> Type de walkyz :</span> <?= TYPEOFWALKYZ[htmlentities($walk->type)] ?></p>
                    <p class="card-text"><span class="fw-bold">Durée estimée de la Walkyz :  </span><?= htmlentities($walk->duration) ?></p>
                    <?php 
                    if (!empty($walk->description))
                    { ?>
                        <p class="card-text"> <span class="fw-bold"> Description du créateur de l'évenement :</span> <?=htmlentities($walk->description)?></p>
                    <?php 
                    }
                    ?>
                        </div>
                        <div class="col-12 col-lg-4">
                            <img class="img-fluid"  src="../public/assets/img/pipa.png" alt="pipa, chien berger créole">
                        </div>
                    </div>
                    
                    <div class="text-end pt-2">
                        <a href="#" class="btn btn-primary "><i class="bi bi-person-plus"></i></a>
                        <a href="/controllers/editWalk-controller.php?id=<?= htmlentities($walk->id_consumer) ?>"><i class="text-success bi bi-pencil fs-3"></i></a>
                        <a href="/controllers/deleteWalkConsumer-controller.php?id=<?= htmlentities($walk->id_consumer) ?>"><i class=" text-success bi bi-trash fs-3"></i> </a>
                    </div>
                </div>
            </div>
        </div>
            <?php
            } ?>
        
    </div>

    
<nav aria-label="..." class=" d-flex justify-content-center">
    <ul class="pagination pagination-lg">
        <!-- <li class="page-item active" aria-current="page">
            <span class="page-link">1</span>
        </li> -->
        <?php 
        for ($p=$page-2; $p <= $page +2; $p++) {
            if($p >= 1 && $p <= $nbPages ){?> 
            <li class="page-item <?=($p == $page) ? 'active' :'' ;  ?>"><a class="page-link" href="/controllers/listWalk.php?page=<?=$p?>&search=<?= $search?> "><?=$p?></a></li>
            
        <?php }} ?>
    </ul>
    
</nav>

</section>

<?php
}
?>