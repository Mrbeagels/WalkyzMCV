<div class="backgroundImg">
    <div class="homeExplanation">
        <div class="cardHome text-center">
            <div >
                <h5 id="title" class="card-title mt-3 fw-bold">Trouvez des copains de balade proche de chez vous, c'est facile et rapide ! Que du bonheur.</h5>
                <p class="my-2">Vous souhaitez :</p>
                <!-- Créer une nouvelle balade pour visiteur -- pour utilisateur connecter / admin -->
                <?php 
                if (empty($_SESSION)){ ?>
                    <p><a class="text-decoration-none text-dark fw-bold" href="/controllers/signUp-controller.php">Créer une nouvelle balade <i class="bi bi-check"></i></a></p>
                <?php }
                if (isset($_SESSION['consumer'])){ ?>
                    <p><a class="text-decoration-none text-dark fw-bold" href="/controllers/createWalk-controller.php">Créer une nouvelle balade <i class="bi bi-check"></i></a></p>
                <?php } ?>

                <!-- Voir les balades  pour visiteur -- pour utilisateur connecter / admin du coup faire différence !!  -->
                <?php
                if (empty($_SESSION)){ ?>
                    <p><a class="text-decoration-none text-dark fw-bold" href="/controllers/signUp-controller.php">Voir les balades existante <i class="bi bi-check"></i></a></p>
                <?php }
                if (isset($_SESSION['consumer']) && is_null($_SESSION['consumer']->role)){ ?>
                    <p><a class="text-decoration-none text-dark fw-bold" href="/controllers/listWalkConsumer-controller.php">Voir les balades existante <i class="bi bi-check"></i></a></p>
                <?php }
                    
                if (isset($_SESSION['consumer']) && !is_null($_SESSION['consumer']->role)){ ?>
                    <p><a class="text-decoration-none text-dark fw-bold" href="/controllers/listWalkAdmin-controller.php">Voir les balades existante <i class="bi bi-check"></i></a></p>
                <?php } ?>
                <p>Grâce a nous, ne vous promenez plus jamais seul 🐶</p>
            </div>
        </div>
    </div>
</div>

<!-- Explication du site -->
<div class=" row d-flex justify-content-around h-50 my-5 container-fluid">
    <div class="col-12 col-lg-3 text-center">
        <img src="../public/assets/img/lime-dog-walk.png" alt="Illustration jaune et bleu d'une femme qui promene son chien en laisse, un papillon passe devant le chien">
    </div>
    <div class="homeCard col-12 col-lg-4">
        <div class="card-bod">
            <h3 class="card-title headingDecoration ">Créer une balade</h3>
            <h5 class=" my-3">Regroupez-vous avec d'autres maîtres afin de vous balader ensemble</h5>
            <p class="card-text">Fatigué de faire votre balade tout seul ? Envie de partager un moment convivial avec d'autres maîtres et d'autres chien ? Grâce à Walkyz, vous pouvez indiquer ou, quand et pour combien de temps vous allez vous balader afin d'inviter vos amis.</p>
        </div>
    </div>
    <div class="homeCard col-12 col-lg-4">
        <div class="card-bod">
            <h3 class="card-title headingDecoration">Rejoindre un groupe de balade</h3>
            <h5 class=" my-3">Vous pouvez voir en quelques instants si une balade proche de chez vous va démarrer</h5>
            <p class="card-text">Explorer de nouveaux coins de balade et changer vos habitudes. Chaque maître à sa routine de balade, il est peut-être temps de changer la vôtre, pour le plus grand plaisir de votre chien
            </p>
        </div>
    </div>

</div> 



<!-- Video de présentation -->
<div class="d-flex justify-content-center mt-5">
    <h3 class="mb-5 headingDecoration fs-1">Présentation du concept de Walkyz :</h3>

</div>
<div class="d-flex justify-content-center my-3">
    <iframe width="820" height="555" src="https://www.youtube.com/embed/6hG5P4Ictq8">
    </iframe>
</div>


