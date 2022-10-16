<?php
ob_start();

session_start();

if (isset($_SESSION['resident'])) {

    unset($_SESSION['resident']);
    $_SESSION['flash'] = ["visiteur" => "Vous êtes maintenant déconnecté"];
}

if (isset($_SESSION['flash']['visiteur'])) {
    
    echo    '<div class="row card m-3 validation text-white">
                <div class="card-body">
                    <p class="card-text">'.$_SESSION['flash']['visiteur'].'</p>
                </div>
            </div>';

    unset($_SESSION['flash']['visiteur']);
}

?>
    <div class="row block-container justify-content-center">
        <div class="col-2 mt-4 left-side d-none d-lg-block">

            <div class="row mb-2">
                <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#news" aria-expanded="false" aria-controls="collapseWidthExample">
                    Boombox actus
                </button>
                <div class="collapse collapse-horizontal" id="news">
                    <ul class="list-group">
                        <li class="list-group-item size">prochains lives</li>
                        <li class="list-group-item size">Video de la semaine</li>
                        <li class="list-group-item size">Photo de la semaine</li>
                    </ul>
                </div> 
            </div>

            <div class="row mb-2">
                <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#infos" aria-expanded="false" aria-controls="collapseWidthExample">
                        Boombox infos
                </button>
                <div class="collapse collapse-horizontal" id="infos">
                    <ul class="list-group">
                        <li class="list-group-item size">Nombres de membres : ...</li>
                        <li class="list-group-item size">Nombres de videos : ...</li>
                        <li class="list-group-item size">Nombres de photos : ...</li>
                    </ul>
                </div>
            </div> 

        </div>

        <div class="col-10 col-lg-7 mt-5">

            <div class="card-body bg-middle d-flex justify-content-between">
                <video class="col-7" controls>
                    <source src="./resources/videos/<?= $homeVideo->video_name ?>" type="video/mp4">
                </video>
                <div class="col-4">
                    <h5 class="card-title"><?= $homeVideo->title ?></h5>
                    <p class="card-text">Dernière video poster</p>
                    <a href="index.php?page=videos">Toutes les vidéos</a>
                </div>
            </div>

        </div>

        <div class="col-10 col-lg-7 mt-5">

            <div class="card-body bg-middle d-flex justify-content-between">
                <img src="./resources/pictures/<?= $homePicture->picture_name ?>" alt="" class="col-7">
                <div class="col-4">
                    <h5 class="card-title"><?= $homePicture->title ?></h5>
                    <p class="card-text">Dernière photo poster</p>
                    <a href="index.php?page=pictures">Toutes les photos</a>
                </div>
            </div>

        </div>

    </div>

<?php

$title = 'Home';
$content = ob_get_clean();

require_once 'layout.php';