<?php
session_start();

if (isset($_SESSION['flash']['danger'])) {

    echo    '<div class="card m-3 errors text-white">
                <div class="card-body">
                    <p class="card-text">'.$_SESSION['flash']['danger'].'</p>
                </div>
            </div>';
            
    unset($_SESSION['flash']['danger']);
}

if (isset($_SESSION['flash']['success'])) {

    echo    '<div class="card m-3 validation text-white">
                <div class="card-body">
                    <p class="card-text">'.$_SESSION['flash']['success'].'</p>
                </div>
            </div>';
            
    unset($_SESSION['flash']['success']);
}

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/welcome.css">
        <title> Boombox City | Welcome </title>
    </head>
    <body class="d-flex flex-column justify-content-around">
        
        <div class="card welcome-box bg-transparent">
            <h1 class="text-center text-white">Bienvenue à Boombox City</h1>
        </div>

        <div class="d-flex justify-content-center">
            <img class="logo col-3" src="./resources/pictures/logo/boombox_logo.png" alt="logo">
        </div>

        <div class="row mt-5 justify-content-around mx-5">
            <div class="col-3 card btn-box py-2 rounded-3">
                <h4 class="text-center"><a class="text-white text-decoration-none" href="index.php?page=login">Habitants</a></h4>
            </div>

            <div class="col-3 card btn-box py-2 rounded-3">
                <h4 class="text-center"><a class="text-white text-decoration-none" href="index.php?page=home">Touristes</a></h4>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
                  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
                  crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" 
                  integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" 
                  crossorigin="anonymous">
        </script>
    </body>
</html>





