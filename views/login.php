<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/welcome.css">
        <title> Boombox City | Connexion </title>
    </head>

    <body class="d-flex flex-column mt-5">
        
        <h3 class="text-center text-white mb-5">Connexion habitant</h3>

        <div class="card col-7 align-self-center connexion-box">
            <form class="form" method="POST">
                <div class="row justify-content-center">
                    <div class="col-10 mb-3">
                        <label class="form-label text-white" for="email">Adresse email</label>
                        <input class= "form-control" type="email" id="email" name="email" required>
                    </div>
                    <div class="col-10 mb-3">
                        <label class="form-label text-white" for="password">Mot de passe</label>
                        <input class= "form-control" type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="col-4 btn btn-box mb-2 text-white" name="submit">
                        Entrer
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </button>
                    
                    <p class="my-3 d-flex justify-content-center">
                        <a class=text-white href="index.php?page=new-resident">Devenir habitant</a>
                    </p>
                </div>
            </form>
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