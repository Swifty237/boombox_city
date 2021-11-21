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
        <div class="row mb-5">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title">Widget</h5>
                    <p class="card-text">Some quick example text to build</p>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="card border-0">
               <img src="../resources/pictures/1134022.png" alt="" class="card-img-top"> 
            </div>
        </div>

        <div class="row mb-5">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title">Widget</h5>
                    <p class="card-text">Some quick example text to build</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-7 mt-5">

<?php
    foreach ($pictures as $picture): 
?>

        <div class="row card m-5 bg-middle">
            <img src="../resources/pictures/<?= $picture->picture_name ?>" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $picture->title ?></h5>
                <p class="card-text"><?= $picture->description ?></p>
            </div>
        </div>

<?php
    endforeach; 
?>

    </div>

    <div class="col-2 mt-4 right-side d-none d-lg-block">
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
                <img class="card-img-top" src="../resources/pictures/4304708.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php

$title = 'Photos';
$content = ob_get_clean();

require_once 'resident-layout.php';
}