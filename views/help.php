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

            
            </div>
        </div>

<?php

$title = 'Aide';
$content = ob_get_clean();

require_once 'layout.php';

