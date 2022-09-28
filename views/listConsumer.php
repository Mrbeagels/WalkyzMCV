<?php if (isset($errorsArray['global'])) { ?>

<div class="alert alert-warning" role="alert">
    <?= nl2br($errorsArray['global']) ?>
</div>

<?php } else { ?>
<section class="bgFooter">
<h1 class="text-success text-center py-5">Liste des utilisateurs</h1>

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
            <th class="text-success fs-3" scope="col">Id</th>
            <th class="text-success fs-3" scope="col">Civilité</th>
            <th class="text-success fs-3" scope="col">Prénom</th>
            <th class="text-success fs-3" scope="col">Nom</th>
            <th class="text-success fs-3" scope="col">Date de naissance</th>
            <th class="text-success fs-3" scope="col">Email</th>
            <th class="text-success fs-3" scope="col">Type de balade</th>
            <th class="text-success fs-3" scope="col">Durée préférence</th>
            <th class="text-success fs-3" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>


        <?php
        // Si la variable $search n'est pas vide alors j'affiche comme avant la liste des utilisateurs issu de la recherche
        foreach ($consumers as $consumer) { ?>
            
            <tr>
                <td class="text-success"><?= htmlentities($consumer->id_consumer) ?></td>
                <td class="text-success"><?= htmlentities($consumer->civility) ?></td>
                <td class="text-success"><?= htmlentities($consumer->firstname) ?></td>
                <td class="text-success"><?= htmlentities($consumer->lastname) ?></td>
                <td class="text-success"><?= htmlentities(date('d.m.Y', strtotime($consumer->birthdate))) ?></td>                
                <td class="text-success"><a href="mailto:<?= htmlentities($consumer->mail) ?>"><?= htmlentities($consumer->mail) ?></a></td>
                <td class="text-success"><?= htmlentities($consumer->walk_type) ?></td>
                <td class="text-success"><?= htmlentities($consumer->walk_time_slot) ?></td>
                <td class="text-success">
                    <a href="/controllers/editConsumer-controller.php?id=<?= htmlentities($consumer->id_consumer) ?>"><i class="text-success bi bi-pencil fs-3"></i></a>
                    <a href="/controllers/deleteConsumer-controller.php?id=<?= htmlentities($consumer->id_consumer) ?>"><i class=" text-success bi bi-trash fs-3"></i> </a>
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