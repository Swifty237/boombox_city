<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {

    session_start();

}

if (!isset($_SESSION['resident'])) {

    $_SESSION['flash'] = ['danger' => "Vous devez être connecté pour accéder à cette page"];

    header('Location:http://localhost/boombox_city/index.php?page=login');

    exit();
}

else {

?>

<div class="row block-container justify-content-center">
    
<div class="col-2 mt-4 left-side d-none d-lg-block">
                <div class="row mb-2">
                    <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#news" aria-expanded="false" aria-controls="collapseWidthExample">
                        Actualités
                    </button>
                    <div class="collapse collapse-horizontal" id="news">
                        <ul class="list-group">
                            <li class="list-group-item size">Actu Lives</li>
                            <li class="list-group-item size">Actu Photos</li>
                            <li class="list-group-item size">Actu Vidéos</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-2">
                    <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#infos" aria-expanded="false" aria-controls="collapseWidthExample">
                            City infos
                    </button>
                    <div class="collapse collapse-horizontal" id="infos">
                        <ul class="list-group">
                            <li class="list-group-item size">Nombres d'habitants</li>
                            <li class="list-group-item size">Nombres de visites</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-2">
                    <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#example" aria-expanded="false" aria-controls="collapseWidthExample">
                        Exemples
                    </button>
                    <div class="collapse collapse-horizontal" id="example">
                        <ul class="list-group">
                            <li class="list-group-item size d-flex justify-content-center">exemples d'infos</li>
                            <li class="list-group-item size d-flex justify-content-center">exemples d'infos</li>
                            <li class="list-group-item size d-flex justify-content-center">exemples d'infos</li>
                            <li class="list-group-item size d-flex justify-content-center">exemples d'infos</li>
                        </ul>
                    </div>
                </div>
            </div>

    <div class="col-10 col-lg-7 mt-5">

        <div class="row card bg-middle">
            <img src="../resources/pictures/profil/<?= ($profil->profil_picture != NULL) ? $profil->profil_picture : "user.jpg" ?>" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $profil->firstname ?></h5>
                <p class="card-text"><?= $profil->name ?></p>
                <p class="card-text"><?= $profil->pseudo ?></p>
                <p class="card-text"><?= ($profil->status == 0)? 'Habitant' : 'Administrateur' ?></p>
                <p class="card-text"><?= $profil->birthdate ?></p>
                <p class="card-text"><?= $profil->date_inscription ?></p>
                <p class="card-text"><?= $profil->presentation ?></p>
            </div>
            <button class="btn city-button col-5 mb-3 d-flex align-self-center justify-content-center">
                <a  class="text-white text-decoration-none" 
                    href= <?= ($profil->id == $_SESSION['resident']->id) ? "http://localhost/boombox_city/resident/index.php?page=resident-modif&id=".$_SESSION['resident']->id : "http://localhost/boombox_city/resident/index.php?page=resident-tchat&id=".$profil->id ?> >
                    
                        <?= ($profil->id == $_SESSION['resident']->id) ? "Modifier" : "Discuter" ?>
                </a>
            </button>
        </div>

    </div>

    <div class="col-2 mt-4 right-side d-none d-lg-block">
        <div class="row mb-2">
            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target= "#profil" aria-controls="profil" aria-expanded="false" aria-label="">
                <img src="../resources/pictures/profil/<?= ($_SESSION['resident']->profil_picture != NULL) ? $_SESSION['resident']->profil_picture : "user.jpg" ?>" alt="" class="card-img-top">
                <h5 class="card card-title"><?= $_SESSION['resident']->name ?></h5>
            </button>

            <div class="collapse" id="profil">
                <div class="d-flex flex-column">
                    <button class="btn city-button mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#profil-options" aria-expanded="false" aria-controls="profil-options">
                        <span class="size text-white">Profil</span>
                    </button>

                    <div class="collapse collapse-horizontal" id="profil-options">
                        <ul class="list-group">
                            <li class="list-group-item size"><a class="text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-profil&id=<?= $_SESSION['resident']->id ?>">Voir profil</a></li>
                            <li class="list-group-item size"><a class="text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-modif&id=<?= $_SESSION['resident']->id ?>">Modifier profil</a></li>
                            <li class="list-group-item size"><a class="text-decoration-none" href="../index.php?page=logout">Se déconnecter</a></li>
                        </ul>
                    </div>

                    <button class="btn city-button" type="button" data-bs-toggle="collapse" data-bs-target="#poster" aria-expanded="false" aria-controls="poster">
                        <span class="size text-white">Poster</span>
                    </button>

                    <div class="collapse collapse-horizontal" id="poster">
                        <ul class="list-group">
                            <li class="list-group-item size"><a class="text-decoration-none" href="#">Lives</a></li>
                            <li class="list-group-item size"><a class="text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-pvideo">Vidéos</a></li>
                            <li class="list-group-item size"><a class="text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-ppicture">Photos</a></li>
                        </ul>
                    </div>

                </div>        
            </div>

        </div>
    </div>

</div>

<?php

$title = 'Photos';
$content = ob_get_clean();

require_once 'resident-layout.php';
}