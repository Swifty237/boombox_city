<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/welcome.css">
        <title> Boombox City | Inscription </title>
    </head>
    <body class="d-flex flex-column align-items-center">

        <h1 class="my-3">Inscription</h1>

        <div class="card col-8 inscription-box pb-3">
            <form class="form" method="POST">
                <div class="m-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="m-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                </div>

                <div class="m-3">
                    <label for="birthdate" class="form-label">Date de naissance</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control" min="1900-01-01" required>
                </div>

                <div class="m-3">
                    <label for="sex" class="form-label">Sexe</label>

                    <select class="form-select" name="sex" id="sex" aria-label="choix du sexe">
                        <option value="">...</option>
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Féminin</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <div class="m-3">
                    <label class="mb-3 form-label" for ="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required></input>
                </div>

                <div class="m-3">
                    <label class="mb-3 form-label" for ="confirm-email">Saisir l'email de nouveau</label>
                    <input type="email" name="confirm-email" id="confirm-email" class="form-control" required></input>
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-box mx-4" type="button"><a class="text-decoration-none text-white" href="index.php?">Annuler</a></button>
                    <button class="btn btn-box mx-4 text-white" type="submit" name="submit">Enregistrer</button>
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