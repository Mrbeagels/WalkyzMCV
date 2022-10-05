<?php if (isset($errorsArray['global'])) { ?>

<div class="alert alert-warning" role="alert">
    <?= nl2br($errorsArray['global']) ?>
</div>



<?php } else { 
?>
<section class="bgFooter">
    <h1 class="text-success text-center py-5">Liste des balades <span class="text-danger">consumer</span></h1>

    <form method="GET">
        <div class="col-12 text-center pb-4">
            
            <input type="search" id="site-search" name="search" placeholder="Recherche d'une balade" value="<?=$search??'';?>" minlength="1" maxlength="30" >
            <button class="myButton btn btn-success" type="submit">Rechercher</button>
        </div>
    </form>


    <?php
            // Si la variable $search n'est pas vide alors j'affiche comme avant la liste des utilisateurs issu de la recherche
            foreach ($walks as $walk) { ?>
    <div class="card my-3">
        <div class="card-header text-center">
            <h2><?= htmlentities($walk->name)?>, le <?= htmlentities($walk->walk_date)?> à <?= htmlentities($walk->city)?></h2>
        </div>
        <div class="card-body bg-success bg-card">
            <h5 class="card-title"> Vous pouvez rejoindre cette balade le <?= htmlentities($walk->walk_date)?>, départ au <?= htmlentities($walk->address)?>, <?= htmlentities($walk->city) ?> (<?= $walk->zipCode ?>)</h5>
            <p class="card-text">Type de walkyz : <?= TYPEOFWALKYZ[htmlentities($walk->type)] ?></p>
            <p class="card-text">Durée estimée de la Walkyz : <?= TYPEOFWALKYZ[htmlentities($walk->duration)] ?></p>
            <?php 
            if (!empty($walk->description))
            { ?>
                <p class="card-text">Description du créateur de l'évenement : <?= htmlentities($walk->description) ?></p>
            <?php 
            }
            ?>
            <div class="text-end">
                <a href="#" class="btn btn-primary"></a>
            </div>
        </div>
    </div>
    <?php
    } ?>
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