<?php
ob_start();
?>

<div class="row block-container justify-content-center">
    <div class="col-2 mt-4 left-side d-none d-lg-block">
        <div class="row mb-2">
            <button class="btn city-button text-white size" type="button" data-bs-toggle="collapse" data-bs-target="#news" aria-expanded="false" aria-controls="collapseWidthExample">
                Boombox Actu
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

<?php
    foreach ($pictures as $picture): 
?>

<div class="card col-10 col-lg-7 mt-5">

<div class="card-body bg-middle d-flex justify-content-between">
    <img src="./resources/pictures/<?= $picture->picture_name ?>" alt="" class="col-7">
    <div class="col-4">
        <h5 class="card-title"><?= $picture->title ?></h5>
        <p class="card-text"><?= substr(nl2br($picture->description), 0, 50) ?></p>
        <a href="http://localhost/boombox_city/resident/index.php?page=resident-picture&id=<?= $picture->id ?>">Voir l'article complet</a>
    </div>
</div>

</div>

<?php
    endforeach; 
?>

    <!-- <div class="col-2 mt-4 right-side d-none d-lg-block">
        <div class="row mb-5">
            <div class="card boder-0">
                <div class="card-body">
                    <h5 class="card-title">Widget</h5>
                    <p class="card-text">Some quick example text to build</p>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="card border-0">
                <img class="card-img-top" src="./resources/pictures/4304708.png" alt="">
            </div>
        </div>
    </div> -->
</div>

<?php

$title = 'Photos';
$content = ob_get_clean();

require_once 'layout.php';