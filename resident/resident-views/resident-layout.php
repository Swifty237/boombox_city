<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Boombox City | <?php echo $title; ?> </title>
    </head>
    <body>
        <header class="row justify-content-center navigation">
            <nav class="navbar navbar-expand-lg navbar-dark col-8 col-lg-10 d-flex">
                <div class="row justify-content-center">
                    <a class="navbar-brand col-12 col-lg-3 mt-3 d-flex justify-content-center" href="index.php?page=home">
                        <img class="logo" src="../resources/pictures/logo/boombox_logo.png" alt="logo">
                    </a>
                    
                    <button class="navbar-toggler btn btn-outline-dark my-3 col-3" type="button" data-bs-toggle="collapse" data-bs-target="#listNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse col-5" id="listNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link <?php echo ($page == 'home')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'home')? 'page' : ''; ?>" href="index.php?page=resident-home">Home</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($page == 'videos')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'videos')? 'page' : ''; ?>" href="index.php?page=resident-videos">Vidéos</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($page == 'pictures')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'pictures')? 'page' : ''; ?>" href="index.php?page=resident-pictures">Photos</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($page == 'lives')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'lives')? 'page' : ''; ?>" href="index.php?page=resident-lives">Lives</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($page == 'contact')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'contact')? 'page' : ''; ?>" href="index.php?page=resident-contact">Contact</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo ($page == 'help')? 'active' : ''; ?>" aria-current= "<?php echo ($page == 'help')? 'page' : ''; ?>" href="index.php?page=resident-help">Aide</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 d-none d-lg-flex flex-column justify-content-center">
                        <form class="d-flex">
                            <input class="form-control" type="search" aria-label="Search" placeholder="Search">
                            <button class="btn btn-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-12 d-lg-none d-flex flex-column">
                    <form class="d-flex">
                        <input class="form-control" type="search" aria-label="Search" placeholder="Search">
                        <button class="btn btn-success" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </nav> 
            
            <div class="col-3 col-lg-2 card profil d-flex align-self-center">
                <div class="card-body">
                    <h5 class="card-title"><?= $_SESSION['resident']->name ?></h5>
                    <p><a href="http://localhost/boombox_city/index?page=logout">Se déconnecter</a></p>
                </div>
            </div>
        </header>

        <?php echo $content;?>
        
        <footer class="row footbar">
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
    </body>
</html>