<!-- Comment ça marche -->
<div class="container-fluid bgHowItWork" id="bgHowItWork">
    <div class="d-flex justify-content-center align-items-center my-5 ">
        <h3 class="headingDecoration fs-1 mt-5">Comment ça marche ? Simplicité et envie d'aventure :</h3>
    </div>
    <div class="row justify-content-around align-items-center pb-5">
        <div class="col-12 col-lg-3 text-center ">
            <img class="registerPc" src="/public/assets/img/registerPc.png" alt="un homme s'enregistre sur walkyz depuis son ordinateur">
            <h4 class="headingDecoration">1. Créez votre profil</h4>
            <p>Inscrivez-vous et remplissez votre profil ainsi que celui de votre toutou, parlez nous de vous ;)</p>
        </div>
        <div class="col-12 col-lg-3 text-center">
            <img class="smartphone " src="/public/assets/img/smartphone.png" alt="illustration bleu d'un smartphone, car nous sommes aussi disponible sur votre téléphone">
            <h4 class="headingDecoration">2. Trouvez votre bonheur</h4>
            <p>Créer une balade pres de chez vous ou rejoignez en une déjà existate afin d'obtenir les informations du RDV</p>
        </div>
        <div class="col-12 col-lg-3 text-center">
            <img class="illuDog" src="/public/assets/img/illudog.png" alt="Illustration d'un homme qui donne un os à son chien">
            <h4 class="headingDecoration">3. Rencontrez-vous</h4>
            <p>Prenez le temps de faire connaissance, puis partager le bonheur des toutous et de découvrir de merveilleux coins de nature près de chez vous </p>
        </div>
    </div>
</div>
<!-- Panneaux explicatif -->
<div class="container-fluid py-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-10 col-lg-4">
        <img class="illuFront img-fluid" src="../public/assets/img/front.png" alt="Ensemble d'illustration resumant le principe du site, des chiens, des balades, de la connexion entre les gens et une carte">
        </div>
        <div class="col-12 col-lg-7 d-flex flex-column justify-content-center text-center">
            <h3 class="headingDecoration">Tous les jours de nouveaux membres à deux ou quatre pattes se joignent à nous, pourquoi pas vous ?</h3>
            <p>Walkyz est une communauté en pleine croissance, avec de nouveaux maîtres et toutous tous les jours. <br></p>
            <p>Vous avez la possibilité de partager du bonheur près de chez vous ou au contraire de visiter de nouveaux lieux de balade avec votre chien en partagent des moments de joie.</p>
            <p>Votre compagnon est 100 % gagnant : plus de sorties, plus de caresses, plus de jeux, plus de copains, une meilleure sociabilisation ... Tout ce dont rêve un doggo</p>
            <p>Notre communauté est basée sur le respect et le bien être des chiens et des maîtres. L'entraide et le respect des memebre est primordiale pour le bon déroulement de votre moment de complicité</p>
        </div>
    </div>
</div>

<!-- Dog of the month -->

<div class="container-fluid mt-5">
    <div class="d-flex justify-content-center text-decoration-underline ">
        <h3 class="headingDecoration fs-1 mb-5">Les chiens du mois d'Octobre</h3>
    </div>
        <div class="row">
        <div class="d-flex flex-column justify-content-center align-items-center col-12 col-lg-4">
                <img src="../public/assets/img/DogsOfTheMonth.png" class="card-img-top dogOfTheMonth" alt="chien du mois d'octobre, pipa, rick et monk">
                <div class="card-body">
                    <h5 class=" text-center headingDecoration card-title fs-1 mt-3">Monk, Pipa & Rick</h5>
                </div>
        </div>
        

            <div class="d-flex flex-column justify-content-center align-items-center col-12 col-lg-4">
                    <img src="../public/assets/img/dogOfTheMonth2.png" class="card-img-top dogOfTheMonth" alt="chien du mois d'octobre,Baya et Capone">
                    <div class="card-body">
                        <h5 class=" text-center headingDecoration card-title fs-1 mt-3">Baya & Capone</h5>
                    </div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center col-12 col-lg-4">
                    <img src="../public/assets/img/dogOfTheMonth3.jpeg" class="card-img-top dogOfTheMonth" alt="chien du mois d'octobre,chien du mois d'octobre Gogu, hermione et charco">
                    <div class="card-body">
                        <h5 class=" text-center headingDecoration card-title fs-1 mt-3">Goku, Hermione & charco</h5>
                    </div>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="#title"><i class="bi bi-arrow-up-square-fill text-success fs-1 vert-move" title="je remonte"></i></a>
    </div>

<!-- go up -->