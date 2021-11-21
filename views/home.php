<?php
ob_start();

session_start();

if (isset($_SESSION['resident'])) {

    unset($_SESSION['resident']);
    $_SESSION['flash'] = ["visiteur" => "Vous êtes maintenant déconnecté"];
}

if (isset($_SESSION['flash']['visiteur'])) {
    
    echo    '<div class="card m-3 validation text-white">
                <div class="card-body">
                    <p class="card-text">'.$_SESSION['flash']['visiteur'].'</p>
                </div>
            </div>';

    unset($_SESSION['flash']['visiteur']);
}

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
                       <img src="./resources/pictures/1134022.png" alt="" class="card-img-top"> 
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
                <div class="row card m-5 bg-middle">
                    <video controls>
                        <source src="./resources/videos/avatar.mp4" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <p class="card-text">Some quick example text to build</p>
                    </div>
                </div>

                <div class="row card m-5 bg-middle">
                    <img src="./resources/pictures/fiber-optic.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <p class="card-text">Some quick example text to build</p>
                    </div>
                </div>
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
                        <img class="card-img-top" src="./resources/pictures/4304708.png" alt="">
                    </div>
                </div>
            </div>
        </div>

<?php

$title = 'Home';
$content = ob_get_clean();

require_once 'layout.php';