<?php
ob_start();
session_start();

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
                        Boombox actus
                    </button>
                    <div class="collapse collapse-horizontal" id="news">
                        <ul class="list-group">
                            <li class="list-group-item size">prochains lives </li>
                            <li class="list-group-item size">Video de la semaine </li>
                            <li class="list-group-item size">Photo de la semaine </li>
                            <li class="list-group-item size">Membre de la semaine </li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-2">
                    <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#infos" aria-expanded="false" aria-controls="collapseWidthExample">
                            Boombox infos
                    </button>
                    <div class="collapse collapse-horizontal" id="infos">
                        <ul class="list-group">
                            <li class="list-group-item size">Nombre de membres</li>
                            <li class="list-group-item size">Nombre de videos</li>
                            <li class="list-group-item size">Nombre de photos</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-2">
                    <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#example" aria-expanded="false" aria-controls="collapseWidthExample">
                        Interactions
                    </button>
                    <div class="collapse collapse-horizontal" id="example">
                        <ul class="list-group">
                            <li class="list-group-item size">Membre(s) en ligne</li>
                            <li class="list-group-item size">Discussion(s) ouverte(s) </li>
                            <li class="list-group-item size">like(s) video(s)</li>
                            <li class="list-group-item size">like(s) photo(s)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-lg-7 mt-5">
                <div class="row card m-5 bg-middle">
                    
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <p class="card-text">Some quick example text to build</p>
                    </div>
                </div>

                <div class="row card m-5 bg-middle">
                    
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <p class="card-text">Some quick example text to build</p>
                    </div>
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
                                    <li class="list-group-item size"><a class="d-flex justify-content-center text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-profil&id=<?= $_SESSION['resident']->id ?>">Voir mon profil</a></li>
                                    <li class="list-group-item size"><a class="d-flex justify-content-center text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-modif&id=<?= $_SESSION['resident']->id ?>">Modifier</a></li>
                                    <li class="list-group-item size"><a class="d-flex justify-content-center text-decoration-none" href="../index.php?page=logout">Se déconnecter</a></li>
                                </ul>
                            </div>

                            <button class="btn city-button" type="button" data-bs-toggle="collapse" data-bs-target="#poster" aria-expanded="false" aria-controls="poster">
                                <span class="size text-white">Poster / Annoncer</span>
                            </button>

                            <div class="collapse collapse-horizontal" id="poster">
                                <ul class="list-group">
                                    <li class="list-group-item size"><a class="d-flex justify-content-center text-decoration-none" href="#">Lives</a></li>
                                    <li class="list-group-item size"><a class="d-flex justify-content-center text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-pvideo">Vidéos</a></li>
                                    <li class="list-group-item size"><a class="d-flex justify-content-center text-decoration-none" href="http://localhost/boombox_city/resident/index.php?page=resident-ppicture">Photos</a></li>
                                </ul>
                            </div>

                        </div>        
                    </div>
                </div>
            </div>
            
        </div>

<?php

$title = 'Aide';
$content = ob_get_clean();

require_once 'resident-layout.php';
}