<?php if (isset($errorsArray['global'])) { ?>

<div class="alert alert-warning" role="alert">
    <?= nl2br($errorsArray['global']) ?>
</div>



<?php } else { ?>
<section class="bgFooter">
<h1 class="text-success text-center py-5">Liste des chiens</h1>

<form method="GET">
    <div class="col-12 text-center pb-4">
        
        <input type="search" id="site-search" name="search" placeholder="Recherche d'un utilisateur" value="<?=$search??'';?>" minlength="1" maxlength="30" >
        <button class="myButton" type="submit">Rechercher</button>
    </div>
</form>
<div class="table-responsive">
<table class="table table-striped  mb-5">
    <thead>
        <tr>
            <th class="text-success fs-3" scope="col">Nom</th>
            <th class="text-success fs-3" scope="col">Surnom</th>
            <th class="text-success fs-3" scope="col">Date de naissance</th>
            <th class="text-success fs-3" scope="col">Poids</th>
            <th class="text-success fs-3" scope="col">Race</th>
            <th class="text-success fs-3" scope="col">Id_consumer</th>
        </tr>
    </thead>
    <tbody>


        <?php
        // Si la variable $search n'est pas vide alors j'affiche comme avant la liste des utilisateurs issu de la recherche
        foreach ($dog_profils as $dog) { ?>
            
            <tr>
                <td class="text-success"><?= htmlentities($dog->name) ?></td>
                <td class="text-success"><?= htmlentities($dog->nickname) ?></td>
                <td class="text-success"><?= htmlentities(date('d.m.Y', strtotime($dog->birthdate))) ?></td>
                <td class="text-success"><?= htmlentities($dog->weight) ?></td>
                <td class="text-success"><?= htmlentities($dog->breed) ?></td>
                <td class="text-success"><?= htmlentities($dog->id_consumer) ?></td>
                <td class="text-success">
                    <a href="/controllers/editConsumer-controller.php?id=<?= htmlentities($dog->id_consumer) ?>"><i class="text-success bi bi-pencil fs-3"></i></a>
                    <a href="/controllers/deleteDog-controller.php?id=<?= htmlentities($dog->id_consumer) ?>"><i class=" text-success bi bi-trash fs-3"></i> </a>
                </td>
            </tr>
        <?php

        } ?>
    </tbody>
</table>
</div>
<nav aria-label="..." class=" d-flex justify-content-center">
    <ul class="pagination pagination-lg">
        <!-- <li class="page-item active" aria-current="page">
            <span class="page-link">1</span>
        </li> -->
        <?php 
        for ($p=$page-2; $p <= $page +2; $p++) {
            if($p >= 1 && $p <= $nbPages ){?> 
            <li class="page-item <?=($p == $page) ? 'active' :'' ;  ?>"><a class="page-link" href="/controllers/list-patientCtrl.php?page=<?=$p?>&search=<?= $search?> "><?=$p?></a></li>
        <?php }} ?>
    </ul>
</nav>
</section>
<?php
}
?>