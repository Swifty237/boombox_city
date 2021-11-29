<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <title> Boombox City | <?php echo $title; ?> </title>
    </head>
    <body class="container-fluid">
        <header class="row navigation justify-content-around">
            <nav class="col-10 navbar navbar-expand-lg navbar-dark">
                <div class="row col-8 col-lg-12 px-3 align-items-center">
                    
                    <a class="navbar-brand mt-3 col-7 col-lg-4 d-flex justify-content-center" href="index.php?page=home">
                        <img class="logo" src="./resources/pictures/logo/boombox_logo.png" alt="logo">
                    </a>
                    
                    <button class="navbar-toggler btn city-button my-3 col-3" type="button" data-bs-toggle="collapse" data-bs-target="#listNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="col-7 collapse navbar-collapse justify-content-between city-button rounded" id="listNav">
                        <ul class="navbar-nav col-5">
                            <li class="nav-item"><a class="size nav-link <?php echo ($page == 'home')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'home')? 'page' : ''; ?>" href="index.php?page=home">Home</a></li>
                            <li class="nav-item"><a class="size nav-link <?php echo ($page == 'videos')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'videos')? 'page' : ''; ?>" href="index.php?page=videos">Vidéos</a></li>
                            <li class="nav-item"><a class="size nav-link <?php echo ($page == 'pictures')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'pictures')? 'page' : ''; ?>" href="index.php?page=pictures">Photos</a></li>
                            <li class="nav-item"><a class="disabled size nav-link <?php echo ($page == 'help')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'help')? 'page' : ''; ?>" href="index.php?page=help">Aide</a></li>
                        </ul>

                        <div class="col-5 d-none d-lg-flex flex-column justify-content-center city-button">
                            <form class="d-flex">
                                <button class="btn disabled" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-white" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                                <input class="form-control" type="search" aria-label="Search" placeholder="Search">
                            </form>
                        </div>
                    </div>

                </div>

                <div class="d-flex d-lg-none flex-column justify-content-center">
                    <a href="index.php?page=login" class="size mb-2">Se connecter</a>
                    <a href="index.php?page=register" class="size">S'inscrire</a>
                </div> 
            </nav>

            <div class="col-2 d-none d-lg-flex flex-column justify-content-center">
                <a href="index.php?page=login" class="size mb-2">Se connecter</a>
                <a href="index.php?page=register" class="size">S'inscrire</a>
            </div> 
            
            <div class="col-11 d-lg-none rounded mb-2">
                <form class="d-flex justify-content-between">
                    <button class="disabled col-2 btn city-button" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-white" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <input class="col form-control" type="search" aria-label="Search" placeholder="Search">
                </form>
            </div>
        </header>

        <?php echo $content; ?>
        
        <footer class="row footbar mt-5" id="footbar">
            <div class="mx-4">
                <h4 class="text-center text-white my-4">Boombox City</h4>
                <hr class="text-white">
                <div class="d-flex justify-content-center">
                    <ul class="d-flex list-inline justify-content-around nav-footer">
                        <li class="list-inline-item d-none d-md-block"><a class="text-decoration-none text-white" href="#">Home</a></li>
                        <li class="list-inline-item d-none d-md-block"><a class="text-decoration-none text-white" href="#">Vidéos</a></li>
                        <li class="list-inline-item d-none d-md-block"><a class="text-decoration-none text-white" href="#">Photos</a></li>
                        <li class="list-inline-item d-none d-md-block"><a class="text-decoration-none text-white" href="#">Lives</a></li>
                        <li class="list-inline-item d-none d-md-block"><a class="text-decoration-none text-white" href="#">Contact</a></li>
                        <li class="list-inline-item d-none d-md-block"><a class="text-decoration-none text-white" href="#">Aide</a></li>
                    </ul>  
                </div>
                <hr class="text-white">
                <p class="text-white text-center">@ Copyright 2021</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
                  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
                  crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" 
                  integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" 
                  crossorigin="anonymous">
        </script>
        <script src="./js/script.js"></script>
    </body>
</html>