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
                <button class="btn city-button text-white" type="button" data-bs-toggle="collapse" data-bs-target="#news" aria-expanded="false" aria-controls="collapseWidthExample">
                    Actualités
                </button>
                <div class="collapse collapse-horizontal" id="news">
                    <div class="card card-body">
                        <ul>
                            <li class="list-unstyled">Actu Lives</li>
                            <li class="list-unstyled">Actu Photos</li>
                            <li class="list-unstyled">Actu Vidéos</li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="row mb-2">
                <button class="btn city-button text-white" type="button" data-bs-toggle="collapse" data-bs-target="#infos" aria-expanded="false" aria-controls="collapseWidthExample">
                        City infos
                </button>
                    <div class="collapse collapse-horizontal" id="infos">
                        <div class="card card-body">
                            <ul>
                                <li class="list-unstyled">Nombres d'habitants</li>
                                <li class="list-unstyled">Nombres de visites</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="row mb-2">
                <button class="btn city-button text-white" type="button" data-bs-toggle="collapse" data-bs-target="#example" aria-expanded="false" aria-controls="collapseWidthExample">
                    Exemples
                </button>
                <div class="collapse collapse-horizontal" id="example">
                    <div class="card card-body">
                        <ul>
                            <li class="list-unstyled">exemples d'infos</li>
                            <li class="list-unstyled">exemples d'infos</li>
                            <li class="list-unstyled">exemples d'infos</li>
                            <li class="list-unstyled">exemples d'infos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 col-lg-7 mt-5">
            <div class="card-body bg-middle d-flex justify-content-between">
                <video class="col-7" controls>
                    <source src="./resources/videos/avatar.mp4" type="video/mp4">
                </video>
                <div class="col-4">
                    <h5 class="card-title">Titre</h5>
                    <p class="card-text">Dernière video poster</p>
                    <a href="#">Toutes les vidéos</a>
                </div>
            </div>
        </div>
        <div class="col-10 col-lg-7 mt-5">
            <div class="card-body bg-middle d-flex justify-content-between">
                <img src="./resources/pictures/fiber-optic.jpg" alt="" class="col-7">
                <div class="col-4">
                    <h5 class="card-title">Titre</h5>
                    <p class="card-text">Dernière photo poster</p>
                    <a href="#">Toutes les photos</a>
                </div>
            </div>
        </div>

    </div>

<?php

$title = 'Home';
$content = ob_get_clean();

require_once 'layout.php';