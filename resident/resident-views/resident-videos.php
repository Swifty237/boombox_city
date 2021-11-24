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

            <div class="col col-lg-7 mt-5">
<?php
    foreach ($videos as $video): 
?>
        <div class="row card m-5 bg-middle">
            <video controls>
                <source src="../resources/videos/<?= $video->video_name ?>" type="video/mp4">
            </video>

            <div class="card-body">
                <h5 class="card-title"><?= $video->title ?></h5>
                <p class="card-text"><?= $video->description ?></p>
            </div>
        </div>

<?php
    endforeach; 
?>
            </div>

            <div class="col-2 mt-4 right-side d-none d-lg-block">
                <div class="row mb-2">
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target= "#profil" aria-controls="profil" aria-expanded="false" aria-label="">
                        <img src="../resources/pictures/profil/profil5.jpg" alt="" class="card-img-top">
                        <h5 class="card card-title"><?= $_SESSION['resident']->name ?></h5>
                    </button>

                    <div class="collapse" id="profil">
                        <div class="d-flex flex-column">
                            <button class="btn city-button mb-2">
                                <a class="size text-white text-decoration-none" href="#">Profil</a>
                            </button>

                            <button class="btn city-button" type="button" data-bs-toggle="collapse" data-bs-target="#poster" aria-expanded="false" aria-controls="poster">
                                <span class="size text-white">Poster</span>
                            </button>

                            <div class="collapse collapse-horizontal" id="poster">
                                <ul class="list-group">
                                    <li class="list-group-item size"><a class="text-decoration-none" href="#">Lives</a></li>
                                    <li class="list-group-item size"><a class="text-decoration-none" href="#">Vidéos</a></li>
                                    <li class="list-group-item size"><a class="text-decoration-none" href="#">Photos</a></li>
                                </ul>
                            </div>

                            <button class="btn city-button mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#modifier" aria-expanded="false" aria-controls="modifier">
                                <span class="size text-white">Modifier</span>
                            </button>

                            <div class="collapse collapse-horizontal" id="modifier">
                                    <ul class="list-group">
                                        <li class="list-group-item size"><a class="text-decoration-none" href="#">Profil</a></li>
                                        <li class="list-group-item size"><a class="text-decoration-none" href="#">Vidéos</a></li>
                                        <li class="list-group-item size"><a class="text-decoration-none" href="#">Photos</a></li>
                                    </ul>
                            </div>

                        </div>        
                    </div>
                </div>
            </div>
            
        </div>

<?php

$title = 'Videos';
$content = ob_get_clean();

require_once 'resident-layout.php';
}