<?php
ob_start();
?>

<h3 class="bg-light text-center">Vidéos</h3>

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
<?php
    foreach ($videos as $video): 
?>
        <div class="row card m-5 bg-middle">
            <video controls>
                <source src="./resources/videos/<?= $video->video_name ?>" type="video/mp4">
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

$title = 'Videos';
$content = ob_get_clean();

require_once 'layout.php';
